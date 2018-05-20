<form class="form-horizontal" id="form_proveedor">
<fieldset>


<h1 align="center"> Buscar Proveedor</h1>

<br>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="txtRut">Busque: </label>  
  <div class="col-md-4">
  <input id="txtRutBusqueda" name="txtRutBusqueda" type="number" placeholder="Rut" class="form-control input-md" required="">
  </div>
  <div class="col-md-2">
  <input id="txtDvBusqueda" name="txtDvBusqueda" type="text" placeholder="Dv" class="form-control input-md" required="">
  </div>
  <div class="col-md-4">
	<button type="button" <?php echo $id_boton_guardar;?> class="form-control btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
</div>
</div>





</fieldset>
<div id="mensaje_box"></div>
</form>
