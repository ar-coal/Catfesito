<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL,"es_ES");
//$hora = date("g:i:A");

require("config.php");
$tipo              = "A";
$usr               = $_REQUEST["usuario"]; 
$evento            = ucwords($_REQUEST['evento']);
$f_inicio          = $_REQUEST['fecha_inicio'];
$fecha_inicio      = date('Y-m-d', strtotime($f_inicio)); 

$f_fin             = $_REQUEST['fecha_fin']; 
$seteando_f_final  = date('Y-m-d', strtotime($f_fin));  
$fecha_fin1        = strtotime($seteando_f_final."+ 1 days");
$fecha_fin         = date('Y-m-d', ($fecha_fin1));  
$color_evento      = $_REQUEST['color_evento'];
$hora              = date('d/m/y h:i:s');



$InsertNuevoEvento = "INSERT INTO revision(
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
$resultadoNuevoEvento = mysqli_query($con, $InsertNuevoEvento);

header("Location:calendario.php?er=1&usuario=".$usr);
