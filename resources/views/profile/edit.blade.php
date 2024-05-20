<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="relative z-1">
        <header>
            <div class="top-0 left-0 w-full overflow-hidden z-0">
                <video autoplay muted loop class="absolute top-0 left-0 min-w-full object-cover video-background"
                    style="height:320px;">
                    <source src="{{ asset('img/video4.mp4') }}" type="video/mp4">
                    Tu navegador no soporta video HTML5.
                </video>
            </div>
            <div class="flex flex-row justify-between pt-10">
                <div class="relative pl-5 pt-3">
                    <a href="{{route('dashboard')}}"><img src="{{ asset('img/logo.jpg') }}" alt="logo"></a>
                </div>


                <div class="relative flex justify-center flex-row pr-10 text-white text-2xl items-center mt-0 pt-0">
                    <h1 class="inline-block">Bienvenido {{ session('user')['name'] }}</h1>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABlklEQVR4nO2Uv0rDUBTGv1ZQSjKpIGToA7i4ZMkb6OTUMc+hS7f2voRT3QrSTjpnceqSrUUQHDpkFSlBsTmSkkCoEdN4/0Q4PzjL5ebwfZD7AxiGYRiGYZgiRwDuAMQAqCETZ5kOUYGHBgSmH+a+SoEkvTyfz6kpLBaLvEBSucBgMKCmMBwOdyrwnl5ut9s0mUxMZ6fpdLrJkhX4qFIgzP+5TqdDs9nMWPgwDMm27eIbSLP9yjmAdf6R4zi0XC61h4+iiLrdbjH8OstWievi63ddl1arlbbwcRyT53nbBrrCjtwUF/R6PUqSREsB3/e3w9+iBvsAguIiIYTy8EKI7fCPAA5Qk2MAz/myVqtF4/FYl3EIwAuAE/yRUwCvqs0UfjfOG4AzSOICwKcqM0XlxrmEZJSYKZZkHGNm8iUZx4iZhGTjaDWTKuNoMZNq4yg1ky7jKDGTbuNIN5Nu40g1kynjSDGTaePUMpNlWRQEwWaaYJxaZioZo8apZaamGacqo5Lw6dm/YQ9AH8BTNv3sjGEYhmEgky8aVqPfi/1JrAAAAABJRU5ErkJggg=="
                        class="w-8 h-8 ml-2" onclick="toggleMenu()">
                    <div id="menu" class="hidden absolute rounded-lg shadow-md  ml-10"
                        style="border-radius: 10px; border: white 2px solid; text-align: center; width: 200px; margin-top: 9rem;">
                        <ul>
                            <li><a href="{{route('profile.update')}}">Perfil</a></li>
                            <div class="hr-container">
                                <hr class="ml-5 mr-5">
                            </div>
                            <li><a href="{{route('misReservas.index')}}">Mis reservas</a></li>
                            <div class="hr-container">
                                <hr class="ml-5 mr-5">
                            </div>
                            <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
                        </ul>

                    </div>

                </div>

            </div>
        </header>

        <div class="pt-64 pb-32 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
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
                    <img src="{{ asset('img/apple.png') }}" alt="apple">
                    <img src="{{ asset('img/google.png') }}" alt="google">
                </div>
            </div>
            <hr class="mb-6 w-10/12 mx-auto border-t-1 border-white">
            <div class="flex justify-between flex-row pb-5">
                <div class="flex justify-around w-1/2 items-center">
                    <img src="{{ asset('img/logo.jpg') }}" alt="logo" class=" w-40">
                    <p class="text-gray-400 text-xs ">©2024 B&O Inc. Todos los derechos reservados</p>
                </div>
                <div class="flex justify-center flex-row items-center pr-16 gap-7">
                    <a href="https://www.instagram.com/bookandoil/"><img src="{{ asset('img/insta.png') }}"
                            alt="insta"></a>
                    <img src="{{ asset('img/facebook.png') }}" alt="facebook">
                    <img src="{{ asset('img/twitter.png') }}" alt="twitter">
                </div>
            </div>
        </footer>
    </div>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        }
    </script>
</x-app-layout>