<?php
  session_start();
  unset($_SESSION["sesion"]); 
  //Destruye toda la información registrada de una sesión
  session_destroy();
  //Redirecciona a la página de login
  header("Location: index.php");
  exit;


