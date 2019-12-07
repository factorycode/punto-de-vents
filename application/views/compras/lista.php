
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Lista de Compras 
      </h1>
   </section>
   <section class="content">
      <div class="box box-solid">
         <div class="box-body">
            <div class="row">
               <div class="col-md-12">
                  <?php if($permisos->insert == 1):?>
                  <a href="<?php
                     echo base_url('compras/add');
                     ?>" class="btn btn-primary btn-flat"><span class="fa fa-shopping-cart "></span> Nueva compra</a>
                  <?php endif; ?>
                  <br><br>
                  <?php
                     if ($this->session->flashdata('mensaje') != '') {
                     ?>
                  <div class="alert alert-<?php
                     echo $this->session->flashdata('css');
                     ?>">
                     <?php
                        echo $this->session->flashdata('mensaje');
                        ?>
                  </div>
                  <?php
                     }
                     ?>
                  <?php
                     //acá visualizamos los mensajes de error
                     $errors = validation_errors('<li>', '</li>');
                     if ($errors != "") {
                     ?>
                  <div class="alert alert-danger">
                     <ul>
                        <?php
                           echo $errors;
                           ?>
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
                           <th scope="col">Numero compra</th>
                           <th scope="col">Proveedor</th>
                           <th scope="col">fecha</th>
                           <th scope="col">Documento </th>
                           <th scope="col">IVA</th>
                           <th scope="col">Subtotal</th>
                           <th scope="col">Total</th>
                           <th scope="col">Opciones</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                           foreach ($datos as $data):
                           ?>
                        <tr>
                           <th scope="row"><?php
                              echo $data->id_compra;
                              ?></th>
                           <td><?php
                              echo $data->nombre_proveedor;
                              ?></td>
                           <td><?php
                              echo $data->fecha;
                              ?></td>
                           <td><?php
                              echo $data->nombre_comprobante;
                              ?></td>
                           <td><?php
                              echo $data->iva;
                              ?></td>
                              <td><?php
                              echo $data->subtotal;
                              ?></td>
                              <td><?php
                              echo $data->total;
                              ?></td>
                           <td>
                              <?php if($permisos->insert == 1):?>
                              <button type="button" class="btn btn-info btn-view-compra" value="<?php
                                 echo $data->id_compra;
                                 ?>" data-toggle="modal" data-target="#modal-default2"><span class="fa fa-search"></span></button>
                              <?php endif; ?>
                           </td>
                        </tr>
                        <?php
                           endforeach;
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
<div class="modal fade" id="modal-default2">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Informacion de la Compra</h4>
         </div>
         <div class="modal-body">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary btn-print-compras"><span class="fa fa-print"> </span>Imprimir</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

