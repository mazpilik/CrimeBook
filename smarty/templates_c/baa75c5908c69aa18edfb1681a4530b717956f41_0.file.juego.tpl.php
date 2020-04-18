<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-18 17:40:35
  from 'C:\wamp64\www\crimebook\smarty\templates\juego.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9b3b9345f461_01152999',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baa75c5908c69aa18edfb1681a4530b717956f41' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\juego.tpl',
      1 => 1587231532,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9b3b9345f461_01152999 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'crear/editar juego','activePage'=>'juego'), 0, false);
?>
<h1><?php if ($_smarty_tpl->tpl_vars['formType']->value == 'default') {?>
  Crear nuevo juego
<?php } else { ?>
  Editar Juego
<?php }?></h1>
<form id="crearJuego" class="crearEditarJuego" action='juego.php' method='POST'>
  <?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?>
    <input name="id" type="hidden" value=<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
 />
    <input name="action" type="hidden" value='actualizar' />
  <?php } else { ?>
      <input name="action" type="hidden" value='crear' />
  <?php }?>
  <div class="field">
    <label>Nombre del juego:</label> <input name="nombre" type="text" placeholder="Introduzca el nombre" <?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?> 
      value="<?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombre();?>
"  
    <?php }?>
    required>
  </div>
  <div class="field">
    <label>Descripcion breve:</label><textarea name="descBreve" rows="2" cols="25"
    placeholder="Introduzca una descripción breve" required><?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?> <?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreve();?>
 <?php }?></textarea><br><br>
  </div>
  <div class="field"><label>Descripcion extendida:</label><textarea name="descExtendida" rows="2" cols="25"
    placeholder="Introduzca una descripción extensa" required><?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?> <?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescExtendida();?>
 <?php }?></textarea><br>
  <input type='hidden' name='usuario' value='<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
' /></div>
  
</form>

<div align="center">
  <?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?>
    <button class="button" form="crearJuego" name="nuevoIdJuego" value="crearJuego">Actualizar</button>
    <a class="button" href="borrar-juegos.php?id=<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
">Borrar juego</a>
  <?php } else { ?>
    <button class="button" form="crearJuego" name="nuevoIdJuego" value="crearJuego">Guardar</button>
  <?php }?>
</div>

<?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?>
  <div class="listadoPruebas">
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
              <input type='hidden' name='idJuegoParaEliminarPrueba' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
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
              <input type='hidden' name='idJuego' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
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
</div>
<?php }?>

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
