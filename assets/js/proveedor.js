
$("#txtfechanac").datepicker();

$("#btnGuardarProveedor").on('click',function(data){
 $("#mensaje_box").html("");
 
 var request = $.ajax({
  url: "/masmenu/index.php/proveedores/ingresar_nuevoproveedor",
  type: "POST",
  data: $("#form_proveedor").serialize(),
  dataType: "json"
});

request.done(function(data) {
  if(data.status){
     mensaje_box_page(data,'mensaje_box');
  }else{
    mensaje_box_page(data,'mensaje_box');
  }
  
});

request.fail(function(jqXHR, textStatus) {
  alert( "Fallo" );
});

});

$("#btnBuscarProveedor").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/proveedores/buscar_proveedor",
      type: "POST",
      data: $("#form_proveedor").serialize()+"&tipo_buscar=2",
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
        //SI ES TRUE  existe data se muestra el html
        $("#mensaje_box").html(data.html);
        $("#table_cliente").dataTable();
      }else{
        mensaje_box_page(data,'mensaje_box');
      }
      
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });

});

//boton para buscar productos cuando se quiera actualizar
$("#btnBuscarProveedorUpdate").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/proveedores/buscar_proveedor",
      type: "POST",
      data: $("#form_proveedor").serialize()+"&tipo_buscar=1",
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
        //SI ES TRUE  existe data se muestra el html
        $("#mensaje_box").html(data.html);
        $("#table_proveedor").dataTable();

        

      }else{
        mensaje_box_page(data,'mensaje_box');
      }
      
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });

});

//VISTA PARA LA ELIMINACION DE PRODUCTOS
$("#btnBuscarProveedorDelete").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/proveedores/buscar_proveedor",
      type: "POST",
      data: $("#form_proveedor").serialize()+"&tipo_buscar=3",
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
        //SI ES TRUE  existe data se muestra el html
        $("#mensaje_box").html(data.html);
        $("#table_proveedor").dataTable();

        

      }else{
        mensaje_box_page(data,'mensaje_box');
      }
      
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });

});




$(".productos_ingresar").on('click',function(){
    var data_post = "";

  $.post("/masmenu/index.php/productos/ingresar_producto",

                data_post,
                function(data){
                   alert("respondio ok ajax post");

                },"json");
});


function mensaje_box_page(data,box){
  

 $("#"+box).html('<div class="alert alert-'+data.type+' alert-dismissable">'+
  '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+(data.errors != "" ? data.errors :data.mensaje)+
 +'</div>');

}

/**
 * permite levantar ventana de edicion para un producto
 * @param {*} identificador 
 */
function editarProveedor(identificador){
  var request = $.ajax({
      url: "/masmenu/index.php/proveedores/edicion_proveedor",
      type: "POST",
      data:'identificador='+identificador,
      dataType: "json"
    });

    request.done(function(data) {
      if(data.html != ""){
        //levantar modal
     
        $("#body_modal").html(data.html);
        $("#myModalSistem").modal("show");
        

        $(".guarda_modal").on('click', function(){
          if($("#id_modal").val() == 1){ // guardado de la edicion de un producto
            actualizar_proveedor();
          }else if($("#id_modal").val() == 2){

          }
        });
      }
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });
}

function actualizar_proveedor(){
  var post = {
    id:$("#id_proveedor").val(),
    id_persona:$("#id_persona").val(),
    txtrut:$("#txtrut").val(),
    txtdv:$("#txtdv").val(),
    txtNombres:$("#txtNombres").val(),
    txtEmail:$("#txtEmail").val()
  };
   var request = $.ajax({
      url: "/masmenu/index.php/proveedores/actualizacion_proveedor",
      type: "POST",
      data:post,
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
          alert("status OK");
          $("#btnBuscarProveedorUpdate").click();
      } else {
        $('.form-group').removeClass('has-error');
          $.each(data.errors, function (index, campo) {
          $('.form-group').find('[name="' + campo + '"]').closest('.form-group').addClass('has-error');
        });
      if (data.errors.length > 0) {
          mensaje_box_page(data, $("#mensaje_box"));
       }else{
        $('#mensaje_box div.alert').hide();

      }

}
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });
}


function activar_guardado_modal(){
  $(".guarda_modal").on('click', function(){
   if($("#guarda_modal").val() == 1){ // guardado de la edicion de un producto
     actualizar_produto();
   }else if($("#guarda_modal").val() == 2){

   }
});
}

function eliminarProveedor(identificador){
 var post = {
    id:identificador
  };
   var request = $.ajax({
      url: "/masmenu/index.php/proveedores/elimina_proveedor",
      type: "POST",
      data:post,
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
          alert("status OK");
          $("#btnBuscarProveedorDelete").click();
      } else {
        $('.form-group').removeClass('has-error');
          $.each(data.errors, function (index, campo) {
          $('.form-group').find('[name="' + campo + '"]').closest('.form-group').addClass('has-error');
        });
      if (data.errors.length > 0) {
          mensaje_box_page(data, $("#mensaje_box"));
       }else{
        $('#mensaje_box div.alert').hide();

      }

}
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });
}