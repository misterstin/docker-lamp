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
                    <h2>Gestión de tarea</h2>
                </div>

                <div class="container justify-content-between">
                    <?php
                        require_once('utils.php');
                        
                        $titulo = $_POST['titulo'];
                        $desc = $_POST['descripcion'];
                        $estado = $_POST['estado'];
                        $id_usuario = $_POST['id_usuario'];
                        $valido = true;
                        
                        if (!esCampoValido($titulo)){
                            $valido = false;
                        }
                        if (!esCampoValido($desc))
                        {
                            $valido = false;
                        }
                        if (!esCampoValido($estado))
                        {
                            $valido = false;
                        }
                      
                        
                        if (!esCampoValido($id_usuario)){

                            $valido = false;
                        }
                        
                        if ($valido){
                            

                        $servername = "db";
                        $username = "root";
                        $password = "test";
                        $dbName = "tareas";
                        

                        $conMySQLi = new mysqli($servername, $username, $password);
                        $conMySQLi->select_db($dbName);
                        if ($conMySQLi->connect_error) {
                            throw new Exception("Fallo en conexión: " . $conMySQLi->connect_error);
                        }

                        $sql = "INSERT INTO tareas (titulo, descripcion, estado, id_usuario) 
                                    VALUES ('$titulo', '$desc', '$estado', '$id_usuario')";
                        $conMySQLi->query($sql);
                
                        echo "<p>La tarea $titulo se almacenó correctamente:</p>";
                        $conMySQLi->close();
                        }
                        else
                        {
                            echo '<p class="error">Alguno de los campos no es válido.</p>';
                        }


                        

                ?>

                    

                </div>
                    </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>
