<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div>
<div class="container-fluid">
    <caption>รายงานผลการทดสอบแบบ qualitative report</caption>
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>specimen</th>
                <?php foreach ($infections as $infection) : ?>
                <th class="text-center"><?php echo $infection->name;?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <?php foreach ($infections as $key_infect => $infection) : ?>
                <td class="text-left">
                    <label for="tool[<?php echo $infection->code; ?>]">Method</label>
                    <select name="tool[<?php echo $infection->code; ?>]" class="form-control selected check_select_<?php echo $key_infect; ?>" >
                        <option value="">Select</option>
                        <?php foreach($tools_sec1 as $tool): ?>
                        <option value="<?php echo $tool->code;?>" data-id="<?php echo $tool->other;?>"><?php echo $tool->name;?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="auto" style="display: none;">
                        <div class="input-field">
                            <span>Automation</span>
                            <select name="tool_auto[<?php echo $infection->code; ?>]" cutoff="<?php echo $infection->code; ?>" class="select_show_cutoff form-control">
                                <option value="">Select</option>
                                <?php foreach ($tools_auto as $tool): ?>
                                <option value="<?php echo $tool->code;?>" data-id="<?php echo $tool->other;?>"><?php echo $tool->name;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="other" style="display: none;">
                        <div class="input-field">
                            <span>Other</span>
                            <input type="text" name="tool_other[<?php echo $infection->code; ?>]" value class="form-control">
                        </div>
                    </div>
                </td>
                <?php endforeach; ?>

            </tr>
            <tr>
                <td></td>
                <?php foreach ($infections as $key_infect => $infection) : ?>
                <td class="text-left">
                    <span>Instrument/test kit/ Brand</span>
                    <input type="text" name="result_1[<?php echo $infection->code; ?>]" value="" class="input_check_<?php echo $key_infect; ?> form-control">
                </td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td></td>
                <?php foreach ($infections as $infection) : ?>
                <td class="text-left">
                    <span>Reagent Lot Number</span>
                    <input type="text" name="result_2[<?php echo $infection->code; ?>]" value="" class="form-control">
                </td>
                <?php endforeach; ?>
            </tr>
            <tr>
                <td></td>
                <?php foreach ($infections as $infection) : ?>
                <td class="text-left">
                    <span>Catalog number</span>
                    <input type="text" name="result_3[<?php echo $infection->code; ?>]" value="" class="form-control">
                </td>
                <?php endforeach; ?>
            </tr>
        </tbody>
    </table>
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>specimen</th>
                <?php foreach ($infections as $infection) : ?>
                <th class="text-left"><?php echo $infection->name;?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specimens as $specimen): ?>
            <tr>
                <td class="text-left"><?php echo $specimen->name;?></td>
                <?php foreach ($infections as $infection) : ?>
                <td>
                    <select name="sample_q_li[<?php echo $specimen->id;?>][<?php echo $infection->code; ?>]" id="" class="fixed-color fixed-select-<?php echo $infection->code; ?> form-control">
                        <option value="">Select</option>
                        <?php foreach($tools_sec2 as $key => $tool): ?>
                        <option value="<?php echo $tool->code;?>" class="fixed-color<?php echo $key++;?>"><?php echo $tool->name;?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <?php endforeach; ?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <caption>รายงานผลการทดสอบแบบ quantitative report</caption>
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th>specimen</th>
                <th colspan="2" style="width:25%;">HBs Ag</th>
                <th colspan="2" style="width:25%;">Anti HBs</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <?php for ($i=1;$i<=2;$i++) { ?>
                <td colspan="2">
                    <span>Automation Principle</span>
                    <select name="tool_auto2[5][<?php echo $i;?>]" cutoff="4" class="form-control check_select2_<?php echo $i;?>" data-class=".checkempty<?php echo $i;?>">
                        <option value="">Select</option>
                        <?php foreach ($tools_auto as $tool) : ?>
                        <option value="<?php echo $tool->code;?>" data-id="<?php echo $tool->other;?>"><?php echo $tool->name;?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <?php } ?>
            </tr>
            <tr>
                <td></td>
                <?php for ($i=1;$i<=2;$i++) { ?>
                <td colspan="2">
                    <span>Instrument/test kit/ Brand</span>
                    <input type="text" class="form-control" name="tool_reagent[5][<?php echo $i;?>]">
                </td>
                <?php } ?>
            </tr>
            <tr>
                <td></td>
                <?php for ($i=1;$i<=2;$i++) { ?>
                <td colspan="2">
                    <span>Reagent Lot Number</span>
                    <input type="text" class="form-control" name="tool_lot[5][<?php echo $i;?>]">
                </td>
                <?php } ?>
            </tr>
            <tr>
                <td></td>
                <?php for ($i=1;$i<=2;$i++) { ?>
                <td colspan="2">
                    <span>Catalog number</span>
                    <input type="text" class="form-control" name="tool_catalog[5][<?php echo $i;?>]">
                </td>
                <?php } ?>
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
            <?php foreach ($specimens as $key_specimen => $specimen): ?>
            <tr>
                <td><?php echo $specimen->name;?></td>
                <td style="width:10%;">
                <select class="form-control" name="symbol[<?php echo $key_specimen;?>][1]">
                        <option value="" selected=""></option>
                        <option value="<">&lt;</option>
                        <option value=">">&gt;</option>
                    </select>
                </td>
                <td><input type="number" class="form-control inputcheckempty checkempty1" data-class=".checkempty1" name="tool_specimen_hbs[<?php echo $key_specimen;?>][1]"></td>
                <td style="width:10%;">
                <select class="form-control" name="symbol_new[<?php echo $key_specimen;?>]">
                        <option value="" selected=""></option>
                        <option value="<">&lt;</option>
                        <option value=">">&gt;</option>
                    </select>
                </td>
                <td><input type="number" class="form-control inputcheckempty checkempty1" data-class=".checkempty1" name="tool_specimen_hbs_new[<?php echo $key_specimen;?>]"></td>
                <td style="width:10%;">
                <select class="form-control" name="symbol[<?php echo $key_specimen;?>][2]">
                        <option value="" selected=""></option>
                        <option value="<">&lt;</option>
                        <option value=">">&gt;</option>
                    </select>
                </td>
                <td><input type="number" class="form-control inputcheckempty checkempty2" data-class=".checkempty2" name="tool_specimen_hbs[<?php echo $key_specimen;?>][2]"></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </tbody>
    </table>
</div>
<div class="font-weight-bold" style="padding-top: 30px; padding-bottom: 10px;"> ข้อมูลผู้ส่ง </div>
<div class="form-row">
    <div class="form-group col-md-5">
        <label for="name_lname">ชื่อ</label>
        <input type="text" class="form-control" id="name_lname" name="name_lname" placeholder="ชื่อ">
    </div>
    <div class="form-group col-md-3">
        <label for="tel">หมายเลขโทรศัพท์</label>
        <input type="text" class="form-control" id="tel" name="tel" placeholder="หมายเลขโทรศัพท์">
    </div>
    <div class="form-group col-md-4">
        <label for="position">ตำแหน่ง</label>
        <input type="text" class="form-control" id="position" name="position" placeholder="ตำแหน่ง">
    </div>
</div>
<div class="font-weight-bold" style="padding-top: 30px;">
    <label for="comment">ข้อคิดเห็นหรือเสนอแนะเพื่อการพัฒนาปรับปรุง </label>
    <textarea class="form-control" id="comment" name="comment" placeholder="ความคิดเห็นเพิ่มเติม"></textarea>
</div>
<div class="font-weight-bold container-left" style="padding-top: 30px;">
    <label for="report_date">วันที่ทำการทดสอบ </label>
    <input type="date" class="form-control" style="width: 180px;" id="report_date" name="report_date" value="<?php echo date('Y-m-d'); ?>" ></input>
</div>
<div class="form-gruop text-center" style="margin-top: 30px;">
    <button class="btn btn-primary" onclick="window.print()" name="printPageButton" id="printPageButton" name="printPageButton">พิมพ์</button>
    <a href="#" class="btn btn-primary" id="btnpreview" name="btnpreview">พรีวิว</a>
    <button type="submit" id="submit" class="btn btn-primary">ยืนยันการส่งผลการตรวจ</button>
</div>
</div>


<script type="text/javascript">
$(document).ready(function () {

    // init data
    const select_method = $('.selected')
    const select_color = $('.fixed-color')
    const select_hb = $('.check_select2_1')
    const select_antihb = $('.check_select2_2')
    const input_empty = $('.inputcheckempty')

    const fixColor = {1:'red', 2:'green', 3:'blue'}; // 0 black , 1 red, 2 green , 3 blue


    // Method
    const setShowInputAutoAndInputOther = (thiselement, attr) => {
        let eleauto = $(thiselement).parent('td').children('.auto')
        let eleautoSelect = eleauto.children('div').children('select')

        let eleother = $(thiselement).parent('td').children('.other')
        let eleautoInput = eleother.children('div').children('input')

        eleauto.hide();
        eleautoSelect.removeAttr('required');

        eleother.hide();
        eleautoInput.removeAttr('required');

        if (attr === 'auto') {
            eleauto.show();
            eleautoSelect.attr('required','required');
        }
        else if (attr == 'other') {
            eleother.show();
            eleautoInput.attr('required','required');
        }
    }

    const setRequiredInputText = (thiselement, value) => {
        if (value.length > 0) {
            $(thiselement).parent('td').parent('tr').next('tr').children('td:eq(1)').children('input').attr('required','required');
        } else {
            $(thiselement).parent('td').parent('tr').next('tr').children('td:eq(1)').children('input').removeAttr('required');
        }
    }
    
    const setColorSelect = (thiselement, thisvalue) => {
        let thiscolor = typeof fixColor[thisvalue] !== 'undefined' ? fixColor[thisvalue] : '#333';
        $(thiselement).css('color', thiscolor);
    }




    const mainCondition = (selectElement) => {
        let specClass = $(selectElement).data('class');
        let response1 = setConditionHBsIsSelected(selectElement);
        let response2 = setConditionSpecHasValue(specClass);

        if (response1===true) {
            requiredInputInstrument(selectElement, true);
            if (setConditionSpecHasValue(specClass)==false) {
                requiredHBs(specClass,true);
                requiredHBs(selectElement,false);
            } else {
                requiredHBs(specClass,false);
                requiredHBs(selectElement,true);
            }
        } else {
            if (setConditionSpecHasValue(specClass)==false) {
                requiredHBs(specClass,false);
                requiredHBs(selectElement,false);
                requiredInputInstrument(selectElement, false);
            } else {
                requiredHBs(selectElement,true);
                requiredInputInstrument(selectElement, true);
            }
        }
    }
    const setConditionHBsIsSelected = (selectElement) => {
        let thisvalue = $(selectElement).val();
        let isRequired = (thisvalue.length>0)

        return isRequired;
    }

    const setConditionSpecHasValue = (className) => {
        let someoneHasValue = false;
        $(className).each(function (index, element) {
            if ($(element).val().length>0) {
                someoneHasValue = true;
            }
        });
        return someoneHasValue;
    }

    // set required
    const requiredInputInstrument = (selectElement, isRequired=false) => {
        const indexOfTd = $(selectElement).parent('td').index();
        // condition check input "Instrument/test kit/ Brand" is need required or not
        const inputInstrument = $(selectElement).parent('td').parent('tr').next('tr').children('td:eq('+indexOfTd+')').children('input')
        if (isRequired) {
            inputInstrument.attr('required','required');
        } else {
            inputInstrument.removeAttr('required');
        }
    }
    const requiredHBs = (selectElement, isRequired=false) => {
        if (isRequired){
            $(selectElement).attr('required','required');
        } else {
            $(selectElement).removeAttr('required');
        }
    }

    // Event
    select_method.change(function(e) {
        e.preventDefault();
        let option_value = $(this).val();
        let attribute_value = $(this).children('option[value="'+option_value+'"]').data('id');

        setShowInputAutoAndInputOther(this, attribute_value);
        setRequiredInputText(this, option_value);
    });

    select_color.change(function(e) {
        e.preventDefault();
        setColorSelect(this, $(this).val());
    });


    select_hb.change(function(e) { 
        mainCondition(this);
    });
    select_antihb.change(function(e) {
        mainCondition(this);
    });

    input_empty.keyup(function (e) { 
        let thisclass = $(this).data('class');
        let mainelement = $('select[data-class="'+thisclass+'"]')
        mainCondition(mainelement);
    });


});
</script>

<!-- 
<script>
    $(document).ready(function () {
        // select();
        $(".selected").on('change', function(event) {
            // select();
            // $(this).parents('.row').find('.other .input-field input').val("");
            
            var option = $('option:selected', this).attr('data-id');
            console.log(option);
            
            if (option == 'other') {
                $(this).parent().parent().parent().find('.other').show();
                $(this).parent().parent().parent().find('.auto').hide();
                // $(this).parent().parent().parent().find('.select_show_cutoff').removeAttr('required');
                $(this).parent().parent().parent().find('.other .input-field input').attr('required', 'required');
            } else if(option == 'auto') {
                $(this).parent().parent().parent().find('.auto').show();
                $(this).parent().parent().parent().find('.other').hide();
                $(this).parent().parent().parent().find('.other .input-field input').val("");
                $(this).parent().parent().parent().find('.select_show_cutoff').attr('required', 'required');

            } else {
                $(this).parent().parent().parent().find('.auto').hide();
                $(this).parent().parent().parent().find('.other').hide();

                $(this).parent().parent().parent().find('.other .input-field input').val("");
                $(this).parent().parent().parent().find('.select_show_cutoff').removeAttr('required');
                $(this).parent().parent().parent().find('.other .input-field input').removeAttr('required')
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

    <?php for ($i=0; $i <=4; $i++) { ?>
    $(document).ready(function() {
        $('.check_select_<?php echo $i; ?>').change(function(event) {
            if($(this).val() == 0){
                $('.input_check_<?php echo $i; ?>').removeAttr("required");
            }else {
                $('.input_check_<?php echo $i; ?>').attr("required","required");
            }
        }).trigger("change");
    });
    <?php } ?>


    $(document).ready(function() {
        $('.check_select2_1').change(function(event) {
            if($(this).val() == 0){
                $('.input_check2_1').removeAttr("required");
                $('.fixed-select2-1').removeAttr("required","required");
                $('.fixed-select2-3').removeAttr("required","required");
            }else {
                $('.input_check2_1').attr("required","required");
                $('.fixed-select2-1').attr("required","required");
                $('.fixed-select2-3').attr("required","required");
            }
        }).trigger("change");
    });

    <?php for ($i=1; $i <=2; $i++) { ?>
    $(document).ready(function() {
        $('.check_select2_2').change(function(event) {
            if($(this).val()== 0){
                $('.input_check2_2').removeAttr("required");
                $('.fixed-select2-2').removeAttr("required","required")
            }else {
                $('.input_check2_2').attr("required","required");

                let pass = false;
                $('.fixed-select2-2').each(function(index, el) {
                    if ($(el).val().length>0) {
                        pass = true;
                    }
                });

                if (!pass) {
                    $('.fixed-select2-2').attr("required","required");
                }
            }
        }).trigger("change");
    });
    <?php } ?>


    $(document).ready(function() {
	   $('.fixed-color').change(function() {
	      var current = $(this).val();
	      if (current == '1') {
          	$(this).css('color','red');
	      }else if(current == '2') {
          	$(this).css('color','green');
	      }else if(current == '3') {
	      	$(this).css('color','blue');
	      }
		  var current = $(this).val();
	   }); 
	});
</script>

<script type="text/javascript">
    <?php for ($i=0; $i <=4; $i++) { ?>
    jQuery(document).ready(function($) {
        function checkValue() {
            var allzero = true;
            $('.fixed-select-<?php echo $i; ?>').each(function(e){
            if ( $(this).val() > 0 ) {
                allzero = false;
            }
          });
          return allzero;
        }
        $('.fixed-select-<?php echo $i; ?>').change(function(e){
          if ( checkValue() == true ) {
            // console.log('= 0 ทั้งหมด');
            $('.check_select_<?php echo $i; ?>').removeAttr("required");
          } else {
            // console.log('>0 บางตัว');
            $('.check_select_<?php echo $i; ?>').attr("required","required");
          }
        });
    });    
    <?php } ?> 

    jQuery(document).ready(function($) {
        function checkInput() {
            var allinput = true;
            $('.fixed-select2-2').each(function(e){
            if ( $(this).val().length>0) {
                allinput = false;
            } 
          });
          return allinput;
        }
        $('.fixed-select2-2').keyup(function(e){
          if ( checkInput() == true ) {
            $('.check_select2_2').removeAttr("required");
          } else {
            $('.check_select2_2').attr("required","required");
          }
        });
    });    
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.checkempty').keyup(function(event) {
            let pass = false;
            $('.checkempty').each((e) => {
                if ($(e).val().length>0) {
                    pass = true;
                }
            });
            if (pass) {
                $('.checkempty').removeAttr("required","required");
            } else {
                $('.checkempty').attr("required","required");
            }
        });
        $('.checkempty2').keyup(function(event) {
            if($(this).val().length > 0){
                $('.checkempty2').removeAttr("required","required");
            }else{
                $('.checkempty2').attr("required","required");
            }
        });
    });
</script>
-- >

