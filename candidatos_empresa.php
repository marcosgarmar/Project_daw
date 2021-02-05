<?php
include 'funciones_conexion.php';
session_start();
$conn = conexion();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "empresa"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
}

$id_user = $_SESSION['id_user'];
// Sacamos el id_empresa con la funcion.
$id_emp = sacar_id_emp($id_user);

//Para sacar los candidatos
$rs_candidatos = $conn->query("select id_usuario,demandante.nombre,demandante.email,inscritos.titulo_oferta from demandante,inscritos where  inscritos.id_dem = demandante.id_demandante and inscritos.id_emp = '$id_emp'");
if(!$rs_candidatos){
die("Error en procesar la consulta");
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
    <li class="nav-item me-2 p-1 border border-dark rounded">
    Hola&nbsp;<?=ucwords($_SESSION['nombre']) ;?>
    </li>
    <li class="nav-item">
      <a href="logout.php" class="btn btn-danger px-4">Salir</a>
    </li>
  </ul>
      </div>
  </nav>

  <!-- de que se trata la página  -->
  <div class="ofertas-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
    <main class="container text-center ">
      <h1>Candidatos de tus ofertas</h1><br>
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Correo</th>
        <th scope="col">Oferta aplicada</th>
        <th scope="col"></th>
      </tr>

    </thead>
    <tbody>
      <?php $i=1;
      while($datos = $rs_candidatos->fetch_assoc()){   ?>
      <tr>
        <td><?=$i;$i+=1;?></td>
        <td><?=$datos['nombre'] ;?></td>
        <td><?=$datos['email'] ;?></td>
        <td><?=$datos['titulo_oferta'] ;?></td>
        <td><button  type="submit" class="btn btn-success">Preseleccionar</button>
          <a href="ver_perfil_candidato.php?id_user=<?=$datos['id_usuario'];?>" class="btn btn-primary">Ver Perfil</a></td>
      </tr>
        <?php
      } ?>

    </tbody>
  </table>
  <hr>
</main>
</div>
  <!-- eliminar por con el id  -->
  <br><br><br><br><br><br><br><br>
<p class="pb-md-5"></p>
<!-- FOOTER -->
  <footer class="text-center text-lg-start shadow" style="background-color: #D1EAFC;">

  <div class="container p-4">

    <div class="row">

      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Footer Content</h5>

        <p>
          EncuentraJob es un trabajo final de la asignatura Diseño de aplicaciones Web, es un portal de empleo, donde encuentras las ofertas de trabajo y poder inscribirte
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
    <a class="text-white" href="https://youtu.be/dQw4w9WgXcQ">EncuentraJobs.com</a>
  </div>

</footer>
    <!-- Javascript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
