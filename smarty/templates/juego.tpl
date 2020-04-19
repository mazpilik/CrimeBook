{include file='header.tpl' pageTitle='crear/editar juego' activePage='juego'}
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
    placeholder="Introduzca una descripción breve" required>{if $formType == 'edit'} {$juego->getdescBreve()} {/if}</textarea><br><br>
  </div>
  <div class="field"><label>Descripcion extendida:</label><textarea name="descExtendida" rows="2" cols="25"
    placeholder="Introduzca una descripción extensa" required>{if $formType == 'edit'} {$juego->getdescExtendida()} {/if}</textarea><br>
  <input type='hidden' name='usuario' value='{$usuario}' /></div>
</form>

<div align="center">
  {if $formType == 'edit'}
    <button class="button" form="crearJuego" name="nuevoIdJuego" value="crearJuego">Actualizar</button>
    <a class="button" href="borrar-juegos.php?id={$juego->getId()}">Borrar juego</a>
  {else}
    <button class="button" form="crearJuego" name="nuevoIdJuego" value="crearJuego">Guardar</button>
  {/if}
</div>

{if $formType == 'edit'}
  <div class="listadoPruebas">
  <h3 align="center">Listado de pruebas</h3>
  <table align="center">
      <tr>
          <th>Pruebas</th>
          <th>Editar Pruebas</th>
      </tr>
      {foreach from=$pruebas item=prueba}
      <tr>
          <form id='{$prueba->getIdPrueba()}' action='editar-juego.php' method='POST'>
              <input type='hidden' name='idPruebaParaEliminar' value='{$prueba->getIdPrueba()}' />
              <input type='hidden' name='idJuegoParaEliminarPrueba' value='{$juego->getId()}' />
              <td>
                  {$prueba->getNombrePrueba()}
              </td>
              <td>
                  <input type='submit' name='editarPrueba' value='Editar prueba' />
                  <input type='submit' name='eliminarPrueba' value='Elminar prueba' />
              </td>
          </form>
      </tr>
      {/foreach}
      <tr>
          <form id='nuevaPrueba' action='nueva-prueba.php' method='POST'>
              <input type='hidden' name='idJuego' value='{$juego->getId()}' />
              <td>
                  Haz clic en Añadir prueba para crear pruebas en el juego
              </td>
              <td>
                  <input type='submit' name='nuevaPrueba' value='Nueva prueba' />
              </td>
          </form>
      </tr>
  </table>
</div>
{/if}

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