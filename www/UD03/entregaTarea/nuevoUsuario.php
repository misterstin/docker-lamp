

<?php

$servername = "db";
$username = "root";
$password = "test";
$dbName = "tareas";
$usuarios = []; 


require_once('utils.php');
    
    $userName = $_POST['userName'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $contraseña = $_POST['password'];
    




try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO usuarios (username, nombre, apellidos, contraseña) 
            VALUES ('$userName', '$nombre', '$apellidos', '$contraseña')";

    $stmt = $conn->prepare($sql);
    $stmt->execute();   
    echo "Usuario registrado correctamente";
    
    

}catch(PDOException $e){

    echo "Fallo en conexión: ". $e->getMessage();
}finally {
    $conn = null;
}


?>