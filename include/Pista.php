<?php

class Pista{
  private $id;
  private $idPrueba;
  private $texto;
  private $tiempo;
  private $intentos;

  public function __construct(array $row)
  {
    $this->id = $row['id'];
    $this->idPrueba = $row['idPrueba'];
    $this->texto = $row['texto'];
    $this->tiempo = $row['tiempo'];
    $this->intentos = $row['intentos'];
  }

  public function setId(int $id)
  {
    $this->id = $id;
  }
  public function setIdPrueba(int $idPrueba)
  {
    $this->idPrueba = $idPrueba;
  }
  public function setTexto(string $texto)
  {
    $this->texto = $texto;
  }
  public function setTiempo(int $tiempo){
    $this->tiempo = $tiempo;
  }
  public function setIntentos(int $intentos){
    $this->intentos = $intentos;
  }

  public function getId(){return $this->id;}
  public function getIdPrueba(){return $this->idPrueba;}
  public function getTexto(){return $this->texto;}
  public function getTiempo(){return $this->tiempo;}
  public function getIntentos(){return $this->intentos;}
}