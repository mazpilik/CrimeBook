{include file='header.tpl' pageTitle='Crear / Editar Prueba' activePage='prueba' }
<div id="prueba">
{if $action = 'crear'}
  <h1>Crear nueva prueba<h1>
  
{/if}
<form id="crearEditarPrueba" class="creationEditionForm" action="prueba.php" method="post">
  <div class="field">
    <label>Nombre: </label>
    <input type="text" name="nombre" required />
  </div>
  <div class="field">
    <label>
      URL:
    </label>
    <input type="text" name="url" />
  </div>
  <div class="field">
    <label>
      Decripción breve:
    </label>
    <textarea name="descBreve"></textarea>
  </div>
  <div class="field">
    <label>
      Decripción extendida / enunciado:
    </label>
    <textarea name="descExtendida"></textarea>
  </div>
  <div class="field">
    <label>
      tipo:
    </label>
    <select name="tipo" required>
      <option value="">selecciona</option>
      <option value="Prueba normal">Normal</option>
      <option value="Prueba final">Final</option>
    </select>
  </div>
  <div class="field">
    <label>
      dificultad:
    </label>
    <select name="dificultad">
      <option value="">selecciona</option>
      <option value="Facil">Facil</option>
      <option value="Normal">Normal</option>
      <option value="Dificil">Dificil</option>
    </select>
  </div>
  <div class="field">
    <label>Ayuda final: </label>
    <input type="text" name="ayudaFinal" />
  </div>
  <div class="actionButtons">
    <input class="button" name="createPrueba" type="submit" value="Guardar" />
    <input class="button" name="reset" type="reset" value="Reset" />
  </div>

</form>
</div>
{include file='footer.tpl'}