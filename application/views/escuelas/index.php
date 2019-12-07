<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
   Escuela
 </h1>
</section>
<section class="content">
  <div class="box box-solid">
   <div class="box-body">
    <div class="row">
     <div class="col-md-12">
     <?php if($permisos->insert == 1):?> 
      <a href="<?php echo base_url('escuelas/add'); ?>" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Escuela</a>
    <?php endif; ?>
      <br><br>
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
       <th scope="col">Nombre</th>
       <th scope="col">Direcciòn</th>
       <th scope="col">Teléfono </th>
       <th scope="col">Opciones</th>
       
     </tr>
   </thead>
   <tbody>

     <?php foreach ($datos as $data):?>
      <tr>
       <th scope="row"><?php echo  $data->nombre_escuela; ?></th>
       <td><?php echo $data->direccion; ?></td>
       <td><?php echo $data->telefono; ?></td>
       <td>
        <div class="btn-group"> 
          <?php if($permisos->update == 1):?>
         <a href="<?php echo base_url() ?>escuelas/edit/<?php echo $data->id_escuela ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
         <?php endif; ?>
         <?php if($permisos->delete == 1):?> 
         <a href="<?php echo base_url() ?>escuelas/delete/<?php echo $data->id_escuela ?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
         <?php endif; ?> 
       </div>
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

