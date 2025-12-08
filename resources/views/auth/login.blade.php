<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Link Voltar --}}
    <div class="mb-6">
        <a href="{{ url('/') }}"
           class="text-sm text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition">
            ← Voltar
        </a>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                type="email"
                name="email"
                :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />
            <x-text-input id="password"
                class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-100"
                type="password"
                name="password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                       class="rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800
                              text-green-600 focus:ring-green-500 dark:focus:ring-green-500" 
                       name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Manter conectado') }}
                </span>
            </label>
        </div>

        <div class="flex items-center justify-between mt-6">

            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 transition"
                   href="{{ route('password.request') }}">
                    {{ __('Esqueceu sua senha?') }}
                </a>
            @endif

            <!-- Botão Entrar (estilo BuonApp) -->
            <x-primary-button
                class="px-6 py-2 bg-gray-900 dark:bg-gray-100 text-white dark:text-gray-900
                       hover:opacity-90 transition rounded-lg font-medium">
                {{ __('Entrar') }}
            </x-primary-button>

        </div>
    </form>
</x-guest-layout>
