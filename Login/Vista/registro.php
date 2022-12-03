<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JavaScript Bundle with Popper -->
    <link href="../Vista/CSS/registro.css" rel="stylesheet" type="text/css">
   
    <script src="https://kit.fontawesome.com/17696c98d6.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<div id="ISesion">
		<img src="../Vista/Recursos/fondo.png" alt="">
		<h1>Registro</h1>
	</div>
    <form id="form_login" method="post">    					
		<div id="icon"> <i class="fa-solid fa-user"></i>
    	<input type="text" name="name" placeholder="Nombre completo"></div>
		<div id="icon2"> <i class="fa-solid fa-envelope"></i>
		<input type="email" name="correo" placeholder="Correo"></div>
		<div id="icon3"><i class="fa-solid fa-lock"></i>
    	<input type="password" name="contras" placeholder="Contraseña"></div>        
    	<input type="hidden" name="registro" value="hola">
        <input type="submit" name="register">
        

    </form>

    <script>
        var form = document.getElementById("form_login");
        form.addEventListener("submit", login);

        function login(e) {
            
            //Validar usuario se detiene el evento para poder validar
            e.preventDefault();
            e.stopPropagation();
            //Obtiene los valores del usuario
            var correo = document.getElementsByName("correo");
            
            var nombre_usuario = document.getElementsByName("name");
            var contrasena = document.getElementsByName("contras");

            //Almacenamos en un JSON dicha informacion para enviarla
            var obj_usuario = {
                nombre_usuario: nombre_usuario[0].value,
                contrasena: contrasena[0].value,
                correo: correo[0].value
            };

            //Comprobamos en consola que la informacion sea la correcta
            console.log(obj_usuario);

            //Abrimos nuestra solicitud de conexion
            var xhttp = new XMLHttpRequest();

            //Cuando usamos Post la informacion se debe enviar por la funcion send en modo JSON
            xhttp.open("POST", "../Controlador/addUsuarioController.php", false);

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4){ 
                    if(this.status == 200) {
                        window.location.href = "../login.php";
                    }else if(this.status == 500){
                        var response = JSON.parse(this.responseText);
                        alert(response.messages[0]);
                    }else if(this.status == 400){
                        var response = JSON.parse(this.responseText);
                        alert(response.messages[0]);
                    }else if(this.status == 404){
                        var response = JSON.parse(this.responseText);
                        alert(response.messages[0]);
                    }   
                }

            };
            //Para mandar con JSON es necesario agregar un Header
            xhttp.setRequestHeader("Content-Type","application/json");

            //Se transforma un objeto a JSON
            xhttp.send(JSON.stringify(obj_usuario));
        }
</script>





















</body>
</html>

<?php
        


?>