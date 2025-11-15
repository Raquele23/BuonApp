<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">Adicionar Novo Prato</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold text-green-700 dark:text-green-400 mb-6">Novo Prato</h1>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 border-l-4 border-red-600 dark:border-red-500 rounded">
                        <ul class="list-disc ml-6">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pratos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Nome:</label>
                        <input type="text" name="nome" value="{{ old('nome') }}" required class="w-full px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Descrição:</label>
                        <textarea name="descricao" rows="4" class="w-full px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">{{ old('descricao') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Preço:</label>
                        <input type="number" step="0.01" name="preco" value="{{ old('preco') }}" required class="w-full px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Categoria:</label>
                        <select name="categoria_id" required class="w-full px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">
                            <option value="">Selecione uma categoria</option>

                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" 
                                        {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Imagem:</label>
                        <input type="file" name="imagem" accept="image/*" class="w-full px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600">
                    </div>

                    <div class="flex justify-between mt-6">
                        <a href="{{ route('pratos.index') }}" class="px-5 py-2 rounded-lg bg-gray-300 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-400 dark:hover:bg-gray-500 transition">Voltar</a>

                        <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 dark:bg-green-700 text-white hover:bg-green-700 dark:hover:bg-green-800 transition">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>