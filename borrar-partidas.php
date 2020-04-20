<?php
require_once('include/functions/initSession.php');
require_once('include/functions/setAlertMessage.php');
require_once('include/DB.php');

//iniciamos checkeamos sesión
if(isset($_POST['borrarPartidas'])){
  if(isset($_POST['partidas']) && count($_POST['partidas']) != 0){
    if(!DB::borrarPartidas($_POST['partidas'])) {
      setAlertMessage('No se han podido borrar correctamente la partida','error');
    }
  } else {
    setAlertMessage('No has elegido ningúna partida que borrar', 'error');
  }
}
header('location:listado-de-partidas.php');