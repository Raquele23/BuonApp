<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">Editar Categoria</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-6 text-green-700 dark:text-green-400">Editar Categoria</h1>

                <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold">Nome:</label>
                        <input type="text" name="nome" value="{{ old('nome', $categoria->nome) }}" placeholder="Ex: Massas Artesanais" required class="w-full mt-1 p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-600 dark:focus:ring-green-500">

                        @error('nome')
                            <p class="mt-1 ml-1 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 font-semibold">Descrição:</label>
                        <textarea name="descricao" placeholder="Descreva o tipo de pratos dessa categoria... Ex: Pratos leves preparados com ingredientes frescos." class="w-full mt-1 p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-green-600 dark:focus:ring-green-500" rows="4">{{ old('descricao', $categoria->descricao) }}</textarea>

                        @error('descricao')
                            <p class="mt-1 ml-1 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="flex justify-between mt-6">
                        <a href="{{ route('categorias.index') }}" class="bg-gray-300 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-4 py-2 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600 transition">Voltar</a>

                        <button type="submit" class="bg-green-600 dark:bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-700 dark:hover:bg-green-800 transition">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>