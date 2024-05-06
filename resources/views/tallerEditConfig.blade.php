<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Actualizar Datos del Taller</title>
  <link rel="stylesheet" href="{{ asset('css/taller.css') }}" />  
</head>
<body>
  <div id="header">
    <div class="logo">
      <h2 class="white">LOGO</h2>
    </div>
    <div class="nameTaller white">
      <h2>Hola ...</h2>
    </div>
  </div>

  <h2 class="azul titleEditConfig">Editar Datos del Taller</h2><br><br><br>


    <h3 class="azul datosPrincipales">Datos Principales:</h3>

    <div class="form-group">
      <label for="nombre">Nombre del Taller:</label>
      <input type="text" id="nombre" name="nombre" >
      <button type="button" class="btn-edit" >Editar</button>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email">
      <button type="button" class="btn-edit" >Editar</button>
    </div>
    <div class="form-group">
      <label for="ubicacion">Ubicación:</label>
      <input type="text" id="ubicacion" name="ubicacion">
      <button type="button" class="btn-edit">Editar</button>
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono:</label>
      <input type="tel" id="telefono" name="telefono">
      <button type="button" class="btn-edit">Editar</button>
    </div>
  


</body>
</html>
