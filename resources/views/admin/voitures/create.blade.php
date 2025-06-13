@extends('layouts.admin')

@section('title', 'Ajouter une voiture')

@section('content')
    <h2 class="text-xl font-bold mb-6">Ajouter une voiture</h2>

    <form method="POST" action="{{ route('admin.voitures.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label>Marque</label>
            <input name="marque" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Modèle</label>
            <input name="modele" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Prix journalier (DH)</label>
            <input type="number" name="prix_journalier" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label>Disponible</label>
            <input type="checkbox" name="disponible" value="1" class="ml-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Ajouter</button>
    </form>
@endsection
