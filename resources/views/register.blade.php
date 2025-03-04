<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 text-gray-200">
    <div class="w-full max-w-md p-8 bg-gray-800/90 backdrop-blur-md rounded-xl shadow-2xl">
        <h2 class="text-3xl font-bold text-center text-gray-100 mb-6">Inscription</h2>
        <form action="/register" method="POST" class="space-y-6">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Nom</label>
                <div class="relative">
                    <input type="text" name="name" required 
                        class="w-full p-3 pl-12 border border-gray-600 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-200 transition-all duration-200 ease-in-out placeholder-gray-400"
                        placeholder="Votre nom">
                    <span class="absolute left-3 top-3 text-gray-400 text-xl">
                        
                    </span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Email</label>
                <div class="relative">
                    <input type="email" name="email" required 
                        class="w-full p-3 pl-12 border border-gray-600 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-200 transition-all duration-200 ease-in-out placeholder-gray-400"
                        placeholder="Votre email">
                    <span class="absolute left-3 top-3 text-gray-400 text-xl">
                        
                    </span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Mot de passe</label>
                <div class="relative">
                    <input type="password" name="password" required 
                        class="w-full p-3 pl-12 border border-gray-600 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-200 transition-all duration-200 ease-in-out placeholder-gray-400"
                        placeholder="Votre mot de passe">
                    <span class="absolute left-3 top-3 text-gray-400 text-xl">
                    
                    </span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">Confirmer le mot de passe</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" required 
                        class="w-full p-3 pl-12 border border-gray-600 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-200 transition-all duration-200 ease-in-out placeholder-gray-400"
                        placeholder="Confirmez votre mot de passe">
                    <span class="absolute left-3 top-3 text-gray-400 text-xl">
                        
                    </span>
                </div>
            </div>
            <button type="submit" 
                class="w-full mt-6 p-3 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition-all duration-200 ease-in-out shadow-lg">
                S'inscrire
            </button>
        </form>
        <p class="mt-4 text-center text-sm text-gray-400">Déjà un compte ? 
            <a href="/login" class="text-blue-400 hover:text-blue-300 transition-all duration-200">Se connecter</a>
        </p>
    </div>
</body>
</html>