
<!DOCTYPE html>
<html>
<head>
	<title>Crimebook</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>


	<div class="topnav" id="myTopnav">
	 <a href="Index.html">Listado de juegos</a>
	 <a href="Pagina2.html">Listado de partidas</a>
	 <a href="listado-de-pruebas.php">Listado de pruebas</a>
	 <a href="Pagina4.html">Partida nueva</a>
	 <a href="Pagina5.html">Juego Nuevo/editar juego</a>
	 <a href="prueba.php" class="active">Prueba Nueva/ Editar prueba</a>
	 <a href="Pagina7.html">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>

<div id="pag6" align="center"  >
    
<form action="" method="" >
<p>
	Nombre:<input type="text" name="nombre" placeholder="Introduzca el nombre" value="">
</p>
<p>
	URL:<input type="text" name="url" placeholder="Introduzca la URL" value="">
	</p>
	<p>
	Descripción breve:<textarea cols="50" rows="5" name="descripción" placeholder="Introduzca una descripción breve" ></textarea>
	</p>
	<p>
Descripción extendida/Enunciado de la prueba:<textarea cols="50" rows="10" name="DESCRIPCION" placeholder="Introduzca una descripción extensa"></textarea>
	</p>
	<p>
		Tipo:<select value="Tipo">
              
                                <option value="N">Normal</option>
				<option value="F">Final</option>
                            
				</select>
	</p>
</div>
	<div id="pag6botones" align="center">
	<button class="button">Orden</button>
	<button class="button">Respuesta/solucion</button>
</div><br>

</form>
<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Listado de Pistas</th>
	</tr>
 
	<tr>
		<td align="center"></td>
	
	</tr>
	
</table>
</form>
<br>
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

</body>
</html>
