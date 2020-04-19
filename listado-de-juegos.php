<?php
require_once('include/DB.php');
require_once('include/juego.php');
require_once('include/libs/Smarty.class.php');
require_once('include/functions/initSession.php');
require_once('include/functions/unsetAlertMessage.php');

//iniciamos y chequeamos sesión
initSession();

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


if (isset($_POST['usuario'])) {
    $juegos = new juego();
}

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('juegos', DB::obtieneJuegos());
$smarty->assign('alertMessage', $_SESSION['alertMessage']);
unsetAlertMessage();


// Mostramos la plantilla
$smarty->display('listado-de-juegos.tpl');     
?>
