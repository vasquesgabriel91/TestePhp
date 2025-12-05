<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background: #f4f4f4; }
        .actions form { display: inline-block; margin: 0; }
        .top { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
        .btn { padding:8px 12px; background:#007bff; color:#fff; text-decoration:none; border-radius:4px }
        .btn-danger { background:#dc3545 }
    </style>
</head>
<body>
    <div class="top">
        <h1>Produtos</h1>
        <a class="btn" href="{{ route('produto.create') }}">Novo Produto</a>
    </div>

    @if(session('success'))
        <div style="padding:10px;background:#e6ffed;border:1px solid #b7f5c8;margin-bottom:12px">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Código de Barras</th>
                <th>Valor Unitário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nomeProduto }}</td>
                    <td>{{ $produto->codBarras }}</td>
                    <td>{{ number_format($produto->valorUnitario, 2, ',', '.') }}</td>
                    <td class="actions">
                        <a class="btn" href="{{ route('produto.edit', $produto->id) }}">Editar</a>
                        <form action="{{ route('produto.delete', $produto->id) }}" method="POST" onsubmit="return confirm('Remover este produto?');" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Remover</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum produto encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top:12px">{{ $produtos->links() }}</div>
</body>
</html>
