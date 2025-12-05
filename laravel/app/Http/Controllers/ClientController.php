<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:100',
            'cpf' => 'required|string|size:11',
            'email' => 'nullable|email|max:50',
        ]);
        $client = Client::create($request->all());
        return response()->json([
            'message' => 'Pedido criado com sucesso!',
            'pedido' => $client,
        ], 201);

    }
}
