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

// Si se llama a nuevo-juego.php después de haber creado el juego
if (isset($_POST['nuevoIdJuego'])){
    
    $row = array ();
    $row['id'] = $_POST['nuevoIdJuego'];
    $row['nombre'] = $_POST['nombre'];
    $row['descBreve'] = $_POST['descBreve'];
    $row['descExtendida'] = $_POST['descExtendida'];
    $row['fechaCreacion'] = date("Y-m-d H:i:s");
    $row['username'] = $_SESSION['usuario'];
    $row['numPruebas'] = 0;

    $nuevoJuego = new juego($row);
    $resultado = DB::crearJuego($nuevoJuego);
    
    $nuevoIdPrueba = DB::obtieneIdPrueba();  
    $smarty->assign('nuevoIdPrueba',$nuevoIdPrueba);
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juego', DB::obtieneJuego($resultado));
    $smarty->assign('pruebas',DB::obtienePruebas($resultado));
    $smarty->display('editar-juego.tpl');
    
}else{
    // Si se llama a nuevo-juego.php para crear un nuevo juego desde link
    $nuevoIdJuego = DB::obtieneIdJuego();
    $nuevoIdPrueba = DB::obtieneIdPrueba();
    // echo $nuevoIdJuego." nuevo id para crear un juego";

    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('nuevoIdJuego',$nuevoIdJuego);
    $smarty->assign('nuevoIdPrueba',$nuevoIdPrueba);
    $smarty->display('nuevo-juego.tpl');
}
?>
 