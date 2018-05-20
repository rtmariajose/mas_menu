 <div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal"  action="/masmenu/index.php/usuario/nuevo_usuario/" method="post" id=form_registro">
<fieldset>

<!-- Form Name -->
<legend>Registrar Usuario</legend>


<div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">Rut Usuario</label>  
  <div class="col-md-2">
  <div class="input-group">
      
       <input id="registro_rut" name="registro_rut" type="number" placeholder="Rut" class="form-control input-md">

      </div>
  </div> 
  <div class="col-md-2">
  <div class="input-group">
      
       <input id="registro_dv" name="registro_dv" type="text" placeholder="DV" class="form-control input-md">

      </div>
  </div> 
</div>


  
<div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">Nombre Completo</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="registro_nombre" name="registro_nombre" type="text" placeholder="Nombre Completo" class="form-control input-md">
      </div>
  </div> 
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">Apellido Paterno</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="registro_apellido_pat" name="registro_apellido_pat" type="text" placeholder="Apellido Paterno" class="form-control input-md">
      </div>

    
  </div>

  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">Apellido Materno</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="registro_apellido_mat" name="registro_apellido_mat" type="text" placeholder="Apellido Materno" class="form-control input-md">
      </div>

    
  </div>

  
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Date Of Birth">Fecha Nacimiento</label>  
  <div class="col-md-4">

  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-birthday-cake"></i>
        
       </div>
       <input id="registro_fechanac" name="registro_fechanac" type="text" placeholder="Fecha Nacimiento" class="form-control input-md">
      </div>
  
    
  </div>
</div>



<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Gender">Genero</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="Gender-0">
      <input type="radio" name="Gender" id="registro_gen1" value="1" checked="checked">
      Masculino
    </label> 
    <label class="radio-inline" for="Gender-1">
      <input type="radio" name="Gender" id="registro_gen2" value="2">
      Femenino
    </label> 
   
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label col-xs-12" for="Permanent Address">Direcci&oacute;n</label>  
  <div class="col-md-4"> 
  <input id="registro_direccion" name="registro_direccion" type="text" placeholder="Direccion" class="form-control input-md ">
  </div>
  
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Phone number ">Celular </label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-phone"></i>
        
       </div>
    <input id="registro_celular " name="registro_celular " type="text" placeholder="Celular " class="form-control input-md">
    
      </div>
      
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Email Address">Email</label>  
  <div class="col-md-4">
  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-envelope-o"></i>
        
       </div>
    <input id="registro_email" name="registro_email" type="text" placeholder="Email" class="form-control input-md">
    
      </div>
  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">Usuario</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="registro_usuario" name="registro_usuario" type="text" placeholder="Usuario" class="form-control input-md">
      </div>
  </div> 
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name (Full name)">Password</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-user">
        </i>
       </div>
       <input id="registro_pass" name="registro_pass" type="text" placeholder="Password" class="form-control input-md">
      </div>

    
  </div>

  
</div>


<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
  <button type="submit" id="btn_submit_regis" class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span> Guardar Usuario</button>

  <button type="button" id="btn_volver" class="btn btn-secondary"><span class="glyphicon glyphicon-thumbs-up"></span> Volver</button>
 
  
    
  </div>
</div>

</fieldset>
</form>
</div>
<div class="col-md-2 hidden-xs">
<img src="http://websamplenow.com/30/userprofile/images/avatar.jpg" class="img-responsive img-thumbnail ">
  </div>


</div>
   </div>