<?php

namespace App\Filament\Pages;

use App\Models\Cita;
use Carbon\Carbon;
use Filament\Pages\Page;

class ResumenCitas extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';
    protected static string $view = 'filament.pages.resumen-citas';
    protected static ?string $navigationLabel = 'Resumen de Citas';
    protected static ?string $title = 'Resumen de Citas';
    protected static ?int $navigationSort = 1; // Puedes cambiar el orden si quieres

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
