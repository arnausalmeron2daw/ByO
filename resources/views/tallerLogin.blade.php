<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión Taller</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/fondotaller.png') }}')">

    <div class=" fixed pt-10 ">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.jpg') }}" alt="logo" class="pl-3"></a>
    </div>
    <div class="min-h-screen flex justify-center items-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Inicio de Sesión del Taller</h2>

            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif

            <form class="formulario" action="{{ route('tallerLogin.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                    <input type="email" id="email" name="email"
                        class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Contraseña:</label>
                    <input type="password" id="password" name="password"
                        class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors">Iniciar
                    Sesión</button>

                <div class="mt-4">
                    <p>¿No tienes cuenta? <a href="{{ route('tallerRegister.index') }}"
                            class="text-blue-500">Regístrate</a></p>
                </div>
            </form>
        </div>
    </div>
</body>

</html>