<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class ReservaCrud extends Component
{
    public $reserva_id;
    public $nome;
    public $email;
    public $data_reserva;
    public $status;


    // Variável para controlar se estamos editando ou criando
    public function salvar()
{   // Valida os dados do formulário
    $this->validate([
        'nome' => 'required|min:3',
        'email' => 'required|email',
        'data_reserva' => 'required|date',
        'status' => 'required',
    ]);
    // Cria a reserva no banco de dados
    Reserva::create([
        'nome' => $this->nome,
        'email' => $this->email,
        'data_reserva' => $this->data_reserva,
        'status' => $this->status,
    ]);

    session()->flash('success', 'Reserva criada com sucesso!');
    $this->resetFormulario();
}
    // Variável para controlar se estamos editando ou criando
     public function editar($id)
    {
        $reserva = Reserva::findOrFail($id);

        $this->reserva_id   = $reserva->id;
        $this->nome         = $reserva->nome;
        $this->email        = $reserva->email;
        $this->data_reserva = $reserva->data_reserva;
        $this->status       = $reserva->status;

        $this->editando = true;
    }

    public function atualizar()
{
    $this->validate([
        'nome' => 'required|min:3',
        'email' => 'required|email',
        'data_reserva' => 'required|date',
        'status' => 'required',
    ]);

    Reserva::findOrFail($this->reserva_id)->update([
        'nome' => $this->nome,
        'email' => $this->email,
        'data_reserva' => $this->data_reserva,
        'status' => $this->status,
    ]);

    session()->flash('success', 'Reserva atualizada com sucesso!');
    $this->resetFormulario();
}


   public function excluirConfirmado($id)
{   if (!auth()->user()->isAdmin()) {
        session()->flash('error', 'Apenas administradores podem excluir reservas.');
        return;
    }
    Reserva::findOrFail($id)->delete();
    session()->flash('success', 'Reserva excluída com sucesso!');
}   

    private function resetFormulario()
    {
        $this->reserva_id   = null;
        $this->nome         = '';
        $this->email        = '';
        $this->data_reserva = '';
        $this->status       = '';
        $this->editando     = false;
    }


   public function render()
{
    return view('livewire.reserva-crud', [
        'reservas' => Reserva::all()
    ])->layout('layouts.adminlte', [
        'title' => 'Gerenciamento de Reservas',
    ]);
}
}