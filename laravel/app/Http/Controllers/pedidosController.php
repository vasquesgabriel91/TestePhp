<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidosController extends Controller
{

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomeCliente' => 'required|string|max:100',
            'cpf' => 'required|string|size:11',
            'email' => 'nullable|email|max:50',
            'dtPedido' => 'required|date',
            'codBarras' => 'required|string',
            'nomeProduto' => 'nullable|string|max:50',
            'valorUnitario' => 'required|numeric',
            'qtd' => 'required|integer|min:1',
        ]);
        Pedido::create($validated);

        return redirect()->route('welcome')->with('success', 'Produto criado com sucesso!');

    }
}
