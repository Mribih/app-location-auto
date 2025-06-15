<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('user', 'voiture')->latest()->paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'statut' => 'required|in:acceptée,annulée',
        ]);

        $reservation->statut = $request->statut;
        $reservation->save();

        return back()->with('success', 'Réservation mise à jour.');
    }


    public function show(Reservation $reservation)
    {
        $reservation->load('user', 'voiture');
        return view('admin.reservations.show', compact('reservation'));
    }
}
