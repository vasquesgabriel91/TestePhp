<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: bold;
            font-size: 14px;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            font-family: Arial, sans-serif;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 5px rgba(102, 126, 234, 0.3);
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        .form-row.full {
            grid-template-columns: 1fr;
        }
        button {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .error-text {
            color: #dc3545;
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Criar Novo produto</h1>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Erro!</strong> Há erros no formulário:
                <ul style="margin-top: 10px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('produto.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="nomeProduto">Nome do Produto (Opcional)</label>
                    <input type="text" id="nomeProduto" name="nomeProduto" value="{{ old('nomeProduto') }}" maxlength="50" placeholder="Produto X">
                    @error('nomeProduto')
                <div class="error-text">{{ $message }}</div>
                @enderror

                <div class="form-group">
                    <label for="codBarras">Código de Barras *</label>
                    <input type="text" id="codBarras" name="codBarras" value="{{ old('codBarras') }}" required placeholder="ABC123456">
                    @error('codBarras')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="valorUnitario">Valor Unitário (R$) *</label>
                    <input type="number" id="valorUnitario" name="valorUnitario" value="{{ old('valorUnitario') }}" step="0.01" required min="0" placeholder="99.90">
                    @error('valorUnitario')
                        <div class="error-text">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <button type="submit">Criar produto</button>
            <a href="{{ route('produto.store') }}" style="display: block; text-align: center; margin-top: 15px; color: #667eea; text-decoration: none;">Ver todos os pedidos</a>
        </form>
    </div>
</body>
</html>
