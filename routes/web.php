<?php

use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

// Cita
Route::get('/agendar_cita', [CitaController::class, 'index'])->name('agendar_cita');
Route::post('/guardar-cita', [CitaController::class, 'store'])->name('guardar-cita');

// Informe
Route::get('/citas-informe', [CitaController::class, 'informeView'])->name('citas-informe');
Route::get('/informe/{fechaInicial}/{fechaFinal}', [CitaController::class, 'informe'])->name('informe');
Route::post('/citas-informe/excel', [CitaController::class, 'informeExcel'])->name('informeExcel');
Route::get('/citas-informe/consulta/{cita}', [CitaController::class, 'showCita'])->name('cita-informe.consulta');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
