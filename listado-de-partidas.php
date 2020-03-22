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
    
    /* MOSTRAR FORMULARIO PARA CAMBIAR LA DURACIÓN DE UNA PARTIDA */
    if (isset($_POST['duracionButton'])) {
        if (!empty($_POST['eleccion'])){
            $smarty->assign('eleccion', 'si');
            $smarty->assign('cual', $_POST['eleccion']);
        }
        else{
            $smarty->assign('eleccion', 'no');
        }
    }
    
     /* GRABAR UNA PARTIDA NUEVA CON LOS MISMOS EQUIPOS PERO DIFERENTE DURACIÓN */
    if (isset($_POST['grabarDuracion'])) {
        $newDuracion=$_POST['duracionF'];
        $idPartida=$_POST['idPartida'];
        DB::grabarPartidaNueva($idPartida,$newDuracion);
    }
    
    $smarty->assign('partidas', DB::obtienePartidas());
    $smarty->assign('juegos', DB::obtieneJuegos());
    $smarty->assign('equipos', DB::obtieneEquipos());
    
    // Mostramos la plantilla
    $smarty->display('listadoPartidas.tpl');
?>