<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pista
 *
 * @author Iñaki
 */
class Pista {
    protected $idPrueba;
    protected $id;
    protected $texto;
    protected $tiempo;
    protected $intentos;
   
    
    public function getIdPrueba() {return $this->idPrueba; }
    public function getId() {return $this->id; }
    public function getTexto() {return $this->texto; }
    public function getTiempo() {return $this->tiempo; }
    public function getIntentos() {return $this->intentos; }

    
        public function __construct($row) {
        $this->idPrueba = $row['idPrueba'];
        $this->Id = $row['id'];
        $this->texto = $row['texto'];
        $this->tiempo = $row['tiempo'];
        $this->intentos = $row['intentos'];

   
}

}
?>