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

        <script type="text/javascript">
        $(document).ready(function() {
            $.Thailand({
                $district: $('#district'), // input ของตำบล
                $amphoe: $('#country'), // input ของอำเภอ
                $province: $('#province'), // input ของจังหวัด
                $zipcode: $('#postcode'), // input ของรหัสไปรษณีย์
            });
        });
        </script>
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
                                    <h1 class="h4 text-gray-900">สมัครสมาชิก!</h1>
                                    <p class="mb-4">ขณะนี้เราเปิดรับสมัครสมาชิก EQAS-MUMT <b class="text-primary">ปี <?php echo $year;?></b></p>
                                </div>
                                <form class="user" action="<?php echo $action;?>" method="POST">
                                    <div class="row">
                                        <div class="col-12">
                                            <b>
                                                <p>ข้อมูลเข้าระบบ</p>
                                            </b>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="email" name="email" class="form-control  <?php echo !empty($email) ? 'form-control-plaintext' : '';?>" <?php echo !empty($email) ? 'readonly' : '';?> id="" placeholder="อีเมล" required value="<?php echo $email;?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input type="password" name="password" class="form-control " id="" placeholder="รหัสผ่าน" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="confirm" class="form-control " id="" placeholder="ยืนยันรหัสผ่าน" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <b>
                                                <p>ข้อมูลส่วนตัว</p>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="firstname" class="form-control " id="" placeholder="ชื่อ" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="lastname" class="form-control " id="" placeholder="นามสกุล" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="telephone" class="form-control " id="" placeholder="เบอร์โทรศัพท์" required>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12">
                                            <b>
                                                <p>ข้อมูลสถานที่</p>
                                            </b>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="hospital" class="form-control " id="" placeholder="ชื่อโรงพยาบาล" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="room" class="form-control " id="" placeholder="ชื่อห้องปฏิบัติการ" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <!-- <input type="text" name="type_hospital" value="<?php echo $type_hospital;?>" class="form-control" id="" placeholder="ประเภทโรงพยาบาล" required> -->
                                            <select name="type_hospital" id="" class="form-control">
                                                <option value="โรงพยาบาลศูนย์">โรงพยาบาลศูนย์</option>
                                                <option value="โรงพยาบาลทั่วไป">โรงพยาบาลทั่วไป</option>
                                                <option value="โรงพยาบาลชุมชน">โรงพยาบาลชุมชน</option>
                                                <option value="โรงพยาบาลมหาวิทยาลัย">โรงพยาบาลมหาวิทยาลัย</option>
                                                <option value="โรงพยาบาลเอกชน">โรงพยาบาลเอกชน</option>
                                                <option value="ห้องปฏิบัติการเอกชน">ห้องปฏิบัติการเอกชน</option>
                                                <option value="อื่นๆ">อื่นๆ</option>
                                            </select>
                                            <input type="text" name="type_hospital_other" class="form-control d-none mt-1" placeholder="กรอกประเภทโรงพยาบาล" />
                                        </div>
                                        <div class="col-sm-6">
                                            <select name="total_bed" id="" class="form-control">
                                                <option value="1">น้อยกว่า 100 เตียง</option>
                                                <option value="2">101 - 300 เตียง</option>
                                                <option value="3">301 - 500 เตียง</option>
                                                <option value="4">มากกว่า 500 เตียง</option>
                                            </select>
                                            <!-- <input type="text" name="total_bed" value="<?php echo $total_bed;?>" class="form-control" id="" placeholder="จำนวนเตียง" required> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="address_1" class="form-control " id="" placeholder="เลขที่บ้าน" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="address_2" class="form-control " id="" placeholder="ตึก ชั้น ซอย ถนน">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="district" class="form-control " id="district" placeholder="แขวง/ตำบล" required>

                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="country" class="form-control " id="country" placeholder="เขต/อำเภอ" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" name="province" class="form-control " id="province" placeholder="จังหวัด" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="postcode" class="form-control " id="postcode" placeholder="รหัสไปรษณีย์" required>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-block" value="สมัครสมาชิก">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('member/login');?>">มีสมาชิกอยู่แล้ว? เข้าสู่ระบบ!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


<script>
$(document).ready(function () {
    $('[type="submit"]').click(function(e){
        $(this).html('กำลังบันทึก...').attr('disabled','disabled');
        $('form').submit();
    });

    $('[name="type_hospital"]').change(function(e){
        let other = 'อื่นๆ';
        if ($(this).val()===other) {
            $('[name="type_hospital_other"]').removeClass('d-none');
        } else {
            $('[name="type_hospital_other"]').addClass('d-none');
        }
    });
});
</script>
    </body>

</html>