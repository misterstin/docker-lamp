
<?php

global $tareas;
$tareas = [];

function test_input($dato){
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    $dato = preg_replace('/\s+/', ' ', $dato);
    return $dato;
}

function validar_dato($dato){
    $dato = test_input($dato);
    return !empty($dato);

}

function validar_estado($dato){
    if($dato == "Pendiente" || $dato == "En proceso" || $dato == "Completada"){
        return true;
    } else {
        return false;
    }
}

function guardar_datos($nombre_tarea, $estado, $contenido){

    $nombre_tarea = test_input($nombre_tarea);
    $contenido = test_input($contenido);
    //No valido los datos de estado con test_input porque validar_estado ya no acepta nada que no sean las tres opciones dadas


    if (validar_dato($nombre_tarea) && validar_estado($estado) && validar_dato($contenido)){  

    }

}


?>