<?php
$rs_categorias = sacar_categorias();
?>

<div class="col-md-3 col-sm-9 align-self-start">
 <br>
 <form method="post">
 <fieldset>
   <legend>Filtros</legend>

   <label><h5>Salario</h5></label>
   <select class="form-control" name=salario>
     <option value="980">Más de 980€</option>
     <option value="1100">Más de 1100€</option>
     <option value="1200">Más de 1200€</option>
     <option value="1300">Más 1300€</option>
   </select>

    <br><label><h5>Categoria</h5></label>
     <select class="form-control" name="categoria">
       <?php while($categoria=$rs_categorias->fetch_assoc()){ ?>
       <option><?=$categoria['nombre_categoria'] ;?></option>
     <?php } ?>
     </select>

     <br><label><h5>Empresas</h5></label>
      <select class="form-control" name="empresas">
        <?php while($empresa=$rs_sacar_nombre_empresa->fetch_assoc()){ ?>
        <option ><?=$empresa['nombre_usuario'] ;?></option>
      <?php } ?>
      </select>

   <input type="submit" class="btn btn-primary mt-3" name="btn_filtrar" value="Filtrar">
 </fieldset>
</form>
  <a href="index.php" class="btn btn-dark mt-3">Quitar los filtros</a><br><br>
</div>
