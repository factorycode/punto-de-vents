<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1>
   Inventario
 </h1>
</section>
<section class="content">
  <div class="row">
   <!-- left column -->
   <div class="col-md-6">
    <!-- general form elements -->
    <div class="box box-primary">
     <div class="box-header with-border">
      <h3 class="box-title">Agregar producto </h3>
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
     <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo set_value("nombre")?>">
   </div>
   <div class="form-group">
     <label for="exampleInputname">Talla</label>
     <input type="text" class="form-control" name="talla" id="talla"  value="<?php echo set_value("talla")?>">
   </div>
   <div class="form-group">
     <label for="exampleInputname">Costo </label>
     <input type="text" class="form-control" name="costo" id="costo"  value="<?php echo set_value("costo")?>">
   </div>
   <div class="form-group">
     <label for="exampleInputname">Precio </label>
     <input type="text" class="form-control" name="precio" id="precio"  value="<?php echo set_value("precio")?>">
   </div>
   <div class="form-group">
     <label for="exampleInputname">Existencias</label>
     <input type="text" class="form-control" name="stock" id="stock"  value="<?php echo set_value("stock")?>">
   </div>
   <div class="form-group">
    <label>Categoria</label>
    <select class="form-control" name="categoria" id="categoria">
     <?php foreach( $categoria as $dato ){   ?>
      <option value="<?php echo $dato->id_categoria ?>"><?php echo $dato->nombre; ?></option>
      <?php  
    }
    ?>                   
  </select>
  <div class="form-group">
   <label for="exampleInputname">Nombre Escuela</label>
   <select class="form-control" name="escuela" id="escuela">
     <?php foreach( $escuela as $esc ){   ?>
      <option value="<?php echo $esc->id_escuela ?>"><?php echo $esc->nombre_escuela; ?></option>
      <?php  
    }
    ?>                   
  </select>
</div>
<!-- /.box-body -->
<div class="box-footer">
  <button type="submit" class="btn btn-primary">Clic para agregar </button>
</div>
</div>
<!-- /.box -->
</div>
</div>
</section>
</div>