<?php
session_start();
include_once('../modelo/pdo.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $userData = buscaLogin($username, $password);

    if ($userData !== null) {
        
        $_SESSION['username'] = $userData['username'];
        $_SESSION['admin'] = $userData['admin']; 

        
        header("Location: ../index.php");
        exit();
    } else {
        
        $_SESSION['error_message'] = "Usuario o contraseña incorrectos.";
        header("Location: /UD4/entregaTarea/usuarios/login.php");
        exit();
    }
} else {
    
    if (isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message']; 
        unset($_SESSION['error_message']); 
    }
}
?>