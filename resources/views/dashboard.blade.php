<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-green-700 dark:text-green-400 leading-tight border-l-4 border-red-600 dark:border-red-500 pl-3">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">

                <h1 class="text-2xl font-bold text-green-700 dark:text-green-400 mb-6">
                    Bem-vindo ao Painel
                </h1>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- Card Pedidos Hoje -->
                    <div class="bg-green-50 dark:bg-green-900 p-6 rounded-lg shadow flex justify-between items-center border-l-4 border-green-600 dark:border-green-500">
                        <div>
                            <h3 class="text-sm font-semibold text-green-700 dark:text-green-400">Pedidos Hoje</h3>
                            <p class="text-2xl font-bold text-green-900 dark:text-green-100">{{ $pedidosHoje }}</p>
                        </div>
                        <i class="fas fa-utensils text-3xl text-green-600 dark:text-green-300"></i>
                    </div>

                    <!-- Card Mesas Ocupadas -->
                    <div class="bg-yellow-50 dark:bg-yellow-900 p-6 rounded-lg shadow flex justify-between items-center border-l-4 border-yellow-500 dark:border-yellow-400">
                        <div>
                            <h3 class="text-sm font-semibold text-yellow-700 dark:text-yellow-400">Mesas Ocupadas</h3>
                            <p class="text-2xl font-bold text-yellow-900 dark:text-yellow-100">{{ $mesasOcupadas }}</p>
                        </div>
                        <i class="fas fa-chair text-3xl text-yellow-500 dark:text-yellow-300"></i>
                    </div>

                    <!-- Card Lucro Hoje -->
                    <div class="bg-red-50 dark:bg-red-900 p-6 rounded-lg shadow flex justify-between items-center border-l-4 border-red-600 dark:border-red-500">
                        <div>
                            <h3 class="text-sm font-semibold text-red-700 dark:text-red-400">Lucro Hoje</h3>
                            <p class="text-2xl font-bold text-red-900 dark:text-red-100">R$ {{ number_format($lucroHoje, 2, ',', '.') }}</p>
                        </div>
                        <i class="fas fa-coins text-3xl text-red-600 dark:text-red-300"></i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
