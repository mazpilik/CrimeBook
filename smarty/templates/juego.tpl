{include file='header.tpl' pageTitle='crear/editar juego' activePage='juego'}
<div id="juego">
  <h1>{if $formType == 'default'}
    Crear nuevo juego
  {else}
    Editar Juego
  {/if}</h1>
  <form id="crearJuego" class="crearEditarJuego" action='juego.php' method='POST'>
    {if $formType == 'edit'}
      <input name="id" type="hidden" value={$juego->getId()} />
      <input name="action" type="hidden" value='actualizar' />
    {else}
        <input name="action" type="hidden" value='crear' />
    {/if}
    <div class="field">
      <label>Nombre del juego:</label> <input name="nombre" type="text" placeholder="Introduzca el nombre" {if $formType == 'edit'} 
        value="{$juego->getNombre()}"  
      {/if}
      required>
    </div>
    <div class="field">
      <label>Descripcion breve:</label><textarea name="descBreve" rows="2" cols="25"
      placeholder="Introduzca una descripción breve" required>{if $formType == 'edit'}{$juego->getdescBreve()}{/if}</textarea><br><br>
    </div>
    <div class="field"><label>Descripcion extendida:</label><textarea name="descExtendida" rows="2" cols="25"
      placeholder="Introduzca una descripción extensa" required>{if $formType == 'edit'}{$juego->getdescExtendida()}{/if}</textarea><br>
    <input type='hidden' name='usuario' value='{$usuario}' /></div>
  </form>

  <div align="center">
    {if $formType == 'edit'}
      <button class="button" form="crearJuego" name="updateJuego" value="crearJuego">Actualizar</button>
      <a class="button" href="borrar-juegos.php?id={$juego->getId()}">Borrar juego</a>
    {else}
      <button class="button" form="crearJuego" name="createJuego" value="crearJuego">Guardar</button>
    {/if}
  </div>

  {if $formType == 'edit'}
    <div class="section">
    <h3 align="center">Listado de pruebas</h3>
    <form id='addPrueba' action='juego.php' method='POST'>
      <input type='hidden' name='idJuego' value='{$juego->getId()}' />
      <table align="center">
          <tr>
              <th></th>
              <th>Pruebas</th>
          </tr>
          {if !empty($pruebas)}
            {foreach from=$pruebas item=prueba}
            <tr>
                    <td><input type="checkbox" name="pruebas[]" value="{$prueba->getId()}" /></td>
                    <td>
                        {$prueba->getNombre()}
                    </td>
            </tr>
            {/foreach}
          {else}
            <tr><td colspan="2"><h3>Todavía no hay pruebas asociadas</h3></td></tr>    
          {/if}
          <tr>
            <td colspan="2">
                <div class="field">
                  <label>Prueba: </label>
                  <select name="prueba">
                    <option value="0">Selecciona</option>
                    {foreach from=$allPruebas item=sPrueba}
                      <option value="{$sPrueba->getId()}">{$sPrueba->getNombre()}</option>
                    {/foreach}}
                  </select>
                </div>
                <div class="actionButtons">
                  <input type='submit' class="button" name='addPrueba' value='Añadir prueba' />
                  <input type="submit" class="button" name="deletePruebas" value="Borrar" />
                </div>
              
            </td>
          </tr>
      </table>
    </form>
  </div>
  {/if}
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
{include file='footer.tpl'}