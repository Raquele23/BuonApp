<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar prato</title>
</head>
<body>
    <h1>Editar Prato</h1>

    <a href="{{ route('pratos.index') }}">Voltar para o cardápio</a>

    <form action="{{ route('pratos.update', $prato->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" value="{{ old('nome', $prato->nome) }}" required>
        </p>
        <p>
            <label>Descrição:</label><br>
            <textarea name="descricao">{{ old('descricao', $prato->descricao) }}</textarea>
        </p>
        <p>
            <label>Preço:</label><br>
            <input type="number" step="0.01" name="preco" value="{{ old('preco', $prato->preco) }}" required>
        </p>
        <p>
            <label>Categoria:</label><br>
            <select name="categoria_id" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $prato->categoria_id == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </p>
        <p>
            <label>Nova imagem:</label><br>
            <input type="file" name="imagem" accept="image/*">
        </p>

        @if ($prato->imagem)
            <p>Imagem atual:</p>
            <img src="{{ asset('storage/' . $prato->imagem) }}" width="150">
        @endif
        
        <button type="submit">Atualizar</button>
    </form>
</body>
</html>