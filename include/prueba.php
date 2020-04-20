<?php

class Prueba{
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
    public function getId() {return $this->id; }
    public function getNombre() {return $this->nombre; }
    public function getDescExtendida() {return $this->descExtendida; }
    public function getDescBreve() {return $this->descBreve; }
    public function getUrl() {return $this->url; }
    public function getTipo() {return $this->tipo; }
    public function getDificultad() {return $this->dificultad; }
    public function getAyudaFinal() {return $this->ayudaFinal; }
    public function getUsername() {return $this->username; }

    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setdescExtendida($descExtendida) { $this->descExtendida = $descExtendida; }
    public function setdescBreve($descBreve) { $this->descBreve = $descBreve; }
    public function setUrl($url) { $this->url = $url; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function setDificultad($dificultad) { $this->dificultad = $dificultad; }
    public function setayudaFinal($ayudaFinal) { $this->ayudaFinal = $ayudaFinal; }
    public function setUsername($username) { $this->username = $username; }    
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
