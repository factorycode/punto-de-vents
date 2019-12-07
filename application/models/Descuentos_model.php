<?php
class Descuentos_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getDescuentos()
    {
         $query = $this->db->select("id_descuento, descuento, id_categoria")
        ->from("descuentos")
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