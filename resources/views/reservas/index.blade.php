@extends('layouts.app')

@section('title', 'Reservas')

@section('content')
<div class="container-fluid">
    <div class="row">

        {{-- FORMULÁRIO --}}
        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Nova Reserva</h3>
                </div>

                <form method="POST" action="#">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="nome">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label>Data da Reserva</label>
                            <input type="date" class="form-control" name="data">
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option>Selecione</option>
                                <option>Ativo</option>
                                <option>Cancelado</option>
                            </select>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- TABELA --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Reservas</h3>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Data</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- aqui entra o foreach depois --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection