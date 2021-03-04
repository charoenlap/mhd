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

        <title>Register</title>

        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url();?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url();?>assets/js/sb-admin-2.js"></script>


        <script src="<?php echo base_Url();?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/JQL.min.js"></script>
        <script src="<?php echo base_Url();?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.css">
        <script src="<?php echo base_Url();?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

        <!-- Custom fonts for this template-->
        <link href="<?php echo base_url();?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url();?>assets/css/sb-admin-2.css" rel="stylesheet">

    </head>

    <body class="bg-gradient-primary">
        <div class="container">
            <img src="<?php echo base_url();?>assets/img/header.png" class="img-fluid" />
            <?php if (!empty($success)) { ?>
            <div class="card shadow mb-4">
                <div class="card-body border-left-success text-success"><i class="fas fa-check-circle text-success"></i> <?php echo $success;?></div>
            </div>
            <?php } ?>
            <?php if (!empty($error)) { ?>
            <div class="card shadow mb-4">
                <div class="card-body border-left-danger text-danger"><i class="fas fa-times-circle text-danger"></i> <?php echo $error;?></div>
            </div>
            <?php } ?>
            <div class="card o-hidden border-0 shadow-lg mb-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900">เปลี่ยนรหัสผ่าน!</h1>
                                </div>
                                <form class="user" action="<?php echo $action;?>" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <b>
                                                <p>เลือกรหัสผ่านใหม่</p>
                                            </b>
                                            <p>สร้างรหัสผ่านใหม่ที่มีความยาวอย่างน้อย 6 อักขระ รหัสผ่านที่คาดเดายากประกอบด้วยตัวอักษรตัวเลขและเครื่องหมายวรรคตอนเพื่อความปลอดภัยของข้อมูลผู้ใช้งาน</p>
                                        </div>
                                    </div>

                                    <div class="form-group row text-center">
                                        <div class="col-sm-12">
                                            <input type="text" name="password" class="form-control form-control-user" id="" placeholder="รหัสผ่านใหม่" required>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" value="เปลี่ยนรหัสผ่าน">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </body>

</html>