<?php

namespace App\Filament\Resources\CitaResource\Pages;

use App\Filament\Resources\CitaResource;
use App\Models\Cita;
use Carbon\Carbon;
use Filament\Resources\Pages\Page;

class CitasResumen extends Page
{
    protected static string $resource = CitaResource::class;

    protected static string $view = 'filament.resources.cita-resource.pages.citas-resumen';

    public $citasHoy;
    public $citasSemana;

    public function mount(): void
    {
        $this->citasHoy = Cita::whereDate('fecha', Carbon::today())->orderBy('hora')->get();

        $this->citasSemana = Cita::whereBetween('fecha', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek(),
        ])->orderBy('fecha')->orderBy('hora')->get();
    }
}
