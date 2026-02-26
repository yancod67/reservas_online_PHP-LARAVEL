<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/users', function () {
        return 'ADMIN OK';
    });
});

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('dashboard')
        : redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| ROTAS DO SISTEMA (LOGADO)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    // DASHBOARD (HOME DO SISTEMA)
    Route::get('/dashboard', [ReservaController::class, 'dashboard'])
        ->name('dashboard');

    // RESERVAS
    Route::resource('reservas', ReservaController::class)
        ->except(['show']);

    // LOGOUT
    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('login');
    })->name('logout');

});

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('users', UserController::class)
        ->only(['index', 'update']);

});