<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
        //aqui resibe los permisos disponibes que bienen desde el script backend_lib que se encuentra en la carpera libreias 
    private $permisos;
    public function __construct(){ 
        parent::__construct();
        $this->permisos = $this->backend_lib->control();
          }
    public function index()
    {
        if ( $this->session->userdata('id_usuario') != "") {
            //contenido
            $data = array(
                'permisos'=> $this->permisos,
                'usuarios' => $this->Usuarios_model->getUsuarios()
            );
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('usuarios/lista', $data);
        $this->load->view('includes/footer');
    }
    public function add()
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            $data = $this->Usuarios_model->getRol();
            
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('usuarios/add', compact('data'));
        $this->load->view('includes/footer');
    }
    public function addUser()
    {
        if ($this->session->userdata('id_usuario') != ""){
        $nombres   = $this->input->post("nombres");
        $apellidos = $this->input->post("apellidos");
        $telefono  = $this->input->post("telefono");
        $email     = $this->input->post("email");
        $password  = $this->input->post("password");
        $rol       = $this->input->post("rol");
        
        $data = array(
            'nombre' => $nombres,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'correo' => $email,
            'password' => sha1($password),
            'privilegio' => $rol,
            'estado' => "1"
        );
         } else {
            redirect(base_url() . "login");
        }

        
        if ($this->Usuarios_model->save($data)) {
            redirect(base_url() . "usuarios");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "administrador/usuarios/add");
        }
        
        
    }
    
    public function edit($id_usuario)
    {
        if ( $this->session->userdata('id_usuario') != "")
        { 

        $datos = $this->Usuarios_model->getUsuarioPorid($id_usuario);
        $roles = $this->Usuarios_model->getRol();
        if ($this->input->post()) {
            if ($this->form_validation->run("addUser")) {
        $nombres   = $this->input->post("nombre");
        $apellidos = $this->input->post("apellidos");
        $telefono  = $this->input->post("telefono");
        $correo     = $this->input->post("correo");
        $password  = $this->input->post("password");
        $rol       = $this->input->post("rol");
        
        $data = array(
            'nombre' => $nombres,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'correo' => $correo,
            'password' => sha1($password),
            'privilegio' => $rol,
            'estado' => "1"
        );
                $guardar = $this->Usuarios_model->modificar_usuario($data, $id_usuario);
                if ($guardar) {
                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'Se ha editado el registro exitosamente.');
                    redirect(base_url() . 'usuarios');
                } else {
                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                    redirect(base_url() . 'usuarios/edit/' . $id_cliente, 301);
                }
                }else
        {
            redirect(base_url()."login");
        }
            }
        }
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('usuarios/edit', compact('datos', 'roles'));
        $this->load->view('includes/footer');
    }
    
    public function delete($id_usuario = null)
    {
        if (!$id_usuario) {
            show_404();
        }
        $data = array(
            'estado' => '0'
        );
        $this->Usuarios_model->modificar_usuario($data, $id_usuario);
        $this->session->set_flashdata('css', 'danger');
        $this->session->set_flashdata('mensaje', 'Se ha borrado el registro exitosamente.');
        
        
        redirect(base_url() . "usuarios", 310);
        
    }
     public function altaUser($id_usuario = null)
    {
        if (!$id_usuario) {
            show_404();
        }
        $data = array(
            'estado' => '1'
        );
        $this->Usuarios_model->modificar_usuario($data, $id_usuario);
        $this->session->set_flashdata('css', 'success');
        $this->session->set_flashdata('mensaje', 'Se ha dado de alta el registro exitosamente.');
        
        
        redirect(base_url() . "usuarios", 310);
        
    }
    
    
}
