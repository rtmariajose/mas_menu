<form class="form-horizontal" id="form_cliente">
<fieldset>

<!-- Form Name -->
<!--<legend>Pre-Inscripción | Doctorado en Derecho y Ciencias Políticas </legend>-->
<h1 align="center"> Actualiza Informaci&oacute;n Cliente</h1>
<br /> <br />

<?php if(isset($data)  && count($data)>0 ){
 foreach ($data as $value) {
  ?>
<div id="mensaje_box"></div>
<input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $value->CLIENTE_ID; ?>">
<input type="hidden" id="id_persona" name="id_persona" value="<?php echo $value->PERSONA_ID; ?>">
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtrut">Rut: </label>  
  <div class="col-md-3">
  <input id="txtrut" name="txtrut" type="number" placeholder="Rut Cliente" class="form-control input-md" required="" value="<?php echo $value->RUT;?>">
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
   placeholder="Nombres Cliente" class="form-control input-md" required="">
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtApellidoPat">Apellido Paterno: </label>  
  <div class="col-md-4">
  <input id="txtApellidoPat" name="txtApellidoPat" type="text" value="<?php echo $value->APELLIDO_PAT;?>"
   placeholder="Apellido Paterno Cliente" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtApellidoMat">Apellido Materno: </label>  
  <div class="col-md-4">
  <input id="txtApellidoMat" name="txtApellidoMat" type="text"   value="<?php echo $value->APELLIDO_MAT;?>"
  placeholder="Apellido Materno Cliente" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPuntos">Puntos: </label>  
  <div class="col-md-4">
  <input id="txtPuntos" name="txtPuntos" type="number" value="<?php echo $value->PUNTOS;?>"
   placeholder="Puntos Cliente" class="form-control input-md" required="">
  </div>
</div>


<input type="hidden" id="id_modal" name="id_modal" value="1">

<?php }
}
 ?>


</fieldset>

</form>
