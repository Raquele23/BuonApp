<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">Editar Mesa</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold text-green-700 dark:text-green-400 mb-6">Alterar dados da Mesa</h1>

                <form action="{{ route('mesas.update', $mesa->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Número da mesa:</label>
                        <input type="number" name="numero" value="{{ old('numero', $mesa->numero) }}" placeholder="Ex: 12" required class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">

                        @error('numero')
                            <p class="mt-1 ml-1 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Capacidade:</label>
                        <input type="number" name="capacidade" value="{{ old('capacidade', $mesa->capacidade) }}" placeholder="Ex: 4 pessoas" required class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">

                        @error('capacidade')
                            <p class="mt-1 ml-1 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200">Status:</label>
                        <select name="status" required class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">
                            <option value="">Selecione o status</option>
                            <option value="Disponível" {{ old('status', $mesa->status) == 'Disponível' ? 'selected' : '' }}>Disponível</option>
                            <option value="Ocupada" {{ old('status', $mesa->status) == 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
                            <option value="Reservada" {{ old('status', $mesa->status) == 'Reservada' ? 'selected' : '' }}>Reservada</option>
                        </select>

                        @error('status')
                            <p class="mt-1 ml-1 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p>
                        @enderror
                    </div>

                    <div class="flex justify-between pt-4">
                        <a href="{{ route('mesas.index') }}" class="px-5 py-2 rounded-lg bg-gray-300 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-400 dark:hover:bg-gray-500 transition">Voltar</a>

                        <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 dark:bg-green-700 text-white hover:bg-green-700 dark:hover:bg-green-800 transition">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>