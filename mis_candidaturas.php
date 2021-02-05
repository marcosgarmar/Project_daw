<?php
include 'funciones_conexion.php';
include 'confirmar_accion.js';
$conn = conexion();
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "cliente"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
}
$id_dem = $_SESSION['id_dem'];

$sql_oferta = "select inscritos.id_dem,ofertas.id_empresa,ofertas.id_oferta,ofertas.titulo_oferta,oferta,ciudad,categoria,salario
from ofertas,inscritos
where ofertas.id_oferta = inscritos.id_oferta AND inscritos.id_dem='$id_dem'";
if($rs_oferta = $conn->query($sql_oferta)){
  if($rs_oferta->num_rows<0){
  die("Error en sacar los datos de la DB");
  }
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
    <link href="estilo_mis_ofertas.css" rel="stylesheet">
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />

    <title>Mis ofertas</title>
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
            <a class="nav-link " aria-current="page" href="vista_usuario.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="mis_candidaturas.php">Mis candidaturas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ver_perfil_usuario.php">Ver mi Perfil</a>
          </li>
        </ul>
      </div>

        <ul class="navbar-nav ">
          <li class="nav-item me-2 p-1 border border-dark rounded">
          Hola&nbsp;<?=ucwords($_SESSION['nombre']) ;?>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="btn btn-danger px-4">Salir</a>
          </li>
        </ul>
      </div>

  </nav>


<!-- El cuerpo -->
  <div class="ofertas-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <h1 class="display-4">Tus ofertas inscritas</h1>
    <p class="lead">Aquí encontrarás las ofertas que te han interesado.</p>
  </div>
  <main class="container container-mis ">
  <div class="row row-cols-1 row-cols-md-2 mb-3 text-center">

    <?php

       while($tabla_oferta = $rs_oferta->fetch_assoc()) { ?>
    <div class="col">
      <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 fw-normal"><?=$tabla_oferta['titulo_oferta'];?></h4>
      </div>
      <div class="card-body">
        <p>
            <?=$tabla_oferta['ciudad'].'<br>'.$tabla_oferta['salario'].'€<br>'.$tabla_oferta['categoria']; ?><br>
        </p>
        <a href="acciones_usuario.php?borrar_oferta_usuario=<?=$tabla_oferta['id_oferta'];?>&id_dem=<?=$tabla_oferta['id_dem'];?>" onclick="return confirmar()"><button type="button" class="w-50 btn btn-lg btn-outline-danger">Quitar oferta</button></a>
      </div>
    </div>
    </div>
  <?php
}
?>



  </div>
</main>
<br><br><br><br><br><br><br>
<!-- FOOTER -->
  <footer class="bottom text-center text-lg-start shadow" style="background-color: #D1EAFC;">

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
    © 2020 Copyright:
    <a class="text-white" href="https://youtu.be/dQw4w9WgXcQ">FindJobs.com</a>
  </div>

</footer>


    <!-- Javascript -->

    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
