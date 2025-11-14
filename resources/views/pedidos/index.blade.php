<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
</head>
<body>
    <h1>Pedidos</h1>

    <a href="{{ route('pedidos.create') }}">Novo Pedido</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Mesa</th>
                <th>Status</th>
                <th>Total</th>
                <th>Pratos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>Mesa {{ $pedido->mesa->numero }}</td>
                    <td>{{ ucfirst($pedido->status) }}</td>
                    <td>R$ {{ number_format($pedido->total, 2, ',', '.') }}</td>

                    <td>
                        <ul>
                            @foreach($pedido->pratos as $prato)
                                <li>
                                    {{ $prato->nome }} 
                                    ({{ $prato->pivot->quantidade }}x)
                                </li>
                            @endforeach
                        </ul>
                    </td>

                    <td>
                        <a href="{{ route('pedidos.edit', $pedido->id) }}">Editar</a>

                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este pedido?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>