<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('header.php'); ?>
    
    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Alta de nuevo usuario</h2>
                </div>

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

</main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>