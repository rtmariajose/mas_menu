$('.typeahead').typeahead({
  classNames: {
    input: 'Typeahead-input',
    hint: 'Typeahead-hint',
    selectable: 'Typeahead-selectable'
  }
});





$("#btnGuardarProducto").on('click',function(data){
 $("#mensaje_box").html("");
 
 var request = $.ajax({
  url: "/masmenu/index.php/productos/ingresar_producto_mm",
  type: "POST",
  data: $("#form_producto").serialize(),
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

$("#btnBuscarProducto").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/productos/buscar_producto",
      type: "POST",
      data: $("#form_producto").serialize()+"&tipo_buscar=2",
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

//boton para buscar productos cuando se quiera actualizar
$("#btnBuscarProductoUpdate").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/productos/buscar_producto_produccion",
      type: "POST",
      data: $("#form_producto").serialize()+"&tipo_buscar=1",
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
$("#btnBuscarProductoDelete").on('click',function(){
    $("#mensaje_box").html("");
    
    var request = $.ajax({
      url: "/masmenu/index.php/productos/buscar_producto",
      type: "POST",
      data: $("#form_producto").serialize()+"&tipo_buscar=3",
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
function editarProducto(identificador){
  var request = $.ajax({
      url: "/masmenu/index.php/productos/edicion_producto",
      type: "POST",
      data:'identificador='+identificador,
      dataType: "json"
    });

    request.done(function(data) {
      if(data.html != ""){
        //levantar modal
     
        $("#body_modal").html(data.html);
        $("#myModalSistem").modal("show");
        $("#select_tipoproducto").select2();
        $("#select_categoriaproducto").select2();
        $("#select_unidadproducto").select2();

        $(".guarda_modal").on('click', function(){
          if($("#id_modal").val() == 1){ // guardado de la edicion de un producto
            actualizar_produto();
          }else if($("#id_modal").val() == 2){

          }
        });
      }
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });
}

function actualizar_produto(){
  var post = {
    id:$("#id_producto").val(),
    textcodigo:$("#textcodigo").val(),
    textdescrip:$("#textdescrip").val(),
    txtcantidad:$("#txtcantidad").val(),
    txtstockminimo:$("#txtstockminimo").val(),
    txtstockmaximo:$("#txtstockmaximo").val(),
    txtfechanac:$("#txtfechanac").val(),
    select_tipoproducto: $("#select_tipoproducto").select2("val"),
    select_categoriaproducto:$("#select_categoriaproducto").select2("val"),
    select_unidadproducto:$("#select_unidadproducto").select2("val")
  };
   var request = $.ajax({
      url: "/masmenu/index.php/productos/actualizacion_producto",
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

function eliminarProducto(identificador){
 var post = {
    id:identificador
  };
   var request = $.ajax({
      url: "/masmenu/index.php/productos/elimina_producto",
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

function editarProductoMM(identificador){
  var request = $.ajax({
      url: "/masmenu/index.php/productos/edicion_producto_produccion",
      type: "POST",
      data:'identificador='+identificador,
      dataType: "json"
    });

    request.done(function(data) {
      if(data.html != ""){
        //levantar modal
     
        $("#body_modal").html(data.html);
        $("#myModalSistem").modal("show");
        $("#select_tipoproducto").select2();
        $("#select_categoriaproducto").select2();
        $("#select_unidadproducto").select2();

        $(".guarda_modal").on('click', function(){
          if($("#id_modal").val() == 1){ // guardado de la edicion de un producto
            actualizar_produto_mm();
          }else if($("#id_modal").val() == 2){

          }
        });
      }
    });

    request.fail(function(jqXHR, textStatus) {
      alert( "Fallo" );
    });
}

function actualizar_produto_mm(){
  var post = {
    id:$("#id_producto").val(),
    textcodigo:$("#textcodigo").val(),
    textdescrip:$("#textdescrip").val(),
    txtcantidad:$("#txtcantidad").val(),
    txtstockminimo:$("#txtstockminimo").val(),
    txtPrecio:$("#txtPrecio").val(),
    txtfechanac:$("#txtfechanac").val(),
    select_categoriaproducto:$("#select_categoriaproducto").select2("val"),
    select_unidadproducto:$("#select_unidadproducto").select2("val"),
    activo_productos:$('input[name=activo_productos]:checked').val()
  };
   var request = $.ajax({
      url: "/masmenu/index.php/productos/actualizacion_producto_produccion",
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