<?php
include 'funciones_conexion.php';
include 'confirmar_accion.js';
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "admin"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
}
$conn = conexion();
if(isset($_GET['modif_id']) && isset($_GET['rol'])){
  $id_user = $_GET['modif_id'];
  $rol = $_GET['rol'];
  $sql_modif = "Select * from usuarios where id_usuario = '$id_user'";
  if($rs_modif = $conn->query($sql_modif)){
    $rs_modif = $rs_modif->fetch_assoc();
  }
  else die("Error al sacar los datos");
}

$conn = conexion();
if(isset($_POST['btn_modif'])){
  $nombre = htmlentities(mysqli_real_escape_string($conn,$_POST['nombre']));
  $pass = htmlentities(mysqli_real_escape_string($conn,$_POST['pass']));
  modificar_usuario($id_user,$rol,$nombre,$pass);
}

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />

    <title>Admin</title>
  </head>

  <body style="background-color: #f2f2f2;">

    <!-- Barra NavBar -->
  <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #D1EAFC;">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="vista_Admin.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="gestionar_categorias.php">Gestionar categorias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gestionar_usuarios.php">Gestionar usuarios</a>
        </li>
      </ul>
    </div>

      <ul class="navbar-nav">
        <li class="nav-item me-2 p-1 border border-dark rounded">
        Hola&nbsp;<?=ucwords($_SESSION['nombre']) ;?>
        </li>
        <li class="nav-item">
          <a href="logout.php" class="btn btn-danger px-4">Salir</a>
        </li>
      </ul>
    </div>

</nav>
<!-- Cuerpo -->
<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <main class="container text-center ">
    <h1>Administracion de usuarios</h1><br>
<table class="table table-bordered">
  <thead class="table-dark">
    <tr  class="text-center">
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Contraseña</th>
      <th scope="col">rol</th>
      <th scope="col">Operación</th>
    </tr>

  </thead>
  <tbody>
    <form method="post" class="form-control">

    <tr  class="text-center">
      <td>1</td>
      <td><input name="nombre" type="text" value="<?=$rs_modif['nombre_usuario'];?>" class="form-control"></td>
      <td><input  type="text" readonly value="<?=$rs_modif['email'];?>" class="form-control"></td>
      <td><input name="pass" type="text" value="<?=$rs_modif['password'];?>" class="form-control"></td>
      <td><input  type="text" readonly value="<?=$rs_modif['rol'];?>" class="form-control"></td>
     <td><input type="submit" name="btn_modif" class="btn btn-primary" value="Modificar"></td>
    </tr>
  </form>
  </tbody>
</table>
<hr>
</main>
</div>


<br><br><br><br><br><br><br><br>

<!-- FOOTER -->
  <footer class="text-center text-lg-start shadow" style="background-color: #D1EAFC;">

  <div class="container p-4">

    <div class="row">

      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer Content</h5>

        <p>
          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
          molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam
          voluptatem veniam, est atque cumque eum delectus sint!
        </p>
      </div>

      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase text-center">Links</h5>

        <ul class="list-unstyled mb-0 text-center">
          <li>
            <a href="https://www.youtube.com/watch?v=FwhKhecN-1E" ><i class="fab fa-youtube" style="font-size:25px;" ></i></a>
            <a href="https://www.instagram.com/usal" ><i class="fab fa-instagram" style="font-size:25px;" ></i></a>
          </li>

          <li>
            <a href="https://www.twitter.com/usal"><i class="fab fa-twitter" style="font-size:25px;" ></i></a>
            <a href="https://www.facebook.com/" ><i class="fab fa-facebook" style="font-size:25px;" ></i></a>
          </li>
        </ul>
      </div>
    </div>

  </div>

  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
    © 2020 Copyright: Fahd & Marcos,
    <a class="text-muted" style="text-decoration:none">EncuentraJob</a>
  </div>

</footer>


    <!-- Javascript -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
