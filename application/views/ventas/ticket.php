<!DOCTYPE html>
<html>

<head>
  <!-- estilos de ticket -->
   <link rel="stylesheet" href="<?php echo base_url();?>assets/template/ticket/style.css">
  <script>
    function imprimir() {
  window.print();
}
  </script>
 
</head>

<body>
  <div class="ticket">
    <p class="centrado">
    <b>Uniformate bien </b><br>
    <b>Alumno:</b>  <?php echo $venta->nombre.' '.$venta->apellidos ?> <br>
    <b>ESCUELA:</b>  <?php echo $venta->nombre_escuela ?> <br>
    <b>GRADO:</b>  <?php echo $venta->grado ?> <br>
    <b>FECHA:</b>  <?php echo date("d-m-Y  H:i:s", strtotime($venta->fecha)) ?> <br>
    <b>TELEFONO:</b>  <?php echo $venta->telefono ?> <br>
    <b>NUM.COMP:</b>  <?php echo $venta->num_documento ?> <br>
    <table>
      <thead>
        <tr>
          <th class="product">PRENDA</th>
          <th class="talla">TALLA</th>
          <th class="precio">PRECIO</th>
          <th class="cantidad">CANT.</th>
          <th class="importe">IMP.</th>    

        </tr>
      </thead>
      <?php foreach($detalles as $dato)
    { ?>
      <tbody>
        <tr>
          <td class="product"><?php echo $dato->producto; ?></td>
          <td class="talla"><?php echo $dato->talla; ?></td>
          <td class="precio"><?php echo $dato->precio; ?></td>
          <td class="cantidad"><?php echo $dato->cantidad; ?></td>
          <td class="importe"><?php echo $dato->importe; ?></td>
        </tr>
      </tbody>
    <?php } ?>
    <tfoot>
    <tr>
    <td colspan="4" class="text-right"><strong>Subtotal:</strong></td>
    <td> <?php  echo $venta->subtotal ?></td>
    </tr>
    <tr>
    <td colspan="4" class="text-right"><strong>IVA:</strong></td>
    <td><?php echo $venta->iva?></td>
    </tr>
    <tr>
    <td colspan="4" class="text-right"><strong>Descuento:</strong></td>
    <td> <?php echo $venta->descuento ?></td>
    </tr>
    <tr>
    <td colspan="4" class="text-right"><strong>Total:</strong></td>
    <td><?php  echo $venta->total?></td>
    </tr>
    </tfoot>    
    </table>
    Tel. 4423477676 <br>
    horarios de venta Martes y Jueves de 10:00 a 15:00 horas <br>
    Sábados de 10:00 a 13:00 horas <br>
    <p class="centrado">¡GRACIAS POR SU COMPRA!</p>
  </div>
  <button class="oculto-impresion" onclick="imprimir()">Imprimir</button><br><br>
  <a class="oculto-impresion" href="<?php echo base_url()?>ventas">CLICK PARA REGRESAR</a>
</body>
<br>
</html>