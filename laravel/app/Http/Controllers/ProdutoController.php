<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Produto;

class ProdutoController extends Controller
{
    public function create()
    {
        return view('produto.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nomeProduto' => 'nullable|string|max:50',
            'codBarras' => 'required|string',
            'valorUnitario' => 'required|numeric',
        ]);
        $produto = Produto::create($validated);

        return response()->json([
            'message' => 'Produto criado com sucesso!',
            'pedido' => $produto,
        ], 201);
    }
}
