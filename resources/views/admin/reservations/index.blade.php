@extends('layouts.admin')

@section('title', 'Réservations')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Liste des réservations</h2>

    <table class="w-full bg-white rounded shadow text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Utilisateur</th>
                <th class="px-4 py-2">Voiture</th>
                <th class="px-4 py-2">Début</th>
                <th class="px-4 py-2">Fin</th>
                <th class="px-4 py-2">Statut</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $r)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $r->user->name }}</td>
                    <td class="px-4 py-2">{{ $r->voiture->marque }} {{ $r->voiture->modele }}</td>
                    <td class="px-4 py-2">{{ $r->date_debut }}</td>
                    <td class="px-4 py-2">{{ $r->date_fin }}</td>
                    <td class="px-4 py-2">{{ $r->statut ?? 'En attente' }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.reservations.show', $r) }}" class="text-indigo-600 hover:underline">Voir</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $reservations->links() }}
    </div>
@endsection
