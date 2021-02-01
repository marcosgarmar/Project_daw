<?php
include 'funciones_conexion.php';
// Comprobacion de session
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "cliente"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
}
$conn = conexion();

$rs_nombre_empresa = sacar_nombres_empresa_ofertas();
$rs_categorias = sacar_categorias();
$rs_sacar_nombre_empresa = sacar_nombres_empresa();

if(isset($_POST['btn_filtrar'])){
  $salario = $_POST['salario'];
  $categoria = $_POST['categoria'];
  $empresa= $_POST['empresas'];
  $empresa = sacar_id_emp_con_nombre($empresa);

  $rs = sacar_ofertas_con_filtro($salario,$categoria,$empresa);
}else {
  $rs = sacar_ofertas();
}

$id_usuario = $_SESSION['id_user'];
$sql_id_dem = "SELECT id_demandante FROM demandante WHERE id_usuario=$id_usuario";
if($rs_id = $conn->query($sql_id_dem)){
  $rs_id = $rs_id->fetch_assoc();
}
$id_dem = $rs_id['id_demandante'];
$_SESSION['id_dem'] = $id_dem;
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="css/bootstrap.css" rel="stylesheet" >
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
            <a class="nav-link " aria-current="page" href="vista_usuario.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="mis_candidaturas.php">Mis candidaturas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="ver_perfil_usuario.php">Ver mi Perfil</a>
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

            <!-- Carrusel -->
          <?php include 'Carrusel.html'; ?>

          <div class="row justify-content-around">
          <!--FIlTROS-->
          <?php include 'filtros.php'; ?>


          <!--OFERTAS-->
          <div class="col-md-8 justify-content-end">

        <?php   $datos = $rs->fetch_assoc();
        while($datos) {
          while($nombre_empresa = $rs_nombre_empresa->fetch_assoc()){
          if($datos['id_empresa'] == $nombre_empresa['id_empresa']){?>

          <div class="card mb-3 container-md bg-light   mt-5 border-light" >

            <div class="card-body">
              <h4 class="card-header"><?=$datos['titulo_oferta'];?> / <?=$nombre_empresa['nombre_usuario'];?>  </h4>
              <div class="d-flex ">
              <img src="img/oferta-empleo.jpg" alt="bmw" width="50" height="50" class="d-inline-block m-2">
              <p class="card-text m-2"><?=$datos['oferta']; ?></p>     </div>
          <ul >
              <li class=" list-inline-item card-text"><small class="text-muted align-bottom">Salario: <?=$datos['salario'];?>€</small></li><br>
              <li class=" list-inline-item card-text"><small class="text-muted align-bottom">Categoria: <?=$datos['categoria'];?></small></li><br>
              <li class=" list-inline-item card-text"><small class="text-muted align-bottom"><?=$datos['ciudad'];?></small></li>
              <li class=" list-inline-item card-text"><small class="text-muted align-bottom"><?=$datos['fecha'];?></small></li>
          </ul>
        <a href="acciones_usuario.php?id_oferta=<?=$datos['id_oferta'];?>&id_dem=<?=$id_dem;?>&id_emp=<?=$datos['id_empresa'];?>&titulo=<?=$datos['titulo_oferta'];?>" ><button class="btn btn-outline-primary">Inscribirme</button></a>
        <a href="opiniones_empresa_users.php?id_empresa1=<?=$datos['id_empresa'];?>" ><button class="btn btn-outline-primary">Ver opiniones</button></a>
            </div>
          </div>
          <?php  $datos = $rs->fetch_assoc();
        }}      $nombre_empresa = $rs_nombre_empresa->fetch_assoc();
        }  $rs->free();
        ?>


           </div>
          </div>
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
