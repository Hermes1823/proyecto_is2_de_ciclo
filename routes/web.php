<?php

use App\Http\Controllers\AsignarController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/producto', ProductoController::class)->names('producto');
    Route::resource('/categoria', CategoriaController::class)->names('categoria');
    Route::resource('/producto', ProductoController::class)->names('producto');
    Route::resource('/oferta', OfertaController::class)->names('oferta');
    Route::resource('/roles', RoleController::class)->names('roles');
    Route::resource('/permisos', PermisoController::class)->names('permisos');
    Route::resource('/usuarios', AsignarController::class)->names('asignar');
});
