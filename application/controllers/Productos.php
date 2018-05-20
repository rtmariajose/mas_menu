<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {

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
                
				$this->load->model("producto_model","producto");
				$this->load->library('form_validation');
                
               
        }

	public function index()
	{
	
		 
	}

	/**
	* Ingreso de productos a la BD
	*/
	function ingresar_producto(){
		
		$response = array();
		if($this->_validacion_producto()){
		
		    $resultado = $this->producto->guardarProducto($this->input->post());
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = 'Se Ingreso el producto correctamente.';
			}else{
				$response['errors'] = array();
				$response['status'] = false;
				$response['type'] = "danger";
				$response['mensaje'] = 'No se ingreso el producto.';
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

	function buscar_producto(){
		$response = array();
		if($this->_validacion_busqueda_producto()){
			$resultado = $this->producto->buscarProducto($this->input->post());
			$resul['data'] = $resultado;
			$resul['tipo'] = $this->input->post('tipo_buscar');
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = '';
				if($this->input->post('tipo_buscar') == 2)
					$response['html'] = $this->load->view('productos/tabla_producto_view',$resul,true);
				else if($this->input->post('tipo_buscar') == 3)
					$response['html'] = $this->load->view('productos/tabla_reduc_producto_view',$resul,true);	
				else 
					$response['html'] = $this->load->view('productos/tabla_reduc_producto_view',$resul,true);	
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
 
    /**
	* 
	*/
	function edicion_producto(){
		$response = array();
		$resul['categoria_producto'] = $this->producto->get_categoria_producto();
		$resul['unidad_producto'] = $this->producto->get_unidad_producto();
		$resultado = $this->producto->buscarProductoPorId($this->input->post("identificador"));

	
		if($resultado){
		  $resul['data'] = $resultado;
			//var_dump("Resultadoo *** ".$resultado);
			$response['html'] = $this->load->view('produccion/actualiza_view',$resul,true);
		
		}
		
	    $this->output->set_content_type('application/json')
                     ->set_output(json_encode($response));
	}



/**
*Metodo para realizar actualizacion final de la BD
*/
function actualizacion_producto(){
	$response = array();
		if($this->_validacion_producto()){
					
		    $resultado = $this->producto->actualizaProducto($this->input->post());
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = 'Se actualizo el producto correctamente.';
			}else{
				$response['errors'] = array();
				$response['status'] = false;
				$response['type'] = "danger";
				$response['mensaje'] = 'No se actualizo el producto.';
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

function elimina_producto(){
	$response = array();
				
	$resultado = $this->producto->eliminarProducto($this->input->post());
		if($resultado){
			$response['errors'] = array();
			$response['status'] = true;
			$response['type'] = "success";
			$response['mensaje'] = 'Se elimino el producto correctamente.';
		}else{
			$response['errors'] = array();
			$response['status'] = false;
			$response['type'] = "danger";
			$response['mensaje'] = 'No se elimino el producto.';
		}

			

		$this->output->set_content_type('application/json')
             ->set_output(json_encode($response));
}



		/**
    * Validacion para los formularios de ingreso y ediccion de productos
	*/
	public function _validacion_producto(){
		$this->form_validation->set_rules('textcodigo', 'Codigo Producto', 'required'); //callback_username_check
        $this->form_validation->set_rules('textdescrip', 'Descripcion Producto', 'required');
		$this->form_validation->set_rules('txtcantidad', 'Cantidad Producto', 'required');
		$this->form_validation->set_rules('txtstockminimo', 'Stock Minimo Producto', 'required');
		$this->form_validation->set_rules('txtstockmaximo', 'Stock Maximo Producto', 'required');
		$this->form_validation->set_rules('select_tipoproducto', 'Tipo de Producto', 'required');
		$this->form_validation->set_rules('select_categoriaproducto', 'Categoria de Producto', 'required');
		$this->form_validation->set_rules('txtfechanac', 'Vecha Vencimiento Producto', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                      // $this->form_validation->set_message('_validacion_producto', 'The {field} field can not be the word "test"');
					   return false;
                }else{
					return true;
				}

			
                
	}

	public function _validacion_producto_masmenu(){
		$this->form_validation->set_rules('textcodigo', 'Codigo Producto', 'required'); //callback_username_check
        $this->form_validation->set_rules('textdescrip', 'Descripcion Producto', 'required');
		$this->form_validation->set_rules('txtcantidad', 'Cantidad Producto', 'required');
		$this->form_validation->set_rules('txtstockminimo', 'Stock Minimo Producto', 'required');
		$this->form_validation->set_rules('txtPrecio', 'Valor o Precio  Producto', 'required');
		
		$this->form_validation->set_rules('select_categoriaproducto', 'Categoria de Producto', 'required');
		$this->form_validation->set_rules('select_unidadproducto', 'Unidad de Producto', 'required');
		
		$this->form_validation->set_rules('txtfechanac', 'Vecha Vencimiento Producto', 'required');

                if ($this->form_validation->run() == FALSE)
                {
                      // $this->form_validation->set_message('_validacion_producto', 'The {field} field can not be the word "test"');
					   return false;
                }else{
					return true;
				}

			
                
	}

	/**
	* validacion del formulario simple de busqueda
	*/
	public function _validacion_busqueda_producto(){
		$this->form_validation->set_rules('textdescripcion', 'Texto de busqueda', 'required'); //callback_username_check
	

                if ($this->form_validation->run() == FALSE)
                {
                      // $this->form_validation->set_message('_validacion_producto', 'The {field} field can not be the word "test"');
					   return false;
                }else{
					return true;
				}
	}

	    /**
		*
		*
		*/
	public function _validacion_busqueda_producto_produc(){
		$this->form_validation->set_rules('textdescripcion', 'Texto de busqueda', 'required'); //callback_username_check
	

                if ($this->form_validation->run() == FALSE)
                {
                      // $this->form_validation->set_message('_validacion_producto', 'The {field} field can not be the word "test"');
					   return false;
                }else{
					return true;
				}
	}


	public function ingresar_producto_mm(){
		$response = array();
		if($this->_validacion_producto_masmenu()){
		
		    $resultado = $this->producto->guardarProducto($this->input->post(),2);
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = 'Se Ingreso el producto correctamente el producto mas menu.';
			}else{
				$response['errors'] = array();
				$response['status'] = false;
				$response['type'] = "danger";
				$response['mensaje'] = 'No se ingreso el producto.';
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


	function buscar_producto_produccion(){
	$response = array();
		if($this->_validacion_busqueda_producto_produc()){
			$resultado = $this->producto->buscarProductoMasMenu($this->input->post());
			$resul['data'] = $resultado;
			$resul['tipo'] = $this->input->post('tipo_buscar');
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = '';
				if($this->input->post('tipo_buscar') == 2)
					$response['html'] = $this->load->view('produccion/tabla_producto_view',$resul,true);
				else if($this->input->post('tipo_buscar') == 3)
					$response['html'] = $this->load->view('produccion/tabla_reduc_producto_view',$resul,true);	
				else 
					$response['html'] = $this->load->view('produccion/tabla_reduc_producto_view',$resul,true);	
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

/**
*
*/
function edicion_producto_produccion(){
		$response = array();
		
		$resultado = $this->producto->buscarProductoPorId($this->input->post("identificador"));
		if($resultado){
		  $resul['tipo_producto'] = $this->producto->get_tipo_producto();
		  $resul['categoria_producto'] = $this->producto->get_categoria_producto();
		  $resul['unidad_producto'] = $this->producto->get_unidad_producto();
		  $resul['data'] = $resultado;
			//var_dump("Resultadoo *** ".$resultado);
			$response['html'] = $this->load->view('produccion/actualiza_view',$resul,true);
		
		}
		
	    $this->output->set_content_type('application/json')
                     ->set_output(json_encode($response));
}

function actualizacion_producto_produccion(){
		$response = array();
		if($this->_validacion_producto_masmenu()){
					
		    $resultado = $this->producto->actualizaProductoMM($this->input->post());
			if($resultado){
				$response['errors'] = array();
				$response['status'] = true;
				$response['type'] = "success";
				$response['mensaje'] = 'Se actualizo el producto correctamente.';
			}else{
				$response['errors'] = array();
				$response['status'] = false;
				$response['type'] = "danger";
				$response['mensaje'] = 'No se actualizo el producto.';
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

	
}
