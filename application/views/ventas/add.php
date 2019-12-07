<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ventas
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">

                        <form action="<?php echo base_url();?>ventas/store" method="POST" class="form-horizontal">
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
                            <select name="comprobantes" id="comprobantes" class="form-control" value="<?php echo set_value("comprobantes")?>">
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
                        <div class="col-md-6">
                            <label for="">Alumno:</label>
                            <div class="input-group">
                                <input type="hidden" name="id_cliente" id="id_cliente">
                                <input type="text" class="form-control" name="nombre" disabled="disabled" id="cliente">
                                <span class="input-group-btn">
                                    <?php if($permisos->insert == 1):?>
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal1" ><span class="fa fa-search"></span> Buscar alumno</button>
                                    <?php endif; ?>
                                </span>
                            </div><!-- /input-group -->
                        </div>                                 
                        <div class="col-md-3">
                            <label for="">Escuela</label>
                            <input type="hidden" name="id_escuela" id="id_escuela">
                            <input type="text" class="form-control" name="escuela" id="escuela" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="">Grado:</label>
                            <input type="text" class="form-control" id="grado" name="grado" readonly>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <label for="">&nbsp;</label>
                            <span class="input-group-btn">
                                <?php if($permisos->insert == 1):?>
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal2" ><span class="fa fa-search"></span> Buscar producto</button>
                            <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <table id="tbventas" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Talla</th>
                                <th>Precio</th>
                                <th>Existencias</th>
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
                        <?php if($permisos->insert == 1):?>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                        <?php endif ?>
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

<div class="modal fade" id="modal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Lista de Alumnos</h4>
                </div>
                <div class="modal-body">
                    <table id="example1" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Escuela</th>
                                <th scope="col">Grado</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $data):?>
                              <tr>
                               <th scope="row"><?php echo  $data->nombre; ?></th>
                               <td><?php echo $data->apellidos; ?></td>
                               <td><?php echo $data->nombre_escuela; ?></td>
                               <td><?php echo $data->grado; ?></td>
                               <td><?php echo $data->direccion; ?></td>
                               <?php $dataalumno = $data->id_cliente ."*".$data->nombre."*".$data->apellidos."*". $data->nombre_escuela."*".$data->id_escuela."*".$data->grado."*".$data->telefono."*". $data->direccion; ?>
                               <td>
                                <button type="button" class="btn btn-success btn-check" value="<?php echo $dataalumno;?>"><span class="fa fa-check"></span></button>
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
<div class="modal fade" id="modal2">
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
                                <th scope="col">Precio</th>
                                <th scope="col">Existencias</th>
                                <th scope="col">Agregar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($productos as $data):?>
                              <tr>
                               <th scope="row"><?php echo  $data->producto; ?></th>
                               <td><?php echo $data->talla; ?></td>
                               <td><?php echo $data->precio; ?></td>
                               <td><?php echo $data->stock; ?></td>
                               <?php $dataproducto = $data->id_producto ."*".$data->producto."*".$data->talla."*". $data->precio."*".$data->stock."*".$data->id_categoria."*".$data->id_escuela; ?>
                               <td>
                                <?php if ($data->stock > 0){ ?>
                                    
                                    <button id="btn-agregar" type="button"  class="btn btn-success btn-flat btn-block" value="<?php echo $dataproducto;?>"><span class="fa fa-shopping-cart"></span> Agregar </button>
                                <?php }else{ ?>
                                  <button type="button" class="btn btn-block btn-danger disabled" ><span class="fa fa-cart-arrow-down"></span> Surtir</button>

                              <?php } ?>
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