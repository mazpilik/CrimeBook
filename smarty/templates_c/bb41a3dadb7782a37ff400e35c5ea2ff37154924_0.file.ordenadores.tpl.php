<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-03 23:08:21
  from 'C:\xampp\htdocs\DWES05_Tienda_web\smarty\templates\ordenadores.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5ed555076e74_48920467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb41a3dadb7782a37ff400e35c5ea2ff37154924' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DWES05_Tienda_web\\smarty\\templates\\ordenadores.tpl',
      1 => 1583273291,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5ed555076e74_48920467 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
    "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: ordenadores.php -->

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de ordenadores con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>
<!--Modificación 2: Utilizando Smarty, crear una nueva vista o página en PHP, 
con su correspondiente plantilla (*.tpl), para mostrar la información de un 
modelo de ordenador y adaptar el resto de código. Se debe mostrar: nombre corto, 
código, procesador, RAM, tarjeta gráfica, unidad óptica, otros, PVP y 
descripción (ten en cuenta que algunos datos están almacenados en la tabla 
producto y otros en la nueva tabla ordenador). 
En la primera línea del apartado características de esta nueva página deberás 
imprimir en pantalla tu nombre y apellidos, utilizando para ello una variable 
de Smarty, justo encima del resto de campos del ordenador. 
La página deberá contar, además, con un botón volver que permita regresar al 
listado de productos. Puedes fijarte en la imagen de la página resultante que 
se aporta.-->

<!-- utilizo los estilos de productos-->
<body class="pagproductos">
<!-- contenedor-->
<div id="contenedor">
    <!-- encabezado azul utilizo el de productos-->
    <div id="encabezado">
        <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h1>
        <h2><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
<h2>
    </div>
    <!-- estilo ordenadores igual que el de #productos .nombre 
         copiado lo mismo en estilos a #ordenador               -->
    <div id="ordenador">
        <!-- añado mi nombre con la variable smarty creada en ordenadores.php-->
        <h4><?php echo $_smarty_tpl->tpl_vars['luis']->value;?>
</h4>
        <!-- muestro los campos que pide el enunciado -->
        <h4>Características:</h4>
        <p><strong>Procesador:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</p>
        <p><strong>RAM:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getRAM();?>
</p>
        <p><strong>Tarjeta gráfica:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</p>
        <p><strong>Unidad óptica:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</p>
        <p><strong>Otros:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</p>
        <p><strong>PVP:</strong> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getPVP();?>
</p>
        <h4><strong>Descripción:</strong></h4>
        <p><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</p>
    </div>
    <!-- incluimos botón volver -->
    <br class="divisor" />
    <div id="pie">
        <form id='volver' action='productos.php' >
            <input type='submit' name='volver' value='volver'/>
        </form>
    </div>
</div>
</body>
</html> <?php }
}
