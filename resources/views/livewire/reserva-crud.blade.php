<div class="container-fluid">

    {{-- TÍTULO --}}
    <div class="row mb-3">
        <div class="col-12">
            <h1 class="m-0">Reservas</h1>
        </div>
    </div>

    {{-- ALERTA --}}
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- FORMULÁRIO --}}
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">
                {{ $reserva_id ? 'Editar Reserva' : 'Nova Reserva' }}
            </h3>
        </div>

        <form wire:submit.prevent="{{ $reserva_id ? 'atualizar' : 'salvar' }}">
            <div class="card-body">

                <div class="form-group">
                    <label>Nome</label>
                    <input type="text" wire:model="nome" class="form-control">
                    @error('nome') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" wire:model="email" class="form-control">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Data da Reserva</label>
                    <input type="date" wire:model="data_reserva" class="form-control">
                    @error('data_reserva') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select wire:model="status" class="form-control">
                        <option value="">Selecione</option>
                        <option value="pendente">Pendente</option>
                        <option value="confirmada">Confirmada</option>
                        <option value="cancelada">Cancelada</option>
                        <option value="concluida">Concluída</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">
                    {{ $reserva_id ? 'Atualizar' : 'Salvar' }}
                </button>
            </div>
        </form>
    </div>

    {{-- LISTA --}}
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Lista de Reservas</h3>
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th width="180">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservas as $reserva)
                        <tr>
                            <td>{{ $reserva->nome }}</td>
                            <td>{{ $reserva->email }}</td>
                            <td>{{ $reserva->data_reserva }}</td>
                            <td>
                                <span class="badge 
                                    @if($reserva->status === 'confirmada') badge-success
                                    @elseif($reserva->status === 'pendente') badge-warning
                                    @elseif($reserva->status === 'cancelada') badge-danger
                                    @else badge-secondary
                                    @endif">
                                    {{ ucfirst($reserva->status) }}
                                </span>
                            </td>
                            <td>
                                <button wire:click="editar({{ $reserva->id }})" class="btn btn-sm btn-warning">
                                    Editar
                                </button>

                                @if(auth()->user()->isAdmin())
                                    <button wire:click="confirmarExclusao({{ $reserva->id }})" class="btn btn-sm btn-danger">
                                        Excluir
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
