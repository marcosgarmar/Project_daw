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

// saber si existe un usuario en la DB
// le pasas la tabla donde tiene que buscar, campo en la tabla, y la condicion.
// id_where es el campo y $id_registro es lo que tiene que cumplir.
 function si_existe($id_tabla,$tabla,$id_where,$id_registro){
$conn = conexion();
$sql = " select $id_tabla from $tabla where $id_where='$id_registro'";
$existe = null;
if($rs = $conn->query($sql)){
  if($rs->num_rows>0){
    $existe = true;
  }else $existe = false;
}
return $existe;
}

function sacar_ofertas(){
  $conn = conexion();
  $sql = "SELECT * FROM ofertas";
  if($rs = $conn->query($sql)){
    if($rs->num_rows<0){
  //  $mensaje = $rs['salario'];
    die("Error en sacar los datos de la DB");
    }
  }
  return $rs;
}
function sacar_ofertas_empresa($id){
  $conn = conexion();
  $sql = "SELECT * FROM ofertas WHERE id_empresa ='$id' ";
  if($rs = $conn->query($sql)){
    if($rs->num_rows<0){
  //  $mensaje = $rs['salario'];
    die("Error en sacar los datos de la DB");
    }
  }
  return $rs;
}





function sacar_nombres_empresa_ofertas(){
  $conn = conexion();
  $sql_nombre_empresa = "select usuarios.nombre_usuario,empresas.id_empresa from usuarios JOIN empresas ON empresas.email = usuarios.email JOIN ofertas ON ofertas.id_empresa = empresas.id_empresa";
  $rs_nombre = $conn->query($sql_nombre_empresa);
  if($rs_nombre->num_rows<0){
  die("Error en sacar los datos de la DB");
    }
    return $rs_nombre;
}

function sacar_categorias(){
$conn = conexion();
$sql_categorias = "select * from categorias";
  $rs_categorias = $conn->query($sql_categorias);
  if($rs_categorias->num_rows<0){
  die("Error en sacar los datos de la DB");
    }
    return $rs_categorias;
}

function modificar_perfil_usuario($post_btn,$file_avatar,$id_dem){

$conn = conexion();

if(isset($post_btn)){
  if(is_uploaded_file($file_avatar)){
    $fic_tipo = $_FILES['avatar']['type'];
    $fic_tam = $_FILES['avatar']['size'];
    if($fic_tam<50000){
      if($fic_tipo == 'image/jpeg' || $fic_tipo == 'image/png'){
        $tipo = substr($fic_tipo,6);
        $origen = $_FILES['avatar']['tmp_name'];
        $fic_nom_dest = $id_dem.'_avatar.'.$tipo;
        $destino = 'img/perfil_img/'.$fic_nom_dest;

        if(is_uploaded_file($_FILES['avatar']['tmp_name'])){
          if(move_uploaded_file($origen,$destino)){
          $rs_avatar = $conn->query("update demandante set avatar='$fic_nom_dest' where id_demandante='$id_dem'");
            echo "<script>window.alert('Informacion guardada con éxito');</script>";
          	echo "<script>window.location = 'ver_perfil_usuario.php';</script>";
          }
        }
      } else { echo "<script>window.alert('Solo se admiten imagenes');</script>";
        echo "<script>window.location = 'ver_perfil_usuario.php';</script>"; }

    } else { echo "<script>window.alert('El tamaño debe ser menor que 50kb');</script>";
      echo "<script>window.location = 'ver_perfil_usuario.php';</script>"; }
  }

  $formacion_academica = mysqli_real_escape_string($conn,$_POST['form_aca']);
  $formacion_profesional = mysqli_real_escape_string($conn,$_POST['form_pro']);
  $datos_interes = mysqli_real_escape_string($conn,$_POST['dato_inter']);

  $rs_update_curriculum = $conn->query("update demandante set formacion_academica='$formacion_academica',formacion_profesional='$formacion_profesional',datos_de_interes='$datos_interes' where id_demandante='$id_dem'");
  if($rs_update_curriculum){
  echo "<script>window.alert('Informacion guardada con éxito');</script>";
  echo "<script>window.location = 'ver_perfil_usuario.php';</script>";
  }else {
    echo "<script>window.alert('Algo ha ido mal, intentalo más tarde');</script>";
    echo "<script>window.location = 'ver_perfil_usuario.php';</script>";
      }

    }

}

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
