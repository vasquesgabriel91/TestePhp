<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pedido;

class PedidosController extends Controller
{

    public function create()
    {
        return view('pedidos.create');
    }

    public function store(Request $request)
    {
        // Validar dados
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
        $pedido = pedido::create($validated);

        return response()->json([
            'message' => 'Pedido criado com sucesso!',
            'pedido' => $pedido,
        ], 201);
    }
}
