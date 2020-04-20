<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 09:05:30
  from 'C:\wamp64\www\crimebook\smarty\templates\prueba.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9d65dac366a5_23776190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dabbdaf386e8e611fe9ea24f8573d396c2d590ea' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\prueba.tpl',
      1 => 1587372836,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9d65dac366a5_23776190 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'Crear / Editar Prueba','activePage'=>'prueba'), 0, false);
?>
<div id="prueba">
<?php $_prefixVariable1 = 'crear';
$_smarty_tpl->_assignInScope('action', $_prefixVariable1);
if ($_prefixVariable1) {?>
  <h1>Crear nueva prueba<h1>
  
<?php }?>
<form id="crearEditarPrueba" class="creationEditionForm" action="prueba.php" method="post">
  <div class="field">
    <label>Nombre: </label>
    <input type="text" name="nombre" required />
  </div>
  <div class="field">
    <label>
      URL:
    </label>
    <input type="text" name="url" />
  </div>
  <div class="field">
    <label>
      Decripción breve:
    </label>
    <textarea name="descBreve"></textarea>
  </div>
  <div class="field">
    <label>
      Decripción extendida / enunciado:
    </label>
    <textarea name="descExtendida"></textarea>
  </div>
  <div class="field">
    <label>
      tipo:
    </label>
    <select name="tipo" required>
      <option value="">selecciona</option>
      <option value="Prueba normal">Normal</option>
      <option value="Prueba final">Final</option>
    </select>
  </div>
  <div class="field">
    <label>
      dificultad:
    </label>
    <select name="dificultad">
      <option value="">selecciona</option>
      <option value="Facil">Facil</option>
      <option value="Normal">Normal</option>
      <option value="Dificil">Dificil</option>
    </select>
  </div>
  <div class="field">
    <label>Ayuda final: </label>
    <input type="text" name="ayudaFinal" />
  </div>
  <div class="actionButtons">
    <input class="button" name="createPrueba" type="submit" value="Guardar" />
    <input class="button" name="reset" type="reset" value="Reset" />
  </div>

</form>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
