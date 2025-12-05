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

        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');
    }

    public function index()
    {
        $produtos = Produto::orderBy('id', 'desc')->paginate(15);
        return view('produto.index', compact('produtos'));
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produto.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
    $produto = Produto::findOrFail($id);
        $validated = $request->validate([
            'nomeProduto' => 'nullable|string|max:50',
            'codBarras' => 'required|string',
            'valorUnitario' => 'required|numeric',
        ]);

        $produto->update($validated);

        return redirect()->route('produto.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index')->with('success', 'Produto removido com sucesso!');
    }
}
