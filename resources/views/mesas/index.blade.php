<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">Mesas</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <div class="flex justify-between mb-6">
                    <h1 class="text-2xl font-bold text-green-700 dark:text-green-400">Lista de Mesas</h1>

                    <a href="{{ route('mesas.create') }}" class="bg-green-600 dark:bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-700 dark:hover:bg-green-800 transition">Cadastrar Mesa</a>
                </div>

                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-300 border-l-4 border-green-600 dark:border-green-500 rounded">{{ session('success') }}</div>
                @endif

                <div class="overflow-x-auto">
                    <table class="table-fixed w-full border-collapse bg-white dark:bg-gray-800 shadow-md dark:shadow-lg rounded-lg overflow-hidden">
                        <thead class="bg-red-600 dark:bg-red-700 text-white">
                            <tr>
                                <th class="px-4 py-3 text-left whitespace-nowrap align-middle">Número da Mesa</th>
                                <th class="px-4 py-3 text-left">Capacidade</th>
                                <th class="px-9 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($mesas as $mesa)
                            <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                                <td class="px-4 py-3 text-gray-900 dark:text-gray-100">Mesa {{ $mesa->numero }}</td>

                                <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $mesa->capacidade }} pessoas</td>

                                <td class="px-4 py-3">
                                    @php
                                        $statusClasses = [
                                            'Disponível' => 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300',
                                            'Ocupada'    => 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300',
                                            'Reservada'  => 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300',
                                        ];
                                    @endphp

                                    <span class="inline-flex items-center justify-center min-w-[90px] px-3 py-1 rounded-lg text-sm font-semibold {{ $statusClasses[$mesa->status] ?? 'bg-gray-300 dark:bg-gray-600 text-gray-800 dark:text-gray-200' }}">{{ $mesa->status }}</span>
                                </td>

                                <td class="px-4 py-3 text-center">
                                    <div class="flex flex-col sm:flex-row justify-center gap-2">
                                        <a href="{{ route('mesas.edit', $mesa->id) }}" class="bg-green-500 dark:bg-green-600 hover:bg-green-600 dark:hover:bg-green-700 text-white px-3 py-1 rounded w-full sm:w-auto text-center">
                                            Editar
                                        </a>

                                        <form action="{{ route('mesas.destroy', $mesa->id) }}" method="POST" class="w-full sm:w-auto" onsubmit="return confirm('Tem certeza que deseja excluir?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="bg-red-600 dark:bg-red-700 hover:bg-red-700 dark:hover:bg-red-800 text-white px-3 py-1 rounded w-full sm:w-auto"> Excluir </button>
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