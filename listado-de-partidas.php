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
    
    /* MOSTRAR FORMULARIO PARA CAMBIAR LA DURACIÓN DE UNA PARTIDA O AÑADIR EQUIPOS A UNA PARTIDA O BORRARLA O ESTADÍSTICAS */
    if (isset($_POST['duracionButton']) || isset($_POST['equiposButton']) || isset($_POST['borrarButton']) || isset($_POST['estadisticasButton'])) {
        if (!empty($_POST['eleccion'])){
            $smarty->assign('eleccion', 'si');
            $smarty->assign('cual', $_POST['eleccion']);
            if(isset($_POST['duracionButton'])){
                $smarty->assign('tarea', 'duracion');
            }
            if(isset($_POST['equiposButton'])){
                $smarty->assign('tarea', 'equipos');
            }
            if(isset($_POST['borrarButton'])){
                $smarty->assign('tarea', 'borrar');
            }
            if(isset($_POST['estadisticasButton'])){
                $smarty->assign('tarea', 'estadisticas');
            }
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
    
    /* GRABAR LOS NUEVOS EQUIPOS */
    if (isset($_POST['grabarEquipos'])) {
        $newEquipo=$_POST['equiposF'];
        $idPartida=$_POST['idPartida'];
        if($newEquipo!=""){
            DB::grabarNuevoEquipo($idPartida,$newEquipo);
        }
    }
    
    /* BORRAR PARTIDA */
    if (isset($_POST['borrarPartida'])) {
        $idPartida=$_POST['idPartida'];
        DB::borrarPartida($idPartida);
    }
    
    $smarty->assign('partidas', DB::obtienePartidas());
    $smarty->assign('juegos', DB::obtieneJuegos());
    $smarty->assign('equipos', DB::obtieneEquipos());
    $smarty->assign('resoluciones', DB::obtieneResoluciones());
    $smarty->assign('pruebas', DB::obtieneTodasLasPruebas());
    
    // Mostramos la plantilla
    $smarty->display('listadoPartidas.tpl');
?>