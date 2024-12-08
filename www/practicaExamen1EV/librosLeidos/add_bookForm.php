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

<form action =add_book.php method = "post">
    <label class=form-label name=titulo> Título </label>
    <input type=text name=titulo id=titulo>
    <br>
    <br>
    <br>
    <label class=form-label name=isbn> ISBN </label>
    <input type=text name=isbn id=isbn>
    <br>
    <br>
    <br>
    <label class=form-label name=autor> Autor </label>
    <select name=autor id=autor>
        <?php
    $servername = "db";
    $username = "root";
    $password = "test";
    $dbname = "listaLibros";
    $result = [];
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM autores");
        $stmt->execute();
        $result = $stmt->fetchAll();
    } catch(PDOException $e) {
        echo 'Fallo en conexión: ' . $e->getMessage();
    }finally{
        $conn = null;
    }
    foreach($result as $row){
        $identificador = $row["id"];
        echo "<option value=$identificador>" . $row["nombre"] . "</option>"; 
    }
    ?>
<br>
<br>
<input type = submit>
</form>


</body>
</html>