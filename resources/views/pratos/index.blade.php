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

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">
        @foreach($pratos as $prato)
            <div>
                @if ($prato->imagem)
                    <img src="{{ asset('storage/' . $prato->imagem) }}" alt="{{ $prato->nome }}" width="200">
                @endif

                <p><strong>Nome:</strong> {{ $prato->nome }}</p>
                <p><strong>Descrição:</strong> {{ $prato->descricao }}</p>
                <p><strong>Preço:</strong> R$ {{ number_format($prato->preco, 2, ',', '.') }}</p>
                <p><strong>Categoria:</strong> {{ $prato->categoria->nome ?? 'Sem categoria' }}</p>


                <div style="display: flex; align-items: center; gap: 10px;">
                    <p>
                        <a href="{{ route('pratos.edit', $prato->id) }}">Editar</a>
                    </p>

                    <form action="{{ route('pratos.destroy', $prato->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Tem certeza?')">Deletar</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>