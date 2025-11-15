<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">Editar Pedido #{{ $pedido->id }}</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-8">

                <h1 class="text-2xl font-bold text-green-700 dark:text-green-400 mb-6">Alterar Pedido</h1>

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-300 border-l-4 border-red-600 dark:border-red-500 rounded">
                        <ul class="list-disc ml-6">
                            @foreach ($errors->all() as $erro)
                                <li>{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Mesa:</label>
                        <select name="mesa_id" required class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">
                            <option value="">Selecione a mesa</option>
                            @foreach($mesas as $mesa)
                                <option value="{{ $mesa->id }}" {{ $mesa->id == $pedido->mesa_id ? 'selected' : '' }}>
                                    Mesa {{ $mesa->numero }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block font-semibold text-gray-700 dark:text-gray-200 mb-1">Status:</label>
                        <select name="status" class="w-full mt-1 px-4 py-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 focus:ring-green-600 focus:border-green-600">
                            <option value="em andamento" {{ $pedido->status == 'em andamento' ? 'selected' : '' }}>Em andamento</option>
                            <option value="finalizado" {{ $pedido->status == 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                            <option value="cancelado" {{ $pedido->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                        </select>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold text-gray-700 dark:text-gray-200 mb-2">Pratos:</h2>
                        @foreach($pratos as $prato)
                            @php
                                $pedidoPrato = $pedido->pratos->firstWhere('id', $prato->id);
                                $checked = $pedidoPrato ? 'checked' : '';
                                $quantidade = $pedidoPrato ? $pedidoPrato->pivot->quantidade : 1;
                            @endphp
                            <div class="flex items-center justify-between bg-gray-100 dark:bg-gray-700 p-3 rounded-lg mb-2 border border-gray-300 dark:border-gray-600">
                                <div>
                                    <input type="checkbox" name="pratos[]" value="{{ $prato->id }}" id="prato-{{ $prato->id }}" {{ $checked }} class="mr-2">
                                    <label for="prato-{{ $prato->id }}" class="text-gray-900 dark:text-gray-100">
                                        {{ $prato->nome }} - R$ {{ number_format($prato->preco, 2, ',', '.') }}
                                    </label>
                                </div>
                                <div>
                                    <label class="sr-only">Quantidade:</label>
                                    <input type="number" name="quantidades[{{ $prato->id }}]" min="1" value="{{ $quantidade }}" class="w-20 px-2 py-1 rounded-lg bg-gray-200 dark:bg-gray-600 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-500">
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-between pt-4">
                        <a href="{{ route('pedidos.index') }}" class="px-5 py-2 rounded-lg bg-gray-300 dark:bg-gray-600 text-gray-900 dark:text-gray-100 hover:bg-gray-400 dark:hover:bg-gray-500 transition">Voltar</a>

                        <button type="submit" class="px-5 py-2 rounded-lg bg-green-600 dark:bg-green-700 text-white hover:bg-green-700 dark:hover:bg-green-800 transition">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>