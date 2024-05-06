<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inknut+Antiqua&display=swap">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<header class="relative z-1">
    <div class="top-0 left-0 w-full overflow-hidden z-0">
        <video autoplay muted loop class="absolute top-0 left-0 min-w-full object-cover video-background" style="height:320px;">
            <source src="{{ asset('img/video4.mp4') }}" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>
    </div>
    <div class="flex flex-row justify-between pt-10">
        <div class="relative pl-3">
            
            <img src="{{ asset('img/logo.jpg') }}" alt="logo">
        </div>
        <div class="relative pt-8">
            @if (Route::has('login'))
                <nav class="flex justify-center flex-row gap-8 items-center">
                <img src="{{ asset('img/perfil.png') }}" alt="perfil" class=" w-7 h-7">
                    @auth
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('loginUser.index') }}" class="font-sans text-white text-xl hover:text-yellow-400">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('registerUser.index') }}" class="font-sans text-xl text-white hover:text-yellow-400">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
        <div class="relative flex justify-center flex-row items-center gap-2">
            <img src="{{ asset('img/esp.jpg') }}" alt="esp">
            <a href="#"><img src="{{ asset('img/arrow.png') }}" alt="arrow" class=" w-4 h-4"></a>         
            <p class="text-white">ES</p>
        </div>
        <div class="relative flex justify-center flex-row pr-10">
        <a href="{{ route('tallerLogin.index') }}" class="relative font-sans font-bold bg-gray-100 rounded border-black text-black text-xs p-4 pl-6 pr-6 leading-7">
            <p>INCLUYE TU NEGOCIO<br>A NUESTROS SERVICIOS</p>
        </a>
        </div>
        
    </div>
</header>
    <main class=" pt-64 pb-32">
        <h1 class="font-sans text-2xl text-black pl-10">Recomendado</h1> 
        
        
        <hr class="mt-20 w-10/12 mx-auto border-t-1 border-black">

        <div class="flex justify-around flex-row w-full pt-20 align-middle">
            <div class="flex pl-32 w-1/2 text-left flex-col gap-16">
                <h1 class="font-bold">PIDE CITA PARA TU TALLER LOCAL O</br> 
                    INNOVA CON OTROS TALLERES CERCANOS:</h1>
                <p>
                    ¿Quieres reservar una cita con un taller mecánico en tu zona? ¿Te gustaría reservar una cita para revisar tu automovil, 
                    cambio de aceite y filtros de aire, o incluso revision antes de la ITV a fondo?
                </p>
            </div>
            <div class="flex justify-center w-1/2">
                <img src="{{ asset('img/coche3.jpg') }}" alt="esp" class=" w-3/6 h-6/6">
            </div>
            
        </div>

        <hr class="mt-20 w-10/12 mx-auto border-t-1 border-black">

        <div class="flex justify-around flex-row w-full pt-20 align-middle">
            <div class="flex justify-center w-1/2">
                <img src="{{ asset('img/coche2.jpg') }}" alt="esp" class=" w-3/6 h-6/6">
            </div>
            <div class="flex pr-32 w-1/2 text-left flex-col gap-10">
                <h1 class="font-bold">NOSOTROS NOS ENCARGAMOS!!</h1>
                <p>
                Descarga B&O, la aplicación gratuita de reserva de citas para talleres mecánicos online,
                1 y gestiona tus citas desde cualquier lugar. Modifica o cancela tus reservas sin necesidad de llamar por teléfono.
                </p>
            </div>
           
            
        </div>

        <hr class="mt-20 w-10/12 mx-auto border-t-1 border-black">

        <div class="flex justify-around flex-row w-full pt-20 align-middle">
            <div class="flex pl-32 w-1/2 text-left flex-col gap-6">
                <h1 class="font-bold">RESERVA CON LOS MEJORES PROFESIONALES CERCA DE TI:</h1>
                <p>
                Navega por la plataforma para descubrir los mejores talleres mecánicos que hay en B&O.
                </p>
                <p>
                Echa un vistazo al perfil del negocio y conoce las opiniones de otros usuarios gracias a las reseñas verificadas. También puedes ver los resultados de su trabajo.
                </p>
                <p>
                Ahorra tiempo y deja el estrés a otro. Con B&O, reservar tu próxima cita a un taller mecáncio cercano (o no), es gratis, fácil y rápido.
                </p>
            </div>
            <div class="flex justify-center w-10/12">
                <img src="{{ asset('img/coche1.jpg') }}" alt="esp" class="w-3/6 h-4/6">
            </div>
           
            
        </div>


    </main>

    <footer class="bg-black pt-10">
        <div class="flex justify-around flex-row">
                <ul class="font-sans text-gray-200 text-xs flex justify-around flex-row gap-10 pt-4">
                    <li>Blog</li>
                    <li>Quienes somos</li>
                    <li>Preguntas frecuentes</li>
                    <li>Política de Privacidad</li>
                    <li>Condiciones de uso</li>
                    <li>Empleos</li>
                    <li>Contacto</li>
                </ul>
            <div class="flex justify-around gap-10 pb-10">
            <img src="{{ asset('img/apple.png') }}" alt="apple" class="">
            <img src="{{ asset('img/google.png') }}" alt="google" class="">
            </div>
           
        </div>
        <hr class="mb-6 w-10/12 mx-auto border-t-1 border-white">
        <div class="flex justify-between flex-row pb-5">
            <div class="flex justify-around w-1/2 items-center">
                <img src="{{ asset('img/logo.jpg') }}" alt="logo" class=" w-40">
                <p class=" text-gray-400 text-xs ">©2024 B&O Inc. Todos los derechos reservados</p>
            </div>
            <div class="flex justify-center flex-row items-center pr-16 gap-7">
                <a href="https://www.instagram.com/bookandoil/"><img src="{{ asset('img/insta.png') }}" alt="insta"></a>
                <img src="{{ asset('img/facebook.png') }}" alt="facebook">
                <img src="{{ asset('img/twitter.png') }}" alt="twitter">
            </div>
        </div>

    </footer>
    </div>
    </div>
    </div>
</body>

</html>