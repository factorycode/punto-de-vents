
<div class="row">
	<div class="col-xs-12 text-center">
		<b>Uniformate bien </b><br>
		Tel. 4423477676 <br>
		Horarios de venta Martes y Jueves de 10:00 a 15:00 horas <br>
		Sábados de 10:00 a 13:00 horas <br>
	
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>Alumno:</b><br>
		<b>Nombre:</b> <?php echo $venta->nombre;?> <br>
		<b>Telefono:</b> <?php echo $venta->telefono;?> <br>
		<b>Escuela:</b> <?php echo $venta->nombre_escuela;?><br>
		<b>Grado</b> <?php echo $venta->grado;?><br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $venta->nombre_comprobante;?><br>
		<b>Serie:</b> <?php echo $venta->serie;?><br>
		<b>Nro de Comprobante:</b><?php echo $venta->num_documento;?><br>
		<b>Fecha</b> <?php echo date("d-m-Y  H:i:s", strtotime($venta->fecha)) ;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Prenda</th>
					<th>Talla</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->producto;?></td>
					<td><?php echo $detalle->talla;?></td>
					<td><?php echo $detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					<td><?php echo $detalle->importe;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $venta->subtotal;?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>IVA:</strong></td>
					<td><?php echo $venta->iva;?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $venta->descuento;?></td>
				</tr>
				<tr>
					<td colspan="4" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $venta->total;?></td>
				</tr>
			</tfoot>
		</table>
		<footer>
  <p>Nota 1: la venta es solo de prendas en existencia, no es posible hacer pedidos </p>
  <p>Nota 2: cambios de tallas solo se podrán hacer dentro de los 30 días siguientes en la fecha de compra</p>
  <p>Nota 3: No se aceptaran devoluciones de mercancía </p>
</footer>
	</div>
</div>