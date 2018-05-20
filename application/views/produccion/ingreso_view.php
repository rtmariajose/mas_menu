<form class="form-horizontal" id="form_producto">
<fieldset>

<!-- Form Name -->
<!--<legend>Pre-Inscripción | Doctorado en Derecho y Ciencias Políticas </legend>-->
<h1 align="center"> Nuevo Producto Mas Menu</h1>
<br /> <br />

<div id="mensaje_box"></div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textNombres">C&oacute;digo: </label>  
  <div class="col-md-4">
  <input id="textcodigo" name="textcodigo" type="text" placeholder="C&oacute;digo del producto" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textdescripcion">Descripci&oacute;n: </label>  
  <div class="col-md-4">
  <input id="textdescripcion" name="textdescripcion" type="text" placeholder="Descripci&oacute;n del producto" class="form-control input-md" required="">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtDNI">Cantidad: </label>  
  <div class="col-md-4">
  <input id="txtcantidad" name="txtcantidad" type="number" placeholder="Cantidad de productos" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtstockminimo">Stock M&iacute;nimo: </label>  
  <div class="col-md-4">
  <input id="txtstockminimo" name="txtstockminimo" type="number" placeholder="Stock m&iacute;nimo del productos" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="txtCategoria">Categoria Producto: </label>  
  <div class="col-md-4">
  <?php if(is_array($categoria_producto)  && count($categoria_producto)>0){?>
  <select id="select_categoriaproducto" name="select_categoriaproducto" Class="form-control">
    <option value="">SELECCIONE</option>
  <?php
      foreach($categoria_producto as $value){
        echo '<option value="'.$value->ID.'">'.$value->DESCRIPCION.'</option>';
      }
      ?>
      </select>

 <?php } ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtUnidadMedida">Unidad Medida: </label>  
  <div class="col-md-4">
  <?php  if( isset($unidad_producto) && is_array($unidad_producto) ){?>
  <select id="select_unidadproducto" name="select_unidadproducto" Class="form-control">
    <option value="">SELECCIONE</option>
  <?php
      foreach($unidad_producto as $value){
        echo '<option value="'.$value->ID.'">'.$value->DESCRIPCION.'</option>';
      }
      ?>
      </select>

 <?php } ?>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtfechanac">Fecha Vencimiento: </label>  
  <div class="col-md-4">
  <input id="txtfechanac" name="txtfechanac" type="text" placeholder="Fecha Vencimiento" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtValor">Valor: </label>  
  <div class="col-md-4">
  <input id="txtValor" name="txtValor" type="number" placeholder="Valor Producto" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
<div class="col-md-4"></div>
 <div class="col-md-4">
	<button type="button" id="btnGuardarProducto" class="form-control btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
</div>
</div>



</fieldset>

</form>
