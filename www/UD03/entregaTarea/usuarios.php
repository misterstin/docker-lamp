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
                    
                </div>




<?php

$servername = "db";
$username = "root";
$password = "test";
$dbName = "tareas";
$usuarios = []; //importante inicializar el array antes del try

try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);//Importante no dejar esapacios entre host=$servername;dbname=$dbName
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM usuarios";
    $stmt = $conn->prepare($sql); //Se prepara la consulta para ser lanzada, paso obligatorio
    $stmt->execute();   //Se lanza la consulta
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //se almacena el resultado en un array
    
    
    //FETCH_ASSOC indica que se guardaran los resultados en un array bidimensional
    //fetchAll hace que se cojan todos los resultados que da la consulta

}catch(PDOException $e){

    echo "Fallo en conexión: ". $e->getMessage();
}finally {
    $conn = null;
}

?>


<div class="container mt-4">
    <h2>Lista de Usuarios</h2>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        
        foreach ($usuarios as $usuario){
        
        echo "<tr>";
        echo "<td>" . $usuario["id"] . "</td>";
        echo "<td>" . $usuario["username"] . "</td>";
        echo "<td>" . $usuario["nombre"] . "</td>";
        echo "<td>" . $usuario["apellidos"] . "</td>";
        echo "<td>" . $usuario["contraseña"] . "</td>";
        echo "<td>" ;
            echo '<a href="editar.php?id=' . $usuario['id'] . '" class="btn btn-primary">Editar</a>';
            echo '<a href="eliminar.php?id=' . $usuario['id'] . '" class="btn btn-danger">Eliminar</a>';
        echo "</td>";
        echo "</tr>";
        

        }
        ?>

                

</tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>