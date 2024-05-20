<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Información del Taller</title>
    <link rel="stylesheet" href="{{ asset('css/taller.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div id="header" class="bg-blue-500 p-4 flex justify-between items-center">
        <div class="logo">
            <h2 class="text-white text-2xl font-bold">LOGO</h2>
        </div>
        <div class="nameTaller">
            <h2 class="text-white text-xl">
                Hola {{ session('Taller') ? session('Taller')->name : 'Invitado' }}
            </h2>
        </div>
    </div>

    <div id="menu" class="bg-gray-800 p-4 flex justify-between items-center">
        <div class="titleCalendar">
            <a href="{{ asset('reservas') }}" class="text-white text-lg"><u>Calendario</u></a>
        </div>
        <div class="configuracion">
            <a href="#" class="text-white text-lg"><u><b>Configuración</b></u></a>
        </div>
    </div>

    <div id="config" class="container mx-auto mt-8 p-4 bg-white shadow-lg rounded-lg">
        <div class="titleperfil text-blue-600 text-2xl mb-4">
            <u>Información del negocio</u>
        </div>

        @if(session('Taller'))
            <div class="nombreTaller text-blue-800 text-lg mb-2">
                <b>Nombre: </b>{{ session('Taller')->name }}
            </div>
            <div class="correoTaller text-blue-800 text-lg mb-2">
                <b>Correo: </b>{{ session('Taller')->email }}
            </div>
            <div class="telefonoTaller text-blue-800 text-lg mb-2">
                <b>Teléfono: </b>{{ session('Taller')->telefono }}
            </div>
            <div class="ubicacionTaller text-blue-800 text-lg mb-2">
                <b>Ubicación: </b>{{ session('Taller')->location }}
            </div>
        @else
            <div class="nombreTaller text-blue-800 text-lg mb-2">
                <b>Nombre: </b>No disponible
            </div>
            <div class="correoTaller text-blue-800 text-lg mb-2">
                <b>Correo: </b>No disponible
            </div>
            <div class="telefonoTaller text-blue-800 text-lg mb-2">
                <b>Teléfono: </b>No disponible
            </div>
            <div class="ubicacionTaller text-blue-800 text-lg mb-2">
                <b>Ubicación: </b>No disponible
            </div>
        @endif

        <div class="titleHorario text-blue-600 text-2xl mt-8 mb-4">
            <u>Horarios de servicio</u>
        </div>
        <div class="lunes text-blue-800 text-lg mb-2">Lunes: </div>
        <div class="martes text-blue-800 text-lg mb-2">Martes: </div>
        <div class="miercoles text-blue-800 text-lg mb-2">Miércoles: </div>
        <div class="jueves text-blue-800 text-lg mb-2">Jueves: </div>
        <div class="viernes text-blue-800 text-lg mb-2">Viernes: </div>
        <div class="sabado text-blue-800 text-lg mb-2">Sábado: </div>
        <div class="domingo text-blue-800 text-lg mb-2">Domingo: </div>

        <div class="titleEmpleados text-blue-600 text-2xl mt-8 mb-4">
            <u>Empleados</u>
        </div>

        <div class="titleRedesSociales text-blue-600 text-2xl mt-8 mb-4">
            <u>Redes Sociales</u>
        </div>
        <div class="instagramTaller text-blue-800 text-lg mb-2">Instagram: </div>
        <div class="facebookTaller text-blue-800 text-lg mb-2">Facebook: </div>

        <div class="flex space-x-4 mt-8">
        <button class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded">
        <a href="{{ asset('tallerEditConfig') }}">Editar configuración</a>
    </button>
    
    <form action="{{ route('logout.log') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Cerrar sesión</button>
    </form>
    
        </div>
    </div>
    
    <script src="{{ asset('js/taller.js') }}"></script>
</body>
</html>