<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Reserva;

class Dashboard extends Component
{
    public $total;
    public $pendentes;
    public $confirmadas;
    public $canceladas;
    public $concluidas;

    public function mount()
    {
        $this->total       = Reserva::count();
        $this->pendentes   = Reserva::where('status', 'pendente')->count();
        $this->confirmadas = Reserva::where('status', 'confirmada')->count();
        $this->canceladas  = Reserva::where('status', 'cancelada')->count();
        $this->concluidas  = Reserva::where('status', 'concluida')->count();
    }

    public function render()
{
    return view('livewire.dashboard', [
        'total' => Reserva::count(),
        'pendentes' => Reserva::where('status', 'pendente')->count(),
        'confirmadas' => Reserva::where('status', 'confirmada')->count(),
        'canceladas' => Reserva::where('status', 'cancelada')->count(),
        'concluidas' => Reserva::where('status', 'concluida')->count(),
    ])->layout('layouts.adminlte', [
        'title' => 'Dashboard',
    ]);
}

}
