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

        <title>Confirm Address</title>

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


        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

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
                                            <input type="email" name="email" value="<?php echo $email;?>" readonly class="form-control-plaintext " id="" placeholder="อีเมล" required>
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
                                            <input type="text" name="firstname" value="<?php echo $firstname;?>" readonly class="form-control-plaintext" id="" placeholder="ชื่อ" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" name="lastname" value="<?php echo $lastname;?>" readonly class="form-control-plaintext" id="" placeholder="นามสกุล" required>
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
                                            <label>ชื่อโรงพยาบาล</label>
                                            <input type="text" name="hospital" value="<?php echo $hospital;?>" class="form-control" id="" placeholder="ชื่อโรงพยาบาล" required autofocus="on">
                                        </div>
                                        <div class="col-sm-6">
                                            <label>ชื่อห้องปฏิบัติการ</label>
                                            <input type="text" name="room" value="<?php echo $room;?>" class="form-control" id="" placeholder="ชื่อห้องปฏิบัติการ" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>ประเภทโรงพยาบาล</label>
                                            <!-- <input type="text" name="type_hospital" value="<?php echo $type_hospital;?>" class="form-control" id="" placeholder="ประเภทโรงพยาบาล" required> -->
                                            <select name="type_hospital" id="" class="form-control">
                                                <option <?php echo $type_hospital=='โรงพยาบาลศูนย์'?'selected':'';?> value="โรงพยาบาลศูนย์">โรงพยาบาลศูนย์</option>
                                                <option <?php echo $type_hospital=='โรงพยาบาลทั่วไป'?'selected':'';?> value="โรงพยาบาลทั่วไป">โรงพยาบาลทั่วไป</option>
                                                <option <?php echo $type_hospital=='โรงพยาบาลชุมชน'?'selected':'';?> value="โรงพยาบาลชุมชน">โรงพยาบาลชุมชน</option>
                                                <option <?php echo $type_hospital=='โรงพยาบาลมหาวิทยาลัย'?'selected':'';?> value="โรงพยาบาลมหาวิทยาลัย">โรงพยาบาลมหาวิทยาลัย</option>
                                                <option <?php echo $type_hospital=='โรงพยาบาลเอกชน'?'selected':'';?> value="โรงพยาบาลเอกชน">โรงพยาบาลเอกชน</option>
                                                <option <?php echo $type_hospital=='ห้องปฏิบัติการเอกชน'?'selected':'';?> value="ห้องปฏิบัติการเอกชน">ห้องปฏิบัติการเอกชน</option>
                                                <option <?php echo $type_hospital=='อื่นๆ'?'selected':'';?> value="อื่นๆ">อื่นๆ</option>
                                            </select>
                                            <input type="text" name="type_hospital_other" class="form-control d-none mt-1" placeholder="กรอกประเภทโรงพยาบาล" />
                                        </div>
                                        <div class="col-sm-6">
                                            <label>จำนวนเตียง</label>
                                            <select name="total_bed" id="" class="form-control">
                                                <option <?php echo $total_bed=='1'?'selected':'';?> value="1">น้อยกว่า 100 เตียง</option>
                                                <option <?php echo $total_bed=='2'?'selected':'';?> value="2">101 - 300 เตียง</option>
                                                <option <?php echo $total_bed=='3'?'selected':'';?> value="3">301 - 500 เตียง</option>
                                                <option <?php echo $total_bed=='4'?'selected':'';?> value="4">มากกว่า 500 เตียง</option>
                                            </select>
                                            <!-- <input type="text" name="total_bed" value="<?php echo $total_bed;?>" class="form-control" id="" placeholder="จำนวนเตียง" required> -->
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>เลขที่บ้าน</label>
                                            <input type="text" name="address_1" value="<?php echo $address_1;?>" class="form-control" id="" placeholder="เลขที่บ้าน" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>ตึก ชั้น ซอย ถนน</label>
                                            <input type="text" name="address_2" value="<?php echo $address_2;?>" class="form-control" id="" placeholder="ตึก ชั้น ซอย ถนน">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>แขวง/ตำบล</label>
                                            <input type="text" name="district" value="<?php echo $district;?>" class="form-control" id="district" placeholder="แขวง/ตำบล" required>

                                        </div>
                                        <div class="col-sm-6">
                                            <label>เขต/อำเภอ</label>
                                            <input type="text" name="country" value="<?php echo $country;?>" class="form-control" id="country" placeholder="เขต/อำเภอ" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <label>จังหวัด</label>
                                            <input type="text" name="province" value="<?php echo $province;?>" class="form-control" id="province" placeholder="จังหวัด" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label>รหัสไปรษณีย์</label>
                                            <input type="text" name="postcode" value="<?php echo $postcode;?>" class="form-control" id="postcode" placeholder="รหัสไปรษณีย์" required>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-block" value="บันทึกที่อยู่">
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal" tabindex="-1" role="dialog" id="modalConfirm">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">แจ้งเตือน !!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>กรุณาตรวจสอบและยืนยันที่อยู่ปัจจุบันให้ถูกต้อง</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">ปิด</button>
                </div>
                </div>
            </div>
            </div>

        <script type="text/javascript">
        $(document).ready(function () {
            // alert('กรุณา')
            $('#modalConfirm').modal('show');
            $('#modalConfirm').on('hide.bs.modal', function (event) {
                $('[name="hospital"]').focus();
            });

            $('.select2').select2();

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