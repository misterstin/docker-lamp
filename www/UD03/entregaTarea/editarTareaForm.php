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
                    <h2>Editar tarea</h2>
                </div>

                <div class="container justify-content-between">



                <?php

                $servername = "db";
                $username = "root";
                $password = "test";
                $dbName = "tareas";
                $idEditar = $_GET['id'];
                $infoCampos = [];

                $conMySQLi = new mysqli($servername, $username, $password);
                $conMySQLi->select_db($dbName);
                if ($conMySQLi->connect_error) {
                    throw new Exception("Fallo en conexión: " . $conMySQLi->connect_error);
                }

                $sql = "SELECT * FROM tareas WHERE id=$idEditar";
                $resultado = $conMySQLi->query($sql);
                $infoCampos = $resultado->fetch_all(MYSQLI_ASSOC);//importante estas 3 lineas para cargar el resultado en el array etch_all(MYSQLI_ASSOC) se usa para obtener todas las filas a la vez


                $conMySQLi->close();

                ?>

                     <form action="editaTarea.php" method="POST" class="mb-5 w-50">
                        <div class="mb-3"> 
                        <div class="mb-3">
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idEditar; ?>" required>         
                        </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título de la tarea</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value=<?php echo $infoCampos[0]["titulo"]?> required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value=<?php echo $infoCampos[0]["descripcion"]?> required>
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="en_proceso" 
                                    <?php 
                                        if ($infoCampos[0]["estado"] == 'en_proceso') {
                                            echo 'selected';
                                        } 
                                    ?>
                                    >En Proceso</option>
        
                                <option value="pendiente" 
                                    <?php 
                                        if ($infoCampos[0]["estado"] == 'pendiente') {
                                            echo 'selected';
                                        } 
                                    ?>
                                    >Pendiente</option>
        
                                <option value="completada" 
                                    <?php 
                                        if ($infoCampos[0]["estado"] == 'completada') {
                                             echo 'selected';
                                        } 
                                    ?>
                                    >Completada</option>
                                </select>
                            </div>

                        <div class="mb-3">
                            <label for="id_usuario" class="form-label">Asignar a usuario</label>
                            <select class="form-select" id="id_usuario" name="id_usuario" required>
        
                                <?php
        
                                $servername = "db";
                                $username = "root";
                                $password = "test";
                                $dbName = "tareas";

                                try {
                                    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $sql = "SELECT id, username FROM usuarios";
                                    $stmt = $conn->prepare($sql);
                                    $stmt->execute();

                                    // Construir las opciones del select con un bucle como en usuarios.php
                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    // Comprobar si el id del usuario coincide con $infoCampos[0]["id_usuario"]
                                    $selected = ($row['id'] == $infoCampos[0]["id_usuario"]) ? 'selected' : '';
                                    echo '<option value="' . htmlspecialchars($row['id']) . '" ' . $selected . '>' . htmlspecialchars($row['username']) . '</option>';
                                    }
                                } catch (PDOException $e) {
                                    echo '<option value="">Error al cargar usuarios</option>';
                                } finally {
                                    $conn = null;
                                }
                                ?>
                            </select>
                        </div>


                        
                        
                                
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
               
            </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>




