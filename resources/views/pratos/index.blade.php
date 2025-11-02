<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
</head>
<body>
    <h1>Cardápio</h1>

    <a href="{{ route('pratos.create') }}">Adicionar Novo Prato</a>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pratos as $prato)
                <tr>
                    <td>{{ $prato->id }}</td>
                    <td>{{ $prato->nome }}</td>
                    <td>{{ $prato->descricao }}</td>
                    <td>{{ $prato->preco }}</td>
                    <td>
                        <a href="{{ route('pratos.edit', $prato->id) }}">Editar</a>
                        <form action="{{ route('pratos.destroy', $prato->id) }}" method="POST" style="display:inline">
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