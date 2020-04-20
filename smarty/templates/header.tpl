<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : PROYECTO Programación orientada a objetos en PHP -->
<!-- juego crimebook -->
<html>
  <head>
    <title>Crimebook - {$pageTitle}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="UTF-8" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/estilos.css" />
  </head>
  <body>
    <nav>
      <div class="topnav" id="myTopnav" style="margin: 0 0 0 0;">
        <a href="listado-de-juegos.php"   {if $activePage == 'listado-de-juegos'} class="active" {/if}>Listado de juegos</a>
        <a href="listado-de-partidas.php" {if $activePage == 'listado-de-partidas'} class="active" {/if}>Listado de partidas</a>
        <a href="listado-de-pruebas.php" {if $activePage == 'listado-de-pruebas'} class="active" {/if}>Listado de pruebas</a>
        <a href="juego.php" {if $activePage == 'juego'} class="active" {/if}>Nuevo juego</a>
        <a href="prueba.php" {if $activePage == 'prueba'} class="active" {/if}>Nueva prueba</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <i class="fa fa-bars"></i>
        </a>
      </div>
      <div class="userActions">
        <span><i class="fa fa-user" aria-hidden="true"></i> {$usuario}</span>
        <a href="logout.php">
          <i class="fa fa-power-off" aria-hidden="true"></i>

        </a>
      </div>
    </nav>
    {if $alertMessage['isMessage']}
    <div class="alertMessage {$alertMessage['type']}">
      <p>{$alertMessage['message']}</p>
    </div>
    {/if}
    