@extends('layouts.admin')

@section('title', 'Détails voiture')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Détails de la voiture</h2>

    <div class="bg-white p-6 rounded shadow space-y-4 w-full max-w-xl">
        @if($voiture->image)
            <img src="{{ asset('storage/' . $voiture->image) }}" alt="Voiture" class="w-full h-52 object-cover rounded">
        @endif

        <p><strong>Marque :</strong> {{ $voiture->marque }}</p>
        <p><strong>Modèle :</strong> {{ $voiture->modele }}</p>
        <p><strong>Prix :</strong> {{ $voiture->prix_journalier }} DH / jour</p>
        <p>
            <strong>Disponibilité :</strong>
            <span class="{{ $voiture->disponible ? 'text-green-600' : 'text-red-600' }}">
                {{ $voiture->disponible ? 'Disponible' : 'Indisponible' }}
            </span>
        </p>

        <div class="flex gap-4 pt-4">
            <a href="{{ route('admin.voitures.edit', $voiture) }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Modifier</a>
            <a href="{{ route('admin.voitures.index') }}" class="px-4 py-2 border rounded">Retour</a>
        </div>
    </div>
@endsection
