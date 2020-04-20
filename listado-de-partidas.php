<?php
    require_once('include/DB.php');
    require_once('include/libs/Smarty.class.php');
    require_once('include/functions/initSession.php');
    require_once('include/functions/unsetAlertMessage.php');
    // Cargamos la librería de Smarty
    $smarty = new Smarty;
    $smarty->template_dir = 'smarty/templates/';
    $smarty->compile_dir = 'smarty/templates_c/';
    $smarty->config_dir = 'smarty/configs/';
    $smarty->cache_dir = 'smarty/cache/';

    /* Comprobamos que haya sesión iniciada */
    initSession();

    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('partidas', DB::obtienePartidas());
    $smarty->assign('alertMessage', $_SESSION['alertMessage']);
    // unsetAlertMessage();
    
    // Mostramos la plantilla
    $smarty->display('listadoPartidas.tpl');