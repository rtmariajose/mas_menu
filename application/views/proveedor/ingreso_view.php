<form class="form-horizontal" id="form_proveedor">
<fieldset>

<!-- Form Name -->
<!--<legend>Pre-Inscripción | Doctorado en Derecho y Ciencias Políticas </legend>-->
<h1 align="center"> Nuevo Proveedor</h1>
<br /> <br />

<div id="mensaje_box"></div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtrut">Rut: </label>  
  <div class="col-md-3">
  <input id="txtrut" name="txtrut" type="number" placeholder="Rut Proveedor" class="form-control input-md" required="">
  </div>
  <div class="col-md-1">
  <input id="txtdv" name="txtdv" type="text" placeholder="DV" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNombres">Nombres: </label>  
  <div class="col-md-4">
  <input id="txtNombres" name="txtNombres" type="text" placeholder="Nombre Proveedor"class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtEmail">Email: </label>  
  <div class="col-md-4">
  <input id="txtEmail" name="txtEmail" type="text" placeholder="Email" class="form-control input-md" required="">
  </div>
</div>

<div class="form-group">
<div class="col-md-4"></div>
 <div class="col-md-4">
	<button type="button" id="btnGuardarProveedor" class="form-control btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
</div>
</div>



</fieldset>

</form>
