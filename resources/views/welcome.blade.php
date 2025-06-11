<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienvenue sur LocationVoiture</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-100 to-white min-h-screen flex flex-col items-center justify-center text-gray-800">

    <div class="text-center">
        <h1 class="text-4xl font-bold mb-4">Bienvenue sur LocationVoiture 🚗</h1>
        <p class="mb-6 text-lg">Trouvez, réservez et partez !</p>

        <div class="flex justify-center gap-4">
            <a href="{{ route('login') }}" class="px-5 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Se connecter
            </a>
            <a href="{{ route('register') }}" class="px-5 py-2 border border-blue-600 text-blue-600 rounded hover:bg-blue-50">
                S'inscrire
            </a>
        </div>
    </div>

</body>
</html>
