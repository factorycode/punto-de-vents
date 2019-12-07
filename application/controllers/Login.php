<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function index()
    {
        if($this->input->post())
        {
            if ($this->form_validation->run('login'))
            {
                # crear y referenciar un método para preguntar si los datos ingresados por el usuario existen en la bd
                $datos=$this->Usuarios_model->getLogin($this->input->post('correo',true),sha1($this->input->post('password', true)));
               // password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                //crear una condición para validar lo anterior
                if (sizeof($datos)==0) 
                {
                    $this->session->set_flashdata('css','danger');
                    $this->session->set_flashdata('mensaje','Los datos ingresados no existen en nuestra base de datos');
                    redirect(base_url()."login");
                }else {
                    $data  = array(
                        'id_usuario' => $datos->id_usuario, 
                        'nombre' => $datos->nombre,
                        'privilegio' => $datos->privilegio,
                        'apellidos' =>$datos->apellidos,
                        'login' =>TRUE
                    );
                    $this->session->set_userdata($data);
                    redirect(base_url()."dashboard");
                }
            }
        }
        $this->load->view('login/login');
    }
    public function admin()
    {
        if($this->session->userdata('id_usuario'))
        {
            
        }else
        {
            redirect(base_url()."login/login");
        }
    }
    public function salir()
    {
        //$this->session->sess_destroy("uniformes");
        $this->session->sess_destroy();
        redirect(base_url().'login',  301);
    }
}
