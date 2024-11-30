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
                    <h2>Mis tareas</h2>
                </div>




<?php
// Declarar las variables con los datos de la DB
$servername = "db";
$username = "root";
$password = "test";

// Hacer un try-catch para conectarse a la base de datos
try {
    // Crear conexión inicial
    $conMySQLi = new mysqli($servername, $username, $password);

    // Verificar si hay errores en la conexión
    if ($conMySQLi->connect_error) {
        throw new Exception("Fallo en conexión: " . $conMySQLi->connect_error);
    }

    echo "Conexión correcta ";

    // Comprobamos si la base de datos existe buscándola mediante una consulta SQL
    $dbName = "tareas";
    $result = $conMySQLi->query("SHOW DATABASES LIKE '$dbName'");

    if ($result->num_rows > 0) {
        $conMySQLi->select_db($dbName);
    } else {
        $sql = "CREATE DATABASE $dbName";
        if (!$conMySQLi->query($sql)) {
            throw new Exception("Error al crear la base de datos: " . $conMySQLi->error);
        }
        echo "Base de datos creada correctamente";

        // Nos conectamos a la base de datos recién creada
        $conMySQLi->select_db($dbName);
        echo "Conexión correcta a la base de datos recién creada.";
    }



    

} catch (Exception $e) {
    echo $e->getMessage(); 
} 


$conMySQLi->select_db('tareas');


$sql="CREATE TABLE IF NOT EXISTS usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    nombre VARCHAR(50),
    apellidos VARCHAR (100),
    contraseña VARCHAR(100)
    );
    CREATE TABLE IF NOT EXISTS tareas(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(50),
    descripcion VARCHAR(250),
    estado VARCHAR(50),
    id_usuario INT,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    );
    ";

if ($conMySQLi->multi_query($sql)) {
    echo "Las tablas se han creado correctamente o ya existían.";
} else {
    echo "Error al crear las tablas: " . $conMySQLi->error;
}

$conMySQLi->close();


        
    

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