<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['error_message'] = "Debes iniciar sesión para continuar.";
    header("Location: /UD4/entregaTarea/usuarios/login.php");
    exit();}

    require_once('../modelo/pdo.php');

$user_username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$es_admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;

$resultado = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD3. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <?php include_once('../vista/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            
            <?php include_once('../vista/menu.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Tareas</h2>
                </div>

                <div class="container justify-content-between">
                <?php
                include_once('../modelo/mysqli.php');

                $id_tarea = $_GET['id'];
                require_once('../modelo/pdo.php');
                $resultado = infoTareas($id_tarea);

                if ($resultado[0] && is_array($resultado[1])) {
                    $tareas = $resultado[1];  
                } else {
                    $tareas = []; 
                    echo '<p>Error al obtener las tareas: ' . $resultado[1] . '</p>';
                }
                ?>

                <div class="row">
                    <?php
                    if (count($tareas) > 0) {
                        foreach ($tareas as $tarea) {
                            ?>
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $tarea['titulo']; ?></h5>
                                        <p class="card-text"><strong>ID: <?php echo $tarea['id']; ?></p>
                                        <p class="card-text"><strong>Descripción:</strong> <?php echo $tarea['descripcion']; ?></p>
                                        <p class="card-text"><strong>Estado:</strong> <?php echo $tarea['estado']; ?></p>
                                        <p class="card-text"><strong>Usuario:</strong> <?php echo nombreUsuario($tarea['id_usuario']); ?></p>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<div class="col-12"><p>No se encontraron tareas.</p></div>';
                    }
                    ?>

                   
                    <div class="col-md-4 mb-4">
                        <a href="subidaFichForm.php?id=<?php echo $tarea['id']; ?>" class="card shadow-sm text-decoration-none">
                            <div class="card-body text-center">
                                <h5 class="card-title">Subir Archivo</h5>
                                <p class="card-text">Haz clic para subir un archivo relacionado con la tarea.</p>
                            </div>
                        </a>
                    </div>

                </div>

                </div>
            </main>
        </div>
    </div>

    <?php include_once('../vista/footer.php'); ?>
    
</body>
</html>