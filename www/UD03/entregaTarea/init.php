<?php
//declarar las variables con los datos de la db
$servername = "db";
$username = "root";
$password = "test";


//Hacer un trycatch para conectarse la bd

try{

$conPDO = new PDO("mysql:host=$servername;dbname=tareas", $username, $password);

//forzar excepciones
$conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Esto siempre hay que ponerlo igual
echo "Conexión correcta";


}catch(PDOExecption $e){

    echo "Fallo en conexión: ". $e->getMessage();//lo último es para que recoja el mensaje del error

}




?>