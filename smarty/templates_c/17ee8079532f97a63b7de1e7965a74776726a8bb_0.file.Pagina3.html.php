<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-22 21:48:22
  from 'D:\wamp64\www\crimebook\smarty\templates\Pagina3.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e77dd260d26a6_96462818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17ee8079532f97a63b7de1e7965a74776726a8bb' => 
    array (
      0 => 'D:\\wamp64\\www\\crimebook\\smarty\\templates\\Pagina3.html',
      1 => 1584913700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77dd260d26a6_96462818 (Smarty_Internal_Template $_smarty_tpl) {
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
	 <a href="Pagina2.html">Listado de partidas</a>
	 <a href="Pagina3.html" class="active">Listado de pruebas</a>
	 <a href="Pagina4.html">Partida nueva</a>
	 <a href="Pagina5.html">Juego Nuevo/editar juego</a>
	 <a href="Pagina6.html">Prueba Nueva/ Editar prueba</a>
	 <a href="Pagina7.html">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>

<h2 align="center">Pruebas</h2>
<table align="center">
	<tr>
		<th>Nombre</th>
		<th>Descripción</th>
		<th>Tipo</th>
		<th>Usuario que la creó</th>
	</tr>
        
       
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	

</table>
<br>
<div align="center">
<a href="Pagina6.html"><button class="button">Crear prueba</button></a>
<button class="button">Duplicar prueba</button>
<a href="Pagina6.html"><button class="button">Editar prueba</button></a>
<button class="button">Eliminar prueba</button>
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
