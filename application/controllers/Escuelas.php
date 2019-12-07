<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escuelas extends CI_Controller
{
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
            $datos = $this->Escuelas_model->getEscuelas();
            
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('escuelas/index', compact('datos','permisos'));
        $this->load->view('includes/footer');
    }
    public function add()
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            if ($this->input->post()) {
                
                if ($this->form_validation->run("addEscuela")) {
                    $data    = array(
                        'nombre_escuela' => $this->input->post("nombre", true),
                        'telefono' => $this->input->post("telefono", true),
                        'direccion' => $this->input->post("direccion", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Escuelas_model->insertar_escuela($data);
                    if ($guardar) {
                        $this->session->set_flashdata('css','success');
                        $this->session->set_flashdata('mensaje', 'Se ha agregado el registro exitosamente.');
                        redirect(base_url() . 'escuelas', 301);
                    } else {
                        $this->session->set_flashdata('css','danger');
                        $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                        redirect(base_url() . 'escuelas/add', 301);
                    }
                }
            }
            
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('escuelas/add');
        $this->load->view('includes/footer');
    }
    
    public function edit($id_escuela = null)
    {
        if ( $this->session->userdata('id_usuario') != "") {
            //contenido
            if (!$id_escuela) {
                show_404();
            }
            if ($this->input->post()) {
                if ($this->form_validation->run("addEscuela")) {
                    $data    = array(
                        'nombre_escuela' => $this->input->post("nombre", true),
                        'telefono' => $this->input->post("telefono", true),
                        'direccion' => $this->input->post("direccion", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Escuelas_model->modificar_escuela($data, $id_escuela);
                    if ($guardar) {
                        $this->session->set_flashdata('css','success');
                        $this->session->set_flashdata('mensaje', 'Se ha editado el registro exitosamente.');
                        redirect(base_url() . 'escuelas');
                    } else {
                        $this->session->set_flashdata('css','danger');
                        $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                        redirect(base_url() . 'escuelas/edit/' . $id_escuela, 301);
                    }
                }
            }
            
            
            $datos = $this->Escuelas_model->getEscuelaPorid($id_escuela);
            if (sizeof($datos) == 0) {
                show_404();
            }
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('escuelas/edit', compact('id_clientes', 'datos'));
        $this->load->view('includes/footer');
    }
    public function delete($id_escuela = null)
    {
        if (!$id_escuela) {
            show_404();
        }
        $data    = array(
            'estado' => '0'
        );
        $this->Escuelas_model->modificar_escuela($data, $id_escuela);
        $this->session->set_flashdata('css','danger');
        $this->session->set_flashdata('mensaje', 'Se ha eliminado el registro exitosamente.');
        redirect(base_url() . "escuelas", 310);
        
    }
    
}