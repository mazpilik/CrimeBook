{include file='header.tpl' pageTitle='listado de pruebas' activePage='listado-de-pruebas' }
  <div id="listadoDePruebas">
    <h1>Listado de Pruebas</h1>
    <form id="listadoDePruebasForm" method="post">
      <table>
        <thead>
          <tr>
            <th></th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Tipo</th>
            <th>Usuario</th>
          </tr>
        </thead>
        <tbody>
          {if !empty($pruebas)}
            {foreach from=$pruebas item=$prueba}
              <tr>
              <td><input name="pruebasIds[]" type="checkbox" value="{$prueba->getId()}" /></td>
              <td>{$prueba->getNombre()}</td>
              <td>{$prueba->getDescBreve()}</td>
              <td>{$prueba->getTipo()}</td>
              <td>{$prueba->getUsername()}</td>
            </tr>
            {/foreach}
          {else}
            <td colspan="5" class="notice"><h3>Todavía no hay pruebas en la aplicación</h3></td>
          {/if}
        </tbody>
      </table>
      <div class="listButtons" style="text-align:center;">
        <a href="prueba.php"><button class="button" name="printCrearPrueba" value="crearPrueba" formaction="prueba.php">Crear prueba</button></a>
        <a href="prueba.php"><button class="button" name="duplicarPrueba" formaction="prueba.php">Duplicar prueba</button></a>
        <a href="prueba.php"><button class="button" name="editarPrueba" value="editarPrueba" formaction="prueba.php">Editar prueba</button></a>
        <a href="borrar-pruebas.php"><button class="button" name="deletePruebas" formaction="borrar-pruebas.php">Borrar prueba</button></a>
    </div>
    </form>
  </div>
{include file='footer.tpl'}