<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
    Reporte Inventario
  </h1>
</section>
<section class="content">
  <div class="box box-solid">
   <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <form action="<?php echo base_url();?>reportes/excelInventarios" method="POST" class="form-horizontal">
                <div class="form-group">               
               <div class="col-md-4">
                  <input type="submit" name="Excel" value="Excel" class="btn btn-success btn-lg">
               </div>
            </div>
         </form>
       </div>
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
       <th scope="col">Producto</th>
       <th scope="col">Talla</th>
       <th scope="col">Precio </th>
       <th scope="col">Stock</th>
       <th scope="col">Categoria</th>
       <th scope="col">Escuela</th>
       
     </tr>
   </thead>
   <tbody>

     <?php foreach ($datos as $data):?>
      <tr>
       <th scope="row"><?php echo  $data->producto; ?></th>
       <td><?php echo $data->talla; ?></td>
       <td><?php echo '$'.$data->precio; ?></td>
       <td><?php echo $data->stock; ?></td>
       <td><?php echo $data->nombre; ?></td>
       <td><?php echo $data->nombre_escuela; ?></td>
       
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

