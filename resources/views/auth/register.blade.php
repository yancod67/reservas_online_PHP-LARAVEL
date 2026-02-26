@extends('layouts.auth.adminlte')

@section('title', 'Registrar')

@section('content')
<div class="register-box">
    <div class="register-logo">
        <b>Reservas</b>ON
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Criar nova conta</p>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Nome" required>
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
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Registrar
                </button>
            </form>

            <p class="mt-3 text-center">
                <a href="{{ route('login') }}">Já tenho conta</a>
            </p>
        </div>
    </div>
</div>
@endsection