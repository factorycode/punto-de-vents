
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Usuarios
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                      <?php if($permisos->insert == 1):?>
                        <a href="<?php echo base_url();?>usuarios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Usuario</a>
                      <?php endif; ?>
                    </div>
                </div>
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
      
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($usuarios)):?>
                                    <?php foreach($usuarios as $usuario):?>
                                        <tr>
                                            
                                            <td><?php echo $usuario->nombre;?></td>
                                            <td><?php echo $usuario->apellidos;?></td>
                                            <td><?php echo $usuario->correo;?></td>
                                            <td><?php echo $usuario->nombre_rol;?></td>
                                            <td>
                                              <?php if($usuario->estado == 1): ?>
                                              <span class="fa fa-check"></span>
                                                <?php else: ?>
                                              <span class="fa fa-times"></span>
                                             <?php endif;?>
                                              </td>
                                            <td>

                                                <div class="btn-group">
                                                  <?php if($permisos->update == 1):?>
                                                    <a href="<?php echo base_url()?>usuarios/edit/<?php echo $usuario->id_usuario;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                  <?php endif; ?>
                                                  <?php if($permisos->delete == 1):?>
                                                    <a href="<?php echo base_url();?>usuarios/delete/<?php echo $usuario->id_usuario;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                  <?php endif; ?>
                                                   <?php if($permisos->update == 1):?>
                                                    <a href="<?php echo base_url();?>usuarios/altaUser/<?php echo $usuario->id_usuario;?>" class="btn btn-success btn-check"><span class="fa fa-check"></span></a>
                                                  <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Categoria</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
