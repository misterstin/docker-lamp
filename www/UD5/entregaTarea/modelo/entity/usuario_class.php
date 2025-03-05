<?php

class usuario{

    private $id;
    private $username;
    private $nombre;
    private $apellidos;
    private $contrasena;
    private $rol;


    public function __construct($id, $username, $nombre, $apellidos, $contrasena, $rol) {
        $this->id = $id;
        $this->username = $username;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->contraseña = $contrasena;
        $this->rol = $rol;
    }
    


    
    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername(string $username)
    {
        $this->username = $username;
        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos)
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getContrasena()
    {
        return $this->contrasena;
    }

    public function setContrasena(string $contrasena)
    {
        $this->contrasena = $contrasena;
        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol(string $rol)
    {
        $this->rol = $rol;
        return $this;
    }
}

    ?>