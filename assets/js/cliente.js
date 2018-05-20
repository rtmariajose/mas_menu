
$("#txtfechanac").datepicker();

$("#btnGuardarCliente").on('click',function(data){
 $("#mensaje_box").html("");
 
 var request = $.ajax({
  url: "/masmenu/index.php/clientes/ingresar_nuevocliente",
  type: "POST",
  data: $("#form_cliente").serialize(),
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

$("#btnBuscarCliente").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/clientes/buscar_cliente",
      type: "POST",
      data: $("#form_cliente").serialize()+"&tipo_buscar=2",
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
$("#btnBuscarClienteUpdate").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/clientes/buscar_cliente",
      type: "POST",
      data: $("#form_cliente").serialize()+"&tipo_buscar=1",
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
        //SI ES TRUE  existe data se muestra el html
        $("#mensaje_box").html(data.html);
        $("#table_productos").dataTable();

        

      }else{
        mensaje_box_page(data,'mensaje_box');
      }
      
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });

});

//VISTA PARA LA ELIMINACION DE PRODUCTOS
$("#btnBuscarClienteDelete").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/clientes/buscar_cliente",
      type: "POST",
      data: $("#form_cliente").serialize()+"&tipo_buscar=3",
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





$(".menu_ventas").on('click',function(){
 alert(" ingreso a ventas");
 var data_post = "";

});

$(".menu_productos").on('click',function(){
 alert(" ingreso a productos");
});

$(".menu_proveedores").on('click',function(){
 alert(" ingreso a proveedores");
});

$(".menu_egresos").on('click',function(){
 alert(" ingreso a egresos");
});


$(".menu_usuarios").on('click',function(){
 alert(" ingreso a usuario");
});

$(".menu_conf").on('click',function(){
 alert(" ingreso a configuracion");
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
function editarCliente(identificador){
  var request = $.ajax({
      url: "/masmenu/index.php/clientes/edicion_cliente",
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
            actualizar_cliente();
          }else if($("#id_modal").val() == 2){

          }
        });
      }
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });
}

function actualizar_cliente(){
  var post = {
    id:$("#id_cliente").val(),
    id_persona:$("#id_persona").val(),
    txtrut:$("#txtrut").val(),
    txtdv:$("#txtdv").val(),
    txtNombres:$("#txtNombres").val(),
    txtApellidoPat:$("#txtApellidoPat").val(),
    txtApellidoMat:$("#txtApellidoMat").val(),
    txtPuntos:$("#txtPuntos").val()
  };
   var request = $.ajax({
      url: "/masmenu/index.php/clientes/actualizacion_cliente",
      type: "POST",
      data:post,
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
          alert("status OK");
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

function eliminarCliente(identificador){
 var post = {
    id:identificador
  };
   var request = $.ajax({
      url: "/masmenu/index.php/clientes/elimina_cliente",
      type: "POST",
      data:post,
      dataType: "json"
    });

    request.done(function(data) {
      if(data.status){
          alert("status OK");
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