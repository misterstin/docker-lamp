<?php

class tarea {

    private $id;
    private $titulo;
    private $descripcion;
    private $estado;
    private $usuario;

    public function __construct($id, $titulo, $descripcion, $estado, $usuario) {

        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->usuario = $usuario;
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

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo)
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado(string $estado)
    {
        $this->estado = $estado;
        return $this;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setUsuario(int $usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }
}

?>