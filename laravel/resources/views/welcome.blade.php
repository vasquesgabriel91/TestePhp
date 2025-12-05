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
   <div>
<div style="padding: 20px; font-family: Arial, sans-serif;">
    <h2>Menu de Produtos</h2>
    <ul style="list-style: none; padding: 0;">
        <li><a href="{{ route('client.create') }}">criar cliente</a></li>
        <li><a href="{{ route('produto.create') }}">Criar novo produto</a></li>
    </ul>
</div>


   </div>
</body>
</html>
