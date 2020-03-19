<?php
    // La función PHP session_start crea una sesión o reanuda la actual basada 
    // en un identificador de sesión pasado mediante una petición GET o POST, 
    // o pasado mediante una cookie. SIEMPRE AL PRINCIPIO, ANTES DE HTML
    session_start();  
    
    // VARIABLES DE CONEXIÓN ************
    $servername = "localhost";
    $database = "CrimeBook";
    $username = "cb";
    $pwd = "1234";
    // **********************************
    
    // Crear la conexión
    $conn = mysqli_connect($servername, $username, $pwd, $database);
    // Comprobar la conexión
    if (!$conn) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    if ( isset( $_POST['username'] ) && isset( $_POST['contrasenya'] ) ){
        // Enviar a la página pagina2adm.php si se establece la sesión de usuario
        if(isset($_SESSION["sesion"])){
            header("Location: pagina2adm.php");
        }

    // mysqli::real_escape_string -- mysqli_real_escape_string — Escapa los 
    // caracteres especiales de una cadena para usarla en una sentencia SQL, 
    // tomando en cuenta el conjunto de caracteres actual de la conexión
    $usuario = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['contrasenya']);
    $error = '';

    // MD5 Algoritmo de reducción criptográfico de 128 bits. La codificación 
    // del MD5 de 128 bits es representada típicamente como un número de 
    // 32 símbolos hexadecimales. Tiene problemas de seguridad.
    $md5_pass = ($password);

    // Consulta para comprobar si concuerda el nombre de usuario y el 
    // password con lo almacenado en la base de datos.
    $sql = "SELECT username, contrasenya FROM usuarios WHERE username = '$usuario' "
            . "AND contrasenya = '$md5_pass'";
    $result=$conn->query($sql);
    $rows = $result->num_rows;

    // si el usuario existe en la base de datos creamos la variable de 
    // sesión y vamos a la página de acceso
    if($rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["sesion"] = $row['username'];           
        header("location: pagina2adm.php");
    }else {
        $error = "Último nombre o password de acceso incorrectos";
        session_destroy();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="estilos.css">
  <title>Crimebook</title>
</head>
<body>
  <div class="letradefault">
<div style="margin-top:8vh">

<br><br>
<p id="bienvenidos">BIENVENIDOS AL</p>
<p id="crimebook"> CRIMEBOOK</p>

<!-- Boton que es -->

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto; margin-top:2vh" class="botonquees"><span>¿QUÉ ES?</span></button>

<div id="id01" class="modal">

  <form class="modal-content animate" action="action_form.php" method="post">


    <div class="container">
      <div class="letradefault">

        <h2 id="queescrimebook" > ¿QUE ES? </h2>
        <hr id="linea">
        <div id="explicacioncrimebook">

        <p>Es un proyecto del tema 6 de DWES</p>
        <p>Modalidad del juego: scape</p>
        <p>Integrantes del grupo: </p>
        <p>Mikel Azpilicueta</p>
        <p>Iñaki Irisarri</p>
        <p>Carlos Larrondo</p>
        <p>Luis Sampayo</p>

        </div>
        <hr id="linea">
      </div>
    </div>
  </form>
</div>
<script>
// Get the modal
var modal, modal2;
modal = document.getElementById('id01');
modal2 = document.getElementById("myForm");
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal ||  event.target == modal2) {
        modal.style.display = "none";
        closeForm();
    }
}

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<!-- ------------- -->
</div>

<br><br><br><br>
<div class="logo">
  <a href="pagina 2.html" title="home page" target="_blank">
      <img src="img/logo.png" style="width:100%"></a>
</div>
<button class="botonadmin" onclick="openForm()"><span>ADMIN</span></button>

<div class="form-popup" id="myForm">
    
  <!-- modifico el form action para chequear el usuario y contraseña -->
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-container" method="POST">

	<h2> ADMINISTRACI&Oacute;N </h2>
    <input type="text" placeholder="Introduce el usuario" name="username" required>

    <input type="password" placeholder="Introduce la contraseña" name="contrasenya" required>
    
    <button type="submit" class="btn">Login</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
      <div style = "font-size:16px; color:#cc0000; ">
        <?php 
            // Si hay algún error, como por ejemplo usuario o contraseña lo muestro
            // en el propio cuadro de login
            echo isset($error) ? $error : '' ;
            // Como el error lo muestro en la pantalla del login
            // hago que se vuelva a mostrar la ventana usuario/contraseña
            if (isset($error)){            
                echo '<script type="text/javascript">openForm(); </script>';
            }
        ?>
      </div>
  </form>

</div>
  </div>
</body>
</html>
