<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('pages.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
{
    if (!auth()->user()->isAdmin()) {
        abort(403);
    }

    $user->update([
        'is_admin' => $request->boolean('is_admin'),
    ]);

    return redirect()
        ->route('users.index')
        ->with('success', 'Acesso do usuário atualizado!');
}
}