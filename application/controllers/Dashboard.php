<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			$data = array(
			"cantVentas" => $this->Backend_model->rowCount("ventas"),
			"cantUsuarios" => $this->Backend_model->rowCount("usuarios"),
			"cantClientes" => $this->Backend_model->rowCount("clientes"),
			"cantProductos" => $this->Backend_model->rowCount("productos"),
			'years' => $this->Ventas_model->years()
		);
			//print_r($data);

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('dashboard/index', $data);
		$this->load->view('includes/footer');
	}
	public function getData()
	{
   $year = $this->input->post("year");
	$resultados = $this->Ventas_model->montos($year);
		echo json_encode($resultados);
	}
	
}
