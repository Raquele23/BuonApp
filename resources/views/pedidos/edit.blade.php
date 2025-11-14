<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar pedido</title>
</head>
<body>
    <h1>Editar Pedido #{{ $pedido->id }}</h1>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <p>
            <label>Mesa:</label><br>
            <select name="mesa_id" required>
                @foreach($mesas as $mesa)
                    <option value="{{ $mesa->id }}" {{ $mesa->id == $pedido->mesa_id ? 'selected' : '' }}>
                        Mesa {{ $mesa->numero }}
                    </option>
                @endforeach
            </select>
        </p>

        <p>
            <label>Status:</label><br>
            <select name="status">
                <option value="em andamento" {{ $pedido->status == 'em andamento' ? 'selected' : '' }}>Em andamento</option>
                <option value="finalizado" {{ $pedido->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                <option value="cancelado" {{ $pedido->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </p>

        <h3>Pratos</h3>
        @foreach($pratos as $i => $prato)
            @php
                $pedidoPrato = $pedido->pratos->firstWhere('id', $prato->id);
                $checked = $pedidoPrato ? 'checked' : '';
                $quantidade = $pedidoPrato ? $pedidoPrato->pivot->quantidade : 1;
            @endphp
            <div>
                <input type="checkbox" name="pratos[]" value="{{ $prato->id }}" {{ $checked }}>
                {{ $prato->nome }} - R$ {{ number_format($prato->preco, 2, ',', '.') }}

                <label>Quantidade:</label>
                <input type="number" name="quantidades[{{ $prato->id }}]" min="1" value="{{ $quantidade }}" style="width: 60px;">
            </div>
        @endforeach

        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('pedidos.index') }}">Voltar</a>
</body>
</html>