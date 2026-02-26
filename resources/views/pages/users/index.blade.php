@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
<div class="container-fluid">

    {{-- TÍTULO --}}
    <div class="row mb-3">
        <div class="col-sm-6">
            <h1>Usuários</h1>
        </div>
    </div>

    {{-- CARD --}}
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Usuários</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>Status</th>
                        <th width="140">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>

                            <td>
                                @if($user->is_admin)
                                    <span class="badge badge-primary">Admin</span>
                                @else
                                    <span class="badge badge-secondary">Usuário</span>
                                @endif
                            </td>

                            <td>
                                @if($user->active)
                                    <span class="badge badge-success">Ativo</span>
                                @else
                                    <span class="badge badge-danger">Inativo</span>
                                @endif
                            </td>

                            <td>
                                <form method="POST" action="{{ route('users.update', $user->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <button
                                        class="btn btn-sm {{ $user->active ? 'btn-danger' : 'btn-success' }}"
                                        onclick="return confirm('Tem certeza?')"
                                    >
                                        {{ $user->active ? 'Desativar' : 'Ativar' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">
                                Nenhum usuário encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection