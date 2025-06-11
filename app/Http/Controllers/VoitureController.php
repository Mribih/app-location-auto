<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index(Request $request)
    {
        $query = Voiture::query()->where('disponible', true);

        if ($request->filled('marque')) {
            $query->where('marque', 'like', '%' . $request->marque . '%');
        }

        if ($request->filled('prix_max')) {
            $query->where('prix_journalier', '<=', $request->prix_max);
        }

        $voitures = $query->paginate(6);

        return view('voitures.index', compact('voitures'));
    }

    public function show(Voiture $voiture)
    {
        return view('voitures.show', compact('voiture'));
    }

}
