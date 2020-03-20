<?php

class Partida {
    // Attributes
    // Cons
    // Vars
    private $id;
    private $nombre;
    private $fechaCrecion;
    private $duracion;
    private $fechaInicio;
    private $idJuego;
    private $userName;

    // Methods
    public function __construct($row) {
        $this->id = $row['id'];
        $this->nombre = $row['nombre'];
        $this->fechaCrecion = $row['fechaCrecion'];
        $this->duracion = $row['duracion'];
        $this->fechaInicio = $row['fechaInicio'];
        $this->idJuego=$row['idJuego'];
        $this->userName=$row['username'];
    }
    
     /* GETTERS */
    public function getId() {return $this->id; }
    public function getNombre() {return $this->nombre; }
    public function getFechaCrecion() {return $this->fechaCrecion; }
    public function getDuracion() {return $this->duracion; }
    public function getFechaInicio() {return $this->fechaInicio; }
    public function getIdJuego() {return $this->idJuego; }
    public function getUserName() {return $this->userName; }
    
}

?>
