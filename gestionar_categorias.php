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



if(isset($_POST['btn_crear'])){


  $categoria = htmlentities(mysqli_real_escape_string($conn,$_POST['categoria']));

$sql_reg = "INSERT INTO categorias(nombre_categoria) VALUES('$categoria')";

  $rs_dem = $conn->query($sql_reg);


}
$rs_categorias = gestionar_categorias();


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
          <a class="nav-link " aria-current="page" href="vista_Admin.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">Gestionar categorias</a>
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
<div class="ofertas-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <main class="container text-center ">
    <h1>Administracion de Categorias</h1><br>

    <h2>Crear nueva  Categoria  </h2>

<form  class="card-body form-group"  method="post">
    <input class="form-control"  placeholder="Nueva categoria" type="text" name="categoria" >
    <input style="margin-top: 3%;" type="submit" class="btn btn-outline-success" value="Crear" name="btn_crear">

</form>

<table class="table table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>

    </tr>

  </thead>
  <tbody>
    <?php $i=1;
    while ($datos = $rs_categorias->fetch_assoc()) {?>
    <tr>
      <td><?=$datos['id_categoria'];?></td>
      <td><?=$datos['nombre_categoria'];?></td>
     <td>
  <a href="acciones_admin.php?borrar_id_categoria=<?=$datos['id_categoria'];?>" onclick="return confirmar()" class="btn btn-danger">Borrar</a></td>
  </tr>
    <?php } ?>

  </tbody>
</table>
<hr>
</main>
</div>

<br><br><br><br><br><br><br><br>



<!-- FOOTER -->
</div>
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
    © 2020 Copyright: Fahd & Marcos,
    <a class="text-muted" style="text-decoration:none">EncuentraJob</a>
  </div>

</footer>



    <!-- Javascript -->
    <script src="js/bootstrap.min.js"></script>


  </body>
</html>
