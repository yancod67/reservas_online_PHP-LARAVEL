{{-- filepath: resources/views/reservas/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Sistema de Reservas')

@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Erros encontrados:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header"><h3 class="card-title">Nova Reserva</h3></div>

                <form method="POST" action="{{ route('reservas.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" required>
                            @error('nome')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="data_entrada">Data de Entrada</label>
                            <input type="date" id="data_entrada" name="data_entrada" class="form-control @error('data_entrada') is-invalid @enderror" value="{{ old('data_entrada') }}" required>
                            @error('data_entrada')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="data_saida">Data de Saída</label>
                            <input type="date" id="data_saida" name="data_saida" class="form-control @error('data_saida') is-invalid @enderror" value="{{ old('data_saida') }}" required>
                            @error('data_saida')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="">Selecione</option>
                                <option value="pendente" {{ old('status') === 'pendente' ? 'selected' : '' }}>Pendente</option>
                                <option value="confirmada" {{ old('status') === 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                                <option value="cancelada" {{ old('status') === 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                                <option value="concluida" {{ old('status') === 'concluida' ? 'selected' : '' }}>Concluída</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="reset" class="btn btn-secondary">Limpar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listagem de Reservas</h3>
                </div>
                
                <div class="card-body">
                    <form method="GET" action="{{ route('reservas.index') }}" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="busca" class="form-control" placeholder="Buscar por nome..." value="{{ request('busca') }}">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary" type="submit">Buscar</button>
                                <a href="{{ route('reservas.index') }}" class="btn btn-outline-secondary">Limpar</a>
                            </div>
                        </div>
                    </form>

                    @if($reservas->count())
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th>Entrada</th>
                                        <th>Saída</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($reservas as $reserva)
                                        <tr>
                                            <td><strong>{{ $reserva->nome }}</strong></td>
                                            <td>{{ $reserva->email }}</td>
                                            <td>{{ $reserva->data_entrada->format('d/m/Y') }}</td>
                                            <td>{{ $reserva->data_saida->format('d/m/Y') }}</td>
                                            <td>
                                                @php
                                                    $statusClasses = [
                                                        'pendente' => 'warning',
                                                        'confirmada' => 'success',
                                                        'cancelada' => 'danger',
                                                        'concluida' => 'info',
                                                    ];
                                                @endphp
                                                <span class="badge badge-{{ $statusClasses[$reserva->status] ?? 'secondary' }}">
                                                    {{ ucfirst($reserva->status) }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('reservas.edit', $reserva) }}" class="btn btn-sm btn-info">
                                                    Editar
                                                </a>
                                                <form method="POST" action="{{ route('reservas.destroy', $reserva) }}" style="display:inline;" onsubmit="return confirm('Tem certeza?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info text-center">
                            Nenhuma reserva encontrada.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection