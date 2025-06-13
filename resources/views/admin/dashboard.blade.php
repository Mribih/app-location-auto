@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6">Tableau de bord Admin</h2>

        <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="bg-white shadow rounded p-4 text-center">
                <div class="text-lg font-semibold text-gray-700">Voitures</div>
                <div class="text-3xl font-bold">{{ $totalVoitures }}</div>
            </div>

            <div class="bg-white shadow rounded p-4 text-center">
                <div class="text-lg font-semibold text-gray-700">Utilisateurs</div>
                <div class="text-3xl font-bold">{{ $totalUtilisateurs }}</div>
            </div>

            <div class="bg-white shadow rounded p-4 text-center">
                <div class="text-lg font-semibold text-gray-700">Réservations</div>
                <div class="text-3xl font-bold">{{ $totalReservations }}</div>
            </div>
        </div>

        <h3 class="text-xl font-semibold mb-4">Réservations récentes</h3>

        <div class="bg-white shadow rounded p-4 overflow-x-auto">
            <table class="w-full table-auto text-left text-sm">
                <thead class="text-gray-600 border-b">
                    <tr>
                        <th class="px-4 py-2">Utilisateur</th>
                        <th class="px-4 py-2">Voiture</th>
                        <th class="px-4 py-2">Début</th>
                        <th class="px-4 py-2">Fin</th>
                        <th class="px-4 py-2">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentReservations as $res)
                        <tr class="border-b">
                            <td class="px-4 py-2">{{ $res->user->name }}</td>
                            <td class="px-4 py-2">{{ $res->voiture->marque }} {{ $res->voiture->modele }}</td>
                            <td class="px-4 py-2">{{ $res->date_debut }}</td>
                            <td class="px-4 py-2">{{ $res->date_fin }}</td>
                            <td class="px-4 py-2">{{ ucfirst($res->statut) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-gray-500 py-4">Aucune réservation récente</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

