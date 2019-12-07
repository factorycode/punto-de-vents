<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
   Categorias 
 </h1>
</section>
<section class="content">
  <div class="box box-solid">
   <div class="box-body">
    <div class="row">
     <div class="col-md-12">
      <?php if($permisos->insert == 1):?>
      <a href="<?php echo base_url('categorias/add'); ?>" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar categoria</a>
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
       <th scope="col">Descripciòn</th>
       <th scope="col">Estado</th>
       <th scope="col">Opciones</th>
     </tr>
   </thead>
   <tbody>
    <?php foreach ($datos as $data):?>
      <tr>
       <th scope="row"><?php echo  $data->nombre; ?></th>
       <td><?php echo $data->descripcion; ?></td>
       <td><?php echo $data->estado; ?></td>
       <td>
        <div class="btn-group">
         <button type="button" class="btn btn-info btn-view" data-toggle="modal" data-target="#modal-info"
         value ="<?php echo $data->id_categoria; ?>"> 
         <span class="fa fa-search"></span>
       </button> 
       <?php if($permisos->update == 1):?>
       <a href="<?php echo base_url() ?>categorias/edit/<?php echo $data->id_categoria ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> 
       <?php endif; ?>
       <?php if($permisos->delete == 1):?>
       <a href="<?php echo base_url() ?>categorias/delete/<?php echo $data->id_categoria ?>" class="btn btn-danger"><span class="fa fa-remove"></span></a> 
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
<div class="modal modal-info fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
     <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>