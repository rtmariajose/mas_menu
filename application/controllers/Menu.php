<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

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
                $this->load->model("usuario_model","usuario");
				$this->load->model("producto_model","producto");
                
               
        }

	public function index()
	{
 		$this->load->helper(array('form', 'url'));
		 $this->load->library('form_validation');
		 
		$data["css"] = array(base_url()."/assets/css/menu.css",base_url()."/assets/css/cliente.css");
 		$data["script"] = array(base_url()."/assets/js/menu.js",base_url()."/assets/js/cliente.js");

		$this->load->view('header_view',$data);
		$this->load->view('menu_view');
		$this->load->view('footer_view',$data);
		
	}


	/**
	* Menu para productos del menu 
	*/		
	public function menu_base($vista_menu){
	
		$this->load->helper(array('form', 'url'));
 		$data["css"] = array(base_url()."/assets/css/menu.css",base_url()."/assets/css/cliente.css");
 		$data["script"] = array(base_url()."/assets/js/menu.js",base_url()."/assets/js/cliente.js");

		$html = "";
		 if(isset($vista_menu) && !empty($vista_menu)){
			$data['vista_menu'] = $vista_menu;
			 
			 if($vista_menu == 1){
				$data['tipo_producto'] = $this->producto->get_tipo_producto();
			 	$data['categoria_producto'] = $this->producto->get_categoria_producto();
				$data['unidad_producto'] = $this->producto->get_unidad_producto();
				$html = $this->load->view('productos/ingreso_view',$data,true);
			 }else if($vista_menu == 2){
				 $data['id_boton_guardar'] = 'id="btnBuscarProductoUpdate"';
				$html = $this->load->view('productos/buscar_view',$data,true);
			 }else if($vista_menu == 3){
				 $data['id_boton_guardar'] = 'id="btnBuscarProducto"';
				$html = $this->load->view('productos/buscar_view',$data,true);
			 }else if($vista_menu == 4){
				 $data['tipo_producto'] = $this->producto->get_tipo_producto();
			 	$data['categoria_producto'] = $this->producto->get_categoria_producto();
				$data['unidad_producto'] = $this->producto->get_unidad_producto();
				$html = $this->load->view('productos/ingreso_view',$data,true);
			 }else if($vista_menu == 5){
				 $data['id_boton_guardar'] = 'id="btnBuscarProductoDelete"';
				$html = $this->load->view('productos/buscar_view',$data,true);
			 }
		 }
		$data['contenido_menu'] = $html;
		$data['clase_usuarios'] = '';
		$data['clase_productos'] = 'active';
		$data['clase_produccion'] = '';
		$data['clase_ventas'] = '';
		$data['clase_clientes'] = '';
		$data['clase_egresos'] = '';
		$data['clase_proveedores'] = '';
		$data['clase_reporte'] = '';

		$this->load->view('header_view',$data);
		$this->load->view('menu_base_view',$data);
		$this->load->view('footer_view',$data);
	}


	/**
	* Menu para clientes en el menu principal
	**/
	function menu_cliente($vista_menu){
	$this->load->helper(array('form', 'url'));
 		$data["css"] = array(base_url()."/assets/css/menu.css",base_url()."/assets/css/cliente.css");
 		$data["script"] = array(base_url()."/assets/js/menu.js",base_url()."/assets/js/cliente.js");

		$html = "";
		 if(isset($vista_menu) && !empty($vista_menu)){
			$data['vista_menu'] = $vista_menu;
			 
			 if($vista_menu == 1){
				
				$html = $this->load->view('cliente/ingreso_view',null,true);
			 }else if($vista_menu == 2){
				 $data['id_boton_guardar'] = 'id="btnBuscarClienteUpdate"';
				$html = $this->load->view('cliente/buscar_view',$data,true);
			 }else if($vista_menu == 3){
				 $data['id_boton_guardar'] = 'id="btnBuscarCliente"';
				$html = $this->load->view('cliente/buscar_view',$data,true);
			 }else if($vista_menu == 4){
				$data['id_boton_guardar'] = 'id="btnBuscarClienteDelete"';
				$html = $this->load->view('cliente/buscar_view',$data,true);
			 }else if($vista_menu == 5){
				 
				$html = $this->load->view('cliente/buscar_view',$data,true);
			 }
		 }
		$data['contenido_menu'] = $html;

		  $data['clase_usuarios'] = '';
		$data['clase_productos'] = '';
		$data['clase_produccion'] = '';
		$data['clase_ventas'] = '';
		$data['clase_clientes'] = 'active';
		$data['clase_egresos'] = '';
		$data['clase_proveedores'] = '';
		$data['clase_reporte'] = '';
		$this->load->view('header_view',$data);
		$this->load->view('menu_base_view',$data);
		$this->load->view('footer_view',$data);
	}


/**	
	* Menu para clientes en el menu principal
	**/
	function menu_proveedor($vista_menu){
	$this->load->helper(array('form', 'url'));
 		$data["css"] = array(base_url()."/assets/css/menu.css",base_url()."/assets/css/proveedor.css");
 		$data["script"] = array(base_url()."/assets/js/menu.js",base_url()."/assets/js/proveedor.js");

		$html = "";
		 if(isset($vista_menu) && !empty($vista_menu)){
			$data['vista_menu'] = $vista_menu;
			 
			 if($vista_menu == 1){
				
				$html = $this->load->view('proveedor/ingreso_view',null,true);
			 }else if($vista_menu == 2){
				 $data['id_boton_guardar'] = 'id="btnBuscarProveedorUpdate"';
				$html = $this->load->view('proveedor/buscar_view',$data,true);
			 }else if($vista_menu == 3){
				 $data['id_boton_guardar'] = 'id="btnBuscarProveedor"';
				$html = $this->load->view('proveedor/buscar_view',$data,true);
			 }else if($vista_menu == 4){
				$data['id_boton_guardar'] = 'id="btnBuscarProveedorDelete"';
				$html = $this->load->view('proveedor/buscar_view',$data,true);
			 }
		 }
		$data['contenido_menu'] = $html;
  		$data['clase_usuarios'] = '';
		$data['clase_productos'] = '';
		$data['clase_produccion'] = '';
		$data['clase_ventas'] = '';
		$data['clase_clientes'] = '';
		$data['clase_egresos'] = '';
		$data['clase_proveedores'] = 'active';
		$data['clase_reporte'] = '';
		$this->load->view('header_view',$data);
		$this->load->view('menu_base_view',$data);
		$this->load->view('footer_view',$data);
		$this->load->view('header_view',$data);
		$this->load->view('menu_base_view',$data);
		$this->load->view('footer_view',$data);
	}


	function menu_produccion($vista_menu){
		$this->load->helper(array('form', 'url'));
 		$data["css"] = array(base_url()."/assets/css/menu.css",base_url()."/assets/css/produccion.css");
 		$data["script"] = array(base_url()."/assets/js/produccion.js");

		$html = "";
		 if(isset($vista_menu) && !empty($vista_menu)){
			$data['vista_menu'] = $vista_menu;
			 
			 if($vista_menu == 1){
			 	$data['categoria_producto'] = $this->producto->get_categoria_producto();
				$data['unidad_producto'] = $this->producto->get_unidad_producto();
				$html = $this->load->view('produccion/ingreso_view',$data,true);
			 }else if($vista_menu == 2){
				 $data['id_boton_guardar'] = 'id="btnBuscarProductoUpdate"';
				$html = $this->load->view('produccion/buscar_view',$data,true);
			 }else if($vista_menu == 3){
				 $data['id_boton_guardar'] = 'id="btnBuscarProducto"';
				$html = $this->load->view('produccion/buscar_view',$data,true);
			 }else if($vista_menu == 4){
				 $data['id_boton_guardar'] = 'id="btnBuscarProductoDelete"';
				 $html = $this->load->view('produccion/buscar_view',$data,true);
			 }
		 }
		$data['contenido_menu'] = $html;
		$data['clase_usuarios'] = '';
		$data['clase_productos'] = '';
		$data['clase_produccion'] = 'active';
		$data['clase_ventas'] = '';
		$data['clase_clientes'] = '';
		$data['clase_egresos'] = '';
		$data['clase_proveedores'] = '';
		$data['clase_reporte'] = '';

		$this->load->view('header_view',$data);
		$this->load->view('menu_base_view',$data);
		$this->load->view('footer_view',$data);
	}

	/**
	*
	*/
	function menu_ventas($vista_menu){
		$this->load->helper(array('form', 'url'));
 		$data["css"] = array(base_url()."/assets/css/menu.css",base_url()."/assets/css/ventas");
 		$data["script"] = array(base_url()."/assets/js/ventas.js",base_url()."/assets/js/bootstrap-typeahead.js");

		$html = "";
		 if(isset($vista_menu) && !empty($vista_menu)){
			$data['vista_menu'] = $vista_menu;
			 
			 if($vista_menu == 1){
			 	
				$html = $this->load->view('ventas/ingreso_view',$data,true);
			 }else if($vista_menu == 2){
				 $data['id_boton_guardar'] = 'id="btnBuscarProductoUpdate"';
				$html = $this->load->view('produccion/buscar_view',$data,true);
			 }else if($vista_menu == 3){
				 $data['id_boton_guardar'] = 'id="btnBuscarProducto"';
				$html = $this->load->view('produccion/buscar_view',$data,true);
			 }else if($vista_menu == 4){
				 $data['id_boton_guardar'] = 'id="btnBuscarProductoDelete"';
				 $html = $this->load->view('produccion/buscar_view',$data,true);
			 }
		 }
		$data['contenido_menu'] = $html;
		$data['clase_usuarios'] = '';
		$data['clase_productos'] = '';
		$data['clase_produccion'] = '';
		$data['clase_ventas'] = 'active';
		$data['clase_clientes'] = '';
		$data['clase_egresos'] = '';
		$data['clase_proveedores'] = '';
		$data['clase_reporte'] = '';

		$this->load->view('header_view',$data);
		$this->load->view('menu_base_view',$data);
		$this->load->view('footer_view',$data);
	}

	function menu_reporte($vista_menu){
		//4
	}

	function menu_egresos($vista_menu){

	}

	function menu_usuarios(){
		
	}


	
}
