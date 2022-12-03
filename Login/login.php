<!DOCTYPE html>
<html>
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="Vista/estilo.css">

	<script src="https://kit.fontawesome.com/17696c98d6.js" crossorigin="anonymous"></script>

</head>
<body>

	<div id="ISesion">
		<img src="Vista/Recursos/fondo.png" alt="">
		<h1>Reservas</h1>
	</div>




    <form action="loginM.php" method="post">
    	<h1></h1>
		
		

		<div id="icon"> <i class="fa-solid fa-user"></i>
    	<input type="text" name="name" placeholder="Nombre completo"></div>
		<div id="icon2"> <i class="fa-solid fa-envelope"></i>		
    	<input type="password" name="contras" placeholder="Contraseña"></div>
    	<div id="inputs"> <input type="submit"  value="Ingresar">
        <a href="Vista\registrar.php"><input type="button" name="" value="Registrar"></a></div>

    </form>
        <?php 
        header('login.php');
        ?>
</body>
</html>