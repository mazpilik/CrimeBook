<?php
require_once('include/DB.php');
require_once('include/libs/Smarty.class.php');
require_once('include/functions/initSession.php');
require_once('include/functions/setAlertMessage.php');
require_once('include/functions/unsetAlertMessage.php');

//iniciamos sesión
initSession();

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

/* Pintar formulario creación nueva partida */
if(isset($_POST['nuevaPartida'])){

  //venímos del listado de jeugos o de la seción juego
  if(isset($_POST['juegos']) && count($_POST['juegos']) > 0 && count($_POST['juegos']) <= 1){

    //hemos seleccionado únicamente un juego mostramos el formulario de creación
    $smarty->assign('action', 'crear');

    //obtenemos el juego
    $juego = DB::getJuegoById($_POST['juegos'][0]);
    $smarty->assign('juego', $juego);
  } elseif (isset($_POST['juegos']) && count($_POST['juegos']) > 1) {

    //hemos seleccionado más de un juego
    setAlertMessage('Por favor, elige solamente un juego para crear una partida', 'error');
    header('location:listado-de-juegos.php');
  } else {

    // no hemos seleccionado ningún juego
    setAlertMessage('Antes de crear una nueva partida debes elegir un juego', 'error');
    header('location:listado-de-juegos.php');
  }
}

/* Crear partida */
if(isset($_POST['crearNuevaPartida'])) {

  //recogemos los valores y seteamos nuevos
  $partida = array();
  $partida['idJuego'] = $_POST['idJuego'];
  $partida['nombre'] = $_POST['nombre'];
  $partida['duracion'] = $_POST['duracion'];
  $partida['fechaCreacion'] = date("Y-m-d");
  $partida['fechaInicio'] = $_POST['fechaInicio'];
  $partida['username'] = $_SESSION['usuario'];
 

  if(DB::crearPartida($partida)){
    setAlertMessage('Partida creada', 'success');
    header('location: partida.php?id='.DB::getLastPartidaId());
  } else {
    setAlertMessage('No se ha podido crear la partida', 'false');
    header('location:listado-de-juegos.php');
  }

}

/* Editar partida */
if(isset($_GET['id']) || isset($_POST['editarPartida'])){
  $id = 0;
  if(isset($_GET['id'])){
    $id = $_GET['id'];
  } else {
    if(isset($_POST['partidas']) && count($_POST['partidas']) == 1){
      $id = $_POST['partidas'][0];
    } else {
      setAlertMessage('Selecciona solamente una partida', 'error');
      header('location:listado-de-partidas.php');
    }
  }
  $smarty->assign('action', 'edit');
  $partida = DB::obtienePartida($id);
  $equipos = DB::getPartidaEquipos($id);
  if($partida){
    $smarty->assign('partida', $partida);
    $smarty->assign('equipos', $equipos);
  } else {
    header('location:listado-de-juegos.php');
  }
}

 //Actualizar partida
 if(isset($_POST['actualizarPartida'])){
   $partida = array();
   $partida['id'] = $_POST['idPartida'];
   $partida['duracion'] = $_POST['duracion'];
   $partida['fechaInicio'] = $_POST['fechaInicio'];
    $result = DB::updatePartida($partida);
   if($result){
    setAlertMessage('Partida actualizada', 'success');
   } else {
    setAlertMessage('No se ha podido actualizar la partida', 'error');
   }
   header('location:partida.php?id='.$partida['id']);
 }

/* BORRAR PARTIDA */
if (isset($_POST['borrarPartida'])) {
  $idPartida=$_POST['idPartida'];
  if(DB::borrarPartidas($idPartida)){
    setAlertMessage('Partida borrada', 'success');
    header('location:listado-de-partidas.php');
  } else {
    setAlertMessage('No se ha podido borrar la partida', 'error');
    header('partida.php?id='.$_POST['idPartida']);
  }
}

/* GRABAR LOS NUEVOS EQUIPOS */
if (isset($_POST['grabarEquipos'])) {
  $newEquipo=$_POST['nombre'];
  $idPartida=$_POST['idPartida'];
  if($newEquipo!=""){
      DB::grabarNuevoEquipo($idPartida,$newEquipo);
  }
  header('location:partida.php?id='.$idPartida);
}

$smarty->assign('usuario', $_SESSION['usuario']);
$message = $_SESSION['alertMessage'];
$smarty->assign('alertMessage', $message);
// unsetAlertMessage();
$smarty->display('partida.tpl');