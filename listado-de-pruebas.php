<?php
require_once('include/DB.php');
require_once('include/juego.php');
require_once('include/libs/Smarty.class.php');
require_once('include/functions/initSession.php');
require_once('include/functions/setAlertMessage.php');
require_once('include/functions/unsetAlertMessage.php');

//iniciamos y chequeamos sesión
initSession();

// Duplicado de pruebas
if(isset($_POST['duplicarPrueba'])){
  if(isset($_POST['pruebasIds'])){
    if(count($_POST['pruebasIds']) == 1){

      //duplicar prueba con un nuevo nombre
      if(!DB::clonePrueba($_POST['pruebasIds'][0])){
        setAlertMessage('Algo ha ido mal en el clonado', 'error');
      }
    } else {
      setAlertMessage('Elige solamente una prueba para clonar', 'error');
    }
  } else {
    setAlertMessage('selecciona una prueba para clonar', 'error');
  }
}

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('pruebas', DB::getAllPruebas());
$smarty->assign('alertMessage', $_SESSION['alertMessage']);
unsetAlertMessage();


// Mostramos la plantilla
$smarty->display('listado-de-pruebas.tpl');