<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\Detalles_ventaController;
use Spatie\Permission\Models\Role;
//Role::create(['name' => 'Administrador']);
//Role::create(['name' => 'Cliente']);
//Role::create(['name' => 'Proveedor']);


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::group(['prefix' => 'Administrador', 'middleware' =>['auth','role:Administrador']]function(){

//});

//Route::group(['prefix' => 'Cliente', 'middleware' =>['auth','role:Cliente']]function(){
//});

//Route::group(['prefix' => 'Proveedor', 'middleware' =>['auth','role:Proveedor']]function(){

//});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('direcciones', DireccionesController::class)->except(['show']);
    Route::resource('detalles_venta', Detalles_ventaController::class)->except(['show']);
    Route::resource('ventas', VentasController::class)->except(['show']);
    Route::resource('categorias', CategoriasController::class)->except(['show']);
    Route::resource('citas', CitasController::class)->except(['show']);
    Route::resource('productos', ProductosController::class)->except(['show']);
});
