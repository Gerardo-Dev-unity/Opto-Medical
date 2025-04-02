<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaPublicaController;

Route::get('/', function () {
    return view('welcome');
});

// Página para agendar una cita (público)
Route::get('/agendar', [CitaPublicaController::class, 'formulario']);
Route::post('/agendar', [CitaPublicaController::class, 'guardar'])->name('agendar.guardar');
Route::get('/horarios-disponibles', [App\Http\Controllers\CitaPublicaController::class, 'horariosDisponibles']);

