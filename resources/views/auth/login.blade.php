<x-guest-layout>
    <!-- Logo + Nombre -->
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">SIGERD</h1>
        <p class="text-sm text-gray-500">Structural Damage Management System</p>
    </div>

    <!-- Título -->
    <h2 class="text-lg font-semibold text-gray-800 text-center mb-6">Welcome back</h2>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <!-- Email -->
        <div>
            <x-text-input id="email"
                class="block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 pl-10"
                type="email"
                name="email"
                :value="old('email')"
                placeholder="Email address"
                required
                autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-xs" />
        </div>

        <!-- Password -->
        <div>
            <x-text-input id="password"
                class="block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500 pl-10"
                type="password"
                name="password"
                placeholder="Password"
                required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-xs" />
        </div>

        <!-- Remember + Forgot -->
        <div class="flex items-center justify-between text-sm">
            <label for="remember_me" class="flex items-center">
                <input id="remember_me" type="checkbox"
                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                    name="remember">
                <span class="ml-2 text-gray-600">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:text-blue-800 font-medium">
                    Forgot your password?
                </a>
            @endif
        </div>

        <!-- Botón -->
        <div>
            <x-primary-button
                class="w-full flex justify-center py-2.5 text-sm font-medium rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition">
                Log in
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
