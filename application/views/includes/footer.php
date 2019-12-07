<!-- Main Footer -->
<footer class="main-footer">
 <!-- To the right -->
 <!-- Default to the left -->
 <strong>Copyright &copy; <?php echo date("Y"); ?> <a href="http://inovatic.com.mx/">INNOVATIC</a>.</strong> All rights reserved.
</footer>
<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
 <!-- Create the tabs -->
 <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
  <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
  <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
</ul>
<!-- Tab panes -->
<div class="tab-content">
  <!-- Home tab content -->
  <div class="tab-pane active" id="control-sidebar-home-tab">
   <h3 class="control-sidebar-heading">Recent Activity</h3>
   <ul class="control-sidebar-menu">
    <li>
     <a href="javascript:;">
      <i class="menu-icon fa fa-birthday-cake bg-red"></i>
      <div class="menu-info">
       <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
       <p>Will be 23 on April 24th</p>
     </div>
   </a>
 </li>
</ul>
<!-- /.control-sidebar-menu -->
<h3 class="control-sidebar-heading">Tasks Progress</h3>
<ul class="control-sidebar-menu">
  <li>
   <a href="javascript:;">
    <h4 class="control-sidebar-subheading">
     Custom Template Design
     <span class="pull-right-container">
       <span class="label label-danger pull-right">70%</span>
     </span>
   </h4>
   <div class="progress progress-xxs">
     <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
   </div>
 </a>
</li>
</ul>
<!-- /.control-sidebar-menu -->
</div>
<!-- /.tab-pane -->
<!-- Stats tab content -->
<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
<!-- /.tab-pane -->
<!-- Settings tab content -->
<div class="tab-pane" id="control-sidebar-settings-tab">
 <form method="post">
  <h3 class="control-sidebar-heading">General Settings</h3>
  <div class="form-group">
   <label class="control-sidebar-subheading">
     Report panel usage
     <input type="checkbox" class="pull-right" checked>
   </label>
   <p>
    Some information about this general settings option
  </p>
</div>
<!-- /.form-group -->
</form>
</div>
<!-- /.tab-pane -->
</div>
</aside>
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
 immediately after the control sidebar -->
 <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>

<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
   Both of these plugins are recommended to enhance the
   user experience. -->
   <script>   
     $(document).ready(function () {
        var base_url= "<?php echo base_url();?>";
    var year = (new Date).getFullYear();
    datagrafico(base_url,year);
    $("#year").on("change",function(){
        yearselect = $(this).val();
        datagrafico(base_url,yearselect);
    });
      $(".btn-view").on("click",function(){
       var id_categoria = $(this).val();
       $.ajax({
         url: base_url + "categorias/modal/" +id_categoria,
         type: "POST",
         success:function(resp){
          $("#modal-info .modal-body").html(resp);
          
        // alert(resp);
      }
    });
     });
      
      $('#example1').DataTable({
        language: {
         "decimal": "",
         "emptyTable": "No hay información",
         "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
         "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
         "infoFiltered": "(Filtrado de _MAX_ total entradas)",
         "infoPostFix": "",
         "thousands": ",",
         "lengthMenu": "Mostrar _MENU_ Entradas",
         "loadingRecords": "Cargando...",
         "processing": "Procesando...",
         "search": "Buscar:",
         "zeroRecords": "Sin resultados encontrados",
         "paginate": {
           "first": "Primero",
           "last": "Ultimo",
           "next": "Siguiente",
           "previous": "Anterior"
         },
       }
     });
      $('#example2').DataTable({
        language: {
         "decimal": "",
         "emptyTable": "No hay información",
         "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
         "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
         "infoFiltered": "(Filtrado de _MAX_ total entradas)",
         "infoPostFix": "",
         "thousands": ",",
         "lengthMenu": "Mostrar _MENU_ Entradas",
         "loadingRecords": "Cargando...",
         "processing": "Procesando...",
         "search": "Buscar:",
         "zeroRecords": "Sin resultados encontrados",
         "paginate": {
           "first": "Primero",
           "last": "Ultimo",
           "next": "Siguiente",
           "previous": "Anterior"
         },
       }
     });
      $(document).on("click", ".btn-check", function()
      {
        cliente = $(this).val();
        infocliente = cliente.split("*");
        $("#id_cliente").val(infocliente[0]);
        $("#cliente").val(infocliente[1]);
        $("#escuela").val(infocliente[3]);
        $("#id_escuela").val(infocliente[4]);
        $("#grado").val(infocliente[5]);
        $("#modal1").modal("hide"); 
      });

      $(document).on("click", ".btn-block", function()
      {
        data= $(this).val();
        infoproducto = data.split("*");
        html = "<tr>";
        html +="<input type='hidden' name='id_productos[]' value='"+infoproducto[0]+"'>";
        html +="<td><input type='hidden' name='productos[]' value='"+infoproducto[1]+"'>"+infoproducto[1]+"</td>";
        html +="<td><input type='hidden' name='talla[]' value='"+infoproducto[2]+"'>"+infoproducto[2]+"</td>";
        html +="<td><input type='hidden' name='precios[]' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
        html +="<td>"+infoproducto[4]+"</td>";
        html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
        html +="<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
        html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
        html +="</tr>";
        $("#tbventas tbody").append(html);
        sumar();
        $("#btn-agregar").val(null);
        $("#producto").val(null);
      });
      $(document).on("click",".btn-remove-producto", function(){
        $(this).closest("tr").remove();
        sumar();
      });

      $(document).on("keyup","#tbventas input.cantidades", function(){
        cantidad = $(this).val();
        exitencia = $(this).closest("tr").find("td:eq(3)").text();
        //console.log(exitencia);  
        if (cantidad>exitencia) {
      alert("La cantidad debe ser menor o igual a las existencias ....");
        }
        precio = $(this).closest("tr").find("td:eq(2)").text();
        importe = cantidad*precio;
        $(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(5)").children("input").val(importe);
        sumar(); 
        
      });
      $("#comprobantes").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#id_comprobante").val(infocomprobante[0]);
            $("#iva").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#id_comprobante").val(null);
            $("#iva").val(null);
            $("#serie").val(null);
            $("#numero").val(null); 
        }
        sumar();
    });
       $(document).on("click",".btn-view-venta",function(){
        id_venta = $(this).val();
        //alert(id_venta);
        $.ajax({
            url: base_url + "ventas/view",
            type:"POST",
            dataType:"html",
            data:{id_venta:id_venta},
            success:function(data){
   $("#modal-default .modal-body").html(data);
            }
        });
    });
       
        $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print({
            title:"Comprobante de Venta"
        });
    });
       //aqui empiezan las funciones del la parte de compras 
       $(document).on("click", ".btn-check1", function()
      {
        proveedor = $(this).val();
     //   alert(proveedor);
        infoproveedor = proveedor.split("*");
        $("#id_proveedor").val(infoproveedor[0]);
        $("#nombre_proveedor").val(infoproveedor[1]);
        $("#apellidos").val(infoproveedor[2]);
        $("#modal3").modal("hide"); 
      });
   
      $(document).on("click", ".btn-block3", function()
      {
        data= $(this).val();
        infoproducto = data.split("*");
        html = "<tr>";
        html +="<input type='hidden' name='id_escuelas[]' value='"+infoproducto[6]+"'>";
        html +="<input type='hidden' name='id_productos[]' value='"+infoproducto[0]+"'>";
        html +="<td><input type='hidden' name='productos[]' value='"+infoproducto[1]+"'>"+infoproducto[1]+"</td>";
        html +="<td><input type='hidden' name='talla[]' value='"+infoproducto[2]+"'>"+infoproducto[2]+"</td>";
        html +="<td><input type='hidden' class='precios' name='precios[]' class='precios' value='"+infoproducto[3]+"'>"+infoproducto[3]+"</td>";
        html +="<td>"+infoproducto[4]+"</td>";
        html +="<td><input type='hidden' name='nombre_escuela[]' value='"+infoproducto[7]+"'>"+infoproducto[7]+"</td>";
        html += "<td><input type='text' name='cantidades[]' value='1' class='cantidades'></td>";
        html +="<td><input type='hidden' name='importes[]' value='"+infoproducto[3]+"'><p>"+infoproducto[3]+"</p></td>";
        html += "<td><button type='button' class='btn btn-danger btn-remove-producto2'><span class='fa fa-remove'></span></button></td>";
        html +="</tr>";
        $("#tbproveedores tbody").append(html);
        sumarcompras();
        $("#btn-agregar").val(null);
        $("#producto").val(null);
      });
      $(document).on("click",".btn-remove-producto2", function(){
        $(this).closest("tr").remove();
        sumarcompras();
      });

      $(document).on("keyup","#tbproveedores input.cantidades", function(){
        cantidad = $(this).val();

        exitencia = $(this).closest("tr").find("td:eq(3)").text();
        //console.log(exitencia);  
        precio = $(this).closest("tr").find("td:eq(2)").text();
        importe = cantidad*precio;
        $(this).closest("tr").find("td:eq(6)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(6)").children("input").val(importe.toFixed(2));
        sumarcompras(); 
        
      });
      
      
       $("#comprobantes2").on("change",function(){
        option = $(this).val();

        if (option != "") {
            infocomprobante = option.split("*");

            $("#id_comprobante").val(infocomprobante[0]);
            $("#iva").val(infocomprobante[2]);
            $("#serie").val(infocomprobante[3]);
            $("#numero").val(generarnumero(infocomprobante[1]));
        }
        else{
            $("#id_comprobante").val(null);
            $("#iva").val(null);
            $("#serie").val(null);
            $("#numero").val(null); 
        }
        sumarcompras();
    });
        $(document).on("click",".btn-view-compra",function(){
        id_compra = $(this).val();
       
        $.ajax({
            url: base_url + "compras/view",
            type:"POST",
            dataType:"html",
            data:{id_compra:id_compra},
            success:function(data){
   $("#modal-default2 .modal-body").html(data);

            }
        });
    });
        //imporimir comprobante compras 
   $(document).on("click",".btn-print-compras",function(){
     $("#modal-default2 .modal-body").print({
            title:"Comprobante de Compras"
        });
    });
     

    })

     function sumar(){
      subtotal = 0;
      $("#tbventas tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(5)").text());
      });
       
      $("input[name=subtotal]").val(subtotal.toFixed(2));
      porcentaje = $("#iva").val();
      iva = subtotal * (porcentaje/100);
      $("input[name=iva]").val(iva.toFixed(2));
      descuento = $("input[name=descuento]").val();
      total = subtotal + iva - descuento;
      $("input[name=total]").val(total.toFixed(2));

    }
    function sumarcompras(){
      subtotal = 0;
      $("#tbproveedores tbody tr").each(function(){
        subtotal = subtotal + Number($(this).find("td:eq(6)").text());
      });
       
      $("input[name=subtotal]").val(subtotal.toFixed(2));
      porcentaje = $("#iva").val();
      iva = subtotal * (porcentaje/100);
      $("input[name=iva]").val(iva.toFixed(2));
      descuento = $("input[name=descuento]").val();
      total = subtotal + iva - descuento;
      $("input[name=total]").val(total.toFixed(2));
    }


    function generarnumero(numero){
    if (numero>= 99999 && numero< 999999) {
        return Number(numero)+1;
    }
    if (numero>= 9999 && numero< 99999) {
        return "0" + (Number(numero)+1);
    }
    if (numero>= 999 && numero< 9999) {
        return "00" + (Number(numero)+1);
    }
    if (numero>= 99 && numero< 999) {
        return "000" + (Number(numero)+1);
    }
    if (numero>= 9 && numero< 99) {
        return "0000" + (Number(numero)+1);
    }
    if (numero < 9 ){
        return "00000" + (Number(numero)+1);
    }
}
function datagrafico(base_url,year){
    namesMonth= ["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Set","Oct","Nov","Dic"];
    $.ajax({
        url: base_url + "dashboard/getData",
        type:"POST",
        data:{year: year},
        dataType:"json",
        success:function(data){
            var meses = new Array();
            var montos = new Array();
            $.each(data,function(key, value){
                meses.push(namesMonth[value.mes - 1]);
                valor = Number(value.monto);
                montos.push(valor);
            });
            graficar(meses,montos,year);
        }
    });
}
function graficar(meses,montos,year){
    Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Monto acumulado por ventas por meses'
    },
    subtitle: {
        text: 'Año:' + year
    },
    xAxis: {
        categories: meses,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Monto Acomulado (pesos)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Monto: </td>' +
            '<td style="padding:0"><b>{point.y:.2f} soles</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series:{
            dataLabels:{
                enabled:true,
                formatter:function(){
                    return Highcharts.numberFormat(this.y,2)
                }

            }
        }
    },
    series: [{
        name: 'Meses',
        data: montos

    }]
});
}
   
  </script>
</script>
</body>
</html>