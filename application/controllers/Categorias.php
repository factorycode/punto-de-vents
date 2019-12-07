<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends CI_Controller
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
                $datos = $this->Categorias_model->getCategorias();
               //print_r($permisos);

            } else {
                redirect(base_url() . "login");
            }

            $this->load->view('includes/header');
            $this->load->view('includes/menu');
            $this->load->view('admin/categorias', compact('datos','permisos'));
            $this->load->view('includes/footer');
        }
        public function add()
        {
            if ($this->session->userdata('id_usuario') != "") {
            //contenido
                if ($this->input->post()) {

                    if ($this->form_validation->run("addCategorias")) {
                        $data    = array(
                            'nombre' => $this->input->post("nombre", true),
                            'descripcion' => $this->input->post("descripcion", true),
                            'estado' => '1'
                        );
                        $guardar = $this->Categorias_model->insertar_categoria($data);
                        if ($guardar) {
                            $this->session->set_flashdata('css','success');
                            $this->session->set_flashdata('mensaje', 'Se ha agregado el registro exitosamente.');
                            redirect(base_url() . 'categorias', 301);
                        } else {
                            $this->session->set_flashdata('css','danger');
                            $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                            redirect(base_url() . 'categorias/add', 301);
                        }
                    }
                }


            } else {
                redirect(base_url() . "login");
            }

            $this->load->view('includes/header');
            $this->load->view('includes/menu');
            $this->load->view('admin/add');
            $this->load->view('includes/footer');
        }

        public function edit($id_categoria = null)
        {
            if ($this->session->userdata('id_usuario') != "") {
            //contenido
                if (!$id_categoria) {
                    show_404();
                }
                if ($this->input->post()) {
                    if ($this->form_validation->run("addCategorias")) {
                        $data    = array(
                            'nombre' => $this->input->post("nombre", true),
                            'descripcion' => $this->input->post("descripcion", true)
                        );
                        $guardar = $this->Categorias_model->modificar_categoria($data, $id_categoria);
                        if ($guardar) {
                            $this->session->set_flashdata('css','success');
                            $this->session->set_flashdata('mensaje', 'Se ha editado el registro exitosamente.');
                            redirect(base_url() . 'categorias');
                        } else {
                            $this->session->set_flashdata('css','danger');
                            $this->session->set_flashdata('mensaje', 'Se ha producido un error. Inténtelo nuevamente por favor.');
                            redirect(base_url() . 'categorias/edit/' . $id_categoria, 301);
                        }
                    }
                }


                $datos = $this->Categorias_model->getCategoriaPorid($id_categoria);
                if (sizeof($datos) == 0) {
                    show_404();
                }

            } else {
                redirect(base_url() . "login");
            }

            $this->load->view('includes/header');
            $this->load->view('includes/menu');
            $this->load->view('admin/edit', compact('id_categoria', 'datos'));
            $this->load->view('includes/footer');
        }
        public function modal($id_categoria)
        {
            if ( $this->session->userdata('id_usuario') != "") {
            //contenido

                $datos = $this->Categorias_model->getCategoriaPorid($id_categoria);

            } else {
                redirect(base_url() . "login");
            }

            $this->load->view('admin/vista', compact('datos'));
        }
        public function delete($id_categoria = null)
        {

            if (!$id_categoria) {
                show_404();
            }
            $guardar = $this->Categorias_model->eliminar($id_categoria);
            if ($guardar) {
                $this->session->set_flashdata('css','danger');
                $this->session->set_flashdata("mensaje", "Se ha eliminado el registro exitosamente");
                redirect(base_url() . "categorias", 310);
            } else {
                $this->session->set_flashdata('css','danger');
                $this->session->set_flashdata("mensaje", "Se ha producido un error. Inténtelo nuevamente por favor.");
                redirect(base_url() . "categorias", 310);

            }
        }

    }