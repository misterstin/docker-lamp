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



<div class="table">
    <table class="table table-striped table-hover">
        <thead class="thead">
            <tr>                            
                <th>Nombre de la tarea</th>
                <th>Estado</th>
                <th>Contenido</th>
            </tr>
        </thead>
        <tbody>
            <?php

            include 'utils.php';

            foreach ($tareas as $posicion){
                echo "<tr>";
                echo "<td>" . $posicion[nombre_tarea] . "</td>";
                echo "<td>" . $posicion[estado] . "</td>";
                echo "<td>" . $posicion[contenido] . "</td>";
                echo "</tr>";
            }
             ?>

        </tbody>
        </table>


            </main>
        
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>