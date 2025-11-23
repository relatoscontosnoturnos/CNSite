<x-guest-layout>
    <div class="login-title">Entrar</div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm mb-1">Email</label>
            <input class="w-full p-2 rounded" type="email" name="email" required autofocus>
        </div>

        <div class="mb-4">
            <label class="block text-sm mb-1">Senha</label>
            <input class="w-full p-2 rounded" type="password" name="password" required>
        </div>

        <div class="flex justify-between items-center mb-4 text-sm">
            <label>
                <input type="checkbox" name="remember"> Lembrar-me
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Esqueci a senha</a>
            @endif
        </div>

        <button class="w-full py-2 rounded mt-2">Entrar</button>
    </form>
</x-guest-layout>
