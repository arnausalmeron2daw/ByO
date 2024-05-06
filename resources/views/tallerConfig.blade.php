<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/taller.css') }}" />  

  </head>
  <body>
        <div id="header">
          <div class="logo"><h2 class="white">LOGO</h2></div>
          <div class="nameTaller white"><h2>Hola {{session('taller')['name']}}</h2></div>
        </div>

        <div id="menu">
          <div class="titleCalendar"><a href="{{ asset('tallerMain') }}"><u>Calendario</u></a></div>
          <div class="configuracion"><a href=""><u><b>Configuración</b></u></a></div>
        </div>

        <div id="config">
            <div class="titleperfil azul"><u>Información del negocio</u></div>
            <div class="nombreTaller azul"><b>Nombre: </b>{{session('taller')['name']}}</div>
            <div class="correoTaller azul"><b>Correo:</b> {{session('taller')['email']}}</div>
            <div class="telefonoTaller azul"><b>Teléfono:</b> </div>
            <div class="ubicacionTaller azul"><b>Ubicación:</b> {{session('taller')['location']}}</div>
            
            <div class="titleHorario azul"><u>Horarios de servicio</u></div>
            <div class="lunes azul">Lunes: </div>
            <div class="martes azul">Martes: </div>
            <div class="miercoles azul">Miercoles: </div>
            <div class="jueves azul">Jueves: </div>
            <div class="viernes azul">Viernes: </div>
            <div class="sabado azul">Sabado: </div>
            <div class="domingo azul">Domingo: </div>

            <div class="titleEmpleados azul"><u>Empleados</u></div>


            <div class="titleRedesSociales azul"><u>Redes Sociales</u></div>
            <div class="instagramTaller azul">Instagram: </div>
            <div class="facebookTaller azul">Facebook: </div>

            <button class="btnEditarTaller azul"><a href="{{ asset('tallerEditConfig') }}">Editar configuración</a></button>
            <button class="btnCerrarSesion ">Cerrar sesión</button>

        </div>

        <script src="{{ asset('js/taller.js') }}"></script>
    </body>
</html>
