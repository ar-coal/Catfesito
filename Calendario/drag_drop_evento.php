<?php
date_default_timezone_set("America/Bogota");
setlocale(LC_ALL, "es_ES");

include('config.php');

$usr              = $_REQUEST["usuario"];
$idEvento         = $_POST['idEvento'];
$start            = $_REQUEST['start'];
$fecha_inicio     = date('Y-m-d', strtotime($start));
$end              = $_REQUEST['end'];
$fecha_fin        = date('Y-m-d', strtotime($end));

if ($usr != "Admin") {

    header("Location:calendario.php?err=1&usuario=" . $usr);
    
} else {
    $UpdateProd = ("UPDATE eventoscalendar 
    SET 
        fecha_inicio ='$fecha_inicio',
        fecha_fin ='$fecha_fin'

    WHERE id='" . $idEvento . "' ");
    $result = mysqli_query($con, $UpdateProd);;
}



