<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutoController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createProduto', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/storeProduto', [ProdutoController::class, 'store'])->name('produto.store');

Route::get('/fazerPedidos', [PedidosController::class, 'create'])->name('pedidos.create');
Route::post('/storePedidos', [PedidosController::class, 'store'])->name('pedidos.store');
