<?php

use App\Http\Controllers\pedidosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fazerPedidos', [pedidosController::class, 'create'])->name('pedidos.create');
Route::post('/storePedidos', [pedidosController::class, 'store'])->name('pedidos.store');