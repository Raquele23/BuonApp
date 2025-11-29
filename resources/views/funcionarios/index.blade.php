<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">{{ __('Funcionários') }}</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <div class="flex justify-between mb-6">
                    <h1 class="text-2xl font-bold text-green-700 dark:text-green-400">Lista de Funcionários</h1>

                    <a href="{{ route('funcionarios.create') }}" class="bg-green-600 dark:bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-700 dark:hover:bg-green-800 transition">Novo Funcionário</a>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 border-l-4 border-green-600 dark:border-green-500 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse bg-white dark:bg-gray-800 shadow-md dark:shadow-lg rounded-lg overflow-hidden">
                        <thead class="bg-red-600 dark:bg-red-700 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">Nome</th>
                                <th class="px-4 py-3 text-left">Email</th>
                                <th class="px-4 py-3 text-left">Telefone</th>
                                <th class="px-4 py-3 text-left">Cargo</th>
                                <th class="px-4 py-3 text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($funcionarios as $funcionario)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $funcionario->nome }}</td>
                                <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $funcionario->email }}</td>
                                <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $funcionario->telefone }}</td>
                                <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $funcionario->cargo }}</td>

                                <td class="px-4 py-3 text-center space-x-2">
                                    <div class="flex flex-col sm:flex-row justify-center gap-2">
                                        <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="bg-green-500 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-700 text-white px-3 py-1 rounded">Editar</a>

                                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-600 dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-800 text-white px-3 py-1 rounded">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>