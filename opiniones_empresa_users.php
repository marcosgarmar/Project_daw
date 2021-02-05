<?php

include 'funciones_conexion.php';
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "cliente
  "){
  }
}else {
  header('Location:login.php');
}

$conn = conexion();

$id_emp = $_GET['id_empresa1'];


if(isset($_POST['btn_opinar'])){


$id = $_SESSION['id_user'];

$sql_id_dem = "SELECT * FROM demandante WHERE id_usuario = '$id' ";

if($rs_2 = $conn->query($sql_id_dem)){
  if($rs_2->num_rows<0){
//  $mensaje = $rs['salario'];
  die("Error en sacar los datos de la DB");
}

 $datos1 = $rs_2->fetch_assoc();

  $titulo = htmlentities(mysqli_real_escape_string($conn,$_POST['titulo']));
  $texto = htmlentities(mysqli_real_escape_string($conn,$_POST['texto']));
  $sql_reg = "INSERT INTO valoraciones(id_demandante,id_empresa,titulo_valoracion,texto_valoracion) VALUES('$datos1[id_demandante]','$id_emp','$titulo','$texto')";
  $rs_dem = $conn->query($sql_reg);

}
}

$sql = "SELECT * FROM valoraciones Val INNER JOIN  demandante De ON Val.id_demandante = De.id_demandante
INNER JOIN  usuarios Ur ON De.id_usuario = Ur.id_usuario
  WHERE Val.id_empresa ='$id_emp'";
if($rs = $conn->query($sql)){
  if($rs->num_rows<0){
//  $mensaje = $rs['salario'];
  die("Error en sacar los datos de la DB");
}
}


?>

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
            <li class="nav-item me-2 p-1 border border-dark rounded">
            Hola&nbsp;<?=ucwords($_SESSION['nombre']) ;?>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="btn btn-danger px-4">Salir</a>
            </li>
          </ul>
        </div>
    </nav>


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



  <div class="col-md-12 center justify-content-center ">

    <div class="card mb-3 container-md bg-light   mt-5 border-light" >
    <div class="card-body">
      <h3 class="card-header">Deja tu valoracion sobre esta empresa</h3>
      <div class="form-group">
        <form class="card-body form-group"  method="post">

  <h5 class="card-header">Titulo</h5>
  <input class="form-control" placeholder="Titulo" type="text" name="titulo" required> <br>
  <h5 class="card-header">Descripcion</h5>
  <textarea class="form-control" rows="5" type="text" name="texto" id="comment"></textarea>
  <input style="margin-top: 3%;" type="submit" class="btn btn-outline-success" value="Opinar" name="btn_opinar">
</form>
</div>
    </div>
    </div>






    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
