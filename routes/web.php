<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;

Route::middleware(['auth'])->group(function () {
    Route::get('/reservas', [ReservaController::class, 'index'])
        ->name('reservas.index');
});