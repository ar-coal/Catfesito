<?php
require_once('config.php');
$id    		= $_GET['id']; 

$sqlDeleteEvento = ('DELETE FROM revision WHERE id = '.$id.';');

echo $sqlDeleteEvento;

if (($resultProd = mysqli_query($con, $sqlDeleteEvento)) === false) {
    die(mysqli_error($conn));
}

header("Location:revision.php");

?>