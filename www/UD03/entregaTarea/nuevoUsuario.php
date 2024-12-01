

<?php

$servername = "db";
$username = "root";
$password = "test";
$dbName = "tareas";
$usuarios = []; 

try {

    $conn = new PDO("mysql:host = $servername;dbname = $dbName", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM usuarios";
    $stmt = $conn->prepare($sql); //Se prepara la consulta para ser lanzada, paso obligatorio
    $stmt->execute();   //Se lanza la consulta
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //se almacena el resultado en un array
    
    

}catch(PDOException $e){

    echo "Fallo en conexión: ". $e->getMessage();
}finally {
    $conn = null;
}


?>