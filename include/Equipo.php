<?php

class Equipo {

    // Attributes
    // Cons
    // Vars
    private $id;
    private $codigo;
    private $nombre;
    private $tiempo;
    private $idPartida;

    // Methods
    public function __construct($row) {
        $this->id = $row['id'];
        $this->codigo = $row['codigo'];
        $this->nombre = $row['nombre'];
        $this->tiempo = $row['tiempo'];
        $this->idPartida = $row['idPartida'];
    }

    /* GETTERS */

    public function getId() {
        return $this->id;
    }
    
    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getIdPartida() {
        return $this->idPartida;
    }

    public function getTiempo() {
        return $this->tiempo;
    }
}

?>
