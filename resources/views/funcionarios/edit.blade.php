<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar funcionário</title>
</head>
<body>
    <h1>Editar funcionário</h1>

    <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST">
        @csrf
        @method('PUT')
        <p>
            <label>Nome:</label><br>
            <input type="text" name="nome" value="{{ old('nome', $funcionario->nome) }}" required>
        </p>
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" value="{{ old('email', $funcionario->email) }}" required>
        </p>
        <p>
            <label>Telefone:</label><br>
            <input type="text" name="telefone" value="{{ old('telefone', $funcionario->telefone) }}" required>
        </p>
        <p>
            <label>Cargo:</label><br>
            <select name="cargo" required>
                <option value="">Selecione o cargo</option>
                <option value="Chef de Cozinha" {{ old('cargo', $funcionario->cargo) == 'Chef de Cozinha' ? 'selected' : '' }}>Chef de Cozinha</option>
                <option value="Cozinheiro" {{ old('cargo', $funcionario->cargo) == 'Cozinheiro' ? 'selected' : '' }}>Cozinheiro</option>
                <option value="Pizzaiolo" {{ old('cargo', $funcionario->cargo) == 'Pizzaiolo' ? 'selected' : '' }}>Pizzaiolo</option>
                <option value="Garçom" {{ old('cargo', $funcionario->cargo) == 'Garçom' ? 'selected' : '' }}>Garçom</option>
                <option value="Sommelier" {{ old('cargo', $funcionario->cargo) == 'Sommelier' ? 'selected' : '' }}>Sommelier</option>
                <option value="Gerente" {{ old('cargo', $funcionario->cargo) == 'Gerente' ? 'selected' : '' }}>Gerente</option>
                <option value="Atendente" {{ old('cargo', $funcionario->cargo) == 'Atendente' ? 'selected' : '' }}>Atendente</option>
            </select>
        </p>
        
        <button type="submit">Atualizar</button>
    </form>

     <a href="{{ route('funcionarios.index') }}">Voltar</a>
</body>
</html>