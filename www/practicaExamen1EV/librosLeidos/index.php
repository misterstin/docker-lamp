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
<title>Lista de Libros</title>
</head>
<body>
<h1>Mi Biblioteca</h1>
<a href="config.php" class="boton">Iniciar BD</a>
<br>
<a href="add_bookForm.php" class="boton">Añadir Libro</a>

<?php

$servername = "db";
$username = "root";
$password = "test";
$dbname = "listaLibros";
$result = [];
$autor_resultado = [];



try{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * from libros");
    $stmt->execute();
    $result = $stmt->fetchAll();
} catch(PDOException $e) {
    echo 'Fallo en conexión: ' . $e->getMessage();
}finally{
    $conn = null;
}


echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<td>id</td>";
echo "<td>Título</td>";
echo "<td>Autor</td>";
echo "<td>ISBN</td>";
echo "<td>Opciones</td>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
foreach ($result as $row){
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["titulo"] . "</td>";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $autorBuscar = $row["autor"];
        $stmt = $conn->prepare("SELECT nombre FROM autores WHERE $autorBuscar = id");
        $stmt->execute();
        $autor_resultado = $stmt->fetchAll();
    } catch(PDOException $e) {
        echo 'Fallo en conexión: ' . $e->getMessage();
    }finally{
        $conn = null;
    }
    foreach($autor_resultado as $autRes){
        echo "<td>" . $autRes["nombre"] . "</td>";
    }
    echo "<td>" . $row["isbn"] . "</td>";
    echo "<td>" . "<a class='btn btn-primary' href=delete_books.php?id=".$row['id'].">Eliminar</a>"  . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";
  


?>


</body>
</html>





