<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" 
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
        <h1>{$ordenador->getnombrecorto()}</h1>
        <h2>{$ordenador->getcodigo()}<h2>
    </div>
    <!-- estilo ordenadores igual que el de #productos .nombre 
         copiado lo mismo en estilos a #ordenador               -->
    <div id="ordenador">
        <!-- añado mi nombre con la variable smarty creada en ordenadores.php-->
        <h4>{$luis}</h4>
        <!-- muestro los campos que pide el enunciado -->
        <h4>Características:</h4>
        <p><strong>Procesador:</strong> {$ordenador->getprocesador()}</p>
        <p><strong>RAM:</strong> {$ordenador->getRAM()}</p>
        <p><strong>Tarjeta gráfica:</strong> {$ordenador->getgrafica()}</p>
        <p><strong>Unidad óptica:</strong> {$ordenador->getunidadoptica()}</p>
        <p><strong>Otros:</strong> {$ordenador->getotros()}</p>
        <p><strong>PVP:</strong> {$ordenador->getPVP()}</p>
        <h4><strong>Descripción:</strong></h4>
        <p>{$ordenador->getdescripcion()}</p>
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
</html> 