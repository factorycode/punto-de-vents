<?php
class Categorias_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getCategorias()
    {
        
        $query = $this->db->select("id_categoria,nombre,descripcion,estado")->from("categorias")->order_by("id_categoria", "desc")->get();
        return $query->result();
    }
    public function insertar_categoria($datos = array())
    {
        $this->db->insert("categorias", $datos);
        return true;
        
    }
    public function modificar_categoria($datos = array(), $id_categoria)
    {
        $this->db->where('id_categoria', $id_categoria);
        $this->db->update('categorias', $datos);
        return true;
        
    }
    
    public function getCategoriaPorid($id_categoria)
    {
        $where = array(
            "id_categoria" => $id_categoria
        );
        $query = $this->db->select("id_categoria,nombre,descripcion,estado")->from("categorias")->where($where)->get();
        return $query->row();
    }
    public function eliminar($id_categoria)
    {
        $this->db->delete('categorias', array(
            'id_categoria' => $id_categoria
        ));
        return true;
        
    }
}