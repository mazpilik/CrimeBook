<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-24 22:36:07
  from 'C:\xampp\htdocs\crimebook\smarty\templates\listado-de-juegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7a7d47b14d57_43949244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0d0edd3c56e2c3d42b2adce0117f48b92ba09725' => 
    array (
      0 => 'C:\\xampp\\htdocs\\crimebook\\smarty\\templates\\listado-de-juegos.tpl',
      1 => 1585085764,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7a7d47b14d57_43949244 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : PROYECTO Programación orientada a objetos en PHP -->
<!-- juego crimebook -->
<html>
<head>
    <title>Crimebook - Listado de Juegos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <div class="topnav" id="myTopnav" style="margin: 0 0 0 0;">
  	<a href="listado-de-juegos.php" class="active">Listado de juegos</a>
  	<a href="listado-de-partidas.php">Listado de partidas</a>
  	<a href="listado-de-pruebas.php">Listado de pruebas</a>
  	<a href="nueva-partida.php">Partida nueva</a>
  	<a href="nuevo-juego.php">Juego Nuevo/Editar juego</a>
  	<a href="nueva-prueba.php">Prueba Nueva/ Editar prueba</a>
  	<a href="consultar-partida.php">Consultar partida</a>
  	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
  	<i class="fa fa-bars"></i>
  	</a>
    </div>

<h2 align="center">Juegos</h2>
      <table align="center">
        <tr>
          <th>Modificar</th>
          <th>Nombre del juego</th>
          <th>Descripción</th>
          <th>Número de pruebas</th>
          <th>Usuario que la creó</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['juegos']->value, 'juego');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['juego']->value) {
?>
        <tr>
            <form id='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getidJuego();?>
' action='editar-juego.php' method='POST'>
                <td>
                    <input type='hidden' name='idJuego' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getIdJuego();?>
'/>
                    <input type='submit' name='editarJuego' value='Editar / Eliminar'/>
                </td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombreJuego();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreveJuego();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getnumPruebasJuego();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getUsernameJuego();?>
</td>                
            </form>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </table>
<br>
    <div style="text-align:center;">
        <a href="Pagina4.html"><button class="button">Nueva partida</button></a>
        <a href="nuevo-juego.php"><button class="button" name="nuevoJuego" value="nuevoJuego">Nuevo juego</button></a>
        <a href="Pagina2.html"><button class="button">Ver Partidas</button></a>

    </div>

<?php echo '<script'; ?>
>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
<?php echo '</script'; ?>
>

<div id="contenedor">

  <br class="divisor" />
  <div id="pie">
    <form action='logout.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>
    </form>        
  </div>
</div>
</body>
</html><?php }
}
