<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesas</title>
</head>
<body>
    <h1>Mesas</h1>

    <a href="{{ route('mesas.create') }}">Cadastrar mesa</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Número da mesa</th>
                <th>Capacidade</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mesas as $mesa)
                <tr>
                    <td>{{ $mesa->numero }}</td>
                    <td>{{ $mesa->capacidade }}</td>
                    <td>{{ $mesa->status }}</td>
                    <td>
                        <a href="{{ route('mesas.edit', $mesa->id) }}">Editar</a>
                        <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza?')">Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>