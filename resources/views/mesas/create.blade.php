<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar mesa</title>
</head>
<body>
    <h1>Cadastrar mesa</h1>

    @error('numero')
        <div style="color: red; margin-top: 4px;">
            {{ $message }}
        </div>
    @enderror

    <form action="{{ route('mesas.store') }}" method="POST">
        @csrf
        <p>
            <label>Número da mesa:</label><br>
            <input type="number" name="numero" value="{{ old('numero') }}" required>
        </p>
        <p>
            <label>Capacidade:</label><br>
            <input type="number" name="capacidade" value="{{ old('capacidade') }}" required>
        </p>
        <p>
            <label>Status:</label><br>
            <select name="status" required>
                <option value="">Selecione o status</option>
                <option value="Disponível" {{ old('status') == 'Disponível' ? 'selected' : '' }}>Disponível</option>
                <option value="Ocupada" {{ old('status') == 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
                <option value="Reservada" {{ old('status') == 'Reservada' ? 'selected' : '' }}>Reservada</option>
            </select>
        </p>
        
        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('mesas.index') }}">Voltar</a>
</body>
</html>