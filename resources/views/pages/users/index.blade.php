{{-- filepath: resources/views/users/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Gerenciar Usuários')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Usuários do Sistema</h3>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Acesso Admin</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge {{ $user->is_admin ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $user->is_admin ? 'Admin' : 'Usuário' }}
                                        </span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('users.update', $user) }}" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="is_admin" value="{{ $user->is_admin ? 0 : 1 }}">
                                            <button type="submit" class="btn btn-sm {{ $user->is_admin ? 'btn-warning' : 'btn-success' }}">
                                                {{ $user->is_admin ? 'Desativar Admin' : 'Ativar Admin' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection