<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {


	public function __construct()
        {
                parent::__construct();
                $this->load->model("usuario_model","usuario");
                
               
        }

	
	public function index()
	{
		$this->load->view('welcome_message');

		
	}


	public function registrar_usuario(){
		$this->load->helper(array('form', 'url'));

				   
        $this->load->library('form_validation');
		$this->load->view('header_view');
		$this->load->view('registrar_usuario_view');
		$this->load->view('footer_view');
	}


	/**
	*Permire registrar un usuario
	*/
	public function nuevo_usuario(){



		$this->usuario->registrar_usuario($this->input->post());

		$resultado["mensaje"] = "Se ingreso el nuevo usuario";
		$resultado["status"] = true;

		$response = array('status' => 'OK');

		$this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));

	}
}
