<?php
include 'funciones_conexion.php';
$conn = conexion();
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "empresa"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
}
if(isset($_GET['id_user'])){
$id_usuario = $_GET['id_user'];
$sql_curriculum = "select * from demandante where id_usuario=$id_usuario";
if($rs_curriculum = $conn->query($sql_curriculum)){
  $rs_curriculum = $rs_curriculum->fetch_assoc();
} else {
    die("Error en obtener los datos necesarios");
  }
} else {
  header('Location:candidatos_empresa.php');
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

    <title>Pagina de inicio</title>
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
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="vista_empresa.php">Mis ofertas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ver_perfil_empresa.php">Perfil de empresa</a>
          </li>
        </ul>
      </div>
  <ul class="navbar-nav ">
    <p class="px-2 m-1 mx-2 border border-dark"><?=$_SESSION['nombre'] ;?></p>
    <li class="nav-item">
      <a href="index.html" class="btn btn-danger px-4">Salir</a>
    </li>
  </ul>
      </div>
  </nav>

  <div class="container text-center bg-white shadow mt-4">
      <br>
        <img src="img/perfil_img/<?=$rs_curriculum['avatar'];?>" alt="Avatar" width="auto" height="110">
    <section class="row">
      <h3><?=$rs_curriculum['nombre'] ;?></h3><br>
    <article style="margin-left: 12%; margin-right: 15%" class="col-sm-9 col-md-9 col-lg-9">
      <h6><small class="text-muted align-bottom">Currículum vitae</small></h6><br>
          <table class="table">
            <tr><th class="bg-secondary text-white">Informacion básica</th></tr>
            <tr><th>Nombre de usuario: <?=$rs_curriculum['nombre'] ;?></th></tr>
            <tr><th>Correo electrónico: <?=$rs_curriculum['email'] ;?></th></tr>
            <tr><th>Fecha de nacimiento: <?=$rs_curriculum['fecha_nac'] ;?></th></tr>
            <tr><th class="bg-secondary text-white">Formacion academica</th></tr>
            <tr><th><?= $rs_curriculum['formacion_academica']; ?></th></tr>

            <tr><th class="bg-secondary text-white">Formacion Profesional</th></tr>
            <tr><th><?= $rs_curriculum['formacion_profesional'];?></th></tr>

            <tr><th class="bg-secondary text-white">Datos de interés</th></tr>
            <tr><th><?= $rs_curriculum['datos_de_interes'];?></th></tr>

          </table>
        </article>
      </section>

  </div> <!-- El div de container text-center-->


  <script>
    var myModal = document.getElementById('myModal')
    var myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', function () {
    myInput.focus()
      })
    </script>
      <br><br><br><br>




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
