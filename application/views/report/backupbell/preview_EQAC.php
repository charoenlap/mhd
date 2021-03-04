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

<!-- EQAC -->
<div class="container-fuild">
        <div class="container container-EQAC" id="EQAC">
            <div class="card border border-dark">
                <form action="" method="post">
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
                                            <th scope="col">Testing</th>
                                            <th scope="col">Principle/Method</th>
                                            <th scope="col">Instrument</th>
                                            <th scope="col">Reagent</th>
                                            <th scope="col">Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Albumin (g/dL)</td>
                                            <td>
                                                <select class="custom-select" name="principle[1]" other_id="other_1">
                                                    <?php  ?>
                                                    <option <?php if(!empty($principle[1]) && $principle[1] ==""){echo "selected='selected'";}?>  value="">Choose</option>
                                                    <option <?php if(!empty($principle[1]) && $principle[1] =="2"){echo "selected='selected'";}?>  value="2" other="">Bromocresol green</option>
                                                    <option <?php if(!empty($principle[1]) && $principle[1] =="3"){echo "selected='selected'";}?>  value="3" other="">Bromocresol purple</option>
                                                    <option <?php if(!empty($principle[1]) && $principle[1] =="48"){echo "selected='selected'";}?>  value="48" other="">Vitros</option>
                                                </select>                                       
                                            </td>
                                            <td>
                                            <select class="custom-select" name="instrument[1]" other_id="other_1">
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] ==""){echo "selected='selected'";}?> value="">Choose</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="101"){echo "selected='selected'";}?> value="101" other="">Abbott Architect c Systems</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="102"){echo "selected='selected'";}?> value="102" other="">Audicom AC9000 Series electrolyte analyzer</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="103"){echo "selected='selected'";}?> value="103" other="">Beckman Coulter AU400/480/680/5800</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="104"){echo "selected='selected'";}?> value="104" other="">Beckman Coulter DxC600/ DxC800</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="105"){echo "selected='selected'";}?> value="105" other="">Beckman Coulter DxC700 AU</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="106"){echo "selected='selected'";}?> value="106" other="">Biosystems A15</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="160"){echo "selected='selected'";}?> value="160" other="">Biosystems BA200</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="107"){echo "selected='selected'";}?> value="107" other="">Biosystems BA400</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="157"){echo "selected='selected'";}?> value="157" other="">Biotecnica BT Series</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="108"){echo "selected='selected'";}?> value="108" other="">Caretium XI-921</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="110"){echo "selected='selected'";}?> value="110" other="">Diasys BioMajesty JCA-BM6010/C</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="163"){echo "selected='selected'";}?> value="163" other="">Diasys Respons 920</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="111"){echo "selected='selected'";}?> value="111" other="">Dirui CS Series</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="113"){echo "selected='selected'";}?> value="113" other="">Electa4 analyzer</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="114"){echo "selected='selected'";}?> value="114" other="">Erba XL Series</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="115"){echo "selected='selected'";}?> value="115" other="">Fuji Dri-Chem NX500i</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="156"){echo "selected='selected'";}?> value="156" other="">Furuno CA-800</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="116"){echo "selected='selected'";}?> value="116" other="">GASTAT-1820</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="159"){echo "selected='selected'";}?> value="159" other="">GE300 electrolyte analyzer</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="117"){echo "selected='selected'";}?> value="117" other="">Hitachi 911</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="118"){echo "selected='selected'";}?> value="118" other="">Horiba Pentra 400</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="162"){echo "selected='selected'";}?> value="162" other="">HumaStar 200</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="120"){echo "selected='selected'";}?> value="120" other="">ILab 600/650/Taurus</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="121"){echo "selected='selected'";}?> value="121" other="">In4lyte</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="122"){echo "selected='selected'";}?> value="122" other="">Konelab 20/30/60 / Thermo Indiko</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="123"){echo "selected='selected'";}?> value="123" other="">Mindray BC 2000/3000 series</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="124"){echo "selected='selected'";}?> value="124" other="">Mindray BS Series</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="125"){echo "selected='selected'";}?> value="125" other="">Nova 4 electrolyte analyzer</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="126"){echo "selected='selected'";}?> value="126" other="">Ortho Vitros 250/350</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="127"){echo "selected='selected'";}?> value="127" other="">Ortho Vitros 4600/5600</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="128"){echo "selected='selected'";}?> value="128" other="">PKL PPC 125</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="129"){echo "selected='selected'";}?> value="129" other="">Q4-Lyte</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="155"){echo "selected='selected'";}?> value="155" other="">Q4-LyteEx </option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="130"){echo "selected='selected'";}?> value="130" other="">Randox RX series</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="164"){echo "selected='selected'";}?> value="164" other="">Rayto Chemray 120</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="131"){echo "selected='selected'";}?> value="131" other="">Reflotron</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="132"){echo "selected='selected'";}?> value="132" other="">Roche Cobas c111</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="133"){echo "selected='selected'";}?> value="133" other="">Roche Cobas c311</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="134"){echo "selected='selected'";}?> value="134" other="">Roche Cobas c501/502/503</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="161"){echo "selected='selected'";}?> value="161" other="">Roche Cobas c701/702</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="135"){echo "selected='selected'";}?> value="135" other="">Roche Cobas Integra 400 Plus</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="109"){echo "selected='selected'";}?> value="109" other="">Roche Cobas Mira S</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="136"){echo "selected='selected'";}?> value="136" other="">Rx Modena</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="137"){echo "selected='selected'";}?> value="137" other="">Rx-lyte v.4</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="138"){echo "selected='selected'";}?> value="138" other="">SFRI ISE electrolyte series</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="139"){echo "selected='selected'";}?> value="139" other="">Siemens Advia 1800</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="167"){echo "selected='selected'";}?> value="167" other="">Siemens Atellica Solution</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="140"){echo "selected='selected'";}?> value="140" other="">Siemens Rapidlab 348Ex</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="141"){echo "selected='selected'";}?> value="141" other="">Siemens/Dade Dimension EXL</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="142"){echo "selected='selected'";}?> value="142" other="">Siemens/Dade Dimension RxL /Max/Xpand</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="143"){echo "selected='selected'";}?> value="143" other="">Sinnowa BS-3000</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="144"){echo "selected='selected'";}?> value="144" other="">Sinnowa DS301</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="145"){echo "selected='selected'";}?> value="145" other="">Sysmex BX-3010</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="146"){echo "selected='selected'";}?> value="146" other="">Sysmex BX-4000</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="148"){echo "selected='selected'";}?> value="148" other="">Tecom TC220</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="149"){echo "selected='selected'";}?> value="149" other="">Thermo Fisher Konelab Delta</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="150"){echo "selected='selected'";}?> value="150" other="">Tokyo Boeki/Biolis/ Prestige 24i/TMS 1024</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="158"){echo "selected='selected'";}?> value="158" other="">URIT 8280</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="151"){echo "selected='selected'";}?> value="151" other="">URIT-8031</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="166"){echo "selected='selected'";}?> value="166" other="">URIT-910 Plus</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="152"){echo "selected='selected'";}?> value="152" other="">Vitalab Scientific Flexor E</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="153"){echo "selected='selected'";}?> value="153" other="">XD 687 Electrolyte Analyzer</option>
                                                    <option <?php if(!empty($instrument[1]) && $instrument[1] =="154"){echo "selected='selected'";}?> value="154" other="">XD 697 Electrolyte Analyzer</option>
                                                </select>
                                            </td>
                                            <td>
                                            <select class="custom-select" name="method[1]" other_id="other_1">
                                                    <option value="">Choose</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="501"){echo "selected='selected'";}?> value="501" other="">Abbott laboratories</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="502"){echo "selected='selected'";}?> value="502" other="">Beckman Coulter</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="503"){echo "selected='selected'";}?> value="503" other="">BioSystems</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="543"){echo "selected='selected'";}?> value="543" other="">Biotecnica Instruments</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="504"){echo "selected='selected'";}?> value="504" other="">Biozen</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="546"){echo "selected='selected'";}?> value="546" other="">Bt GEN</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="505"){echo "selected='selected'";}?> value="505" other="">Caretium </option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="506"){echo "selected='selected'";}?> value="506" other="">Centronic</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="507"){echo "selected='selected'";}?> value="507" other="">Diamond</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="508"){echo "selected='selected'";}?> value="508" other="">DiaSys</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="509"){echo "selected='selected'";}?> value="509" other="">Diazyme</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="510"){echo "selected='selected'";}?> value="510" other="">Dirui</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="511"){echo "selected='selected'";}?> value="511" other="">Electa</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="512"){echo "selected='selected'";}?> value="512" other="">Elitech</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="513"){echo "selected='selected'";}?> value="513" other="">Erba Lachema</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="514"){echo "selected='selected'";}?> value="514" other="">Fuji</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="515"){echo "selected='selected'";}?> value="515" other="">Furuno</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="544"){echo "selected='selected'";}?> value="544" other="">Genrui Biotech</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="516"){echo "selected='selected'";}?> value="516" other="">Horiba</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="518"){echo "selected='selected'";}?> value="518" other="">I-med</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="517"){echo "selected='selected'";}?> value="517" other="">Iberlab</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="519"){echo "selected='selected'";}?> value="519" other="">Infocus firming</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="520"){echo "selected='selected'";}?> value="520" other="">Instumentation laboratory</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="521"){echo "selected='selected'";}?> value="521" other="">Jiangsu Audicom&nbsp;</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="545"){echo "selected='selected'";}?> value="545" other="">Medica</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="522"){echo "selected='selected'";}?> value="522" other="">Meditop</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="523"){echo "selected='selected'";}?> value="523" other="">Mindray</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="524"){echo "selected='selected'";}?> value="524" other="">Olympus</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="525"){echo "selected='selected'";}?> value="525" other="">Ortho-Clinical Diagnostics</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="526"){echo "selected='selected'";}?> value="526" other="">PCL</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="547"){echo "selected='selected'";}?> value="547" other="">Q4-Lyte</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="548"){echo "selected='selected'";}?> value="548" other="">Q4-LyteEx</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="550"){echo "selected='selected'";}?> value="550" other="">QuantILab</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="527"){echo "selected='selected'";}?> value="527" other="">Randox</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="549"){echo "selected='selected'";}?> value="549" other="">Rayto</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="528"){echo "selected='selected'";}?> value="528" other="">Roche Diagnotics</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="529"){echo "selected='selected'";}?> value="529" other="">SFRI</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="530"){echo "selected='selected'";}?> value="530" other="">Shanghai Xunda</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="531"){echo "selected='selected'";}?> value="531" other="">Siemens</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="532"){echo "selected='selected'";}?> value="532" other="">Slidedrychem</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="533"){echo "selected='selected'";}?> value="533" other="">Spinreact</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="534"){echo "selected='selected'";}?> value="534" other="">Stanbio</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="535"){echo "selected='selected'";}?> value="535" other="">Sysmex</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="536"){echo "selected='selected'";}?> value="536" other="">Techno Medica</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="537"){echo "selected='selected'";}?> value="537" other="">Tecom</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="538"){echo "selected='selected'";}?> value="538" other="">Thermoscientific</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="539"){echo "selected='selected'";}?> value="539" other="">Toyobo</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="540"){echo "selected='selected'";}?> value="540" other="">URIT</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="541"){echo "selected='selected'";}?> value="541" other="">Wako</option>
                                                    <option <?php if(!empty($method[1]) && $method[1] =="542"){echo "selected='selected'";}?> value="542" other="">YD diagnostic</option>
                                                </select>
                                            </td>
                                            <td><?php echo $result_2[1]; ?></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ALP (U/L)</td>
                                            <td>
                                                <select class="custom-select" name="principle[2]" other_id="other_1">
                                                    <option <?php if(!empty($principle[2]) && $principle[2] ==""){echo "selected='selected'";}?> value="" >Choose</option>
                                                    <option <?php if(!empty($principle[2]) && $principle[2] =="4"){echo "selected='selected'";}?> value="4" other="">Beckman</option>
                                                    <option <?php if(!empty($principle[2]) && $principle[2] =="43"){echo "selected='selected'";}?> value="43" other="">PNP AMP buff; IFCC</option>
                                                    <option <?php if(!empty($principle[2]) && $principle[2] =="44"){echo "selected='selected'";}?> value="44" other="">PNP.AMP buff; AACC</option>
                                                    <option <?php if(!empty($principle[2]) && $principle[2] =="45"){echo "selected='selected'";}?> value="45" other="">PNP.DEA buff; DGKC</option>
                                                    <option <?php if(!empty($principle[2]) && $principle[2] =="46"){echo "selected='selected'";}?> value="46" other="">Reflotron</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select class="custom-select" name="instrument[2]" other_id="other_2">
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] ==""){echo "selected='selected'";}?> value="">Choose</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="101"){echo "selected='selected'";}?> value="101" other="">Abbott Architect c Systems</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="102"){echo "selected='selected'";}?> value="102" other="">Audicom AC9000 Series electrolyte analyzer</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="103"){echo "selected='selected'";}?> value="103" other="">Beckman Coulter AU400/480/680/5800</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="104"){echo "selected='selected'";}?> value="104" other="">Beckman Coulter DxC600/ DxC800</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="105"){echo "selected='selected'";}?> value="105" other="">Beckman Coulter DxC700 AU</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="106"){echo "selected='selected'";}?> value="106" other="">Biosystems A15</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="160"){echo "selected='selected'";}?> value="160" other="">Biosystems BA200</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="107"){echo "selected='selected'";}?> value="107" other="">Biosystems BA400</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="157"){echo "selected='selected'";}?> value="157" other="">Biotecnica BT Series</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="108"){echo "selected='selected'";}?> value="108" other="">Caretium XI-921</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="110"){echo "selected='selected'";}?> value="110" other="">Diasys BioMajesty JCA-BM6010/C</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="163"){echo "selected='selected'";}?> value="163" other="">Diasys Respons 920</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="111"){echo "selected='selected'";}?> value="111" other="">Dirui CS Series</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="113"){echo "selected='selected'";}?> value="113" other="">Electa4 analyzer</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="114"){echo "selected='selected'";}?> value="114" other="">Erba XL Series</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="115"){echo "selected='selected'";}?> value="115" other="">Fuji Dri-Chem NX500i</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="156"){echo "selected='selected'";}?> value="156" other="">Furuno CA-800</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="116"){echo "selected='selected'";}?> value="116" other="">GASTAT-1820</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="159"){echo "selected='selected'";}?> value="159" other="">GE300 electrolyte analyzer</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="117"){echo "selected='selected'";}?> value="117" other="">Hitachi 911</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="118"){echo "selected='selected'";}?> value="118" other="">Horiba Pentra 400</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="162"){echo "selected='selected'";}?> value="162" other="">HumaStar 200</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="120"){echo "selected='selected'";}?> value="120" other="">ILab 600/650/Taurus</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="121"){echo "selected='selected'";}?> value="121" other="">In4lyte</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="122"){echo "selected='selected'";}?> value="122" other="">Konelab 20/30/60 / Thermo Indiko</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="123"){echo "selected='selected'";}?> value="123" other="">Mindray BC 2000/3000 series</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="124"){echo "selected='selected'";}?> value="124" other="">Mindray BS Series</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="125"){echo "selected='selected'";}?> value="125" other="">Nova 4 electrolyte analyzer</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="126"){echo "selected='selected'";}?> value="126" other="">Ortho Vitros 250/350</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="127"){echo "selected='selected'";}?> value="127" other="">Ortho Vitros 4600/5600</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="128"){echo "selected='selected'";}?> value="128" other="">PKL PPC 125</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="129"){echo "selected='selected'";}?> value="129" other="">Q4-Lyte</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="155"){echo "selected='selected'";}?> value="155" other="">Q4-LyteEx </option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="130"){echo "selected='selected'";}?> value="130" other="">Randox RX series</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="164"){echo "selected='selected'";}?> value="164" other="">Rayto Chemray 120</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="131"){echo "selected='selected'";}?> value="131" other="">Reflotron</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="132"){echo "selected='selected'";}?> value="132" other="">Roche Cobas c111</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="133"){echo "selected='selected'";}?> value="133" other="">Roche Cobas c311</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="134"){echo "selected='selected'";}?> value="134" other="">Roche Cobas c501/502/503</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="161"){echo "selected='selected'";}?> value="161" other="">Roche Cobas c701/702</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="135"){echo "selected='selected'";}?> value="135" other="">Roche Cobas Integra 400 Plus</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="109"){echo "selected='selected'";}?> value="109" other="">Roche Cobas Mira S</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="136"){echo "selected='selected'";}?> value="136" other="">Rx Modena</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="137"){echo "selected='selected'";}?> value="137" other="">Rx-lyte v.4</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="138"){echo "selected='selected'";}?> value="138" other="">SFRI ISE electrolyte series</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="139"){echo "selected='selected'";}?> value="139" other="">Siemens Advia 1800</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="167"){echo "selected='selected'";}?> value="167" other="">Siemens Atellica Solution</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="140"){echo "selected='selected'";}?> value="140" other="">Siemens Rapidlab 348Ex</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="141"){echo "selected='selected'";}?> value="141" other="">Siemens/Dade Dimension EXL</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="142"){echo "selected='selected'";}?> value="142" other="">Siemens/Dade Dimension RxL /Max/Xpand</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="143"){echo "selected='selected'";}?> value="143" other="">Sinnowa BS-3000</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="144"){echo "selected='selected'";}?> value="144" other="">Sinnowa DS301</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="145"){echo "selected='selected'";}?> value="145" other="">Sysmex BX-3010</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="146"){echo "selected='selected'";}?> value="146" other="">Sysmex BX-4000</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="148"){echo "selected='selected'";}?> value="148" other="">Tecom TC220</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="149"){echo "selected='selected'";}?> value="149" other="">Thermo Fisher Konelab Delta</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="150"){echo "selected='selected'";}?> value="150" other="">Tokyo Boeki/Biolis/ Prestige 24i/TMS 1024</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="158"){echo "selected='selected'";}?> value="158" other="">URIT 8280</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="151"){echo "selected='selected'";}?> value="151" other="">URIT-8031</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="166"){echo "selected='selected'";}?> value="166" other="">URIT-910 Plus</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="152"){echo "selected='selected'";}?> value="152" other="">Vitalab Scientific Flexor E</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="153"){echo "selected='selected'";}?> value="153" other="">XD 687 Electrolyte Analyzer</option>
                                                    <option <?php if(!empty($insrtument[2]) && $instrument[2] =="154"){echo "selected='selected'";}?> value="154" other="">XD 697 Electrolyte Analyzer</option>
                                                </select>
                                            </td>
                                            <td>
                                            <select class="custom-select" name="method[2]" other_id="other_2">
                                                    <option <?php if(!empty($method[2]) && $method[2] ==""){echo "selected='selected'";}?> value="">Choose</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="501"){echo "selected='selected'";}?> value="501" other="">Abbott laboratories</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="502"){echo "selected='selected'";}?> value="502" other="">Beckman Coulter</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="503"){echo "selected='selected'";}?> value="503" other="">BioSystems</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="543"){echo "selected='selected'";}?> value="543" other="">Biotecnica Instruments</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="504"){echo "selected='selected'";}?> value="504" other="">Biozen</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="546"){echo "selected='selected'";}?> value="546" other="">Bt GEN</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="505"){echo "selected='selected'";}?> value="505" other="">Caretium </option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="506"){echo "selected='selected'";}?> value="506" other="">Centronic</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="507"){echo "selected='selected'";}?> value="507" other="">Diamond</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="508"){echo "selected='selected'";}?> value="508" other="">DiaSys</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="509"){echo "selected='selected'";}?> value="509" other="">Diazyme</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="510"){echo "selected='selected'";}?> value="510" other="">Dirui</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="511"){echo "selected='selected'";}?> value="511" other="">Electa</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="512"){echo "selected='selected'";}?> value="512" other="">Elitech</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="513"){echo "selected='selected'";}?> value="513" other="">Erba Lachema</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="514"){echo "selected='selected'";}?> value="514" other="">Fuji</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="515"){echo "selected='selected'";}?> value="515" other="">Furuno</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="544"){echo "selected='selected'";}?> value="544" other="">Genrui Biotech</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="516"){echo "selected='selected'";}?> value="516" other="">Horiba</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="518"){echo "selected='selected'";}?> value="518" other="">I-med</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="517"){echo "selected='selected'";}?> value="517" other="">Iberlab</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="519"){echo "selected='selected'";}?> value="519" other="">Infocus firming</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="520"){echo "selected='selected'";}?> value="520" other="">Instumentation laboratory</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="521"){echo "selected='selected'";}?> value="521" other="">Jiangsu Audicom&nbsp;</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="545"){echo "selected='selected'";}?> value="545" other="">Medica</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="522"){echo "selected='selected'";}?> value="522" other="">Meditop</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="523"){echo "selected='selected'";}?> value="523" other="">Mindray</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="524"){echo "selected='selected'";}?> value="524" other="">Olympus</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="525"){echo "selected='selected'";}?> value="525" other="">Ortho-Clinical Diagnostics</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="526"){echo "selected='selected'";}?> value="526" other="">PCL</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="547"){echo "selected='selected'";}?> value="547" other="">Q4-Lyte</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="548"){echo "selected='selected'";}?> value="548" other="">Q4-LyteEx</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="550"){echo "selected='selected'";}?> value="550" other="">QuantILab</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="527"){echo "selected='selected'";}?> value="527" other="">Randox</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="549"){echo "selected='selected'";}?> value="549" other="">Rayto</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="528"){echo "selected='selected'";}?> value="528" other="">Roche Diagnotics</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="529"){echo "selected='selected'";}?> value="529" other="">SFRI</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="530"){echo "selected='selected'";}?> value="530" other="">Shanghai Xunda</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="531"){echo "selected='selected'";}?> value="531" other="">Siemens</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="532"){echo "selected='selected'";}?> value="532" other="">Slidedrychem</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="533"){echo "selected='selected'";}?> value="533" other="">Spinreact</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="534"){echo "selected='selected'";}?> value="534" other="">Stanbio</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="535"){echo "selected='selected'";}?> value="535" other="">Sysmex</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="536"){echo "selected='selected'";}?> value="536" other="">Techno Medica</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="537"){echo "selected='selected'";}?> value="537" other="">Tecom</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="538"){echo "selected='selected'";}?> value="538" other="">Thermoscientific</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="539"){echo "selected='selected'";}?> value="539" other="">Toyobo</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="540"){echo "selected='selected'";}?> value="540" other="">URIT</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="541"){echo "selected='selected'";}?> value="541" other="">Wako</option>
                                                    <option <?php if(!empty($method[2]) && $method[2] =="542"){echo "selected='selected'";}?> value="542" other="">YD diagnostic</option>
                                                </select>
                                            </td>
                                            <td><?php echo $result_2[2]; ?></td>
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
