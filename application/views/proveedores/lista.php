<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Proveedores
      </h1>
   </section>
   <section class="content">
      <div class="box box-solid">
         <div class="box-body">
            <div class="row">
               <div class="col-md-12">
                  <?php if($permisos->insert == 1):?>
                  <a href="<?php echo base_url('proveedores/add'); ?>" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar proveedor</a>
               <?php endif; ?>
                  <br><br>
                  <?php 
                     if($this->session->flashdata('mensaje')!='')
                     {
                      ?>
                  <div class="alert alert-<?php echo $this->session->flashdata('css')?>">
                     <?php echo $this->session->flashdata('mensaje')?>
                  </div>
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
                           <th scope="col">Apellidos</th>
                           <th scope="col">Correo</th>
                           <th scope="col">Direcciòn</th>
                           <th scope="col">Teléfono </th>
                           <th scope="col">Fecha </th>
                           <th scope="col">Opciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($datos as $data):?>
                        <tr>
                           <th scope="row"><?php echo  $data->nombre_proveedor; ?></th>
                           <td><?php echo $data->apellidos; ?></td>
                           <td><?php echo $data->correo; ?></td>
                           <td><?php echo $data->direccion; ?></td>
                           <td><?php echo $data->telefono; ?></td>
                           <td><?php echo date("d-m-Y  H:i:s", strtotime($data->fecha)) ; ?></td>
                           <td>
                              <div class="btn-group"> 
                                 <?php if($permisos->update == 1):?>
                                 <a href="<?php echo base_url() ?>proveedores/edit/<?php echo $data->id_proveedor ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a> 
                              <?php endif ?>
                              <?php if($permisos->delete == 1):?>
                                 <a href="<?php echo base_url() ?>proveedores/delete/<?php echo $data->id_proveedor ?>" class="btn btn-danger"><span class="fa fa-remove"></span></a>
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

