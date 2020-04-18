<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-17 19:55:57
  from 'C:\wamp64\www\crimebook\smarty\templates\editar-juego.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9a09cd155bc0_63305504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5c6f9f3c6850e7a77d160fec8605eee4c23b7de' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\editar-juego.tpl',
      1 => 1587153351,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9a09cd155bc0_63305504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Editar juego','activePage'=>''), 0, false);
?>
<h1>Editar juego</h1>
<form id='editarJuego' class="crearEditarJuego" action='editar-juego.php' method='POST'>
    <input type='hidden' name='modificarJuego' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getIdJuego();?>
' />
    <div class="field">
        <label>Nombre del juego:</label>
        <input type="text" name="nombre" placeholder="Introduzca el nombre" value="<?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombreJuego();?>
">
    </div>
    <div class="field">
        <label>Descripcion breve:</label>
        <textarea name="descBreve" rows="2" cols="25"
        placeholder="Introduzca una descripción breve"><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreveJuego();?>
</textarea>
    </div>
    <div class="field">
        <label>Descripcion extendida:</label>
        <textarea name="descExtendida" rows="2" cols="25"
        placeholder="Introduzca una descripción extensa"><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescExtendidaJuego();?>
</textarea>
    </div>
</form>
<form id='eliminarJuego' action='editar-juego.php' method='POST'>
    <div id="pag5" align="center">
        <p>
            <input type='hidden' name='eliminarJuego' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getIdJuego();?>
' />
        </p>
    </div>
</form>
<h3 align="center">Listado de pruebas</h3>
<table align="center">
    <tr>
        <th>Pruebas</th>
        <th>Editar Pruebas</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
    <tr>
        <form id='<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getIdPrueba();?>
' action='editar-juego.php' method='POST'>
            <input type='hidden' name='idPruebaParaEliminar' value='<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getIdPrueba();?>
' />
            <input type='hidden' name='idJuegoParaEliminarPrueba' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getIdJuego();?>
' />
            <td>
                <?php echo $_smarty_tpl->tpl_vars['prueba']->value->getNombrePrueba();?>

            </td>
            <td>
                <input type='submit' name='editarPrueba' value='Editar prueba' />
                <input type='submit' name='eliminarPrueba' value='Elminar prueba' />
            </td>
        </form>
    </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <tr>
        <form id='nuevaPrueba' action='nueva-prueba.php' method='POST'>
            <input type='hidden' name='idJuego' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getIdJuego();?>
' />
            <input type='hidden' name='idPrueba' value='<?php echo $_smarty_tpl->tpl_vars['nuevoIdPrueba']->value;?>
' />
            <td>
                Haz clic en Añadir prueba para crear pruebas en el juego
            </td>
            <td>
                <input type='submit' name='nuevaPrueba' value='Nueva prueba' />
            </td>
        </form>
    </tr>

</table>
<br>
<div align="center">
    <button class="button" form='editarJuego '>Actualizar</button>
    <button class="button" form='eliminarJuego'>Eliminar Juego</button>
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

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
