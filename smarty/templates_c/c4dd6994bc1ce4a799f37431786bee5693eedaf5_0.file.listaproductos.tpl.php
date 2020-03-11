<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-03 23:31:25
  from 'C:\xampp\htdocs\DWES05_Tienda_web\smarty\templates\listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5edabdc8d683_66491807',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4dd6994bc1ce4a799f37431786bee5693eedaf5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES05_Tienda_web\\smarty\\templates\\listaproductos.tpl',
      1 => 1583274500,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5edabdc8d683_66491807 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- listamos todos los productos -->
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
<p>
    <form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='POST'>
        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
        <input type='submit' name='enviar' value='Añadir'/>
        
        <!-- extraemos la familia del producto para saber cuales son ordenadores-->
        <?php $_smarty_tpl->_assignInScope('familia', $_smarty_tpl->tpl_vars['producto']->value->getFamilia());?>
        
        <!-- si son ordenadores hay que incluir el hipervínculo -->
        <?php if ($_smarty_tpl->tpl_vars['familia']->value == "ORDENA") {?>
            <!-- vínculo método get - visible en la dirección codigo producto-->
            <a href="<?php echo "ordenadores.php?codigo=".((string)$_smarty_tpl->tpl_vars['producto']->value->getcodigo());?>
">
            <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros</a>
        <?php } else { ?>
            <!-- si no es de la familia ordenador lo dejamos como 
            estaba incialmente en el programa-->
            <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros
        <?php }?>
    </form>
</p>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
