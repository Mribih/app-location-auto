<x-app-layout>
    <div class="p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Voitures disponibles</h2>

        <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700">Marque</label>
                <input name="marque" placeholder="Ex: Toyota" class="mt-1 border-gray-300 rounded w-full px-3 py-2" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Prix max</label>
                <input name="prix_max" type="number" placeholder="Ex: 500" class="mt-1 border-gray-300 rounded w-full px-3 py-2" />
            </div>

            <button class="bg-blue-600 text-white font-semibold px-4 py-2 rounded hover:bg-blue-700">
                Filtrer
            </button>
        </form>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($voitures as $v)
                <div class="bg-white rounded shadow p-4 border border-gray-200">
                    @if($v->image)
                        <img src="{{ asset('storage/' . $v->image) }}" alt="{{ $v->marque }} {{ $v->modele }}" class="w-full h-40 object-cover mb-3 rounded">
                    @endif
                    <h3 class="text-lg font-semibold text-gray-900">{{ $v->marque }} - {{ $v->modele }}</h3>
                    <p class="text-gray-600">{{ $v->prix_journalier }} DH / jour</p>
                    <a href="{{ route('voitures.show', $v) }}" class="inline-block mt-2 text-blue-600 hover:underline">
                        Voir détails
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-8">{{ $voitures->links() }}</div>
    </div>
</x-app-layout>
