<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-03 14:22:38
  from 'C:\xampp\htdocs\DWES05_Tienda_web\smarty\templates\productoscesta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5e5a1e1cd533_65485491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '964ee31bc1b71a8492e7ebfe92973a1381d7a09c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES05_Tienda_web\\smarty\\templates\\productoscesta.tpl',
      1 => 1583241753,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5e5a1e1cd533_65485491 (Smarty_Internal_Template $_smarty_tpl) {
?>    <h3><img src='cesta.png' alt='Cesta' width='24' height='21'> Cesta</h3>
    <hr />
    <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
        <p>Cesta vacía</p>
    <?php } else { ?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productoscesta']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
          <p><?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
</p>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

    <form id='vaciar' action='productos.php' method='post'>
        <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
            <input type='submit' name='vaciar' value='Vaciar Cesta' disabled='true' />
        <?php } else { ?>
            <input type='submit' name='vaciar' value='Vaciar Cesta' />
        <?php }?>
    </form>
    <form id='comprar' action='cesta.php' method='post'>
        <?php if (empty($_smarty_tpl->tpl_vars['productoscesta']->value)) {?>
            <input type='submit' name='comprar' value='Comprar' disabled='true' />
        <?php } else { ?>
            <input type='submit' name='comprar' value='Comprar' />
        <?php }?>
    </form> 
<?php }
}
