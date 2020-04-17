<?php
require_once('include/DB.php');
require_once('include/Prueba.php');
require_once('include/libs/Smarty.class.php');

session_start();

if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('pruebas', DB::obtienePruebas());


$smarty->display('listado-de-pruebas.tpl');   

?>