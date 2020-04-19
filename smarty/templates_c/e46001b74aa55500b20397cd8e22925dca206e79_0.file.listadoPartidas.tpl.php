<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-19 17:21:02
  from 'C:\wamp64\www\crimebook\smarty\templates\listadoPartidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9c887e6cf654_71441589',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e46001b74aa55500b20397cd8e22925dca206e79' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\listadoPartidas.tpl',
      1 => 1587316578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9c887e6cf654_71441589 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'listado de partidas','activePage'=>'listado-de-partidas'), 0, false);
?>
    <h2 align="center">Listado de partidas</h2>
    <form id="editarPartida" name="editarPartida" method="POST" action="listado-de-partidas.php">
        <table align="center">
            <tr>
                <th></th>
                <th>Nombre de la partida</th>
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
                    <td><input type="checkbox" name="partidas[]" value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getId();?>
" /></td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['partida']->value->getNombre();?>

                    </td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['partida']->value->getNumEquipos();?>

                    </td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getFechaCreacion();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getUserName();?>
</td>
                    <td><?php if ($_smarty_tpl->tpl_vars['partida']->value->getFinalizada()) {?>
                        si
                    <?php } else { ?>
                        no
                    <?php }?></td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>

        <br>
        <div style="text-align:center;">
            <button type="submit" form="editarPartida" formaction="partida.php" value="equiposButton" name="editarPartida" class="button">Editar partida</button>
            <button type="submit" form="editarPartida" value="borrarButton" formaction="borrar-partidas.php" name="borrarButton" class="button">Borrar Partida</button>
            <button type="submit" form="editarPartida" value="estadisticasButton" formaction="estadisticas.php" name="estadisticasButton" class="button">Estadísticas Partida</button>
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
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
