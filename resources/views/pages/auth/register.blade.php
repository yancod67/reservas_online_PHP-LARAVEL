@extends('layouts.auth.adminlte')

@section('title', 'Registro')

@section('content')
<div class="register-box">
    <div class="register-logo">
        <b>Reservas</b>Online
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Criar nova conta</p>

            {{-- Mensagens de erro --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Nome --}}
                <div class="input-group mb-3">
                    <input
                        type="text"
                        name="name"
                        class="form-control"
                        placeholder="Nome completo"
                        value="{{ old('name') }}"
                        required
                        autofocus
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                {{-- Email --}}
                <div class="input-group mb-3">
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        value="{{ old('email') }}"
                        required
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                {{-- Senha --}}
                <div class="input-group mb-3">
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        placeholder="Senha"
                        required
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                {{-- Confirmar senha --}}
                <div class="input-group mb-3">
                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Confirmar senha"
                        required
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <a href="{{ route('login') }}" class="text-center">
                            Já tenho conta
                        </a>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Registrar
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection