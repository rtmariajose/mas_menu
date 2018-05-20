<form class="form-horizontal" id="form_cliente">
<fieldset>

<!-- Form Name -->
<!--<legend>Pre-Inscripción | Doctorado en Derecho y Ciencias Políticas </legend>-->
<h1 align="center"> Nuevo Cliente</h1>
<br /> <br />

<div id="mensaje_box"></div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtrut">Rut: </label>  
  <div class="col-md-3">
  <input id="txtrut" name="txtrut" type="number" placeholder="Rut Cliente" class="form-control input-md" required="">
  </div>
  <div class="col-md-1">
  <input id="txtdv" name="txtdv" type="text" placeholder="DV" class="form-control input-md" required="">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtNombres">Nombres: </label>  
  <div class="col-md-4">
  <input id="txtNombres" name="txtNombres" type="text" placeholder="Nombres Cliente" class="form-control input-md" required="">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtApellidoPat">Apellido Paterno: </label>  
  <div class="col-md-4">
  <input id="txtApellidoPat" name="txtApellidoPat" type="text" placeholder="Apellido Paterno Cliente" class="form-control input-md" required="">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtApellidoMat">Apellido Materno: </label>  
  <div class="col-md-4">
  <input id="txtApellidoMat" name="txtApellidoMat" type="text" placeholder="Apellido Materno Cliente" class="form-control input-md" required="">
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txtPuntos">Puntos: </label>  
  <div class="col-md-4">
  <input id="txtPuntos" name="txtPuntos" type="number" placeholder="Puntos Cliente" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="txtfechanac">Fecha Nacimiento: </label>  
  <div class="col-md-4">
  <input id="txtfechanac" name="txtfechanac" type="text" placeholder="Fecha Nacimiento" class="form-control input-md" required="">
  </div>
</div>
<div class="form-group">
<div class="col-md-4"></div>
 <div class="col-md-4">
	<button type="button" id="btnGuardarCliente" class="form-control btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Guardar</button>
</div>
</div>



</fieldset>

</form>
