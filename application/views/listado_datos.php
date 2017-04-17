<!DOCTYPE html>
<html>
    <head> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link href="<?php echo base_url('admin/dist/css/AdminLTE.min.css') ?>" rel="stylesheet">


        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link href="<?php echo base_url('admin/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <title>Listado Datos</title>
        <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css') ?>" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head> 

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="GraficasUltimosDatos" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                          <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <img src="<?php echo base_url('admin/dist/img/user2-160x160.jpg') ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $this->session->userdata('nombre_completo') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url('admin/dist/img/user2-160x160.jpg') ?>" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $this->session->userdata('nombre_completo') ?>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <a href="logout" class="btn btn-default btn-flat">Salir</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

          <img src=" <?php echo base_url('admin/dist/img/user2-160x160.jpg')?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nombre_completo')?></p>
        
        </div>
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENÚ</li>
       
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Gráficas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="GraficasUltimosDatos"><i class="fa fa-circle-o"></i> Últimos datos</a></li>
            <li><a href="GraficasTiempoReal"><i class="fa fa-circle-o"></i> En tiempo real</a></li>
          </ul>
        </li>
        <li>
          <a href="Listado_Datos">
            <i class="fa fa-th"></i> <span>Datos</span>
          </a>
        </li>
        
        
        
        <li class="header">SALIR</li>
        <li><a href="Login/logout"><i class="fa fa-circle-o text-red"></i> <span>Salir</span></a></li> 
    </section>
    <!-- /.sidebar -->
  </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                 <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="GraficasUltimosDatos"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Datos</li>
      </ol>
    </section>


                <div class="container">
                    <h1 style="font-size:20pt">Listado datos de las Motas</h1>

                    
                    <br />
                    <button class="btn btn-primary" onclick="exportar_datos()"><i class="glyphicon glyphicon-plus"></i> Descargar datos</button>
                    <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Recargar</button>
                    <br />
                    <br />
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Id Mota</th>      
                                <th>Temperatura Suelo (ºC)</th>
                                <th>Humedad Suelo (%)</th>
                                <th>Batería (V)</th>
                                <th>Eje x</th>
                                <th>Eje y</th>
                                <th>Eje z</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                        <tfoot>
                            <tr>
                               <th>No.</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Id Mota</th>      
                                <th>Temperatura Suelo (ºC)</th>
                                <th>Humedad Suelo (%)</th>
                                <th>Batería (V)</th>
                                <th>Eje x</th>
                                <th>Eje y</th>
                                <th>Eje z</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.content-wrapper -->


        </div>
        <!-- ./wrapper -->

        <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js') ?>"></script>


        <!-- Bootstrap 3.3.6 -->

        <!-- FastClick -->
        <script src="<?php echo base_url('admin/plugins/fastclick/fastclick.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('admin/dist/js/app.min.js') ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('admin/dist/js/demo.js') ?>"></script>


        <script type="text/javascript">

                    var save_method; //for save method string
                    var table;

                    $(document).ready(function() {

                        //datatables
                        table = $('#table').DataTable({
                            "processing": true, //Feature control the processing indicator.
                            "serverSide": true, //Feature control DataTables' server-side processing mode.
                            "order": [], //Initial no order.

                            // Load data for the table's content from an Ajax source
                            "ajax": {
                                "url": "<?php echo site_url('Listado_Datos/ajax_list') ?>",
                                "type": "POST"
                            },
                            //Set column definition initialisation properties.
                            "columnDefs": [
                                {
                                    "targets": [-1], //last column
                                    "orderable": false, //set not orderable
                                },
                            ],
                        });

                       

                    });



                   

                    function reload_table()
                    {
                        table.ajax.reload(null, false); //reload datatable ajax 
                    }

                   
                    function exportar_datos(){
                        $.ajax({
                             url: "<?php echo site_url('home/exportar_datos') ?>/"+1,
                            type: "GET",
                            dataType: "JSON",
                            success: function(dat)
                            {
                                
                               
                            },
                            error: function(jqXHR, textStatus, errorThrown)
                            {
                                alert('Error get data from ajax');
                            }
                     });
                    }
                    

        </script>

    


</body>
</html>