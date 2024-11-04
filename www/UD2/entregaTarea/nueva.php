<?php

include 'utils.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_tarea = $_POST["nombre_tarea"];
    $estado = $_POST["estado"];
    $contenido = $_POST["contenido"];
}