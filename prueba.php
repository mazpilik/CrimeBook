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

//Mostrar form crear prueba por defecto
$smarty->assign('action', 'crear');

//Crear prueba
if(isset($_POST['createPrueba'])){
  $prueba = array();

  //campos obligatorios
  $prueba['nombre'] = $_POST['nombre'];
  $prueba['tipo'] = $_POST['tipo'];
  $prueba['username'] = $_SESSION['usuario'];

  //campos opcionales
  if(isset($_POST['url']) && !empty($_POST['url'])){
    $prueba['url'] = $_POST['url'];
  }
  if(isset($_POST['descBreve']) && !empty($_POST['descBreve'])){
    $prueba['descBreve'] = $_POST['descBreve'];
  }
  if(isset($_POST['descExtendida']) && !empty($_POST['descExtendida'])){
    $prueba['descExtendida'] = $_POST['descExtendida'];
  }
  if(isset($_POST['dificultad']) && !empty($_POST['dificultad'])){
    $prueba['dificultad'] = $_POST['dificultad'];
  }
  if(isset($_POST['ayudaFinal']) && !empty($_POST['ayudaFinal'])){
    $prueba['ayudaFinal'] = $_POST['ayudaFinal'];
  }

  //llamamos a creación y comprovamos respuesta
  if(DB::createPrueba($prueba)){
    setAlertMessage('Prueba creada', 'success');
    header('location:prueba.php?id='.DB::getLastPruebaId());
  } else {
    setAlertMessage('No se ha podido crear la prueba', 'error');
    header('location:pruebas.php');

  }
}

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('alertMessage', $_SESSION['alertMessage']);
unsetAlertMessage();


// Mostramos la plantilla
$smarty->display('prueba.tpl');