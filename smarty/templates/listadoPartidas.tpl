
{include file='header.tpl' pageTitle='listado de partidas' activePage='listado-de-partidas' }
    <h2 align="center">Listado de partidas</h2>
    <form id="editarPartida" name="editarPartida" method="POST" action="listado-de-partidas.php">
        <table align="center">
            <tr>
                <th></th>
                <th>Nombre de la partida</th>
                <th>Número de equipos</th>
                <th>Fecha de creación</th>
                <th>Usuario que la creó</th>
                <th>Finalizada</th>
            </tr>
            {foreach from=$partidas item=partida}
                <tr>
                    <td><input type="checkbox" name="partidas[]" value="{$partida->getId()}" /></td>
                    <td>
                        {$partida->getNombre()}
                    </td>
                    <td>
                        {$partida->getNumEquipos()}
                    </td>
                    <td>{$partida->getFechaCreacion()}</td>
                    <td>{$partida->getUserName()}</td>
                    <td>{if $partida->getFinalizada()}
                        si
                    {else}
                        no
                    {/if}</td>
                </tr>
            {/foreach}
        </table>

        <br>
        <div style="text-align:center;">
            <button type="submit" form="editarPartida" formaction="partida.php" value="equiposButton" name="editarPartida" class="button">Editar partida</button>
            <button type="submit" form="editarPartida" value="borrarButton" formaction="borrar-partidas.php" name="borrarPartidas" class="button">Borrar Partida</button>
            <button type="submit" form="editarPartida" value="estadisticasButton" formaction="estadisticas.php" name="estadisticasButton" class="button">Estadísticas Partida</button>
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
{include file='footer.tpl'}