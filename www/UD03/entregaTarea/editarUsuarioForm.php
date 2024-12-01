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
                    <h2>Editar usuario</h2>
                </div>

                <div class="container justify-content-between">

                <?php


                $servername = "db";
                $username = "root";
                $password = "test";
                $dbName = "tareas";
                $usuarios = [];
                $idComprobar = $_GET['id'];

                try {

                    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                    $sql = "SELECT * FROM usuarios WHERE id=$idComprobar";
                    $stmt = $conn->prepare($sql); 
                    $stmt->execute();   
                    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    
                    
                
                }catch(PDOException $e){
                
                    echo "Fallo en conexión: ". $e->getMessage();
                }finally {
                    $conn = null;
                }



                ?>


                <div class="container justify-content-between">
                    <form action="editarUsuario.php" method="POST" class="mb-5 w-50">
                        

                        <div class="mb-3">
                            
                            <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idComprobar; ?>" required>
                
                        </div>

                        <div class="mb-3">
                            <label for="userName" class="form-label">Nombre de Usuario</label>
                            <input type="text" class="form-control" id="userName" name="userName" value=<?php echo $usuarios[0]["username"]?> required> <!-- Importante especificar en el array la posición en este caso siempre 0 -->
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value=<?php echo $usuarios[0]["nombre"]?> required>
                        </div>
                        <div class="mb-3">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value=<?php echo $usuarios[0]["apellidos"]?> required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="text" class="form-control" id="password" name="password" value=<?php echo $usuarios[0]["contraseña"]?> required>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>






                </div>
            </main>
        </div>
    </div>

    <?php include_once('footer.php'); ?>
    
</body>
</html>