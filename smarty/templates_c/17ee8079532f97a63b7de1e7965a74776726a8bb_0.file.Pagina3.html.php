<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-16 10:52:39
  from 'D:\wamp64\www\crimebook\smarty\templates\Pagina3.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9838f762c9b3_27781218',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17ee8079532f97a63b7de1e7965a74776726a8bb' => 
    array (
      0 => 'D:\\wamp64\\www\\crimebook\\smarty\\templates\\Pagina3.html',
      1 => 1587034356,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e9838f762c9b3_27781218 (Smarty_Internal_Template $_smarty_tpl) {
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
	 <a href="listado-de-pruebas.php" class="active">Listado de pruebas</a>
	 <a href="Pagina4.html">Partida nueva</a>
	 <a href="Pagina5.html">Juego Nuevo/editar juego</a>
	 <a href="prueba.php">Prueba Nueva/ Editar prueba</a>
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
        
       
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
        <tr>
        <p><form id='<?php echo $_smarty_tpl->tpl_vars['pruebas']->value->getId();?>
' action='listado-de-pruebas.php' method='post'>
        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['pruebas']->value->getId();?>
'/>
        <input type='submit' name='enviar' value='Seleccionar'/>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombre();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreve();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getnumTipo();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getUsername();?>
</td>                
            </form>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	

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