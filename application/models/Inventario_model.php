<?php
class Inventario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getInventario()
    {
        $query = $this->db->select("p.id_producto,p.costo,p.producto, p.talla, p.precio,p.stock,p.id_categoria,p.estado,p.id_escuela, 
            c.nombre, c.id_categoria,
            e.nombre_escuela,e.id_escuela")
        ->from('productos as p')
        ->join('categorias as c','p.id_categoria = c.id_categoria')
        ->join('escuelas as e', 'p.id_escuela = e.id_escuela')
        ->order_by("p.id_producto", "desc")
        ->where("p.estado", '1')
        ->get();
        ;
        return $query->result();
    }
    public function getProducto($id_producto){
        $this->db->where("id_producto",$id_producto);
        $resultado = $this->db->get("productos");
        return $resultado->row();
    }
    //queri para actualizar el stok de los propuctos
    public function update($id_producto,$data){
        $this->db->where("id_producto",$id_producto);
        return $this->db->update("productos",$data);
    }
    public function insertar_inventario($datos = array())
    {
        $this->db->insert("productos", $datos);
        return true;
        
    }
    public function modificar_inventario($datos = array(), $id_producto)
    {
        $this->db->where('id_producto', $id_producto);
        $this->db->update('productos', $datos);
        return true;
        
    }
    
    public function getInventarioPorid($id_producto)
    {
        $where = array(
            "id_producto" => $id_producto
        );
        $query = $this->db->select("id_producto,producto,talla,costo,precio,stock, id_categoria, id_escuela,baja")->from("productos")->where($where)->get();
        return $query->row();
    }
    public function eliminar($id_producto)
    {
        $this->db->delete('clientes', array(
            'id_cliente' => $id_cliente
        ));
        return true;
        
    }
    }