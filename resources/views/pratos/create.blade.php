<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo prato</title>
</head>
<body>
    <h1>Adicionar Novo Prato</h1>

    <form action="{{ route('pratos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" value="{{ old('nome') }}" required>
        </p>
        <p>
            <label>Descrição:</label><br>
            <textarea name="descricao">{{ old('descricao') }}</textarea>
        </p>
        <p>
            <label>Preço:</label><br>
            <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required>
        </p>
        <p>
            <label>Categoria:</label><br>
            <select name="categoria_id" required>
                <option value="">Selecione uma categoria</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </p>
        <p>
            <label>Imagem:</label><br>
            <input type="file" name="imagem" accept="image/*">
        </p>
        
        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('pratos.index') }}">Voltar para o cardápio</a>
</body>
</html>