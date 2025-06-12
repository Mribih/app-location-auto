<x-app-layout>
    <div class="p-6 max-w-xl mx-auto bg-white rounded shadow mt-4">
        <h2 class="text-xl font-bold mb-4">Réserver {{ $voiture->marque }} {{ $voiture->modele }}</h2>

        <form method="POST" action="{{ route('reservations.store', $voiture) }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Date de début</label>
                <input type="date" name="date_debut" class="w-full border px-3 py-2 rounded" required />
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700">Date de fin</label>
                <input type="date" name="date_fin" class="w-full border px-3 py-2 rounded" required />
            </div>

            <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Réserver</button>
        </form>
    </div>
</x-app-layout>
