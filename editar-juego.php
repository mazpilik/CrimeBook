<?php

require_once('include/DB.php');
require_once('include/libs/Smarty.class.php');
// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");



// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

// viene de hacer clic en listado-de-juegos 
if (isset($_POST['idJuego'])) {
    
    // echo $_POST['idJuego']." he pulsado editar en listado-de-juegos ";
    $id=$_POST['idJuego'];
    $nuevoIdPrueba = DB::obtieneIdPrueba();
    $nuevoIdJuego = DB::obtieneIdJuego();
    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juego', DB::obtieneJuego($id));
    $smarty->assign('pruebas',DB::obtienePruebas($id));
    $smarty->assign('nuevoIdPrueba',$nuevoIdPrueba);
    $smarty->assign('nuevoIdJuego',$nuevoIdJuego);    
    $smarty->display('editar-juego.tpl');

}

// viene de hacer clic en guardar juego desde editar-juego.tpl
if (isset($_POST['modificarJuego'])) {

    //echo $_POST['modificarJuego']." he pulsado en guardar un juego ya existente, vengo de editar-juego ";
    $id=$_POST['modificarJuego'];
    $nombre = $_POST['nombre'];
    $descBreve = $_POST['descBreve'];
    $descExten = $_POST['descExtendida'];
    
    $resultado = DB::modificarJuego($id, $nombre, $descExten, $descBreve);
    
    echo $resultado." resultado ";
    $nuevoIdPrueba = DB::obtieneIdPrueba();
    $nuevoIdJuego = DB::obtieneIdJuego();
    //if ($resultado=0){ALGO HA IDO MAL}
    $smarty->assign('resultado', $resultado);
    $smarty->assign('nuevoIdPrueba',$nuevoIdPrueba);
    $smarty->assign('nuevoIdJuego',$nuevoIdJuego);
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juego', DB::obtieneJuego($id));
    $smarty->assign('pruebas',DB::obtienePruebas($id));
    $smarty->display('editar-juego.tpl');

}

// viene de hacer clic en eliminar juego desde editar-juego.tpl
if (isset($_POST['eliminarJuego'])) {

    //echo $_POST['modificarJuego']." he pulsado en guardar un juego ya existente, vengo de editar-juego ";
    $id=$_POST['eliminarJuego'];
    $resultado = DB::eliminarJuego($id);
    
    if (isset($_POST['usuario'])) {
    $juegos = new juego();
    }

    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juegos', DB::obtieneJuegos());

    // Mostramos la plantilla
    $smarty->display('listado-de-juegos.tpl'); 
}


//viene de eliminarPrueba editar-juego.tpl
if (isset($_POST['eliminarPrueba'])) {

    //echo $_POST['modificarJuego']." he pulsado en guardar un juego ya existente, vengo de editar-juego ";
    
    $idJuego=$_POST['idJuegoParaEliminarPrueba'];
    $idPrueba = $_POST['idPruebaParaEliminar'];
   
    $resultado = DB::eliminarPrueba($idJuego, $idPrueba);
    
    echo $resultado." resultado ";
    $nuevoIdPrueba = DB::obtieneIdPrueba();
    $nuevoIdJuego = DB::obtieneIdJuego();
  
    //if ($resultado=0){ALGO HA IDO MAL}
    $smarty->assign('resultado', $resultado);
     $smarty->assign('nuevoIdPrueba',$nuevoIdPrueba);
     $smarty->assign('nuevoIdJuego',$nuevoIdJuego);
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juego', DB::obtieneJuego($idJuego));
    $smarty->assign('pruebas',DB::obtienePruebas($idJuego));
    $smarty->display('editar-juego.tpl');

}
?>
 