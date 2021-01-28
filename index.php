<?php
include 'funciones_conexion.php';
$conn = conexion();

$sql = "SELECT * FROM ofertas";
if($rs = $conn->query($sql)){
  if($rs->num_rows<0){
//  $mensaje = $rs['salario'];
  die("Error en sacar los datos de la DB");
  }
}
$opcion= getParameter( 'radio');

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

    <title>inicio</title>
  </head>

  <body style="background-color: #f2f2f2;">

    <!-- Barra NavBar -->

  <nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #D1EAFC;">
    <div class="container-fluid">

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"  data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav" >
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
          <a class="nav-link dropdown-toggle px-4" href="#" data-bs-toggle="dropdown" aria-expanded="false">Acceder</a>
          <ul class="dropdown-menu" >
            <li><a class="dropdown-item" href="login.php">Entrar</a></li>
            <li><a class="dropdown-item" href="elegir_perfil.html">Registrarse</a></li>

          </ul>
        </li>
      </ul>

 </div>
  </nav>



         <!-- Carrusel -->
         <div id="carouselExampleInterval" class="carousel slide container-fluid mt-5" style="width:75%" data-bs-ride="carousel">

          <ol class="carousel-indicators ">
              <li data-bs-target="#carouselExampleIndicators " data-bs-slide-to="0" class="active"></li>
              <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
          </ol>
          <div class="carousel-inner shadow-lg ">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="img/carrusel4.jpg" class="d-block w-100"   alt="...">
              <div class="carousel-caption d-none d-md-block text-dark">
                <h2>¿Como causar una buena impresion?</h2>
                <h5>10 Trucos para tu primera entrevista de trabajo</h5>
              </div>
            </div>

            <div class="carousel-item">
              <img src="img/free_lance.jpg" class="d-block w-100 "   alt="...">
              <div class="carousel-caption d-none d-md-block text-warning">
                <h2>Mundo Freelance</h2>
                <h5> Consejos para organizar tu espacio de trabajo</h5>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon " aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </a>
        </div>



      <div class="row justify-content-around">
      <!--FIlTROS-->
      <div class="col-md-3 col-sm-9 align-self-start">
        <br>
        <form method="post">
        <fieldset>
          <legend>Filtros</legend>

          <label>Salario</label>
          <select class="form-control" >
            <option value="980">Más de 980€</option>
            <option value="1100">Más de 1100€</option>
            <option value="1200">Más de 1200€</option>
            <option value="1300">1300€</option>
          </select>

            <label>Categoria</label>
            <select class="form-control" >
              <option value="fijo">Fijo</option>
              <option value="temporal">Temporal</option>
              <option value="practicas">Practicas</option>
            </select>

          <fieldset>
            <legend>Fecha de publicación </legend>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="radio"  value="semana" <?php echo (($opcion == "semana")?'checked':'' ); ?>>
               En esta semana </label>
            </div>
            <div class="form-check">
              <label class="form-check-label  ">
                <input type="radio" class="form-check-input" name="radio" value="mes" <?php echo (($opcion == "mes")?'checked':'' ); ?>>
                  En este mes
              </label>
            </div>
            <div class="form-check">
              <label class="form-check-label">
                <input type="radio" class="form-check-input" name="radio" value="tresMeses" <?php echo (($opcion == "tresMeses")?'checked':'' ); ?>>
                  En los ultimos 3 meses
              </label>
            </div>

          </fieldset>

          <button type="submit" class="btn btn-primary mt-3" name="btn_filtrar">Filtrar</button>
        </fieldset>
      </form>
      </div>

      <!--OFERTAS-->
          <div class="col-md-8 justify-content-end">
        <?php   $datos = $rs->fetch_assoc();
        while($datos) { ?>

      <div class="card mb-3 container-md bg-light   mt-5 border-light" >

        <div class="card-body">
          <h4 class="card-header"><?=$datos['titulo_oferta'];?></h4>
          <div class="d-flex ">

          <p class="card-text m-2"><?=$datos['oferta']; ?></p>     </div>
      <ul >
          <li class=" list-inline-item card-text"><small class="text-muted align-bottom">Salario: <?=$datos['salario'];?>€</small></li><br>
          <li class=" list-inline-item card-text"><small class="text-muted align-bottom">Categoria: <?=$datos['categoria'];?></small></li><br>
          <li class=" list-inline-item card-text"><small class="text-muted align-bottom"><?=$datos['ciudad'];?></small></li>
          <li class=" list-inline-item card-text"><small class="text-muted align-bottom"><?=$datos['fecha'];?></small></li>

      </ul>
        <a href="login.php" ><button class="btn btn-outline-primary">Inscribirme</button></a>
        </div>
      </div>
      <?php  $datos = $rs->fetch_assoc();
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
