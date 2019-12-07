<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos extends CI_Controller {

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
    	$data  = array(
    		'per'=>$this->permisos,
			'permisos' => $this->Permisos_model->getPermisos(),
		);
			//print_r($data);

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('permisos/list',$data);
		$this->load->view('includes/footer');
	}
	public function add()
	{ 
		 if ( $this->session->userdata('id_usuario') != "")
		{
    	//contenido
         	$data  = array(
			'roles' => $this->Permisos_model->getRoles(), 
			'menus' => $this->Permisos_model->getMenus(), 
		);

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('permisos/add',$data);
		$this->load->view('includes/footer');
	}

	public function addPermiso(){
		if ( $this->session->userdata('id_usuario') != "")
		{
		$menu = $this->input->post("menu");
		$rol = $this->input->post("rol");
		$insert = $this->input->post("insert");
		$read = $this->input->post("read");
		$update = $this->input->post("update");
		$delete = $this->input->post("delete");

		$data = array(
			"menu_id" => $menu,
			"rol_id" => $rol,
			"read" => $read,
			"insert" => $insert,
			"update" => $update,
			"delete" => $delete,
		);

		if ($this->Permisos_model->save($data)) {
			redirect(base_url()."permisos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."permisos/add");
		}
		}else
		{
			redirect(base_url()."login");
		}
		
	}
	public function edit($id){
		if ( $this->session->userdata('id_usuario') != "")
		{

		$data  = array(
			'roles' => $this->Permisos_model->getRoles(), 
			'menus' => $this->Permisos_model->getMenus(), 
			'permiso' => $this->Permisos_model->getPermiso($id)
		);
		//print_r($data);
		}else
		{
			redirect(base_url()."login");
		}
		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('permisos/edit',$data);
		$this->load->view('includes/footer');

			}
			public function update()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
		$idpermiso = $this->input->post("idpermiso");
		$menu = $this->input->post("menu");
		$rol = $this->input->post("rol");
		$insert = $this->input->post("insert");
		$read = $this->input->post("read");
		$update = $this->input->post("update");
		$delete = $this->input->post("delete");

		$data = array(
			"read" => $read,
			"insert" => $insert,
			"update" => $update,
			"delete" => $delete,
		);

		if ($this->Permisos_model->update($idpermiso,$data)) {
			redirect(base_url()."permisos");
		}else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."permisos/edit/".$idpermiso);
		}
		}else
		{
			redirect(base_url()."login");
		}
	}
	public function delete($id){
		$this->Permisos_model->delete($id);
		redirect(base_url()."permisos");
	}

	

}
