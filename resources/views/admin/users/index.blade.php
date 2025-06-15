@extends('layouts.admin')

@section('title', 'Utilisateurs')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Liste des utilisateurs</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
    @endif

    <table class="w-full bg-white rounded shadow text-sm">
        <thead class="bg-gray-100 text-left">
            <tr>
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Rôle</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $user->name }}</td>
                    <td class="px-4 py-2">{{ $user->email }}</td>
                    <td class="px-4 py-2 capitalize">{{ $user->role }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.users.show', $user) }}" class="text-indigo-600 hover:underline">Voir</a>
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline">Modifier</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Supprimer ?')" class="text-red-600 hover:underline">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
