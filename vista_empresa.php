<?php
include 'funciones_conexion.php';
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "empresa"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
}

$conn=conexion();

$rs_nombre_empresa = sacar_nombres_empresa_ofertas();

$opcion= getParameter( 'radio');



$id_usuario = $_SESSION['id_user'];
$sql_id_empresa = "SELECT id_empresa FROM empresas WHERE id_usuario=$id_usuario";
if($rs_id = $conn->query($sql_id_empresa)){

$id_empresa_lista = $rs_id->fetch_assoc();

}

$id_empresa = $id_empresa_lista['id_empresa'];

$rs = sacar_ofertas_empresa($id_empresa);
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

    <title>Empresa</title>
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
      <a href="logout.php" class="btn btn-danger px-4">Salir</a>
    </li>
  </ul>
      </div>
  </nav>

  <!-- de que se trata la página  -->
  <div class="px-3 py-3 pt-md-3 pb-md-1 text-center text-uppercase">
    <h1 >Tus ofertas creadas</h1>
    <a href="crear_oferta.php" class="btn btn-success px-2">Crear una nueva oferta</a>
  </div>

  <div class="row justify-content-around">


      <div class="col-md-8 justify-content-end">
    <?php   $datos = $rs->fetch_assoc();
    while($datos) {
    ?>

  <div class="card mb-3 container-md bg-light   mt-5 border-light" >

    <div class="card-body">
      <h4 class="card-header"><?=$datos['titulo_oferta'];?>  </h4>
      <div class="d-flex ">
      <img src="img/oferta-empleo.jpg" alt="bmw" width="50" height="50" class="d-inline-block m-2">
      <p class="card-text m-2"><?=$datos['oferta']; ?></p>     </div>
  <ul >
      <li class=" list-inline-item card-text"><small class="text-muted align-bottom">Salario: <?=$datos['salario'];?>€</small></li><br>
      <li class=" list-inline-item card-text"><small class="text-muted align-bottom">Categoria: <?=$datos['categoria'];?></small></li><br>
      <li class=" list-inline-item card-text"><small class="text-muted align-bottom"><?=$datos['ciudad'];?></small></li>
      <li class=" list-inline-item card-text"><small class="text-muted align-bottom"><?=$datos['fecha'];?></small></li>
<p> </p>
    <a style="margin-top: 3%;"  href="acciones_empresa.php?id_oferta=<?=$datos['id_oferta'];?>" ><button class="btn btn-outline-danger">Borrar oferta</button></a>
    <a href="candidatos_empresa.php" class="btn  btn-outline-primary">Ver Candidatos</a>

    </div>
  </div>

<?php

$datos = $rs->fetch_assoc();





}
$rs->free();?>

   </div>
  </div>
<p class="pb-md-5"></p>
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
    © 2020 Copyright:
    <a class="text-white" href="https://youtu.be/dQw4w9WgXcQ">FindJobs.com</a>
  </div>

</footer>


    <!-- Javascript -->

    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
