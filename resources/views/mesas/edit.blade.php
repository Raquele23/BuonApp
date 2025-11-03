<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mesa</title>
</head>
<body>
    <h1>Editar mesa</h1>

    @error('numero')
        <div style="color: red; margin-top: 4px;">
            {{ $message }}
        </div>
    @enderror

    <form action="{{ route('mesas.update', $mesa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Número da mesa:</label><br>
            <input type="number" name="numero" value="{{ old('numero', $mesa->numero) }}" required>
        </p>
        <p>
            <label>Capacidade:</label><br>
            <input type="number" name="capacidade" value="{{ old('capacidade', $mesa->capacidade) }}" required>
        </p>
        <p>
            <label>Status:</label><br>
            <input type="text" name="status" value="{{ old('status', $mesa->status) }}" required>
        </p>
        
        <button type="submit">Atualizar</button>
    </form>

    <a href="{{ route('mesas.index') }}">Voltar</a>
</body>
</html>