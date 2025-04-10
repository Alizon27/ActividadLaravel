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

    // Rutas para los géneros de los superhéroes
    Route::get('superheroes/gender', [SuperheroController::class, 'showGender'])->name('superheroes.gender');

    // Rutas para los universos de los superhéroes
    Route::get('superheroes/universes', [SuperheroController::class, 'showUniverses'])->name('superheroes.universes');
});

require __DIR__.'/auth.php';
