<?php
class Ventas_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
        public function getVentas()
    {
        
        $query = $this->db->select("v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, cl.id_cliente, cl.nombre,tp.id_comprobante,tp.nombre_comprobante")
        ->from('ventas as v')
        ->join('clientes as cl','cl.id_cliente = v.id_cliente')
        ->join('tipo_comprobante as tp','tp.id_comprobante = v.id_comprobante' )
        ->order_by("v.id_venta", "desc")
        ->get();
        return $query->result();
    }
    public function getComprobantes(){
        $resultados = $this->db->get("tipo_comprobante");
        return $resultados->result();
    }

    public function save($data){
        return $this->db->insert("ventas",$data);
    }

    public function lastID(){
        return $this->db->insert_id();
    }

   

    public function save_detalle($data){
        $this->db->insert("detalle_venta",$data);
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
    public function getVenta($id_venta){
        $this->db->select("v.*,c.nombre,c.direccion,c.apellidos,c.telefono,c.grado,tc.nombre_comprobante,es.id_escuela,es.nombre_escuela");
        $this->db->from("ventas v");
        $this->db->join("clientes c","v.id_cliente=  c.id_cliente");
        $this->db->join("tipo_comprobante tc","v.id_comprobante = tc.id_comprobante");
        $this->db->join("escuelas es","v.id_escuela=  es.id_escuela");
        $this->db->where("v.id_venta",$id_venta);
        $resultado = $this->db->get();
        return $resultado->row();
    }
    public function getDetalle($id_venta){
        $this->db->select("dt.*,p.producto,p.talla,p.id_producto");
        $this->db->from("detalle_venta dt");
        $this->db->join("productos p","dt.id_producto = p.id_producto");
        $this->db->where("dt.id_venta",$id_venta);
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
        public function years(){
        $this->db->select("YEAR(fecha) as year");
        $this->db->from("ventas");
        $this->db->group_by("year");
        $this->db->order_by("year","desc");
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function montos($year){
        $this->db->select("MONTH(fecha) as mes, SUM(total) as monto");
        $this->db->from("ventas");
        $this->db->where("fecha >=",$year."-01-01");
        $this->db->where("fecha <=",$year."-12-31");
        $this->db->group_by("mes");
        $this->db->order_by("mes");
        $resultados = $this->db->get();
        return $resultados->result();
    }
}