@extends('layouts.admin')

@section('title', 'Détail réservation')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Détail de la réservation</h2>

    <div class="bg-white p-6 rounded shadow space-y-4 max-w-xl">
        <p><strong>Utilisateur :</strong> {{ $reservation->user->name }} ({{ $reservation->user->email }})</p>
        <p><strong>Voiture :</strong> {{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}</p>
        <p><strong>Date début :</strong> {{ $reservation->date_debut }}</p>
        <p><strong>Date fin :</strong> {{ $reservation->date_fin }}</p>
        <p><strong>Statut :</strong> {{ $reservation->statut ?? 'En attente' }}</p>

        @if($reservation->statut=="en_attente")
            <div class="flex gap-2">
                <form method="POST" action="{{ route('admin.reservations.update', $reservation) }}" class="">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="statut" value="acceptée">
                    <button class="bg-green-600 text-white px-4 py-1 rounded hover:bg-green-700">Accepter</button>
                </form>

                <form method="POST" action="{{ route('admin.reservations.update', $reservation) }}" class="">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="statut" value="annulée">
                    <button class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700">Annuler</button>
                </form>
            </div>
        @endif

        <div class="pt-4">
            <a href="{{ route('admin.reservations.index') }}" class="px-4 py-2 border rounded">Retour</a>
        </div>
    </div>
@endsection
