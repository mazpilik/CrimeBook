<?php
/**
 * Inicia sesión y chequea que el usuario está logeado
 * si no, redirige al login
 */
function initSession(){
  // Recuperamos la información de la sesión
  session_start();

  // Y comprobamos que el usuario se haya autentificado
  if (!isset($_SESSION['usuario'])) {
    header('location: login.php'); 
  }
}
