<?php

require_once dirname(__FILE__) . '/Partida.php';
require_once dirname(__FILE__) . '/Equipo.php';
require_once dirname(__FILE__) . '/juego.php';
require_once dirname(__FILE__) . '/Resolucion.php';
require_once dirname(__FILE__) . '/Prueba.php';

class DB {

    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=crimebookcarlos";
        $usuario = 'dwes';
        $contrasena = 'abc123.';

        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes))
            $resultado = $dwes->query($sql);
        return $resultado;
    }

    /* LUIS */

    public static function obtieneJuegos() {
        $sql = "SELECT id, nombre, descExtendida, descBreve, fechaCreacion, username FROM juegos;";
        $resultado = self::ejecutaConsulta($sql);
        $juegos = array();

        if ($resultado) {
            // Añadimos un elemento por cada registro obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $juegos[] = new juego($row);
                $row = $resultado->fetch();
            }
        }
        return $juegos;
    }

    /*     * ************* */
    
    /* CARLOS */

    public static function obtienePartidas() {
        //Añadimos la familia
        $sql = "SELECT id, nombre, fechaCreacion, duracion, fechaInicio, idJuego, username, finalizada FROM partidas "
                . "ORDER BY nombre;";
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

    public static function obtienePartida($idPartida) {
        //$sql = "SELECT id, nombre, fechaCreacion, duracion, fechaInicio, idJuego, username, finalizada FROM partidas;";// WHERE id=".$idPartida.";";
        $sql = "SELECT id, nombre, fechaCreacion, duracion, fechaInicio, idJuego, username, finalizada FROM partidas ";
        $sql .= "WHERE id=$idPartida;";
        $resultado = self::ejecutaConsulta($sql);

        $row = null;
        if (isset($resultado)) {
            $row = $resultado->fetch();
        }

        return $row;
    }

    public static function obtieneEquipos() {
        //Añadimos la familia
        $sql = "SELECT id, codigo, nombre, tiempo, idPartida FROM equipos "
                . "ORDER BY nombre;";
        $resultado = self::ejecutaConsulta($sql);
        $equipos = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $equipos[] = new Equipo($row);
                $row = $resultado->fetch();
            }
        }

        return $equipos;
    }

    public static function grabarPartidaNueva($idPartida, $newDuracion) {
        $row = self::obtienePartida($idPartida);

        $newName = $row['nombre'];
        $pos = strpos($newName, ':');
        $newName = substr($newName, 0, $pos + 1);
        $newName = $newName . " " . $newDuracion;
        $newFechaCreacion = $row['fechaCreacion'];
        $newFechaInicio = $row['fechaInicio'];
        $newIdJuego = $row['idJuego'];
        $newUsername = $row['username'];

        $sql = "INSERT INTO partidas (nombre,fechaCreacion,duracion,fechaInicio,idJuego,username)"
                . " VALUES ('$newName','$newFechaCreacion','$newDuracion','$newFechaInicio','$newIdJuego','$newUsername')";

        $resultado = self::ejecutaConsulta($sql);
    }

    public static function grabarNuevoEquipo($idPartida, $newEquipo) {
        list($usec, $sec) = explode(" ", microtime());
        $sql = "INSERT INTO equipos (codigo,nombre,tiempo,idPartida)"
                . " VALUES ('$sec','$newEquipo','0','$idPartida')";

        $resultado = self::ejecutaConsulta($sql);
    }

    public static function borrarPartida($idPartida) {
        $sql = "DELETE FROM equipos WHERE idPartida='$idPartida';";
        $resultado = self::ejecutaConsulta($sql);
        
        $sql = "DELETE FROM partidas WHERE id='$idPartida';";
        $resultado = self::ejecutaConsulta($sql);
    }

     public static function obtieneResoluciones() {
        $sql = "SELECT idPrueba, idEquipo, resuelta, intentos, estrellas FROM resoluciones;";
        $resultado = self::ejecutaConsulta($sql);
        $resoluciones = array();

        if ($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $resoluciones[] = new Resolucion($row);
                $row = $resultado->fetch();
            }
        }

        return $resoluciones;
    }
    
     public static function obtieneTodasLasPruebas() {
        $sql = "SELECT id, nombre, descExtendida, descBreve, tipo, "
                . "dificultad, url, ayudaFinal, username FROM pruebas;";
        $resultado = self::ejecutaConsulta ($sql);
        $pruebas = array();

	if($resultado) {
            // Añadimos un elemento por cada registro obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $pruebas[] = new prueba($row);
                $row = $resultado->fetch();
            }
	}     
        return $pruebas;
    }
    
    /*     * ************* */

}
?>
