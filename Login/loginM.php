<?php
  $usuario = $_POST["name"];
  $contras = $_POST["contras"];
  session_start();
  $_SESSION['usuario']=$usuario;

  include('Modelo/con_db.php');

  $consulta = "SELECT * FROM usuario where nombre_usuario='$usuario' and pass_key='$contras'" ;
  $resultado= mysqli_query($conex,$consulta);
  while ($fila = mysqli_fetch_row($resultado)){ 
   $usr = $fila[1]; //titulo
}
  $filas=mysqli_num_rows($resultado);

  if ($filas) {
    echo '<script language="javascript" >alert("Ingresado") </script>';
    header("Location:../Calendario/calendario.php?usuario=".$usr);
  }else{
    echo '<script language="javascript">alert("Usuario o contraseña incorrectos") ;window.location.href="login.php"</script>';
    //header('Location:login.php');
  }

  mysqli_free_result($resultado);
  mysqli_close($conex);
?>
