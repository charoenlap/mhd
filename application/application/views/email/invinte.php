<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Invinte</title>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url();?>assets/js/sb-admin-2.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>


        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">
    </head>

    <body class="bg-gradient-primary">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>EQAS MUMT</h2>
                    <p><b>เรียน <?php echo $email;?>,</b> <br><br>
                        <?php echo $name;?> ได้ทำการสมัครโปรแกรม <?php echo $program;?> ให้ท่าน<br>
                        ท่านสามารถสมัครสมาชิก เพื่อลงผลการทดสอบได้ผ่านทาง EQAS MUMT<br>
                        คณะเทคนิคการแพทย์ มหาวิทยาลัยมหิดล<br><br>
                        ภายใต้สิทธิ์ ที่ <?php echo $name;?> มอบให้สามารถลงผลการทดสอบและตรวจสอบผล<br><br>
                        <?php if ($isnew==false) : ?>
                        <b style="color:rgb(249,38,114);">*** <a href="<?php echo $link_login;?>">เข้าระบบ</a> ***</b><br>
                        <?php else: ?>
                        <b style="color:rgb(249,38,114);">*** <a href="<?php echo $link_register;?>">คลิกที่นี่เพื่อสมัคร</a> ***</b>
                        <?php endif; ?>

                        
                        
                        
                    </p>
                    <hr>

                </div>
            </div>
        </div>
    </body>

</html>