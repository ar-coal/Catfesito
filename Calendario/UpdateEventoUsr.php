<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");

include('config.php');

$tipo              = "C";
$usr               = $_REQUEST["usuario"]; 
                        
$idEvento         = $_POST['idEvento'];

$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin         = $seteando_f_final;  
$color_evento      = $_REQUEST['color_evento'];
$hora              = date('d/m/y h:i:s');

$UpdateProd = "INSERT INTO revision(
    tipo,
    usr,
    evento,
    fecha_inicio,
    fecha_fin,
    color_evento,
    hora
    )
  VALUES (
    '" .$tipo. "',
    '" .$usr. "',
    '" .$evento. "',
    '". $fecha_inicio."',
    '" .$fecha_fin. "',
    '" .$color_evento. "',
    '" .$hora. "'
)";
$result = mysqli_query($con, $UpdateProd);

header("Location:calendario.php?er=1&usuario=".$usr);
?>