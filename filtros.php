<?php
$rs_categorias = sacar_categorias();
?>

<div class="col-md-3 col-sm-9 align-self-start">
 <br>
 <form method="post">
 <fieldset>
   <legend>Filtros</legend>

   <?php $keep_sal = isset($_POST['salario'])?$_POST['salario']:'';?>
   <label><h5>Salarios</h5></label>
   <select class="form-control" name=salario>
     <option value="980" <?php if($keep_sal == 980){echo 'selected';}?> >Más de 980€</option>
     <option value="1100" <?php if($keep_sal == 1100){echo 'selected';}?> >Más de 1100€</option>
     <option value="1200" <?php if($keep_sal == 1200){echo 'selected';}?> >Más de 1200€</option>
     <option value="1300" <?php if($keep_sal == 1300){echo 'selected';}?> >Más 1300€</option>
   </select>

    <?php $keep_cat = isset($_POST['categoria'])?$_POST['categoria']:'';?>
    <br><label><h5>Categorias</h5></label>
     <select class="form-control" name="categoria">
       <?php while($categoria=$rs_categorias->fetch_assoc()){ ?>
       <option <?php if($keep_cat == $categoria['nombre_categoria']){echo 'selected';}?> ><?=$categoria['nombre_categoria'] ;?></option>
     <?php } ?>
     </select>

     <?php $keep_empr = isset($_POST['empresas'])?$_POST['empresas']:'';?>
     <br><label><h5>Empresas</h5></label>
      <select class="form-control" name="empresas">
        <?php while($empresa=$rs_sacar_nombre_empresa->fetch_assoc()){ ?>
        <option <?php if($keep_empr == $empresa['nombre_usuario']) echo 'selected';?>><?=$empresa['nombre_usuario'] ;?></option>
      <?php } ?>
      </select>

   <input type="submit" class="btn btn-primary mt-3" name="btn_filtrar" value="Filtrar">
 </fieldset>
</form>
  <a href="index.php" class="btn btn-dark mt-3">Quitar los filtros</a><br><br>
</div>
