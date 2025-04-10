<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniverseApi;

Route::middleware('api')->group(function () {
    Route::get('/universes', [UniverseApi::class, 'index']);
    Route::get('/universes/{name}', [UniverseApi::class, 'show']);
});
