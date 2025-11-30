<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">Cardápio</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-green-700 dark:text-green-400">Lista de Pratos</h1>

                    <a href="{{ route('pratos.create') }}" class="bg-green-600 dark:bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-700 dark:hover:bg-green-800 transition">Adicionar Novo Prato</a>
                </div>

            <div class="mb-4 flex overflow-x-auto gap-2">
                <a href="{{ route('pratos.index') }}" class="px-3 py-1 rounded bg-gray-700 text-gray-300 hover:bg-gray-500 {{ request('categoria') ? '' : 'bg-gray-500 font-semibold' }}">Todas</a>

                @foreach($categorias as $categoria)
                    <a href="{{ route('pratos.index', ['categoria' => $categoria->id]) }}" class="px-3 py-1 rounded bg-gray-700 text-gray-300 hover:bg-gray-500 {{ request('categoria') == $categoria->id ? 'bg-gray-500 font-semibold' : '' }}">{{ $categoria->nome }}</a>
                @endforeach
            </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 border-l-4 border-green-600 dark:border-green-500 rounded">{{ session('success') }}</div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full border-collapse bg-white dark:bg-gray-800 shadow-md dark:shadow-lg rounded-lg overflow-hidden">
                        <thead class="bg-red-600 dark:bg-red-700 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">Imagem</th>
                                <th class="px-4 py-3 text-left">Nome</th>
                                <th class="px-4 py-3 text-left">Descrição</th>
                                <th class="px-4 py-3 text-left">Preço</th>
                                <th class="px-4 py-3 text-left">Categoria</th>
                                <th class="px-4 py-3 text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pratos as $prato)
                                <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition">

                                    <td class="px-4 py-3">
                                        @if($prato->imagem)
                                            <img src="{{ asset('storage/' . $prato->imagem) }}" alt="{{ $prato->nome }}" class="w-40 h-32 object-cover rounded">
                                        @else
                                            <div class="w-40 h-32 bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-gray-600 dark:text-gray-300 rounded text-sm">Sem imagem</div>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 text-gray-900 dark:text-gray-100">{{ $prato->nome }}</td>

                                    <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $prato->descricao }}</td>

                                    <td class="px-4 py-1 text-gray-900 dark:text-gray-200 font-semibold whitespace-nowrap">R$ {{ number_format($prato->preco, 2, ',', '.') }}</td>
                                    
                                    <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $prato->categoria->nome ?? 'Sem categoria' }}</td>

                                    <td class="px-4 py-3 text-center">
                                        <div class="flex flex-col sm:flex-row justify-center gap-2">
                                            <a href="{{ route('pratos.edit', $prato->id) }}" class="bg-green-500 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-700 text-white px-3 py-1 rounded w-full sm:w-auto text-center">Editar</a>

                                            <form action="{{ route('pratos.destroy', $prato->id) }}" method="POST" class="w-full sm:w-auto" onsubmit="return confirm('Tem certeza que deseja deletar?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-600 dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-800 text-white px-3 py-1 rounded w-full sm:w-auto">Excluir</button>
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