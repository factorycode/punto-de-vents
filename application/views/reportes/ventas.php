<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
    Reporte ventas
  </h1>
</section>
<section class="content">
  <div class="box box-solid">
   <div class="box-body">
    <div class="row">
      <?php if($permisos->insert == 1):?>
      <form action="" method="POST" class="form-horizontal">
        <div class="form-group">
          <label for="" class="col-md-1 control-label">Desde:</label>
          <div class="col-md-3">
            <input type="date" class="form-control" name="fechainicio" required="selecciona una fecha">
          </div>
          <label for="" class="col-md-1 control-label">Hasta:</label>
          <div class="col-md-3">
            <input type="date" class="form-control" name="fechafin" required="selecciona una fecha">
          </div>
          <div class="col-md-4">
            <input type="submit" name="buscar" value="Buscar" class="btn btn-primary" onclick=this.form.action="reportes">
           <input type="submit" name="Excel" value="Excel" class="btn btn-success" onclick=this.form.action="reportes/excelVentas">
            <a href="<?php echo base_url(); ?>reportes" class="btn btn-danger">Restablecer</a>
          </div>
        </div>
      </form>
      <?php endif; ?>
      <div class="col-md-12">
        <?php 
        if($this->session->flashdata('mensaje')!='')
        {
         ?>
         <div class="alert alert-<?php echo $this->session->flashdata('css')?>">
          <?php echo $this->session->flashdata('mensaje')?></div>
          <?php 
        }
        ?>
        <?php
                //acá visualizamos los mensajes de error
        $errors=validation_errors('<li>','</li>');
        if($errors!="")
        {
          ?>
          <div class="alert alert-danger">
            <ul>
              <?php echo $errors;?>
            </ul>
          </div>
          <?php
        }
        ?>
        
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
      <table id="example1" class="table table-bordered table-hover">
       <thead>
        <tr>
         <th scope="col">Nombre Alumno</th>
         <th scope="col">Comprobante</th>
         <th scope="col">Num Comprobante</th>
         <th scope="col">Fecha</th>
         <th scope="col">Total</th>
         <th scope="col">Opciones</th>
       </tr>
     </thead>
     <tbody>

       <?php foreach ($datos as $data):?>
        <tr>
         <th scope="row"><?php echo  $data->nombre; ?></th>
         <td><?php echo $data->nombre_comprobante; ?></td>
         <td><?php echo $data->num_documento; ?></td>
         <td><?php echo  date("d-m-Y  H:i:s",strtotime($data->fecha)); ?></td>
         <td><?php echo $data->total; ?></td>
         <td>
          <?php if($permisos->insert == 1):?>
            <button type="button" class="btn btn-info btn-view-venta" value="<?php echo $data->id_venta;?>" data-toggle="modal" data-target="#modal-default"><span class="fa fa-search"></span></button>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
</div>
</div>
</div>
</section>
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Informacion de la venta</h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
