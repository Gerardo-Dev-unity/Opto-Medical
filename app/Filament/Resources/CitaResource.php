<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CitaResource\Pages;
use App\Filament\Resources\CitaResource\RelationManagers;
use App\Models\Cita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CitaResource extends Resource
{
    protected static ?string $model = Cita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Forms\Components\TextInput::make('nombre')
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('email')
                ->email()
                ->required()
                ->maxLength(255),

            Forms\Components\TextInput::make('telefono')
                ->required()
                ->maxLength(20),

            Forms\Components\DatePicker::make('fecha')
                ->required(),

            Forms\Components\TimePicker::make('hora')
                ->required(),

            Forms\Components\Textarea::make('motivo')
                ->label('Motivo de la cita')
                ->rows(3)
                ->maxLength(500)
                ->nullable(),
        ]);
}

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('nombre')->label('Nombre'),
            Tables\Columns\TextColumn::make('fecha')->label('Fecha'),
            Tables\Columns\TextColumn::make('hora')->label('Hora'),
        ])
        ->filters([
            // Aquí puedes agregar filtros más adelante
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCitas::route('/'),
            'create' => Pages\CreateCita::route('/create'),
            'edit' => Pages\EditCita::route('/{record}/edit'),
            'resumen' => Pages\CitasResumen::route('/resumen'),
        ];
    }
}
