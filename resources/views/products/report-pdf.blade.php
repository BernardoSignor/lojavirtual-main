<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatorio de Produtos</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h1 { font-size: 20px; margin-bottom: 16px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        th { background: #eee; }
    </style>
</head>
<body>
    <h1>Relatorio de Produtos</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Qtd</th>
                <th>Preco</th>
                <th>Imagem</th>
                <th>Tipo ID</th>
                <th>Tipo</th>
                <th>Criado em</th>
                <th>Atualizado em</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>{{ $product->image }}</td>
                    <td>{{ $product->type_id }}</td>
                    <td>{{ $product->type_name }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
