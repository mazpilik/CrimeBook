<?php

require_once('juego.php');
require_once('prueba.php');
//require_once('listado-de-partidas.php');

class DB {
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=crimebook";
        $usuario = 'dwes';
        $contrasena = 'abc123.';
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = null;
        if (isset($dwes)) {$resultado = $dwes->query($sql);}
        return $resultado;
    }
    public static function obtieneJuegos() {
        $sql = "SELECT id, nombre, descExtendida, descBreve, fechaCreacion, "
                . "username, COUNT(idPrueba) as numPruebas FROM juegos "
                . "LEFT JOIN pertenencias "
                . "ON pertenencias.idJuego=juegos.id "
                . "GROUP BY id;";
        $resultado = self::ejecutaConsulta ($sql);
        $juegos = array();

	if($resultado) {
            // Añadimos un elemento por cada registro obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $juegos[] = new juego($row);
                $row = $resultado->fetch();
            }
	}     
        return $juegos;
    }
    public static function obtieneJuego($idJuego) {
        $sql = "SELECT id, nombre, descExtendida, descBreve, "
                . "fechaCreacion, username, COUNT(idPrueba) as numPruebas "
                . "FROM juegos LEFT JOIN pertenencias "
                . "ON juegos.id = pertenencias.idJuego "
                . "WHERE  juegos.id = '".$idJuego."' GROUP BY id;";
        $juego = null;
        $resultado = self::ejecutaConsulta ($sql);
	if($resultado) {
                // Añadimos un elemento por cada registro obtenido
                $row = $resultado->fetch();          
                $juego = new juego($row);
            }  
        return $juego;
    }
    public static function cuentaPruebasJuego($idJuego) {
        $sql = "SELECT COUNT(idPrueba) as numPruebas FROM pertenencias "
                . " WHERE idJuego = '".$idJuego
                . "' GROUP BY idJuego;";
        $juego = 0;
        $resultado = self::ejecutaConsulta ($sql);
	if($resultado) {
                // Añadimos un elemento por cada registro obtenido
                $row = $resultado->fetch();
                $juego = (int) $row[0];
            }  
        return $juego;
    }    
    public static function obtienePruebas($idJuego) {
        $sql = "SELECT id, nombre, descExtendida, descBreve, tipo, "
                . "dificultad, url, ayudaFinal, username FROM pruebas"
                . " INNER JOIN pertenencias "
                . " ON pertenencias.idPrueba = pruebas.id WHERE"
                . " pertenencias.idJuego = '".$idJuego."';";
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
    
    public static function obtieneIdJuego() {
        $sql = "SELECT id FROM juegos ORDER BY id DESC limit 1;";
        $resultado = self::ejecutaConsulta ($sql);
	if($resultado) {
                // Añadimos un elemento por cada registro obtenido
                $row = $resultado->fetch();
                $juego = (int) $row[0] + 1;
            }  
        return $juego;
    }
    public static function obtieneIdPrueba() {
        $sql = "SELECT id FROM pruebas ORDER BY id DESC limit 1;";
        $resultado = self::ejecutaConsulta ($sql);
	if($resultado) {
                // Añadimos un elemento por cada registro obtenido
                $row = $resultado->fetch();
                $prueba = (int) $row[0] + 1;
            }  
        return $prueba;
    }
        
    public static function modificarJuego($id, $nombre, $desExten, $descBreve) {
        $idJuego = $id;
        $sql = "UPDATE juegos SET "
                . " nombre = '". $nombre."', "
                . " descExtendida = '".$desExten."', "
                . " descBreve = '".$descBreve."' "
                . " WHERE id = '".$idJuego."';";
        $resultado = self::ejecutaConsulta ($sql); 
        if(!$resultado) {
            $idJuego = DB::obtieneIdJuego();
        }
        return $idJuego; 
    }
    
    //devuelve el nuevo id creado del juego y si no ha ido bien devuelve cero
    public static function crearJuego($juego) {
        $sql = "INSERT INTO juegos (id, nombre, descExtendida, descBreve, fechaCreacion, username)"
                . " VALUES ('". $juego->getIdJuego()."', "
                . "'". $juego->getNombreJuego()."', "
                . "'". $juego->getdescExtendidaJuego()."', "
                . "'". $juego->getdescBreveJuego()."', "
                . "'". $juego->getfechaCreacionJuego()."', "
                . "'". $juego->getUsernameJuego()."');";
        $resultado = self::ejecutaConsulta ($sql); 
        if($resultado) {
            $id= $juego->getIdJuego();
        }else{
            $id = DB::obtieneIdJuego();
        }
    return $id;     
    }
    
    public static function eliminarJuego($idJuego) {
        $devolver = $idJuego;
        $sql = "DELETE  FROM juegos WHERE juegos.id = '".$idJuego."';";
        $resultado = self::ejecutaConsulta ($sql); 
        if(!$resultado) {
            $devolver = DB::obtieneIdJuego();
        }
        return $devolver; 
    }
    
    public static function eliminarPrueba($idJuego, $idPrueba) {
        $devolver = $idJuego;
        $sql = "DELETE  FROM pruebas WHERE pruebas.id = '".$idPrueba."';";
        $resultado = self::ejecutaConsulta ($sql); 
        if(!$resultado) {
            $devolver = DB::obtieneIdJuego();
        }
        return $devolver; 
    }
    public static function obtienePartidas() {
        $sql = "SELECT id, nombre, fechaCreacion, duracion, fechaInicio, idJuego, username FROM partidas;";
        $resultado = self::ejecutaConsulta ($sql);
        $partidas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $partidas[] = new Producto($row);
                $row = $resultado->fetch();
            }
	}     
        return $partidas;
    }


    public static function obtienePistas() {
        $sql = "SELECT idPrueba, id, texto, tiempo, intentos FROM pistas;";
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

    
    // Verifica el NOMBRE Y CONTRASEÑA contra la base de datoS

    public static function verificaCliente($nombre, $contrasena) {
        $sql = "SELECT username FROM usuarios ";
        $sql .= "WHERE username='$nombre' ";
        $sql .= "AND contrasenya='" .$contrasena . "';";
        $resultado = self::ejecutaConsulta ($sql);
        $verificado = false;

        if(isset($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) $verificado=true;
        }
        return $verificado;
    } 
    
}
?>
