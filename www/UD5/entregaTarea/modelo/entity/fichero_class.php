<?php

class fichero{

    private $id;
    private $nombre;
    private $file;
    private $descripcion;
    private $tarea;

    public function __construct($id, $nombre, $file, $descripcion, $tarea){

        $this->id = $id;
        $this->nombre = $nombre;
        $this->file = $file;
        $this->descripcion = $descripcion;
        $this->tarea = $tarea;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre)
    {
        $this->nombre = $nombre;
        return $this;
    }

    public function getFile()
    {
        return $this->file;
    }

    public function setFile(string $file)
    {
        $this->file = $file;
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

    public function getTarea()
    {
        return $this->tarea;
    }

    public function setTarea(int $tarea)
    {
        $this->tarea = $tarea;
        return $this;
    }
}


?>