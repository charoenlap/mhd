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
    <div class="container container-EQAI_HBV" id="EQAI_HBV">
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
                            <div class="container-fluid">
                                <caption>รายงานผลการทดสอบแบบ qualitative report</caption>
                                <table class="table text-center table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>specimen</th>
                                            <th>HBs Ag</th>
                                            <th>Anti HBs</th>
                                            <th>Anti HBc</th>
                                            <th>HBe Ag</th>
                                            <th>Anti HBe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <?php $x = 1;
                                            $y = 0;
                                            $z = 0; ?>
                                            <?php while ($x <= 5) : ?>

                                                <td>
                                                    <label for="tool[<?php echo $x; ?>]">Method</label>
                                                    <select name="tool[<?php echo $x; ?>]" class="form-control selected check_select_<?php echo $y++; ?> <?php if($tool[$x]!="2"){echo "d-none";} ?>" >
                                                        <option <?php if(!empty($tool[$x]) && $tool[$x]==""){echo "selected";} ?> value="" data-id="">-</option>
                                                        <option <?php if(!empty($tool[$x]) && $tool[$x]=="1"){echo "selected";} ?> value="1" data-id="auto">Automation</option>
                                                        <option <?php if(!empty($tool[$x]) && $tool[$x]=="2"){echo "selected";} ?> value="2" data-id="">Immunochromatography</option>
                                                        <option <?php if(!empty($tool[$x]) && $tool[$x]=="3"){echo "selected";} ?> value="3" data-id="other">Other</option>
                                                    </select>
                                                    <div class="auto" style="display: none;">
                                                        <div class="input-field">
                                                            <span>Automation</span>
                                                            <!--<select name="tool_auto[1]"  cutoff="0" class="browser-default select_show_cutoff"> -->
                                                            <select name="tool_auto[<?php echo $x; ?>]" cutoff="<?php echo $z++; ?>" class="select_show_cutoff form-control">
                                                                <option <?php if(!empty($tool_auto[$x]) && $tool_auto[$x]==""){echo "selected";} ?> value="">Select</option>
                                                                <option <?php if(!empty($tool_auto[$x]) && $tool_auto[$x]=="1"){echo "selected";} ?> value="1" data-id>EIA / ELISA</option>
                                                                <option <?php if(!empty($tool_auto[$x]) && $tool_auto[$x]=="2"){echo "selected";} ?> value="2" data-id>CLIA</option>
                                                                <option <?php if(!empty($tool_auto[$x]) && $tool_auto[$x]=="3"){echo "selected";} ?> value="3" data-id>CMIA</option>
                                                                <option <?php if(!empty($tool_auto[$x]) && $tool_auto[$x]=="4"){echo "selected";} ?> value="4" data-id>E-CLIA</option>
                                                                <option <?php if(!empty($tool_auto[$x]) && $tool_auto[$x]=="5"){echo "selected";} ?> value="5" data-id>FEIA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="other" style="display: none;">
                                                        <div class="input-field">
                                                            <span>Other</span>
                                                            <input type="text" name="tool_other[<?php echo $x; ?>]" value="<?php echo $tool_other[$x]; ?>" class="form-control" disabled>
                                                        </div>
                                                    </div>
                                                </td>
                                                <?php $x++; ?>
                                            <?php endwhile ?>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <?php $x = 1;
                                            $y = 0; ?>
                                            <?php while ($x <= 5) : ?>
                                                <td>
                                                    <span>Instrument/test kit/ Brand</span>
                                                    <input type="text" name="result_1[<?php echo $x; ?>]" value="<?php echo $result_1[$x]; ?>" class="input_check_<?php echo $y++; ?> form-control" disabled>
                                                </td>
                                                <?php $x++; ?>
                                            <?php endwhile ?>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <?php $x = 1; ?>
                                            <?php while ($x <= 5) : ?>
                                                <td>
                                                    <span>Reagent Lot Number </span>
                                                    <input type="text" name="result_2[<?php echo $x; ?>]" value="<?php echo $result_2[$x]; ?>" class="form-control" disabled>
                                                </td>
                                                <?php $x++; ?>
                                            <?php endwhile ?>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <?php $x = 1; ?>
                                            <?php while ($x <= 5) : ?>
                                                <td>
                                                    <span>Catalog number</span>
                                                    <input type="text" name="result_3[<?php echo $x; ?>]" value="<?php echo $result_3[$x]; ?>" class="form-control" disabled>
                                                </td>
                                                <?php $x++; ?>
                                            <?php endwhile ?>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table text-center table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>specimen</th>
                                            <th>HBs Ag</th>
                                            <th>Anti HBs</th>
                                            <th>Anti HBc</th>
                                            <th>HBe Ag</th>
                                            <th>Anti HBe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trial 185</td>
                                            <?php $x = 1;
                                            $y = 0; ?>
                                            <?php while ($x <= 5) : ?>
                                                <td>
                                                    <select name="sample_q_li[0][<?php echo $x; ?>]" id="" class="fixed-select-<?php echo $y++; ?> form-control">
                                                        <option value="">Select</option>
                                                        <option <?php if(!empty($sample_q_li[0][$x]) && $sample_q_li[0][$x]=="1"){echo "selected";} ?> value="1" class="text-danger">Positive</option>
                                                        <option <?php if(!empty($sample_q_li[0][$x]) && $sample_q_li[0][$x]=="2"){echo "selected";} ?> value="2" class="text-success">Weakly Positive</option>
                                                        <option <?php if(!empty($sample_q_li[0][$x]) && $sample_q_li[0][$x]=="3"){echo "selected";} ?> value="3" class="text-primary">Negative</option>
                                                    </select>
                                                </td>
                                                <?php $x++; ?>
                                            <?php endwhile ?>
                                        </tr>
                                        <tr>
                                            <td>Trial 186</td>
                                            <?php $x = 1;
                                            $y = 0; ?>
                                            <?php while ($x <= 5) : ?>
                                                <td>
                                                    <select name="sample_q_li[1][<?php echo $x; ?>]" id="" class="text fixed-select-<?php echo $y++; ?> form-control">
                                                        <option value="">Select</option>
                                                        <option <?php if(!empty($sample_q_li[1][$x]) && $sample_q_li[1][$x]=="1"){echo "selected";} ?> value="1" class="text-danger">Positive</option>
                                                        <option <?php if(!empty($sample_q_li[1][$x]) && $sample_q_li[1][$x]=="2"){echo "selected";} ?> value="2" class="text-success">Weakly Positive</option>
                                                        <option <?php if(!empty($sample_q_li[1][$x]) && $sample_q_li[1][$x]=="3"){echo "selected";} ?> value="3" class="text-primary">Negative</option>
                                                    </select>
                                                </td>
                                                <?php $x++; ?>
                                            <?php endwhile ?>
                                        </tr>
                                    </tbody>
                                </table>
                                <caption>รายงานผลการทดสอบแบบ quantitative report</caption>
                                <table class="table text-center table-hover">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>specimen</th>
                                            <th colspan="2">HBs Ag</th>
                                            <th colspan="2">Anti HBs</th>
                                            <th class="bg-white border-0"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <span>Automation Principle</span>
                                                <select name="tool_auto2[5][1]" cutoff="4" class="form-control">
                                                    <option value="">Select</option>
                                                    <option <?php if(!empty($tool_auto2[5][1]) && $tool_auto2[5][1]=="1"){echo "selected";} ?> value="1" data-id="">EIA / ELISA</option>
                                                    <option <?php if(!empty($tool_auto2[5][1]) && $tool_auto2[5][1]=="2"){echo "selected";} ?> value="2" data-id="">CLIA</option>
                                                    <option <?php if(!empty($tool_auto2[5][1]) && $tool_auto2[5][1]=="3"){echo "selected";} ?> value="3" data-id="">CMIA</option>
                                                    <option <?php if(!empty($tool_auto2[5][1]) && $tool_auto2[5][1]=="4"){echo "selected";} ?> value="4" data-id="">E-CLIA</option>
                                                    <option <?php if(!empty($tool_auto2[5][1]) && $tool_auto2[5][1]=="5"){echo "selected";} ?> value="5" data-id="">FEIA</option>
                                                </select>
                                            </td>
                                            <td colspan="2">
                                                <span>Automation Principle</span>
                                                <select name="tool_auto2[5][2]" cutoff="4" class="form-control">
                                                    <option value="">Select</option>
                                                    <option <?php if(!empty($tool_auto2[5][2]) && $tool_auto2[5][2]=="1"){echo "selected";} ?> value="1" data-id="">EIA / ELISA</option>
                                                    <option <?php if(!empty($tool_auto2[5][2]) && $tool_auto2[5][2]=="2"){echo "selected";} ?> value="2" data-id="">CLIA</option>
                                                    <option <?php if(!empty($tool_auto2[5][2]) && $tool_auto2[5][2]=="3"){echo "selected";} ?> value="3" data-id="">CMIA</option>
                                                    <option <?php if(!empty($tool_auto2[5][2]) && $tool_auto2[5][2]=="4"){echo "selected";} ?> value="4" data-id="">E-CLIA</option>
                                                    <option <?php if(!empty($tool_auto2[5][2]) && $tool_auto2[5][2]=="5"){echo "selected";} ?> value="5" data-id="">FEIA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <span>Instrument/test kit/ Brand</span>
                                                <input type="text" class="form-control" name="tool_reagent[5][1]" value="<?php echo $tool_reagent[5][1]; ?>" disabled>
                                            </td>
                                            <td colspan="2">
                                                <span>Instrument/test kit/ Brand</span>
                                                <input type="text" class="form-control" name="tool_reagent[5][2]" value="<?php echo $tool_reagent[5][2]; ?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <span>Reagent Lot Number</span>
                                                <input type="text" class="form-control" name="tool_lot[5][1]" value="<?php echo $tool_lot[5][1]; ?>" disabled>
                                            </td>
                                            <td colspan="2">
                                                <span>Reagent Lot Number</span>
                                                <input type="text" class="form-control" name="tool_lot[5][2]" value="<?php echo $tool_lot[5][2]; ?>" disabled>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td colspan="2">
                                                <span>Catalog number</span>
                                                <input type="text" class="form-control" name="tool_catalog[5][1]" value="<?php echo $tool_catalog[5][1]; ?>" disabled>
                                            </td>
                                            <td colspan="2">
                                                <span>Catalog number</span>
                                                <input type="text" class="form-control" name="tool_catalog[5][2]" value="<?php echo $tool_catalog[5][2]; ?>" disabled>
                                            </td>
                                        </tr>
                                        <thead class="bg-primary text-white font-weight-bold">
                                            <tr>
                                                <th>specimen</th>
                                                <th></th>
                                                <th>HBs Ag (IU/ml)</th>
                                                <th></th>
                                                <th>HBsAg (S/CO,COI,Index) <br> กรอกช่องนี้และลงผล Qualitative ด้านบน</th>
                                                <th></th>
                                                <th>Anti HBs (mlU/ml,IU/L)</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <tr>
                                            <td>Trial 185</td>
                                            <td style="width: 100px;"><select class="form-control" name="symbol[0][1]">
                                                    <option <?php if(!empty($symbol[0][1]) && $symbol[0][1]==""){echo "selected='selected'";} ?> value=""></option>
                                                    <option <?php if(!empty($symbol[0][1]) && $symbol[0][1]=="<"){echo "selected='selected'";} ?> value="<">&lt;</option>
                                                    <option <?php if(!empty($symbol[0][1]) && $symbol[0][1]==">"){echo "selected='selected'";} ?> value=">">&gt;</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control fixed-select2-1" name="tool_specimen_hbs[0][1]" value= "<?php echo $tool_specimen_hbs[0][1]; ?>" disabled></td>
                                            <td style="width: 100px;">
                                                <select class="form-control" name="symbol_new[0]">
                                                    <option <?php if(!empty($symbol_new[0]) && $symbol_new[0]==""){echo "selected='selected'";} ?> value=""></option>
                                                    <option <?php if(!empty($symbol_new[0]) && $symbol_new[0]=="<"){echo "selected='selected'";} ?> value="<">&lt;</option>
                                                    <option <?php if(!empty($symbol_new[0]) && $symbol_new[0]==">"){echo "selected='selected'";} ?> value=">">&gt;</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control fixed-select2-3" name="tool_specimen_hbs_new[0]" value= "<?php echo $tool_specimen_hbs_new[0]; ?>" disabled></td>
                                            <td style="width: 100px;">
                                                <select class="form-control" name="symbol[0][2]">
                                                    <option <?php if(!empty($symbol[0][2]) && $symbol[0][2]==""){echo "selected='selected'";} ?> value=""></option>
                                                    <option <?php if(!empty($symbol[0][2]) && $symbol[0][2]=="<"){echo "selected='selected'";} ?> value="<">&lt;</option>
                                                    <option <?php if(!empty($symbol[0][2]) && $symbol[0][2]==">"){echo "selected='selected'";} ?> value=">">&gt;</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control fixed-select2-2" name="tool_specimen_hbs[0][2]" required="required" value= "<?php echo $tool_specimen_hbs[0][2]; ?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <td>Trial 186</td>
                                            <td style="width: 100px;"><select class="form-control" name="symbol[1][1]">
                                                    <option <?php if(!empty($symbol[1][1]) && $symbol[1][1]==""){echo "selected='selected'";} ?> value=""></option>
                                                    <option <?php if(!empty($symbol[1][1]) && $symbol[1][1]=="<"){echo "selected='selected'";} ?> value="<">&lt;</option>
                                                    <option <?php if(!empty($symbol[1][1]) && $symbol[1][1]==">"){echo "selected='selected'";} ?> value=">">&gt;</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control fixed-select2-1" name="tool_specimen_hbs[1][1]" value= "<?php echo $tool_specimen_hbs[1][1]; ?>" disabled></td>
                                            <td style="width: 100px;">
                                                <select class="form-control" name="symbol_new[1]">
                                                    <option <?php if(!empty($symbol_new[1]) && $symbol_new[1]==""){echo "selected='selected'";} ?> value=""></option>
                                                    <option <?php if(!empty($symbol_new[1]) && $symbol_new[1]=="<"){echo "selected='selected'";} ?> value="<">&lt;</option>
                                                    <option <?php if(!empty($symbol_new[1]) && $symbol_new[1]==">"){echo "selected='selected'";} ?> value=">">&gt;</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control fixed-select2-3" name="tool_specimen_hbs_new[1]" value= "<?php echo $tool_specimen_hbs_new[1]; ?>" disabled></td>
                                            <td style="width: 100px;">
                                                <select class="form-control" name="symbol[1][2]">
                                                    <option <?php if(!empty($symbol[1][2]) && $symbol[1][2]==""){echo "selected='selected'";} ?> value=""></option>
                                                    <option <?php if(!empty($symbol[1][2]) && $symbol[1][2]=="<"){echo "selected='selected'";} ?> value="<">&lt;</option>
                                                    <option <?php if(!empty($symbol[1][2]) && $symbol[1][2]==">"){echo "selected='selected'";} ?> value=">">&gt;</option>
                                                </select>
                                            </td>
                                            <td><input type="text" class="form-control fixed-select2-2" name="tool_specimen_hbs[1][2]" required="required" value= "<?php echo $tool_specimen_hbs[1][2]; ?>" disabled></td>
                                        </tr>
                                    </tbody>
                                    </tbody>
                                </table>
                            </div>
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
        appearance: none;
    }
</style>
<script>

$(document).ready(function () {
        // select();
        $(".selected").on('change', function(event) {
            // select();
            // $(this).parents('.row').find('.other .input-field input').val("");
            
            var option = $('option:selected', this).attr('data-id');
            console.log(option);
            
            if (option == 'other') {
                $(this).parent().find('.other').show();
                $(this).parent().find('.auto').hide();
                // $(this).parent().find('.select_show_cutoff').removeAttr('required');
                $(this).parent().find('.other .input-field input').attr('required', 'required');
            } else if(option == 'auto') {
                $(this).parent().find('.auto').show();
                $(this).parent().find('.other').hide();
                $(this).parent().find('.other .input-field input').val("");
                $(this).parent().find('.select_show_cutoff').attr('required', 'required');

            } else {
                $(this).parent().find('.auto').hide();
                $(this).parent().find('.other').hide();

                $(this).parent().find('.other .input-field input').val("");
                $(this).parent().find('.select_show_cutoff').removeAttr('required');
                $(this).parent().find('.other .input-field input').removeAttr('required')
            }
        });

        function show_cutoff($this) {
            var cutoff = $this.attr('cutoff');
            var auto_name = $this.find('option:selected').text()
            console.log(cutoff)
            console.log(auto_name)
            $('#cutoff_automation_'+cutoff).text(auto_name);
        }

        $('.select_show_cutoff').each(function(index, el) {
            show_cutoff($(this))
        });

        $(".select_show_cutoff").on('change', function(event) {
            show_cutoff($(this))
        });
    });

        $(document).ready(function() {
        $('.check_select_0').change(function(event) {
            if($(this).val() == 0){
                $('.input_check_0').removeAttr("required");
            }else {
                $('.input_check_0').attr("required","required");
            }
        }).trigger("change");
    });
        $(document).ready(function() {
        $('.check_select_1').change(function(event) {
            if($(this).val() == 0){
                $('.input_check_1').removeAttr("required");
            }else {
                $('.input_check_1').attr("required","required");
            }
        }).trigger("change");
    });
        $(document).ready(function() {
        $('.check_select_2').change(function(event) {
            if($(this).val() == 0){
                $('.input_check_2').removeAttr("required");
            }else {
                $('.input_check_2').attr("required","required");
            }
        }).trigger("change");
    });
        $(document).ready(function() {
        $('.check_select_3').change(function(event) {
            if($(this).val() == 0){
                $('.input_check_3').removeAttr("required");
            }else {
                $('.input_check_3').attr("required","required");
            }
        }).trigger("change");
    });
        $(document).ready(function() {
        $('.check_select_4').change(function(event) {
            if($(this).val() == 0){
                $('.input_check_4').removeAttr("required");
            }else {
                $('.input_check_4').attr("required","required");
            }
        }).trigger("change");
    });
            $(document).ready(function() {
        $('.check_select2_1').change(function(event) {
            if($(this).val() == 0){
                $('.input_check2_1').removeAttr("required");
                $('.fixed-select2-2').removeAttr("required","required")
            }else {
                $('.input_check2_1').attr("required","required");
                $('.fixed-select2-2').attr("required","required");
            }
        }).trigger("change");
    });
        $(document).ready(function() {
        $('.check_select2_2').change(function(event) {
            if($(this).val() == 0){
                $('.input_check2_2').removeAttr("required");
                $('.fixed-select2-2').removeAttr("required","required")
            }else {
                $('.input_check2_2').attr("required","required");
                $('.fixed-select2-2').attr("required","required");
            }
        }).trigger("change");
    });
    $(document).ready(function() {
	   $('.fixed-color').change(function() {
	      var current = $(this).val();
	      if (current == '1') {
          	$(this).addClass('text-danger');
	      }else if(current == '2') {
          	$(this).css('class','text-success');
	      }else if(current == '3') {
	      	$(this).css('class','text-primary');
	      }
		  var current = $(this).val();
	   }); 
	});

</script>