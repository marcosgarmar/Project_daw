<?php

include 'funciones_conexion.php';
$conn = conexion();

if (isset($_GET['id_oferta'])) {

$borrar=$_GET['id_oferta'];
$sql_borrar=" DELETE FROM ofertas WHERE id_oferta ='$borrar'";


if($borrar_exito = $conn->query($sql_borrar)){
  if($borrar_inscritos = $conn->query("delete from inscritos where id_oferta='$borrar'")){
    echo '<script>window.location=\'vista_empresa.php\';</script>';
  }
  }
}
?>
