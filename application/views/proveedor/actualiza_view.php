<form class="form-horizontal" id="form_proveedor">
<fieldset>

<!-- Form Name -->
<!--<legend>Pre-Inscripción | Doctorado en Derecho y Ciencias Políticas </legend>-->
<h1 align="center"> Actualiza Informaci&oacute;n Proveedor</h1>
<br /> <br />

<?php if(isset($data)  && count($data)>0 ){
 foreach ($data as $value) {
  ?>
<div id="mensaje_box"></div>
<input type="hidden" id="id_proveedor" name="id_proveedor" value="<?php echo $value->PROVEEDOR_ID; ?>">
<input type="hidden" id="id_persona" name="id_persona" value="<?php echo $value->PERSONA_ID; ?>">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtrut">Rut: </label>  
  <div class="col-md-3">
  <input id="txtrut" name="txtrut" type="number" placeholder="Rut Proveedor" class="form-control input-md" required="" value="<?php echo $value->RUT;?>">
  </div>
  <div class="col-md-2">
  <input id="txtdv" name="txtdv" type="text" placeholder="DV" class="form-control input-md" required="" value="<?php echo $value->DV;?>">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNombres">Nombres: </label>  
  <div class="col-md-4">
  <input id="txtNombres" name="txtNombres" type="text" value="<?php echo $value->NOMBRES;?>"
   placeholder="Nombres Proveedor" class="form-control input-md" required="">
  </div>
</div>



<div class="form-group">
  <label class="col-md-4 control-label" for="txtEmail">Email: </label>  
  <div class="col-md-4">
  <input id="txtEmail" name="txtEmail" type="text" value="<?php echo $value->EMAIL;?>"
   placeholder="Email Proveedor" class="form-control input-md" required="">
  </div>
</div>


<input type="hidden" id="id_modal" name="id_modal" value="1">

<?php }
}
 ?>


</fieldset>

</form>
