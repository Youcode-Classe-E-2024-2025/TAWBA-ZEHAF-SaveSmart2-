<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription </title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 h-screen flex items-center justify-center">

    <!-- Container -->
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-3xl font-semibold text-center mb-6">Créer un compte</h2>

        <!-- Formulaire d'inscription -->

        <form method="POST" action="{{ route('register.post') }}" class="space-y-4">
            @csrf
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="mb-4">
                <label for="name" class="block text-gray-700">Nom complet</label>
                <input type="text" id="name" name="name"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Adresse e-mail</label>
                <input type="email" id="email" name="email"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700">Mot de passe</label>
                <input type="password" id="password" name="password"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required>
            </div>

            <button type="submit"
                class="w-full py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">S'inscrire</button>
        </form>

        <div class="text-center mt-4">
            <p class="text-sm">Vous avez déjà un compte ? <a href="{{ route('login') }}"
                    class="text-indigo-600 hover:underline">Se connecter</a></p>
        </div>
    </div>

</body>

</html>