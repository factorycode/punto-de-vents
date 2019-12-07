<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Clientes 
      </h1>
   </section>
   <section class="content">
      <div class="row">
         <!-- left column -->
         <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
               <div class="box-header with-border">
                  <h3 class="box-title">Editar Información cliente </h3>
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
                  <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo $datos->nombre_proveedor?>">
               </div>
               <div class="form-group">
                  <label for="exampleInputname">Apellidos</label>
                  <input type="text" class="form-control" name="apellidos" id="apellidos"  value="<?php echo $datos->apellidos?>">
               </div>
               <div class="form-group">
                  <label for="exampleInputname">Teléfono </label>
                  <input type="text" class="form-control" name="telefono" id="telefono"  value="<?php echo $datos->telefono?>">
               </div>
               <div class="form-group">
                  <label for="exampleInputname">Dirección</label>
                  <input type="text" class="form-control" name="direccion" id="direccion"  value="<?php echo $datos->direccion?>">
               </div>
               <div class="form-group">
                  <label for="exampleInputname">Correo</label>
                  <input type="email" class="form-control" name="correo" id="email"  value="<?php echo $datos->correo?>">
               </div>
               
            </div>               <!-- /.box-body -->
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