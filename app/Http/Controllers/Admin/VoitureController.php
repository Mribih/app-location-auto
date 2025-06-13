<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::latest()->paginate(10);
        return view('admin.voitures.index', compact('voitures'));
    }

    public function create()
    {
        return view('admin.voitures.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'prix_journalier' => 'required|numeric',
            'disponible' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('voitures', 'public');
        }

        $data['disponible'] = $request->has('disponible');

        Voiture::create($data);

        return redirect()->route('admin.voitures.index')->with('success', 'Voiture ajoutée avec image.');
    }


    public function edit(Voiture $voiture)
    {
        return view('admin.voitures.edit', compact('voiture'));
    }

    public function update(Request $request, Voiture $voiture)
    {
        $data = $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'prix_journalier' => 'required|numeric',
            'disponible' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Supprimer l’ancienne image si elle existe
            if ($voiture->image && \Storage::disk('public')->exists($voiture->image)) {
                \Storage::disk('public')->delete($voiture->image);
            }

            $data['image'] = $request->file('image')->store('voitures', 'public');
        }

        $data['disponible'] = $request->has('disponible');

        $voiture->update($data);

        return redirect()->route('admin.voitures.index')->with('success', 'Voiture mise à jour.');
    }


    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return redirect()->route('admin.voitures.index')->with('success', 'Voiture supprimée.');
    }

}
