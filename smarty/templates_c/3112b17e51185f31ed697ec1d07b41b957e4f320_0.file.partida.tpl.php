<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 10:37:00
  from 'C:\wamp64\www\crimebook\smarty\templates\partida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9d7b4c62c110_49106814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3112b17e51185f31ed697ec1d07b41b957e4f320' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\partida.tpl',
      1 => 1587365495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9d7b4c62c110_49106814 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('activePage'=>'partida'), 0, false);
?>
<div id="crearEditarPartida">
<h1><?php if ($_smarty_tpl->tpl_vars['action']->value == 'crear') {?>
  Crear nueva partida
  <?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'editar') {?>
  Editar partida
<?php }?></h1>
<form id="crearEditarForm" action="partida.php" method="post">
<?php if (isset($_smarty_tpl->tpl_vars['juego']->value)) {?>
  <input type="hidden" name="idJuego" value="<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
" />
<?php }
if (isset($_smarty_tpl->tpl_vars['partida']->value)) {?>
  <input type="hidden" name="idPartida" value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getId();?>
" />
<?php }?>
<div class="field">
    <label>Nombre del juego:</label> <input name="nombre" type="text" placeholder="Introduzca el nombre" <?php if (isset($_smarty_tpl->tpl_vars['juego']->value)) {?> 
      value="<?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombre();?>
"  
    <?php }?>
    <?php if (isset($_smarty_tpl->tpl_vars['partida']->value)) {?>
      value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getNombre();?>
"
    <?php }?>
    required readonly>
  </div>
  <div class="field">
    <label>Duracion (numero horas):</label>
    <input type="number" name="duracion" placeholder="número de horas" required value="<?php if (isset($_smarty_tpl->tpl_vars['partida']->value)) {
echo $_smarty_tpl->tpl_vars['partida']->value->getDuracion();
}?>">
  </div>
  <div class="field">
    <label>Fecha de inicio: </label>
    <input type="date" name="fechaInicio" value="<?php if (isset($_smarty_tpl->tpl_vars['partida']->value)) {
echo $_smarty_tpl->tpl_vars['partida']->value->getFechaInicio();
}?>"/>
  </div>
  <div class="actionButtons">
    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'crear') {?>
      <button class="button" formAction="partida.php" name="crearNuevaPartida">Guardar</button>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
      <button class="button" formAction="partida.php" name="actualizarPartida">Actualizar</button>
      <button class="button" formAction="partida.php" name="borrarPartida">Borrar</button>
    <?php }?>
  </div>
</form>
<?php if ($_smarty_tpl->tpl_vars['action']->value == 'edit') {?>
  <h2>Equipos de la partida</h2>
  <table>
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Código</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($_smarty_tpl->tpl_vars['equipos']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipos']->value, 'equipo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipo']->value) {
?>
          <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value->getNombre();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['equipo']->value->getCodigo();?>
</td>
          </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      <?php } else { ?>
        <tr>
          <td colspan="2"><h3>Todavía no hay equipos dados de alta</h3></td>
        </tr>
      <?php }?>
    </tbody>
  </table>
  <div id="altaEquipos">
    <h2>Añadir equipo</h2>
    <form action="partida.php" method='post'>
      <input type="hidden" name="idPartida" value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getId();?>
" />
      <div class="field">
        <label for="nombre">
          Nombre Equipo:
        </label>
        <input type="text" name="nombre" />
      </div>
      <div class="actionButtons">
        <button class="button" name="grabarEquipos">Añadir</button>
      </div>
    </form>
  </div>
<?php }?>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
