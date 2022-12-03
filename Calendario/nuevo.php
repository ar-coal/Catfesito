<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");


require_once('config.php');
$id    		= $_GET['id'];
$contraseña = "JacMon_261002";
$usuario = "root";
$nombre_base_de_datos = "practicas";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contraseña);
}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}
$sentencia = $base_de_datos->query("SELECT * FROM revision where id ='".$id."';");
$peticion = $sentencia->fetchAll(PDO::FETCH_OBJ);

foreach($peticion as $pedido){ 

$usr               = $pedido->usr; 
$evento            = ucwords($pedido->evento);
$f_inicio          = $pedido->fecha_inicio;
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $pedido->fecha_fin; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin         = $seteando_f_final;  
$color_evento      = $pedido->color_evento;
$hora              = $pedido->hora;



$InsertNuevoEvento = "INSERT INTO eventoscalendar(
      usr,
      evento,
      fecha_inicio,
      fecha_fin,
      color_evento,
      hora
      )
    VALUES (
      '" .$usr. "',
      '" .$evento. "',
      '". $fecha_inicio."',
      '" .$fecha_fin. "',
      '" .$color_evento. "',
      '" .$hora. "'
  )";
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

}
 

$sqlDeleteEvento = ("DELETE FROM revision WHERE  id='" .$id. "'");
$resultProd = mysqli_query($con, $sqlDeleteEvento);

header("Location:revision.php");