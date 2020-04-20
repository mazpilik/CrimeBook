{include file='header.tpl'  activePage='partida' }
<div id="crearEditarPartida">
<h1>{if $action == 'crear'}
  Crear nueva partida
  {elseif $action == 'editar'}
  Editar partida
{/if}</h1>
<form id="crearEditarForm" action="partida.php" method="post">
{if isset($juego)}
  <input type="hidden" name="idJuego" value="{$juego->getId()}" />
{/if}
{if isset($partida)}
  <input type="hidden" name="idPartida" value="{$partida->getId()}" />
{/if}
<div class="field">
    <label>Nombre del juego:</label> <input name="nombre" type="text" placeholder="Introduzca el nombre" {if isset($juego)} 
      value="{$juego->getNombre()}"  
    {/if}
    {if isset($partida)}
      value="{$partida->getNombre()}"
    {/if}
    required readonly>
  </div>
  <div class="field">
    <label>Duracion (numero horas):</label>
    <input type="number" name="duracion" placeholder="número de horas" required value="{if isset($partida)}{$partida->getDuracion()}{/if}">
  </div>
  <div class="field">
    <label>Fecha de inicio: </label>
    <input type="date" name="fechaInicio" value="{if isset($partida)}{$partida->getFechaInicio()}{/if}"/>
  </div>
  <div class="actionButtons">
    {if $action == 'crear'}
      <button class="button" formAction="partida.php" name="crearNuevaPartida">Guardar</button>
    {/if}
    {if $action == 'edit'}
      <button class="button" formAction="partida.php" name="actualizarPartida">Actualizar</button>
      <button class="button" formAction="partida.php" name="borrarPartida">Borrar</button>
    {/if}
  </div>
</form>
{if $action == 'edit'}
  <div class="section">
    <h2>Equipos de la partida</h2>
    <form action="partida.php" method='post'>
    <table>
      <thead>
        <tr>
          <th></th>
          <th>Nombre</th>
          <th>Código</th>
        </tr>
      </thead>
      <tbody>
        {if !empty($equipos)}
          {foreach from=$equipos item=equipo}
            <tr>
              <td><input type="checkbox" name="equipos[]" value="{$equipo->getId()}" /></td>
              <td>{$equipo->getNombre()}</td>
              <td>{$equipo->getCodigo()}</td>
            </tr>
        {/foreach}
        {else}
          <tr>
            <td colspan="3"><h3>Todavía no hay equipos dados de alta</h3></td>
          </tr>
        {/if}
        <tr>
          <td colspan="3">
            <input type="hidden" name="idPartida" value="{$partida->getId()}" />
            <div class="field">
              <label for="nombre">
                Nombre Equipo:
              </label>
              <input type="text" name="nombre" />
            </div>
            <div class="actionButtons">
              <button class="button" name="grabarEquipos">Añadir</button>
              <button class="button" name="borrarEquipos">Borrar</button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    </form>
  </div>
{/if}
</div>

{include file='footer.tpl'}