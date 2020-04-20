<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 11:42:55
  from 'C:\wamp64\www\crimebook\smarty\templates\listado-de-pruebas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9d8abf34c6e4_27003815',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a53ae802f166205f55cc47a4042c852d77f90834' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\listado-de-pruebas.tpl',
      1 => 1587382963,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9d8abf34c6e4_27003815 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'listado de pruebas','activePage'=>'listado-de-pruebas'), 0, false);
?>
  <div id="listadoDePruebas">
    <h1>Listado de Pruebas</h1>
    <form id="listadoDePruebasForm" method="post">
      <table>
        <thead>
          <tr>
            <th></th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Usuario</th>
          </tr>
        </thead>
        <tbody>
          <?php if (!empty($_smarty_tpl->tpl_vars['pruebas']->value)) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
              <tr>
              <td><input name="pruebasIds[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getId();?>
" /></td>
              <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getNombre();?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getDescBreve();?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getTipo();?>
</td>
              <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getUsername();?>
</td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
          <?php } else { ?>
            <td colspan="5" class="notice"><h3>Todavía no hay pruebas en la aplicación</h3></td>
          <?php }?>
        </tbody>
      </table>
      <div class="listButtons" style="text-align:center;">
        <a href="prueba.php"><button class="button" name="printCrearPrueba" value="crearPrueba" formaction="prueba.php">Crear prueba</button></a>
        <a href="prueba.php"><button class="button" name="duplicarPrueba" formaction="prueba.php">Duplicar prueba</button></a>
        <a href="prueba.php"><button class="button" name="editarPrueba" value="editarPrueba" formaction="prueba.php">Editar prueba</button></a>
        <a href="borrar-pruebas.php"><button class="button" name="deletePruebas" formaction="borrar-pruebas.php">Borrar prueba</button></a>
    </div>
    </form>
  </div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
