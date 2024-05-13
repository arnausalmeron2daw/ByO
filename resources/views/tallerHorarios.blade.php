<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Taller</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('img/fondotaller.png') }}')">
    <div class=" fixed pt-10 ">
        <a href="{{ url('/') }}"><img src="{{ asset('img/logo.jpg') }}" alt="logo" class="pl-3"></a>
    </div>
    <div class="min-h-screen flex justify-center items-center">
        <div class="max-w-md w-full bg-white p-8 rounded-lg shadow-md">
            <form class="formulario" action="{{ route('tallerHorarios.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-3 gap-10">
                    <div>
                        <label for="lunes_cerrado" class="block text-gray-700 font-semibold mb-2">Lunes
                            (Cerrado):</label>
                        <input type="checkbox" id="lunes_cerrado" name="lunes_cerrado"
                            class="form-checkbox h-5 w-5 text-blue-500">
                    </div>
                    <div>
                        <label for="lunes_apertura" class="block text-gray-700 font-semibold mb-2">Lunes
                            (Apertura):</label>
                        <input type="time" id="lunes_apertura" name="lunes_apertura"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="lunes_cierre" class="block text-gray-700 font-semibold mb-2">Lunes
                            (Cierre):</label>
                        <input type="time" id="lunes_cierre" name="lunes_cierre"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div>
                        <label for="martes_cerrado" class="block text-gray-700 font-semibold mb-2">Martes
                            (Cerrado):</label>
                        <input type="checkbox" id="martes_cerrado" name="martes_cerrado"
                            class="form-checkbox h-5 w-5 text-blue-500">
                    </div>
                    <div>
                        <label for="martes_apertura" class="block text-gray-700 font-semibold mb-2">Martes
                            (Apertura):</label>
                        <input type="time" id="martes_apertura" name="martes_apertura"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="martes_cierre" class="block text-gray-700 font-semibold mb-2">Martes
                            (Cierre):</label>
                        <input type="time" id="martes_cierre" name="martes_cierre"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div>
                        <label for="miercoles_cerrado" class="block text-gray-700 font-semibold mb-2">Miercoles
                            (Cerrado):</label>
                        <input type="checkbox" id="miercoles_cerrado" name="miercoles_cerrado"
                            class="form-checkbox h-5 w-5 text-blue-500">
                    </div>
                    <div>
                        <label for="miercoles_apertura" class="block text-gray-700 font-semibold mb-2">Miércoles
                            (Apertura):</label>
                        <input type="time" id="miercoles_apertura" name="miercoles_apertura"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="miercoles_cierre" class="block text-gray-700 font-semibold mb-2">Miércoles
                            (Cierre):</label>
                        <input type="time" id="miercoles_cierre" name="miercoles_cierre"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div>
                        <label for="jueves_cerrado" class="block text-gray-700 font-semibold mb-2">Jueves
                            (Cerrado):</label>
                        <input type="checkbox" id="jueves_cerrado" name="jueves_cerrado"
                            class="form-checkbox h-5 w-5 text-blue-500">
                    </div>
                    <div>
                        <label for="jueves_apertura" class="block text-gray-700 font-semibold mb-2">Jueves
                            (Apertura):</label>
                        <input type="time" id="jueves_apertura" name="jueves_apertura"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="jueves_cierre" class="block text-gray-700 font-semibold mb-2">Jueves
                            (Cierre):</label>
                        <input type="time" id="jueves_cierre" name="jueves_cierre"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div>
                        <label for="viernes_cerrado" class="block text-gray-700 font-semibold mb-2">Viernes
                            (Cerrado):</label>
                        <input type="checkbox" id="viernes_cerrado" name="viernes_cerrado"
                            class="form-checkbox h-5 w-5 text-blue-500">
                    </div>

                    <div>
                        <label for="viernes_apertura" class="block text-gray-700 font-semibold mb-2">Viernes
                            (Apertura):</label>
                        <input type="time" id="viernes_apertura" name="viernes_apertura"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="viernes_cierre" class="block text-gray-700 font-semibold mb-2">Viernes
                            (Cierre):</label>
                        <input type="time" id="viernes_cierre" name="viernes_cierre"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div>
                        <label for="sabado_cerrado" class="block text-gray-700 font-semibold mb-2">Sabado
                            (Cerrado):</label>
                        <input type="checkbox" id="sabado_cerrado" name="sabado_cerrado"
                            class="form-checkbox h-5 w-5 text-blue-500">
                    </div>
                    <div>
                        <label for="sabado_apertura" class="block text-gray-700 font-semibold mb-2">Sábado
                            (Apertura):</label>
                        <input type="time" id="sabado_apertura" name="sabado_apertura"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="sabado_cierre" class="block text-gray-700 font-semibold mb-2">Sábado
                            (Cierre):</label>
                        <input type="time" id="sabado_cierre" name="sabado_cierre"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>

                    <div>
                        <label for="domingo_cerrado" class="block text-gray-700 font-semibold mb-2">Domingo
                            (Cerrado):</label>
                        <input type="checkbox" id="domingo_cerrado" name="domingo_cerrado"
                            class="form-checkbox h-5 w-5 text-blue-500">
                    </div>
                    <div>
                        <label for="domingo_apertura" class="block text-gray-700 font-semibold mb-2">Domingo
                            (Apertura):</label>
                        <input type="time" id="domingo_apertura" name="domingo_apertura"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                    <div>
                        <label for="domingo_cierre" class="block text-gray-700 font-semibold mb-2">Domingo
                            (Cierre):</label>
                        <input type="time" id="domingo_cierre" name="domingo_cierre"
                            class="w-full px-3 py-2 border rounded-md">
                    </div>
                </div>

                <button type="submit" id="enviarDatos" name="enviarDatos"
                    class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors btn1">Siguiente</button>

            </form>



        </div>
    </div>
    <script>
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const aperturaInput = this.parentElement.nextElementSibling.querySelector('input[type="time"]');
                const cierreInput = this.parentElement.nextElementSibling.nextElementSibling.querySelector('input[type="time"]');
                if (this.checked) {
                    aperturaInput.disabled = true;
                    cierreInput.disabled = true;
                } else {
                    aperturaInput.disabled = false;
                    cierreInput.disabled = false;
                }
            });
        });
    </script>

</body>