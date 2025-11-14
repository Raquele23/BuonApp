<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PratoController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\PedidoController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', CategoriaController::class);

Route::resource('pratos', PratoController::class);

Route::resource('mesas', MesaController::class);

Route::resource('funcionarios', FuncionarioController::class);

Route::resource('pedidos', PedidoController::class);