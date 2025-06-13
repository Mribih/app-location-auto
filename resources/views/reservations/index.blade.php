<x-app-layout>
    <div class="p-6">
        <h2 class="text-xl font-bold mb-6">Mes réservations</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($reservations as $res)
            <div class="bg-white border rounded p-4 mb-4 shadow-sm">
                <h3 class="text-lg font-semibold mb-1">
                    {{ $res->voiture->marque }} {{ $res->voiture->modele }}
                </h3>
                <p class="text-gray-600">
                    Du <strong>{{ $res->date_debut }}</strong> au <strong>{{ $res->date_fin }}</strong>
                </p>
                <p class="text-sm text-gray-500">Statut : {{ ucfirst($res->statut) }}</p>

                <form action="{{ route('reservations.destroy', $res) }}" method="POST" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600 hover:underline text-sm">Annuler</button>
                </form>
            </div>
        @empty
            <p class="text-gray-600">Vous n'avez aucune réservation pour le moment.</p>
        @endforelse

        <div class="mt-6">{{ $reservations->links() }}</div>
    </div>
</x-app-layout>
