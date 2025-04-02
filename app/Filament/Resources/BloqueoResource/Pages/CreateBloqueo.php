<?php

namespace App\Filament\Resources\BloqueoResource\Pages;

use App\Filament\Resources\BloqueoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Bloqueo;

class CreateBloqueo extends CreateRecord
{
    protected static string $resource = \App\Filament\Resources\BloqueoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirige a /admin/bloqueos
    }

    protected function handleRecordCreation(array $data): Bloqueo
    {
        // Si el usuario seleccionó "Bloquear todo el día", anulamos la hora
        if (!empty($data['todo_dia']) && $data['todo_dia']) {
            $data['hora'] = null;
        }

        // Eliminamos 'todo_dia' porque no es una columna en la BD
        unset($data['todo_dia']);

        return Bloqueo::create($data);
    }
}
