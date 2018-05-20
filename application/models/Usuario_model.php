<?php
/**
 * Created by PhpStorm.
 * User: mariajose
 * Date: 20/01/15
 * Time: 10:00
 */
class Usuario_model  extends  CI_Model{


    private $db_b;
    public function __construct()
    {
        parent::__construct();
        $this->db_b = $this->load->database('default',true);
    }


/**
*Funcion para poder registrar un nuevo usuario
*/
function registrar_usuario($data){
   

    $this->db_b->set("RUT",$data["registro_rut"]);//definir como unico
    $this->db_b->set("DV",$data["registro_dv"]);
    $this->db_b->set("APELLIDO_PAT",$data["registro_apellido_pat"]);
    $this->db_b->set("APELLIDO_MAT",$data["registro_apellido_mat"]);
    $this->db_b->set("NOMBRES",$data["registro_nombre"]);
    $this->db_b->set("ACTIVO",'S');
    $this->db_b->set("FECHA_CREA",'NOW()',FALSE);
    $this->db_b->set("USUARIO_CREA",null);
    $this->db_b->insert("PERSONA");

    

    $this->db_b->select("ID");
    $this->db_b->from("PERSONA");
    $this->db_b->where("RUT",$data["registro_rut"]);

    $data_persona = $this->db_b->get();
    if($data_persona->num_rows() > 0){
        $persona = $data_persona->result();
         $identificador_persona = $persona["0"]->ID;

         $this->db_b->set("PERSONA_ID",$identificador_persona);//definir como unico
         $this->db_b->set("USUARIO",$data["registro_usuario"]);
        $this->db_b->set("PASS",$data["registro_pass"]);
        $this->db_b->set("ACTIVO",'S');
        $this->db_b->set("FECHA_CREA",'NOW()',FALSE);
        $this->db_b->set("USUARIO_CREA",null);
        $this->db_b->insert("USUARIO");
    }


 }

/**
*Funtion que permite actualizar los datos de un usuario
*/
function actualiza_usuario($data){

}

/**
*Funcion que permite solo inactivar a un usuario
*/
function inactiva_usuario($data){

}


}

