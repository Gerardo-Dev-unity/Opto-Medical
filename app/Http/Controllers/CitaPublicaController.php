<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\Bloqueo;

class CitaPublicaController extends Controller
{
    public function formulario()
    {
        return view('agendar');
    }

    public function guardar(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'required|string|max:20',
        'fecha' => 'required|date',
        'hora' => 'required',
        'motivo' => 'nullable|string|max:500',
    ]);

    // Normalizar hora a formato completo
    $horaNormalizada = Carbon::parse($validated['hora'])->format('H:i:s');

    // Validar si ya existe una cita en la misma fecha y hora exacta
    $existe = Cita::where('fecha', $validated['fecha'])
        ->whereTime('hora', $horaNormalizada)
        ->exists();

    if ($existe) {
        return back()->withInput()->withErrors([
            'hora' => 'Ya hay una cita agendada en esa fecha y hora. Por favor elige otro horario.',
        ]);
    }

    $validated['hora'] = $horaNormalizada;

    Cita::create($validated);

    return redirect('/agendar')->with('success', 'Tu cita fue agendada correctamente.');
}

public function horariosDisponibles(Request $request)
{
    $fecha = $request->query('fecha');

    // Validar que la fecha sea válida
    if (!$fecha || !Carbon::parse($fecha)) {
        return response()->json(['error' => 'Fecha inválida'], 400);
    }

    $diaSemana = Carbon::parse($fecha)->dayOfWeek; // 0=domingo, 6=sábado

    // Horarios laborales por día
    $horarios = [];

    if ($diaSemana >= 1 && $diaSemana <= 5) { // Lunes a viernes
        $horarios = array_merge(
            $this->generarHorarios('09:00', '14:00'),
            $this->generarHorarios('15:00', '21:00')
        );
    } elseif ($diaSemana === 6) { // Sábado
        $horarios = $this->generarHorarios('09:00', '14:00');
    } else {
        return response()->json([
            'disponibles' => [],
            'motivo' => 'Domingo no laborable',
            'bloqueado' => true,
        ]);
    }

    // Obtener bloqueos para esa fecha
    $bloqueos = \App\Models\Bloqueo::where('fecha', $fecha)->get();

    // Verificar si todo el día está bloqueado
    $bloqueoDia = $bloqueos->firstWhere(fn ($b) => $b->hora_inicio === null && $b->hora_fin === null);
    if ($bloqueoDia) {
        return response()->json([
            'disponibles' => [],
            'motivo' => $bloqueoDia->motivo ?? 'Este día ha sido bloqueado para agendar citas.',
            'bloqueado' => true,
        ]);
    }

    // Obtener rangos de hora bloqueados
    $horasBloqueadas = [];

    foreach ($bloqueos as $bloqueo) {
        if ($bloqueo->hora_inicio && $bloqueo->hora_fin) {
            $periodo = CarbonPeriod::create("2025-01-01 {$bloqueo->hora_inicio}", '30 minutes', "2025-01-01 {$bloqueo->hora_fin}");

            foreach ($periodo as $hora) {
                $horasBloqueadas[] = $hora->format('H:i');
            }
        }
    }

    // Obtener horarios ocupados por citas
    $ocupados = \App\Models\Cita::where('fecha', $fecha)
        ->pluck('hora')
        ->map(fn($h) => Carbon::parse($h)->format('H:i'))
        ->toArray();

    // Filtrar horarios disponibles
    $disponibles = array_filter($horarios, function ($hora) use ($ocupados, $horasBloqueadas) {
        return !in_array($hora, $ocupados) && !in_array($hora, $horasBloqueadas);
    });

    return response()->json([
        'disponibles' => array_values($disponibles),
        'bloqueado' => false,
    ]);
}



// Función auxiliar para generar bloques de 30 min
private function generarHorarios($inicio, $fin)
{
    $periodo = CarbonPeriod::create("2025-01-01 $inicio", '30 minutes', "2025-01-01 $fin");
    $horas = [];

    foreach ($periodo as $hora) {
        $h = $hora->format('H:i');
        
        // Excluir 14:00 (comida) y 21:00 (salida)
        if ($h === '14:00' || $h === '21:00') {
            continue;
        }

        $horas[] = $h;
    }

    return $horas;
}
}
