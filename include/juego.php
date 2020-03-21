<?php
class juego {
    protected $id;
    protected $nombre;
    protected $descExtendida;
    protected $descBreve;
    protected $fechaCreacion;
    protected $username;
    
    public function getId() {return $this->id; }
    public function getNombre() {return $this->nombre; }
    public function getdescExtendida() {return $this->descExtendida; }
    public function getdescBreve() {return $this->descBreve; }
    public function getfechaCreacion() {return $this->fechaCreacion; }
    public function getUsername() {return $this->username; }
    
    public function __construct($row) {
        $this->id = $row['id'];
        $this->nombre = $row['nombre'];
        $this->descExtendida = $row['descExtendida'];
        $this->descBreve = $row['descBreve'];
        $this->fechaCreacion = $row['fechaCreacion'];
        $this->username = $row['username'];
    }
}

