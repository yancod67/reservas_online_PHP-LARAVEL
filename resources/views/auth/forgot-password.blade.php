@extends('layouts.auth.adminlte')

@section('title', 'Recuperar Senha')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <b>Reservas</b>Online
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                Informe seu e-mail para receber o link de redefinição de senha.
            </p>

            {{-- Status --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="input-group mb-3">
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        required
                        autofocus
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            Enviar link de recuperação
                        </button>
                    </div>
                </div>
            </form>

            <p class="mt-3 mb-0 text-center">
                <a href="{{ route('login') }}">Voltar para o login</a>
            </p>
        </div>
    </div>
</div>
@endsection