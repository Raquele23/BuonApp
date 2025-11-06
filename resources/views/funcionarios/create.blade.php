<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo funcionário</title>
</head>
<body>
    <h1>Cadastrar funcionário</h1>

    <form action="{{ route('funcionarios.store') }}" method="POST">
        @csrf
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" value="{{ old('nome') }}" required>
        </p>
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </p>
        <p>
            <label>Telefone:</label><br>
            <input type="text" name="telefone" value="{{ old('telefone') }}" required>
        </p>
        <p>
            <label>Cargo:</label><br>
            <select name="cargo" required>
                <option value="">Selecione o cargo</option>
                <option value="Chef de Cozinha" {{ old('cargo') == 'Chef de Cozinha' ? 'selected' : '' }}>Chef de Cozinha</option>
                <option value="Cozinheiro" {{ old('cargo') == 'Cozinheiro' ? 'selected' : '' }}>Cozinheiro</option>
                <option value="Pizzaiolo" {{ old('cargo') == 'Pizzaiolo' ? 'selected' : '' }}>Pizzaiolo</option>
                <option value="Garçom" {{ old('cargo') == 'Garçom' ? 'selected' : '' }}>Garçom</option>
                <option value="Sommelier" {{ old('cargo') == 'Sommelier' ? 'selected' : '' }}>Sommelier</option>
                <option value="Gerente" {{ old('cargo') == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                <option value="Atendente" {{ old('cargo') == 'Atendente' ? 'selected' : '' }}>Atendente</option>
            </select>
        </p>

        <button type="submit">Salvar</button>
    </form>

    <a href="{{ route('funcionarios.index') }}">Voltar</a>
</body>
</html>