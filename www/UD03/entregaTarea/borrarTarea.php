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
                    <h2>Borrar tarea</h2>
                </div>

                <div class="container justify-content-between">





                <?php


                $servername = "db";
                $username = "root";
                $password = "test";
                $dbName = "tareas";
                



                $conMySQLi = new mysqli($servername, $username, $password);
                $conMySQLi->select_db($dbName);
                if ($conMySQLi->connect_error) {
                    throw new Exception("Fallo en conexión: " . $conMySQLi->connect_error);
                }

                $sql = "DELETE FROM tareas WHERE id = " . $_GET['id'];
                $resultado = $conMySQLi->query($sql);

                echo "Tarea eliminada correctamente";


                $conMySQLi->close();



                ?>






            </div>
            </main>
        </div>
    </div>

<?php include_once('footer.php'); ?>

</body>
</html>