<x-layouts.auth.adminlte>
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Entrar no sistema</p>

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login.store') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Senha" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Lembrar-me</label>
                            </div>
                        </div>

                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">
                                Entrar
                            </button>
                        </div>
                    </div>
                </form>

                <p class="mb-1 mt-3">
                    <a href="{{ route('password.request') }}">Esqueci minha senha</a>
                </p>

                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Criar nova conta</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.auth.adminlte>