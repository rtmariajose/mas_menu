<form class="form-horizontal" id="form_producto">
<fieldset>

<!-- Form Name -->
<!--<legend>Pre-Inscripción | Doctorado en Derecho y Ciencias Políticas </legend>-->
<h1 align="center"> Actualiza Informaci&oacute;n Producto</h1>
<br /> <br />

<?php if(isset($data)  && count($data)>0 ){
 foreach ($data as $value) {
  ?>
<div id="mensaje_box"></div>
<input type="hidden" id="id_producto" name="id_producto" value="<?php echo $value->ID; ?>">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textNombres">C&oacute;digo: </label>  
  <div class="col-md-4">
  <input id="textcodigo" name="textcodigo" type="text" 
  placeholder="C&oacute;digo del producto" class="form-control input-md" required="" value="<?php echo $value->ABREVIACION;  ?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textdescrip">Descripci&oacute;n: </label>  
  <div class="col-md-4">
  <input id="textdescrip" name="textdescrip" type="text" value="<?php echo $value->DESCRIPCION;?>"
   placeholder="Descripci&oacute;n del producto" class="form-control input-md" required="">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtDNI">Cantidad: </label>  
  <div class="col-md-4">
  <input id="txtcantidad" name="txtcantidad" type="number" value="<?php echo $value->CANTIDAD;?>"
   placeholder="Cantidad de productos" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtstockminimo">Stock M&iacute;nimo: </label>  
  <div class="col-md-4">
  <input id="txtstockminimo" name="txtstockminimo" type="number"   value="<?php echo $value->STOCK_MINIMO;?>"
  placeholder="Stock m&iacute;nimo del productos" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPrecio">Precio: </label>  
  <div class="col-md-4">
  <input id="txtPrecio" name="txtPrecio" type="number" value="<?php echo $value->PRECIO_PRODUCTO;?>"
   placeholder="Precio del productos" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtfechanac">Fecha Vencimiento: </label>  
  <div class="col-md-4">
  <input id="txtfechanac" name="txtfechanac" type="text" placeholder="Fecha Vencimiento" class="form-control input-md" required="" value="<?php echo $value->FECHA_VENCIMIENTO;?>">
  </div>
</div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="txtCategoria">Categoria Producto: </label>  
  <div class="col-md-8">
  <?php if(is_array($categoria_producto)  && count($categoria_producto)>0){?>
  <select id="select_categoriaproducto" name="select_categoriaproducto" >
    <option value="">SELECCIONE</option>
  <?php
      foreach($categoria_producto as $value_cate){
        echo '<option value="'.$value_cate->ID.'"  '.($value_cate->ID ==  $value->CATEGORIA_PRODUCTO_ID ? 'selected' : '').'>'.$value_cate->DESCRIPCION.'</option>';
      }
      ?>
      </select>

 <?php } ?>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="txtUnidadProducto">Unidad Medida Producto: </label>  
  <div class="col-md-8">
  <?php if(is_array($unidad_producto)  && count($unidad_producto)>0){?>
  <select id="select_unidadproducto" name="select_unidadproducto" >
    <option value="">SELECCIONE</option>
  <?php
      foreach($unidad_producto as $value_cate){
        echo '<option value="'.$value_cate->ID.'"  '.($value_cate->ID ==  $value->UNIDAD_MEDIDA_ID ? 'selected' : '').'>'.$value_cate->DESCRIPCION.'</option>';
      }
      ?>
      </select>

 <?php } ?>
  </div>

</div>
<div class="form-group">
<label class="col-md-4 control-label" for="txtEstado">Estado Producto: </label>
  <div class="form-check col-md-8">
      <label class="form-check-label">
        <input class="form-check-input" value="S" type="radio" name="activo_productos" id="activo_productos1" <?php  echo $value->ACTIVO == 'S' ? 'checked' : ''; ?>> Activo
      </label>
      <label class="form-check-label">
        <input class="form-check-input" value="N" type="radio" name="activo_productos" id="activo_productos2" <?php  echo $value->ACTIVO == 'N' ? 'checked' : ''; ?>> Inactivo
      </label>
    </div>
  
</div>
<input type="hidden" id="id_modal" name="id_modal" value="1">

<?php }
}
 ?>


</fieldset>

</form>
