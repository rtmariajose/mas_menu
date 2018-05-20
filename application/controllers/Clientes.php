<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

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

	  public function __construct()
        {
                parent::__construct();
                
				$this->load->model("cliente_model","cliente");
				$this->load->library('form_validation');
                
               
        }


	public function index()
	{
	
	}

	/**
	* Ingreso de nuevos clientes
	*/
	public function ingresar_nuevocliente(){
		$response = array();
		if($this->_validacion_cliente()){
		
		    $resultado = $this->cliente->guardarCliente($this->input->post());
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = 'Se Ingreso el Cliente correctamente.';
			}else{
				$response['errors'] = array();
				$response['status'] = false;
				$response['type'] = "danger";
				$response['mensaje'] = 'No se ingreso el Cliente.';
			}

			
		}else {
		//		var_dump("HLOLLAAA NOOO valido");
			$response['errors']= validation_errors();
			$response['status'] = false;
			$response['type'] = "danger";
			$response['mensaje'] = 'No se pudo ingresar';
		}

	 
		$this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
	}

	public function actualizarCliente(){
		
	}

	/**
	*
	*/
	public function buscar_cliente(){
		$response = array();
		if($this->_validacion_busqueda_cliente()){
			$resultado = $this->cliente->buscarCliente($this->input->post());
			
			$resul['data'] = $resultado;
			$resul['tipo'] = $this->input->post('tipo_buscar');
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = '';
				if($this->input->post('tipo_buscar') == 2)
					$response['html'] = $this->load->view('cliente/tabla_cliente_view',$resul,true);
				else if($this->input->post('tipo_buscar') == 3)
					$response['html'] = $this->load->view('cliente/tabla_reduc_cliente_view',$resul,true);	
				else 
					$response['html'] = $this->load->view('cliente/tabla_reduc_cliente_view',$resul,true);	
			}else{
				$response['errors'] = array();
				$response['status'] = false;
				$response['type'] = "danger";
				$response['mensaje'] = 'No se pudo realizar la busqueda.';
				$response['html'] = "";
			}
		}else{
			$response['errors']= validation_errors();
			$response['status'] = false;
			$response['type'] = "danger";
			$response['mensaje'] = 'No se pudo ingresar';
			$response['html'] = "";
		}

			$this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
	}


	function elimina_cliente(){
	$response = array();
				
	$resultado = $this->cliente->eliminarCliente($this->input->post());
		if($resultado){
			$response['errors'] = array();
			$response['status'] = true;
			$response['type'] = "success";
			$response['mensaje'] = 'Se elimino el cliente correctamente.';
		}else{
			$response['errors'] = array();
			$response['status'] = false;
			$response['type'] = "danger";
			$response['mensaje'] = 'No se elimino el cliente.';
		}

			

		$this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
}

	/**
	*
	*/
	function edicion_cliente(){
        $response = array();
	//	$resul['tipo_producto'] = $this->producto->get_tipo_producto();
	//	$resul['categoria_producto'] = $this->producto->get_categoria_producto();
		$resultado = $this->cliente->buscarClientePorId($this->input->post("identificador"));

	
		if($resultado){
		  $resul['data'] = $resultado;
			//var_dump("Resultadoo *** ".$resultado);
			$response['html'] = $this->load->view('cliente/actualiza_view',$resul,true);
		
		}
		
	    $this->output->set_content_type('application/json')
                     ->set_output(json_encode($response));
	}

	function actualizacion_cliente(){
		$response = array();
		if($this->_validacion_cliente()){
					
		    $resultado = $this->cliente->actualizaCliente($this->input->post());
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = 'Se actualizo el cliente correctamente.';
			}else{
				$response['errors'] = array();
				$response['status'] = false;
				$response['type'] = "danger";
				$response['mensaje'] = 'No se actualizo el cliente.';
			}

			
		}else {
		//		var_dump("HLOLLAAA NOOO valido");
			$response['errors']= validation_errors();
			$response['status'] = false;
			$response['type'] = "danger";
			$response['mensaje'] = 'No se pudo ingresar';
		}

	 
		$this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
	}

	function _validacion_cliente(){
		$this->form_validation->set_rules('txtrut', 'Rut Cliente', 'required'); //callback_username_check
        $this->form_validation->set_rules('txtdv', 'Dv Cliente', 'required');
		$this->form_validation->set_rules('txtNombres', 'Nombres Cliente', 'required');
		$this->form_validation->set_rules('txtApellidoPat', 'Apellido Paterno Cliente', 'required');
		$this->form_validation->set_rules('txtApellidoMat', 'Apellido Materno Cliente', 'required');
		$this->form_validation->set_rules('txtPuntos', 'Puntos Cliente', 'required');
	//	$this->form_validation->set_rules('txtfechanac', 'Fecha Nacimiento Cliente', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                      // $this->form_validation->set_message('_validacion_producto', 'The {field} field can not be the word "test"');
					   return false;
                }else{
					return true;
				}

	}


	function _validacion_busqueda_cliente(){
		$this->form_validation->set_rules('txtRutBusqueda', 'Rut Cliente', 'required'); //callback_username_check
        $this->form_validation->set_rules('txtDvBusqueda', 'Dv Cliente', 'required');

		if ($this->form_validation->run() == FALSE)
                {
                      // $this->form_validation->set_message('_validacion_producto', 'The {field} field can not be the word "test"');
					   return false;
                }else{
					return true;
				}

	}
}
