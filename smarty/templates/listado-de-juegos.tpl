<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : PROYECTO Programación orientada a objetos en PHP -->
<!-- juego crimebook -->
<html>
<head>
    <title>Crimebook - Listado de Juegos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <div class="topnav" id="myTopnav" style="margin: 0 0 0 0;">
  	<a href="listado-de-juegos.php" class="active">Listado de juegos</a>
  	<a href="listado-de-partidas.php">Listado de partidas</a>
  	<a href="listado-de-pruebas.php">Listado de pruebas</a>
  	<a href="nueva-partida.php">Partida nueva</a>
  	<a href="nuevo-juego.php">Juego Nuevo/Editar juego</a>
  	<a href="nueva-prueba.php">Prueba Nueva/ Editar prueba</a>
  	<a href="consultar-partida.php">Consultar partida</a>
  	<a href="javascript:void(0);" class="icon" onclick="myFunction()">
  	<i class="fa fa-bars"></i>
  	</a>
    </div>

<h2 align="center">Juegos</h2>
      <table align="center">
        <tr>
          <th>Modificar</th>
          <th>Nombre del juego</th>
          <th>Descripción</th>
          <th>Número de pruebas</th>
          <th>Usuario que la creó</th>
        </tr>
        {foreach from=$juegos item=juego}
        <tr>
            <form id='{$juego->getidJuego()}' action='editar-juego.php' method='POST'>
                <td>
                    <input type='hidden' name='idJuego' value='{$juego->getIdJuego()}'/>
                    <input type='submit' name='editarJuego' value='Editar / Eliminar'/>
                </td>
                <td>{$juego->getNombreJuego()}</td>
                <td>{$juego->getdescBreveJuego()}</td>
                <td>{$juego->getnumPruebasJuego()}</td>
                <td>{$juego->getUsernameJuego()}</td>                
            </form>
        </tr>
        {/foreach}
      </table>
<br>
    <div style="text-align:center;">
        <a href="Pagina4.html"><button class="button">Nueva partida</button></a>
        <a href="nuevo-juego.php"><button class="button" name="nuevoJuego" value="nuevoJuego">Nuevo juego</button></a>
        <a href="Pagina2.html"><button class="button">Ver Partidas</button></a>

    </div>

<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<div id="contenedor">

  <br class="divisor" />
  <div id="pie">
    <form action='logout.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
    </form>        
  </div>
</div>
</body>
</html>