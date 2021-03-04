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
        <div class="container container-EQAI_SYPHI" id="EQAI_SYPHI">
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
                            <table class="table text-center table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th></th>
                                            <th style="width: 300px;">Non treponemal Test</th>
                                            <th></th>
                                            <th></th>
                                            <th colspan="2">Treponemal Test</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <select class="select-other custom-select" name="tools[0]" other_id="other_ntp" data-no="4">
                                                    <option <?php if(!empty($tools[0]) && $tools[0] == "26"){echo "selected";} ?> value="26" other="">VDRL</option>
                                                    <option <?php if(!empty($tools[0]) && $tools[0] == "27"){echo "selected";} ?> value="27" other="">RPR</option>
                                                    <option <?php if(!empty($tools[0]) && $tools[0] == "28"){echo "selected";} ?> value="28" other="">Unheated VDLR</option>
                                                    <option <?php if(!empty($tools[0]) && $tools[0] == "29"){echo "selected";} ?> value="29" other="1">Other</option>
                                                </select>
                                                <input disabled type="text" class="<?php if($tools[0]!="29"){echo "d-none";} ?> form-control" name="tools_other[0]" id="other_ntp" placeholder="Other ระบุ" value="<?php echo $tools_other[0]; ?>">
                                            </td>
                                            <td>Method</td>
                                            <td class="bg-primary border-0"></td>
                                            <td>
                                                <select class="select-other custom-select" name="tools[1]" other_id="other_tp" data-no="5">
                                                    <option <?php if(!empty($tools[1]) && $tools[1] ==""){echo "selected";} ?> value="" >Choose</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="30"){echo "selected";} ?> value="30" other="">TPHA</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="31"){echo "selected";} ?> value="31" other="">FTA-ABS</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="32"){echo "selected";} ?> value="32" other="">TPPA</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="33"){echo "selected";} ?> value="33" other="">Immunochromatography</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="34"){echo "selected";} ?> value="34" other="">CMIA</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="35"){echo "selected";} ?> value="35" other="">ECLIA</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="36"){echo "selected";} ?> value="36" other="">CLIA</option>
                                                    <option <?php if(!empty($tools[1]) && $tools[1] =="40"){echo "selected";} ?> value="40" other="1">Other</option>
                                                </select>
                                                <input disabled type="text" class="<?php if($tools[1]!="40"){echo "d-none";} ?> form-control" name="tools_other[1]" id="other_tp" placeholder="Other ระบุ" value="<?php echo $tools_other[1]; ?>">
                                            </td>
                                            <td>Method</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input disabled type="text" class="form-control" name="ntp_result" value="<?php echo $ntp_result; ?>">
                                            </td>
                                            <td>Instrument/Test Kit/ Brand</td>
                                            <td class="bg-primary border-0"></td>
                                            <!-- second input -->
                                            <td>
                                                <input disabled type="text" class="form-control" name="tp_result" value="<?php echo $tp_result; ?>">
                                            </td>
                                            <td>Instrument/Test Kit/ Brand</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <input disabled type="text" class="form-control" name="ntp_lot_number"  value="<?php echo $ntp_lot_number; ?>">
                                            </td>
                                            <td>Reagent Lot Number</td>
                                            <td class="bg-primary border-0"></td>
                                            <!-- second input -->
                                            <td>
                                                <input disabled type="text" class="form-control" name="tp_lot_number"  value="<?php echo $ntp_result; ?>">
                                            </td>
                                            <td>Reagent Lot Number</td>
                                        </tr>
                                        <tr>
                                            <td>Specimen No.</td>
                                            <td>Qualitative</td>
                                            <td>Semiquantitative</td>
                                            <td></td>
                                            <td>Qualitative</td>
                                            <td hidden>Specimen No.</td>
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
        select
        {
            width: auto; 
            text-align-last:center;
            border: none !important;
            pointer-events: none;
            background: none !important;
        }
    </style>