<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class proveedores extends CI_Controller
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
            $permisos=$this->permisos;
            $datos = $this->Proveedores_model->getProveedor();
            
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('proveedores/lista', compact('datos','permisos'));
        $this->load->view('includes/footer');
    }
    public function add()
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            if ($this->input->post()) {
                
                if ($this->form_validation->run("addProveedores")) {
                    $data    = array(
                        'nombre_proveedor' => $this->input->post("nombre", true),
                        'apellidos' => $this->input->post("apellidos", true),
                        'telefono' => $this->input->post("telefono", true),
                        'direccion' => $this->input->post("direccion", true),
                        'correo' => $this->input->post("correo", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Proveedores_model->insertar_proveedor($data);
                    if ($guardar) {
                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'Se ha agregado el registro exitosamente.');
                        redirect(base_url() . 'proveedores', 301);
                    } else {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                        redirect(base_url() . 'proveedores/add', 301);
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
        $this->load->view('proveedores/add', compact('escuela'));
        $this->load->view('includes/footer');
    }
    
    public function edit($id_proveedor = null)
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            if (!$id_proveedor) {
                show_404();
            }
            if ($this->input->post()) {
                if ($this->form_validation->run("addClientes")) {
                    $data    = array(
                        'nombre_proveedor' => $this->input->post("nombre", true),
                        'apellidos' => $this->input->post("apellidos", true),
                        'telefono' => $this->input->post("telefono", true),
                        'direccion' => $this->input->post("direccion", true),
                        'correo' => $this->input->post("correo", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Proveedores_model->modificar_proveedor($data, $id_proveedor);
                    if ($guardar) {
                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'Se ha editado el registro exitosamente.');
                        redirect(base_url() . 'proveedores');
                    } else {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                        redirect(base_url() . 'proveedores/edit/' . $id_cliente, 301);
                    }
                }
            }
            
            
            //aqui se optiene los Proveedores 
            $datos = $this->Proveedores_model->getProveedorPorid($id_proveedor);
            if (sizeof($datos) == 0) {
                show_404();
            }
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('proveedores/edit', compact('id_proveedor', 'datos'));
        $this->load->view('includes/footer');
    }
    public function delete($id_proveedor = null)
    {
        if (!$id_proveedor) {
            show_404();
        }
        $data = array(
            'estado' => '0'
        );
        $this->Proveedores_model->modificar_proveedor($data, $id_proveedor);
        $this->session->set_flashdata('css', 'danger');
        $this->session->set_flashdata('mensaje', 'Se ha borrado el registro exitosamente.');
        
        
        redirect(base_url() . "proveedores", 310);
        
    }
    
}