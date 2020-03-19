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

// viene de hacer clic en listado-de-juegos EDITAR
if (isset($_POST['idJuego'])) {
    echo $_POST['idJuego']." editarJuegoPHP ";
    $id=$_POST['idJuego'];
    $juego = new juego();
    $nuevoIdPrueba = DB::obtieneIdPrueba();
    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juego', DB::obtieneJuego($id));
    $smarty->assign('pruebas',DB::obtienePruebas($id));
    $smarty->assign('nuevoIdPrueba',$nuevoIdPrueba);
    $smarty->display('editar-juego.tpl');

}
 
   
?>
 