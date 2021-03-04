<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | EQAS MUMT</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <!-- DateRangePicker -->
        
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- jQuery -->
        <script src="<?php echo base_url();?>assets/admin/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url();?>assets/admin/dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url();?>assets/admin/dist/js/demo.js"></script>

        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/plugins/moment/moment.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/daterangepicker/daterangepicker.css" />

        <script src="<?php echo base_url();?>assets/admin/select2-develop/dist/js/select2.full.min.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/select2-develop/dist/css/select2.min.css">
        
        <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
        </script>

        <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/custom.css">
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">