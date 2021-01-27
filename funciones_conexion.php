<?php

function conexion(){
  $conexion = new mysqli("localhost","root","","ofertas_trabajo_daw1");

  if($conexion->connect_error){
    die("Error en la conexion".$conexion->connect_error);
  }
  return $conexion;
}

function comprobar_sesion($sesion){
switch ($sesion) {
  case 'admin':
    header('Location:vista_admin.html');
    break;
  case 'cliente':
    header('Location:vista_usuario.html');
    break;
  case 'empresa':
    header('Location:vista_empresa.html');
    break;

}
}
