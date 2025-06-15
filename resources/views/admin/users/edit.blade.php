@extends('layouts.admin')

@section('title', 'Modifier utilisateur')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Modifier l’utilisateur</h2>

    <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-4 max-w-xl">
        @csrf
        @method('PUT')

        <div>
            <label>Nom</label>
            <input name="name" value="{{ old('name', $user->name) }}" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border px-3 py-2 rounded" required />
        </div>

        <div>
            <label>Rôle</label>
            <select name="role" class="w-full border px-3 py-2 rounded" required>
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Utilisateur</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Administrateur</option>
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enregistrer</button>
    </form>
@endsection
