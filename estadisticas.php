<?php
require_once('include/DB.php');
require_once('include/juego.php');
require_once('include/libs/Smarty.class.php');
require_once('include/functions/initSession.php');
require_once('include/functions/setAlertMessage.php');
require_once('include/functions/unsetAlertMessage.php');

//iniciamos y chequeamos sesión
initSession();

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

if(isset($_POST['showStadisticas'])){
  if(isset($_POST['partidas'])){
    if(count($_POST['partidas']) == 1){
      // Mostramos la plantilla
      $smarty->assign('usuario', $_SESSION['usuario']);
      $smarty->assign('alertMessage', $_SESSION['alertMessage']);
      $smarty->display('estadisticas.tpl');
    } else {
      setAlertMessage('selecciona solamente una partida', 'error');
      header('location:listado-de-partidas.php');
    }
  } else {
    setAlertMessage('selecciona al menos una partida', 'error');
    header('location:listado-de-partidas.php');
  }
} else {
  header('location:listado-de-partidas.php');
}