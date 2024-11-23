<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\PointController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rutas para Clientes
Route::get('/clients', [ClientController::class, 'index']); // Listar todos los clientes
Route::post('/clients', [ClientController::class, 'store']); // Crear un nuevo cliente
Route::get('/clients/{id}', [ClientController::class, 'show']); // Mostrar un cliente por ID
Route::put('/clients/{id}', [ClientController::class, 'update']); // Actualizar un cliente
Route::delete('/clients/{id}', [ClientController::class, 'delete']); // Eliminar un cliente

// Rutas para Puntos
Route::get('/points', [PointController::class, 'index']); // Obtener todos los puntos
Route::post('/points', [PointController::class, 'store']); // Crear un punto
Route::get('/points/{id}', [PointController::class, 'show']); // Mostrar un punto específico
Route::put('/points/{id}', [PointController::class, 'update']); // Actualizar un punto
Route::delete('/points/{id}', [PointController::class, 'delete']); // Eliminar un punto

// Ruta de ejemplo ya existente para autenticación con Sanctum
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
