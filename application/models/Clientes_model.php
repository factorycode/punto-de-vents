<?php
class Clientes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getClientes()
    {
        $query = $this->db->select("c.id_cliente,c.nombre,c.apellidos, c.telefono,c.direccion,c.estado, c.grado, e.id_escuela, e.nombre_escuela")
        ->from("clientes as c")
        ->join("escuelas as e ",'e.id_escuela = c.id_escuela')
        ->order_by("c.id_cliente", "desc")
        ->where("c.estado", '1')
        ->get();
        return $query->result();
    }
    public function insertar_cliente($datos = array())
    {
        $this->db->insert("clientes", $datos);
        return true;
        
    }
    public function modificar_cliente($datos = array(), $id_cliente)
    {
        $this->db->where('id_cliente', $id_cliente);
        $this->db->update('clientes', $datos);
        return true;
        
    }
    
    public function getClientesPorid($id_cliente)
    {
        $where = array(
            "id_cliente" => $id_cliente
        );
        $query = $this->db->select("id_cliente,nombre,telefono,direccion,apellidos,grado")->from("clientes")->where($where)->get();
        return $query->row();
    }
    public function eliminar($id_cliente)
    {
        $this->db->delete('clientes', array(
            'id_cliente' => $id_cliente));
        return true;
        
    }
}