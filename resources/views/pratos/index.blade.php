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

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300  border-l-4 border-green-600 dark:border-green-500 rounded">{{ session('success') }}</div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @foreach($pratos as $prato)
                        <div class="bg-gray-100 dark:bg-gray-700 shadow-md rounded-lg overflow-hidden border border-gray-200 dark:border-gray-600">

                            @if ($prato->imagem)
                                <img src="{{ asset('storage/' . $prato->imagem) }}" alt="{{ $prato->nome }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-gray-600 dark:text-gray-300">Sem imagem</div>
                            @endif

                            <div class="p-4">

                                <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-gray-100">{{ $prato->nome }}</h3>

                                <p class="text-gray-700 dark:text-gray-300 mb-2">{{ $prato->descricao }}</p>

                                <p class="text-gray-900 dark:text-gray-200 font-semibold">
                                    <strong>Preço:</strong> R$ {{ number_format($prato->preco, 2, ',', '.') }}
                                </p>

                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    <strong>Categoria:</strong> {{ $prato->categoria->nome ?? 'Sem categoria' }}
                                </p>

                                <div class="flex gap-2">

                                    <a href="{{ route('pratos.edit', $prato->id) }}" class="bg-green-500 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-700 text-white px-3 py-1 rounded">Editar</a>

                                    <form action="{{ route('pratos.destroy', $prato->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja deletar?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="bg-red-600 dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-800 text-white px-3 py-1 rounded">Deletar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>