<?php
class Reportes_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    //obtener compras 
        public function getCompras()
    {
        
        $query = $this->db->select("c.id_compra,c.id_proveedor,c.fecha,c.id_usuario, c.subtotal,c.iva,c.descuento,c.total,c.id_comprobante,c.numero_documento, p.nombre_proveedor,tp.id_comprobante,tp.nombre_comprobante")
        ->from('compras as c')
        ->join('proveedores as p','p.id_proveedor = c.id_proveedor')
        ->join('tipo_comprobante as tp','tp.id_comprobante = c.id_comprobante' )
        ->order_by("c.id_compra", "desc")
        ->get();
        return $query->result();
    }
   
        //query para obtener las coompras 
        public function getComprasbyDate($fechainicio,$fechafin){
         $this->db->select("c.id_compra,c.id_proveedor,c.fecha,c.id_usuario, c.subtotal,c.iva,c.descuento,c.total,c.id_comprobante,c.numero_documento, p.nombre_proveedor,tp.id_comprobante,tp.nombre_comprobante");
        $this->db->from('compras as c');
        $this->db->join('proveedores as p','p.id_proveedor = c.id_proveedor');
        $this->db->join('tipo_comprobante as tp','tp.id_comprobante = c.id_comprobante' );
        $this->db->where("c.fecha >=",$fechainicio);
        $this->db->where("c.fecha <=",$fechafin);
        $resultados = $this->db->get();
         if ($resultados->num_rows() > 0) {
            return $resultados->result();
        }else
        {
            return false;
        }
    }
    public function getVentas()
    {
        
        $query = $this->db->select("v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, cl.id_cliente, cl.nombre,cl.apellidos,cl.grado,tp.id_comprobante,tp.nombre_comprobante,e.nombre_escuela")
        ->from('ventas as v')
        ->join('clientes as cl','cl.id_cliente = v.id_cliente')
        ->join('tipo_comprobante as tp','tp.id_comprobante = v.id_comprobante' )
        ->join('escuelas as e', 'e.id_escuela = v.id_escuela')
        ->order_by("v.id_venta", "desc")
        ->get();
        return $query->result();
    }
    public function getDetalle(){
        $query = $this->db->select("dt.id_detalle,dt.id_producto,dt.id_venta,p.producto,p.talla,p.id_producto,p.precio,v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, c.nombre,c.apellidos,c.grado,e.id_escuela,e.nombre_escuela")
        ->from("detalle_venta dt")
        ->join("productos p","dt.id_producto = p.id_producto")
        ->join("ventas as v","v.id_venta = dt.id_venta " )
        ->join("clientes as c","c.id_cliente = v.id_cliente" )
        ->join("escuelas as e" , "e.id_escuela = v.id_escuela")
        ->order_by("dt.id_detalle","desc")
        ->get();
        return $query->result();
    }
    public function getVentasbyDate($fechainicio,$fechafin){
         $this->db->select("v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, cl.id_cliente, cl.nombre,cl.apellidos,cl.grado,tp.id_comprobante,tp.nombre_comprobante,e.nombre_escuela");
        $this->db->from('ventas as v');
        $this->db->join('clientes as cl','cl.id_cliente = v.id_cliente');
        $this->db->join('tipo_comprobante as tp','tp.id_comprobante = v.id_comprobante' );
        $this->db->join('escuelas as e', 'e.id_escuela = v.id_escuela');
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
     public function getProductosVendidosbyDate($fechainicio,$fechafin){
         $this->db->select("dt.id_detalle,dt.id_producto,dt.id_venta,p.producto,p.talla,p.id_producto,p.precio,v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, c.nombre,c.apellidos,c.grado,e.id_escuela,e.nombre_escuela");
        $this->db->from("detalle_venta as dt");
        $this->db->join("productos p","dt.id_producto = p.id_producto");
        $this->db->join("ventas as v","v.id_venta = dt.id_venta " );
        $this->db->join("clientes as c","c.id_cliente = v.id_cliente" );
        $this->db->join("escuelas as e" , "e.id_escuela = v.id_escuela");
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
    public function getGastos()
    {
        $query = $this->db->select("dc.id_detalle,dc.id_producto,dc.id_compra,dc.id_escuela,p.producto,p.talla,p.id_producto,p.costo,c.id_compra,c.fecha,c.subtotal,c.iva,c.descuento,c.total,c.id_comprobante,c.id_proveedor,c.numero_documento, pr.nombre_proveedor,pr.apellidos,e.id_escuela,e.nombre_escuela")
        ->from("detalle_compras dc")
        ->join("productos p","dc.id_producto = p.id_producto")
        ->join("compras as c","c.id_compra = dc.id_compra " )
        ->join("proveedores as pr","pr.id_proveedor = c.id_proveedor" )
        ->join("escuelas as e" , "e.id_escuela = dc.id_escuela")
        ->order_by("dc.id_detalle","desc")
        ->get();
        return $query->result();

    }

    public function getGastosbyDate($fechainicio,$fechafin){
          $this->db->select("dc.id_detalle,dc.id_producto,dc.id_compra,dc.id_escuela,p.producto,p.talla,p.id_producto,p.costo,c.id_compra,c.fecha,c.subtotal,c.iva,c.descuento,c.total,c.id_comprobante,c.id_proveedor,c.numero_documento, pr.nombre_proveedor,pr.apellidos,e.id_escuela,e.nombre_escuela");
        $this->db->from("detalle_compras dc");
        $this->db->join("productos p","dc.id_producto = p.id_producto");
        $this->db->join("compras as c","c.id_compra = dc.id_compra " );
        $this->db->join("proveedores as pr","pr.id_proveedor = c.id_proveedor" );
        $this->db->join("escuelas as e" , "e.id_escuela = dc.id_escuela");
        $this->db->where("c.fecha >=",$fechainicio);
        $this->db->where("c.fecha <=",$fechafin);
        $resultados = $this->db->get();
         if ($resultados->num_rows() > 0) {
            return $resultados->result();
        }else
        {
            return false;
        }
    }

    public function getResumenVenta(){
        $query = $this->db->select("dt.id_detalle,dt.id_producto,dt.id_venta,p.id_producto,p.producto,p.talla,p.id_producto,p.precio,v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, c.nombre,c.apellidos,c.grado,e.id_escuela,e.nombre_escuela, count(p.id_producto)as cantidadProducto")
        ->from("detalle_venta dt")
        ->join("productos p","dt.id_producto = p.id_producto")
        ->join("ventas as v","v.id_venta = dt.id_venta " )
        ->join("clientes as c","c.id_cliente = v.id_cliente" )
        ->join("escuelas as e" , "e.id_escuela = v.id_escuela")
        ->group_by("p.id_producto","desc")
        ->get();
        return $query->result();
    }
public function getResumenbyDate($fechainicio,$fechafin){
         $this->db->select("dt.id_detalle,dt.id_producto,dt.id_venta,p.id_producto,p.producto,p.talla,p.id_producto,p.precio,v.id_venta,v.fecha,v.subtotal,v.iva,v.descuento,v.total,v.id_comprobante,v.id_cliente,v.id_escuela,v.num_documento, c.nombre,c.apellidos,c.grado,e.id_escuela,e.nombre_escuela, count(p.id_producto)as cantidadProducto");
        $this->db->from("detalle_venta as dt");
        $this->db->join("productos p","dt.id_producto = p.id_producto");
        $this->db->join("ventas as v","v.id_venta = dt.id_venta " );
        $this->db->join("clientes as c","c.id_cliente = v.id_cliente" );
        $this->db->join("escuelas as e" , "e.id_escuela = v.id_escuela");
        $this->db->group_by("p.id_producto","desc");
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