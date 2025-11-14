<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Pedido</title>
</head>
<body>
    <h1>Novo Pedido</h1>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <label>Mesa:</label>
        <select name="mesa_id" required>
            @foreach($mesas as $mesa)
                <option value="{{ $mesa->id }}">Mesa {{ $mesa->numero }}</option>
            @endforeach
        </select>

        <h3>Pratos</h3>
        @foreach($pratos as $index => $prato)
            <div>
                <input type="checkbox" name="pratos[]" value="{{ $prato->id }}">
                {{ $prato->nome }} - R$ {{ number_format($prato->preco, 2, ',', '.') }} <br>

                <label>Quantidade:</label>
                <input type="number" name="quantidades[{{ $prato->id }}]" value="1" min="1">
            </div>
        @endforeach

        <button type="submit">Criar Pedido</button>
    </form>
    <a href="{{ route('pedidos.index') }}">Voltar</a>
</body>
</html>