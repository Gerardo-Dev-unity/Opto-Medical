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
Route::view('/', 'home');
Route::view('/nosotros', 'nosotros');
Route::view('/contacto', 'contacto');
Route::get('/agendar', [App\Http\Controllers\CitaPublicaController::class, 'formulario']);
Route::view('/blog', 'blog');
Route::get('/', fn() => view('home'));
Route::get('/servicios', function () {
    return view('servicios');
});



