<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova categoria</title>
</head>
<body>
    <h1>Nova Categoria</h1>

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" value="{{ old('nome') }}" required>
        </p>
        <p>
            <label>Descrição:</label><br>
            <textarea name="descricao">{{ old('descricao') }}</textarea>
        </p>
        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('categorias.index') }}">Voltar</a>
</body>
</html>