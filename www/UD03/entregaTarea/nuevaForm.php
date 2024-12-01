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
                    <h2>Nueva tarea</h2>
                </div>

                <div class="container justify-content-between">
                    <form action="nueva.php" method="POST" class="mb-5 w-50">
                        <div class="mb-3">          
                </div>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Título de la tarea</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" required>
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                        </div>
                        <div class="mb-3">
                            <label for="estado" class="form-label">Estado</label>
                            <select class="form-select" id="estado" name="estado" required>
                                <option value="" selected disabled>Seleccione el estado</option>
                                <option value="en_proceso">En Proceso</option>
                                <option value="pendiente">Pendiente</option>
                                <option value="completada">Completada</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_usuario" class="form-label">Asignar a usuario</label>
                            <select class="form-select" id="id_usuario" name="id_usuario" required>
                                <option value="" selected disabled>Seleccione un usuario</option>
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
                                        echo '<option value="' . htmlspecialchars($row['id']) . '">' . htmlspecialchars($row['username']) . '</option>';//mediante el bucle cargamos las opciones, el campo envia el id pero muestra al usuario el username
                                    }
                                } catch (PDOException $e) {
                                    echo '<option value="">Error al cargar usuarios</option>';
                                } finally {
                                    $conn = null;
                                }
                                ?>
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
