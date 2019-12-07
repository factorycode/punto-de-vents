
<div class="row">
	<div class="col-xs-12 text-center">
		<b>Uniformate bien </b><br>
		Tel.4423477676 <br>
	</div>
</div> <br>
<div class="row">
	<div class="col-xs-6">	
		<b>PROVEEDOR:</b><br>
		<b>Nombre:</b> <?php echo $compra->nombre_proveedor;?> <br>
		<b>Telefono:</b> <?php echo $compra->telefono;?> <br>
		<b>Direccion:</b> <?php echo $compra->direccion;?><br>
	</div>	
	<div class="col-xs-6">	
		<b>COMPROBANTE</b> <br>
		<b>Tipo de Comprobante:</b> <?php echo $compra->nombre_comprobante;?><br>
		<b>Serie:</b> <?php echo $compra->serie;?><br>
		<b>Num. de Comprobante:</b><?php echo $compra->numero_documento;?><br>
		<b>Fecha</b> <?php echo date("d-m-Y  H:i:s", strtotime($compra->fecha)) ;?>
	</div>	
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Talla</th>
					<th>Escuela</th>
					<th>Precio</th>
					<th>Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($detalles as $detalle):?>
				<tr>
					<td><?php echo $detalle->producto;?></td>
					<td><?php echo $detalle->talla; ?></td>
					<td><?php echo $detalle->nombre_escuela; ?></td>
					<td><?php echo $detalle->precio;?></td>
					<td><?php echo $detalle->cantidad;?></td>
					<td><?php echo $detalle->importe;?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="5" class="text-right"><strong>Subtotal:</strong></td>
					<td><?php echo $compra->subtotal;?></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right"><strong>IVA:</strong></td>
					<td><?php echo $compra->iva;?></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right"><strong>Descuento:</strong></td>
					<td><?php echo $compra->descuento;?></td>
				</tr>
				<tr>
					<td colspan="5" class="text-right"><strong>Total:</strong></td>
					<td><?php echo $compra->total;?></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>