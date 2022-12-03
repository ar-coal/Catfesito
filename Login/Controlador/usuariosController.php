<?php session_start(); ?>
<?php 

require_once("./Modelo/db.php");
require_once("./Modelo/usuario.php");
require_once("./Modelo/Response.php");

try {
    $connection = DB::getConnection();
}
catch(PDOException $e) {
    error_log("Connection error - " . $e, 0);
    $response = new Response();
    //Cuando es un error interno el codigo es 500
    $response->setHttpStatusCode(500);
    $response->addMessage("Error de conexion a la BD");
    $response->send();
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){
   
    
        //Para la creacion se usa POST
    $json_string = file_get_contents('php://input');
    //Nos llega el objeto JSON
    $json_obj = json_decode($json_string);

    //Verificamos que no venga vacio (Tener preparado el codigo)
    if($json_obj->nombre_usuario == null || $json_obj->nombre_usuario == ""){
        //Cuando el usuario manda algo mal usamos el codigo 400
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->addMessage("El nombre no de usuario no puede ser null o estar vacio");
        $response->send();
        exit();
    }

    if($json_obj->contrasena == null || $json_obj->contrasena == ""){
        //Cuando el usuario manda algo mal usamos el codigo 400
        $response = new Response();
        $response->setHttpStatusCode(400);
        $response->addMessage("La contraseña no puede ser null o estar vacio");
        $response->send();
        exit();
    }

    $nombre = $json_obj->nombre_usuario;
    $contrasena = $json_obj->contrasena."";
    try {
        //Siempre es importante que cualquier Query es mejor probarlo desde la BD
        $query = $connection->prepare('SELECT * FROM usuario WHERE nombre_usuario = :nombre_usuario AND pass_key = :contrasena');
        $query->bindParam(':nombre_usuario', $nombre, PDO::PARAM_STR);
        $query->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        $query->execute();

        $rowCount = $query->rowCount();

        if ($rowCount == 0) {
            $response = new Response();
            $response->setHttpStatusCode(500);
            $response->addMessage("El nombre de usuario o la contraseña son incorrectos");
            $response->send();
            exit();
        }

        $usuario;

        while($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $usuario_aux = new Usuario($row["idusuario"], $row["nombre_usuario"],$row["pass_key"], $row["correo"] );
            
            $usuario[] = $usuario_aux->returnArray();
        }
        

        $response = new Response();
        //Cuando se crea algo se pone el 201
        $response->setHttpStatusCode(205);
        $response->setData($usuario);
        $response->send();  

        //session_start();
        $_SESSION["id"] = $usuario_aux->getId();
        $_SESSION["nombre_usuario"] = $usuario_aux->getNombre();
        //No se recomienda guardar la contraseña en el session porque es un dato sencible solo lo hacemos por cuestion de testeo
        //$_SESSION["pass"] = $usuario_aux->getPass();
        exit();
    } catch (PDOException $e) {
        error_log('Query error - ' . $e, 0);

        $response = new Response();
        $response->setHttpStatusCode(500);
        $response->addMessage("Error al consultar el usuario ");
        $response->send();
        exit();
    }

    
    

}