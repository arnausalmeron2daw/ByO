<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Incluye los estilos y scripts necesarios -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <div class="relative z-1">
    <div class="top-0 left-0 w-full overflow-hidden z-0">
                <video autoplay muted loop class="absolute top-0 left-0 min-w-full object-cover video-background"
                    style="height:320px;">
                    <source src="{{ asset('img/video4.mp4') }}" type="video/mp4">
                    Tu navegador no soporta video HTML5.
                </video>
            </div>
            <div class="flex flex-row justify-between pt-10">
                <div class="relative pl-5 pt-3">
                    <img src="{{ asset('img/logo.jpg') }}" alt="logo">
                </div>

                <div class="relative flex justify-center flex-row pr-10 text-white text-2xl items-center mt-0 pt-0">
                    <h1 class="inline-block">Bienvenido {{ session('user')['name'] }}</h1>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABlklEQVR4nO2Uv0rDUBTGv1ZQSjKpIGToA7i4ZMkb6OTUMc+hS7f2voRT3QrSTjpnceqSrUUQHDpkFSlBsTmSkkCoEdN4/0Q4PzjL5ebwfZD7AxiGYRiGYZgiRwDuAMQAqCETZ5kOUYGHBgSmH+a+SoEkvTyfz6kpLBaLvEBSucBgMKCmMBwOdyrwnl5ut9s0mUxMZ6fpdLrJkhX4qFIgzP+5TqdDs9nMWPgwDMm27eIbSLP9yjmAdf6R4zi0XC61h4+iiLrdbjH8OstWievi63ddl1arlbbwcRyT53nbBrrCjtwUF/R6PUqSREsB3/e3w9+iBvsAguIiIYTy8EKI7fCPAA5Qk2MAz/myVqtF4/FYl3EIwAuAE/yRUwCvqs0UfjfOG4AzSOICwKcqM0XlxrmEZJSYKZZkHGNm8iUZx4iZhGTjaDWTKuNoMZNq4yg1ky7jKDGTbuNIN5Nu40g1kynjSDGTaePUMpNlWRQEwWaaYJxaZioZo8apZaamGacqo5Lw6dm/YQ9AH8BTNv3sjGEYhmEgky8aVqPfi/1JrAAAAABJRU5ErkJggg=="
                        class="w-8 h-8 ml-2" onclick="toggleMenu()">
                    <div id="menu" class="hidden absolute rounded-lg shadow-md mt-32 ml-10"
                        style="border-radius: 10px; border: white 2px solid; text-align: center; width: 200px;">
                        <ul>
                            <li><a href="#">Perfil</a></li>
                            <div class="hr-container">
                                <hr class="ml-5 mr-5">
                            </div>
                            <li><a href="#">Cerrar sesión</a></li>
                        </ul>

                    </div>


                </div>

            </div>
        </header>

        <main class="pt-64 pb-32">
            <x-slot name="title">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $taller->name }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <h1 class="text-3xl font-bold">{{ $taller->name }}</h1>
                        <p><strong>Ubicación:</strong> {{ $taller->location }}</p>
                        <p><strong>Teléfono:</strong> {{ $taller->telefono }}</p>
                        <p><strong>Email:</strong> {{ $taller->email }}</p>

                        <!-- Agregar iframe de Google Maps -->
                        <div class="mt-6">
                            
                            <a href="{{ $taller->location }}"><img src="{{ asset('img/ubicacionIMG.png') }}" width="600" height="450" style="border:0" loading="lazy" allowfullscreen></img></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-black pt-10">
            <!-- ... Código del pie de página ... -->
        </footer>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        }
    </script>
</x-app-layout>