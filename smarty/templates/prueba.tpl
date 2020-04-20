{include file='header.tpl' pageTitle='Crear / Editar Prueba' activePage='prueba' }
<div id="prueba">
{if $action == 'crear'}
  <h1>Crear nueva prueba<h1>
{/if}
{if $action == 'edit'}
  <h1>Editar Prueba</h1>
{/if}
<form id="crearEditarPrueba" class="creationEditionForm" action="prueba.php" method="post">
  {if $action == 'edit'}
    <input type="hidden" name="pruebasIds[]" value={$prueba->getId()} />
  {/if}
  <div class="field">
    <label>Nombre: </label>
    <input type="text" name="nombre" required {if $action == 'edit'}value="{$prueba->getNombre()}"{/if} />
  </div>
  <div class="field">
    <label>
      URL:
    </label>
    <input type="text" name="url" {if $action == 'edit'}value="{$prueba->getUrl()}"{/if}/>
  </div>
  <div class="field">
    <label>
      Decripción breve:
    </label>
    <textarea name="descBreve" {if $action == 'edit'}value="{$prueba->getDescBreve()}"{/if}></textarea>
  </div>
  <div class="field">
    <label>
      Decripción extendida / enunciado:
    </label>
    <textarea name="descExtendida" {if $action == 'edit'}value="{$prueba->getDescExtendida()}"{/if}></textarea>
  </div>
  <div class="field">
    <label>
      tipo:
    </label>
    <select name="tipo" required>
      <option value="">selecciona</option>
      <option value="Prueba normal" {if $action == 'edit'}{if $prueba->getTipo() == 'Prueba normal'}
        selected
      {/if}{/if}>Normal</option>
      <option value="Prueba final" {if $action == 'edit'}{if $prueba->getTipo() == 'Prueba final'}
        selected
      {/if}{/if}>Final</option>
    </select>
  </div>
  <div class="field">
    <label>
      dificultad:
    </label>
    <select name="dificultad">
      <option value="">selecciona</option>
      <option value="Facil" {if $action == 'edit'}{if $prueba->getDificultad() == 'Facil'}
        selected
      {/if}{/if}>Facil</option>
      <option value="Normal" {if $action == 'edit'}{if $prueba->getDificultad() == 'Normal'}
        selected
      {/if}{/if}>Normal</option>
      <option value="Dificil" {if $action == 'edit'}{if $prueba->getDificultad() == 'Dificil'}
        selected
      {/if}{/if}>Dificil</option>
    </select>
  </div>
  <div class="field">
    <label>Ayuda final: </label>
    <input type="text" name="ayudaFinal" {if $action == 'edit'}value="{$prueba->getAyudaFinal()}"{/if} />
  </div>
  <div class="actionButtons">
    {if $action == 'crear'}
      <input class="button" name="createPrueba" type="submit" value="Guardar" />
      <input class="button" name="reset" type="reset" value="Reset" />
    {/if}
    {if $action == 'edit'}
      <input class="button" name="updatePrueba" type="submit" value="Actualizar" />
      <input class="button" name="reset" type="reset" value="Reset" />
      <input class="button" name="deletePruebas" formaction="borrar-pruebas.php" type="submit" value="Borrar" />
    {/if}
    
  </div>

</form>
</div>
{include file='footer.tpl'}