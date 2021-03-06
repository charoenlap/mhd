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
                    <p><b>เรียน <?php echo $name;?>,</b> <br><br>
                        ท่านได้ทำการลงทะเบียนผ่าน EQAS MUMT<br>
                        คณะเทคนิคการแพทย์ มหาวิทยาลัยมหิดล<br><br>
                        บัญชีของท่านคือ<br>
                        ชื่อผู้ใช้งาน : <?php echo $email;?><br>
                        รหัสผ่าน : **********<br>
                        <b style="color:rgb(249,38,114);">*** กรุณาคลิก <a href="<?php echo $link_confirm;?>">ยืนยันอีเมล์</a> ก่อนใช้งานระบบ ***</b>
                    </p>
                    <p>หากลืมรหัสผ่านสามารถเปลี่ยนรหัสผ่านได้ที่นี่ <a href="<?php echo $link;?>">เปลี่ยนรหัสผ่าน</a></p>
                    <hr>
                    <p><b>Dear <?php echo $name;?>,</b> <br><br>
                        You have registered EQAS MUMT<br>
                        Faculty of Medical Technology Mahidol University<br><br>
                        Your account is<br>
                        Username : <?php echo $email;?><br>
                        Password : **********<br>
                        <b style="color:rgb(249,38,114);">*** Please click for <a href="<?php echo $link_confirm;?>">confirm email</a> before login system. ***</b>
                    </p>
                    <p>If you forget your password, you can change it here <a href="<?php echo $link;?>">Change Password</a></p>

                </div>
            </div>
        </div>
    </body>

</html>