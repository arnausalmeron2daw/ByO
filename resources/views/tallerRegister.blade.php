<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hidden {
            display: none
        }
    </style>
</head>

<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/fondotaller.png') }}')">

    <div class=" fixed pt-10 ">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.jpg') }}" alt="logo" class="pl-3"></a>
    </div>
    <div class="min-h-screen flex justify-center items-center flex-col">

        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <div></div>
            <h2 class="text-2xl font-bold mb-6">Registro del Taller</h2>
            <form class="formulario" action="{{ route('tallerRegister.store') }}" method="POST">

                @csrf
                <div class="" id="form1">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Nombre del Taller:</label>
                        <input type="text" id="name" name="name"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Email:</label>
                        <input type="email" id="email" name="email"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                    </div>

                    <div class="mb-4">
                        <label for="telefono" class="block text-gray-700 font-semibold mb-2">Teléfono:</label>
                        <input type="int" id="email" name="telefono"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                    </div>

                    <div class="mb-6">
                        <label for="contrasena" class="block text-gray-700 font-semibold mb-2">Contraseña:</label>
                        <input type="password" id="password" name="password"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                    </div>

                    <div class="mb-6">
                        <label for="repetirContrasena" class="block text-gray-700 font-semibold mb-2">Repetir
                            Contraseña:</label>
                        <input type="password" id="repeatPassword" name="repeatPassword"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                    </div>


                    <button onclick="mostrarSiguiente('form2', 'form1')"
                        class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors btn1">Siguiente</button>

                    <div class="mt-4">
                        <p>¿Ya tienes cuenta? <a href="{{ route('tallerLogin.index') }}" class="text-blue-500">Inicia
                                sesión con tu empresa</a></p>
                    </div>
                </div>

                <div class="hidden" id="form2">
                    <div class="mb-6">
                        <label for="location" class="block text-gray-700 font-semibold mb-2">Ubicacion del Taller:
                        </label>
                        <input type="text" id="location" name="location"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full" required
                            placeholder="Inserte la url de Google Maps">
                    </div>

                    <div class="mb-6">
                        <label for="empleados" class="block text-gray-700 font-semibold mb-2">Numero de empleados:
                        </label>
                        <select name="cantidad">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="mas_de_5">Más de 5</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="logo" class="block text-gray-700 font-semibold mb-2">Logo de la empresa:</label>
                        <input type="file" id="logo" name="logo" accept="image/*"
                            class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                    </div>


                    <button type="submit" id="enviarDatosTaller" name="enviarDatosTaller"
                        class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors btn1">Siguiente</button>
                   
                </div>
            </form>

        </div>
    </div>

    <script>
      
        function mostrarSiguiente(idMostrar, idOcultar) {

            document.getElementById(idOcultar).classList.add('hidden');
            document.getElementById(idMostrar).classList.remove('hidden');
        }

       
    </script>

</body>

</html>

