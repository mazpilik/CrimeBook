<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-18 17:41:25
  from 'C:\wamp64\www\crimebook\smarty\templates\listado-de-juegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e9b3bc5a4af15_92510337',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '711716021317d08f65a62ff6c1bc8609c984312a' => 
    array (
      0 => 'C:\\wamp64\\www\\crimebook\\smarty\\templates\\listado-de-juegos.tpl',
      1 => 1587231681,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5e9b3bc5a4af15_92510337 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>'listado de juegos','activePage'=>'listado-de-juegos'), 0, false);
?>
  <div id="listadoDeJuegos">
    <h1 align="center">Juegos</h1>
    <form
          id="juegos"
          action="borrar-juegos.php"
          method="POST"
        >
      <input type="hidden" name="borrar" value="ok" />
    <table align="center">
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Número de pruebas</th>
        <th>Usuario que la creó</th>
        <th></th>
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
          <td>
            <div class="actions">
              <a href="juego.php?edit=<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
"><i class="fa fa-pencil" aria-hidden="true"></i></a>
              <a href="borrar-juegos.php?id=<?php echo $_smarty_tpl->tpl_vars['juego']->value->getId();?>
"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
            </div>
          </td>
      </tr>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>

    <br />
    <div style="text-align:center;">
      <a href="partida.php" class="button">Nueva partida</a>
      <a href="juego.php" class="button">Nuevo juego</a>
      <input type="submit" class="button" value="Borrar juegos" />
      <a href="Pagina2.html" class="button">Ver Partidas</a>
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
