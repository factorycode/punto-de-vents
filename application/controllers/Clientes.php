<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller
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
            $datos = $this->Clientes_model->getClientes();
            $permisos=$this->permisos;
            
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('clientes/index', compact('datos','permisos'));
        $this->load->view('includes/footer');
    }
    public function add()
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            if ($this->input->post()) {
                
                if ($this->form_validation->run("addClientes")) {
                    $data    = array(
                        'nombre' => $this->input->post("nombre", true),
                        'apellidos' => $this->input->post("apellidos", true),
                        'telefono' => $this->input->post("telefono", true),
                        'direccion' => $this->input->post("direccion", true),
                        'id_escuela' => $this->input->post("escuela", true),
                        'grado' => $this->input->post("grado", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Clientes_model->insertar_cliente($data);
                    if ($guardar) {
                        $this->session->set_flashdata('css','success');
                        $this->session->set_flashdata('mensaje', 'Se ha agregado el registro exitosamente.');
                        redirect(base_url() . 'clientes', 301);
                    } else {
                        $this->session->set_flashdata('css','danger');
                        $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                        redirect(base_url() . 'clintes/add', 301);
                    }
                }
            }
            //aqui se optiene las lista de las escuelas, para mandarlas a la visa add clinetes 
            $escuela = $this->Escuelas_model->getEscuelas();
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('clientes/add',compact('escuela'));
        $this->load->view('includes/footer');
    }
    
    public function edit($id_cliente = null)
    {
        if ('admin' or $this->session->userdata('id_usuario') != "") {
            //contenido
            if (!$id_cliente) {
                show_404(); 
            }
            if ($this->input->post()) {
                if ($this->form_validation->run("addClientes")) {
                    $data    = array(
                        'nombre' => $this->input->post("nombre", true),
                        'apellidos' => $this->input->post("apellidos", true),
                        'telefono' => $this->input->post("telefono", true),
                        'id_escuela' => $this->input->post("escuela", true),
                        'grado' => $this->input->post("grado", true),
                        'direccion' => $this->input->post("direccion", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Clientes_model->modificar_cliente($data, $id_cliente);
                    if ($guardar) {
                        $this->session->set_flashdata('css','success');
                        $this->session->set_flashdata('mensaje', 'Se ha editado el registro exitosamente.');
                        redirect(base_url() . 'clientes');
                    } else {
                        $this->session->set_flashdata('css','danger');
                        $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                        redirect(base_url() . 'clientes/edit/' . $id_cliente, 301);
                    }
                }
            }
            
            //aqui se optiene las lista de las escuelas, para mandarlas a la visa add clinetes 
            $escuela = $this->Escuelas_model->getEscuelas();
            //aqui se optiene los clientes 
            $datos = $this->Clientes_model->getClientesPorid($id_cliente);
            if (sizeof($datos) == 0) {
                show_404();
            }
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('clientes/edit', compact('id_clientes', 'datos','escuela'));
        $this->load->view('includes/footer');
    }
    public function delete($id_cliente = null)
    {
        if (!$id_cliente) {
            show_404();
        }
        $data    = array(
            'estado' => '0'
        );
        $this->Clientes_model->modificar_cliente($data, $id_cliente);
        $this->session->set_flashdata('css','danger');
        $this->session->set_flashdata('mensaje', 'Se ha borrado el registro exitosamente.');
        
        
        redirect(base_url() . "clientes", 310);
        
    }
    
}