<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Voiture;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalVoitures' => Voiture::count(),
            'totalUtilisateurs' => User::where('role', 'user')->count(),
            'totalReservations' => Reservation::count(),
            'recentReservations' => Reservation::with('voiture', 'user')->latest()->take(5)->get(),
        ]);
    }
}
