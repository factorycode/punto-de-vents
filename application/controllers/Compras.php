<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {
	//aqui resibe los permisos disponibes que bienen desde el script backend_lib que se encuentra en la carpera libreias 
    private $permisos;
    public function __construct(){ 
        parent::__construct();
        $this->permisos = $this->backend_lib->control();
          }

	public function index()
	{ 
		if ($this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			 $permisos=$this->permisos;
			$datos = $this->Compras_model->getCompras();

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('compras/lista',compact('datos','permisos'));
		$this->load->view('includes/footer');
	}
	public function add(){
		$data = array(
			"tipocomprobantes" => $this->Ventas_model->getComprobantes(),
			"proveedores" => $this->Proveedores_model->getProveedor(),
			"productos" => $this->Inventario_model->getInventario(),
			"permisos" => $this->permisos,
		);
		
         
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view("compras/add",$data);
		$this->load->view("includes/footer");
	}
	public function comprar(){
	if ($this->session->userdata('id_usuario') != "")
		{
		if ($this->form_validation->run("addstore")) { 

		$subtotal = $this->input->post("subtotal");
		$iva = $this->input->post("iva");
		$descuento = $this->input->post("descuento");
		$total = $this->input->post("total");
		$id_comprobante = $this->input->post("id_comprobante");
		$id_proveedor = $this->input->post("id_proveedor");
		$id_usuario = $this->session->userdata('id_usuario');
		$numero = $this->input->post("numero");
		$serie = $this->input->post("serie");

		$id_productos = $this->input->post("id_productos");
		$id_escuelas = $this->input->post("id_escuelas");
		//print_r($id_escuelas);exit; 
		$precios = $this->input->post("precios");
		$cantidades = $this->input->post("cantidades");
		$importes = $this->input->post("importes");
		$data = array(
			'subtotal' => $subtotal,
			'iva' => $iva,
			'descuento' => $descuento,
			'total' => $total,
			'id_comprobante' => $id_comprobante,
			'id_proveedor' => $id_proveedor,
			'id_usuario' => $id_usuario,
			'numero_documento' => $numero,
			'serie' => $serie,
		);
				
		if ($this->Compras_model->save($data)) {
			$id_compra = $this->Compras_model->lastID();
			//print_r($id_compra);exit;
			$this->updateComprobante($id_comprobante);
			$this->save_detalle($id_productos,$id_compra,$id_escuelas,$precios,$cantidades,$importes);
			$this->session->set_flashdata('css','success');
            $this->session->set_flashdata('mensaje','La compra se ha agregado con exito.');
			redirect(base_url()."compras");
		}

		}else{
			redirect(base_url()."compras/add");
		}
		}else
		{
			redirect(base_url()."login");
		}
	}

	protected function updateComprobante($id_comprobante){
		$comprobanteActual = $this->Compras_model->getComprobante($id_comprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);
		$this->Compras_model->updateComprobante($id_comprobante,$data);
	}
	protected function save_detalle($productos,$id_compra,$id_escuelas,$precios,$cantidades,$importes){

		for ($i=0; $i < count($productos); $i++) {

			$data  = array(
				'id_producto' => $productos[$i],
				'id_compra'=>$id_compra,
				'id_escuela'=>$id_escuelas[$i],
				'precio'=>$precios[$i],
				'cantidad'=>$cantidades[$i],
				'importe' =>$importes[$i],

			);

            // print_r($data);exit; 
			//guardar detalle de la compra en la tabla detalles_compra
			$this->Compras_model->save_detalle($data);
			//funcion para actulizar el stock
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}
		protected function updateProducto($id_producto,$cantidad){
			//se optiene los inventarios de la tabla inventarios 
		$productoActual = $this->Inventario_model->getProducto($id_producto);
		
		$data = array(
			'stock' => $productoActual->stock + $cantidad, 
		);
		//print_r($data);exit;
		$this->Inventario_model->update($id_producto,$data);
	}
	public function view(){
		if ( $this->session->userdata('id_usuario') != "")
		{ 
		$id_compra = $this->input->post("id_compra");
		$data = array(
			"compra" => $this->Compras_model->getCompra($id_compra),
			"detalles" =>$this->Compras_model->getDetalle($id_compra)
		);
		}else
		{
			redirect(base_url()."login");
		}
		$this->load->view("compras/view",$data);
	}

	
}
