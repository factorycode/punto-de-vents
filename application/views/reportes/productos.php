<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
    Ventas
  </h1>
</section>
<section class="content">
  <div class="box box-solid">
   <div class="box-body">
    <div class="row">
     <div class="col-md-12">

      <?php if($permisos->insert == 1):?>
       <form action="<?php echo base_url(); ?>reportes/excelproductosVendidos" method="POST" class="form-horizontal">
                <div class="form-group">
                 <label for="" class="col-md-1 control-label">Desde:</label>
                 <div class="col-md-3">
                  <input type="date" class="form-control" name="fechainicio" required>
               </div>
               <label for="" class="col-md-1 control-label">Hasta:</label>
               <div class="col-md-3">
                  <input type="date" class="form-control" name="fechafin" required>
               </div>
               <div class="col-md-4">
                  <input type="submit" name="Excel" value="Excel" class="btn btn-success">
               </div>
            </div>
         </form>

    <?php endif; ?>
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
     <th scope="col">Escuela</th>
     <th scope="col">Grado</th>
     <th scope="col">Prenda</th>
     <th scope="col">Talla</th>
     <th scope="col">Fecha Compra</th>
     <th scope="col">precio</th>
   </tr>
 </thead>
 <tbody>

   <?php foreach ($datos as $data):?>
    <tr>
     <th scope="row"><?php echo  $data->nombre." ".$data->apellidos; ?></th>
     <td><?php echo $data->nombre_escuela; ?></td>
     <td><?php echo $data->grado; ?></td>
     <td><?php echo $data->producto; ?></td>
     <td><?php echo $data->talla; ?></td>
     <td><?php echo  date("d-m-Y  H:i:s",strtotime($data->fecha)); ?></td>
     <td><?php echo $data->precio; ?></td>
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

