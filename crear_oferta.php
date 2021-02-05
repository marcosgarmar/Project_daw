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


$rs_categorias = sacar_categorias();


if(isset($_POST['btn_oferta'])){
  $titulo = htmlentities(mysqli_real_escape_string($conn,$_POST['titulo']));
  $texto = htmlentities(mysqli_real_escape_string($conn,$_POST['texto']));
  $salario = htmlentities(mysqli_real_escape_string($conn,$_POST['salario']));
  $provincia = htmlentities(mysqli_real_escape_string($conn,$_POST['provincia']));
  $categoria_oferta = htmlentities(mysqli_real_escape_string($conn,$_POST['categoria_oferta']));

$id = $_SESSION['id_user'] ;


$sql_aux = "SELECT * FROM empresas WHERE id_usuario = '$id'  ";

$rs_aux = $conn->query($sql_aux);
$id_emp = $rs_aux->fetch_assoc();
$id_definitivo = $id_emp['id_empresa'];

  $sql_reg = "INSERT into ofertas(id_empresa,titulo_oferta,oferta,ciudad,categoria,salario) values('$id_definitivo','$titulo','$texto','$provincia','$categoria_oferta','$salario')";
  $rs_reg = $conn->query($sql_reg);

}


?>



<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" >
    <link href="fontawesome/css/all.min.css" rel="stylesheet" />

    <title>Nueva oferta</title>
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
  <div class="px-3 py-3 pt-md-3 pb-md-1 text-center text-uppercase">
    <h1 >Crear nuevas ofertas</h1>
    <p class="lead text-center">Hay que rellenar todo el formulario</p>
  </div>

  <!-- formulario -->

  <div class="ofertas-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
  <div style="margin-left: 25%; margin-right: 25%;" class="card">
    <div class="card">
        <form class="card-body form-group" method="post">

          <input style="margin-top: 3%; " id="titulo" name="titulo" type="text" placeholder="Titulo" class="form-control" maxlength="19" required>
          <textarea style="margin-top: 3%; "  class="form-control" rows="5" type="text" name="texto" id="comment"></textarea>
          <input style="margin-top: 3%; " id="salario" name="salario" type="number" placeholder="Salario estimado" class="form-control" maxlength="19" required>


              <select class="form-control" name="provincia" style="margin-top: 3%;" required>
                <option selected=true disabled="disabled">Elije una provincia</option>
                <option value='alava'>Álava</option>
                <option value='albacete'>Albacete</option>
                <option value='alicante'>Alicante/Alacant</option>
                <option value='almeria'>Almería</option>
                <option value='asturias'>Asturias</option>
                <option value='avila'>Ávila</option>
                <option value='badajoz'>Badajoz</option>
                <option value='barcelona'>Barcelona</option>
                <option value='burgos'>Burgos</option>
                <option value='caceres'>Cáceres</option>
                <option value='cadiz'>Cádiz</option>
                <option value='cantabria'>Cantabria</option>
                <option value='castellon'>Castellón/Castelló</option>
                <option value='ceuta'>Ceuta</option>
                <option value='ciudadreal'>Ciudad Real</option>
                <option value='cordoba'>Córdoba</option>
                <option value='cuenca'>Cuenca</option>
                <option value='girona'>Girona</option>
                <option value='laspalmas'>Las Palmas</option>
                <option value='granada'>Granada</option>
                <option value='guadalajara'>Guadalajara</option>
                <option value='guipuzcoa'>Guipúzcoa</option>
                <option value='huelva'>Huelva</option>
                <option value='huesca'>Huesca</option>
                <option value='illesbalears'>Illes Balears</option>
                <option value='jaen'>Jaén</option>
                <option value='acoruña'>A Coruña</option>
                <option value='larioja'>La Rioja</option>
                <option value='leon'>León</option>
                <option value='lleida'>Lleida</option>
                <option value='lugo'>Lugo</option>
                <option value='madrid'>Madrid</option>
                <option value='malaga'>Málaga</option>
                <option value='melilla'>Melilla</option>
                <option value='murcia'>Murcia</option>
                <option value='navarra'>Navarra</option>
                <option value='ourense'>Ourense</option>
                <option value='palencia'>Palencia</option>
                <option value='pontevedra'>Pontevedra</option>
                <option value='salamanca'>Salamanca</option>
                <option value='segovia'>Segovia</option>
                <option value='sevilla'>Sevilla</option>
                <option value='soria'>Soria</option>
                <option value='tarragona'>Tarragona</option>
                <option value='santacruztenerife'>Santa Cruz de Tenerife</option>
                <option value='teruel'>Teruel</option>
                <option value='toledo'>Toledo</option>
                <option value='valencia'>Valencia/Valéncia</option>
                <option value='valladolid'>Valladolid</option>
                <option value='vizcaya'>Vizcaya</option>
                <option value='zamora'>Zamora</option>
                <option value='zaragoza'>Zaragoza</option>
            </select>

              <select class="form-control" name="categoria_oferta" style="margin-top: 3%;" required>
                <option selected=true disabled="disabled">Categoría</option>
                <?php

                $categorias = $rs_categorias->fetch_assoc();

                while($categorias) {
                    $categoria= $categorias['nombre_categoria'];
                  ?>
                <option> <?=$categoria?></option>
              <?php
              $categorias = $rs_categorias->fetch_assoc();

              } $rs_categorias->free();//rgi?>
            </select>

              <div class="text-center">
                <input style="margin-top: 3%;" type="submit" class="btn btn-outline-success" value="Crear" name="btn_oferta">
              </div>

        </form>
    </div>
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
