<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        label { display:block; margin-top:8px }
        input { padding:8px; width:100%; max-width:400px; }
        .btn { padding:8px 12px; background:#007bff; color:#fff; text-decoration:none; border-radius:4px; border:none }
    </style>
</head>
<body>
    <h1>Editar Produto #{{ $produto->id }}</h1>

    @if ($errors->any())
        <div style="background:#ffe6e6;padding:8px;border:1px solid #ffbcbc;margin-bottom:12px">
            <ul style="margin:0;padding-left:16px">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('produto.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nomeProduto">Nome do Produto</label>
        <input id="nomeProduto" name="nomeProduto" value="{{ old('nomeProduto', $produto->nomeProduto) }}">

        <label for="codBarras">Código de Barras</label>
        <input id="codBarras" name="codBarras" value="{{ old('codBarras', $produto->codBarras) }}" required>

        <label for="valorUnitario">Valor Unitário</label>
        <input id="valorUnitario" name="valorUnitario" value="{{ old('valorUnitario', $produto->valorUnitario) }}" required>

        <div style="margin-top:12px">
            <button class="btn" type="submit">Atualizar</button>
            <a href="{{ route('produto.index') }}" style="margin-left:8px">Voltar</a>
        </div>
    </form>
</body>
</html>
