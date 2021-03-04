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

        <title>Login</title>

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

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">
                    <img src="<?php echo base_url();?>assets/img/header.png" class="img-fluid my-4" />

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
                                <div class="col-lg-6 d-none d-lg-block bg-login-image">

                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">เข้าสู่ระบบ</h1>
                                        </div>
                                        <?php 
                                            echo form_open('member/login');
                                        ?>
                                        <div class="form-group">
                                            <?php
                                            echo form_label('Email Address', 'email');
                                            $data = array('type'=>'email','name'=>'email','id'=>'email','class'=>'form-control form-control-user','placeholder'=>'อีเมล','required'=>'required');
                                            echo form_input($data);
                                        ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo form_label('Password', 'password');
                                            $data = array('type'=>'password','name'=>'password','id'=>'password','class'=>'form-control form-control-user','placeholder'=>'รหัสผ่าน','required'=>'required');
                                            echo form_input($data);
                                        ?>
                                        </div>
                                        <?php 
                                            $data = array('type'=>'submit','name'=>'submit','class'=>'btn btn-primary btn-user btn-block','value'=>'เข้าสู่ระบบ');
                                            echo form_submit($data); 
                                        ?>
                                        <hr />
                                        <?php if ($year!==false) : ?>
                                        <div class="text-center">
                                            <a href="<?php echo base_url('member/register');?>" class="btn btn-danger rounded-5 btn-user btn-block">สมัครสมาชิกปี <?php echo $year;?></a>
                                            
                                        </div>
                                        <br>
                                        <?php endif;?>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo base_url('member/forgot');?>">ลืมรหัสผ่าน?</a>
                                        </div>

                                        <?php /* <form class="user" action="<?php echo $action;?>" method="post">
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="" placeholder="อีเมล" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="" placeholder="รหัสผ่าน" required>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="เข้าสู่ระบบ">

                                        <hr>
                                        <div class="text-center">
                                            <a href="<?php echo base_url('member/register');?>" class="btn btn-danger rounded-5 btn-user btn-block">สมัครสมาชิกปี 2021</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="<?php echo base_url('member/forgot');?>">ลืมรหัสผ่าน?</a>
                                        </div>
                                        </form> */ ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </body>

</html>