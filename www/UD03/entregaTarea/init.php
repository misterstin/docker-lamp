<?php
//declarar las variables con los datos de la db
$servername = "db";
$username = "root";
$password = "test";


//Hacer un trycatch para conectarse la bd

try{

$conPDO = new PDO("mysql:host=$servername", $username, $password);

//forzar excepciones
$conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Esto siempre hay que ponerlo igual
echo "Conexión correcta";
/*Comprobamos si la base de datos existe buscandola mediante sentencia sql si devuelve algún
resultado, nos conectamos a ella sobreescribiendo conPDO, sino la creamos*/
$dbName = "tareas";
$stmt = $conPDO->query("SHOW DATABASES LIKE '$dbName'");

if($stmt->rowCount() > 0){
    $conPDO = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}else{

    $sql = "CREATE DATABASE tareas";
    $conPDO->exec($sql);
    echo "Base de datos creada correctamente";

    //Nos conectamos a la base de datos recien creada

    $conPDO = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión correcta a la base de datos recién creada.";

}



}catch(PDOExecption $e){

    echo "Fallo en conexión: ". $e->getMessage();//lo último es para que recoja el mensaje del error

}


$conPDO = null //Cerrar base de datos siempre al terminar

?>