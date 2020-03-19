<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-23 01:21:45
  from 'C:\xampp\htdocs\crimebook\smarty\templates\nuevo-juego.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7801199c6371_70741351',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b4e1719598bcc5b2d829e918481c35c8c9eeb29' => 
    array (
      0 => 'C:\\xampp\\htdocs\\crimebook\\smarty\\templates\\nuevo-juego.tpl',
      1 => 1584918828,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7801199c6371_70741351 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : PROYECTO Programación orientada a objetos en PHP -->
<!-- juego crimebook -->
<html>
<head>
     <title>Crimebook</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <div class="topnav" id="myTopnav" style="margin: 0 0 0 0;">
        <a href="listado-de-juegos.php">Listado de juegos</a>
        <a href="Pagina2.html">Listado de partidas</a>
        <a href="Pagina3.html">Listado de pruebas</a>
        <a href="Pagina4.html">Partida nueva</a>
        <a href="nuevo-juego.php" class="active">Juego Nuevo/editar juego</a>
        <a href="Pagina6.html">Prueba Nueva/ Editar prueba</a>
        <a href="Pagina7.html">Consultar partida</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
        </a>
    </div>
    <form id='<?php echo $_smarty_tpl->tpl_vars['nuevoIdJuego']->value;?>
' action='nuevo-juego.php' method='POST'>
        <div id="pag5" align="center">        
            <p>        
                <input type='hidden' name='nuevoIdJuego' value='<?php echo $_smarty_tpl->tpl_vars['nuevoIdJuego']->value;?>
'/>
                <strong>Nombre del juego:</strong><textarea name="nombre" rows="1" cols="25" placeholder="Introduzca el nombre" required ></textarea><br><br>
                <strong>Descripcion breve:</strong><textarea name="descBreve" rows="2" cols="25" placeholder="Introduzca una descripción breve" required ></textarea><br><br>
                <strong>Descripcion extendida:</strong><textarea name="descExtendida" rows="2" cols="25" placeholder="Introduzca una descripción extensa" required ></textarea><br>      
                <input type='hidden' name='usuario' value='<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
'/>

            </p>
            <br>
        </div>
    </form>
    <h3 align="center">Listado de pruebas</h3>
	<table align="center">
            <tr>
                <th>Pruebas</th>
                <th>Editar Pruebas</th>
            </tr>        
            <tr>               
                <form id='<?php echo $_smarty_tpl->tpl_vars['nuevoIdPrueba']->value;?>
' action='nueva-prueba.php' method='POST'>
                    <input type='hidden' name='nuevoIdJuego' value='<?php echo $_smarty_tpl->tpl_vars['nuevoIdJuego']->value;?>
'/>
                    <input type='hidden' name='nuevoIdPrueba' value='<?php echo $_smarty_tpl->tpl_vars['nuevoIdPrueba']->value;?>
'/>
                    <td>Haz clic en Añadir prueba para crear pruebas en el juego</td>   
                    <td><input type='submit' name='nuevaPrueba' value='Nueva prueba'/></td>      
                </form>
            </tr>        
	</table>
        <br>
        <div align="center">
            <button class="button" form='<?php echo $_smarty_tpl->tpl_vars['nuevoIdJuego']->value;?>
' name="crearJuego" value="crearJuego">Enviar/Guardar</button>
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
