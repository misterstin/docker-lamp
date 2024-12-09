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
<title>Borrar autor</title>
</head>
<body>
<h1>Borrar Autor</h1>
<br>
<br>

<br>

<?php

$servername = "db";
$username = "root";
$password = "test";
$dbname = "listaLibros";
$idBorrar = $_GET ["id"];
$result = [];

//Comprobación de que no hay libros suyos guardados

try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM libros WHERE autor = '$idBorrar'");
    $stmt->execute();
    $result = $stmt->fetchAll();
    
    

    
} catch(PDOException $e) {
    echo 'Fallo en conexión: ' . $e->getMessage();
}finally{
    $conn = null;
}


//Borrado
if (empty($result)){
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM autores WHERE id = '$idBorrar'";
        $conn->exec($sql);
        echo "Autor borrado correctamente";
        echo "<br>";
        echo "<br>";
        echo "<a href='autores.php' class='boton'>volver</a>";
    
        
    } catch(PDOException $e) {
        echo 'Fallo en conexión: ' . $e->getMessage();
    }finally{
        $conn = null;
    }
} else {
    echo "Error, elimina antes los libros de este autor";
    echo "<br>";
    echo "<br>";
    echo "<a href='autores.php' class='boton'>volver</a>";
}



?>


</body>
</html>