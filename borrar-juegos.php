<?php
require_once('include/functions/initSession.php');
require_once('include/functions/setAlertMessage.php');
require_once('include/DB.php');

//iniciamos checkeamos sesión
initSession();
var_dump($_POST);
if(isset($_GET['id'])){
  if(!DB::eliminarJuego($_GET['borrar'])){
    setAlertMessage('No se ha podido borrar el juego '.$_GET['borrar'],'error');
  }
}
if(isset($_POST['borrarJuegos'])){
  if(isset($_POST['juegos']) && count($_POST['juegos']) != 0){
    if(!DB::eliminarJuegos($_POST['juegos'])) {
      setAlertMessage('No se han podido borrar correctamente los juegos','error');
    }
  } else {
    setAlertMessage('No has elegido ningún juego que borrar, por favor elige uno', 'error');
  }
}
header('location:listado-de-juegos.php');