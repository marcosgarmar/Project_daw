<?php

function conexion(){
  $conexion = new mysqli("localhost","root","","ofertas_trabajo_daw1");

  if($conexion->connect_error){
    die("Error en la conexion".$conexion->connect_error);
  }
  return $conexion;
}


function comprobar_sesion($rol){
switch ($rol) {
  case 'admin':
    header('Location:vista_admin.php');
    break;
  case 'cliente':
    header('Location:vista_usuario.php');
    break;
  case 'empresa':
    header('Location:vista_empresa.php');
    break;
    }
}

//---------------------------------------------------------------------------
//Funcion para obtener un parametro de $_POST o $_GET, en ese orden.
//Si se encuentra el parametro deseado, se devuelve un String, o "null" si no.
function getParameter($nombre)
{
  $res= null;

  if (isset( $_POST[$nombre])) {
    $res= $_POST[$nombre];
  } else if (isset( $_GET[$nombre])) {
    $res= $_GET[$nombre];
  }//if

  //Si el resultado es un array, coger el primer elemento del array.
  if (is_array($res)) {
    $res= reset( $res);
  }//if

  return ($res);
}//getParameter
