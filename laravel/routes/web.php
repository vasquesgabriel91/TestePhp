<?php

use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClientController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/createClient', [ClientController::class, 'create'])->name('client.create');
Route::post('/storeClient', [ClientController::class, 'store'])->name('client.store');


Route::get('/createProduto', [ProdutoController::class, 'create'])->name('produto.create');
Route::post('/storeProduto', [ProdutoController::class, 'store'])->name('produto.store');
Route::get('/indexProduto', [ProdutoController::class, 'index'])->name('produto.index');

Route::get('/produto/{produto}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
Route::put('/produto/{produto}', [ProdutoController::class, 'update'])->name('produto.update');
Route::delete('/produto/{produto}', [ProdutoController::class, 'destroy'])->name('produto.delete');

Route::get('/fazerPedidos', [PedidosController::class, 'create'])->name('pedidos.create');
Route::post('/storePedidos', [PedidosController::class, 'store'])->name('pedidos.store');
