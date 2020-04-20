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

//Editar prueba
if(isset($_POST['editarPrueba']) || isset($_GET['id'])){
  $id = 0;
  if(isset($_POST['editarPrueba']) && isset($_POST['pruebasIds']) && count($_POST['pruebasIds']) == 1){
    $id = $_POST['pruebasIds'][0];
  } elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    setAlertMessage('Selecciona una prueba para editar', 'error');
    header('location:listado-de-pruebas.php');
  }
  if($id){
    $prueba = DB::getPruebaById($id);
    $respuestas = DB::getRespuestasOfPrueba($id);
    $pistas = DB::getPistasByIdPrueba($id);
    if($prueba){
      $smarty->assign('prueba', $prueba);
      $smarty->assign('respuestas', $respuestas);
      $smarty->assign('pistas', $pistas);
      $smarty->assign('action', 'edit');
      $smarty->assign('alertMessage', $_SESSION['alertMessage']);
      unsetAlertMessage();
    }
  }
} else {
  $smarty->assign('alertMessage', $_SESSION['alertMessage']);
  unsetAlertMessage();
}

//Actualizar prueba
if(isset($_POST['updatePrueba'])){
  $prueba = array();

  //campos obligatorios
  $prueba['id'] = $_POST['pruebasIds'][0];
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

  //llamamos a actualización y comprovamos respuesta
  if(DB::updatePrueba($prueba)){
    setAlertMessage('Prueba actualizada', 'success');
    header('location:prueba.php?id='.$prueba['id']);
  } else {
    setAlertMessage('No se ha podido actualizar la prueba', 'error');
    header('location:prueba.php?id='.$prueba['id']);
  }
}

//Añadir respuesta
if(isset($_POST['addRespuesta'])){
  $respuesta = array();
  $respuesta['idPrueba'] = $_POST['idPrueba'];
  $respuesta['respuesta'] = $_POST['respuesta'];
  if(!empty($respuesta['respuesta'])){
    if(DB::addRespuesta($respuesta)){
      header('location:prueba.php?id='.$respuesta['idPrueba']);
    } else {
      setAlertMessage('No se ha podido crear la respuesta', 'error');
      header('location:prueba.php?id='.$respuesta['idPrueba']);
    }
  } else {
    setAlertMessage('Campo de respuesta vacio', 'error');
    header('location:prueba.php?id='.$respuesta['idPrueba']);
  }
}

//Borrar respuesta
if(isset($_POST['borrarRespuestas'])){
  if(isset($_POST['respuestas']) && !empty($_POST['respuestas'])){
    if(DB::deleteRespuestas($_POST['respuestas'])){
      header('location:prueba.php?id='.$_POST['idPrueba']);
    }
  } else {
    setAlertMessage('selecciona una o más respuestas para borrar', 'error');
    header('location:prueba.php?id='.$_POST['idPrueba']);
  }
}
//Añadir pista
if(isset($_POST['addPista'])){
  $pista = array();
  $pista['idPrueba'] = $_POST['idPrueba'];
  $pista['texto'] = $_POST['texto'];
  if(isset($_POST['tiempo']) && !empty($_POST['tiempo'])){
    $pista['tiempo'] = $_POST['tiempo'];
  }
  if(isset($_POST['intentos']) && !empty($_POST['intentos'])){
    $pista['intentos'] = $_POST['intentos'];
  }
  
  if(!empty($pista['texto'])){
    if(DB::addPista($pista)){
      header('location:prueba.php?id='.$pista['idPrueba']);
    } else {
      setAlertMessage('No se ha podido crear la pista', 'error');
      header('location:prueba.php?id='.$pista['idPrueba']);
    }
  } else {
    setAlertMessage('Campo de texto vacio', 'error');
    header('location:prueba.php?id='.$pista['idPrueba']);
  }
}

//Borrar pista
if(isset($_POST['borrarPistas'])){
  if(isset($_POST['pistas']) && !empty($_POST['pistas'])){
    if(DB::deletePistas($_POST['pistas'])){
      header('location:prueba.php?id='.$_POST['idPrueba']);
    }
  } else {
    setAlertMessage('selecciona una o más pistas para borrar', 'error');
    header('location:prueba.php?id='.$_POST['idPrueba']);
  }
}

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);


// Mostramos la plantilla
$smarty->display('prueba.tpl');