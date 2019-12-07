

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Compras
      </h1>
   </section>
   <!-- Main content -->
   <section class="content">
      <!-- Default box -->
      <div class="box box-solid">
         <div class="box-body">
            <div class="row">
               <div class="col-md-12">
                  <form action="<?php echo base_url();?>compras/comprar" method="POST" class="form-horizontal">
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
                     <div class="form-group">
                        <div class="col-md-3">
                           <label for="">Comprobante:</label>
                           <select name="comprobantes" id="comprobantes2" class="form-control">
                              <option value="">Seleccione...</option>
                              <?php foreach($tipocomprobantes as $tipocomprobante):?> 
                              <?php $datacomprobante = $tipocomprobante->id_comprobante."*".$tipocomprobante->cantidad."*".$tipocomprobante->iva."*".$tipocomprobante->serie;?>
                              <option value="<?php echo $datacomprobante;?>"><?php echo $tipocomprobante->nombre_comprobante?></option>
                              <?php endforeach;?>
                           </select>
                           <input type="hidden" id="id_comprobante" name="id_comprobante">
                           <input type="hidden" id="iva">
                        </div>
                        <div class="col-md-3">
                           <label for="">Serie:</label>
                           <input type="text" class="form-control" id="serie" name="serie" readonly>
                        </div>
                        <div class="col-md-3">
                           <label for="">Numero:</label>
                           <input type="text" class="form-control" id="numero" name="numero" readonly>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-4">
                           <label for="">Proveedor:</label>
                           <div class="input-group">
                              <input type="hidden" name="id_proveedor" id="id_proveedor">
                              <input type="text" class="form-control" name="nombre_proveedor" disabled="disabled" id="nombre_proveedor">
                              <span class="input-group-btn">
                                 <?php if($permisos->insert == 1):?>
                              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal3" ><span class="fa fa-search"></span> Buscar proveedor</button>
                           <?php endif; ?>
                              </span>
                           </div>
                           <!-- /input-group -->
                        </div>
                        <div class="col-md-4">
                           <label for="">Apellidos:</label>
                           <input type="text" class="form-control" name="apellidos" id="apellidos" readonly>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-3">
                           <label for="">&nbsp;</label>
                           <span class="input-group-btn">
                              <?php if($permisos->insert == 1):?>
                           <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal4" ><span class="fa fa-search"></span> Agregar producto</button>
                        <?php endif; ?>
                           </span>
                        </div>
                     </div>
                     <table id="tbproveedores" class="table table-bordered table-striped table-hover">
                        <thead>
                           <tr>
                              <th>Producto</th>
                              <th>Talla</th>
                              <th>Costo</th>
                              <th>Existencias</th>
                              <th>Escuela</th>
                              <th>Cantidad</th>
                              <th>Importe</th>
                           </tr>
                        </thead>
                        <tbody>

                        </tbody>
                     </table>
                     <div class="form-group">
                        <div class="col-md-3">
                           <div class="input-group">
                              <span class="input-group-addon">Subtotal:</span>
                              <input type="text" class="form-control" placeholder="0.00" name="subtotal" readonly="readonly">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="input-group">
                              <span class="input-group-addon">IVA:</span>
                              <input type="text" class="form-control" placeholder="Username" name="iva" readonly="readonly">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="input-group">
                              <span class="input-group-addon">Descuento %:</span>
                              <input type="text" class="form-control" placeholder="0.00" name="descuento" id="descuento" value="0.00">
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="input-group">
                              <span class="input-group-addon">Total:</span>
                              <input type="text" class="form-control" placeholder="0.00" name="total" readonly="readonly">
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <div class="col-md-12">
                           <?php if($permisos->insert == 1):?>
                           <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                        <?php endif; ?>
                        </div>
                     </div>
                  </form>
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
<div class="modal fade" id="modal3">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Lista de proveedores</h4>
         </div>
         <div class="modal-body">
            <table id="example1" class="table table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th scope="col">Nombre</th>
                     <th scope="col">Apellidos</th>
                     <th scope="col">Direcciòn</th>
                     <th scope="col">Correo</th>
                     <th scope="col">Telefono</th>
                     <th scope="col"></th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($proveedores as $data):?>
                  <tr>
                     <th scope="row"><?php echo  $data->nombre_proveedor; ?></th>
                     <td><?php echo $data->apellidos; ?></td>
                     <td><?php echo $data->direccion; ?></td>
                     <td><?php echo $data->correo; ?></td>
                     <td><?php echo $data->telefono; ?></td>
                     <?php $dataproveedor = $data->id_proveedor."*".$data->nombre_proveedor."*".$data->apellidos."*".$data->direccion."*".$data->correo."*".$data->telefono;?>
                     <td>
                        <button type="button" class="btn btn-success btn-check1" value="<?php echo $dataproveedor;?>"><span class="fa fa-check"></span></button>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
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
<!-- /.modal para agregar produtos -->
<div class="modal fade" id="modal4">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal2" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Lista de Productos</h4>
         </div>
         <div class="modal-body">
            <table id="example2" class="table table-bordered table-striped table-hover">
               <thead>
                  <tr>
                     <th scope="col">Nombre</th>
                     <th scope="col">Talla</th>
                     <th scope="col">Costo</th>
                     <th scope="col">Escuela</th>
                     <th scope="col">Existencias</th>
                     <th scope="col">Agregar</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($productos as $data):?>
                  <tr>
                     <th scope="row"><?php echo  $data->producto; ?></th>
                     <td><?php echo $data->talla; ?></td>
                     <td><?php echo $data->costo; ?></td>
                     <td><?php echo $data->nombre_escuela; ?></td>
                     <td><?php echo $data->stock; ?></td>
                     <?php $dataproducto = $data->id_producto ."*".$data->producto."*".$data->talla."*". $data->precio."*".$data->stock."*".$data->id_categoria."*".$data->id_escuela."*".$data->nombre_escuela; ?>
                     <td>
                        <button id="btn-agregar" type="button"  class="btn btn-success btn-flat btn-block3" value="<?php echo $dataproducto;?>"><span class="fa fa-shopping-cart"></span> Agregar </button>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
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

