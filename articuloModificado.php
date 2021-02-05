<?PHP
//Marcos Garcia Martin

require_once( 'Base_datos_fun.php');

$mbd = mysqli_connect('127.0.0.1', 'root', '','daw_tienda_virtual');


if(isset($_GET['id']) && is_numeric($_GET['id'])){

   $resultado =consultarBD($mbd,'id_articulo','articulos',$_GET['id']);

if(isset($resultado)){
  ?>
   <form method="post" action="modificarArticulo.php">
    <p>ID_ ARTICULO <input type="text" name="id_articulo" readonly=readonly  value="<?php echo $resultado['id_articulo']  ?>" /></p>
    <p>REFERENCIA<input type="text" name="referencia"  value="<?php echo $resultado['referencia']  ?>" /></p>
    <p>TEXTO <input type="text" name="texto"   value="<?php echo $resultado['texto']  ?>" /></p>
    <p>PRECIO <input type="text" name="precio"   value=" <?php echo $resultado['precio']  ?>" /></p>
    <p>IVA <input type="text" name="iva"  value="<?php echo $resultado['iva']  ?>" /></p>
    <p>NOTAS <input type="text" name="notas"   value=" <?php echo $resultado['notas']  ?>" /></p>

    <p><input type="submit" name="enviarPost" /></p>

  </form >


 <?php }else{

   echo "No se ha encontrado ningun articulo con ese ID";

   $nuevo_ref = $_POST['referencia'];
   $nuevo_tx = $_POST['texto'];
   $nuevo_precio = $_POST['precio'];
   $nuevo_iva = $_POST['iva'];
   $nuevo_notas =  $_POST['notas'];

   if (is_numeric($_POST['precio']) && is_numeric($_POST['iva'])) {

   if ($nuevo_ref !== $resultado['referencia']) {

     modificarCampo($mbd,'articulos',$resultado['referencia'],$nuevo_ref,'referencia');

   }
   if ($nuevo_ref !== $resultado['texto']) {

     modificarCampo($mbd,'articulos',$resultado['texto'],$nuevo_tx,'texto') ;

   }
   if ($nuevo_ref !== $resultado['precio']) {

     modificarCampo($mbd,'articulos',$resultado['precio'],$nuevo_precio,'precio');

   }
   if ($nuevo_ref !== $resultado['iva']) {

     modificarCampo($mbd,'articulos',$resultado['iva'],$nuevo_iva,'iva') ;

   }
   if ($nuevo_ref !== $resultado['notas']) {

     modificarCampo($mbd,'articulos',$resultado['notas'],$nuevo_notas,'notas') ;

   }


 }else {
   echo "IVA y Precio deber ser valores numericos";
 }
}
}
  else{


  echo "No has introducido ningun id o el id introducido no es un numero ";
  echo '<hr/>'."\n";

}

if (isset($_POST['enviarPost'])) {


}
else {
  echo "asdsadsadsad";
}


?>
