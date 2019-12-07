<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
	//aqui resibe los permisos disponibes que bienen desde el script backend_lib que se encuentra en la carpera libreias 
	private $permisos;
	public function __construct(){ 
		parent::__construct();
		$this->permisos = $this->backend_lib->control();
	}

	public function index()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
			$fechainicio = $this->input->post("fechainicio");
			$fechafin = $this->input->post("fechafin");
			if ($this->input->post("buscar")) {
				$datos = $this->Ventas_model->getVentasbyDate($fechainicio,$fechafin);
			}else{
    	//contenido
				$datos = $this->Ventas_model->getVentas();
				$permisos=$this->permisos;	    
			//print_r($datos);
			}
			$datos = array(
				"permisos" => $permisos,
				"datos" => $datos,
				"fechainicio" => $fechainicio,
				"fechafin" => $fechafin
			);

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('reportes/ventas',$datos);
		$this->load->view('includes/footer');
	}
	public function compras()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			
			$fechainicio = $this->input->post("fechainicio");
			$fechafin = $this->input->post("fechafin");
			if ($this->input->post("buscar")) {
				$datos = $this->Reportes_model->getComprasbyDate($fechainicio,$fechafin);
			//print_r($datos);
			}
			else{
				$datos = $this->Reportes_model->getCompras();
				//print_r($datos);
			}

			$datos = array(
				"datos" => $datos,
				'permisos'=>$this->permisos,
				"fechainicio" => $fechainicio,
				"fechafin" => $fechafin
			);
			//print_r($datos);

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('reportes/compras',$datos);
		$this->load->view('includes/footer');
	}
	public function inventarios()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			$permisos=$this->permisos;
			$datos = $this->Inventario_model->getInventario();
            //print_r($datos);

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('reportes/inventarios', compact('datos','permisos'));
		$this->load->view('includes/footer');
	}
	public function productos()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			$permisos=$this->permisos;
			$datos = $this->Reportes_model->getDetalle();
			//print_r($datos); 

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('reportes/productos',compact('datos','permisos'));
		$this->load->view('includes/footer');
	}
	public function gastos()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			$permisos=$this->permisos;
			$datos = $this->Reportes_model->getGastos();
			//print_r($datos);

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('reportes/gastos',compact('datos','permisos'));
		$this->load->view('includes/footer');
	}
	public function resumen_venta()
	{ 
		if ( $this->session->userdata('id_usuario') != "")
		{ 
    	//contenido
			$permisos=$this->permisos;
			$datos = $this->Reportes_model->getResumenVenta();
			//print_r($datos); 

		}else
		{
			redirect(base_url()."login");
		}

		$this->load->view('includes/header');
		$this->load->view('includes/menu');
		$this->load->view('reportes/resumen_venta',compact('datos','permisos'));
		$this->load->view('includes/footer');
	}
	public function excelVentas()
	{ 
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("Excel")) {
			$datos = $this->Reportes_model->getVentasbyDate($fechainicio,$fechafin);
			//print_r( $datos);
			$this->phpexcel->getProperties()
			->setTitle('excel')
			->setDescription('descripción');
			$sheet=$this->phpexcel->getActiveSheet();
			$sheet->setTitle('Título de la hoja del reporte');               
//generamos la primera fila
			$sheet->setCellValue("A1","Nombre Alumno");
			$sheet->setCellValue("B1","Comprobante");
			$sheet->setCellValue("C1","Num. Comprobante");
			$sheet->setCellValue("D1","Fecha");
			$sheet->setCellValue("E1","Total");
//generamos las demás fila de acuerdo a los registros que tenemos en la tabla de mysql
			$i=3;
			foreach($datos as $dato)
			{
				$sheet->setCellValue("A".$i,$dato->nombre);
				$sheet->setCellValue("B".$i,$dato->nombre_comprobante);
				$sheet->setCellValue("C".$i,$dato->num_documento);
				$sheet->setCellValue("D".$i,  date("d-m-Y  H:i:s",strtotime($dato->fecha)));
				$sheet->setCellValue("E".$i,$dato->total);
				$i++;
			}
//generar la renderización del documento excel
			header("Content-Type: application/vnd.ms-excel");
			$nombre="Reporte_ventas".date("Y-m-d H:i:s");
			header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
			header("Cache-Control: max-age=0");
			$writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
			$writer->save("php://output");
			
		}	
	}
	public function excelCompras()
	{ 
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("Excel")) {
			$datos = $this->Reportes_model->getComprasbyDate($fechainicio,$fechafin);
			//print_r( $datos);
			$this->phpexcel->getProperties()
			->setTitle('excel')
			->setDescription('descripción');
			$sheet=$this->phpexcel->getActiveSheet();
			$sheet->setTitle('Reporte Compras');               
//generamos la primera fila
			$sheet->setCellValue("A1","Nombre proveedor");
			$sheet->setCellValue("B1","Comprobante");
			$sheet->setCellValue("C1","Num. Comprobante");
			$sheet->setCellValue("D1","Fecha");
			$sheet->setCellValue("E1","Total");
//generamos las demás fila de acuerdo a los registros que tenemos en la tabla de mysql
			$i=3;
			foreach($datos as $dato)
			{
				$sheet->setCellValue("A".$i,$dato->nombre_proveedor);
				$sheet->setCellValue("B".$i,$dato->nombre_comprobante);
				$sheet->setCellValue("C".$i,$dato->numero_documento);
				$sheet->setCellValue("D".$i,  date("d-m-Y  H:i:s",strtotime($dato->fecha)));
				$sheet->setCellValue("E".$i,$dato->total);
				$i++;
			}
//generar la renderización del documento excel
			header("Content-Type: application/vnd.ms-excel");
			$nombre="Reporte_Compras".date("Y-m-d H:i:s");
			header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
			header("Cache-Control: max-age=0");
			$writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
			$writer->save("php://output");
			
		}	
	}
	public function excelInventarios()
	{ 
		
			$datos = $this->Inventario_model->getInventario();
			//print_r( $datos);
			$this->phpexcel->getProperties()
			->setTitle('excel')
			->setDescription('descripción');
			$sheet=$this->phpexcel->getActiveSheet();
			$sheet->setTitle('Reporte inventarios');               
//generamos la primera fila
			$sheet->setCellValue("A1","Producto");
			$sheet->setCellValue("B1","Talla");
			$sheet->setCellValue("C1","Precio");
			$sheet->setCellValue("D1","Existecias");
			$sheet->setCellValue("E1","Categoria");
			$sheet->setCellValue("F1","Escuela");
//generamos las demás fila de acuerdo a los registros que tenemos en la tabla de mysql
			$i=3;
			foreach($datos as $dato)
			{
				$sheet->setCellValue("A".$i,$dato->producto);
				$sheet->setCellValue("B".$i,$dato->talla);
				$sheet->setCellValue("C".$i,$dato->precio);
				$sheet->setCellValue("D".$i,$dato->stock);
				$sheet->setCellValue("E".$i,$dato->nombre);
				$sheet->setCellValue("F".$i,$dato->nombre_escuela);
				$i++;
			}
//generar la renderización del documento excel
			header("Content-Type: application/vnd.ms-excel");
			$nombre="Reporte_Inventarios".date("Y-m-d H:i:s");
			header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
			header("Cache-Control: max-age=0");
			$writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
			$writer->save("php://output");
			
	}
	public function excelproductosVendidos()
	{ 
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("Excel")) {
			$datos = $this->Reportes_model->getProductosVendidosbyDate($fechainicio,$fechafin);
			//print_r( $datos);
			$this->phpexcel->getProperties()
			->setTitle('excel')
			->setDescription('descripción');
			$sheet=$this->phpexcel->getActiveSheet();
			$sheet->setTitle('Reporte ventas por alumno');               
//generamos la primera fila
			$sheet->setCellValue("A1","Nombre Alumno");
			$sheet->setCellValue("B1","Escuela");
			$sheet->setCellValue("C1","Grado");
			$sheet->setCellValue("D1","Prenda");
			$sheet->setCellValue("E1","Talla");
			$sheet->setCellValue("F1","Fecha Compra");
			$sheet->setCellValue("G1","Precio");

//generamos las demás fila de acuerdo a los registros que tenemos en la tabla de mysql
			$i=3;
			foreach($datos as $dato)
			{
				$sheet->setCellValue("A".$i,$dato->nombre." ".$dato->apellidos);
				$sheet->setCellValue("B".$i,$dato->nombre_escuela);
				$sheet->setCellValue("C".$i,$dato->grado);
				$sheet->setCellValue("D".$i,$dato->producto);
				$sheet->setCellValue("E".$i,$dato->talla);
				$sheet->setCellValue("F".$i,date("d-m-Y  H:i:s",strtotime($dato->fecha)));
				$sheet->setCellValue("G".$i,$dato->precio);
				$i++;
			}
//generar la renderización del documento excel
			header("Content-Type: application/vnd.ms-excel");
			$nombre="Reporte_ventas".date("Y-m-d H:i:s");
			header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
			header("Cache-Control: max-age=0");
			$writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
			$writer->save("php://output");
			
		}	
	}
	public function excelGastos()
	{ 
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("Excel")) {
			$datos = $this->Reportes_model->getGastosbyDate($fechainicio,$fechafin);
			//print_r( $datos);
			$this->phpexcel->getProperties()
			->setTitle('excel')
			->setDescription('descripción');
			$sheet=$this->phpexcel->getActiveSheet();
			$sheet->setTitle('Reporte gastos uniformes');               
//generamos la primera fila
			$sheet->setCellValue("A1","Nombre proveedor");
			$sheet->setCellValue("B1","Escuela");
			$sheet->setCellValue("C1","Prenda");
			$sheet->setCellValue("D1","Talla");
			$sheet->setCellValue("E1","Fecha Compra");
			$sheet->setCellValue("F1","Costo");

//generamos las demás fila de acuerdo a los registros que tenemos en la tabla de mysql
			$i=3;
			foreach($datos as $dato)
			{
				$sheet->setCellValue("A".$i,$dato->nombre_proveedor." ".$dato->apellidos);
				$sheet->setCellValue("B".$i,$dato->nombre_escuela);
				$sheet->setCellValue("C".$i,$dato->producto);
				$sheet->setCellValue("D".$i,$dato->talla);
				$sheet->setCellValue("E".$i,date("d-m-Y  H:i:s",strtotime($dato->fecha)));
				$sheet->setCellValue("F".$i,$dato->costo);
				$i++;
			}
//generar la renderización del documento excel
			header("Content-Type: application/vnd.ms-excel");
			$nombre="Reporte_gastos".date("Y-m-d H:i:s");
			header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
			header("Cache-Control: max-age=0");
			$writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
			$writer->save("php://output");
			
		}	


	}
public function excelResumenVenta()
	{ 
		$fechainicio = $this->input->post("fechainicio");
		$fechafin = $this->input->post("fechafin");
		if ($this->input->post("Excel")) {
			$datos = $this->Reportes_model->getResumenbyDate($fechainicio,$fechafin);
			//print_r( $datos);
			$this->phpexcel->getProperties()
			->setTitle('excel')
			->setDescription('descripción');
			$sheet=$this->phpexcel->getActiveSheet();
			$sheet->setTitle('Reporte detallado de ventas');               
//generamos la primera fila
			$sheet->setCellValue("A1","Prenda");
			$sheet->setCellValue("B1","Talla");
			$sheet->setCellValue("C1","Cantidad");
			$sheet->setCellValue("D1","Precio Unit.");
			$sheet->setCellValue("E1","Total");

//generamos las demás fila de acuerdo a los registros que tenemos en la tabla de mysql
			$i=3;
			foreach($datos as $dato)
			{
				$sheet->setCellValue("A".$i,$dato->producto);
				$sheet->setCellValue("B".$i,$dato->talla);
				$sheet->setCellValue("C".$i,$dato->cantidadProducto);
				$sheet->setCellValue("D".$i,$dato->precio);
			    $totalp = $dato->precio*$dato->cantidadProducto;
				$sheet->setCellValue("E".$i,$totalp);
				$i++;
			}
//generar la renderización del documento excel
			header("Content-Type: application/vnd.ms-excel");
			$nombre="Reporte_gastos".date("Y-m-d H:i:s");
			header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
			header("Cache-Control: max-age=0");
			$writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
			$writer->save("php://output");
			
		}	


	}	

}
