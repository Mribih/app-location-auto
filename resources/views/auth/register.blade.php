<x-guest-layout>
    <div class="w-full max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Inscription</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium text-sm text-gray-700">Nom</label>
                <input type="text" name="name" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-200" required autofocus />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium text-sm text-gray-700">Email</label>
                <input type="email" name="email" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-200" required />
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium text-sm text-gray-700">Mot de passe</label>
                <input type="password" name="password" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-200" required />
            </div>

            <div class="mb-6">
                <label class="block mb-1 font-medium text-sm text-gray-700">Confirmer le mot de passe</label>
                <input type="password" name="password_confirmation" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring focus:ring-blue-200" required />
            </div>

            <button class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">
                S'inscrire
            </button>
        </form>
    </div>
</x-guest-layout>
