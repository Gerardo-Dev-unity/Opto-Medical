<x-filament::page>
    <h2 class="text-xl font-bold mb-4">Citas para hoy ({{ \Carbon\Carbon::today()->format('d M Y') }})</h2>

    @forelse ($this->citasHoy as $cita)
        <div class="p-4 mb-2 border rounded shadow">
            <strong>{{ $cita->hora }}</strong> - {{ $cita->nombre }} ({{ $cita->telefono }})<br>
            <span class="text-sm text-gray-600">{{ $cita->email }}</span>
            @if($cita->motivo)
                <div class="mt-1 text-sm italic text-gray-700">{{ $cita->motivo }}</div>
            @endif
        </div>
    @empty
        <p>No hay citas agendadas para hoy.</p>
    @endforelse

    <hr class="my-6">

    <h2 class="text-xl font-bold mb-4">Citas de esta semana</h2>

    @forelse ($this->citasSemana as $cita)
        <div class="p-4 mb-2 border rounded shadow">
            <strong>{{ \Carbon\Carbon::parse($cita->fecha)->format('D d M') }} - {{ $cita->hora }}</strong><br>
            {{ $cita->nombre }} ({{ $cita->telefono }})
            <div class="text-sm text-gray-600">{{ $cita->email }}</div>
            @if($cita->motivo)
                <div class="mt-1 text-sm italic text-gray-700">{{ $cita->motivo }}</div>
            @endif
        </div>
    @empty
        <p>No hay citas programadas para esta semana.</p>
    @endforelse
</x-filament::page>
