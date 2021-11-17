<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" integrity="undefined" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" type="text/css" href="css/style.css">
    <meta charset='utf-8' />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js" integrity="sha256-6l5QOXZ6Mkg+2tOaJgs8yT7xx2WapaIPQl7qpB55/V0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.css" integrity="sha256-RCJT6YvohmGy+rWQe3hpPZez8iaPnirFVfiwaBVCk1k=" crossorigin="anonymous">
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        $.ajax({
          type: 'GET',
          url: 'jsgetEvents.php',
          data: {},
          success: function(data){
            var jsondata = JSON.parse(data);
            var arrEvents = [];
            $(jsondata).each(function(item){
              arrEvents.push({
                title: this.eventname,
                start: this.eventdate+'T'+this.eventtime,
                display: "inverse-background",
                backgroundColor: "#f3f3f3"
              })
            })
            console.log(arrEvents);
            var calendar = new FullCalendar.Calendar(calendarEl, {
              headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek'
              },
              eventColor: 'green',
              events: arrEvents,
              dateClick: function(info) {
                modal.style.display = "block";
                //alert('Date: ' + info.dateStr);
                //alert('Resource ID: ' + info.resource.id);
              }
        });
          span.onclick = function(info) {
            modal.style.display = "none";
          }
        calendar.render();

          },
          error: function(data){
            alert('there has been an error');
          }
        });
        });

    </script>
  </head>
  <body>
    <a href="#" class="float" id="menu-share">
      <i class="fas fa-bars  my-float"></i>
    </a>
    <ul>
      <li><a href="index.php?logout=true">
        <i class="fas fa-sign-out-alt my-float"></i>
      </a></li>
      <li><a href="calendar.php">
        <i class="fas fa-calendar-alt my-float"></i>
      </a></li>
      <li><a href="index.php">
        <i class="fas fa-home my-float"></i>
      </a></li>
    </ul>
        <!-- The Modal -->
    <div id="myModal" class="modal">

      <!-- Modal content -->
      <div class="modal-content">
        <span class="close">&times;</span>
        <form>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
              </div>
              <input type="text" name="eventname" id="eventname" class="form-control input_user" placeholder="Nome do Evento" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
              </div>
              <input type="text" name="eventdesc" id="eventdesc" class="form-control input_user" placeholder="Descrição do Evento" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
              </div>
              <input type="date" name="eventdate" id="eventdate" class="form-control input_user" placeholder="Data do Evento" required>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
              </div>
              <input type="time" name="eventtime" id="eventtime" class="form-control input_user" placeholder="Horario do Evento" required>
            </div>
            <div class="input-group mb-3">
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="eventallday" id="eventallday" value="1">
                <label class="form-check-label" for="eventallday">Dia Inteiro?</label>
              </div>
            </div>
            <div class="input-group mb-3">
              <div class="input-group-append">
                <span class="input-group-text"><i class="fas fa-calendar-day"></i></span>
              </div>
              <select name="eventcategory" id="eventcategory" class="form-control input_user" required>
                <option value="1">Reunião</option>
              </select>
            </div>
          <div class="d-flex justify-content-center mt-3 login_container">
            <button type="button" name="button" id="addEvent" class="btn login_btn">Add Evento</button>
          </div>
        </form>
      </div>

    </div>
    <div class="container h-100">
      <div class="d-flex justify-content-center h-100">
        <div class="user_card bloco_calendario">
          <div id='calendar'></div>
        </div>
      </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $(function(){
      $('#menu-share').click(function(e){
        if ($('ul').css('visibility') == 'visible') {
          $('ul').css('visibility', 'hidden')
          $('ul').css('animation', 'none')
        }
        else {
            $('ul').css('visibility', 'visible')
            $('ul').css('animation', 'scale-in 0.5s')
          }
        })
      $('#addEvent').click(function(e){
        var eventname = $('#eventname').val();
        var eventdesc = $('#eventdesc').val();
        var eventdate = $('#eventdate').val();
        var eventtime = $('#eventtime').val();
        var eventcategory = $('#eventcategory').val();
        var eventallday = $('#eventallday').val();
        console.log(eventallday);

        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: 'jscalendar.php',
          data: {eventname: eventname, eventdesc: eventdesc, eventdate: eventdate, eventtime: eventtime, eventcategory: eventcategory, eventallday: eventallday},
          success: function(data){
            console.log(data)
            alert('Event has been added')
            document.getElementById("myModal").style.display = "none";
          },
          error: function(data){
            alert('there has been an error');
          }
        });
        })

    })
  </script>
  
  </body>
</html>