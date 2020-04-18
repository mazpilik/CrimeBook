<?php

class Resolucion{
    protected $idPrueba;
    protected $idEquipo;
    protected $resuelta;
    protected $intentos;
    protected $estrellas; 
    
    //Métodos
    public function getIdPrueba() {return $this->idPrueba; }
    public function getIdEquipo() {return $this->idEquipo;}
    public function getResuelta() {return $this->resuelta;}
    public function getIntentos() {return $this->intentos;}
    public function getEstrellas() {return $this->estrellas;}

    function __construct($row) {
        $this->idPrueba = $row['idPrueba'];
        $this->idEquipo = $row['idEquipo'];
        $this->resuelta = $row['resuelta'];
        $this->intentos = $row['intentos'];
        $this->estrellas = $row['estrellas'];
    }
}