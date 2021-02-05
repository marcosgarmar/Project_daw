<?php
include 'funciones_conexion.php';
$conn = conexion();

// Para borrar
if(isset($_GET['borrar_id']) && isset($_GET['rol'])){
  $id_user = $_GET['borrar_id'];
  $rol = $_GET['rol'];

// Si es demandante
  if($rol == "cliente"){
    $sql_borr = "delete from usuarios where id_usuario = '$id_user'";
    $id_dem = 'dem_'.$id_user;

    if($borrar_exito = $conn->query($sql_borr)){
      $sql_borr_insc = "delete from inscritos where id_dem = '$id_dem'";
      if($borrar_exito = $conn->query($sql_borr_insc)){
        $sql_borr_dem = "delete from demandante where id_usuario = '$id_user'";
        if($borrar_exito = $conn->query($sql_borr_dem)){
          echo '<script>window.location=\'gestionar_usuarios.php\';</script>';
        }
      }
    }

  }

// Si es empresa
if($rol == "empresa"){
  $sql_borr = "delete from usuarios where id_usuario = '$id_user'";
  $id_emp = 'emp_'.$id_user;

  if($borrar_exito = $conn->query($sql_borr)){
    $sql_borr_insc = "delete from inscritos where id_emp = '$id_emp'";
    if($borrar_exito = $conn->query($sql_borr_insc)){
      $sql_borr_emp = "delete from empresas where id_usuario = '$id_user'";
      if($borrar_exito = $conn->query($sql_borr_emp)){
        echo '<script>window.location=\'gestionar_usuarios.php\';</script>';
      }
      $sql_borr_oferta = "delete from ofertas where id_empresa = '$id_emp'";
      if($borrar_exito = $conn->query($sql_borr_oferta)){
        echo '<script>window.location=\'gestionar_usuarios.php\';</script>';
      }
    }
  }

  }
}

// Borrar categorias
if(isset($_GET['borrar_id_categoria'])){
  $id_categoria = $_GET['borrar_id_categoria'];
  $sql_borrar_categoria = "DELETE from categorias where id_categoria = '$id_categoria'";

  if($borrar_exito = $conn->query($sql_borrar_categoria)){
        echo '<script>window.location=\'gestionar_categorias.php\';</script>';
      }else {
        echo '<script>window.location=\'gestionar_categorias.php\';</script>';

      }
      }


$conn->close();

 ?>
