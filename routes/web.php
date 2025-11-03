<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PratoController;
use App\Http\Controllers\MesaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', CategoriaController::class);

Route::resource('pratos', PratoController::class);

Route::resource('mesas', MesaController::class);