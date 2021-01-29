<div class="col-md-3 col-sm-9 align-self-start">
 <br>
 <form method="post">
 <fieldset>
   <legend>Filtros</legend>

   <label>Salario</label>
   <select class="form-control" >
     <option value="980">Más de 980€</option>
     <option value="1100">Más de 1100€</option>
     <option value="1200">Más de 1200€</option>
     <option value="1300">1300€</option>
   </select>

     <label>Categoria</label>
     <select class="form-control" >
       <option value="fijo">Fijo</option>
       <option value="temporal">Temporal</option>
       <option value="practicas">Practicas</option>
     </select>

   <fieldset>
     <legend>Fecha de publicación </legend>
     <div class="form-check">
       <label class="form-check-label">
         <input type="radio" class="form-check-input" name="radio"  value="semana" <?php echo (($opcion == "semana")?'checked':'' ); ?>>
        En esta semana </label>
     </div>
     <div class="form-check">
       <label class="form-check-label  ">
         <input type="radio" class="form-check-input" name="radio" value="mes" <?php echo (($opcion == "mes")?'checked':'' ); ?>>
           En este mes
       </label>
     </div>
     <div class="form-check">
       <label class="form-check-label">
         <input type="radio" class="form-check-input" name="radio" value="tresMeses" <?php echo (($opcion == "tresMeses")?'checked':'' ); ?>>
           En los ultimos 3 meses
       </label>
     </div>

   </fieldset>

   <button type="submit" class="btn btn-primary mt-3" name="btn_filtrar">Filtrar</button>
 </fieldset>
</form>
</div>
