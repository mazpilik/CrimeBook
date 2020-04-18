<?php

require_once('include/DB.php');
require_once('include/juego.php');
require_once('include/libs/Smarty.class.php');
require_once('include/functions/initSession.php');
require_once('include/functions/setAlertMessage.php');
require_once('include/functions/unsetAlertMessage.php');
// Recuperamos la información de la sesión
initSession();

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

// creación del juego
if (isset($_POST['action']) && $_POST['action'] == 'crear'){
    $nuevoJuego = new Juego();
    $nuevoJuego->setNombreJuego($_POST['nombre']);
    $nuevoJuego->setdescBreveJuego($_POST['descBreve']);
    $nuevoJuego->setdescExtendidaJuego($_POST['descExtendida']);
    $nuevoJuego->setfechaCreacionJuego(date("Y-m-d H:i:s"));
    $nuevoJuego->setUsernameJuego($_SESSION['usuario']);
    $nuevoJuego->setnumPruebasJuego(0);

    $resultado = DB::crearJuego($nuevoJuego);

    if($resultado){
        setAlertMessage('Juego creado con éxito','success');
        $juegoId = DB::getLastJuegoId();
        header('location:juego.php?edit='.$juegoId);
    } else {
        setAlertMessage('No se ha podido crear el juego', 'error');
        $smarty->assign('usuario', $_SESSION['usuario']);
        $smarty->assign('alertMessage', $_SESSION['alertMessage']);
        unsetAlertMessage();
        $smarty->assign('formType','default');
        $smarty->display('juego.tpl');
    }
    
} else if(isset($_POST['action']) && $_POST['action'] == 'actualizar'){
    $id=$_POST['id'];
    $nombre = $_POST['nombre'];
    $descBreve = $_POST['descBreve'];
    $descExten = $_POST['descExtendida'];

    $resultado = DB::modificarJuego($id, $nombre, $descExten, $descBreve);

    if(!$resultado){
        setAlertMessage('No se ha podido actualizar el juego', 'error');
    }
    header('location:juego.php?edit='.$id);

} else if(isset($_GET['edit'])){
    $juego = DB::getJuegoById($_GET['edit']);
    $smarty->assign('usuario', $_SESSION['usuario']);
    if($juego->getId()){
        $smarty->assign('juego',$juego);
        $smarty->assign('pruebas',DB::obtienePruebas($juego->getId()));
        $smarty->assign('alertMessage', $_SESSION['alertMessage']);
        unsetAlertMessage();
        $smarty->assign('formType','edit');
        $smarty->display('juego.tpl');
    } else {
        setAlertMessage('No se ha podido cargar el juego con id = '.$_GET[$id], 'error');
        header('location:listado-de-juegos.php');
    }
} else {
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('alertMessage', array('isMessage' => false, 'message' => ''));
    $smarty->assign('juego', null);
    $smarty->assign('alertMessage', $_SESSION['alertMessage']);
    unsetAlertMessage();
    $smarty->assign('formType','default');
    $smarty->display('juego.tpl');
}
