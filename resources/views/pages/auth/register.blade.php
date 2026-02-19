<x-layouts.auth.adminlte>
    <div class="register-box">
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Criar nova conta</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" placeholder="Nome completo" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
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

                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar senha" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">
                        Registrar
                    </button>
                </form>

                <p class="mt-3 text-center">
                    <a href="{{ route('login') }}">Já tenho uma conta</a>
                </p>
            </div>
        </div>
    </div>
</x-layouts.auth.adminlte>