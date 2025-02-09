<?php

function conectaPDO()
{
    $servername = getenv('DB_HOST');
    $username = getenv('DB_USER');
    $password = getenv('DB_PASS');
    $dbname = getenv('DB_NAME');
    $port = getenv('DB_PORT');

    $conPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conPDO;
}

function listaUsuarios()
{
    try {
        $con = conectaPDO();
        $stmt = $con->prepare('SELECT id, username, nombre, apellidos, admin FROM usuarios');
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultados = $stmt->fetchAll();
        return [true, $resultados];
    }
    catch (PDOException $e) {
        return [false, $e->getMessage()];
    }
    finally {
        $con = null;
    }
    
}

function listaTareasPDO($id_usuario, $estado)
{
    try {
        $con = conectaPDO();
        $sql = 'SELECT * FROM tareas WHERE id_usuario = ' . $id_usuario;
        if (isset($estado))
        {
            $sql = $sql . " AND estado = '" . $estado . "'";
        }
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tareas = array();
        while ($row = $stmt->fetch())
        {
            $usuario = buscaUsuario($row['id_usuario']);
            $row['id_usuario'] = $usuario['username'];
            array_push($tareas, $row);
        }
        return [true, $tareas];
    }
    catch (PDOException $e) {
        return [false, $e->getMessage()];
    }
    finally {
        $con = null;
    }
    
}

function nuevoUsuario($nombre, $apellidos, $username, $contrasena, $admin)
{
    try{

        $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);

        $con = conectaPDO();
        $stmt = $con->prepare("INSERT INTO usuarios (nombre, apellidos, username, contrasena, admin) VALUES (:nombre, :apellidos, :username, :contrasena, :admin)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':contrasena', $contrasenaHash);
        $stmt->bindParam(':admin', $admin);
        $stmt->execute();
        
        $stmt->closeCursor();

        return [true, null];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}

function actualizaUsuario($id, $nombre, $apellidos, $username, $contrasena, $admin)
{
    try{
        $con = conectaPDO();
        $sql = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, username = :username, admin = :admin";

        if (isset($contrasena))
        {
            $sql = $sql . ', contrasena = :contrasena';
        }

        $sql = $sql . ' WHERE id = :id';

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':admin', $admin);
        if (isset($contrasena)) $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        
        $stmt->closeCursor();

        return [true, null];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}

function borraUsuario($id)
{
    try {
        $con = conectaPDO();

        $con->beginTransaction();

        $stmt = $con->prepare('DELETE FROM tareas WHERE id_usuario = ' . $id);
        $stmt->execute();
        $stmt = $con->prepare('DELETE FROM usuarios WHERE id = ' . $id);
        $stmt->execute();
        
        return [$con->commit(), ''];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}

function buscaUsuario($id)
{

    try
    {
        $con = conectaPDO();
        $stmt = $con->prepare('SELECT * FROM usuarios WHERE id = ' . $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1)
        {
            return $stmt->fetch();
        }
        else
        {
            return null;
        }
    }
    catch (PDOExcetion $e)
    {
        return null;
    }
    finally
    {
        $con = null;
    }
    
}

function buscaLogin($username, $password)
{
    try {
        $con = conectaPDO();
        
        
        $sql = "SELECT username, contrasena, admin FROM usuarios WHERE username = '$username'";
        $stmt = $con->query($sql); 
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            
            
            if (password_verify($password, $user['contrasena'])) {
                return $user; 
            } else {
                return null; 
            }
        } else {
            return null; 
        }
    } catch (PDOException $e) {
        return null;
    } finally {
        $con = null;
    }
}

function infoTareas($id_tarea)
{
    try {
        $con = conectaPDO();
        $sql = 'SELECT * FROM tareas WHERE id = ' . $id_tarea;
        
       
       

        $stmt = $con->prepare($sql);
        $stmt->execute();

        
        $tareas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
            return [true, $tareas]; 
        
    } catch (PDOException $e) {
        return [false, $e->getMessage()]; 
    } finally {
        $con = null;
    }
}

function nombreUsuario($id_usuario) {
    try {
        $con = conectaPDO();
        $sql = 'SELECT username FROM usuarios WHERE id = ' . $id_usuario;  
        $stmt = $con->prepare($sql);
        $stmt->execute();

       
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if ($usuario) {
            return $usuario['username'];  
        } else {
            return '';  
        }
        
    } catch (PDOException $e) {
        return [false, $e->getMessage()]; 
    } finally {
        $con = null;
    }
}

