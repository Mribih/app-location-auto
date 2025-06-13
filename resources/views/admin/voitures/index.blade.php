@extends('layouts.admin')

@section('title', 'Voitures')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Liste des voitures</h2>
        <a href="{{ route('admin.voitures.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Ajouter
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full bg-white shadow rounded text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Marque</th>
                <th class="px-4 py-2">Modèle</th>
                <th class="px-4 py-2">Prix</th>
                <th class="px-4 py-2">Dispo</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($voitures as $v)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">
                        @if($v->image)
                            <img src="{{ asset('storage/' . $v->image) }}" class="w-16 h-12 object-cover rounded">
                        @else
                            <span class="text-gray-400">Aucune</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $v->marque }}</td>
                    <td class="px-4 py-2">{{ $v->modele }}</td>
                    <td class="px-4 py-2">{{ $v->prix_journalier }} DH</td>
                    <td class="px-4 py-2">
                        <span class="{{ $v->disponible ? 'text-green-600' : 'text-red-600' }}">
                            {{ $v->disponible ? 'Oui' : 'Non' }}
                        </span>
                    </td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.voitures.show', $v) }}" class="text-indigo-600 hover:underline">Voir</a>
                        <a href="{{ route('admin.voitures.edit', $v) }}" class="text-blue-600 hover:underline">Modifier</a>
                        <form action="{{ route('admin.voitures.destroy', $v) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Supprimer ?')" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $voitures->links() }}
    </div>
@endsection
