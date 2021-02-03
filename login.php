<?php
include 'funciones_conexion.php';
session_start();
if(isset($_SESSION['rol'])){
  comprobar_sesion($_SESSION['rol']);
}

$mensaje ='';
$conn = conexion();
if(isset($_POST['login'])){
$email = mysqli_real_escape_string($conn,htmlentities($_POST['email']));
$pass = mysqli_real_escape_string($conn,htmlentities($_POST['pass']));
  $sql = "SELECT * FROM usuarios WHERE email ='$email' and password = '$pass'";

  if($rs = $conn->query($sql)){
    if($rs->num_rows>0){
  //  echo "<script>window.alert('Logeado correctamente');</script>";
    $rs = $rs->fetch_assoc();
    $rol = $rs['rol'];
    $nombre = $rs['nombre_usuario'];
    $id = $rs['id_usuario'];
    $_SESSION['nombre'] = $nombre;
    $_SESSION['id_user'] = $id;
    $_SESSION['rol'] = $rol;
    comprobar_sesion($rol);
    } else {
      $mensaje = 'Usuario no encontrado';
    }
  }
}

$conn->close();
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="login.css" rel="stylesheet" >

    <title>Login</title>
  </head>

  <body style="background-color: #f2f2f2;">

    <!-- Barra NavBar -->

  <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #D1EAFC;">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Empresas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">Noticias</a>
          </li>
      </ul>
    </div>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle px-4" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Acceder</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="login.php">Entrar</a></li>
            <li><a class="dropdown-item" href="elegir_perfil.html">Registrarse</a></li>
          </ul>
        </li>
      </ul>
 </div>
  </nav>
<!-- Recuadro de login -->
<div class="wrapperlog fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/login.png" id="icon" alt="User Icon" style= "width: 20%;"/>
    </div>
    <p><?php echo $mensaje; ?></p>
    <!-- Login Form -->
    <form method="post">
      <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" maxlength="15" required>
      <input type="password" id="password" class="fadeIn third" name="pass" maxlength="12" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
    </form>
  </div>
</div>

<!-- FOOTER -->
<footer class="fixed-bottom text-center text-lg-start shadow" style="background-color: #D1EAFC;">

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2020 Copyright: Fahd & Marcos,
    <a class="text-muted">EncuentraJob</a>
  </div>

</footer>


    <!-- Javascript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
