<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow h-screen p-4">
        <div class="text-xl font-bold mb-6">Admin</div>

        <nav class="space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-200 font-semibold' : '' }}">
                📊 Dashboard
            </a>
            <a href="{{ route('admin.voitures.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                🚗 Voitures
            </a>
            <a href="{{ route('admin.users.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                👥 Utilisateurs
            </a>
            <a href="{{ route('admin.reservations.index') }}" class="block px-3 py-2 rounded hover:bg-gray-100">
                📆 Réservations
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button class="text-red-600 hover:underline text-sm">Se déconnecter</button>
            </form>
        </nav>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6 overflow-y-auto">
        @yield('content')
    </main>

</body>
</html>
