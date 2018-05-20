<?php
/**
 * Created by PhpStorm.
 * User: mariajose
 * Date: 20/01/15
 * Time: 10:00
 */
class Login_model  extends  CI_Model{


    private $db_b;
    public function __construct()
    {
        parent::__construct();
        $this->db_b = $this->load->database('default',true);
    }


function logeo_usuario($data){
    if(isset($data["usuario"]) && isset($data["pass"]){
         $this->db_b->select("ID");
         $this->db_b->from("USUARIO");
         $this->db_b->where("USUARIO",$data['usuario']);
         $this->db_b->where("CLAVE",$data['pass']);

        $query = $this->db_b->get();
        return ($query->num_rows() > 0) ? $query->result() : false;
       
    }else{
        return  false;
    }
    

}









}