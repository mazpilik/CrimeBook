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

//Crear o editar
if(isset($_GET['id'])){
    $juego = DB::getJuegoById($_GET['id']);
    $smarty->assign('usuario', $_SESSION['usuario']);
    if($juego->getId()){
        $smarty->assign('juego',$juego);
        $smarty->assign('pruebas',DB::obtienePruebas($juego->getId()));
        $smarty->assign('allPruebas',DB::getAllPruebas());
        $smarty->assign('alertMessage', $_SESSION['alertMessage']);
        unsetAlertMessage();
        $smarty->assign('formType','edit');
    } else {
        setAlertMessage('No se ha podido cargar el juego con id = '.$_GET[$id], 'error');
        header('location:listado-de-juegos.php');
    }
} else {
    $smarty->assign('juego', null);
    $smarty->assign('alertMessage', $_SESSION['alertMessage']);
    unsetAlertMessage();
    $smarty->assign('formType','default');
}

// creación del juego
if (isset($_POST['createJuego'])){
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
        header('location:juego.php?id='.$juegoId);
    } else {
        setAlertMessage('No se ha podido crear el juego', 'error');
    }
    
}
if(isset($_POST['updateJuego'])){
    $id=$_POST['id'];
    $nombre = $_POST['nombre'];
    $descBreve = $_POST['descBreve'];
    $descExten = $_POST['descExtendida'];

    $resultado = DB::modificarJuego($id, $nombre, $descExten, $descBreve);

    if(!$resultado){
        setAlertMessage('No se ha podido actualizar el juego', 'error');
    } else {
        setAlertMessage('Juego actualizado', 'success');
    }
    header('location:juego.php?id='.$id);

}

//Añadir prueba al juego
if(isset($_POST['addPrueba'])){
    $idJuego = $_POST['idJuego'];
    $idPrueba = $_POST['prueba'];
    if(!empty($idPrueba) && $idPrueba > 0){
        if(!DB::addPruebaToJuego((int) $idJuego, (int) $idPrueba)){
            setAlertMessage('No se ha podido asociar la prueba al juego', 'error');
        }
    } else {
        setAlertMessage('Selecciona primero una prueba a asociar', 'error');
    }
    header('location:juego.php?id='.$idJuego);
}

//Borrar pruebas del juego
if(isset($_POST['deletePruebas'])){
    if(isset($_POST['pruebas'])){
       if(!DB::deleteJuegoPruebas($_POST['pruebas'], $_POST['idJuego'])){
           setAlertMessage('No se han podido borrar las pruebas', 'error');
       }
    } else {
        setAlertMessage('Selecciona las pruebas que quieres borrar', 'error');
    }
    header('location:juego.php?id='.$_POST['idJuego']);
}

$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->display('juego.tpl');
