<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar categoria</title>
</head>
<body>
    <h1>Editar Categoria</h1>

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" value="{{ old('nome', $categoria->nome) }}" required>
        </p>
        <p>
            <label>Descrição:</label><br>
            <textarea name="descricao">{{ old('descricao', $categoria->descricao) }}</textarea>
        </p>
        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('categorias.index') }}">Voltar</a>
</body>
</html>