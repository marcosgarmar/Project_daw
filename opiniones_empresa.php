
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

$conn = conexion();


$id_emp = $_GET['id_empresa1'];


$sql = "SELECT * FROM valoraciones Val INNER JOIN  demandante De ON Val.id_demandante = De.id_demandante
INNER JOIN  usuarios Ur ON De.id_usuario = Ur.id_usuario
WHERE  Val.id_empresa ='$id_emp'";
if($rs = $conn->query($sql)){
  if($rs->num_rows<0){
//  $mensaje = $rs['salario'];
  die("Error en sacar los datos de la DB");
  }
}

$id_usuario = $_SESSION['id_user'];



?>
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


  <!-- CUERPO -->


  <div class="col-md-12 center justify-content-center">
<?php   $datos = $rs->fetch_assoc();
       while($datos) { ?>

<div class="card mb-3 container-md bg-light   mt-5 border-light" >
<div class="card-body">
  <h4 class="card-header"><?=$datos['titulo_valoracion'];?></h4>
  <ul>   <li class=" list-inline-item card-text"><small class="text-muted align-bottom"><?=$datos['nombre_usuario'];?></small></li><br>
</ul>
  <div class="d-flex ">
  <p class="card-text m-2"><?=$datos['texto_valoracion']; ?></p>     </div>
<ul >
</ul>
</div>
</div>
<?php  $datos = $rs->fetch_assoc();
}  $rs->free();
?>

</div>

<br><br><br><br><br><br><br><br><br><br><br>

  <!-- FOOTER -->  <footer class="text-center text-lg-start shadow " style="background-color: #D1EAFC;">

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
