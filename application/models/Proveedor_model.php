<?php
/**
 * Created by PhpStorm.
 * User: mariajose
 * Date: 02/09/2017
 * Time: 10:00
 */
class Proveedor_model  extends  CI_Model{


    private $db_b;
    public function __construct()
    {
        parent::__construct();
        $this->db_b = $this->load->database('default',true);
    }


/**
* Sql para insertar nuevos clientes
* TODO validar  que le rut no se repita.
*/
function guardarProveedor($post){
    if(isset($post) && count($post)> 0){
        $this->db_b->trans_start();
      
        $this->db_b->set("RUT", ($post['txtrut']));
        $this->db_b->set("DV",strtoupper($post['txtdv']));
        $this->db_b->set("NOMBRES",strtoupper($post['txtNombres']));
         
        $this->db_b->set("ACTIVO","S");
        $this->db_b->set("USUARIO_CREA",1);
        $this->db_b->set("FECHA_CREA","'".date('Y-m-d')."'",FALSE);
        $resultado = $this->db_b->insert("PERSONA");

        $id_persona = $this->db_b->insert_id();

        if(isset($id_persona) && !empty($id_persona)){
            $this->db_b->set("EMAIL",$post['txtEmail']);
            $this->db_b->set("PERSONA_ID",$id_persona);
            $this->db_b->set("ACTIVO","S");
            $this->db_b->set("USUARIO_CREA",1);
            $this->db_b->set("FECHA_CREA","'".date('Y-m-d')."'",FALSE);
            $resultado = $this->db_b->insert("PROVEEDOR");
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
* Sql que permite buscarun producto por id
*/
function buscarProveedorPorId($identificador){

  
    if(isset($identificador) && !empty($identificador)){

 $this->db_b->select("P.ID AS PERSONA_ID,
  P.RUT,
  P.DV,
  P.NOMBRES,
  PR.ACTIVO,
  PR.ID AS PROVEEDOR_ID,
  PR.EMAIL");
    $this->db_b->from("PROVEEDOR PR");
    $this->db_b->join("PERSONA P","PR.PERSONA_ID = P.ID");
   
   // $this->db_b->where("P.ACTIVO","S");
      
    $this->db_b->where("PR.ID",$identificador);

    $data = $this->db_b->get();
   

    if($data->num_rows() > 0){
       
        return $data->result();
    }else 
        return false;
    }else{
       
        return false;
    }
 
}


function buscarProveedor($post){
 $this->db_b->select("P.ID AS PERSONA_ID,
  P.RUT,
  P.DV,
  P.NOMBRES,
  PR.ACTIVO,
  PR.ID AS PROVEEDOR_ID,
  PR.EMAIL");
    $this->db_b->from("PROVEEDOR PR");
    $this->db_b->join("PERSONA P","PR.PERSONA_ID = P.ID");
    
    //$this->db_b->where("P.ACTIVO","S");
    //se consulta si es que existen parametros de busqueda
    if(isset($post) && count($post) >0 ){
        $where = "";
        if(isset($post["txtRutBusqueda"]) && !empty($post["txtRutBusqueda"])){
         
            
                $where = "P.RUT = '".$post["txtRutBusqueda"]."' AND UPPER(P.DV) = '".$post["txtDvBusqueda"]."'";
                $this->db_b->where($where);
            
        }
    }

    $data = $this->db_b->get();
   
    if($data->num_rows() > 0) 
        return $data->result();
    else 
        return false;
}

function actualizaProveedor($post){

      if(isset($post) && count($post)> 0){
        $this->db_b->trans_start();
      
        $this->db_b->set("RUT", ($post['txtrut']));
        $this->db_b->set("DV",strtoupper($post['txtdv']));
        $this->db_b->set("NOMBRES",strtoupper($post['txtNombres']));
        
      
        $this->db_b->set("ACTIVO","S");
        $this->db_b->set("USUARIO_MOD",1);
        $this->db_b->set("FECHA_MODIFICA","'".date('Y-m-d')."'",FALSE);
        $this->db_b->where("ID",$post["id_persona"]);
        $resultado = $this->db_b->update("PERSONA");

       
        if($resultado){
            $this->db_b->set("EMAIL",$post['txtEmail']);
            $this->db_b->set("ACTIVO","S");
            $this->db_b->set("USUARIO_MOD",1);
            $this->db_b->set("FECHA_MOD","'".date('Y-m-d')."'",FALSE);
            $this->db_b->where("ID",$post['id']);
            $this->db_b->update("PROVEEDOR");
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
        $this->db_b->set("ACTIVO","S");
        $this->db_b->set("USUARIO_MOD",1);
        $this->db_b->set("FECHA_MODIFICA","'".date('Y-m-d')."'",FALSE);
        $this->db_b->where("ID",$post["id"]);
       $resultado = $this->db_b->update("PRODUCTO");

       return $resultado;
    }else{
        return false;
    }
}


function eliminarProveedor($post){
   if(isset($post) && count($post)> 0){
        $this->db_b->set("ACTIVO","N");
        $this->db_b->set("USUARIO_MOD",1);//TODO mejorar los usuarios cuando se tenga sesion
        $this->db_b->set("FECHA_MOD","'".date('Y-m-d')."'",FALSE);
        $this->db_b->where("ID",$post["id"]);
       $resultado = $this->db_b->update("PROVEEDOR");

       return $resultado;
    }else{
        return false;
    }  
}



}

