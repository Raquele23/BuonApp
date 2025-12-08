<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BuonApp</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white dark:bg-gray-800 shadow-xl rounded-2xl p-10 max-w-md w-full text-center border border-gray-200 dark:border-gray-700 animate-fadeIn">

        {{-- LOGO --}}
        <div class="mb-6 flex justify-center">
            <img src="/images/minha-logo.png" alt="Logo BuonApp"
                 class="w-14 h-14 object-contain">
        </div>

        {{-- TÍTULO --}}
        <h1 class="text-3xl font-bold mb-3 text-green-700 dark:text-green-400">
            Bem-vindo ao BuonApp
        </h1>

        {{-- SUBTÍTULO --}}
        <p class="text-gray-600 dark:text-gray-300 mb-8">
            A solução completa para gestão de restaurantes. Faça login ou registre-se para continuar.
        </p>

        {{-- BOTÕES --}}
        @if (Route::has('login'))
            <div class="flex flex-col gap-3">

                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="w-full px-6 py-2 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition font-medium">
                        Ir para o Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="w-full px-6 py-2 rounded-lg text-white dark:bg-gray-100 dark:text-gray-900 hover:opacity-90 transition font-medium">
                        Entrar
                    </a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="w-full px-6 py-2 rounded-lg border border-gray-300 dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 transition font-medium">
                            Registrar-se
                        </a>
                    @endif
                @endauth

            </div>
        @endif
    </div>

    {{-- Animação simples --}}
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out;
        }
    </style>

</body>
</html>
