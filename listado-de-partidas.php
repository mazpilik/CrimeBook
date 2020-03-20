<?php
    require_once('include/DB.php');
    require_once('include/libs/Smarty.class.php');
    
    // Cargamos la librería de Smarty
    $smarty = new Smarty;
    $smarty->template_dir = 'smarty/templates/';
    $smarty->compile_dir = 'smarty/templates_c/';
    $smarty->config_dir = 'smarty/configs/';
    $smarty->cache_dir = 'smarty/cache/';

    /* Comprobamos que haya sesión iniciada */
    session_start();
    /*if (!isset($_SESSION['sesion']))
        die("Error - debe <a href='login.php'>identificarse</a>.<br />");*/
    
    $smarty->assign('partidas', DB::obtienePartidas());
    
    // Mostramos la plantilla
    $smarty->display('productos.tpl');
?>