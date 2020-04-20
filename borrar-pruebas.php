<?php
require_once('include/functions/initSession.php');
require_once('include/functions/setAlertMessage.php');
require_once('include/DB.php');

//iniciamos checkeamos sesión
if(isset($_POST['deletePruebas'])){
  if(isset($_POST['pruebasIds']) && count($_POST['pruebasIds']) != 0){
    if(!DB::deletePruebas($_POST['pruebasIds'])) {
      setAlertMessage('No se han podido borrar correctamente la partida','error');
    }
  } else {
    setAlertMessage('No has elegido ningúna partida que borrar', 'error');
  }
}
header('location:listado-de-pruebas.php');