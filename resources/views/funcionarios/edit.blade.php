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
            <input type="text" name="cargo" value="{{ old('cargo', $funcionario->cargo) }}" required>
        </p>
        
        <button type="submit">Atualizar</button>
    </form>

     <a href="{{ route('funcionarios.index') }}">Voltar</a>
</body>
</html>