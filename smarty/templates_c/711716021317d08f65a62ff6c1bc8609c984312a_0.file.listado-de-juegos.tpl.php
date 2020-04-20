<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-20 21:02:57
  from 'C:\wamp64\www\crimebook\smarty\templates\listado-de-juegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9e0e01e55c63_91641719',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '711716021317d08f65a62ff6c1bc8609c984312a' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\listado-de-juegos.tpl',
      1 => 1587416574,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9e0e01e55c63_91641719 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'listado de juegos','activePage'=>'listado-de-juegos'), 0, false);
?>
  <div id="listadoDeJuegos">
    <h1 align="center">Juegos</h1>
    <form
          id="juegos"
          action="borrar-juegos.php"
          method="POST"
        >
    <table align="center">
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Número de pruebas</th>
        <th>Usuario que la creó</th>
      </tr>
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['juegos']->value, 'juego');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['juego']->value) {
?>
      <tr>
          <td><input name='juegos[]' type="checkbox" value=<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
></td>
          <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getNombre();?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreve();?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getNumPruebas();?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getUsername();?>
</td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>

    <br />
    <div class="listButtons">
      <a href="partida.php"><button class="button" name="nuevaPartida" value="nuevaPartida" formaction="partida.php">Nueva partida</button></a>
      <a href="juego.php" class="button">Nuevo juego</a>
      <a href="juego.php"><button class="button" name="editarJuego" formaction="juego.php">Editar Juego</button></a>
      <a href="borrar-juegos.php"><button class="button" name="borrarJuegos" value="borrarJuegos" formaction="borrar-juegos.php">Borrar juegos</button></a>
    </div>
    </form>
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
