<?php
require_once('include/DB.php');
require_once('include/libs/Smarty.class.php');
$sel= $_POST['selec'];



if($sel == 'Editar'){
$cod= $_POST['id'];


session_start();

if (!isset($_SESSION['usuario'])){ 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('prueba', DB::obtienePrueba($cod));
$smarty->assign('pistaId', DB::obtienePistasId($cod));    
$smarty->display('prueba.tpl');   
}



elseif($sel == 'Crear'){

session_start();

if (!isset($_SESSION['usuario'])){ 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


$smarty->assign('usuario', $_SESSION['usuario']);

$smarty->display('prueba_nueva.tpl');   
}



elseif($sel == 'Duplicar'){
$cod= $_POST['id'];


session_start();

if (!isset($_SESSION['usuario'])){ 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('prueba', DB::obtienePrueba($cod));
$smarty->assign('pistaId', DB::obtienePistasId($cod));
$smarty->display('prueba_duplicar.tpl');   
}



elseif($sel=='Eliminar' ){

$cod= $_POST['id'];


session_start();

if (!isset($_SESSION['usuario'])){ 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('prueba', DB::obtienePrueba($cod));
$smarty->assign('pistaId', DB::obtienePistasId($cod));
$smarty->display('prueba_eliminar.tpl');
}


else{

session_start();

if (!isset($_SESSION['usuario'])){ 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


$smarty->assign('usuario', $_SESSION['usuario']);

$smarty->display('prueba_nueva.tpl');   
}

?>