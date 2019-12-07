<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller
{
    //aqui resibe los permisos disponibes que bienen desde el script backend_lib que se encuentra en la carpera libreias 
    private $permisos;
    public function __construct(){ 
        parent::__construct();
        $this->permisos = $this->backend_lib->control();
          }
    
    public function index()
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            $permisos=$this->permisos;
            $datos = $this->Inventario_model->getInventario();
            //print_r($datos);
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('inventario/index', compact('datos','permisos'));
        $this->load->view('includes/footer');
    }
    public function add()
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            if ($this->input->post()) {
                
                if ($this->form_validation->run("addInventario")) {
                    $data    = array(
                        'producto' => $this->input->post("nombre", true),
                        'talla' => $this->input->post("talla", true),
                        'costo' => $this->input->post("costo", true),
                        'precio' => $this->input->post("precio", true),
                        'stock' => $this->input->post("stock", true),
                        'id_categoria' => $this->input->post("categoria", true),
                        'id_escuela' => $this->input->post("escuela", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Inventario_model->insertar_inventario($data);
                    if ($guardar) {
                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'Se ha agregado con exito.');
                        redirect(base_url() . 'inventario', 301);
                    } else {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('se ha producido un error. intentalo nuevamente por favor');
                        redirect(base_url() . 'inventario/add', 301);
                    }
                }
            }
            $categoria = $this->Categorias_model->getCategorias();
            $escuela   = $this->Escuelas_model->getEscuelas();
            //print_r($escuela);
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('inventario/add', compact('categoria', 'escuela'));
        $this->load->view('includes/footer');
    }
    
    public function edit($id_producto = null)
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            if (!$id_producto) {
                show_404();
            }
            if ($this->input->post()) {
                if ($this->form_validation->run("addInventario")) {
                    $data    = array(
                        'producto' => $this->input->post("nombre", true),
                        'talla' => $this->input->post("talla", true),
                        'costo' => $this->input->post("costo", true),
                        'precio' => $this->input->post("precio", true),
                        'stock' => $this->input->post("stock", true),
                        'id_categoria' => $this->input->post("categoria", true),
                        'id_escuela' => $this->input->post("escuela", true),
                        'estado' => '1'
                    );
                    $guardar = $this->Inventario_model->modificar_inventario($data, $id_producto);
                    if ($guardar) {
                        $this->session->set_flashdata('css', 'success');
                        $this->session->set_flashdata('mensaje', 'Se ha editado el registro exitosamente.');
                        redirect(base_url() . 'inventario');
                    } else {
                        $this->session->set_flashdata('css', 'danger');
                        $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                        redirect(base_url() . 'inventario/edit/' . $id_producto, 301);
                    }
                }
            }
            //obtener nombre de categrias, escuela y el id del producto
            $categoria = $this->Categorias_model->getCategorias();
            $escuela   = $this->Escuelas_model->getEscuelas();
            $datos     = $this->Inventario_model->getInventarioPorid($id_producto);
            if (sizeof($datos) == 0) {
                show_404();
            }
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('inventario/edit', compact('id_producto', 'datos', 'categoria', 'escuela'));
        $this->load->view('includes/footer');
    }
    public function delete($id_producto = null)
    {
        if ($this->session->userdata('id_usuario') != "") {
            //contenido
            if (!$id_producto) {
                show_404();
            }
            if ($this->input->post()) {
                
                $data    = array(
                    'baja' => $this->input->post("baja", true),
                    'estado' => '0'
                );
                $guardar = $this->Inventario_model->modificar_inventario($data, $id_producto);
                if ($guardar) {
                    $this->session->set_flashdata('css', 'success');
                    $this->session->set_flashdata('mensaje', 'Se dio de baja el registro exitosamente.');
                    redirect(base_url() . 'inventario');
                } else {
                    $this->session->set_flashdata('css', 'danger');
                    $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                    redirect(base_url() . 'inventario/edit/' . $id_producto, 301);
                }
                
            }
            //obtener nombre de categrias, escuela y el id del producto 
            $datos = $this->Inventario_model->getInventarioPorid($id_producto);
            if (sizeof($datos) == 0) {
                show_404();
            }
            
        } else {
            redirect(base_url() . "login");
        }
        
        $this->load->view('includes/header');
        $this->load->view('includes/menu');
        $this->load->view('inventario/baja', compact('datos'));
        $this->load->view('includes/footer');
    }
    
    
}