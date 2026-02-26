@extends('layouts.auth.adminlte')

@section('title', 'Esqueci a senha')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <b>Reservas</b>Online
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">
                Informe seu email para receber o link de redefinição de senha
            </p>

            {{-- Status --}}
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            {{-- Erros --}}
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
                        value="{{ old('email') }}"
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
                    <div class="col-8">
                        <a href="{{ route('login') }}">
                            Voltar para login
                        </a>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Enviar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection