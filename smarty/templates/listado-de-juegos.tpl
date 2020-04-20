{include file='header.tpl' pageTitle='listado de juegos' activePage='listado-de-juegos' }
  <div id="listadoDeJuegos">
    <h1 align="center">Juegos</h1>
    <form
          id="juegos"
          action="borrar-juegos.php"
          method="POST"
        >
    <table align="center">
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Número de pruebas</th>
        <th>Usuario que la creó</th>
      </tr>
      {foreach from=$juegos item=juego}
      <tr>
          <td><input name='juegos[]' type="checkbox" value={$juego->getId()}></td>
          <td>{$juego->getNombre()}</td>
          <td>{$juego->getdescBreve()}</td>
          <td>{$juego->getNumPruebas()}</td>
          <td>{$juego->getUsername()}</td>
      </tr>
      {/foreach}
    </table>

    <br />
    <div class="listButtons">
      <a href="partida.php"><button class="button" name="nuevaPartida" value="nuevaPartida" formaction="partida.php">Nueva partida</button></a>
      <a href="juego.php" class="button">Nuevo juego</a>
      <a href="juego.php"><button class="button" name="editarJuego" formaction="juego.php">Editar Juego</button></a>
      <a href="borrar-juegos.php"><button class="button" name="borrarJuegos" value="borrarJuegos" formaction="borrar-juegos.php">Borrar juegos</button></a>
    </div>
    </form>
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
