<?php
require_once('include/DB.php');
require_once('include/libs/Smarty.class.php');
//$cod= $_GET['id'];


session_start();

if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");


$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('prueba', DB::obtienePrueba('400001'));
$smarty->assign('pistaId', DB::obtienePistasId('400001'));


$smarty->display('prueba.tpl');   

?>