<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\ReservaCrud;
use App\Livewire\Usuarios;
use App\Livewire\Dashboard;

Route::redirect('/', '/login');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/reservas', ReservaCrud::class)->name('reservas');

    Route::get('/usuarios', Usuarios::class)
        ->middleware('admin')
        ->name('usuarios');

    Route ::get('/', ReservaCrud::class)->name('home');
    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/login');
    })->name('logout');

});

require __DIR__.'/settings.php';
