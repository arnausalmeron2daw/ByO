<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet"/>
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

<div class="bg-blue-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-2xl font-bold"><a href="#" class="hover:underline">Calendario</a></div>
        <div><a href="{{ asset('tallerConfig') }}" class="text-white hover:underline">Configuración</a></div>
    </div>
</div>

<div class="container mx-auto py-8">
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
        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" id="btnOpenModalAddReserva">Agregar Nueva Reserva</button>
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" id="btnOpenModalDeleteReserva">Eliminar Reserva</button>
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
                    <input type="text" class="form-input w-full" id="id_user" name="id_user" required placeholder="Si es vuestro cliente poner 1">
                </div>
                <div class="mb-4">
                <class="mb-4">
                    <label for="id_taller" class="block text-gray-700 font-bold mb-2">ID Taller</label>
                    <input type="text" class="form-input w-full" id="id_taller" name="id_taller" value="{{ session('Taller')->id }}" readonly required>
                </div>
                <div class="mb-4">
                    <label for="day" class="block text-gray-700 font-bold mb-2">Día</label>
                    <input type="date" class="form-input w-full" id="day" name="day" required>
                </div>
                <div class="mb-4">
                    <label for="start_date" class="block text-gray-700 font-bold mb-2">Fecha de Inicio</label>
                    <input type="datetime-local" class="form-input w-full" id="start_date" name="start_date" required>
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
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" id="closeModalAddReserva">Cerrar</button>
                    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Agregar Reserva</button>
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
                    <input type="text" class="form-input w-full" id="delete_id" name="delete_id" required placeholder="Clica en la cita que deseas para ver el ID ">
                </div>
                <div class="flex justify-end space-x-4 mt-8">
                    <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded" id="closeModalDeleteReserva">Cancelar</button>
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Eliminar Reserva</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            slotMinTime: '08:00',
            height: 'auto',
            events: @json($eventos),
            eventClick: function(info) {
                alert('ID de la reserva: ' + info.event.id);
            }
        });
        calendar.render();

        // Modal para agregar una reserva
        const btnOpenModalAddReserva = document.getElementById('btnOpenModalAddReserva');
        const closeModalAddReserva = document.querySelector('#addModal .close');
        const modalAddReserva = document.getElementById('addModal');

        btnOpenModalAddReserva.addEventListener('click', function() {
            modalAddReserva.style.display = "flex";
        });

        closeModalAddReserva.addEventListener('click', function() {
            modalAddReserva.style.display = "none";
        });

        // Modal para eliminar una reserva
        const btnOpenModalDeleteReserva = document.getElementById('btnOpenModalDeleteReserva');
        const closeModalDeleteReserva = document.querySelector('#deleteModal .close');
        const modalDeleteReserva = document.getElementById('deleteModal');

        btnOpenModalDeleteReserva.addEventListener('click', function() {
            modalDeleteReserva.style.display = "flex";
        });

        closeModalDeleteReserva.addEventListener('click', function() {
            modalDeleteReserva.style.display = "none";
        });

        // Cerrar modales al hacer clic fuera de ellos
        window.addEventListener('click', function(event) {
            if (event.target == modalAddReserva) {
                modalAddReserva.style.display = "none";
            }
            if (event.target == modalDeleteReserva) {
                modalDeleteReserva.style.display = "none";
            }
        });
    });
</script>

</body>
</html>
