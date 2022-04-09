<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CategoriasController;
use App\Http\Controllers\API\ProductosController;
use App\Http\Controllers\API\CitasController;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    // Ejemplo:
    // Método GET: http://127.0.0.1:8000/api/categorias
    Route::APIresource('categorias', CategoriasController::class)->names('api-categorias');
    Route::APIresource('citas', CitasController::class)->names('api-citas');
    Route::APIresource('productos', ProductosController::class)->names('api-productos');
    // Route::APIresource('categorias', CategoriasController::class)->only(['index'])->name('index','api-categorias');
});

Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return ['token' => $token->plainTextToken];
});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email'
        , 'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return $user->createToken('app')->plainTextToken;
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
