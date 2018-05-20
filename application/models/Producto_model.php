<?php
/**
 * Created by PhpStorm.
 * User: mariajose
 * Date: 02/09/2017
 * Time: 10:00
 */
class Producto_model  extends  CI_Model{


    private $db_b;
    public function __construct()
    {
        parent::__construct();
        $this->db_b = $this->load->database('default',true);
    }

/**
* Sql para obtner los tipos de productos y mostrar en el select
*/
function get_tipo_producto(){
     $this->db_b->select("ID,DESCRIPCION");
    $this->db_b->from("TIPO_PRODUCTO");
    $this->db_b->where("ACTIVO","S");

    $data = $this->db_b->get();
   
    if($data->num_rows() > 0) return $data->result();
    else return false;
}

/**
*Sql para obtener las categorias de los productos
*/
function get_categoria_producto(){
     $this->db_b->select("ID,DESCRIPCION");
    $this->db_b->from("CATEGORIA_PRODUCTO");
    $this->db_b->where("ACTIVO","S");

    $data = $this->db_b->get();
   
    if($data->num_rows() > 0) return $data->result();
    else return false;
}

/**
* sql para obtener las unidades de medida de los productos
*/
function get_unidad_producto(){
      $this->db_b->select("ID,DESCRIPCION");
    $this->db_b->from("UNIDAD_MEDIDA");
    $this->db_b->where("ACTIVO","S");

    $data = $this->db_b->get();
   
    if($data->num_rows() > 0) return $data->result();
    else return false;
}
/**
* Sql para insertar nuevos productos
*/
function guardarProducto($post,$tipo = 1){
    if(isset($post) && count($post)> 0){
       $this->db_b->trans_start();
        $this->db_b->set("DESCRIPCION",$post['textdescripcion']);
        $this->db_b->set("ABREVIACION",$post['textcodigo']);
        $this->db_b->set("STOCK",$post['txtcantidad']);
        $this->db_b->set("TIPO_PRODUCTO_ID",$tipo);
        $this->db_b->set("STOCK_MINIMO",$post['txtstockminimo']);
        $this->db_b->set("UNIDAD_MEDIDA_ID",$post['select_unidadproducto']);
        if(isset($post['txtstockmaximo']) && !empty($post['txtstockmaximo']))
            $this->db_b->set("STOCK_MAXIMO",$post['txtstockmaximo']);
        $this->db_b->set("FECHA_VENCIMIENTO","'".date('Y-m-d',strtotime($post['txtfechanac']))."'",FALSE);
        $this->db_b->set("CATEGORIA_PRODUCTO_ID",$post['select_categoriaproducto']);
        $this->db_b->set("ACTIVO","S");
        $this->db_b->set("USUARIO_CREA",1);
        $this->db_b->set("FECHA_CREA","'".date('Y-m-d')."'",FALSE);
       $resultado = $this->db_b->insert("PRODUCTO");

       if($tipo == 2){
           $id_producto = $this->db_b->insert_id();
           if(isset($id_producto) && !empty($id_producto)){
                $this->db_b->set("PRODUCTO_ID",$id_producto);
                $this->db_b->set("PRECIO",$post['txtValor']);
                $this->db_b->set("ACTIVO","S");
                $this->db_b->set("USUARIO_CREA",1);
                $this->db_b->set("FECHA_CREA","'".date('Y-m-d')."'",FALSE);
                $resultado = $this->db_b->insert("PRECIO_PRODUCTO");
           }
       }

       $this->db_b->trans_complete();

        if ($this->db_b->trans_status() === FALSE)
        {
               
                $resultado = FALSE;
        }
        else
        {
                $resultado = TRUE;
        }


       return $resultado;
    }else{
        return false;
    }
   
}
/**
* Sql que permite realizar  una busqueda de productos segun ciertos
* parametros de busqueda
*/
function buscarProducto($post){
  $this->db_b->select("P.ID,
  P.DESCRIPCION,
  P.ABREVIACION,
  P.STOCK_MINIMO,
  P.STOCK_MAXIMO,
  P.STOCK AS CANTIDAD,
  P.FECHA_VENCIMIENTO,
  P.ACTIVO,
  P.CATEGORIA_PRODUCTO_ID,
  P.UNIDAD_MEDIDA_ID,
  TP.DESCRIPCION AS TIPO_PRODUCTO,
  CP.DESCRIPCION AS CATEGORIA_PRODUCTO");
    $this->db_b->from("PRODUCTO P");
    $this->db_b->join("TIPO_PRODUCTO TP","P.TIPO_PRODUCTO_ID = TP.ID");
    $this->db_b->join("CATEGORIA_PRODUCTO CP","P.CATEGORIA_PRODUCTO_ID = CP.ID");
    $this->db_b->where("P.TIPO_PRODUCTO_ID",1);
    //se consulta si es que existen parametros de busqueda
    if(isset($post) && count($post) >0 ){
        $where = "";
        if(isset($post["textdescripcion"]) && !empty($post["textdescripcion"])){
            $busqueda = explode(" ",$post["textdescripcion"]);
            foreach($busqueda as $bs){
                $where = "(P.DESCRIPCION LIKE '%".$bs."%' OR P.ABREVIACION LIKE '%".$bs."%')";
                $this->db_b->where($where);
            }
        }
    }

    $data = $this->db_b->get();
   
    if($data->num_rows() > 0) 
        return $data->result();
    else 
        return false;
}

/**
* Sql que permite buscarun producto por id
*/
function buscarProductoPorId($identificador){

  
    if(isset($identificador) && !empty($identificador)){

 $this->db_b->select("P.ID,
  P.DESCRIPCION,
  P.ABREVIACION,
  P.STOCK_MINIMO,
  P.STOCK_MAXIMO,
  P.STOCK AS CANTIDAD,
  P.FECHA_VENCIMIENTO,
  P.UNIDAD_MEDIDA_ID,
  P.ACTIVO,
  P.CATEGORIA_PRODUCTO_ID,
  TP.DESCRIPCION AS TIPO_PRODUCTO,
  P.TIPO_PRODUCTO_ID,
  CP.DESCRIPCION AS CATEGORIA_PRODUCTO,
  PP.PRECIO AS PRECIO_PRODUCTO");
    $this->db_b->from("PRODUCTO P");
    $this->db_b->join("TIPO_PRODUCTO TP","P.TIPO_PRODUCTO_ID = TP.ID");
    $this->db_b->join("CATEGORIA_PRODUCTO CP","P.CATEGORIA_PRODUCTO_ID = CP.ID");
     $this->db_b->join("PRECIO_PRODUCTO PP","P.ID = PP.PRODUCTO_ID AND PP.ACTIVO = 'S'",'LEFT');
   // $this->db_b->where("P.ACTIVO","S");
      
    $this->db_b->where("P.ID",$identificador);

    $data = $this->db_b->get();
   

    if($data->num_rows() > 0){
       
        return $data->result();
    }else 
        return false;
    }else{
       
        return false;
    }
 
}


/**
* Sql que permite actualizar los registros
*/
function actualizaProducto($post){
 if(isset($post) && count($post)> 0){
      
        $this->db_b->set("DESCRIPCION",strtoupper($post['textdescrip']));
        $this->db_b->set("ABREVIACION",$post['textcodigo']);
        $this->db_b->set("STOCK",$post['txtcantidad']);
        $this->db_b->set("TIPO_PRODUCTO_ID",$post['select_tipoproducto']);
        $this->db_b->set("STOCK_MINIMO",$post['txtstockminimo']);
        $this->db_b->set("STOCK_MAXIMO",$post['txtstockmaximo']);
        $this->db_b->set("UNIDAD_MEDIDA_ID",$post['select_unidadproducto']);
        $this->db_b->set("FECHA_VENCIMIENTO","'".date('Y-m-d',strtotime($post['txtfechanac']))."'",FALSE);
        $this->db_b->set("CATEGORIA_PRODUCTO_ID",$post['select_categoriaproducto']);
        $this->db_b->set("ACTIVO",$post["activo_productos"]);
        $this->db_b->set("USUARIO_MOD",1);
        $this->db_b->set("FECHA_MODIFICA","'".date('Y-m-d')."'",FALSE);
        $this->db_b->where("ID",$post["id"]);
       $resultado = $this->db_b->update("PRODUCTO");

       return $resultado;
    }else{
        return false;
    }
}

/**
* SQL PARA  la eliminacion de un producto que solo se realizara editando su estado.
*/
function eliminarProducto($post){
   if(isset($post) && count($post)> 0){
        $this->db_b->set("ACTIVO","N");
        $this->db_b->set("USUARIO_MOD",1);//TODO mejorar los usuarios cuando se tenga sesion
        $this->db_b->set("FECHA_MODIFICA","'".date('Y-m-d')."'",FALSE);
        $this->db_b->where("ID",$post["id"]);
       $resultado = $this->db_b->update("PRODUCTO");

       return $resultado;
    }else{
        return false;
    }  
}

function buscarProductoMasMenu($post){
$this->db_b->select("P.ID,
  P.DESCRIPCION,
  P.ABREVIACION,
  P.STOCK_MINIMO,
  P.STOCK AS CANTIDAD,
  P.FECHA_VENCIMIENTO,
  P.ACTIVO,
  P.CATEGORIA_PRODUCTO_ID,
  P.UNIDAD_MEDIDA_ID,
  TP.DESCRIPCION AS TIPO_PRODUCTO,
  CP.DESCRIPCION AS CATEGORIA_PRODUCTO,
  PP.PRECIO AS PRECIO_PRODUCTO");
    $this->db_b->from("PRODUCTO P");
    $this->db_b->join("TIPO_PRODUCTO TP","P.TIPO_PRODUCTO_ID = TP.ID");
    $this->db_b->join("CATEGORIA_PRODUCTO CP","P.CATEGORIA_PRODUCTO_ID = CP.ID");
     $this->db_b->join("PRECIO_PRODUCTO PP","P.ID = PP.PRODUCTO_ID AND PP.ACTIVO ='S'",'LEFT');
    $this->db_b->where("P.TIPO_PRODUCTO_ID",2);
    //se consulta si es que existen parametros de busqueda
    if(isset($post) && count($post) >0 ){
        $where = "";
        if(isset($post["textdescripcion"]) && !empty($post["textdescripcion"])){
            $busqueda = explode(" ",$post["textdescripcion"]);
            foreach($busqueda as $bs){
                $where = "(P.DESCRIPCION LIKE '%".$bs."%' OR P.ABREVIACION LIKE '%".$bs."%')";
                $this->db_b->where($where);
            }
        }
    }

    $data = $this->db_b->get();
   
    if($data->num_rows() > 0) 
        return $data->result();
    else 
        return false;
}


    /**
* Sql que permite actualizar los registros
*/
function actualizaProductoMM($post){
 if(isset($post) && count($post)> 0){
      
        $this->db_b->set("DESCRIPCION",strtoupper($post['textdescrip']));
        $this->db_b->set("ABREVIACION",$post['textcodigo']);
        $this->db_b->set("STOCK",$post['txtcantidad']);
        $this->db_b->set("STOCK_MINIMO",$post['txtstockminimo']);

        $this->db_b->set("UNIDAD_MEDIDA_ID",$post['select_unidadproducto']);
        $this->db_b->set("FECHA_VENCIMIENTO","'".date('Y-m-d',strtotime($post['txtfechanac']))."'",FALSE);
        $this->db_b->set("CATEGORIA_PRODUCTO_ID",$post['select_categoriaproducto']);
        $this->db_b->set("ACTIVO",$post["activo_productos"]);
        $this->db_b->set("USUARIO_MOD",1);
        $this->db_b->set("FECHA_MODIFICA","'".date('Y-m-d')."'",FALSE);
        $this->db_b->where("ID",$post["id"]);
       $resultado = $this->db_b->update("PRODUCTO");

       $this->db_b->set("PRECIO",$post['txtPrecio']);
       $this->db_b->where("PRODUCTO_ID",$post["id"]);
       $this->db_b->where("ACTIVO",'S');
       $resultado = $this->db_b->update("PRECIO_PRODUCTO");

       return $resultado;
    }else{
        return false;
    }
}






}

