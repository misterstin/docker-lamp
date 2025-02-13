<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['error_message'] = "Debes iniciar sesión para continuar.";
    header("Location: /UD4/entregaTarea/usuarios/login.php");
    exit();}

    require_once('../modelo/pdo.php');

$user_username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$es_admin = isset($_SESSION['admin']) && $_SESSION['admin'] == 1;
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
            
            <?php include_once('../vista/menu.php');
            $id_tarea = $_GET['id']; ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h2>Tareas</h2>
                </div>
                <form action="subidaFichForm.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                         <label for="descripcion" class="form-label">Descripción</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="mb-3">
                        <label for="archivo" class="form-label">Seleccionar archivo</label>
                        <input type="file" class="form-control" id="fileToUpload" name="fileToUpload" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Subir archivo</button>
                </form>
        </div>
    </div>

    <?php
  $target_dir = "files/";

  $nombreAleatorio= bin2hex(random_bytes(8));  


  $target_dir = "files/";
  $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION)); 
  $target_file = $target_dir . $nombreAleatorio . '.' . $fileType;
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if (!file_exists($target_file))
  {
      if ($_FILES["fileToUpload"]["size"] > 20 * 1024 * 1024)
      {
          if (
            $fileType != "jpg"
            && $fileType != "png"
            && $fileType != "jpeg"
            && $fileType != "pdf" )
          {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
            {
                echo "El fichero ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). "ha sido subido.";
            }
            else
            {
                echo "Hubo un error subiendo el fichero";
            }
          }
          else
          {
              echo "Solo los ficheros JPG, JPEG, PNG & GIF están permitidos.";
          }
      }
      else
      { 
          echo "El archivo es demasiado grande.";
      }
  }
  else
  { 
      echo "El fichero ya existe";
  }


  include_once('../modelo/pdo.php');
  subirArchivo($random_name, $target_file, $_POST['descripcion'], $_GET['id']);
?>
    <?php include_once('../vista/footer.php'); ?>
    
</body>
</html> 