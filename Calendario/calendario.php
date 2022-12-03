<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>¡Has tu reserva hoy!</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" type="text/css" href="css/fullcalendar.min.css">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
</head>

<body style="background-color:#DE423A">

  <?php
  include('config.php');

  $SqlEventos   = ("SELECT * FROM eventoscalendar");
  $resulEventos = mysqli_query($con, $SqlEventos);
  ?>

  <?php
  $usr = $_GET["usuario"];
  if ($usr != "null") {
    echo '<div id="presentacion" style="text-align:right;text-decoration:none;margin-right:5%">Bienvenido ' . $usr . '</div>';
  } else {
    echo '<div id="presentacion" style="text-align:right;text-decoration:none;margin-right:5%"><a style="color:white;" href="../Login/login.php">Ingresar o registrarse</a> </div>';
  }
  ?>


  <div class="container">
    <div class="row">
      <div class="col msjs">
        <?php
        include('msjs.php');
        ?>
      </div>
    </div>

    <div class="row">
      <div style="background-color:#DE423A" class="col-md-12 mb-3">
        <h3 style="color:white;background-color:#DE423A " class="text-center" id="title">Eventos disponibles</h3>
      </div>
    </div>
  </div>



  <?php
  $usr = $_GET["usuario"];
  if ($usr != "null") {
    echo '<div style="background-color:white;" id="calendar"></div>';
  } else {
    echo '<div style="background-color:white;pointer-events:none;" id="calendar"></div>';
  }
  ?>



  <?php
  include('modalNuevoEvento.php');
  include('modalUpdateEvento.php');
  ?>




  <script src="js/jquery-3.0.0.min.js"> </script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/moment.min.js"></script>
  <script type="text/javascript" src="js/fullcalendar.min.js"></script>
  <script src='locales/es.js'></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $("#calendar").fullCalendar({
        header: {
          left: "prev,next today",
          center: "title",
          right: "month,agendaWeek,agendaDay"
        },

        locale: 'es',

        defaultView: "month",
        navLinks: true,
        editable: true,
        eventLimit: true,
        selectable: true,
        selectHelper: false,

        //Nuevo Evento
        select: function(start, end) {
          $("#exampleModal").modal();
          $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));

          var valorFechaFin = end.format("DD-MM-YYYY");
          var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
          $('input[name=fecha_fin').val(F_final);

        },

        events: [
          <?php
          while ($dataEvento = mysqli_fetch_array($resulEventos)) { ?> {
              _id: '<?php echo $dataEvento['id']; ?>',
              title: '<?php echo $dataEvento['evento']; ?>',
              start: '<?php echo $dataEvento['fecha_inicio']; ?>',
              end: '<?php echo $dataEvento['fecha_fin']; ?>',
              color: '<?php echo $dataEvento['color_evento']; ?>'
            },
          <?php } ?>
        ],


        //Eliminar Evento
        eventRender: function(event, element) {
          element
            .find(".fc-content")
            .prepend('<?php $usr = $_GET["usuario"];if ($usr != "Admin") {} else {echo '<span id="btnCerrar"; class="closeon material-icons">&#xe5cd;</span>';}?>')

          //Eliminar evento
          element.find(".closeon").on("click", function() {

            var pregunta = confirm("Deseas Borrar este Evento?");
            if (pregunta) {

              $("#calendar").fullCalendar("removeEvents", event._id);

              $.ajax({
                type: "POST",
                url: 'deleteEvento.php',
                data: {
                  id: event._id
                },
                success: function(datos) {
                  $(".alert-danger").show();

                  setTimeout(function() {
                    $(".alert-danger").slideUp(500);
                  }, 3000);

                }
              });
            }
          });
        },


        //Moviendo Evento Drag - Drop
        eventDrop: function(event, delta) {
          var idEvento = event._id;
          var start = (event.start.format('DD-MM-YYYY'));
          console.log(event.end);
          var end = (event.end.format("DD-MM-YYYY"));
          
          var usr = '<?php $usr = $_GET["usuario"];echo strval($usr); ?>';


          $.ajax({
            url: 'drag_drop_evento.php',
            data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento + '&usuario=' + usr,
            type: "POST",
            success: function(response) {
              // $("#respuesta").html(response);
            }
          });
        },

        //Modificar Evento del Calendario 
        eventClick: function(event) {
          var idEvento = event._id;
          $('input[name=idEvento').val(idEvento);
          $('input[name=evento').val(event.title);
          $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
          $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

          $("#modalUpdateEvento").modal();
        },


      });


      //Oculta mensajes de Notificacion
      setTimeout(function() {
        $(".alert").slideUp(300);
      }, 3000);


    });
  </script>
  <div style="display:flex;">

    <a href="../principal.html">
      <img src="../imagenes/calendario2.gif" width="100" height="100" />
    </a>
    <h4 style="color:white;margin-top:25px">presiona al gato para volver</h4>
    <?php
    $usr = $_GET["usuario"];
    if ($usr != "Admin") {
    } else {
      echo "<a class = 'btn-edeptec'  href = 'revision.php'> Revision </a>";
    }
    ?>

    <style type="text/css">
      .btn-edeptec {
        display: flex;
        position: absolute;
        right: 50px;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        font-family: monospace;
        font-size: 26px;
        font-weight: bold;
        height: auto;
        width: auto;
        padding: 25px 25px 25px 25px;
        color: #de423a;
        background-color: #ffffff;
        transition: all 0.3s;
      }

      .btn-edeptec:hover {
        color: #ffffff;
        background-color: #de423a
      }
    </style>


  </div>



</body>

</html>