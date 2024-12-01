<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

    <?php include_once('header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Mis tareas</h2>
                </div>

                <div class="container justify-content-between">
                <?php require_once('utils.php'); ?>
                    
                
                <?php

                $servername = "db";
                $username = "root";
                $password = "test";
                $dbName = "tareas";
                $tareas = []; // importante inicializar el array al principio o no funcionara

                $conMySQLi = new mysqli($servername, $username, $password);
                $conMySQLi->select_db($dbName);
                if ($conMySQLi->connect_error) {
                throw new Exception("Fallo en conexión: " . $conMySQLi->connect_error);
                }

                $sql = "SELECT * FROM tareas";
                $tarea = $conMySQLi->query($sql);
                

                $conMySQLi->close();

                ?>
                
                
                <div class="table">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>                            
                                    <th>Identificador</th>
                                    <th>Descriptción</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $lista = tareas();
                                    foreach ($lista as $tarea)
                                    {
                                        echo '<tr>';
                                        echo '<td>' . $tarea['id'] . '</td>';
                                        echo '<td>' . $tarea['titulo'] . '</td>';
                                        echo '<td>' . $tarea['descripcion'] . '</td>';
                                        echo '<td>' . $tarea['estado'] . '</td>';
                                        echo '<td>' . $tarea ['id_usuario'] . '</td>';
                                        echo "<td>" ;
                                            echo '<a href="editarTareaForm.php?id=' . $tarea['id'] . '" class="btn btn-primary">Editar</a>';
                                            echo '<a href="borrarTarea.php?id=' . $tarea['id'] . '" class="btn btn-danger">Eliminar</a>';
                                        echo "</td>";
                                        echo '</tr>';
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
