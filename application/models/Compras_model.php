<?php
class Compras_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
        public function getCompras()
    {
        
       $query = $this->db->select("c.id_compra,c.id_proveedor,c.fecha, c.id_usuario,c.subtotal,c.id_comprobante,c.id_producto, c.iva, c.total, c.numero_documento, c.serie,po.id_proveedor,po.nombre_proveedor,po.apellidos,po.direccion,po.correo,po.telefono, po.estado, tc.id_comprobante,tc.nombre_comprobante")
        ->from("compras c")
        ->join("proveedores po","c.id_proveedor = po.id_proveedor")
        ->join("tipo_comprobante tc","tc.id_comprobante=c.id_comprobante")
        ->get();
        return $query->result();
    }
    public function save($data){
        return $this->db->insert("compras",$data);
    }

    public function lastID(){
        return $this->db->insert_id();
    }

   
    public function save_detalle($data){
        $this->db->insert("detalle_compras",$data);
    }
    public function getComprobante($id_comprobante){
        $this->db->where("id_comprobante",$id_comprobante);
        $resultado = $this->db->get("tipo_comprobante");
        return $resultado->row();
    }
    public function updateComprobante($id_comprobante,$data){
        $this->db->where("id_comprobante",$id_comprobante);
        $this->db->update("tipo_comprobante",$data);
    }
    public function getCompra($id_compra){
        $this->db->select("co.id_compra,co.id_proveedor,co.fecha,co.id_usuario,co.subtotal,co.descuento,co.id_comprobante,co.id_producto,co.iva,co.total,co.numero_documento,co.serie,p.id_proveedor,p.nombre_proveedor,p.apellidos,p.direccion,p.telefono,p.correo,p.estado,tc.id_comprobante,tc.nombre_comprobante");
        $this->db->from("compras co");
        $this->db->join("proveedores p","p.id_proveedor  =  co.id_proveedor");
        $this->db->join("tipo_comprobante tc","co.id_comprobante = tc.id_comprobante");
        $this->db->where("co.id_compra",$id_compra);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getDetalle($id_compra){
        $this->db->select("dt.*,p.producto,p.talla,p.id_producto,es.id_escuela,es.nombre_escuela");
        $this->db->from("detalle_compras dt");
        $this->db->join("productos p","dt.id_producto = p.id_producto");
        $this->db->join("escuelas  es","es.id_escuela = p.id_escuela");
        $this->db->where("dt.id_compra",$id_compra);
        $resultados = $this->db->get();
        return $resultados->result();
    }
        
        public function getVentasbyDate($fechainicio,$fechafin){
         $this->db->select("v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, cl.id_cliente, cl.nombre,tp.id_comprobante,tp.nombre_comprobante");
        $this->db->from('ventas as v');
        $this->db->join('clientes as cl','cl.id_cliente = v.id_cliente');
        $this->db->join('tipo_comprobante as tp','tp.id_comprobante = v.id_comprobante' );
        $this->db->where("v.fecha >=",$fechainicio);
        $this->db->where("v.fecha <=",$fechafin);
        $resultados = $this->db->get();
         if ($resultados->num_rows() > 0) {
            return $resultados->result();
        }else
        {
            return false;
        }
    }
}