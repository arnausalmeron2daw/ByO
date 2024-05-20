<!DOCTYPE html>
<html lang="es">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            width: 90%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body class="bg-gray-100">

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
                <img src="{{ asset('img/logo.jpg') }}" alt="logo">
            </div>

            <div class="relative flex justify-center flex-row pr-10 text-white text-2xl items-center mt-0 pt-0">
                <h1 class="inline-block">Bienvenido {{ session('taller')['name'] }}</h1>
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABlklEQVR4nO2Uv0rDUBTGv1ZQSjKpIGToA7i4ZMkb6OTUMc+hS7f2voRT3QrSTjpnceqSrUUQHDpkFSlBsTmSkkCoEdN4/0Q4PzjL5ebwfZD7AxiGYRiGYZgiRwDuAMQAqCETZ5kOUYGHBgSmH+a+SoEkvTyfz6kpLBaLvEBSucBgMKCmMBwOdyrwnl5ut9s0mUxMZ6fpdLrJkhX4qFIgzP+5TqdDs9nMWPgwDMm27eIbSLP9yjmAdf6R4zi0XC61h4+iiLrdbjH8OstWievi63ddl1arlbbwcRyT53nbBrrCjtwUF/R6PUqSREsB3/e3w9+iBvsAguIiIYTy8EKI7fCPAA5Qk2MAz/myVqtF4/FYl3EIwAuAE/yRUwCvqs0UfjfOG4AzSOICwKcqM0XlxrmEZJSYKZZkHGNm8iUZx4iZhGTjaDWTKuNoMZNq4yg1ky7jKDGTbuNIN5Nu40g1kynjSDGTaePUMpNlWRQEwWaaYJxaZioZo8apZaamGacqo5Lw6dm/YQ9AH8BTNv3sjGEYhmEgky8aVqPfi/1JrAAAAABJRU5ErkJggg=="
                    class="w-8 h-8 ml-2" onclick="toggleMenu()">
                <div id="menu" class="hidden absolute rounded-lg shadow-md mt-32 ml-10"
                    style="border-radius: 10px; border: white 2px solid; text-align: center; width: 200px;">
                    <ul>
                        <li><a href="{{route('tallerConfig.index')}}">Perfil</a></li>
                        <div class="hr-container">
                            <hr class="ml-5 mr-5">
                        </div>
                        <li><a href="{{ route('logout') }}">Cerrar sesión</a></li>
                    </ul>

                </div>


            </div>

        </div>
    </header>

    <div class="container mx-auto py-8 pt-64">
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

        <!-- Calendario -->
        <div id="calendar" class="bg-white shadow-md rounded-md p-4 mb-8"></div>

        <!-- Botones de acción -->
        <div class="flex justify-end space-x-4 mb-4">
            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
                id="btnOpenModalAddReserva">Agregar Nueva Reserva</button>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                id="btnOpenModalDeleteReserva">Eliminar Reserva</button>
        </div>

        <!-- Modal para agregar reserva -->
        <div id="addModal" class="modal flex">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h5 class="text-xl font-bold mb-4">Agregar Nueva Reserva</h5>
                <form action="{{ route('reserva.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="id_user" class="block text-gray-700 font-bold mb-2">ID Usuario</label>
                        <input type="text" class="form-input w-full" id="id_user" name="id_user" required
                            placeholder="Si es vuestro cliente poner 1">
                    </div>
                    <div class="mb-4">
                        <class="mb-4">
                            <label for="id_taller" class="block text-gray-700 font-bold mb-2">ID Taller</label>
                            <input type="text" class="form-input w-full" id="id_taller" name="id_taller"
                                value="{{ session('Taller')->id }}" readonly required>
                    </div>
                    <div class="mb-4">
                        <label for="day" class="block text-gray-700 font-bold mb-2">Día</label>
                        <input type="date" class="form-input w-full" id="day" name="day" required>
                    </div>
                    <div class="mb-4">
                        <label for="start_date" class="block text-gray-700 font-bold mb-2">Fecha de Inicio</label>
                        <input type="datetime-local" class="form-input w-full" id="start_date" name="start_date"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="end_date" class="block text-gray-700 font-bold mb-2">Fecha de Fin</label>
                        <input type="datetime-local" class="form-input w-full" id="end_date" name="end_date" required>
                    </div>
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción</label>
                        <input type="text" class="form-input w-full" id="descripcion" name="descripcion">
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

        <!-- Modal para eliminar reserva -->
        <div id="deleteModal" class="modal flex">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h5 class="text-xl font-bold mb-4">Eliminar Reserva</h5>
                <p>Ingresa el ID de la reserva que deseas eliminar:</p>
                <form id="deleteForm" action="{{ route('reserva.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="mb-4">
                        <label for="delete_id" class="block text-gray-700 font-bold mb-2">ID de la Reserva</label>
                        <input type="text" class="form-input w-full" id="delete_id" name="delete_id" required
                            placeholder="Clica en la cita que deseas para ver el ID ">
                    </div>
                    <div class="flex justify-end space-x-4 mt-8">
                        <button type="button"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded"
                            id="closeModalDeleteReserva">Cancelar</button>
                        <button type="submit"
                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar
                            Reserva</button>
                    </div>
                </form>
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
                <a href="https://www.instagram.com/bookandoil/"><img src="{{ asset('img/insta.png') }}" alt="insta"></a>
                <img src="{{ asset('img/facebook.png') }}" alt="facebook">
                <img src="{{ asset('img/twitter.png') }}" alt="twitter">
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');
            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '08:00',
                height: 'auto',
                events: @json($eventos),
                eventClick: function (info) {
                    alert('ID de la reserva: ' + info.event.id);
                }
            });
            calendar.render();

            // Modal para agregar una reserva
            const btnOpenModalAddReserva = document.getElementById('btnOpenModalAddReserva');
            const closeModalAddReserva = document.querySelector('#addModal .close');
            const modalAddReserva = document.getElementById('addModal');

            btnOpenModalAddReserva.addEventListener('click', function () {
                modalAddReserva.style.display = "flex";
            });

            closeModalAddReserva.addEventListener('click', function () {
                modalAddReserva.style.display = "none";
            });

            // Modal para eliminar una reserva
            const btnOpenModalDeleteReserva = document.getElementById('btnOpenModalDeleteReserva');
            const closeModalDeleteReserva = document.querySelector('#deleteModal .close');
            const modalDeleteReserva = document.getElementById('deleteModal');

            btnOpenModalDeleteReserva.addEventListener('click', function () {
                modalDeleteReserva.style.display = "flex";
            });

            closeModalDeleteReserva.addEventListener('click', function () {
                modalDeleteReserva.style.display = "none";
            });

            // Cerrar modales al hacer clic fuera de ellos
            window.addEventListener('click', function (event) {
                if (event.target == modalAddReserva) {
                    modalAddReserva.style.display = "none";
                }
                if (event.target == modalDeleteReserva) {
                    modalDeleteReserva.style.display = "none";
                }
            });
        });

        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        }

        function toggleModalAddReserva() {
            var modal = document.getElementById("modalAddReserva");
            modal.classList.toggle("hidden");
        }

    </script>

</body>

</html>