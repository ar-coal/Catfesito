<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Peticiones</title>
  <link rel="stylesheet" type="text/css" href="css/tablas.css">

</head>

</html>
<?php

$contraseña = "JacMon_261002";
$usuario = "root";
$nombre_base_de_datos = "practicas";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
$sentencia = $base_de_datos->query("SELECT * FROM revision;");
$peticion = $sentencia->fetchAll(PDO::FETCH_OBJ);
$body = "";
foreach($peticion as $pedido){ 
$cabecera = "<table><thead>
    <tr>
        <th>Tipo</th>
        <th>Usuario</th>
        <th>Evento</th>
        <th>Hora de solicitud</th>
        <th>Accion</th>
        
    </tr>
    </thead>
<tbody>";
	
$cuerpo = "";

$tipo = $pedido->tipo;
if($tipo=="A"){
  $tipo = "Alta";
}elseif($tipo=="B"){
  $tipo = "Baja";
}else{
  $tipo = "Cambio";
}

$cadena = "<tr> <td>".$tipo."</td><td>".$pedido->usr."</td><td>".$pedido->evento."</td><td>".$pedido->hora."</td><td colspan='2' style='text-align:center;'><a class='button' href='nuevo.php?id=".$pedido->id."'>Aceptar</a><br><a class='button' href='rechazo.php?id=".$pedido->id."'>Rechazar</a></td>";



$fondo = "</tbody></table><br><br>";
echo $cabecera.$cadena.$fondo;
}

?>
<div style="display:flex;background-color:#DE423A">

<a href="calendario.php?usuario=Admin">
  <img src="../imagenes/calendario2.gif" width="100" height="100" />
</a>
<h4 style="color:white;margin-top:25px">presiona al gato para volver</h4>