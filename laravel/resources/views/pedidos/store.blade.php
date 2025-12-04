<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Criado com Sucesso</title>
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
            text-align: center;
        }
        .success-icon {
            width: 80px;
            height: 80px;
            background-color: #28a745;
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
        }
        h1 {
            color: #28a745;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .pedido-info {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
            text-align: left;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .info-row:last-child {
            border-bottom: none;
        }
        .info-label {
            font-weight: bold;
            color: #555;
        }
        .info-value {
            color: #333;
        }
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background-color: #e9ecef;
            color: #333;
        }
        .btn-secondary:hover {
            background-color: #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success-icon">✓</div>
        <h1>Pedido Criado com Sucesso!</h1>
        <p>Seu pedido foi registrado com sucesso em nosso sistema.</p>

        <div class="pedido-info">
            <div class="info-row">
                <span class="info-label">ID do Pedido:</span>
                <span class="info-value">{{ $pedido->id }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Nome do Cliente:</span>
                <span class="info-value">{{ $pedido->nomeCliente }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">CPF:</span>
                <span class="info-value">{{ $pedido->cpf }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email:</span>
                <span class="info-value">{{ $pedido->email ?? 'Não informado' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Data do Pedido:</span>
                <span class="info-value">{{ \Carbon\Carbon::parse($pedido->dtPedido)->format('d/m/Y H:i') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Código de Barras:</span>
                <span class="info-value">{{ $pedido->codBarras }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Nome do Produto:</span>
                <span class="info-value">{{ $pedido->nomeProduto ?? 'Não informado' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Valor Unitário:</span>
                <span class="info-value">R$ {{ number_format($pedido->valorUnitario, 2, ',', '.') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Quantidade:</span>
                <span class="info-value">{{ $pedido->qtd }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Valor Total:</span>
                <span class="info-value"><strong>R$ {{ number_format($pedido->valorUnitario * $pedido->qtd, 2, ',', '.') }}</strong></span>
            </div>
        </div>

        <div class="button-group">
            <a href="" class="btn btn-primary">Criar Novo Pedido</a>
            <a href="" class="btn btn-secondary">Ver Todos os Pedidos</a>
        </div>
    </div>
</body>
</html>