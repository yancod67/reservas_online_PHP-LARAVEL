<?php

use App\Models\User;
use Livewire\Volt\Component;

new class extends Component
{
    public function mount()
    {
        // proteção de acesso (opcional, mas recomendada)
        if (! auth()->user()->isAdmin()) {
            abort(403);
        }
    }

    public function with(): array
    {
        return [
            'usuarios' => User::all(),
        ];
    }
};
?>

<div>
    <h1>Usuários Cadastrados</h1>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Perfil</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
