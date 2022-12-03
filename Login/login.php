<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuario</title>
    <link href="Vista/CSS/registro.css" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/17696c98d6.js" crossorigin="anonymous"></script>
    

</head>
<body>
<div id="ISesion">
		<img src="Vista/Recursos/fondo.png" alt="">
		<h1>Login</h1>
	</div>

    <form id="form_login"  >    					
		<div id="icon"> <i class="fa-solid fa-user"></i>
    	<input type="text" name="t1" placeholder="Nombre completo" id="username"></div>
		
		<div id="icon3"><i class="fa-solid fa-lock"></i>
    	<input type="password" name="t2" placeholder="Contraseña" id="password"></div>        
    	
        <div id="inputs"> <input type="submit"  value="Ingresar">
        
        <a href="Vista\registro.php"><input type="button" name="" value="Registrar"></a></div>





    </form>

</body>



<script>
        var form = document.getElementById("form_login");
        form.addEventListener("submit", login);

        function login(e) {            
            //Validar usuario se detiene el evento para poder validar
            e.preventDefault();
            e.stopPropagation();
            //Obtiene los valores del usuario
            var nombre_usuario = document.getElementById("username");
            var contrasena = document.getElementById("password");

            //Almacenamos en un JSON dicha informacion para enviarla
            var obj_usuario = {
                nombre_usuario: nombre_usuario.value,
                contrasena: contrasena.value
            };

            //Comprobamos en consola que la informacion sea la correcta
            console.log(obj_usuario);

            //Abrimos nuestra solicitud de conexion
            var xhttp = new XMLHttpRequest();

            //Cuando usamos Post la informacion se debe enviar por la funcion send en modo JSON
            xhttp.open("POST", "Controlador/usuariosController.php", false);
            

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4){ 
                    if(this.status == 205) {
                        
                        var usr='<?php if(isset($_SESSION["nombre_usuario"])){echo $_SESSION["nombre_usuario"];}else{echo "";}?>';
                        window.location.href = "../Calendario/calendario.php?usuario="+usr;
                        
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
</html>
</html>

