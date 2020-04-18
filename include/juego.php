<?php
class juego {
    protected $id;
    protected $nombre;
    protected $descExtendida;
    protected $descBreve;
    protected $fechaCreacion;
    protected $username;
    protected $numPruebas;

    public function __construct($row = []) {
        if(!empty($row)){
            $this->id = isset($row['id'])?$row['id']:'';
            $this->nombre = $row['nombre'];
            $this->descExtendida = $row['descExtendida'];
            $this->descBreve = $row['descBreve'];    
            $this->fechaCreacion = $row['fechaCreacion'];
            $this->username = $row['username'];
            $this->numPruebas = $row['numPruebas'];
            $this->descBreve = $row['descBreve'];
            $this->fechaCreacion = $row['fechaCreacion'];
            $this->username = $row['username'];
        } 
    }
    
    public function setIdJuego($idJuego) { $this->id = $idJuego;}
    public function setNombreJuego($nombreJuego) { $this->nombre = $nombreJuego; }
    public function setdescBreveJuego($descBreveJuego) { $this->descBreve = $descBreveJuego; }
    public function setdescExtendidaJuego($descExtendidaJuego) { $this->descExtendida = $descExtendidaJuego; }
    public function setfechaCreacionJuego($fechaCreacionJuego) { $this->fechaCreacion = $fechaCreacionJuego; }
    public function setUsernameJuego($usernameJuego) { $this->username = $usernameJuego; }
    public function setnumPruebasJuego($numPruebas) { $this->numPruebas = $numPruebas; }
    public function populateJuego(array $rawJuego){
       if (isset($rawJuego['id'])) {
           $this->id = $rawJuego['id'];
       }
       if (isset($rawJuego['nombre'])) {
           $this->nombre = $rawJuego['nombre'];
       }
       if(isset($rawJuego['descBreve'])){
           $this->descBreve = $rawJuego['descBreve'];
       }
       if (isset($rawJuego['descExtendida'])) {
           $this->descExtendida = $rawJuego['descExtendida'];
       }
       if(isset($rawJuego['fechaCreacion'])){
           $this->fechaCreacion = $rawJuego['fechaCreacion'];
       }
       if(isset($rawJuego['username'])){
           $this->username = $rawJuego['username'];
       }
    }

    public static function carga_juegos() {
        if (!isset($_SESSION['listado-de-juegos'])) return new juego();
        else return $_SESSION['juego'];
    }
    public function getId() {return $this->id; }
    public function getNombre() {return $this->nombre; }
    public function getdescExtendida() {return $this->descExtendida; }
    public function getdescBreve() {return $this->descBreve; }
    public function getfechaCreacion() {return $this->fechaCreacion; }
    public function getUsername() {return $this->username; }
    public function getNumPruebas() {return $this->numPruebas; }
}

