<?php
include 'funciones_conexion.php';
$conn = conexion();
if(isset($_POST['btn_registrar'])){
  $nombre = mysqli_real_escape_string($conn,$_POST['nombre']);
  $email = mysqli_real_escape_string($conn,$_POST['email']);
  $dni = mysqli_real_escape_string($conn,$_POST['dni']);
  $pass = mysqli_real_escape_string($conn,$_POST['pass']);
  $fecha_nac = $_POST['fecha_nac'];

 $sql_reg = "insert into usuarios(rol,nombre_usuario,email,password) values('cliente','$nombre','$email','$pass')";

  $verificar_si_existe = si_existe('id_usuario','usuarios','email',$email);
  if($verificar_si_existe == true){
    echo'<script>window.alert(\'Este usuario ya existe\');</script>';
    echo '<script>window.location=\'login.php\';</script>';
  }else {
    $rs_reg = $conn->query($sql_reg);
    if($rs_reg){
      $sql_id_usuario = "select id_usuario from usuarios where email='$email'";
      $rs_id = $conn->query($sql_id_usuario);
      $rs_id = $rs_id->fetch_assoc();
      $id_usuario = $rs_id['id_usuario'];
      $sql_tabla_dem = "insert into demandante(id_usuario,nombre,email,dni,fecha_nac) values('$id_usuario','$nombre','$email','$dni','$fecha_nac')";
      $rs_dem = $conn->query($sql_tabla_dem);
      if($rs_dem){
      echo'<script>window.alert(\'Usuario registrado correctamente\');</script>';
      echo '<script>window.location=\'login.php\';</script>';
      }
    }
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

    <div class="collapse navbar-collapse " id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Empresas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="#">Noticias</a>
            </li>
        </ul>
      </div>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle px-4" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Acceder</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown01">
              <li><a class="dropdown-item" href="login.html">Entrar</a></li>
              <li><a class="dropdown-item" href="elegir_perfil.html">Registrarse</a></li>

            </ul>
          </li>
        </ul>
   </div>
   </nav>
<!--  Cuerpo  -->


  <div class="ofertas-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
  <div style="margin-left: 25%; margin-right: 25%;" class="card">
    <div class="card">
        <form class="card-body form-group"  method="post" >
            <h1 class="text-center">Registrarse</h1>

              <input style="margin-top: 3%; " id="fname" name="nombre" type="text" placeholder="Nombre completo" class="form-control" maxlength="19" required>
              <input style="margin-top: 3%;" id="fnamee" name="email" type="email" placeholder="Correo electronico" class="form-control" maxlength="20" required>
              <input class="form-control" name="pass" placeholder="contraseña" type="text" style="margin-top: 3%;" maxlength="13" required>
              <input class="form-control" placeholder="Dni" type="text" name="dni" style="margin-top: 3%;" maxlength="10" required> <br>

              <div class="input-group mb-3" >
                <div class="input-group-prepend">
                  <label class="input-group-text" >Lo que me interesa es</label>
                </div>
                <select class="custom-select" id="inputGroupSelect01">
                  <option selected>Cocinero</option>
                  <option value="1">Jardinero</option>
                  <option value="3">Mozo de almacen</option>
                  <option value="2">Responsable de empresa</option>
                </select>
              </div>
              <div class="input-group mb-1">
              <label class="input-group-text">Fecha de nacimiento</label>
              <input type="date" name="fecha_nac" value="1995-01-01" min="1900-01-01" max="2002-01-01" required><br>
             </div>
              <div class="text-center">
              <input style="margin-top: 3%;" type="submit" class="btn btn-outline-success" value="Registrarme" name="btn_registrar">
              </div>
        </form>
    </div>
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
