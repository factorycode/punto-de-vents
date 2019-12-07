<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Categorias 
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Agregar nueva categoría </h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <?php 
               $atributos = array( 'id' => 'form','name'=>'form');
                  //echo form_open(null, $atributos);
               echo form_open_multipart(null,$atributos);
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
            <div class="box-body">
               <div class="form-group">
                  <label for="exampleInputname">Nombre</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="nombre categoria" value="<?php echo set_value("nombre")?>">
               </div>
               <div class="form-group">
                  <label for="comment">Descripción</label>
                  <textarea class="form-control" rows="3" name="descripcion" id="descripcion" value="<?php echo set_value('descripcion'); ?>"></textarea>
               </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <button type="submit" class="btn btn-primary">Clic para agregar </button>
            </div>
            <?php echo form_close(); ?>
         </div>
         <!-- /.box -->
      </div>
   </div>
</section>
</div>