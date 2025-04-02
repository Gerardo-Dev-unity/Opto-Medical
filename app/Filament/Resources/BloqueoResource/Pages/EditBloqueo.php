<?php

namespace App\Filament\Resources\BloqueoResource\Pages;

use App\Filament\Resources\BloqueoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBloqueo extends EditRecord
{
    protected static string $resource = BloqueoResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index'); // Redirige a /admin/bloqueos
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
