<?php

class Respuesta{
  private $id;
  private $idPrueba;
  private $respuesta;

  public function __construct($row)
  {
    $this->id = $row['id'];
    $this->idPrueba = $row['idPrueba'];
    $this->respuesta = $row['respuesta'];
  }

  public function setId($id){$this->id = $id;}
  public function setIdPrueba($idPrueba){$this->idPrueba = $idPrueba;}
  public function setRespuesta($respuesta){$this->respuesta = $respuesta;}

  public function getId(){return $this->id;}
  public function getIdPrueba(){return $this->idPrueba;}
  public function getRespuesta(){return $this->respuesta;}
}