<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller
 {
 	//aqui resibe los permisos disponibes que bienen desde el script backend_lib que se encuentra en la carpera libreias 
    private $permisos;
    public function __construct(){ 
        parent::__construct();
        $this->permisos = $this->backend_lib->control();
          }

	public function index()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			$permisos=$this->permisos;
			$datos = $this->Ventas_model->getVentas();

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('ventas/index', compact('datos','permisos'));
		$this->load->view('includes/footer');
	}
	public function add()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
//datos = $this->ventas_model->getVentas();
			//clinetes para el modal buscar 
			$datos = $this->Clientes_model->getClientes();
         //obtener lista de produtos y mandaloir a la ventana modal de la vista agregar un producto
			$productos = $this->Inventario_model->getInventario();
         //obtener descuentos y mandarlos a la vista add 
			$tipocomprobantes = $this->Impuestos_model->getImpuesto();
         //obtener descuentos y mandarlos a la vista add para seleccionar impuesto 
			$descuentos =$this->Descuentos_model->getDescuentos();
			$permisos=$this->permisos;


		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('ventas/add', compact('datos','productos','tipocomprobantes','descuentos','permisos'));
		$this->load->view('includes/footer');
	}
	public function getproductos(){
		$valor = $this->input->post("valor");
		$clientes = $this->Ventas_model->getproductos($valor);
		echo json_encode($clientes);

	}
	public function store(){
		if ($this->session->userdata('id_usuario') != "")
		{
			if ($this->form_validation->run("addstore")) { 

				$subtotal = $this->input->post("subtotal");
				$iva = $this->input->post("iva");
				$descuento = $this->input->post("descuento");
				$total = $this->input->post("total");
				$id_comprobante = $this->input->post("id_comprobante");
				$id_cliente = $this->input->post("id_cliente");
				$id_usuario = $this->session->userdata('id_usuario');
				$id_escuela = $this->input->post("id_escuela");
				$numero = $this->input->post("numero");
				$serie = $this->input->post("serie");

				$id_productos = $this->input->post("id_productos");
	            //	print_r($id_productos);exit;
				$precios = $this->input->post("precios");
				$cantidades = $this->input->post("cantidades");
				$importes = $this->input->post("importes");

				$data = array(
					'subtotal' => $subtotal,
					'iva' => $iva,
					'descuento' => $descuento,
					'total' => $total,
					'id_comprobante' => $id_comprobante,
					'id_cliente' => $id_cliente,
					'id_usuario' => $id_usuario,
					'id_escuela' =>$id_escuela,
					'num_documento' => $numero,
					'serie' => $serie,
				);

				if ($this->Ventas_model->save($data)) {
					$id_venta = $this->Ventas_model->lastID();
			//print_r($id_venta);exit;
					$this->updateComprobante($id_comprobante);
					$this->save_detalle($id_productos,$id_venta,$precios,$cantidades,$importes);
					redirect(base_url()."ventas/ticket/".$id_venta);

				}

			}else{
				redirect(base_url()."ventas/add");
			}
		}else
		{
			redirect(base_url()."login");
		}
	}

	protected function updateComprobante($id_comprobante){
		$comprobanteActual = $this->Ventas_model->getComprobante($id_comprobante);
		$data  = array(
			'cantidad' => $comprobanteActual->cantidad + 1, 
		);
		$this->Ventas_model->updateComprobante($id_comprobante,$data);
	}
	protected function save_detalle($productos,$id_venta,$precios,$cantidades,$importes){
		for ($i=0; $i < count($productos); $i++) { 
			$data  = array(
				'id_producto' => $productos[$i], 
				'id_venta' => $id_venta,
				'precio' => $precios[$i],
				'cantidad' => $cantidades[$i],
				'importe'=> $importes[$i],
			);

			//guardar detalle de la venta en la tabla detalles_venta
			$this->Ventas_model->save_detalle($data);
			//funcion para actulizar el stock
			$this->updateProducto($productos[$i],$cantidades[$i]);

		}
	}
	protected function updateProducto($id_producto,$cantidad){
		$productoActual = $this->Inventario_model->getProducto($id_producto);
		
		$data = array(
			'stock' => $productoActual->stock - $cantidad, 
		);
		//print_r($data);exit;
		$this->Inventario_model->update($id_producto,$data);
	}
	public function view(){
		if ( $this->session->userdata('id_usuario') != "")
		{ 
		$id_venta = $this->input->post("id_venta"); 
		$data = array(
			"venta" => $this->Ventas_model->getVenta($id_venta),
			"detalles" =>$this->Ventas_model->getDetalle($id_venta)
		);

		}else
		{
			redirect(base_url()."login");
		}
		$this->load->view("ventas/view",$data);
	}
	public function ticket($id_venta){
		if ( $this->session->userdata('id_usuario') != "")
		{ 

		$venta= $this->Ventas_model->getVenta($id_venta);
		$detalles = $this->Ventas_model->getDetalle($id_venta);
		
		//print_r($data); 
		

  }else
		{
			redirect(base_url()."login");
		}
		
		$this->load->view('ventas/ticket',compact('venta','detalles'));
		
	}

}