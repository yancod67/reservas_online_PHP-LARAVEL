<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class Usuarios extends Component
{
    public function render()
    {
        return view('livewire.usuarios', [
            'usuarios' => User::all(),
        ])->layout('layouts.adminlte', [
        'title' => 'Gerenciamento de Usuários',
        
        ]);   
    }
}
     

    
