<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index()
    {
        return view('reservas.index');
    }
    public function create()
    {
        return view('reservas.create');
    }
    public function store(Request $request)
    {
        // Lógica para salvar a reserva
        return redirect()->route('reservas.index');
    }
    public function dashboard()
{
    // métricas básicas (ajuste depois se quiser)
    $total = \App\Models\Reserva::count();
    $pendentes = \App\Models\Reserva::where('status', 'pendente')->count();
    $confirmadas = \App\Models\Reserva::where('status', 'confirmada')->count();
    $canceladas = \App\Models\Reserva::where('status', 'cancelada')->count();

    $ultimas = \App\Models\Reserva::latest()->take(5)->get();

    return view('pages.dashboard', compact(
        'total',
        'pendentes',
        'confirmadas',
        'canceladas',
        'ultimas'
    ));
}
}
