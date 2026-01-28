<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// Agregar el controlador EventoController
use App\Http\Controllers\EventoController;

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
