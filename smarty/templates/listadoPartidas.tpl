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
                    {if $tarea=='estadisticas'}
                       <table align="center">
                            <tr>
                                <td class="titulos">Fecha inicio</td>
                                <td class="titulos">Duración</td>
                                <td class="titulos">Equipos</td>
                                {*<td class="titulos">Pruebas</td>*}
                            </tr>
                            {*<tr>
                                <td class="titulos">Nombre</td>
                                <td class="titulos">Tiempo de resolución</td>
                                <td class="titulos">Penalizaciones</td>
                            </tr>*}
                            {foreach from=$partidas item=partida}
                                
                                    {if $partida->getId()==$cual}
                                        <tr>
                                            <td>{$partida->getFechaInicio()}</td>
                                            <td>{$partida->getDuracion()}</td>
                                            <td>
                                                <table border="1">
                                                    <tr>
                                                        <td class="titulos">Equipo</td>
                                                        <td class="titulos">Código de Acceso</td>
                                                    </tr>
                                                    {foreach from=$equipos item=equipo}
                                                        {if $equipo->getIdPartida()==$partida->getId()}  
                                                            <tr>
                                                                <td>{$equipo->getNombre()}</td>
                                                                <td>{$equipo->getCodigo()}</td>
                                                            </tr>
                                                        {/if}
                                                    {/foreach}
                                                </table>
                                            </td>
                                        </tr>
                                    {/if}
                                    
                            {/foreach}
                            <tr>
                                <td><button type="submit" form="editarPartida" value="salir" name="salir" class="button">SALIR</button></td>
                            </tr>
                       </table>
                    {else}
                        <table align="center">
                            <tr>
                                <td class="titulos">Nombre del juego/partida</td>
                                <td class="titulos">Duración de la partida</td>
                                <td class="titulos">Listado de Equipos</td>
                            </tr>
                            {foreach from=$partidas item=partida}
                                {if $partida->getId()==$cual}
                                    {foreach from=$juegos item=juego}
                                        {if $juego->getId()==$partida->getIdJuego()}
                                            <input type="hidden" id="idPartida" name="idPartida" value="{$partida->getId()}">
                                            <tr>
                                                <td>{$juego->getNombre()}/{$partida->getNombre()}</td>
                                                <td>
                                                    {if $tarea=='duracion'}
                                                        <input type="text" name="duracionF" value="{$partida->getDuracion()}" />
                                                    {else}
                                                        {$partida->getDuracion()}
                                                    {/if}
                                                </td>
                                                <td>
                                                    <table border="1">
                                                        <tr>
                                                            <td class="titulos">Nombre Equipo</td>
                                                            <td class="titulos">Código Acceso</td>
                                                        </tr>
                                                        {foreach from=$equipos item=equipo}
                                                            {if $equipo->getIdPartida()==$partida->getId()}  
                                                                <tr>
                                                                    <td>{$equipo->getNombre()}</td>
                                                                    <td>{$equipo->getCodigo()}</td>
                                                                </tr>
                                                            {/if}
                                                        {/foreach}
                                                        {if $tarea=='equipos'}
                                                            <tr>
                                                                <td><input type="text" name="equiposF" placeholder='Nombre del nuevo equipo' /></td>
                                                                <td><button type="submit" form="editarPartida" value="grabarEquipos" name="grabarEquipos" class="button">GRABAR</button></td>
                                                            </tr>
                                                        {/if}
                                                    </table>
                                                </td>
                                            </tr>
                                        {/if}
                                    {/foreach}
                                {/if}
                            {/foreach}
                            {if $tarea=='duracion'}
                                <tr>
                                    <td>
                                         <button type="submit" form="editarPartida" value="grabarDuracion" name="grabarDuracion" class="button">GRABAR</button>
                                    </td>
                                </tr>
                            {/if}
                            {if $tarea=='borrar'}
                                <tr>
                                    <td>
                                         <button type="submit" form="editarPartida" value="borrarPartida" name="borrarPartida" class="button">CONFIRMAR BORRADO</button>
                                    </td>
                                </tr>
                            {/if}
                        </table>
                    {/if}
                </div>
            {/if}
        {/if}
        <table align="center">
            <tr>
                <th></th>
                <th>Nombre del juego/partida</th>
                <th>Número de equipos</th>
                <th>Fecha de creación</th>
                <th>Usuario que la creó</th>
                <th>Finalizada</th>
            </tr>
            {foreach from=$partidas item=partida}
                <tr>
                    <td><input type="radio" name="eleccion" value="{$partida->getId()}" /></td>
                    <td>
                        {foreach from=$juegos item=juego}
                            {if $juego->getId()==$partida->getIdJuego()}
                                {$juego->getNombre()}/{$partida->getNombre()}
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
        </table>

        <br>
        <div style="text-align:center;">
            <button type="submit" form="editarPartida" value="duracionButton" name="duracionButton" class="button">Modificar Duración</button>
            <button type="submit" form="editarPartida" value="equiposButton" name="equiposButton" class="button">Añadir Equipos</button>
            <button type="submit" form="editarPartida" value="borrarButton" name="borrarButton" class="button">Borrar Partida</button>
            <button type="submit" form="editarPartida" value="estadisticasButton" name="estadisticasButton" class="button">Estadísticas Partida</button>
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
