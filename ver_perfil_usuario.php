<?php
include 'funciones_conexion.php';
$conn = conexion();
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "cliente"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
}
$id_usuario = $_SESSION['id_user'];
$sql_curriculum = "select * from demandante where id_usuario=$id_usuario";
if($rs_curriculum = $conn->query($sql_curriculum)){
  $rs_curriculum = $rs_curriculum->fetch_assoc();
}else {
  die("Error en obtener los datos necesarios");
}
$id_dem = $rs_curriculum['id_demandante'];

$post = isset($_POST['btn_guardar'])?$_POST['btn_guardar']:null;
$avatar = isset($_FILES['avatar']['tmp_name'])?$_FILES['avatar']['tmp_name']:null;

modificar_perfil_usuario($post,$avatar,$id_dem);

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
            <a class="nav-link " aria-current="page" href="vista_usuario.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="mis_candidaturas.php">Mis candidaturas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Ver mi Perfil</a>
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


        <div class="container text-center bg-white shadow mt-4">
            <br>
              <img src="img/perfil_img/<?=$rs_curriculum['avatar'];?>" alt="Avatar" width="auto" height="110">
          <section class="row">
            <h3><?=$rs_curriculum['nombre'] ;?></h3><br>
          <article  class="col-sm-9 col-md-9 col-lg-8 mx-auto">
            <h6><small class="text-muted align-bottom">Currículum vitae</small></h6><br>
                <table class="table">
                  <tr><th class="bg-secondary text-white">Informacion básica</th></tr>
                  <tr><th>Nombre de usuario: <?=$rs_curriculum['nombre'] ;?></th></tr>
                  <tr><th>Correo electrónico: <?=$rs_curriculum['email'] ;?></th></tr>
                  <tr><th>Fecha de nacimiento: <?=$rs_curriculum['fecha_nac'] ;?></th></tr>
                  <tr><th class="bg-secondary text-white">Formacion academica</th></tr>
                  <tr><th><?=nl2br($rs_curriculum['formacion_academica']); ?></th></tr>
                  <tr><th class="bg-secondary text-white">Formacion Profesional</th></tr>
                  <tr><th><?=nl2br($rs_curriculum['formacion_profesional']);?></th></tr>

                  <tr><th class="bg-secondary text-white">Datode de interés</th></tr>
                  <tr><th><?=nl2br($rs_curriculum['datos_de_interes']);?></th></tr>

                </table>
        </article>
        </section>


        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Editar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Editar Currículum</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">

                <form method="post" enctype="multipart/form-data">
                <label class="fw-bold">Cambiar el Avatar</label><br>
                <input type="file" name="avatar" accept="image/png, image/jpeg"><br><br>
                <label class="fw-bold">Formación academica</label><br>
                <textarea name="form_aca" maxlength="480" cols="50" rows="5"><?=$rs_curriculum['formacion_academica'] ;?></textarea><br>
                <label class="fw-bold">Formación profesional</label><br>
                <textarea name="form_pro" maxlength="480" cols="50" rows="5"><?=$rs_curriculum['formacion_profesional'] ;?></textarea><br>
                <label class="fw-bold">Datos de interés</label><br>
                <textarea name="dato_inter" maxlength="480" cols="50" rows="5"><?=$rs_curriculum['datos_de_interes'] ;?></textarea><br>
                <input type="submit" class="btn btn-success" name="btn_guardar" value="Guardar">
                </form>

              </div>
              <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>

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
