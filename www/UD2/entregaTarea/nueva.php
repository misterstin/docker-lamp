<?php

include 'utils.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_tarea = $_POST["nombre_tarea"];
    $estado = $_POST["estado"];
    $contenido = $_POST["contenido"];

    
    $guardar_datos = guardar_datos($nombre_tarea, $estado, $contenido);

    if ($guardar_datos == true) {
        echo "Datos guardados correctamente";
    } else {
        echo "Error, verifica los datos y vuelve a intentarlo";
    }
}

?>