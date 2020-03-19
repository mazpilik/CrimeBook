<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Crimebook</title>
  </head>
  <body>
    <div class="letradefault">

      <div>
        <table class="tablacodigo">
          <tr >
            <th style="color:white">Usuario:</th>
            <th class="codigoprogramado" >
            <?php
                //inicia o continúa la sesión
                session_start(); 
                //si la variable no está vacía imprimimos el nombre
                //del usuario y creamos el enlace para cerrar sesión
                if (!empty($_SESSION["sesion"])){
                    echo $_SESSION["sesion"]." ";
                    echo "<a href='logout.php' "
                    . "text-align:'right'>  Logout </a> ";
                }
            ?>
            </th>
          </tr>
        </table>
        </div>

    <p id="pruebas">JUEGOS</p>
    <br>
    </div>
      
  </body>
 
</html>
