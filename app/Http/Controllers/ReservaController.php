<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function index(Request $request)
{
    $query = Reserva::query();

    if ($request->filled('busca')) {
        $query->where('nome', 'like', '%' . $request->busca . '%');
    }

    $reservas = $query->get();
    return view('reservas.index', compact('reservas'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'data_entrada' => 'required|date',
            'data_saida'   => 'required|date|after:data_entrada',
            'status'       => 'required|in:pendente,confirmada,cancelada,concluida',
        ]);

        Reserva::create($validated);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva criada com sucesso!');
    }

    public function edit(Reserva $reserva)
    {
        return view('reservas.edit', compact('reserva'));
    }

    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate([
            'nome'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'data_entrada' => 'required|date',
            'data_saida'   => 'required|date|after:data_entrada',
            'status'       => 'required|in:pendente,confirmada,cancelada,concluida',
        ]);

        $reserva->update($validated);

        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva atualizada com sucesso!');
    }

    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()
            ->route('reservas.index')
            ->with('success', 'Reserva deletada com sucesso!');
    }

    public function dashboard()
    {
        $totalReservas = Reserva::count();
        $reservasConfirmadas = Reserva::where('status', 'confirmada')->count();
        $reservasPendentes = Reserva::where('status', 'pendente')->count();
        $reservasCanceladas = Reserva::where('status', 'cancelada')->count();
        $reservasConcluidas = Reserva::where('status', 'concluida')->count();
        return view('dashboard', compact(
        'totalReservas',
        'reservasConfirmadas',
        'reservasPendentes',
        'reservasCanceladas',
        'reservasConcluidas'
        ));
    }
}