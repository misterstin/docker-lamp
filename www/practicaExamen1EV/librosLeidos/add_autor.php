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
<title>Añadir Autor</title>
</head>
<body>
<h1>Añadir Autor</h1>
<br>
<br>

<?php

$servername = "db";
$username = "root";
$password = "test";
$dbname = "listaLibros";
$autor = $_POST["nombre"];

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO autores (nombre)
    VALUES ('$autor')";
    $conn->exec($sql);
    echo "Autor añadido correctamente";
    echo "<br>";
    echo "<br>";
    echo "<a href='autores.php' class='boton'>volver</a>";
} catch(PDOException $e) {
    echo 'Fallo en conexión: ' . $e->getMessage();
}finally{
    $conn = null;
}


?>

</body>
</html>