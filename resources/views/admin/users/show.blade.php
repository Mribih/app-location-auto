@extends('layouts.admin')

@section('title', 'Profil utilisateur')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Détail de l’utilisateur</h2>

    <div class="bg-white p-6 rounded shadow space-y-4 max-w-xl">
        <p><strong>Nom :</strong> {{ $user->name }}</p>
        <p><strong>Email :</strong> {{ $user->email }}</p>
        <p><strong>Rôle :</strong> <span class="capitalize">{{ $user->role }}</span></p>

        <div class="pt-4 flex gap-4">
            <a href="{{ route('admin.users.edit', $user) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Modifier</a>
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 border rounded">Retour</a>
        </div>
    </div>
@endsection
