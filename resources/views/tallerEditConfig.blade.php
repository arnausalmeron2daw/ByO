<!-- resources/views/taller/edit.blade.php -->
<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Editar Información del Taller') }}
    </h2>
  </x-slot>

  <<header>
    <div class="top-0 left-0 w-full overflow-hidden z-0">
      <video autoplay muted loop class="absolute top-0 left-0 min-w-full object-cover video-background"
        style="height:320px;">
        <source src="{{ asset('img/video4.mp4') }}" type="video/mp4">
        Tu navegador no soporta video HTML5.
      </video>
    </div>
    <div class="flex flex-row justify-between pt-10">
      <div class="relative pl-5 pt-3">
        <a href="{{route('reserva.index')}}"><img src="{{ asset('img/logo.jpg') }}" alt="logo"></a>
      </div>

      <div class="relative flex justify-center flex-row pr-10 text-white text-2xl items-center mt-0 pt-0">
        <h1 class="inline-block">Bienvenido {{ session('Taller')['name'] }}</h1>
        <img
          src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABlklEQVR4nO2Uv0rDUBTGv1ZQSjKpIGToA7i4ZMkb6OTUMc+hS7f2voRT3QrSTjpnceqSrUUQHDpkFSlBsTmSkkCoEdN4/0Q4PzjL5ebwfZD7AxiGYRiGYZgiRwDuAMQAqCETZ5kOUYGHBgSmH+a+SoEkvTyfz6kpLBaLvEBSucBgMKCmMBwOdyrwnl5ut9s0mUxMZ6fpdLrJkhX4qFIgzP+5TqdDs9nMWPgwDMm27eIbSLP9yjmAdf6R4zi0XC61h4+iiLrdbjH8OstWievi63ddl1arlbbwcRyT53nbBrrCjtwUF/R6PUqSREsB3/e3w9+iBvsAguIiIYTy8EKI7fCPAA5Qk2MAz/myVqtF4/FYl3EIwAuAE/yRUwCvqs0UfjfOG4AzSOICwKcqM0XlxrmEZJSYKZZkHGNm8iUZx4iZhGTjaDWTKuNoMZNq4yg1ky7jKDGTbuNIN5Nu40g1kynjSDGTaePUMpNlWRQEwWaaYJxaZioZo8apZaamGacqo5Lw6dm/YQ9AH8BTNv3sjGEYhmEgky8aVqPfi/1JrAAAAABJRU5ErkJggg=="
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

    <div class="container mx-auto py-12 pt-64 pb-32">
      <!-- Formulario de edición del taller - Datos -->
      <form action="{{ route('tallerEditConfig.update', $taller->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campos para los datos del taller -->
        <div>
          <!-- Nombre del taller -->
          <div class="mb-4">
            <x-input-label for="name" :value="__('Nombre del Taller')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
              value="{{ old('name', $taller->name) }}" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
          </div>

          <!-- Email del taller -->
          <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
              value="{{ old('email', $taller->email) }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <!-- Teléfono del taller -->
          <div class="mb-4">
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
              value="{{ old('telefono', $taller->telefono) }}" required />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
          </div>

          <!-- Número de empleados del taller -->
          <div class="mb-4">
            <x-input-label for="numEmpleados" :value="__('Número de Empleados')" />
            <x-text-input id="numEmpleados" class="block mt-1 w-full" type="number" name="numEmpleados"
              value="{{ old('numEmpleados', $taller->numEmpleados) }}" required />
            <x-input-error :messages="$errors->get('numEmpleados')" class="mt-2" />
          </div>

          <!-- Ubicación del taller -->
          <div class="mb-4">
            <x-input-label for="location" :value="__('Ubicación')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location"
              value="{{ old('location', $taller->location) }}" required />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
          </div>

          <!-- Botón para guardar los cambios de los datos -->
          <div class="flex justify-end mt-4">
            <x-primary-button>{{ __('Guardar Cambios de Datos') }}</x-primary-button>
          </div>
        </div>
      </form>


      <!-- Formulario para actualizar la contraseña -->
      <form class="mt-12" action="{{ route('tallerEditConfig.updatePassword', $taller->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Campos para la contraseña -->
        <div>
          <!-- Nueva Contraseña -->
          <div class="mb-4">
            <x-input-label for="password" :value="__('Nueva Contraseña')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          <!-- Confirmar Contraseña -->
          <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
              name="password_confirmation" required />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
          </div>

          <!-- Botón para guardar los cambios de la contraseña -->
          <div class="flex justify-end mt-4">
            <x-primary-button>{{ __('Guardar Nueva Contraseña') }}</x-primary-button>
          </div>
        </div>
      </form>
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

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.classList.toggle("hidden");
        }
    </script>
</x-app-layout>