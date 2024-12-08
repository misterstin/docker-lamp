<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
font-family: Arial, sans-serif;
background-color: #f0f0f0;
text-align: center;
margin-top: 50px;
}
h1 {
color: #333;
}
form {
margin-bottom: 20px;
}
input[type="text"] {
padding: 10px;
width: 200px;
margin-right: 10px;
}
button {
padding: 10px 20px;
background-color: #5cb85c;
color: white;
border: none;
cursor: pointer;
}
ul {
list-style-type: none;
padding: 0;
}
li {
padding: 10px;
background-color: white;
margin-bottom: 5px;
}
a {
color: red;
text-decoration: none;
}
</style>
<title>config</title>
</head>
<body>



<?php

$servername = "db";
$username = "root";
$password = "test";



try{
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '-Conexión PDO correcta<br>';
    $sql = "CREATE DATABASE IF NOT EXISTS listaLibros";
    $conn->exec($sql);
    echo '-Base de datos creada correctamente<br>';
    $conn->exec("USE listaLibros");
    $sql = "CREATE TABLE IF NOT EXISTS autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR (250) NOT NULL
    );";
    $conn->exec($sql);
    echo 'Tabla autores creada correctamente <br>';
    $sql = "CREATE TABLE IF NOT EXISTS libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(250) NOT NULL,
    autor INT NOT NULL,
    isbn BIGINT NOT NULL,
    FOREIGN KEY (autor) REFERENCES autores(id)
    );";
    $conn->exec($sql);
    echo 'Tabla libros creada correctamente <br>';
}catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage() . '<br>';
}
finally {
   
    $conn = null;
    echo 'Conexión cerrada <br> <br>';
}






?>
<a href="index.php" class="boton">volver</a>

</body>
</html>
