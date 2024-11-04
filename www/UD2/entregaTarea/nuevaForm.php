
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'header.php'; ?> 
    <div class="container-fluid">
        <div class="row">
            <?php include 'menu.php'; ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<form action="nueva.php" method="post" class="mb-5">
    <div class="mb-3">
        <label class="form-label">Nombre de la tarea</label>
        <input name="nombre_tarea" class="form-control">
    </div>
    
        <label class="form-label">Estado</label>
        <select name="estado" class="form-select">
            <option>Pendiente</option>
            <option>En proceso</option>
            <option>Completada</option> 
        
            
        </select>
        
        <br>
        <br>
        <br>
        <br>

        <label class="form-label">Contenido</label>

        <br>
        <textarea name="contenido" rows="25" cols="100"></textarea>
        <br>
        <br>
    
    <button type="submit" class="btn btn-primary">Enviar</button>

    </main>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>