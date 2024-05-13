<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Taller</title>
    <link rel="stylesheet" href="{{ asset('css/taller.css') }}" />  
   </head>
  <body>
   
    <div id="header">
      <div class="logo"><h2 class="white">LOGO</h2></div>
    
    </div>

    <div id="menu">
      <div class="titleCalendar"><a href=""><u><b>Calendario</b></u></a></a></div>
      <div class="configuracion"><a href="{{ asset('tallerConfig') }}"><u>Configuración</u></a></div>
    </div>


    <div class="container">
      <div class="left">
        <div class="calendar">
          <div class="month">
            <i class="fas fa-angle-left prev"></i>
            <div class="date">april 19</div>
            <i class="fas fa-angle-right next"></i>
          </div>
          <div class="weekdays">
            <div>Sun</div>
            <div>Mon</div>
            <div>Tue</div>
            <div>Wed</div>
            <div>Thu</div>
            <div>Fri</div>
            <div>Sat</div>
          </div>
          <div class="days"></div>
          <div class="goto-today">
            <div class="goto">
              <input type="text" placeholder="mm/yyyy" class="date-input" />
              <button class="goto-btn">Go</button>
            </div>
            <button class="today-btn">Today</button>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="today-date">
          <div class="event-day">wed</div>
          <div class="event-date">12th december 2022</div>
        </div>
        <div class="events"></div>
        <div class="add-event-wrapper">
          <div class="add-event-header">
            <div class="title">Add Event</div>
            <i class="fas fa-times close"></i>
          </div>

          <div class="add-event-body">
            <div class="add-event-input">
              <input type="text" placeholder="Nombre Reserva" class="event-name" />
            </div>

            <div class="add-event-input">
              <input
                type="text"
                placeholder="Desde : "
                class="event-time-from"
              />
            </div>

            <div class="add-event-input">
              <input
                type="text"
                placeholder="Hasta :"
                class="event-time-to"
              />
            </div>


            <div class="add-event-input">
            <input
                type="text"
                placeholder="Descripcion:"
                class="event-description"
              />
            </div>

            


          </div>
          <div class="add-event-footer">
            <button class="add-event-btn">Add Event</button>
          </div>
        </div>
      </div>
      <button class="add-event">
        <i class="fas fa-plus"></i>
      </button>
    </div>

    <script src="{{ asset('/js/taller.js') }}" defer></script>
  </body>
</html>
