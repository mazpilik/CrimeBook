<?php
require_once('include/DB.php');
require_once('include/libs/Smarty.class.php');
$cod= $_POST['id'];
$sel= $_POST['selec'];


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

if($sel == 'Editar'){
$smarty->display('prueba.tpl');   
}

elseif($sel == 'Crear'){
$smarty->display('prueba_nueva.tpl');   
}

elseif($sel == 'Duplicar'){
$smarty->display('prueba_duplicar.tpl');   
}
elseif($sel=='Eliminar' ){
$smarty->display('prueba_eliminar.tpl');   
}

else{
$smarty->display('prueba_nueva.tpl');   
}

?>