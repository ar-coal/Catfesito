
<?php 
    session_start();

?>
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <div>
        <label for="">Usuario: </label>
        <input id="nombre_usuario" type="text" >
    </div>
    <div>
        <button id="logout" onclick="cerrar()">Salir</button>

    </div>
    <script>
        var contenedor = document.getElementById("nombre_usuario");
        var salir = document.getElementById("logout");
        

        contenedor.value= `<?php echo $_SESSION["nombre_usuario"]; ?>`;

        function cerrar(){
            var xhttp = new XMLHttpRequest();

            
            xhttp.open("GET", "Controlador/logout.php", false);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4){ 
                    window.location.href = "login.php";

                }
            };
            
            xhttp.send();

      
            
        }

    </script>

 </body>
 </html>


