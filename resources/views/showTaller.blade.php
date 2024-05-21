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

        <main class="pt-64 pb-32">

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
            <x-slot name="title">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $taller->name }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                        <div class="grid grid-cols-3 gap-8">
                            <div class="mb-6">
                                <img src="data:image/png;base64,{{ $taller->logo }}" alt="Logo del Taller"
                                    class="w-full h-full object-contain">
                            </div>
                            <div class="mt-32 mb-8 text-lg">
                                <h1 class="text-5xl font-bold mb-12">{{ $taller->name }}</h1>
                                <div class="mb-32 text-2xl">
                                    <p><strong>Teléfono: </strong> {{ $taller->telefono }}</p>
                                    <p><strong>Email: </strong> {{ $taller->email }}</p>
                                    <p><strong>Numero Empleados: </strong> {{ $taller->numEmpleados }}</p>
                                    <p><strong>Ubicación: </strong><a href="{{ $taller->location }}"><u
                                                class="text-blue">Clicka aqui!</u></a></p>
                                </div>
                            </div>
                            <div class="mb-8 mt-32 text-lg">
                                <p class=" text-2xl"><strong>Horario:</strong></p>
                                <ul class="mb-32 text-2xl">
                                    @if($horarioTaller->lunes_cerrado)
                                        <li>Lunes: Cerrado</li>
                                    @else
                                        <li>Lunes: {{ $horarioTaller->lunes_apertura }} -
                                            {{ $horarioTaller->lunes_cierre }}
                                        </li>
                                    @endif

                                    @if($horarioTaller->martes_cerrado)
                                        <li>Martes: Cerrado</li>
                                    @else
                                        <li>Martes: {{ $horarioTaller->martes_apertura }} -
                                            {{ $horarioTaller->martes_cierre }}
                                        </li>
                                    @endif

                                    @if($horarioTaller->miercoles_cerrado)
                                        <li>Miercoles: Cerrado</li>
                                    @else
                                        <li>Miercoles: {{ $horarioTaller->miercoles_apertura }} -
                                            {{ $horarioTaller->miercoles_cierre }}
                                        </li>
                                    @endif

                                    @if($horarioTaller->jueves_cerrado)
                                        <li>Jueves: Cerrado</li>
                                    @else
                                        <li>Jueves: {{ $horarioTaller->jueves_apertura }} -
                                            {{ $horarioTaller->jueves_cierre }}
                                        </li>
                                    @endif

                                    @if($horarioTaller->viernes_cerrado)
                                        <li>Viernes: Cerrado</li>
                                    @else
                                        <li>Viernes: {{ $horarioTaller->viernes_apertura }} -
                                            {{ $horarioTaller->viernes_cierre }}
                                        </li>
                                    @endif

                                    @if($horarioTaller->sabado_cerrado)
                                        <li>Sabado: Cerrado</li>
                                    @else
                                        <li>Sabado: {{ $horarioTaller->sabado_apertura }} -
                                            {{ $horarioTaller->sabado_cierre }}
                                        </li>
                                    @endif

                                    @if($horarioTaller->domingo_cerrado)
                                        <li>Domingo: Cerrado</li>
                                    @else
                                        <li>Domingo: {{ $horarioTaller->domingo_apertura }} -
                                            {{ $horarioTaller->domingo_cierre }}
                                        </li>
                                    @endif

                                    <!-- Repetir para los demás días -->
                                </ul>
                                <div class="flex justify-center  mt-8">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        onclick="toggleModalAddReserva()">Hacer una reserva</button>
                                </div>
                            </div>



                        </div>

                    </div>

                </div>
            </div>
    </div>






    <!-- Modal de reserva -->
    <div id="modalAddReserva" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Agregar Nueva Reserva
                            </h3>
                            <div class="mt-2">
                                <!-- Aquí va el formulario de reserva -->
                                <form action="{{ route('reserva.cli.store') }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="id_user" class="block text-gray-700 font-bold mb-2">ID
                                            Usuario</label>
                                        <input type="text" class="form-input w-full" id="id_user" name="id_user"
                                            value="{{ session('id_user') }}" required readonly
                                            placeholder="Si es vuestro cliente poner 1">
                                    </div>
                                    <div class="mb-4">
                                        <label for="id_taller" class="block text-gray-700 font-bold mb-2">ID
                                            Taller</label>
                                        <input type="text" class="form-input w-full" id="id_taller" name="id_taller"
                                            value="{{ $taller->id }}" readonly required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="day" class="block text-gray-700 font-bold mb-2">Día</label>
                                        <input type="date" class="form-input w-full" id="day" name="day" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="start_date" class="block text-gray-700 font-bold mb-2">Fecha
                                            de Inicio</label>
                                        <input type="datetime-local" class="form-input w-full" id="start_date"
                                            name="start_date" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="end_date" class="block text-gray-700 font-bold mb-2">Fecha
                                            de Fin</label>
                                        <input type="datetime-local" class="form-input w-full" id="end_date"
                                            name="end_date" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="descripcion"
                                            class="block text-gray-700 font-bold mb-2">Descripción</label>
                                        <input type="text" class="form-input w-full" id="descripcion"
                                            name="descripcion">
                                    </div>
                                    <div class="mb-4">
                                        <label for="cita" class="block text-gray-700 font-bold mb-2">Cita</label>
                                        <input type="text" class="form-input w-full" id="cita" name="cita">
                                    </div>
                                    <div class="flex justify-end space-x-4">
                                        <button type="button"
                                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                                            id="closeModalAddReserva">Cerrar</button>
                                        <button type="submit"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Agregar
                                            Reserva</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                <a href="https://www.instagram.com/bookandoil/"><img src="{{ asset('img/insta.png') }}" alt="insta"></a>
                <img src="{{ asset('img/facebook.png') }}" alt="facebook">
                <img src="{{ asset('img/twitter.png') }}" alt="twitter">
            </div>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        }

        function toggleModalAddReserva() {
            var modal = document.getElementById("modalAddReserva");
            modal.classList.toggle("hidden");
        }

        var closeButton = document.getElementById("closeModalAddReserva");
        closeButton.onclick = toggleModalAddReserva;
    </script>
</x-app-layout>