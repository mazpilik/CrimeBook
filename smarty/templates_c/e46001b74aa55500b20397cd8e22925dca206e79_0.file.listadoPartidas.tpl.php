<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-21 16:41:20
  from 'C:\wamp64\www\crimebook\smarty\templates\listadoPartidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7643b0f1c6b8_81993598',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e46001b74aa55500b20397cd8e22925dca206e79' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\listadoPartidas.tpl',
      1 => 1584808870,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7643b0f1c6b8_81993598 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>Crimebook</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	 <div class="topnav" id="myTopnav">
	  <a href="Index.html">Listado de juegos</a>
	  <a href="Pagina2.html" class="active">Listado de partidas</a>
	  <a href="Pagina3.html">Listado de pruebas</a>
	  <a href="Pagina4.html">Partida nueva</a>
	  <a href="Pagina5.html">Juego Nuevo/editar juego</a>
	  <a href="Pagina6.html">Prueba Nueva/ Editar prueba</a>
	  <a href="Pagina7.html">Consultar partida</a>
	  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
	    <i class="fa fa-bars"></i>
	  </a>
	 </div>

<h2 align="center">Partidas</h2>
	 <table align="center">
		 <tr>
			 <th>Nombre del juego</th>
			 <th>Número de equipos</th>
			 <th>Fecha de creación</th>
			 <th>Usuario que la creó</th>
                         <th>Finalizada</th>
		 </tr>
		 <tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partidas']->value, 'partida');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partida']->value) {
?>
                <tr>
                    <td>a</td>
                    <td>a</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getFechaCreacion();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getUserName();?>
</td>
                    <td>a</td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	 </table>

<br>
	<div style="text-align:center;">
	<a href="Pagina7.html"><button class="button">Consutar partida</button></a>
	<button class="button">Eliminar partida</button>
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

</body>
</html>
<?php }
}
