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
    <div class="container container-EQAB_IDEN_AST" id="EQAB_IDEN_AST">
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
                            <caption class="font-weight-bold">ผลการตรวจ</caption><br>
                            <div class="container-left btn btn-primary" style="margin: 20px; margin-left: 0;">BACTERIA IDENTIFICATION</div>
                        <div class="container-left col-md-auto">
                            <span class="font-weight-bold">1.วิธีการที่ท่านใช้ในการตรวจวินิจฉัยเชื้อแบคทีเรียสำหรับตัวอย่างที่ได้รับ</span>
                           <select class="form-control" name="" id="result_0">
                               <option <?php if(!empty($result)&& $result ==""){echo "selected";}  ?>value="">-</option>
                               <option <?php if(!empty($result)&& $result =="1"){echo "selected";}  ?> value="1">Conventional tests</option>
                               <option <?php if(!empty($result)&& $result =="2"){echo "selected";}  ?> value="2">VITEK</option>
                               <option <?php if(!empty($result)&& $result =="3"){echo "selected";}  ?> value="3">VITEK 2</option>
                               <option <?php if(!empty($result)&& $result =="4"){echo "selected";}  ?> value="4"> Other..</option>
                           </select>
                            <input type="text" name="result_other" class="form-control <?php if($result != "4"){echo "d-none";} ?> " value="<?php echo $result_other; ?>" placeholder="Other ระบุ" disabled></input>
                        </div>
                        <div style="padding: 10px;"></div>
                        <div class="card text-black font-weight-bold" style="background-color: rgba(255, 167, 71, 0.5); padding:10px;">
                            <div class="btn btn-primary col-2 font-weight-bold" style="margin: 10px;">Trial 185</div>
                            <div class="card-content">
                                <span class="font-weight-bold">2.รายงานชนิดของเชื้อแบคทีเรียที่พบในตัวอย่าง Trial 185</span>
                                <input type="text" class="form-control border-white" name="result_1[]" value="<?php echo $result_1[0]; ?>" disabled>
                                <div class="card-content" style="margin-top: 20px;">
                                    <span class="font-weight-bold ">3.วิธีการที่ท่านใช้ในการทดสอบความไวต่อยาปฏิชีวนะสำหรับเชื้อตัวอย่างที่ได้รับ</span>
                                    <select class="form-control" name="" id="result_0">
                                        <option <?php if(!empty($infection_sec1[0]) && $infection_sec1[0] ==""){echo "selected";}  ?> value="">-</option>
                                        <option <?php if(!empty($infection_sec1[0]) && $infection_sec1[0] =="1"){echo "selected";}  ?> value="1">Disc diffusion</option>
                                        <option <?php if(!empty($infection_sec1[0]) && $infection_sec1[0] =="2"){echo "selected";}  ?> value="2">VITEK</option>
                                        <option <?php if(!empty($infection_sec1[0]) && $infection_sec1[0] =="3"){echo "selected";}  ?> value="3">VITEK 2</option>
                                        <option <?php if(!empty($infection_sec1[0]) && $infection_sec1[0] =="4"){echo "selected";}  ?> value="4"> Other..</option>
                                    </select>
                                <input type="text" name="result_other" class="form-control <?php if($infection_sec1[0] != "4"){echo "d-none";} ?> " value="<?php echo $infection_sec1_other[0]; ?>" placeholder="Other ระบุ" disabled></input>
                                    <div class="card-content" style="padding-top: 20px;">
                                        <caption>4.รายงานผลการทดสอบความไวต่อยาในตารางข้างล่างนี้</caption>
                                        <table class="table text-center table-hover bordered">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th>ยา</th>
                                                    <th>zone size (mm.)</th>
                                                    <th>การแปลผล</th>
                                                    <th>MIC(μg/ml) (ถ้ามี)</th>
                                                    <th>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $arrcount_0 = count($tool_sec2[0])?>
                                            <?php for($x = 0; $x<$arrcount_0;$x++) : ?>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="tool_sec2[0][]">
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="1"){echo "selected";} ?> value="1">Amikacin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="2"){echo "selected";} ?> value="2">Amoxicillin-calvulonate</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="3"){echo "selected";} ?> value="3">Ampicillin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="4"){echo "selected";} ?> value="4">Ampicillin-sulbactam</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="5"){echo "selected";} ?> value="5">Azithromycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="6"){echo "selected";} ?> value="6">Aztreonam</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="7"){echo "selected";} ?> value="7">Cefazolin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="8"){echo "selected";} ?> value="8">Cefepime</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="9"){echo "selected";} ?> value="9">Cefotaxime</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="10"){echo "selected";} ?> value="10">Cefotetan</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="11"){echo "selected";} ?> value="11">Cefoxtin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="12"){echo "selected";} ?> value="12">Ceftaroline</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="13"){echo "selected";} ?> value="13">Ceftazidime</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="14"){echo "selected";} ?> value="14">Ceftolozane-lazobactam</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="15"){echo "selected";} ?> value="15">Ceftriaxone</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="16"){echo "selected";} ?> value="16">Cefuroxime</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="17"){echo "selected";} ?> value="17">Chloramphenicol</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="18"){echo "selected";} ?> value="18">Ciprofloxacin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="19"){echo "selected";} ?> value="19">Clarithomycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="20"){echo "selected";} ?> value="20">Clindamycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="21"){echo "selected";} ?> value="21">Colistin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="22"){echo "selected";} ?> value="22">Daptomycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="23"){echo "selected";} ?> value="23">Doripenem</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="24"){echo "selected";} ?> value="24">Doxycycline</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="25"){echo "selected";} ?> value="25">Ertapenem</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="26"){echo "selected";} ?> value="26">Erythomycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="27"){echo "selected";} ?> value="27">Fosfomycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="28"){echo "selected";} ?> value="28">Gentamycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="29"){echo "selected";} ?> value="29">Hight-level Gentamycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="30"){echo "selected";} ?> value="30">Hight-level Streptomycin </option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="31"){echo "selected";} ?> value="31">Imipenem</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="32"){echo "selected";} ?> value="32">Levofloxacin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="33"){echo "selected";} ?> value="33">Linezolid</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="34"){echo "selected";} ?> value="34">Meropenem</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="35"){echo "selected";} ?> value="35">Minocycline</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="36"){echo "selected";} ?> value="36">Moxifloxacin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="37"){echo "selected";} ?> value="37">Netilmicin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="38"){echo "selected";} ?> value="38">Nitrofurantoin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="39"){echo "selected";} ?> value="39">Oritavancin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="40"){echo "selected";} ?> value="40">Oxacillin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="41"){echo "selected";} ?> value="41">Penicillin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="42"){echo "selected";} ?> value="42">Rifampin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="43"){echo "selected";} ?> value="43">Piperracillin-tazobactam</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="44"){echo "selected";} ?> value="44">Sulfisoxazole</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="45"){echo "selected";} ?> value="45">Tedizolid</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="46"){echo "selected";} ?> value="46">Telavancin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="47"){echo "selected";} ?> value="47">Tetracycline</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="48"){echo "selected";} ?> value="48">Tobramycin</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="49"){echo "selected";} ?> value="49">Trimethoprim</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="50"){echo "selected";} ?> value="50">Trimethoprim-sulfamethoxzole</option>
                                                            <option <?php if(!empty($tool_sec2[0][$x]) && $tool_sec2[0][$x]=="51"){echo "selected";} ?> value="51">Vancomycin</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="number" class="form-control" name="result_2[0][]" value="<?php echo $result_2[0][$x]; ?>" disabled>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="infection_sec3[0][]">
                                                            <option value="">Choose</option>
                                                            <option <?php if(!empty($infection_sec3[0][$x]) && $infection_sec3[0][$x]=="1"){echo "selected";} ?> value="1">Susceptible</option>
                                                            <option <?php if(!empty($infection_sec3[0][$x]) && $infection_sec3[0][$x]=="2"){echo "selected";} ?> value="2">Susceptible dose dependent</option>
                                                            <option <?php if(!empty($infection_sec3[0][$x]) && $infection_sec3[0][$x]=="3"){echo "selected";} ?> value="3">Intermedate</option>
                                                            <option <?php if(!empty($infection_sec3[0][$x]) && $infection_sec3[0][$x]=="4"){echo "selected";} ?> value="4">Resistant</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" class="form-control" name="result_3[0][]" value="<?php echo $result_3[0][$x]; ?>" disabled>
                                                    </td>
                                                </tr>
                                            <?php endfor; ?>
                                            </tbody>
                                        </table>
                                        <div class="card-content">
                                            <span>5.ในกรณีที่ยาบางชนิดที่ท่านทดสอบนั้นมีวิธีการทดสอบที่แตกต่างไปจากที่ให้ข้อมูลโปรดระบุ</span>
                                            <input type="text" class="form-control border-white" name="result_4[]" value="<?php echo $result_4[0]; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="margin: 20px;"></div>
                        <div class="card text-black font-weight-bold" style="background-color: rgba(95, 77, 189, 0.3); padding:10px;">
                            <div class="btn btn-primary col-2 font-weight-bold" style="margin: 10px;">Trial 186</div>
                            <span class="font-weight-bold">6.รายงานชนิดของเชื้อแบคทีเรียที่พบในตัวอย่าง Trial 186</span>
                            <input type="text" class="form-control border-white" name="result_1[]" value="<?php echo $result_1[1]; ?>" disabled>
                            <div class="card-content" style="margin-top: 20px;">
                                <span class="font-weight-bold ">7.วิธีการที่ท่านใช้ในการทดสอบความไวต่อยาปฏิชีวนะสำหรับเชื้อตัวอย่างที่ได้รับ</span>
                                    <select class="form-control" name="" id="result_0">
                                        <option <?php if(!empty($infection_sec1[1]) && $infection_sec1[1] ==""){echo "selected";}  ?> value="">-</option>
                                        <option <?php if(!empty($infection_sec1[1]) && $infection_sec1[1] =="1"){echo "selected";}  ?> value="1">Disc diffusion</option>
                                        <option <?php if(!empty($infection_sec1[1]) && $infection_sec1[1] =="2"){echo "selected";}  ?> value="2">VITEK</option>
                                        <option <?php if(!empty($infection_sec1[1]) && $infection_sec1[1] =="3"){echo "selected";}  ?> value="3">VITEK 2</option>
                                        <option <?php if(!empty($infection_sec1[1]) && $infection_sec1[1] =="4"){echo "selected";}  ?> value="4"> Other..</option>
                                    </select>
                                <input type="text" name="result_other" class="form-control <?php if($infection_sec1[1] != "4"){echo "d-none";} ?> " value="<?php echo $infection_sec1_other[1]; ?>" placeholder="Other ระบุ" disabled></input>
                                <div class="card-content" style="padding-top: 20px;">
                                    <caption>8.รายงานผลการทดสอบความไวต่อยาในตารางข้างล่างนี้</caption>
                                    <table class="table text-center table-hover bordered">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>ยา</th>
                                                <th>zone size (mm.)</th>
                                                <th>การแปลผล</th>
                                                <th>MIC(μg/ml) (ถ้ามี)</th>
                                                <th>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $arrcount_1 = count($tool_sec2[1])?>
                                            <?php for($x = 0; $x<$arrcount_1;$x++) : ?>
                                            <tr>
                                                <td>
                                                    <select class="form-control" name="tool_sec2[0][]">
                                                        <option <?php if($tool_sec2[1][$x] ==""){echo "selected='selected'";}?> value="">Choose</option>
                                                        <option <?php if($tool_sec2[1][$x] =="1"){echo "selected='selected'";}?> value="1">Amikacin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="2"){echo "selected='selected'";}?> value="2">Amoxicillin-calvulonate</option>
                                                        <option <?php if($tool_sec2[1][$x] =="3"){echo "selected='selected'";}?> value="3">Ampicillin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="4"){echo "selected='selected'";}?> value="4">Ampicillin-sulbactam</option>
                                                        <option <?php if($tool_sec2[1][$x] =="5"){echo "selected='selected'";}?> value="5">Azithromycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="6"){echo "selected='selected'";}?> value="6">Aztreonam</option>
                                                        <option <?php if($tool_sec2[1][$x] =="7"){echo "selected='selected'";}?> value="7">Cefazolin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="8"){echo "selected='selected'";}?> value="8">Cefepime</option>
                                                        <option <?php if($tool_sec2[1][$x] =="9"){echo "selected='selected'";}?> value="9">Cefotaxime</option>
                                                        <option <?php if($tool_sec2[1][$x] =="10"){echo "selected='selected'";}?> value="10">Cefotetan</option>
                                                        <option <?php if($tool_sec2[1][$x] =="11"){echo "selected='selected'";}?> value="11">Cefoxtin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="12"){echo "selected='selected'";}?> value="12">Ceftaroline</option>
                                                        <option <?php if($tool_sec2[1][$x] =="13"){echo "selected='selected'";}?> value="13">Ceftazidime</option>
                                                        <option <?php if($tool_sec2[1][$x] =="14"){echo "selected='selected'";}?> value="14">Ceftolozane-lazobactam</option>
                                                        <option <?php if($tool_sec2[1][$x] =="15"){echo "selected='selected'";}?> value="15">Ceftriaxone</option>
                                                        <option <?php if($tool_sec2[1][$x] =="16"){echo "selected='selected'";}?> value="16">Cefuroxime</option>
                                                        <option <?php if($tool_sec2[1][$x] =="17"){echo "selected='selected'";}?> value="17">Chloramphenicol</option>
                                                        <option <?php if($tool_sec2[1][$x] =="18"){echo "selected='selected'";}?> value="18">Ciprofloxacin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="19"){echo "selected='selected'";}?> value="19">Clarithomycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="20"){echo "selected='selected'";}?> value="20">Clindamycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="21"){echo "selected='selected'";}?> value="21">Colistin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="22"){echo "selected='selected'";}?> value="22">Daptomycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="23"){echo "selected='selected'";}?> value="23">Doripenem</option>
                                                        <option <?php if($tool_sec2[1][$x] =="24"){echo "selected='selected'";}?> value="24">Doxycycline</option>
                                                        <option <?php if($tool_sec2[1][$x] =="25"){echo "selected='selected'";}?> value="25">Ertapenem</option>
                                                        <option <?php if($tool_sec2[1][$x] =="26"){echo "selected='selected'";}?> value="26">Erythomycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="27"){echo "selected='selected'";}?> value="27">Fosfomycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="28"){echo "selected='selected'";}?> value="28">Gentamycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="29"){echo "selected='selected'";}?> value="29">Hight-level Gentamycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="30"){echo "selected='selected'";}?> value="30">Hight-level Streptomycin </option>
                                                        <option <?php if($tool_sec2[1][$x] =="31"){echo "selected='selected'";}?> value="31">Imipenem</option>
                                                        <option <?php if($tool_sec2[1][$x] =="32"){echo "selected='selected'";}?> value="32">Levofloxacin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="33"){echo "selected='selected'";}?> value="33">Linezolid</option>
                                                        <option <?php if($tool_sec2[1][$x] =="34"){echo "selected='selected'";}?> value="34">Meropenem</option>
                                                        <option <?php if($tool_sec2[1][$x] =="35"){echo "selected='selected'";}?> value="35">Minocycline</option>
                                                        <option <?php if($tool_sec2[1][$x] =="36"){echo "selected='selected'";}?> value="36">Moxifloxacin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="37"){echo "selected='selected'";}?> value="37">Netilmicin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="38"){echo "selected='selected'";}?> value="38">Nitrofurantoin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="39"){echo "selected='selected'";}?> value="39">Oritavancin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="40"){echo "selected='selected'";}?> value="40">Oxacillin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="41"){echo "selected='selected'";}?> value="41">Penicillin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="42"){echo "selected='selected'";}?> value="42">Rifampin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="43"){echo "selected='selected'";}?> value="43">Piperracillin-tazobactam</option>
                                                        <option <?php if($tool_sec2[1][$x] =="44"){echo "selected='selected'";}?> value="44">Sulfisoxazole</option>
                                                        <option <?php if($tool_sec2[1][$x] =="45"){echo "selected='selected'";}?> value="45">Tedizolid</option>
                                                        <option <?php if($tool_sec2[1][$x] =="46"){echo "selected='selected'";}?> value="46">Telavancin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="47"){echo "selected='selected'";}?> value="47">Tetracycline</option>
                                                        <option <?php if($tool_sec2[1][$x] =="48"){echo "selected='selected'";}?> value="48">Tobramycin</option>
                                                        <option <?php if($tool_sec2[1][$x] =="49"){echo "selected='selected'";}?> value="49">Trimethoprim</option>
                                                        <option <?php if($tool_sec2[1][$x] =="50"){echo "selected='selected'";}?> value="50">Trimethoprim-sulfamethoxzole</option>
                                                        <option <?php if($tool_sec2[1][$x] =="51"){echo "selected='selected'";}?> value="51">Vancomycin</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="result_2[1][]" value="<?php echo $result_2[1][$x] ?>" disabled>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="infection_sec3[0][]">
                                                            <option value="">Choose</option>
                                                            <option <?php if(!empty($infection_sec3[1][$x]) && $infection_sec3[1][$x]=="1"){echo "selected";} ?> value="1">Susceptible</option>
                                                            <option <?php if(!empty($infection_sec3[1][$x]) && $infection_sec3[1][$x]=="2"){echo "selected";} ?> value="2">Susceptible dose dependent</option>
                                                            <option <?php if(!empty($infection_sec3[1][$x]) && $infection_sec3[1][$x]=="3"){echo "selected";} ?> value="3">Intermedate</option>
                                                            <option <?php if(!empty($infection_sec3[1][$x]) && $infection_sec3[1][$x]=="4"){echo "selected";} ?> value="4">Resistant</option>
                                                        </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="result_3[0][]" value="<?php echo $result_3[1][$x]; ?>" disabled>
                                                </td>
                                            </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                    <div class="card-content">
                                        <span>9.ในกรณีที่ยาบางชนิดที่ท่านทดสอบนั้นมีวิธีการทดสอบที่แตกต่างไปจากที่ให้ข้อมูลโปรดระบุ</span>
                                        <input type="text" class="form-control border-white" name="result_4[1]" id="" value="<?php echo $result_4[1]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <caption>File upload</caption>
                        <table class="table text-center table-hover">
                                    <tbody class="text-left">
                                        <tr>
                                            <td class="bg-primary text-white font-weight-bold" style="width: 350px;"> File 1</td>
                                            <td><?php echo $file_0; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-primary text-white font-weight-bold" style="width: 350px;"> File 2</td>
                                            <td><?php echo $file_1; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-primary text-white font-weight-bold" style="width: 350px;"> File 3</td>
                                            <td><?php echo $file_2; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-primary text-white font-weight-bold" style="width: 350px;"> File 4</td>
                                            <td><?php echo $file_3; ?></td>
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
      #result_0 {
            width: auto; 
            text-align-last:left;
            border: none !important;
            pointer-events: none;
            background: none !important;
            appearance: none;
    }
    select {
            width: auto; 
            text-align-last:center;
            border: none !important;
            pointer-events: none;
            background: none !important;
            appearance: none;
    }
</style>
<script>
    $(document).ready(function(){
        //=====
    })
</script>