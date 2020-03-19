<?php
class juego {
    protected $id;
    protected $nombre;
    protected $descExtendida;
    protected $descBreve;
    protected $fechaCreacion;
    protected $username;
    protected $numPruebas;
    
    public function getIdJuego() {return $this->id; }
    public function getNombreJuego() {return $this->nombre; }
    public function getdescExtendidaJuego() {return $this->descExtendida; }
    public function getdescBreveJuego() {return $this->descBreve; }
    public function getfechaCreacionJuego() {return $this->fechaCreacion; }
    public function getUsernameJuego() {return $this->username; }
    public function getnumPruebasJuego() {return $this->numPruebas; }
    
    public function setIdJuego($idJuego) { $this->id = $idJuego; }
    public function setNombreJuego($nombreJuego) { $this->nombre = $nombreJuego; }
    public function setdescBreveJuego($descBreveJuego) { $this->descBreve = $descBreveJuego; }
    public function setdescExtendidaJuego($descExtendidaJuego) { $this->descExtendida = $descExtendidaJuego; }
    public function setfechaCreacionJuego($fechaCreacionJuego) { $this->fechaCreacion = $fechaCreacionJuego; }
    public function setUsernameJuego($usernameJuego) { $this->username = $usernameJuego; }
    public function setnumPruebasJuego($numPruebas) { $this->numPruebas = $numPruebas; }

    
    public function __construct($row) {
        $this->id = $row['id'];
        $this->nombre = $row['nombre'];
        $this->descExtendida = $row['descExtendida'];
        $this->descBreve = $row['descBreve'];    
        $this->fechaCreacion = $row['fechaCreacion'];
        $this->username = $row['username'];
        $this->numPruebas = $row['numPruebas'];
        
    }
}

