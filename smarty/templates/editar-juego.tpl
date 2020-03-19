<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : PROYECTO Programación orientada a objetos en PHP -->
<!-- juego crimebook -->
<html>
<head>
     <title>Crimebook</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta charset="UTF-8">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
    <div class="topnav" id="myTopnav" style="margin: 0 0 0 0;">
        <a href="listado-de-juegos.php">Listado de juegos</a>
        <a href="Pagina2.html">Listado de partidas</a>
        <a href="Pagina3.html">Listado de pruebas</a>
        <a href="Pagina4.html">Partida nueva</a>
        <a href="nuevo-juego.php" class="active">Juego Nuevo/editar juego</a>
        <a href="Pagina6.html">Prueba Nueva/ Editar prueba</a>
        <a href="Pagina7.html">Consultar partida</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
        </a>
    </div>
    <form id='{$juego->getIdJuego()}' action='grabar-juego.php' method='POST'>
        <div id="pag5" align="center">        
            <p>     
                <input type='hidden' name='idJuego' value='{$juego->getIdJuego()}'/>
                <strong>Nombre del juego:</strong><textarea name="nombre" rows="1" cols="25" placeholder="Introduzca el nombre">{$juego->getNombreJuego()}</textarea><br><br>
                <strong>Descripcion breve:</strong><textarea name="descBreve" rows="2" cols="25" placeholder="Introduzca una descripción breve">{$juego->getdescBreveJuego()}</textarea><br><br>
                <strong>Descripcion extendida:</strong><textarea name="descExtendida" rows="2" cols="25" placeholder="Introduzca una descripción extensa">{$juego->getdescExtendidaJuego()}</textarea><br>      
            </p>
            <br>
        </div>
        </form>              
    <h3 align="center">Listado de pruebas</h3>
	<table align="center">
            <tr>
                <th>Pruebas</th>
                <th>Editar Pruebas</th>
            </tr>        
            {foreach from=$pruebas item=prueba}
            <tr>
                <form id='{$prueba->getIdPrueba()}' action='editar-prueba.php' method='POST'>
                    <input type='hidden' name='idPrueba' value='{$prueba->getIdPrueba()}'/>              
                    <td>                       
                        {$prueba->getNombrePrueba()}
                    </td>   
                    <td>                       
                        <input type='submit' name='editarPrueba' value='Editar prueba'/>                    
                    </td>   
                </form>
            </tr>        
            {/foreach} 
            <tr>                
                <form id='nuevaPrueba' action='nueva-prueba.php' method='POST'>
                    <input type='hidden' name='idJuego' value='{$juego->getIdJuego()}'/>
                    <input type='hidden' name='idJuego' value='{$nuevoIdPrueba}'/>
                    <td>
                        Haz clic en Añadir prueba para crear pruebas en el juego
                    </td>
                    <td>
                        <input type='submit' name='nuevaPrueba' value='Nueva prueba'/>
                    </td>
                </form>
            </tr>

	</table>
        <br>
        <div align="center">
            <button class="button" form='{$juego->getIdJuego()}'>Enviar/Guardar</button> 
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

<div id="contenedor">

  <br class="divisor" />
  <div id="pie">
    <form action='logout.php' method='post'>
        <input type='submit' name='desconectar' value='Desconectar usuario {$usuario}'/>
    </form>        
  </div>
</div>
</body>
</html>