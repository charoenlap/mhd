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

<!-- EQAP -->
<div class="container-fuild">
        <div class="container container-EQAP" id="EQAP">
            <div class="card border border-dark">
                <form action="">
                    <div class="card-title text-center text-white" style="padding:20px; background-color:rgba(0, 0, 255, 0.7);">
                        <h5 class="font-weight-bold"><?php echo $title; ?></h5>
                    </div>
                    <div class="card-body" style="background-color:white;">
                        <div class="container-left">
                            <h6 class="font-weight-bold" style="margin-top: 5px;">โรงพยาบาล ศูนย์วิทยาศาสตร์การแพทย์อาเซียน (Test Account) กลุ่มงานพยาธิวิทยา</h6>
                            <h6 class="font-weight-bold" style="margin-top: 5px;">บันทึกการรับตัวอย่าง</h6>
                            <span>Trial : 4-2563</span>
                            <h6 class="font-weight-bold" style="margin-top: 5px;">วันที่ได้รับตัวอย่างทดสอบ *</h6>
                            <span><?php echo $datepick; ?></span>
                            <h6 class="font-weight-bold" style="margin-top: 5px;">ความสมบูรณ์ของตัวอย่างทดสอบ</h6>
                            <span><?php echo $received_status; ?></span>
                            <hr>
                            <div class="container-left">
                                
                            </div>
                            <div class="container-fluid">
                            <caption class="font-weight-bold">ผลการตรวจ</caption>
                            <div id="sample_0">
                            <h5 class="font-weight-bold" style="margin-left: 10px;">ST-6311-1</h5>
                                <table class="table text-center table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>Parasite Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $y = 1; ?>
                                        <?php $arrcount_0 = count($sample_0); ?>
                                        <?php for($x = 0; $x<$arrcount_0;$x++) : ?>
                                        <tr>
                                            <td><?php echo $y++; ?></td>
                                            <td>
                                                <select class="custom-select" name="sample[0][]" >
                                                        <option value="">Choose</option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="1"){echo "selected='selected'";}?> value="1">Amoeba trophozoite </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="2"){echo "selected='selected'";}?> value="2">Ascaris lumbricoides egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="3"){echo "selected='selected'";}?> value="3">Balantidium coli cyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="4"){echo "selected='selected'";}?> value="4">Balantidium coli trophozoite </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="5"){echo "selected='selected'";}?> value="5">Blastocystis hominis </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="6"){echo "selected='selected'";}?> value="6">Capillaria philippinensis adult </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="7"){echo "selected='selected'";}?> value="7">Capillaria philippinensis egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="8"){echo "selected='selected'";}?> value="8">Capillaria philippinensis larva </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="9"){echo "selected='selected'";}?> value="9">Chilomastix mesnili cyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="10"){echo "selected='selected'";}?> value="10">Chilomastix mesnili trophozoite </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="11"){echo "selected='selected'";}?> value="11">Cyclospora oocyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="12"){echo "selected='selected'";}?> value="12">Diphyllobrothium latum egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="13"){echo "selected='selected'";}?> value="13">Dipylidium caninum egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="14"){echo "selected='selected'";}?> value="14">Endolimax nana cyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="15"){echo "selected='selected'";}?> value="15">Entamoeba coli cyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="16"){echo "selected='selected'";}?> value="16">Entamoeba histolytica cyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="17"){echo "selected='selected'";}?> value="17">Enterobious vermicularis egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="18"){echo "selected='selected'";}?> value="18">Fasciolopsis/Fasciola/Echinostoma egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="19"){echo "selected='selected'";}?> value="19">Giardia lamblia cyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="20"){echo "selected='selected'";}?> value="20">Giardia lamblia trophozoite </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="21"){echo "selected='selected'";}?> value="21">Hookworm egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="22"){echo "selected='selected'";}?> value="22">Hookworm filariform larva </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="23"){echo "selected='selected'";}?> value="23">Hookworm rhabditiform larva </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="24"){echo "selected='selected'";}?> value="24">Hymenolepis diminuta egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="25"){echo "selected='selected'";}?> value="25">Hymenolepis nana egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="26"){echo "selected='selected'";}?> value="26">Iodamoeba butschlii cyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="27"){echo "selected='selected'";}?> value="27">Isospora belli oocyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="28"){echo "selected='selected'";}?> value="28">Opisthorchis/MIF egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="29"){echo "selected='selected'";}?> value="29">Paragonimus heterotremus egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="30"){echo "selected='selected'";}?> value="30">Paragonimus westermani egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="31"){echo "selected='selected'";}?> value="31">Plasmodium falciparum asexual form </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="32"){echo "selected='selected'";}?> value="32">Plasmodium falciparum gametocyte </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="33"){echo "selected='selected'";}?> value="33">Plasmodium malariae asexual form </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="34"){echo "selected='selected'";}?> value="34">Plasmodium malariae gametocyte </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="35"){echo "selected='selected'";}?> value="35">Plasmodium ovale asexual form </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="36"){echo "selected='selected'";}?> value="36">Plasmodium ovale gametocyte </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="37"){echo "selected='selected'";}?> value="37">Plasmodium vivax asexual form </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="38"){echo "selected='selected'";}?> value="38">Plasmodium vivax gametocyte </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="39"){echo "selected='selected'";}?> value="39">Sarcocystis hominis sporocyst/oocyst </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="40"){echo "selected='selected'";}?> value="40">Schistosoma haematobium egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="41"){echo "selected='selected'";}?> value="41">Schistosoma japonicum egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="42"){echo "selected='selected'";}?> value="42">Schistosoma mansoni egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="43"){echo "selected='selected'";}?> value="43">Schistosoma mekongi egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="44"){echo "selected='selected'";}?> value="44">Strongyloides stercoralis female </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="45"){echo "selected='selected'";}?> value="45">Strongyloides stercoralis filariform larva </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="46"){echo "selected='selected'";}?> value="46">Strongyloides stercoralis male </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="47"){echo "selected='selected'";}?> value="47">Strongyloides stercoralis rhabditiform larva </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="48"){echo "selected='selected'";}?> value="48">Taenia solium/Taenia saginata egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="49"){echo "selected='selected'";}?> value="49">Trichomonas hominis trophozoite </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="50"){echo "selected='selected'";}?> value="50">Trichuris trichiura egg </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="51"){echo "selected='selected'";}?> value="51">Not Found </option>
                                                        <option <?php if(!empty($sample_0[$x]) && $sample_0[$x] =="52"){echo "selected='selected'";}?> value="52">Not Tested</option>
                                                    </select>
                                            </td>
                                        </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
                                </div>
                                <div id="sample_1">
                                <h5 class="font-weight-bold" style="margin-left: 10px;">BL-6311-2</h5>
                                <table class="table text-center table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ลำดับที่</th>
                                            <th>Parasite Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $y = 1; ?>
                                        <?php $arrcount_1 = count($sample_1); ?>
                                        <?php for($x = 0; $x<$arrcount_1;$x++) : ?>
                                        <tr>
                                            <td><?php echo $y++; ?></td>
                                            <td>
                                                <select class="custom-select" name="sample[0][]" >
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] ==""){echo "selected='selected'";}?> value="">Choose</option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="1"){echo "selected='selected'";}?> value="1">Amoeba trophozoite </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="2"){echo "selected='selected'";}?> value="2">Ascaris lumbricoides egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="3"){echo "selected='selected'";}?> value="3">Balantidium coli cyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="4"){echo "selected='selected'";}?> value="4">Balantidium coli trophozoite </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="5"){echo "selected='selected'";}?> value="5">Blastocystis hominis </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="6"){echo "selected='selected'";}?> value="6">Capillaria philippinensis adult </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="7"){echo "selected='selected'";}?> value="7">Capillaria philippinensis egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="8"){echo "selected='selected'";}?> value="8">Capillaria philippinensis larva </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="9"){echo "selected='selected'";}?> value="9">Chilomastix mesnili cyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="10"){echo "selected='selected'";}?> value="10">Chilomastix mesnili trophozoite </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="11"){echo "selected='selected'";}?> value="11">Cyclospora oocyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="12"){echo "selected='selected'";}?> value="12">Diphyllobrothium latum egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="13"){echo "selected='selected'";}?> value="13">Dipylidium caninum egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="14"){echo "selected='selected'";}?> value="14">Endolimax nana cyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="15"){echo "selected='selected'";}?> value="15">Entamoeba coli cyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="16"){echo "selected='selected'";}?> value="16">Entamoeba histolytica cyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="17"){echo "selected='selected'";}?> value="17">Enterobious vermicularis egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="18"){echo "selected='selected'";}?> value="18">Fasciolopsis/Fasciola/Echinostoma egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="19"){echo "selected='selected'";}?> value="19">Giardia lamblia cyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="20"){echo "selected='selected'";}?> value="20">Giardia lamblia trophozoite </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="21"){echo "selected='selected'";}?> value="21">Hookworm egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="22"){echo "selected='selected'";}?> value="22">Hookworm filariform larva </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="23"){echo "selected='selected'";}?> value="23">Hookworm rhabditiform larva </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="24"){echo "selected='selected'";}?> value="24">Hymenolepis diminuta egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="25"){echo "selected='selected'";}?> value="25">Hymenolepis nana egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="26"){echo "selected='selected'";}?> value="26">Iodamoeba butschlii cyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="27"){echo "selected='selected'";}?> value="27">Isospora belli oocyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="28"){echo "selected='selected'";}?> value="28">Opisthorchis/MIF egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="29"){echo "selected='selected'";}?> value="29">Paragonimus heterotremus egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="30"){echo "selected='selected'";}?> value="30">Paragonimus westermani egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="31"){echo "selected='selected'";}?> value="31">Plasmodium falciparum asexual form </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="32"){echo "selected='selected'";}?> value="32">Plasmodium falciparum gametocyte </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="33"){echo "selected='selected'";}?> value="33">Plasmodium malariae asexual form </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="34"){echo "selected='selected'";}?> value="34">Plasmodium malariae gametocyte </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="35"){echo "selected='selected'";}?> value="35">Plasmodium ovale asexual form </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="36"){echo "selected='selected'";}?> value="36">Plasmodium ovale gametocyte </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="37"){echo "selected='selected'";}?> value="37">Plasmodium vivax asexual form </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="38"){echo "selected='selected'";}?> value="38">Plasmodium vivax gametocyte </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="39"){echo "selected='selected'";}?> value="39">Sarcocystis hominis sporocyst/oocyst </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="40"){echo "selected='selected'";}?> value="40">Schistosoma haematobium egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="41"){echo "selected='selected'";}?> value="41">Schistosoma japonicum egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="42"){echo "selected='selected'";}?> value="42">Schistosoma mansoni egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="43"){echo "selected='selected'";}?> value="43">Schistosoma mekongi egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="44"){echo "selected='selected'";}?> value="44">Strongyloides stercoralis female </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="45"){echo "selected='selected'";}?> value="45">Strongyloides stercoralis filariform larva </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="46"){echo "selected='selected'";}?> value="46">Strongyloides stercoralis male </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="47"){echo "selected='selected'";}?> value="47">Strongyloides stercoralis rhabditiform larva </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="48"){echo "selected='selected'";}?> value="48">Taenia solium/Taenia saginata egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="49"){echo "selected='selected'";}?> value="49">Trichomonas hominis trophozoite </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="50"){echo "selected='selected'";}?> value="50">Trichuris trichiura egg </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="51"){echo "selected='selected'";}?> value="51">Not Found </option>
                                                        <option <?php if(!empty($sample_1[$x]) && $sample_1[$x] =="52"){echo "selected='selected'";}?> value="52">Not Tested</option>
                                                    </select>
                                            </td>
                                        </tr>
                                        <?php endfor; ?>
                                    </tbody>
                                </table>
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