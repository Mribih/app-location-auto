@extends('layouts.admin')

@section('title', 'Modifier une voiture')

@section('content')
    <h2 class="text-xl font-bold mb-6">Modifier la voiture</h2>

    <form method="POST" action="{{ route('admin.voitures.update', $voiture) }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Marque</label>
            <input name="marque" value="{{ old('marque', $voiture->marque) }}" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Modèle</label>
            <input name="modele" value="{{ old('modele', $voiture->modele) }}" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Prix journalier (DH)</label>
            <input type="number" name="prix_journalier" value="{{ old('prix_journalier', $voiture->prix_journalier) }}" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Image actuelle :</label><br>
            @if($voiture->image)
                <img src="{{ asset('storage/' . $voiture->image) }}" class="h-24 rounded shadow mb-2">
            @else
                <span class="text-gray-500">Pas d’image</span>
            @endif
        </div>

        <div>
            <label>Changer l'image</label>
            <input type="file" name="image" accept="image/*" class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label>Disponible</label>
            <input type="checkbox" name="disponible" value="1" class="ml-2"
                   {{ $voiture->disponible ? 'checked' : '' }}>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enregistrer</button>
    </form>
@endsection
