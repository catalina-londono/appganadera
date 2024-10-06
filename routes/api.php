<?php

use App\Http\Controllers\FincaController;
use App\Http\Controllers\GanadoController;
use App\Http\Controllers\HierroController;
use App\Http\Controllers\IncidenteController;
use App\Http\Controllers\UsuarioController;
use App\Models\Ganado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('v1/hierros', HierroController::class);
Route::apiResource('v1/usuarios', UsuarioController::class);
Route::apiResource('v1/fincas', FincaController::class);
Route::apiResource('v1/incidentes', IncidenteController::class);
Route::apiResource('v1/ganados', GanadoController::class);

Route::get('v1/usuarios/{id}/fincas', [UsuarioController::class, 'ConsultarFincaporUsuario']);
Route::post('v1/usuarios/asignarafinca', [UsuarioController::class, 'AsignarUsuarioAFinca']);
Route::delete('v1/eliminar-usuario-de-finca', [UsuarioController::class, 'eliminarUsuarioDeFinca']);
Route::get('v1/fincas/{id}/usuarios', [FincaController::class, 'ConsultarUsuarioPorFinca']);
