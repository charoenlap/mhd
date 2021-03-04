<?php
defined('BASEPATH') or exit('No direct script access allowed');
print_r($_POST);
print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Preview-<?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


    <script src="<?php echo base_Url(); ?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/JQL.min.js"></script>
    <script src="<?php echo base_Url(); ?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.css">
    <script src="<?php echo base_Url(); ?>assets/vendor/jquery.Thailand.js-master/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">
</head>

<div class="container-fuild">
    <div class="container container-EQAB_AFB" id="EQAB_AFB">
        <div class="card border border-dark">
            <form action="">
                <div class="card-title text-center text-white" style="padding:20px; background-color:rgba(0, 0, 255, 0.7);">
                    <h5 class="font-weight-bold"><?php echo $title; ?></h5>
                </div>
                <div class="card-body" style="background-color:white;">
                    <div class="container-left">
                        <h6 class="font-weight-bold" style="margin-top: 5px;">โรงพยาบาล ศูนย์วิทยาศาสตร์การแพทย์อาเซียน (Test Account) กลุ่มงานพยาธิวิทยา</h6>
                        <h6 class="font-weight-bold" style="margin-top: 5px;">บันทึกการรับตัวอย่าง</h6>
                        <span>Trial 185-186 ( November 2020 )</span>
                        <h6 class="font-weight-bold" style="margin-top: 5px;">วันที่ได้รับตัวอย่างทดสอบ *</h6>
                        <span><?php echo $datepick; ?></span>
                        <h6 class="font-weight-bold" style="margin-top: 5px;">ความสมบูรณ์ของตัวอย่างทดสอบ</h6>
                        <span><?php echo $received_status; ?></span>
                        <hr>
                        <div class="container-left">

                        </div>
                        <div class="container-fluid">
                            <caption class="font-weight-bold">ผลการตรวจ</caption>
                            <div class="container-fluid">
                                <!-- first radio -->
                                <div class="form-check col-md-auto">
                                    <input <?php if(!empty($result) && $result =="1"){echo "checked";}?> class="form-check-input" type="radio" name="result" id="radio_0" value="1" disabled>
                                    <label class="form-check-label" for="radio_0">
                                        Kinyo stain
                                    </label>
                                    <br>
                                    <input <?php if(!empty($result) && $result =="2"){echo "checked";}?> class="form-check-input" type="radio" name="result" id="radio_1" value="2" disabled>
                                    <label class="form-check-label" for="radio_1">
                                        Ziehl-Neelsen stain
                                    </label>
                                    <br>
                                    <input <?php if(!empty($result) && $result =="3"){echo "checked";}?> class="form-check-input" type="radio" name="result" id="radio_2" value="3" disabled>
                                    <label class="form-check-label" for="radio_2">
                                        Auramine Rhodamine Fluorochrome stain
                                    </label>
                                    <br>
                                    <input <?php if(!empty($result) && $result =="4"){echo "checked";}?> class="form-check-input" type="radio" name="result" id="radio_3" value="4" disabled>
                                    <label class="form-check-label" for="radio_3">
                                        Other ระบุ
                                    </label>
                                </div>
                                <input <?php if($result_other !=""){echo "value =".$result_other;}?> type="text" name="result_other" class="form-control" placeholder="Other ระบุ" style="margin-bottom: 20px;" disabled></input>
                                <caption>รายงานผลการย้อมสี</caption>
                                <table class="table text-center table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Sample Id</th>
                                            <th>รายงานผลการย้อมสี</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trial 185</td>
                                            <td>
                                                <div class="form-check text-left">
                                                    <input <?php if(!empty($sample[0]) && $sample[0] =="1"){echo "checked";}?> class="form-check-input" type="radio" name="sample[0]" id="test2880" value="1" disabled>
                                                    <label class="form-check-label" for="test2880">
                                                        No AFB Observed
                                                    </label>
                                                    <br>
                                                    <input <?php if(!empty($sample[0]) && $sample[0] =="2"){echo "checked";}?> class="form-check-input" type="radio" name="sample[0]" id="test2890" value="2" disabled>
                                                    <label class="form-check-label" for="test2890">
                                                        1-9 AFB per 100 fields
                                                    </label>
                                                    <br>
                                                    <input <?php if(!empty($sample[0]) && $sample[0] =="3"){echo "checked";}?> class="form-check-input" type="radio" name="sample[0]" id="test2900" value="3" disabled>
                                                    <label class="form-check-label" for="test2900">
                                                        AFB 1+ (10-99 AFB/100 fields)
                                                    </label>
                                        </tr>
                                        <br>
                                </div>
                                </td>
                                <tr>
                                <td>Trial 186</td>
                                <td>
                                    <div class="form-check text-left">
                                        <input <?php if(!empty($sample[1]) && $sample[1] =="1"){echo "checked";}?> class="form-check-input" type="radio" name="sample[1]" id="test2910" value="1" disabled>
                                        <label class="form-check-label" for="test2910">
                                            No AFB Observed
                                        </label>
                                        <br>
                                        <input <?php if(!empty($sample[1]) && $sample[1] =="2"){echo "checked";}?> class="form-check-input" type="radio" name="sample[1]" id="test2920" value="2" disabled>
                                        <label class="form-check-label" for="test2920">
                                            1-9 AFB per 100 fields
                                        </label>
                                        <br>
                                        <input <?php if(!empty($sample[1]) && $sample[1] =="3"){echo "checked";}?> class="form-check-input" type="radio" name="sample[1]" id="test2930" value="3" disabled>
                                        <label class="form-check-label" for="test2930">
                                            AFB 1+ (10-99 AFB/100 fields)
                                        </label>
                                        <br>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                            </table>
                            <caption>ข้อมูลผู้ส่ง</caption>
                            <table class="table text-center table-hover">
                                <tbody class="text-left">
                                    <tr>
                                        <td class="bg-primary text-white" style="width: 350px;">ชื่อ</td>
                                        <td><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white" style="width: 350px;">หมายเลขโทรศัพท์</td>
                                        <td><?php echo $tel; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white" style="width: 350px;">ตำแหน่ง</td>
                                        <td><?php echo $position; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white" style="width: 350px;">ข้อคิดเห็นหรือเสนอแนะเพื่อการพัฒนาปรับปรุง</td>
                                        <td><?php echo $comment; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="bg-primary text-white" style="width: 350px;">วันที่ทำการทดสอบ</td>
                                        <td><?php echo $datereport; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit" name="submit">ยืนยันการส่งผลตรวจ</button>
                    </div>
            </form>
        </div>

    </div>

</div>
<style>
    select {
        width: auto;
        text-align-last: center;
        border: none !important;
        pointer-events: none;
        background: none !important;
    }
</style>
