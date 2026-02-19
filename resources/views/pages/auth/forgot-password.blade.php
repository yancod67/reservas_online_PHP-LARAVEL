<x-layouts.auth.adminlte>
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Recuperar senha</p>

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Seu email" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Enviar link de recuperação
                    </button>
                </form>

                <p class="mt-3 text-center">
                    <a href="{{ route('login') }}">Voltar para login</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.auth.adminlte>