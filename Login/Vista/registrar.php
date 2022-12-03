
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<script src="https://kit.fontawesome.com/17696c98d6.js" crossorigin="anonymous"></script>

	<title>Registro</title>
</head>
<body>
<div id="ISesion">
		<img src="../Vista/Recursos/fondo.png" alt="">
		<h1>Reservas</h1>
	</div>




    <form method="post">
    	

		<div id="icon"> <i class="fa-solid fa-user"></i>
    	<input type="text" name="name" placeholder="Nombre completo"></div>
		<div id="icon2"> <i class="fa-solid fa-envelope"></i>
		<input type="email" name="correo" placeholder="Correo"></div>
		<div id="icon3"><i class="fa-solid fa-lock"></i>
    	<input type="password" name="contras" placeholder="Contraseña"></div>
    	<input type="submit" name="register" value="Registrar">
    </form>   
</body>
</html>


   

<?php 

include("../Modelo/con_db.php");

if (isset($_POST['register'])) {
    if (strlen($_POST['name']) >= 1 && strlen($_POST['contras']) >= 1) {	    
		$name = trim($_POST['name']);
		$correo = trim($_POST['correo']);
	    $contras = trim($_POST['contras']);	    
	    $consulta = "INSERT INTO usuario(nombre_usuario, pass_key, correo) VALUES('$name','$contras','$correo')";
		
	    $resultado = mysqli_query($conex,$consulta);

		
		
	    if ($resultado) {
			echo '<script language="javascript">alert("Te has registrado correctamente, ahora puedes iniciar sesion") ;window.location.href="../login.php"</script>';
	    } else {
	    	?> 
	    	<script>alert("¡Ups ha ocurrido un error!") </script>
           <?php
	    }
    }   else {
	    	?> 
	    	<script>alert("¡Por favor complete los campos! ") </script>
           <?php
    }
}

?>