<?php
include 'funciones_conexion.php';
$conn = conexion();

if(isset($_GET['id_dem']) && isset($_GET['id_oferta']) && isset($_GET['id_emp'])){
  $id_dem = $_GET['id_dem'];
  $id_oferta = $_GET['id_oferta'];
  $id_emp = $_GET['id_emp'];
  $titulo = $_GET['titulo'];

  $sql_si_existe = "Select titulo_oferta from inscritos where id_oferta='$id_oferta' and id_emp='$id_emp'";
  $si_existe = $conn->query($sql_si_existe);
  if($si_existe){
    if($si_existe->num_rows>0){
      echo '<script>window.alert(\'Ya estás inscrito en esa oferta\');</script>';
      echo '<script>window.location=\'mis_candidaturas.php\';</script>';
    }else{
      $sql_inscribir = "INSERT INTO inscritos(id_oferta,titulo_oferta,id_dem,id_emp) VALUES('$id_oferta','$titulo','$id_dem','$id_emp')";

      if($rs=$conn->query($sql_inscribir)){
        header('Location:mis_candidaturas.php');
      }
    }
  }




}






 ?>
