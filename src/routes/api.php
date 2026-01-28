<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventoController;
use App\Http\Controllers\PonenteController;

/**
 * Rutas para el recurso Evento
 */

// Obtener todos los eventos
Route::get('/eventos', [EventoController::class, 'index']); 

// Guardar un nuevo evento
Route::post('/eventos', [EventoController::class, 'store']);

// Obtener un evento específico
Route::get('/eventos/{id}', [EventoController::class, 'show']);

// Actualizar un evento existente
Route::put('/eventos/{id}', [EventoController::class, 'update']);

// Eliminar un evento específico
Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);

// Eliminar todos los eventos
Route::delete('/eventos', [EventoController::class, 'destroyAll']);


/**
 * Rutas para el recurso Ponente
 */

// Obtener todos los ponentes
Route::get('/ponentes', [PonenteController::class, 'index']); 

// Guardar un nuevo ponente
Route::post('/ponentes', [PonenteController::class, 'store']);

// Obtener un ponente específico
Route::get('/ponentes/{id}', [PonenteController::class, 'show']);

// Actualizar un ponente existente
Route::put('/ponentes/{id}', [PonenteController::class, 'update']);

// Eliminar un ponente específico
Route::delete('/ponentes/{id}', [PonenteController::class, 'destroy']);

// Eliminar todos los ponentes
Route::delete('/ponentes', [PonenteController::class, 'destroyAll']);
