<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		 $this->load->helper(array('form', 'url'));

				   
        $this->load->library('form_validation');
		$this->load->view('header_view');
		$this->load->view('login_view');
		$this->load->view('footer_view');
	}


	public function login_usuario(){
		$respuesta=array();
		if($this->validata_login()){
			$login = $this->login->logeo_usuario($this->input->post());
			if($login){
				$this->load->view('header_view');
			    	$this->load->view('login_view');
		$this->load->view('footer_view');
			}
			else{
				$respuesta['msg'] = "Incorrecto";
				$respuesta['estado'] = false;
				$respuesta['errores'] = array();
			}

		}
	}

	/**
	*realizar validacion de los datos de usuario para realizar login
	*/
	public function validata_login(){
		return true;
	}



}
