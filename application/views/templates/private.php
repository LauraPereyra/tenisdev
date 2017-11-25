<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo $title;?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <link rel="icon" href="<?php echo base_url('assets/img/favicon.ico')?>" type="image/gif">
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/favicon.ico')?>">
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/bootstrap.css')?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/materialadmin.css')?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/font-awesome.min.css')?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/material-design-iconic-font.min.css')?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/toastr/toastr.css')?>" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/css/theme-default/libs/DataTables/jquery.dataTables.css')?>" />
        <link type="text/css" rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.material.min.css" />
        <script src="<?php echo base_url('assets/js/libs/jquery/jquery-1.11.2.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/jquery/jquery-migrate-1.2.1.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/bootstrap/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/spin.js/spin.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/autosize/jquery.autosize.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/nanoscroller/jquery.nanoscroller.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/source/App.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/source/AppNavigation.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/source/AppOffcanvas.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/source/AppCard.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/source/AppForm.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/source/AppNavSearch.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/source/AppVendor.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/demo/Demo.js')?>"></script>
        <script type="text/javascript" src="<?php echo base_url("assets/js/app.js") ?>"></script>
        <script src="<?php echo base_url('assets/js/libs/toastr/toastr.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/DataTables/jquery.dataTables.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/demo/DemoTableDynamic.js')?>"></script>
        <script src="<?php echo base_url('assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js')?>"></script>
        <script src="<?php echo base_url('assets/js/core/demo/DemoFormComponents.js')?>"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
        <script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
        <![endif]-->
    </head>
    <body class="menubar-hoverable header-fixed menubar-pin menubar-first ">
        <!-- BEGIN NAVBAR -->
        <?php echo load_widget('navbar', FALSE, ['title' => $title])?>
        <!-- END NAVBAR -->
        <div id="base">
            <?php echo $page?>
        </div>
        <!-- BEGIN SIDEBAR -->
        <?php echo load_widget('sidebar', TRUE, ['active' => !isset($sidebar_active) ? 0 : $sidebar_active])?>
        <!-- END SIDEBAR -->
    </body>
</html>