<?php

class Partida {

    // Attributes
    // Cons
    // Vars
    private $id;
    private $nombre;
    private $fechaCreacion;
    private $duracion;
    private $fechaInicio;
    private $idJuego;
    private $userName;
    private $finalizada;

    // Methods
    public function __construct($row) {
        $this->id = $row['id'];
        $this->nombre = $row['nombre'];
        $this->fechaCreacion = $row['fechaCreacion'];
        $this->duracion = $row['duracion'];
        $this->fechaInicio = $row['fechaInicio'];
        $this->idJuego = $row['idJuego'];
        $this->userName = $row['username'];
        $this->finalizada = $row['finalizada'];
    }

    /* GETTERS */

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFechaCreacion() {
        return $this->fechaCreacion;
    }

    public function getDuracion() {
        return $this->duracion;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function getIdJuego() {
        return $this->idJuego;
    }

    public function getUserName() {
        return $this->userName;
    }
    
    public function getFinalizada() {
        return $this->finalizada;
    }

}

?>
