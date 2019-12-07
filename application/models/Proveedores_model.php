<?php
class Proveedores_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
      public function getProveedor(){
        $this->db->select("id_proveedor,nombre_proveedor,apellidos,direccion, correo,telefono,fecha");
        $this->db->from("proveedores ");
        $this->db->where("estado","1");
        $resultados = $this->db->get();
        return $resultados->result();
    }
    
    public function insertar_proveedor($data){
        return $this->db->insert("proveedores",$data);
    }
    public function update($id_usuario,$data){
        $this->db->where("id_usuario",$id_usuario);
        return $this->db->update("usuarios",$data);
    }
    public function getProveedorPorid($id_proveedor)
    {
       $where = array(
            "id_proveedor" => $id_proveedor
        );
        $query = $this->db->select("id_proveedor,nombre_proveedor,apellidos,telefono, correo,estado,direccion")->from("proveedores")->where($where)->get();
        return $query->row(); 
    }
    public function modificar_proveedor($datos = array(), $id_proveedor)
    {
        $this->db->where('id_proveedor', $id_proveedor);
        $this->db->update('proveedores', $datos);
        return true;
        
    }


}

