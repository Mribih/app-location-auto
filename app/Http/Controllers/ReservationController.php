<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Voiture;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('voiture')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(5);

        return view('reservations.index', compact('reservations'));
    }

    public function create(Voiture $voiture)
    {
        return view('reservations.create', compact('voiture'));
    }

    public function store(Request $request, Voiture $voiture)
    {
        $request->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
        ]);

        Reservation::create([
            'user_id' => auth()->id(),
            'voiture_id' => $voiture->id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
        ]);

        return redirect()->route('voitures.index')->with('success', 'Réservation effectuée avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        if ($reservation->user_id !== auth()->id()) {
            abort(403);
        }

        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Réservation annulée avec succès.');
    }

}
