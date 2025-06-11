<x-app-layout>
    <div class="p-6">
        <div class="bg-white rounded-lg shadow p-6 border border-gray-200">
            @if($v->image)
                <img src="{{ asset('storage/' . $v->image) }}" alt="{{ $v->marque }} {{ $v->modele }}" class="w-full h-40 object-cover mb-3 rounded">
            @endif
            <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $voiture->marque }} {{ $voiture->modele }}</h2>
            <p class="text-gray-700 mb-2">Prix : <span class="font-semibold">{{ $voiture->prix_journalier }} DH</span> / jour</p>
            <p class="text-gray-700">Disponibilité :
                <span class="{{ $voiture->disponible ? 'text-green-600' : 'text-red-600' }}">
                    {{ $voiture->disponible ? 'Disponible' : 'Indisponible' }}
                </span>
            </p>
        </div>
    </div>
</x-app-layout>
