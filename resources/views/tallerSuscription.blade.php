<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/fondotaller.png') }}')">

    <div class=" fixed pt-10 ">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.jpg') }}" alt="logo" class="pl-3"></a>
    </div>
    <div class="min-h-screen flex justify-center items-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-6">Pago del servicio</h2>
            <form class="formulario" action="{{ route('tallerSuscription.store') }}" method="POST">
                @csrf
                <h2 class="text-1xl font-bold mb-6">Datos de pago:</h2>

                <div class="mb-4">
                    <label for="card_number" class="block text-gray-700 font-semibold mb-2">Número de Tarjeta:</label>
                    <input type="text" id="card_number" name="card_number"
                        class="border border-gray-300 rounded-md px-4 py-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="expiry_date" class="block text-gray-700 font-semibold mb-2">Fecha de Caducidad:</label>
                    <input type="text" id="expiry_date" name="expiry_date"
                        class="border border-gray-300 rounded-md px-4 py-2 w-full" placeholder="MM/AA" required>
                </div>

                <div class="mb-6">
                    <label for="cvc" class="block text-gray-700 font-semibold mb-2">CVC:</label>
                    <input type="text" id="cvc" name="cvc" class="border border-gray-300 rounded-md px-4 py-2 w-full"
                        required>
                </div>
                <h2 class="text-1xl font-bold mb-6">Precio del servicio 29.99€/M</h2>



                <button type="submit"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors">Registrarse
                    y Pagar</button>
            </form>


        </div>
    </div>


</body>

</html>