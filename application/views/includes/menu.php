<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
 <!-- sidebar: style can be found in sidebar.less -->
 <section class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
   <div class="pull-left image">
    <img src=<?php echo base_url('assets/dist/img/user2-160x160.jpg') ?> class="img-circle" alt="User Image">
  </div>
  <div class="pull-left info">
    <p><?php echo $this->session->userdata('nombre'); ?>  <?php echo $this->session->userdata('apellido_m'); ?></p>
    <!-- Status -->
    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
  </div>
</div>
<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
 <li class="header">Menù</li>
 <!-- Optionally, you can add icons to the links -->
 <li class="active">
  <a href="<?php echo base_url();?>dashboard">
    <i class="fa fa-home"></i> <span>Inicio</span>
  </a>
</li>
<li><a href="<?php echo base_url()?>inventario"><i class="fa fa-list"></i> <span>Inventario</span></a>
</li>
<li><a href="<?php echo base_url()?>ventas"><i class="fa fa-cart-plus"></i> <span>Ventas</span></a></li>
<li class="treeview">
  <a href="<?php echo base_url()?>compras"><i class="fa fa-truck"></i> <span>compras</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
   <li><a href="<?php echo base_url()?>proveedores"><i class="fa fa-users"></i> Proveedores </a></li>
   <li><a href="<?php echo base_url()?>compras"><i class="fa fa-cart-plus"></i>Nueva compra</a></li>
 </ul>
</li>
<li><a href="<?php echo base_url()?>categorias"><i class="fa fa-list-ol"></i> <span>Categorias</span></a></li>

<li class="treeview">
  <a href="<?php echo base_url()?>reportes"><i class="fa fa-signal"></i> <span>Reportes</span>
    <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
    </span>
  </a>
  <ul class="treeview-menu">
   <li><a href="<?php echo base_url()?>reportes"><i class="fa fa-bar-chart"></i> Ventas</a></li>
   <li><a href="<?php echo base_url()?>reportes/compras"><i class="fa fa-line-chart"></i>Compras</a></li>
   <li><a href="<?php echo base_url()?>reportes/inventarios"><i class="fa fa-bar-chart"></i> Inventarios</a></li>
   <li><a href="<?php echo base_url()?>reportes/productos"><i class="fa fa-area-chart"></i>Productos vendidos</a></li>
   <li><a href="<?php echo base_url()?>reportes/gastos"><i class="fa  fa-pie-chart"></i>Gastos</a></li>
   <li><a href="<?php echo base_url()?>reportes/resumen_venta"><i class="fa  fa-pie-chart"></i>Resumen venta</a></li>
 </ul>
</li>

<li><a href="<?php echo base_url()?>clientes"><i class="fa fa-users"></i> <span>Alumnos</span></a></li>
<li><a href="<?php echo base_url()?>escuelas"><i class="fa  fa-institution 
  "></i> <span>Escuelas</span></a></li>
  <li class="treeview">
    <a href="#">
      <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="<?php echo base_url();?>usuarios"><i class="fa fa-users"></i> Usuarios</a></li>
      <li><a href="<?php echo base_url();?>permisos"><i class="fa fa-circle-o"></i> Permisos</a></li>
    </ul>
    <li><a href="<?php echo base_url()?>login/salir"><i class="fa  fa-sign-out"></i> <span>Cerrar session</span></a></li>
    </li>
         <!--
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
              </ul>
            </li>
          -->
        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>

