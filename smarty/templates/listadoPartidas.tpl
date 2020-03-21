<!DOCTYPE html>
<html>
<head>
    <title>Crimebook</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <div class="topnav" id="myTopnav">
        <a href="Index.html">Listado de juegos</a>
        <a href="Pagina2.html" class="active">Listado de partidas</a>
        <a href="Pagina3.html">Listado de pruebas</a>
        <a href="Pagina4.html">Partida nueva</a>
        <a href="Pagina5.html">Juego Nuevo/editar juego</a>
        <a href="Pagina6.html">Prueba Nueva/ Editar prueba</a>
        <a href="Pagina7.html">Consultar partida</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <h2 align="center">Partidas</h2>
    <form id="editarPartida" name="editarPartida" method="POST" action="listado-de-partidas.php">
        {if isset($eleccion)}
            {if $eleccion=='no'}
                <div id="errorZone">
                    <h1>POR FAVOR ELIGE UNA FILA DE LA TABLA</h1>
                </div>
            {else}
                <div id="editZone">
                    <table align="center">
                        <tr>
                            <td rowspan="2" class="titulos">Nombre del juego</td>
                            <td rowspan="2" class="titulos">Duración de la partida</td>
                            <td colspan="2" class="titulos">Listado de Equipos</td>
                        </tr>
                        <tr>
                            <td class="titulos">Nombre Equipo</td>
                            <td class="titulos">Código Acceso</td>
                        </tr>
                        {foreach from=$partidas item=partida}
                            {if $partida->getId()==$cual}
                                {foreach from=$juegos item=juego}
                                    {if $juego->getId()==$partida->getIdJuego()}
                                        <tr>
                                            <td>{$juego->getNombre()}</td>
                                            <td><input type="text" name="duracionF" value="{$partida->getDuracion()}" /></td>
                                        </tr>
                                    {/if}
                                {/foreach}
                            {/if}
                        {/foreach}
                    </table>
                </div>
            {/if}
        {/if}
        <table align="center">
            <tr>
                <th></th>
                <th>Nombre del juego</th>
                <th>Número de equipos</th>
                <th>Fecha de creación</th>
                <th>Usuario que la creó</th>
                <th>Finalizada</th>
            </tr>
            <tr>
		{foreach from=$partidas item=partida}
                    <tr>
                        <td><input type="radio" name="eleccion" value="{$partida->getId()}" /></td>
                        <td>
                            {foreach from=$juegos item=juego}
                                {if $juego->getId()==$partida->getIdJuego()}
                                    {$juego->getNombre()}
                                {/if}
                            {/foreach}
                        </td>
                        <td>
                            {$cuantos=0}
                            {foreach from=$equipos item=equipo}
                                {if $equipo->getIdPartida()==$partida->getId()}
                                    {$cuantos=$cuantos+1}
                                {/if}
                            {/foreach}
                            {$cuantos}
                        </td>
                        <td>{$partida->getFechaCreacion()}</td>
                        <td>{$partida->getUserName()}</td>
                        <td>{$partida->getFinalizada()}</td>
                    </tr>
                {/foreach}
            <tr>
                <td><input type="radio" name="eleccion" value="nueva" /></td>
                <td colspan="5">PARTIDA NUEVA</td>
            </tr>
        </table>

        <br>
        <div style="text-align:center;">
            <button type="submit" form="editarPartida" value="newButton" name="newButton" class="button">Editar/Crear Partida</button>
            <button class="button">Eliminar partida</button>
        </div>
    </form>
            
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
</body>
</html>
