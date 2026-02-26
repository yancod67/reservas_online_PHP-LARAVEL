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
        $user->active = !$user->active;
        $user->save();

        return redirect()->route('users.index');
    }
}