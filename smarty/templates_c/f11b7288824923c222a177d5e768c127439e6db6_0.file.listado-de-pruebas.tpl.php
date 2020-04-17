<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-17 17:45:45
  from 'D:\wamp64\www\crimebook\smarty\templates\listado-de-pruebas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e99eb4910f283_29591922',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f11b7288824923c222a177d5e768c127439e6db6' => 
    array (
      0 => 'D:\\wamp64\\www\\crimebook\\smarty\\templates\\listado-de-pruebas.tpl',
      1 => 1587145542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e99eb4910f283_29591922 (Smarty_Internal_Template $_smarty_tpl) {
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
                <th>Seleccionar</th>
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
        <form id='<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getIdPrueba();?>
' action='listado-de-pruebas.php' method='post'>
        <td>    
            <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getIdPrueba();?>
'/>
            <input type='submit' name='selec' value='Seleccionar'/>    
        </td>     
         
                <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getNombrePrueba();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getdescBrevePrueba();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getTipoPrueba();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getUsernamePrueba();?>
</td>                
         
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	 

</table>
<br>
<div align="center">
<a href="prueba.php"><button class="button">Crear prueba</button></a>
<button class="button">Duplicar prueba</button>
<a href="prueba.php"><button class="button">Editar prueba</button></a>
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
