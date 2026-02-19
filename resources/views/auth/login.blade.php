<x-layouts.auth.simple title="Login">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Senha" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>

    @if (Route::has('password.request'))
        <p class="mb-1 text-center">
            <a href="{{ route('password.request') }}">Esqueci minha senha</a>
        </p>
    @endif

    @if (Route::has('register'))
        <p class="mb-0 text-center">
            <a href="{{ route('register') }}" class="text-center">Registrar-se</a>
        </a>
        </p>
    @endif

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">Lembrar-me</label>
        </div>



        <button type="submit" class="btn btn-primary btn-block">
            Entrar
        </button>
    </form>
</x-layouts.auth.simple>
