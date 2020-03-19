<?php

require_once('include/DB.php');
require_once('include/juego.php');
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

if (isset($_POST['crearJuego'])){
    
    $row = array ();
    $row['id'] = $_POST['nuevoIdJuego'];
    $row['nombre'] = $_POST['nombre'];
    $row['descBreve'] = $_POST['descBreve'];
    $row['descExtendida'] = $_POST['descExtendida'];
    $row['fechaCreacion'] = date("Y-m-d H:i:s");
    $row['username'] = $_SESSION['usuario'];
    $row['numPruebas'] = 0;

    $nuevoJuego = new juego($row);
    $nuevoId = DB::obtieneIdJuego();
    if ($nuevoId == $nuevoJuego->getIdJuego()){
        $resultado = DB::crearJuego($nuevoJuego);
    }else{
        $nuevoJuego->setIdJuego($nuevoId);
        $resultado = DB::crearJuego($nuevoJuego);
    }
    $smarty->assign('resultado', $resultado);
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juego', DB::obtieneJuego($_POST['nuevoIdJuego']));
    $smarty->assign('pruebas',DB::obtienePruebas($_POST['nuevoIdJuego']));
    $smarty->display('editar-juego.tpl');

}else{
    // Ponemos a disposición de la plantilla los datos necesarios
    $nuevoIdJuego = DB::obtieneIdJuego();
    $nuevoIdPrueba = DB::obtieneIdPrueba();
    echo $nuevoIdJuego." nuevo id para crear un juego";
    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('nuevoIdJuego',$nuevoIdJuego);
    $smarty->assign('nuevoIdPrueba',$nuevoIdPrueba);
    $smarty->display('nuevo-juego.tpl');
}
?>
 