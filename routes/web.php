<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EstadoController;
//para middleware=>group
use App\Http\Controllers\AuthController;

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
    return view('auth/login');
});
Route::get('usuarios/create', [UsuarioController::class,"create"]);
Route::get('usuarios/store', [UsuarioController::class,"store"]);
Route::get("politicas-privacidad", 
    [UsuarioController::class, "politicas"])->middleware("auth");
Route::get("usuarios/configuracion", 
    [UsuarioController::class,"configuracion"])->middleware("auth");

Route::group(["middleware"=>"auth"], function(){
    Route::resource("usuarios", UsuarioController::class)->except(["create", "store"]);
    Route::resource("estados", EstadoController::class);
    //Route::get("usuarios/{usuario}/confirma-borrar",[UsuarioController::class,"confirmaBorrar"]);
    //Route::get("pestado", function(){
    //    return view("layouts/pantallaCompleta");
    //});    
});

/* colocado por el php artisan ui:auth */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
esto estaba antes de hacer lo del middleware
Route::get('/plantilla',function () {
    return view('/layouts/plantilla');
});
Route::get('/primero',function () {
    return view('primero');
});
Route::get('/login',function(){
    return view('/usuarios/login');
});
//llamada a controlador necesita importacion
Route::resource('/usuarios', UsuarioController::class);

//aunque esta en Controller no esta incluido en los 8
Route::get("/usuarios/{usuario}/confirmaBorrar", [UsuarioController::class, "confirmaBorrar"]);
*/