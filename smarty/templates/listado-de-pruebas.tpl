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
	 <a href="listado-de-pruebas.php" class="active">Listado de pruebas</a>
	 <a href="Pagina4.html">Partida nueva</a>
	 <a href="Pagina5.html">Juego Nuevo/editar juego</a>
	 <a href="prueba.php">Prueba Nueva/ Editar prueba</a>
	 <a href="Pagina7.html">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>

<h2 align="center">Pruebas</h2>
<form id="pruebas" method="post" action="borrar-pruebas.php">
	<table align="center">
		<tr>
			<th>Seleccionar</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Tipo</th>
			<th>Usuario que la creó</th>
			<th></th>
		</tr>
					
				
		{foreach from=$pruebas item=prueba}

		<tr>
			<td>    
					<input type="checkbox" name="pruebas[]" value="{$prueba->getIdPrueba}">       
			</td>     
					
			<td>{$prueba->getNombrePrueba()}</td>
			<td>{$prueba->getdescBrevePrueba()}</td>
			<td>{$prueba->getTipoPrueba()}</td>
			<td>{$prueba->getUsernamePrueba()}</td>
			<td>
				<div class="actions">
					<a href="prueba.php?edit={$prueba->getIdPrueba()}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<a href="borrar-pruebas.php?id={$prueba->getIdPrueba()}"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
				</div>
			</td>              
		</tr>
					
		{/foreach}
		

	</table>

	<br>
	<div align="center">
		<a href="prueba.php" class="button">Crear prueba</a> 
		<button class="button">Duplicar prueba</button>
		<input class="button" type="submit" value="Eliminar prueba">
	</div>
</form>

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
