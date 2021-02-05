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

function sacar_ofertas_con_filtro($salario,$categoria,$empresa){
  $conn = conexion();
  $sql = "SELECT * FROM ofertas where salario >= $salario and categoria like '$categoria' and id_empresa like '$empresa'";
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

function sacar_id_emp($id_user){
  $conn = conexion();
  $rs_id_emp = $conn->query("select id_empresa from empresas where id_usuario = '$id_user' ");
  $rs_id_emp = $rs_id_emp->fetch_assoc();
 return $rs_id_emp['id_empresa'];
}

// Sacar el di de la empresa con solo pasarle su nombre 
function sacar_id_emp_con_nombre($nombre_empresa){
  $conn = conexion();
  $rs_id_emp = $conn->query("SELECT id_empresa from empresas join usuarios on usuarios.email = empresas.email where nombre_usuario = '$nombre_empresa'");
  $rs_id_emp = $rs_id_emp->fetch_assoc();
 return $rs_id_emp['id_empresa'];
}

// Sacar el nombre de la empresa en la ofertas
function sacar_nombres_empresa_ofertas(){
  $conn = conexion();
  $sql_nombre_empresa = "select usuarios.nombre_usuario,empresas.id_empresa from usuarios JOIN empresas ON empresas.email = usuarios.email JOIN ofertas ON ofertas.id_empresa = empresas.id_empresa";
  $rs_nombre = $conn->query($sql_nombre_empresa);
  if($rs_nombre->num_rows<0){
  die("Error en sacar los datos de la DB");
    }
    return $rs_nombre;
}

// sacar los nombres de empresa
function sacar_nombres_empresa(){
  $conn = conexion();
  $sql_nombre_empresa = "SELECT nombre_usuario from usuarios join empresas on empresas.id_usuario = usuarios.id_usuario";
  $rs_nombre = $conn->query($sql_nombre_empresa);
  if($rs_nombre->num_rows<0){
  die("Error en sacar los datos de la DB");
    }
    return $rs_nombre;
}

// Para sacar las categorias
function sacar_categorias(){
$conn = conexion();
$sql_categorias = "select * from categorias";
  $rs_categorias = $conn->query($sql_categorias);
  if($rs_categorias->num_rows<0){
  die("Error en sacar los datos de la DB");
    }
    return $rs_categorias;
}

// Para cuando un usuario desea modificar su curriculum
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

  $formacion_academica = htmlentities(mysqli_real_escape_string($conn,$_POST['form_aca']));
  $formacion_profesional = htmlentities(mysqli_real_escape_string($conn,$_POST['form_pro']));
  $datos_interes = htmlentities(mysqli_real_escape_string($conn,$_POST['dato_inter']));

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

// Para sacar la tabla de usuarios para el admin
function gestionar_usuarios(){
  $conn = conexion();

  $sql_gest_user = "Select * from usuarios where rol != 'admin'";
  if($gest_user = $conn->query($sql_gest_user)){
    if($gest_user->num_rows>0){
      $rs_gest_user = $gest_user;
    }
  }else{
    die("Error el sacar los datos");
  }

  return $rs_gest_user;
}

// Para Modificar los datos de los usuarios usuarios
function modificar_usuario($id_user,$rol,$nombre_nuevo,$pass_nuevo){

  $conn = conexion();
  if($rol == "cliente"){
    $sql = "update usuarios set nombre_usuario = '$nombre_nuevo',password='$pass_nuevo' where id_usuario = '$id_user'";
    if($rs = $conn->query($sql)){
      $sql_dem = "update demandante set nombre = '$nombre_nuevo' where id_usuario = '$id_user'";
      if($rs = $conn->query($sql_dem)){
        header('Location:gestionar_usuarios.php');
      }
    }
  }if($rol == "empresa" ){
    $sql = "update usuarios set nombre_usuario = '$nombre_nuevo',password = '$pass_nuevo' where id_usuario = '$id_user'";
    if($rs = $conn->query($sql)){
        header('Location:gestionar_usuarios.php');
    }
  }
}
