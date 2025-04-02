<?php

namespace App\Filament\Resources\BloqueoResource\Pages;

use App\Filament\Resources\BloqueoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBloqueos extends ListRecords
{
    protected static string $resource = BloqueoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
