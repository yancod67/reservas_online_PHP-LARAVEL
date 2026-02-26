@extends('layouts.app')

@section('title', 'Nova Reserva')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Nova Reserva</h3>
    </div>

    <form method="POST" action="{{ route('reservas.store') }}">
        @csrf

        <div class="card-body">
            {{-- seus inputs aqui --}}
        </div>

        <div class="card-footer">
            <button class="btn btn-primary">Salvar</button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>
@endsection