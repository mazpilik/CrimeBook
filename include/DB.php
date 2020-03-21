<?php

require_once dirname(__FILE__).'/Partida.php';

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
                $juegos[] = new Producto($row);
                $row = $resultado->fetch();
            }
	}     
        return $juegos;
    }
    /* CARLOS */
    public static function obtienePartidas() {
        //Añadimos la familia
        $sql = "SELECT id, nombre, fechaCreacion, duracion, fechaInicio, idJuego, username FROM partidas;";
        $resultado = self::ejecutaConsulta($sql);
        $partidas = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $partidas[] = new Partida($row);
                $row = $resultado->fetch();
            }
        }

        return $partidas;
    }
    /****************/
    public static function obtienePruebas() {
        $sql = "SELECT cod, nombre, descExtendida, descBreve, tipo, dificultad, url, ayudaFinal, username FROM producto;";
        $resultado = self::ejecutaConsulta ($sql);
        $pruebas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $pruebas[] = new Producto($row);
                $row = $resultado->fetch();
            }
	}     
        return $pruebas;
    }

    public static function obtienePistas() {
        $sql = "SELECT idPrueba, id, texto, tiempo, intentos FROM producto;";
        $resultado = self::ejecutaConsulta ($sql);
        $pistas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $pistas[] = new Producto($row);
                $row = $resultado->fetch();
            }
	}     
        return $pistas;
    }
}
?>
