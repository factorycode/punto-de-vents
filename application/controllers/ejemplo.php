<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('admin/index');
		$this->load->view('includes/footer');
	}
	
}
