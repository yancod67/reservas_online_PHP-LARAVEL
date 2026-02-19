<div class="container-fluid">

    {{-- TÍTULO --}}
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="m-0">Usuários Cadastrados</h1>
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
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th width="120">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>
                                <span class="badge 
                                    {{ $usuario->perfil === 'admin' ? 'badge-success' : 'badge-secondary' }}">
                                    {{ ucfirst($usuario->perfil) }}
                                </span>
                            </td>
                            <td>
                                {{-- Proteção: não permitir excluir a si mesmo --}}
                                @if(auth()->id() !== $usuario->id)
                                    <button wire:click="excluir({{ $usuario->id }})"
                                            class="btn btn-sm btn-danger">
                                        Excluir
                                    </button>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
