<?php
class Escuelas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getEscuelas()
    {
        $query = $this->db->select("id_escuela,nombre_escuela, telefono,direccion,estado")->from("escuelas")->order_by("id_escuela", "desc")->where("estado", '1')->get();
        return $query->result();
    }
    public function insertar_escuela($datos = array())
    {
        $this->db->insert("escuelas", $datos);
        return true;
        
    }
    public function modificar_escuela($datos = array(), $id_escuela)
    {
        $this->db->where('id_escuela', $id_escuela);
        $this->db->update('escuelas', $datos);
        return true;
        
    }
    
    public function getEscuelaPorid($id_escuela)
    {
        $where = array(
            "id_escuela" => $id_escuela
        );
        $query = $this->db->select("id_escuela,nombre_escuela,telefono,direccion")->from("escuelas")->where($where)->get();
        return $query->row();
    }
    public function eliminar($id_cliente)
    {
        $this->db->delete('escuelas', array(
            'id_cliente' => $id_cliente));
        return true;
        
    }
}