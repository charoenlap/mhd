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

<!-- EQAT -->
<div class="container-fuild">
        <div class="container container-EQAT" id="EQAT">
            <div class="card border border-dark">
                <form action="">
                    <div class="card-title text-center text-white" style="padding:20px; background-color:rgba(0, 0, 255, 0.7);">
                        <h5 class="font-weight-bold"><?php echo $title; ?></h5>
                    </div>
                    <div class="card-body" style="background-color:white;">
                        <div class="container-left">
                            <h6 class="font-weight-bold" style="margin-top: 5px;">โรงพยาบาล ศูนย์วิทยาศาสตร์การแพทย์อาเซียน (Test Account) กลุ่มงานพยาธิวิทยา</h6>
                            <h6 class="font-weight-bold" style="margin-top: 5px;">บันทึกการรับตัวอย่าง</h6>
                            <span>Trial 290 - 291 (November 2020)</span>
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
                                            <th scope="col">Analytes</th>
                                            <th scope="col">Instruments</th>
                                            <th scope="col">Principles</th>
                                            <th scope="col">Trial 290</th>
                                            <th scope="col">Trial 291</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>AFP* IU/mL</td>
                                            <td>
                                                <select class="custom-select" name="tools[]" other_id="other_0" data-no="1_0">
                                                        <option <?php if(!empty($tools[0]) && $tools[0]==""){echo "selected";} ?> value="">Choose</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="01"){echo "selected";} ?> value="01" other="">01: Maglumi Series /800</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="02"){echo "selected";} ?> value="02" other="">02: Abbott, Architect Series /Armity</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="03"){echo "selected";} ?> value="03" other="">03: Siemens, Advia Centaur CP [ ] XP</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="04"){echo "selected";} ?> value="04" other="">04: Beckman, Access ; Unicel DXi</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="05"){echo "selected";} ?> value="05" other="">05: BioMerieux, VIDAS ; Minividas</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="06"){echo "selected";} ?> value="06" other="">06: Tosoh AIA Series</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="07"){echo "selected";} ?> value="07" other="">07: Johnson, Vitros ECi 3600, 5600</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="08"){echo "selected";} ?> value="08" other="">08: Roche; Cobas Series, Modular, Elecsys series</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="09"){echo "selected";} ?> value="09" other="">09: Hybiome AE-180</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="10"){echo "selected";} ?> value="10" other="">10: Mindray CL 6000i,2000i / 1000i</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="11"){echo "selected";} ?> value="11" other="">11: Liaison Series ;</option>
                                                        <option <?php if(!empty($tools[0]) && $tools[0]=="12"){echo "selected";} ?> value="12" other="">12: Immulite, LKB1277, DPC, Others</option>
                                                    </select>
                                            </td>
                                            <td>
                                                <select class="select-other custom-select" name="method[1]" other_id="other_method1" data-no="2_0">
                                                        <option <?php if(!empty($method[1])&& $method[1]=="") ?> value="">Select Method</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="1") ?> value="1" other="">CLIA</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="2") ?> value="2" other="">ECLIA</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="3") ?> value="3" other="">ELFA</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="4") ?> value="4" other="">CMIA</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="5") ?> value="5" other="">FEIA</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="6") ?> value="6" other="">ICMA</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="7") ?> value="7" other="">IRMA</option>
                                                        <option <?php if(!empty($method[1])&& $method[1]=="99") ?> value="99" other="">Others</option>
                                                    </select>
                                                    <input type="text" class="<?php if($method[1]!="99"){echo "d-none";} ?> form-control" name="method_other[1]" id="other_method1" placeholder="Other ระบุ" value="<?php echo $method_other[1]; ?>" disabled>
                                            </td>
                                            <td><?php echo $sample[0][0]; ?></td>
                                            <td><?php echo $sample[0][1]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>AFP* IU/mL</td>
                                            <td>
                                                <select class="custom-select" name="tools[]" other_id="other_0" data-no="1_0">
                                                        <option <?php if(!empty($tools[1]) && $tools[1]==""){echo "selected";} ?> value="">Choose</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="01"){echo "selected";} ?> value="01" other="">01: Maglumi Series /800</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="02"){echo "selected";} ?> value="02" other="">02: Abbott, Architect Series /Armity</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="03"){echo "selected";} ?> value="03" other="">03: Siemens, Advia Centaur CP [ ] XP</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="04"){echo "selected";} ?> value="04" other="">04: Beckman, Access ; Unicel DXi</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="05"){echo "selected";} ?> value="05" other="">05: BioMerieux, VIDAS ; Minividas</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="06"){echo "selected";} ?> value="06" other="">06: Tosoh AIA Series</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="07"){echo "selected";} ?> value="07" other="">07: Johnson, Vitros ECi 3600, 5600</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="08"){echo "selected";} ?> value="08" other="">08: Roche; Cobas Series, Modular, Elecsys series</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="09"){echo "selected";} ?> value="09" other="">09: Hybiome AE-180</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="10"){echo "selected";} ?> value="10" other="">10: Mindray CL 6000i,2000i / 1000i</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="11"){echo "selected";} ?> value="11" other="">11: Liaison Series ;</option>
                                                        <option <?php if(!empty($tools[1]) && $tools[1]=="12"){echo "selected";} ?> value="12" other="">12: Immulite, LKB1277, DPC, Others</option>
                                                    </select>
                                            </td>
                                            <td>
                                                <select class="select-other custom-select" name="method[2]" other_id="other_method1" data-no="2_0">
                                                        <option <?php if(!empty($method[2])&& $method[2]=="") {echo "selected";}?> value="">Select Method</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="1") {echo "selected";}?> value="1" other="">CLIA</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="2") {echo "selected";}?> value="2" other="">ECLIA</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="3") {echo "selected";}?> value="3" other="">ELFA</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="4") {echo "selected";}?> value="4" other="">CMIA</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="5") {echo "selected";}?> value="5" other="">FEIA</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="6") {echo "selected";}?> value="6" other="">ICMA</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="7") {echo "selected";}?> value="7" other="">IRMA</option>
                                                        <option <?php if(!empty($method[2])&& $method[2]=="99"){echo "selected";} ?> value="99" other="">Others</option>
                                                    </select>
                                                    <input type="text" class="<?php if($method[2]!="99"){echo "d-none";} ?> form-control" name="method_other[1]" id="other_method1" placeholder="Other ระบุ" value="<?php echo $method_other[2]; ?>" disabled>
                                            </td>
                                            <td><?php echo $sample[1][0]; ?></td>
                                            <td><?php echo $sample[1][1]; ?></td>
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
                            <input class="btn btn-primary" type="submit" name="" value="ยืนยันการส่งผลตรวจ"></input>
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