<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-19 00:24:10
  from 'D:\wamp64\www\crimebook\smarty\templates\prueba.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9b9a2a7af9a4_88951008',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ddb41e129b479f03256f91278c58f0abd928f07' => 
    array (
      0 => 'D:\\wamp64\\www\\crimebook\\smarty\\templates\\prueba.tpl',
      1 => 1587255660,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9b9a2a7af9a4_88951008 (Smarty_Internal_Template $_smarty_tpl) {
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
	 <a href="prueba.php" class="active">Prueba Nueva/ Editar prueba</a>
	 <a href="Pagina7.html">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>

<div id="pag6" align="center"  >
    
<form action="" method="" >
<p>
	Nombre:<input type="text" name="nombre" placeholder="Introduzca el nombre" value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getNombrePrueba();?>
">
</p>
<p>
	URL:<input type="text" name="url" placeholder="Introduzca la URL" value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getUrlPrueba();?>
">
	</p>
	<p>
	Descripción breve:<textarea cols="50" rows="5" name="descripción" placeholder="Introduzca una descripción breve" ><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getdescBrevePrueba();?>
</textarea>
	</p>
	<p>
Descripción extendida/Enunciado de la prueba:<textarea cols="50" rows="10" name="DESCRIPCION" placeholder="Introduzca una descripción extensa"><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getdescExtendidaPrueba();?>
</textarea>
	</p>
	<p>
		Tipo:<select value="Tipo">
                                <?php if ($_smarty_tpl->tpl_vars['prueba']->value->getTipoPrueba() == "Prueba normal") {?>
				<option value="N">Normal</option>
                                <option value="F">Final</option>
                                <?php } elseif ($_smarty_tpl->tpl_vars['prueba']->value->getTipoPrueba() == "Prueba final") {?>
				<option value="F">Final</option>
                                <option value="N">Normal</option>
                                <?php } else { ?>
                                <option value="N">Normal</option>
				<option value="F">Final</option>
                                <?php }?>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pistasId']->value, 'pistaId');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pistaId']->value) {
?>
	<tr>
		<td align="center"><?php echo $_smarty_tpl->tpl_vars['pistasId']->value->getTexto();?>
</td>
	
	</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
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
