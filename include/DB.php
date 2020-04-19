<?php

require_once('include/Prueba.php');
require_once('include/Pista.php');




class DB {
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=crimebook";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes)) $resultado = $dwes->query($sql);
        return $resultado;
    }
    
    public static function obtieneJuegos() {
        $sql = "SELECT id, nombre, descExtendida, descBreve, fechaCreacion, username FROM juegos;";
        $resultado = self::ejecutaConsulta ($sql);
        $juegos = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $juegos[] = new Juego($row);
                $row = $resultado->fetch();
            }
	}     
        return $juegos;
    }
    public static function obtienePartidas() {
        $sql = "SELECT id, nombre, fechaCreacion, duracion, fechaInicio, idJuego, username FROM producto;";
        $resultado = self::ejecutaConsulta ($sql);
        $partidas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $partidas[] = new Partida($row);
                $row = $resultado->fetch();
            }
	}     
        return $partidas;
    }
    
    /*IÑAKI*/
    
    public static function obtienePruebas() {
        $sql = "SELECT id, nombre, descExtendida, descBreve, tipo, dificultad, url, ayudaFinal, username FROM pruebas";
        $resultado = self::ejecutaConsulta ($sql);
        $pruebas = array();

	if($resultado) {
            // Añadimos un elemento por cada prueba obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $pruebas[] = new prueba($row);
                $row = $resultado->fetch();
            }
	}     
        return $pruebas;
    }
    
        public static function obtienePrueba($id) {
        $sql = "SELECT id, nombre, descExtendida, descBreve, tipo, dificultad, url, ayudaFinal, username FROM pruebas";
        $sql .= " WHERE id='" . $id . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $prueba = null;

	if(isset($resultado)) {
            $row = $resultado->fetch();
            $prueba = new Prueba($row);
	}
        
        return $prueba;    
    }
    
     
    /*IÑAKI*/
    
    public static function obtienePistas() {
        $sql = "SELECT idPrueba, id, texto, tiempo, intentos FROM pistas";
        $resultado = self::ejecutaConsulta ($sql);
        $pistas = array();

	if($resultado) {
            // Añadimos un elemento por cada pista obtenida
            $row = $resultado->fetch();
            while ($row != null) {
                $pistas[] = new Pista($row);
                $row = $resultado->fetch();
            }
	}     
        return $pistas;
                       
    }
    
    public static function obtienePistasId($id) {
        $sql = "SELECT idPrueba, id, texto, tiempo, intentos FROM pistas";
        $sql .= " WHERE idPrueba='" . $id . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $pistasId = array();

	if($resultado) {
            // Añadimos un elemento por cada pista obtenida
            $row = $resultado->fetch();
            while ($row != null) {
                $pistasId[] = new Pista($row);
                $row = $resultado->fetch();
            }
	}     
        return $pistasId; 
    }
    
            public static function obtienePista($id) {
        $sql = "SELECT idPrueba, id, texto, tiempo, intentos FROM pistas";
        $sql .= " WHERE id='" . $id . "'";
        $resultado = self::ejecutaConsulta ($sql);
        $pista = null;

	if(isset($resultado)) {
            $row = $resultado->fetch();
            $pista = new Prueba($row);
	}
        
        return $pista;    
    }
    
    public static function crearPrueba($prueba) {
        $sql = "INSERT INTO pruebas (nombre, descBreve, descExtendida, tipo, url)"
            . " VALUES ("
            . "'". $prueba->getNombrePrueba()."', "
            . "'". $prueba->getdescBrevePrueba()."', "
            . "'". $prueba->getdescExtendidaPrueba()."', "    
            . "'". $prueba->getTipoPrueba()."', "
            . "'". $prueba->getUrlPrueba()."');";
        return self::ejecutaConsulta ($sql);       
    }
    
    public static function getLastPruebaId(){
        $id = 0;
        $sql = "SELECT id FROM pruebas ORDER BY id DESC LIMIT 1";
        $resultado = self::ejecutaConsulta($sql);
        if($resultado){
            $rawPrueba = $resultado->fetch();
            $id = $rawPrueba['id'];
        }
        return $id;
    }

}
?>
