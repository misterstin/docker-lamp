<?php
include_once('loginAuth.php');

session_unset();
session_destroy();

header("Location: /UD4/entregaTarea/usuarios/login.php"); 
exit();
?>