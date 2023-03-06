<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\AuthController;

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
//as rotas dentro desse grupo precisarao do token
Route::group(['middleware' => ['auth:sanctum']], function() { 
    Route::post('/empresa', [EmpresaController::class, 'store']);
    Route::get('/empresa', [EmpresaController::class, 'index']);
    Route::get('/empresa/{id}', [EmpresaController::class, 'show']);
    Route::put('/empresa/{id}', [EmpresaController::class, 'update']);
    Route::delete('/empresa/{id}', [EmpresaController::class, 'destroy']);

    Route::post('/usuario', [UsuarioController::class, 'store']);
    Route::get('/usuario', [UsuarioController::class, 'index']);
    Route::get('/usuario/{id}', [UsuarioController::class, 'show']);
    Route::put('/usuario/{id}', [UsuarioController::class, 'update']);
    Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);

    Route::apiResource('cliente', ClienteController::class);
});

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
