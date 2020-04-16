<?php

/**
 * Description of Prueba
 *
 * @author Iñaki
 */
class Prueba {
    
    protected $id;
    protected $nombre;
    protected $descExtendida;
    protected $descBreve;
    protected $tipo;
    protected $dificultad;
    protected $url;
    protected $ayudaFinal;
    protected $username;
    
    
    public function getId() {return $this->id; }
    public function getNombre() {return $this->nombre; }
    public function getDescExtendida() {return $this->descExtendida; }
    public function getDescBreve() {return $this->descBreve; }
    public function getTipo() {return $this->tipo; }
    public function getDificultad() {return $this->dificultad; }
    public function getAyudaFinal() {return $this->ayudaFinal; }
    public function getUsernave() {return $this->username; }
    
        public function __construct($row) {
        $this->id = $row['id'];
        $this->nombre = $row['nombre'];
        $this->descExtendida = $row['descExtendida'];
        $this->descBreve = $row['descBreve'];
        $this->tipo = $row['tipo'];
        $this->dificultad = $row['dificultad'];
        $this->ayudaFinal = $row['ayudaFinal'];    
        $this->username = $row['usernave']; 
    
}

}
?>