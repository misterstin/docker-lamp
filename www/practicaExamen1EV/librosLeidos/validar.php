<?php

function validarDato($dato){


    $dato = trim ($dato);
    $dato = stripslashes ($dato);
    $dato = htmlspecialchars($dato);
    return $dato;

}

function validarForm ($info){
    $info = validarDato($info);

    if (empty($info)){
    
        return false;
    } else {
        return true;
    }


}





?>