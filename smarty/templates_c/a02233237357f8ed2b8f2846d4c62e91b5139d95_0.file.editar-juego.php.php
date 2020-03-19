<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-22 19:04:03
  from 'C:\xampp\htdocs\crimebook\editar-juego.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e77a89344b778_18515208',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a02233237357f8ed2b8f2846d4c62e91b5139d95' => 
    array (
      0 => 'C:\\xampp\\htdocs\\crimebook\\editar-juego.php',
      1 => 1584833455,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77a89344b778_18515208 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php

';?>
require_once('include/DB.php');
require_once('include/juego.php');
require_once('include/prueba.php');
require_once('include/libs/Smarty.class.php');
// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");



// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

// viene de hacer clic en listado-de-juegos EDITAR
if (isset($_POST['editarJuego'])) {
    //$pruebas = new prueba();
    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juego', DB::obtieneJuego($_POST['idJuego']));
    $smarty->assign('pruebas',DB::obtienePruebas($_POST['idJuego']));
    $smarty->display('editar-juego.tpl');
}else{
    $smarty->display('nuevo-juego.tpl');
}
 
   
<?php echo '?>';?>

 <?php }
}
