<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Taller</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex justify-center items-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Registro del Taller</h2>
            <form class="formulario" action="{{ route('tallerRegister2.store') }}" method="POST">
                @csrf

                    <div class="mb-6">
                        <label for="location" class="block text-gray-700 font-semibold mb-2">Ubicacion del Taller: </label>
                        <input type="text" id="location" name="location" class="border border-gray-300 rounded-md px-4 py-2 w-full" required placeholder="Inserte la url de Google Maps">
                    </div>

                    <div class="mb-6">
                        <label for="empleados" class="block text-gray-700 font-semibold mb-2">Numero de empleados: </label>
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
                        <input type="file" id="logo" name="logo" accept="image/*" class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                    </div>

                 
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors btn1">Siguiente</button>
                
            </form>
        

        </div>
    </div>


</body>
</html>
