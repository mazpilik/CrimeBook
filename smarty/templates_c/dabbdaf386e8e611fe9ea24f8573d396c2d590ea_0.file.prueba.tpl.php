<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 11:52:33
  from 'C:\wamp64\www\crimebook\smarty\templates\prueba.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9d8d01b1e1a2_11620839',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dabbdaf386e8e611fe9ea24f8573d396c2d590ea' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\prueba.tpl',
      1 => 1587383503,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9d8d01b1e1a2_11620839 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Crear / Editar Prueba','activePage'=>'prueba'), 0, false);
?>
<div id="prueba">
<?php if ($_smarty_tpl->tpl_vars['action']->value == 'crear') {?>
  <h1>Crear nueva prueba<h1>
<?php }
if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
  <h1>Editar Prueba</h1>
<?php }?>
<form id="crearEditarPrueba" class="creationEditionForm" action="prueba.php" method="post">
  <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
    <input type="hidden" name="pruebasIds[]" value=<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getId();?>
 />
  <?php }?>
  <div class="field">
    <label>Nombre: </label>
    <input type="text" name="nombre" required <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getNombre();?>
"<?php }?> />
  </div>
  <div class="field">
    <label>
      URL:
    </label>
    <input type="text" name="url" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getUrl();?>
"<?php }?>/>
  </div>
  <div class="field">
    <label>
      Decripción breve:
    </label>
    <textarea name="descBreve" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getDescBreve();?>
"<?php }?>></textarea>
  </div>
  <div class="field">
    <label>
      Decripción extendida / enunciado:
    </label>
    <textarea name="descExtendida" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getDescExtendida();?>
"<?php }?>></textarea>
  </div>
  <div class="field">
    <label>
      tipo:
    </label>
    <select name="tipo" required>
      <option value="">selecciona</option>
      <option value="Prueba normal" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {
if ($_smarty_tpl->tpl_vars['prueba']->value->getTipo() == 'Prueba normal') {?>
        selected
      <?php }
}?>>Normal</option>
      <option value="Prueba final" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {
if ($_smarty_tpl->tpl_vars['prueba']->value->getTipo() == 'Prueba final') {?>
        selected
      <?php }
}?>>Final</option>
    </select>
  </div>
  <div class="field">
    <label>
      dificultad:
    </label>
    <select name="dificultad">
      <option value="">selecciona</option>
      <option value="Facil" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {
if ($_smarty_tpl->tpl_vars['prueba']->value->getDificultad() == 'Facil') {?>
        selected
      <?php }
}?>>Facil</option>
      <option value="Normal" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {
if ($_smarty_tpl->tpl_vars['prueba']->value->getDificultad() == 'Normal') {?>
        selected
      <?php }
}?>>Normal</option>
      <option value="Dificil" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {
if ($_smarty_tpl->tpl_vars['prueba']->value->getDificultad() == 'Dificil') {?>
        selected
      <?php }
}?>>Dificil</option>
    </select>
  </div>
  <div class="field">
    <label>Ayuda final: </label>
    <input type="text" name="ayudaFinal" <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getAyudaFinal();?>
"<?php }?> />
  </div>
  <div class="actionButtons">
    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'crear') {?>
      <input class="button" name="createPrueba" type="submit" value="Guardar" />
      <input class="button" name="reset" type="reset" value="Reset" />
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
      <input class="button" name="updatePrueba" type="submit" value="Actualizar" />
      <input class="button" name="reset" type="reset" value="Reset" />
      <input class="button" name="deletePruebas" formaction="borrar-pruebas.php" type="submit" value="Borrar" />
    <?php }?>
    
  </div>

</form>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
