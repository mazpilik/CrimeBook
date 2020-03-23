<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-22 21:48:22
  from 'D:\wamp64\www\crimebook\smarty\templates\Pagina6.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e77dd2605e7d9_06689857',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1249f5cd271476ee4c0c91ceb6fafcbf7a4a769' => 
    array (
      0 => 'D:\\wamp64\\www\\crimebook\\smarty\\templates\\Pagina6.html',
      1 => 1584913700,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e77dd2605e7d9_06689857 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
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
	 <a href="Pagina3.html">Listado de pruebas</a>
	 <a href="Pagina4.html">Partida nueva</a>
	 <a href="Pagina5.html">Juego Nuevo/editar juego</a>
	 <a href="Pagina6.html" class="active">Prueba Nueva/ Editar prueba</a>
	 <a href="Pagina7.html">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>


	<div id="pag6" align="center"  >
<form action="" method="" >
<p>
	Nombre:<input type="text" name="nombre" placeholder="Introduzca el nombre">
</p>
<p>
	URL:<input type="text" name="url" placeholder="Introduzca la URL">
	</p>
	<p>
	Descripción breve:<textarea cols="50" rows="5" name="descripción" placeholder="Introduzca una descripción breve"></textarea>
	</p>
	<p>
Descripción extendida/Enunciado de la prueba:<textarea cols="50" rows="10" name="DESCRIPCION" placeholder="Introduzca una descripción extensa"></textarea>
	</p>
	<p>
		Tipo:<select value="Tipo">
				<option value="N">Normal</option>
				<option value="F">Final</option>
				</select>
	</p>
</div>
	<div id="pag6botones" align="center">
	<button class="button">Orden</button>
	<button class="button">Respuesta/solucion</button>
</div><br>

</form>
<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Listado de Pistas</th>
	</tr>
	<tr>
		<td align="center"></td>
	<tr>
		<td align="center"></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>
	<tr>
		<td align="center"></td>
	</tr>
</table>
</form>
<br>
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
