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

    echo "Conexión correcta";

    // Comprobamos si la base de datos existe buscándola mediante una consulta SQL
    $dbName = "tareas";
    $result = $conMySQLi->query("SHOW DATABASES LIKE '$dbName'");

    if ($result->num_rows > 0) {
        // Nos conectamos a la base de datos existente
        $conMySQLi->select_db($dbName);
    } else {
        // Crear la base de datos si no existe
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
    echo $e->getMessage(); // Mostrar mensaje de error
} finally {
    // Cerrar la conexión siempre al terminar
    if (isset($conMySQLi) && $conMySQLi instanceof mysqli) {
        $conMySQLi->close();
    }
}
?>