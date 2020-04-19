<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-19 21:02:14
  from 'D:\wamp64\www\crimebook\smarty\templates\prueba_nueva.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9cbc56e98de5_94649911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b567a3b495923c0d2a049137ba0b1cacaf24cd0f' => 
    array (
      0 => 'D:\\wamp64\\www\\crimebook\\smarty\\templates\\prueba_nueva.tpl',
      1 => 1587330116,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9cbc56e98de5_94649911 (Smarty_Internal_Template $_smarty_tpl) {
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
	 <a href="listado-de-pruebas.php">Listado de pruebas</a>
	 <a href="Pagina4.html">Partida nueva</a>
	 <a href="Pagina5.html">Juego Nuevo/editar juego</a>
	 <a href="prueba.php" class="active">Prueba Nueva</a>
	 <a href="Pagina7.html">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>

<div id="pag6" align="center"  >
    
<form id="pruebaNueva" class="crearEditarPrueba" action='prueba.php' method='POST'>
<p>
	Nombre:<input type="text" name="nombre" placeholder="Introduzca el nombre" value="">
</p>
<p>
	URL:<input type="text" name="url" placeholder="Introduzca la URL" value="">
	</p>
	<p>
	Descripción breve:<textarea cols="50" rows="5" name="descBreve" placeholder="Introduzca una descripción breve" ></textarea>
	</p>
	<p>
        Descripción extendida/Enunciado de la prueba:<textarea cols="50" rows="10" name="descExtensa" placeholder="Introduzca una descripción extensa"></textarea>
	</p>
	<p>
	Tipo:<select name="tipo" value="Tipo">
              
                                <option value="Prueba final">Normal</option>
				<option value="Prueba normal">Final</option>
                            
				</select>
	</p>
</div>
	<div id="pag6botones" align="center">
 
	<button class="button" form="pruebaNueva" name="nuevoIdPrueba" value="pruebaNueva">Crear Prueba</button>
	<button class="button">Respuesta/solucion</button>
</div><br>

</form>
<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Listado de Pistas</th>
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
