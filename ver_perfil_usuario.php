<?php
session_start();
if(isset($_SESSION['rol'])){
  if($_SESSION['rol'] != "cliente"){
    header('Location:login.php');
  }
}else {
  header('Location:login.php');
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
            <a class="nav-link " aria-current="page" href="vista_usuario.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Noticias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="mis_candidaturas.php">Mis candidaturas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Ver mi Perfil</a>
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

        <div class="container text-center">

            <br>
              <img src="img/perfil.png" alt="aboutme" width="110" height="110">
          <section class="row">
            <h3>Marcos </h3><br>
          <article style="margin-left: 12%; margin-right: 15%" class="col-sm-9 col-md-9 col-lg-9">
            <h6><small class="text-muted align-bottom">Datos Básicos</small></h6><br>
                <table class="table table-striped">
                    <tr><th>Nombre: Marcos</th></tr>
                  <tr><th>Nombre de usuario: Marcos2020</th></tr>
                  <tr><th>Correo electrónico: Marcos@correo.es</th></tr>
                  <tr><th>Fecha de nacimiento: 1990/12/01</th></tr>
                </table>
        </article>
        </section>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Ver Currículum
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Curriclum Vitae</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center">
        <img src="img/perfil.png" alt="aboutme" width="110" height="110"><br>
        <section class="row">
          <h3>Marcos </h3><br>
        <article style="margin-left: 12%; margin-right: 15%" class="col-sm-9 col-md-9 col-lg-9">
          <h6>&nbsp;</h6><br>
              <div class="border border-dark">
                <span class="fw-bold">Información básica</span><hr>
                <p><span class="fw-bold">Nombre:</span> Marcos</p>
                <p><span class="fw-bold">Correo:</span> Marcos@correo.es</p>
                <p><span class="fw-bold">Edad:</span> 30</p><hr>
                <p><span class="fw-bold">Formación Profesional</span></p><hr>
                 <p>Titulado en Ing-Informática<br>
                Master en ...</p><hr>
                <p><span class="fw-bold">Datos de Interés</span></p><hr>
                  <p>Soy muy Dinámico, amable y Hablo Inglés muy bien...</p>
              </div>
      </article>
      </section>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <!-- Button trigger modal -->

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop_edit">
  Editar
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop_edit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_edit" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel_edit">Editar datos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="text-center">
          <input type="email" name="correo_nuevo"  placeholder="Tu email" required>
          <input type="text" name="edad_nueva"  placeholder="Tu edad" required><br><br>
          Formación Profesional<br>
          <textarea rows="4" cols="50">
            Titulado en Ing-Informática
            Master en ...
          </textarea ><br>
          Datos de interés<br>
          <textarea rows="4" cols="50">
            Soy muy Dinámico, amable y .....
          </textarea><br>
          <input class="btn btn-success" type="submit" value="guardar">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
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