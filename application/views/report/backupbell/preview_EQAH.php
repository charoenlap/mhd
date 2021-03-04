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

 <!-- EQAH -->
 <div class="container-fuild">
        <div class="container container-EQAH" id="EQAH">
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
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col">Code</th>
                                            <th scope="col">Principles</th>
                                            <th scope="col">Sample1</th>
                                            <th scope="col">Sample2</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Total T3 (ng/dL)</td>
                                            <td>
                                            <select class="custom-select" name="tools[1]" other_id="other_tools1">
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="01"){echo "selected='selected'";}?> value="01" other="">01:Maglumi Series 800</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="02"){echo "selected='selected'";}?> value="02" other="">02:Abbott Architect Series; Armity</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="03"){echo "selected='selected'";}?> value="03" other="">03:Advia centaur CP; XP</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="04"){echo "selected='selected'";}?> value="04" other="">04:Beckman, access series DXi</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="05"){echo "selected='selected'";}?> value="05" other="">05:Bio merieux; Vidas; Mini Vidas</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="06"){echo "selected='selected'";}?> value="06" other="">06:Tosoh AIA series</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="07"){echo "selected='selected'";}?> value="07" other="">07:Johnson vitros Eci. 3600, 5600</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="08"){echo "selected='selected'";}?> value="08" other="">08:Roche; Cobas series; Elecsys series; Modular</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="09"){echo "selected='selected'";}?> value="09" other="">09:Hybiome AE-180</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="10"){echo "selected='selected'";}?> value="10" other="">10:Mindray CL 1000i; 2000i; 6000</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="11"){echo "selected='selected'";}?> value="11" other="">11:Liaison; Liaison XL</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="12"){echo "selected='selected'";}?> value="12" other="">12:Sysmex HISCL-800</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1] =="13"){echo "selected='selected'";}?> value="13" other="">13:Others</option>
                                                </select>
                                            </td>
                                            <td>
                                            <select class="select-other custom-select" name="method[1]" other_id="other_method1">
                                                        <option <?php if(!empty($method[1]) && $method[1] =="1"){echo "selected='selected'";}?> value="1" other="">CLIA</option>
                                                        <option <?php if(!empty($method[1]) && $method[1] =="2"){echo "selected='selected'";}?> value="2" other="">ECLIA</option>
                                                        <option <?php if(!empty($method[1]) && $method[1] =="3"){echo "selected='selected'";}?> value="3" other="">ELFA</option>
                                                        <option <?php if(!empty($method[1]) && $method[1] =="4"){echo "selected='selected'";}?> value="4" other="">CMIA</option>
                                                        <option <?php if(!empty($method[1]) && $method[1] =="5"){echo "selected='selected'";}?> value="5" other="">FEIA</option>
                                                        <option <?php if(!empty($method[1]) && $method[1] =="99"){echo "selected='selected'";}?> value="99" other="1">Other</option>
                                                    </select>
                                                <input type="text" class="<?php if($method[1]!="99"){echo "d-none";} ?> form-control other_method" name="method_other[1]" id="other_method1" value="<?php echo $method_other[1]; ?>" disabled>
                                            </td>
                                            <td><?php echo $sample[0][1] ?> </td>
                                            <td><?php echo $sample[0][2] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Total T4 (ug/dL)</td>
                                            <td>
                                            <select class="custom-select" name="tools[2]" other_id="other_tools1">
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="01"){echo "selected='selected'";}?> value="01" other="">01:Maglumi Series 800</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="02"){echo "selected='selected'";}?> value="02" other="">02:Abbott Architect Series; Armity</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="03"){echo "selected='selected'";}?> value="03" other="">03:Advia centaur CP; XP</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="04"){echo "selected='selected'";}?> value="04" other="">04:Beckman, access series DXi</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="05"){echo "selected='selected'";}?> value="05" other="">05:Bio merieux; Vidas; Mini Vidas</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="06"){echo "selected='selected'";}?> value="06" other="">06:Tosoh AIA series</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="07"){echo "selected='selected'";}?> value="07" other="">07:Johnson vitros Eci. 3600, 5600</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="08"){echo "selected='selected'";}?> value="08" other="">08:Roche; Cobas series; Elecsys series; Modular</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="09"){echo "selected='selected'";}?> value="09" other="">09:Hybiome AE-180</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="10"){echo "selected='selected'";}?> value="10" other="">10:Mindray CL 1000i; 2000i; 6000</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="11"){echo "selected='selected'";}?> value="11" other="">11:Liaison; Liaison XL</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="12"){echo "selected='selected'";}?> value="12" other="">12:Sysmex HISCL-800</option>
                                                        <option <?php if(!empty($tools[2]) && $tools[2] =="13"){echo "selected='selected'";}?> value="13" other="">13:Others</option>
                                                </select>
                                            </td>
                                            <td>
                                            <select class="select-other custom-select" name="method[2]" other_id="other_method1">
                                                        <option <?php if(!empty($method[2]) && $method[2] =="1"){echo "selected='selected'";}?> value="1" other="">CLIA</option>
                                                        <option <?php if(!empty($method[2]) && $method[2] =="2"){echo "selected='selected'";}?> value="2" other="">ECLIA</option>
                                                        <option <?php if(!empty($method[2]) && $method[2] =="3"){echo "selected='selected'";}?> value="3" other="">ELFA</option>
                                                        <option <?php if(!empty($method[2]) && $method[2] =="4"){echo "selected='selected'";}?> value="4" other="">CMIA</option>
                                                        <option <?php if(!empty($method[2]) && $method[2] =="5"){echo "selected='selected'";}?> value="5" other="">FEIA</option>
                                                        <option <?php if(!empty($method[2]) && $method[2] =="99"){echo "selected='selected'";}?> value="99" other="1">Other</option>
                                                    </select>
                                                <input type="text" class="<?php if($method[2]!="99"){echo "d-none";} ?> form-control other_method" name="method_other[2]" id="other_method1" value="<?php echo $method_other[2]; ?>" disabled>
                                            </td>
                                            <td><?php echo $sample[1][1] ?> </td>
                                            <td><?php echo $sample[1][2] ?> </td>
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
    <script>        
    $(document).ready(function(e) {
        if(method_other != ''){
            ('.other_method').removeClass('d-none');
        } else {
            ('.other_method').addClass('d-none');
        }
    });
    </script>
