<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BloqueoResource\Pages;
use App\Models\Bloqueo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class BloqueoResource extends Resource
{
    protected static ?string $model = Bloqueo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)->schema([
                    DatePicker::make('fecha')
                        ->label('Fecha bloqueada')
                        ->required(),

                    Toggle::make('todo_dia')
                        ->label('Bloquear todo el día')
                        ->default(true)
                        ->reactive(),
                ]),

                TimePicker::make('hora_inicio')
                    ->label('Desde')
                    ->required(fn (Get $get) => $get('todo_dia') === false)
                    ->visible(fn (Get $get) => $get('todo_dia') === false),

                TimePicker::make('hora_fin')
                    ->label('Hasta')
                    ->required(fn (Get $get) => $get('todo_dia') === false)
                    ->visible(fn (Get $get) => $get('todo_dia') === false),

                TextInput::make('motivo')
                    ->label('Motivo del bloqueo')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('fecha')
                    ->label('Fecha bloqueada')
                    ->date()
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('hora')
                    ->label('Hora (si aplica)')
                    ->time()
                    ->sortable(),

                Tables\Columns\TextColumn::make('motivo')
                    ->label('Motivo')
                    ->wrap()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('fecha');
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
            'index' => Pages\ListBloqueos::route('/'),
            'create' => Pages\CreateBloqueo::route('/create'),
            'edit' => Pages\EditBloqueo::route('/{record}/edit'),
        ];
    }
}
