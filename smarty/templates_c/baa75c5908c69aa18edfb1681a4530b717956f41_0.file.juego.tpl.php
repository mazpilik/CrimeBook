<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 19:06:49
  from 'C:\wamp64\www\crimebook\smarty\templates\juego.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9df2c98cc5f9_77453996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'baa75c5908c69aa18edfb1681a4530b717956f41' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\juego.tpl',
      1 => 1587409606,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9df2c98cc5f9_77453996 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'crear/editar juego','activePage'=>'juego'), 0, false);
?>
<div id="juego">
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
      placeholder="Introduzca una descripción breve" required><?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {
echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreve();
}?></textarea><br><br>
    </div>
    <div class="field"><label>Descripcion extendida:</label><textarea name="descExtendida" rows="2" cols="25"
      placeholder="Introduzca una descripción extensa" required><?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {
echo $_smarty_tpl->tpl_vars['juego']->value->getdescExtendida();
}?></textarea><br>
    <input type='hidden' name='usuario' value='<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
' /></div>
  </form>

  <div align="center">
    <?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?>
      <button class="button" form="crearJuego" name="updateJuego" value="crearJuego">Actualizar</button>
      <a class="button" href="borrar-juegos.php?id=<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
">Borrar juego</a>
    <?php } else { ?>
      <button class="button" form="crearJuego" name="createJuego" value="crearJuego">Guardar</button>
    <?php }?>
  </div>

  <?php if ($_smarty_tpl->tpl_vars['formType']->value == 'edit') {?>
    <div class="section">
    <h3 align="center">Listado de pruebas</h3>
    <form id='addPrueba' action='juego.php' method='POST'>
      <input type='hidden' name='idJuego' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
' />
      <table align="center">
          <tr>
              <th></th>
              <th>Pruebas</th>
          </tr>
          <?php if (!empty($_smarty_tpl->tpl_vars['pruebas']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
            <tr>
                    <td><input type="checkbox" name="pruebas[]" value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getId();?>
" /></td>
                    <td>
                        <?php echo $_smarty_tpl->tpl_vars['prueba']->value->getNombre();?>

                    </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <?php } else { ?>
            <tr><td colspan="2"><h3>Todavía no hay pruebas asociadas</h3></td></tr>    
          <?php }?>
          <tr>
            <td colspan="2">
                <div class="field">
                  <label>Prueba: </label>
                  <select name="prueba">
                    <option value="0">Selecciona</option>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allPruebas']->value, 'sPrueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sPrueba']->value) {
?>
                      <option value="<?php echo $_smarty_tpl->tpl_vars['sPrueba']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['sPrueba']->value->getNombre();?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>}
                  </select>
                </div>
                <div class="actionButtons">
                  <input type='submit' class="button" name='addPrueba' value='Añadir prueba' />
                  <input type="submit" class="button" name="deletePruebas" value="Borrar" />
                </div>
              
            </td>
          </tr>
      </table>
    </form>
  </div>
  <?php }?>
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
