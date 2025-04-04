<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperheroController;  // Asegúrate de tener este controlador
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para el dashboard, accesible solo para usuarios autenticados
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación para editar el perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de superhéroes (CRUD)
    Route::resource('superheroes', SuperheroController::class);
});

require __DIR__.'/auth.php';
