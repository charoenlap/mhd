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
        <div class="container container-H_EQAM" id="H_EQAM">
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
                                                <th scope="col">รหัสเซลล์</th>
                                                <th scope="col">Cell Types</th>
                                                <th scope="col">6301.1 (%)</th>
                                                <th scope="col">6301.2 (%)</th>
                                            </tr>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Blast cell (cannot be identified)</td>
                                                <td><input type="number" step="0" amount_attr="0" class="form-control" name="sample[0][1]" value="<?php if(!empty($sample[0][1])){echo $sample[0][1];} ?>" readonly></td>
                                                <td><input type="number" step="0" amount_attr="1" class="form-control" name="sample[1][1]" value="<?php if(!empty($sample[1][1])){echo $sample[1][1];} ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Lymphoblast/prolymphocyte</td>
                                                <td><input type="number" step="0" amount_attr="0" class="form-control" name="sample[0][2]" value="<?php if(!empty($sample[0][2])){echo $sample[0][2];} ?>" readonly></td>
                                                <td><input type="number" step="0" amount_attr="1" class="form-control" name="sample[1][2]" value="<?php if(!empty($sample[1][2])){echo $sample[1][2];} ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Monoblast/promonocyte</td>
                                                <td><input type="number" step="0" amount_attr="0" class="form-control" name="sample[0][3]" value="<?php if(!empty($sample[0][3])){echo $sample[0][3];} ?>" readonly></td>
                                                <td><input type="number" step="0" amount_attr="1" class="form-control" name="sample[1][3]" value="<?php if(!empty($sample[1][3])){echo $sample[1][3];} ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Total</td>
                                                <td><input type="number" class="form-control" name="sum_sec1[0][1]" id="sum_amount_0" value="<?php if(!empty($sum_sec1[0][0])){echo $sum_sec1[0][1];} ?>" readonly></td>
                                                <td><input type="number" class="form-control" name="sum_sec1[1][1]" id="sum_amount_1" value="<?php if(!empty($sum_sec1[1][1])){echo $sum_sec1[1][1];} ?>" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <caption>Abnormal WBC เลือกเฉพาะเซลล์หรือความผิดปกติที่ตรวจพบเท่านั้น</caption>
                                    <table class="table text-center table-hover">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">รหัสเซลล์</th>
                                                <th scope="col">Cell Types</th>
                                                <th scope="col">6301.1 (Found)</th>
                                                <th scope="col">6301.2 (Found)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>4</td>
                                                <td>Auer rod</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[0][4]" type="checkbox" value="1" id="test_0_sec_2_4" <?php if(!empty($sample[0][4])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[1][4]" type="checkbox" value="1" id="test_1_sec_2_4" <?php if(!empty($sample[1][4])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Döhle bodies</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[0][5]" type="checkbox" value="1" id="test_0_sec_2_5" <?php if(!empty($sample[0][5])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[1][5]" type="checkbox" value="1" id="test_1_sec_2_5" <?php if(!empty($sample[1][5])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <caption>การรายงานรูปร่าง RBC และการ grading</caption>
                                    <table class="table text-center table-hover">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>รหัสเซลล์</th>
                                                <th>Cell Types</th>
                                                <th>6301.1</th>
                                                <th>6301.2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>6</td>
                                                <td>Anisocytosis</td>
                                                <td>
                                                    <select name="sample[0][6]" id="" class="form-control">
                                                        <option <?php if(!empty($sample[0][6]) && $sample[0][6]==""){echo "selected";} ?> value="">-</option>
                                                        <option <?php if(!empty($sample[0][6]) && $sample[0][6]=="0.5"){echo "selected";} ?> value="0.5">Few</option>
                                                        <option <?php if(!empty($sample[0][6]) && $sample[0][6]=="1"){echo "selected";} ?> value="1">1+</option>
                                                        <option <?php if(!empty($sample[0][6]) && $sample[0][6]=="2"){echo "selected";} ?> value="2">2+</option>
                                                        <option <?php if(!empty($sample[0][6]) && $sample[0][6]=="3"){echo "selected";} ?> value="3">3+</option>
                                                        <option <?php if(!empty($sample[0][6]) && $sample[0][6]=="4"){echo "selected";} ?> value="4">4+</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="sample[1][6]" id="" class="form-control">
                                                        <option <?php if(!empty($sample[1][6]) && $sample[1][6]==""){echo "selected";} ?> value="">-</option>
                                                        <option <?php if(!empty($sample[1][6]) && $sample[1][6]=="0.5"){echo "selected";} ?> value="0.5">Few</option>
                                                        <option <?php if(!empty($sample[1][6]) && $sample[1][6]=="1"){echo "selected";} ?> value="1">1+</option>
                                                        <option <?php if(!empty($sample[1][6]) && $sample[1][6]=="2"){echo "selected";} ?> value="2">2+</option>
                                                        <option <?php if(!empty($sample[1][6]) && $sample[1][6]=="3"){echo "selected";} ?> value="3">3+</option>
                                                        <option <?php if(!empty($sample[1][6]) && $sample[1][6]=="4"){echo "selected";} ?> value="4">4+</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>Poikilocytosis</td>
                                                <td>
                                                    <select name="sample[0][7]" id="" class="form-control">
                                                        <option <?php if(!empty($sample[0][7]) && $sample[0][7]==""){echo "selected";} ?> value="">-</option>
                                                        <option <?php if(!empty($sample[0][7]) && $sample[0][7]=="0.5"){echo "selected";} ?> value="0.5">Few</option>
                                                        <option <?php if(!empty($sample[0][7]) && $sample[0][7]=="1"){echo "selected";} ?> value="1">1+</option>
                                                        <option <?php if(!empty($sample[0][7]) && $sample[0][7]=="2"){echo "selected";} ?> value="2">2+</option>
                                                        <option <?php if(!empty($sample[0][7]) && $sample[0][7]=="3"){echo "selected";} ?> value="3">3+</option>
                                                        <option <?php if(!empty($sample[0][7]) && $sample[0][7]=="4"){echo "selected";} ?> value="4">4+</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="sample[1][7]" id="" class="form-control">
                                                        <option <?php if(!empty($sample[1][7]) && $sample[1][7]==""){echo "selected";} ?> value="">-</option> 
                                                        <option <?php if(!empty($sample[1][7]) && $sample[1][7]=="0.5"){echo "selected";} ?> value="0.5">Few</option>
                                                        <option <?php if(!empty($sample[1][7]) && $sample[1][7]=="1"){echo "selected";} ?> value="1">1+</option>
                                                        <option <?php if(!empty($sample[1][7]) && $sample[1][7]=="2"){echo "selected";} ?> value="2">2+</option>
                                                        <option <?php if(!empty($sample[1][7]) && $sample[1][7]=="3"){echo "selected";} ?> value="3">3+</option>
                                                        <option <?php if(!empty($sample[1][7]) && $sample[1][7]=="4"){echo "selected";} ?> value="4">4+</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <caption>*หากต้องการรายงาน "hypochromic microcytic RBC" โปรด เลือก grading (เช่น 2+) ที่รหัส 25 และ 39 ทั้งสองรหัส</caption>
                                    <div style="padding: 10px;"></div>
                                    <caption>รายงานรูปร่างเม็ดเลือดแดง</caption>
                                    <table class="table text-center table-hover">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">รหัสเซลล์</th>
                                                <th scope="col">Cell Types</th>
                                                <th scope="col">6301.1 (Found)</th>
                                                <th scope="col">6301.2 (Found)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>8</td>
                                                <td>Normal red blood cell</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[0][8]" type="checkbox" value="1" id="test_0_sec_4_8" <?php if(!empty($sample[0][8])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[1][8]" type="checkbox" value="1" id="test_1_sec_4_8" <?php if(!empty($sample[1][8])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>Basophilic stippling</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[0][9]" type="checkbox" value="1" id="test_0_sec_4_9" <?php if(!empty($sample[0][9])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[1][9]" type="checkbox" value="1" id="test_1_sec_4_9" <?php if(!empty($sample[1][9])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>48</td>
                                                <td>Nucleated red blood cell (โปรดระบุระยะของเซลล์ที่พบ)</td>
                                                <td><input type="text" class="form-control" name="sample[0][48]" <?php if(!empty($sample[0][48])){echo $sample[0][48];} ?> style="padding-bottom: 0px;" readonly></td>
                                                <td><input type="text" class="form-control" name="sample[1][48]" <?php if(!empty($sample[1][48])){echo $sample[1][48];} ?> style="padding-bottom: 0px;" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <caption>* หากเลือกช่องรหัส 48 กรุณาระบุคำตอบเป็นภาษาอังกฤษ</caption>
                                    <div style="padding: 10px;"></div>
                                    <caption>Platelet estimation</caption>
                                    <table class="table text-center table-hover">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>รหัสเซลล์</th>
                                                <th>Cell Types</th>
                                                <th>6301.1</th>
                                                <th></th>
                                                <th>6301.2</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>49</td>
                                                <td>Platelet</td>
                                                <td>
                                                    <select class="custom-select" name="sample[0][49]">
                                                        <option <?php if(!empty($sample[0][49])&& $sample[0][49]=="1"){echo "selected";} ?> value="1">decrease</option>
                                                        <option <?php if(!empty($sample[0][49])&& $sample[0][49]=="2"){echo "selected";} ?> value="2">adequate</option>
                                                        <option <?php if(!empty($sample[0][49])&& $sample[0][49]=="3"){echo "selected";} ?> value="3">increase</option>
                                                    </select>
                                                </td>
                                                <th class="bg-primary"></th>
                                                <td>
                                                    <select class="custom-select" name="sample[1][49]">
                                                        <option <?php if(!empty($sample[1][49])&& $sample[1][49]=="1"){echo "selected";} ?> value="1">decrease</option>
                                                        <option <?php if(!empty($sample[1][49])&& $sample[1][49]=="2"){echo "selected";} ?> value="2">adequate</option>
                                                        <option <?php if(!empty($sample[1][49])&& $sample[1][49]=="3"){echo "selected";} ?> value="3">increase</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div style="padding: 10px;"></div>
                                    <caption>Abnormal Platelet</caption>
                                    <table class="table text-center table-hover">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th scope="col">รหัสเซลล์</th>
                                                <th scope="col">Cell Types</th>
                                                <th scope="col">6301.1 (Found)</th>
                                                <th scope="col">6301.2 (Found)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>50</td>
                                                <td>Pale stained platelet</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[0][50]" type="checkbox" value="1" id="test_0_sec_6_50" <?php if(!empty($sample[0][50])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[1][50]" type="checkbox" value="1" id="test_1_sec_6_50" <?php if(!empty($sample[1][50])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>51</td>
                                                <td>Giant platelet</td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[0][51]" type="checkbox" value="" id="test_0_sec_6_51" <?php if(!empty($sample[0][51])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="sample[1][51]" type="checkbox" value="" id="test_1_sec_6_51" <?php if(!empty($sample[1][51])){echo "checked";} ?>>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>52</td>
                                                <td>Other abnormalities (โปรดระบุ)</td>
                                                <td><input type="text" class="form-control" name="sample[0][52]" value="<?php if(!empty($sample[0][52])){echo $sample[0][52];} ?>" style="padding-bottom: 0px;" readonly></td>
                                                <td><input type="text" class="form-control" name="sample[1][52]" value="<?php if(!empty($sample[1][52])){echo $sample[1][52];} ?>" style="padding-bottom: 0px;" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- file upload -->
                                    <table class="table text-center table-hover">
                                    <tbody class="text-left">
                                        <tr>
                                            <td class="bg-primary text-white" style="width: 350px;"> File 1</td>
                                            <td><?php if(!empty($file_0)){echo $file_0;}else{echo "-";} ?></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-primary text-white" style="width: 350px;"> File 2</td>
                                            <td><?php if(!empty($file_1)){echo $file_1;}else{echo "-";} ?></td>
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
                            <button class="btn btn-primary" type="submit" name="submit" >ยืนยันการส่งผลตรวจ</button>
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
            appearance: none;
        }
    </style>