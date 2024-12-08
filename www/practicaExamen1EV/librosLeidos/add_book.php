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
<title>Añadir Libro</title>
</head>
<body>
<h1>Añadir libro</h1>



<?php
include ("validar.php");
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$isbn = $_POST["isbn"];
$error = "";

if (validarForm($titulo)!= false){
    $titulo = validarForm($titulo);
} else {
    $error = "Título no valido";
}

if (validarForm($isbn) != false){
    $isbn = validarForm($isbn);
    
}else{
    $error = $error . ", Error el formato del ISBN no es valido";
}

if (empty($error)){


    $servername = "db";
    $username = "root";
    $password = "test";
    $dbname = "listaLibros";

    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO libros (titulo, autor, isbn)
        VALUES ('$titulo', '$autor', '$isbn')";
        $conn->exec($sql);
    } catch(PDOException $e) {
        echo 'Fallo en conexión: ' . $e->getMessage();
    }finally{
        $conn = null;
    }
    

    echo "Datos guardados correctamente";
    echo "<br>";
    echo "<a href='index.php' class='boton'>volver</a>";
} else {

    echo $error;
    echo "<br>";
    echo "<a href='add_bookForm.php' class='boton'>Reintentar</a>";
}





?>
</body>
</html>