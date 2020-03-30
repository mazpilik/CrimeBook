<?php

/* ES LA DE LUIS */

class prueba{
    protected $id;
    protected $nombre;
    protected $descExtendida;
    protected $descBreve;
    protected $tipo; 
    protected $dificultad;
    protected $url;
    protected $ayudaFinal;
    protected $username;
    
    //Métodos
    public function getIdPrueba() {return $this->id; }
    public function getNombrePrueba() {return $this->nombre; }
    public function getdescExtendidaPrueba() {return $this->descExtendida; }
    public function getdescBrevePrueba() {return $this->descBreve; }
    public function getUrlPrueba() {return $this->url; }
    public function getTipoPrueba() {return $this->tipo; }
    public function getDificultadPrueba() {return $this->dificultad; }
    public function getayudaFinalPrueba() {return $this->ayudaFinal; }
    public function getUsernamePrueba() {return $this->username; }

    public function setIdPrueba($idPrueba) { $this->id = $idPrueba; }
    public function setNombrePrueba($nombrePrueba) { $this->nombre = $nombrePrueba; }
    public function setdescExtendidaPrueba($descExtendidaPrueba) { $this->descExtendida = $descExtendidaPrueba; }
    public function setdescBrevePrueba($descBrevePrueba) { $this->descBreve = $descBrevePrueba; }
    public function setUrlPrueba($urlPrueba) { $this->url = $urlPrueba; }
    public function setTipoPrueba($tipoPrueba) { $this->tipo = $tipoPrueba; }
    public function setDificultadPrueba($dificultadPrueba) { $this->dificultad = $dificultadPrueba; }
    public function setayudaFinalPrueba($ayudaFinalPrueba) { $this->ayudaFinal = $ayudaFinalPrueba; }
    public function setUsernamePrueba($usernamePrueba) { $this->username = $usernamePrueba; }    
    //Constructor de la clase, le pasamos un array obtenido de una 
    //fila de la base de datos
    public function __construct($row) {
        //iniciamos los atributos
        $this->id = $row['id'];
        $this->nombre = $row['nombre'];
        $this->descExtendida = $row['descExtendida'];
        $this->descBreve = $row['descBreve'];
        $this->tipo = $row['tipo'];
        $this->dificultad = $row['dificultad'];
        $this->url = $row['url'];
        $this->ayudaFinal = $row['ayudaFinal'];
        $this->username = $row['username'];
        
    }
}
?>
