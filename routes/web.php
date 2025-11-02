<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PratoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categorias', CategoriaController::class);

Route::resource('pratos', PratoController::class);