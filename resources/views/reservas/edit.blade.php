{{-- filepath: resources/views/reservas/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Editar Reserva')

@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Erros:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card card-warning">
                <div class="card-header"><h3 class="card-title">Editar Reserva</h3></div>

                <form method="POST" action="{{ route('reservas.update', $reserva) }}">
                    @csrf
                    @method('PATCH')
                    
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome', $reserva->nome) }}" required>
                            @error('nome')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $reserva->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="data_entrada">Data de Entrada</label>
                            <input type="date" id="data_entrada" name="data_entrada" class="form-control @error('data_entrada') is-invalid @enderror" value="{{ old('data_entrada', $reserva->data_entrada->format('Y-m-d')) }}" required>
                            @error('data_entrada')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="data_saida">Data de Saída</label>
                            <input type="date" id="data_saida" name="data_saida" class="form-control @error('data_saida') is-invalid @enderror" value="{{ old('data_saida', $reserva->data_saida->format('Y-m-d')) }}" required>
                            @error('data_saida')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="pendente" {{ old('status', $reserva->status) === 'pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="confirmada" {{ old('status', $reserva->status) === 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                <option value="cancelada" {{ old('status', $reserva->status) === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                <option value="concluida" {{ old('status', $reserva->status) === 'concluida' ? 'selected' : '' }}>Concluída</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-warning">Atualizar</button>
                        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection