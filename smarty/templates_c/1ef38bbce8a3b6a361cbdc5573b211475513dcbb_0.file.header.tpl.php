<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-18 08:48:51
  from 'C:\wamp64\www\crimebook\smarty\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9abef35f48f1_28545634',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ef38bbce8a3b6a361cbdc5573b211475513dcbb' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\header.tpl',
      1 => 1587199724,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9abef35f48f1_28545634 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : PROYECTO Programación orientada a objetos en PHP -->
<!-- juego crimebook -->
<html>
  <head>
    <title>Crimebook - <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
  </head>
  <body>
    <nav>
      <div class="topnav" id="myTopnav" style="margin: 0 0 0 0;">
        <a href="listado-de-juegos.php"   <?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'listado-de-juegos') {?> class="active" <?php }?>>Listado de juegos</a>
        <a href="listado-de-partidas.php" <?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'listado-de-partidas') {?> class="active" <?php }?>>Listado de partidas</a>
        <a href="listado-de-pruebas.php" <?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'listado-de-pruebas') {?> class="active" <?php }?>>Listado de pruebas</a>
        <a href="nueva-partida.php" <?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'partida') {?> class="active" <?php }?>>Partida nueva</a>
        <a href="juego.php" <?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'juego') {?> class="active" <?php }?>>Nuevo juego</a>
        <a href="nueva-prueba.php" <?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'prueba') {?> class="active" <?php }?>>Nueva prueba</a>
        <a href="consultar-partida.php" <?php if ($_smarty_tpl->tpl_vars['activePage']->value == 'consultar-partida') {?> class="active" <?php }?>>Consultar partida</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <div class="userActions">
        <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</span>
        <a href="logout.php">
          <i class="fa fa-power-off" aria-hidden="true"></i>

        </a>
      </div>
    </nav>
    <?php if ($_smarty_tpl->tpl_vars['alertMessage']->value['isMessage']) {?>
    <div class="alertMessage <?php echo $_smarty_tpl->tpl_vars['alertMessage']->value['type'];?>
">
      <p><?php echo $_smarty_tpl->tpl_vars['alertMessage']->value['message'];?>
</p>
    </div>
    <?php }?>
    <?php }
}
