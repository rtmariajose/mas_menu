<form class="form-horizontal" id="form_producto">
<fieldset>


<h1 align="center"> Buscar Productos</h1>

<br>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="textdescripcion">Busque: </label>  
  <div class="col-md-6">
  <input id="textdescripcion" name="textdescripcion" type="text" placeholder="C&oacute;digo o descripcion Producto" class="form-control input-md" required="">
  </div>
  <div class="col-md-4">
	<button type="button" <?php echo $id_boton_guardar;?> class="form-control btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
</div>
</div>





</fieldset>
<div id="mensaje_box"></div>
</form>
