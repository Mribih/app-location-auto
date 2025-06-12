<x-app-layout>
    <div class="p-6">
        <div class="bg-white rounded-lg shadow p-6 border border-gray-200">
            @if($voiture->image)
                <img src="{{ asset('storage/' . $voiture->image) }}" alt="{{ $voiture->marque }} {{ $voiture->modele }}" class="w-full h-40 object-cover mb-3 rounded">
            @endif

            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $voiture->marque }} {{ $voiture->modele }}</h2>

            <p class="text-gray-700 mb-2">
                Prix : <span class="font-semibold">{{ $voiture->prix_journalier }} DH</span> / jour
            </p>

            <p class="text-gray-700 mb-4">
                Disponibilité :
                <span class="{{ $voiture->disponible ? 'text-green-600' : 'text-red-600' }}">
                    {{ $voiture->disponible ? 'Disponible' : 'Indisponible' }}
                </span>
            </p>

            @if($voiture->disponible)
                <a href="{{ route('reservations.create', $voiture) }}"
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Réserver cette voiture
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
