<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-30 10:40:30
  from 'C:\wamp64\www\crimebook\smarty\templates\listadoPartidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e81cc9e642a60_89840830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e46001b74aa55500b20397cd8e22925dca206e79' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\listadoPartidas.tpl',
      1 => 1585564829,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e81cc9e642a60_89840830 (Smarty_Internal_Template $_smarty_tpl) {
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
    <form id="editarPartida" name="editarPartida" method="POST" action="listado-de-partidas.php">
        <?php if (isset($_smarty_tpl->tpl_vars['eleccion']->value)) {?>
            <?php if ($_smarty_tpl->tpl_vars['eleccion']->value == 'no') {?>
                <div id="errorZone">
                    <h1>POR FAVOR ELIGE UNA FILA DE LA TABLA</h1>
                </div>
            <?php } else { ?>
                <div id="editZone">
                    <?php if ($_smarty_tpl->tpl_vars['tarea']->value == 'estadisticas') {?>
                       <table align="center">
                            <tr>
                                <td class="titulos">Fecha inicio</td>
                                <td class="titulos">Duración</td>
                                <td class="titulos">Equipos</td>
                                                            </tr>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partidas']->value, 'partida');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partida']->value) {
?>
                                
                                    <?php if ($_smarty_tpl->tpl_vars['partida']->value->getId() == $_smarty_tpl->tpl_vars['cual']->value) {?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getFechaInicio();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getDuracion();?>
</td>
                                            <td>
                                                <table border="1">
                                                    <tr>
                                                        <td class="titulos">Equipo</td>
                                                        <td class="titulos">Código de Acceso</td>
                                                        <td>&#160;</td>
                                                    </tr>
                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipos']->value, 'equipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipo']->value) {
?>
                                                        <?php if ($_smarty_tpl->tpl_vars['equipo']->value->getIdPartida() == $_smarty_tpl->tpl_vars['partida']->value->getId()) {?>  
                                                            <tr>
                                                                <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value->getNombre();?>
</td>
                                                                <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value->getCodigo();?>
</td>
                                                                <td><table border="1">
                                                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['resoluciones']->value, 'resolucion');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['resolucion']->value) {
?>  
                                                                        <?php if ($_smarty_tpl->tpl_vars['resolucion']->value->getIdEquipo() == $_smarty_tpl->tpl_vars['equipo']->value->getId()) {?>
                                                                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['resolucion']->value->getIdPrueba() == $_smarty_tpl->tpl_vars['prueba']->value->getIdPrueba()) {?>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <?php echo $_smarty_tpl->tpl_vars['prueba']->value->getNombrePrueba();?>

                                                                                        </td>
                                                                                        <td>
                                                                                            <?php echo $_smarty_tpl->tpl_vars['resolucion']->value->getIntentos();?>

                                                                                        </td>
                                                                                    </tr>
                                                                                <?php }?>
                                                                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 
                                                                        <?php }?>
                                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>         
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        <?php }?>
                                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                </table>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <tr>
                                <td><button type="submit" form="editarPartida" value="salir" name="salir" class="button">SALIR</button></td>
                            </tr>
                       </table>
                    <?php } else { ?>
                        <table align="center">
                            <tr>
                                <td class="titulos">Nombre del juego/partida</td>
                                <td class="titulos">Duración de la partida</td>
                                <td class="titulos">Listado de Equipos</td>
                            </tr>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partidas']->value, 'partida');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partida']->value) {
?>
                                <?php if ($_smarty_tpl->tpl_vars['partida']->value->getId() == $_smarty_tpl->tpl_vars['cual']->value) {?>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['juegos']->value, 'juego');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['juego']->value) {
?>
                                        <?php if ($_smarty_tpl->tpl_vars['juego']->value->getId() == $_smarty_tpl->tpl_vars['partida']->value->getIdJuego()) {?>
                                            <input type="hidden" id="idPartida" name="idPartida" value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getId();?>
">
                                            <tr>
                                                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombre();?>
/<?php echo $_smarty_tpl->tpl_vars['partida']->value->getNombre();?>
</td>
                                                <td>
                                                    <?php if ($_smarty_tpl->tpl_vars['tarea']->value == 'duracion') {?>
                                                        <input type="text" name="duracionF" value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getDuracion();?>
" />
                                                    <?php } else { ?>
                                                        <?php echo $_smarty_tpl->tpl_vars['partida']->value->getDuracion();?>

                                                    <?php }?>
                                                </td>
                                                <td>
                                                    <table border="1">
                                                        <tr>
                                                            <td class="titulos">Nombre Equipo</td>
                                                            <td class="titulos">Código Acceso</td>
                                                        </tr>
                                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipos']->value, 'equipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipo']->value) {
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['equipo']->value->getIdPartida() == $_smarty_tpl->tpl_vars['partida']->value->getId()) {?>  
                                                                <tr>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value->getNombre();?>
</td>
                                                                    <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value->getCodigo();?>
</td>
                                                                </tr>
                                                            <?php }?>
                                                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                                        <?php if ($_smarty_tpl->tpl_vars['tarea']->value == 'equipos') {?>
                                                            <tr>
                                                                <td><input type="text" name="equiposF" placeholder='Nombre del nuevo equipo' /></td>
                                                                <td><button type="submit" form="editarPartida" value="grabarEquipos" name="grabarEquipos" class="button">GRABAR</button></td>
                                                            </tr>
                                                        <?php }?>
                                                    </table>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                <?php }?>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            <?php if ($_smarty_tpl->tpl_vars['tarea']->value == 'duracion') {?>
                                <tr>
                                    <td>
                                         <button type="submit" form="editarPartida" value="grabarDuracion" name="grabarDuracion" class="button">GRABAR</button>
                                    </td>
                                </tr>
                            <?php }?>
                            <?php if ($_smarty_tpl->tpl_vars['tarea']->value == 'borrar') {?>
                                <tr>
                                    <td>
                                         <button type="submit" form="editarPartida" value="borrarPartida" name="borrarPartida" class="button">CONFIRMAR BORRADO</button>
                                    </td>
                                </tr>
                            <?php }?>
                        </table>
                    <?php }?>
                </div>
            <?php }?>
        <?php }?>
        <table align="center">
            <tr>
                <th></th>
                <th>Nombre del juego/partida</th>
                <th>Número de equipos</th>
                <th>Fecha de creación</th>
                <th>Usuario que la creó</th>
                <th>Finalizada</th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partidas']->value, 'partida');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partida']->value) {
?>
                <tr>
                    <td><input type="radio" name="eleccion" value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getId();?>
" /></td>
                    <td>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['juegos']->value, 'juego');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['juego']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['juego']->value->getId() == $_smarty_tpl->tpl_vars['partida']->value->getIdJuego()) {?>
                                <?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombre();?>
/<?php echo $_smarty_tpl->tpl_vars['partida']->value->getNombre();?>

                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </td>
                    <td>
                        <?php $_smarty_tpl->_assignInScope('cuantos', 0);?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipos']->value, 'equipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipo']->value) {
?>
                            <?php if ($_smarty_tpl->tpl_vars['equipo']->value->getIdPartida() == $_smarty_tpl->tpl_vars['partida']->value->getId()) {?>
                                <?php $_smarty_tpl->_assignInScope('cuantos', $_smarty_tpl->tpl_vars['cuantos']->value+1);?>
                            <?php }?>
                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php echo $_smarty_tpl->tpl_vars['cuantos']->value;?>

                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getFechaCreacion();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getUserName();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getFinalizada();?>
</td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>

        <br>
        <div style="text-align:center;">
            <button type="submit" form="editarPartida" value="duracionButton" name="duracionButton" class="button">Modificar Duración</button>
            <button type="submit" form="editarPartida" value="equiposButton" name="equiposButton" class="button">Añadir Equipos</button>
            <button type="submit" form="editarPartida" value="borrarButton" name="borrarButton" class="button">Borrar Partida</button>
            <button type="submit" form="editarPartida" value="estadisticasButton" name="estadisticasButton" class="button">Estadísticas Partida</button>
        </div>
    </form>
            
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
