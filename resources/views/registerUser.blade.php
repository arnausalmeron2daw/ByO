<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                {{ session('error') }}
            </div>
        @endif
    <div class="min-h-screen flex justify-center items-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Registro de Usuario</h2>
            <form action="{{ route('registerUser.index') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre:</label>
                    <input type="text" id="name" name="name" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>
                
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                    <input type="email" id="email" name="email" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>
                
                <div class="mb-6">
                    <label for="contrasena" class="block text-gray-700 font-semibold mb-2">Contraseña:</label>
                    <input type="password" id="password" name="password" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="mb-6">
                    <label for="repetirContrasena" class="block text-gray-700 font-semibold mb-2">Repetir Contraseña:</label>
                    <input type="password" id="repeatPassword" name="repeatPassword" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>
                
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors">Registrarse</button>
            </form>
        </div>
    </div>
</body>
</html>
