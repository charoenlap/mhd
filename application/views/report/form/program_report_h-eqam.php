<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
<div class="cols12 container-fluid">
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">รหัสเซลล์</th>
                <th scope="col">Cell Types</th>
                <?php foreach ($specimens as $specimen) :?>
                <th scope="col"><?php echo $specimen->name;?> (%)</th>
                <?php endforeach; ?>
            </tr>
        <tbody>
            <?php foreach($infections_sec1 as $key => $infection): ?>
            <?php if ($infection->code==16) : ?>
            <tr>
                <td colspan="2">Total</td>
                <td><input type="number" step="0" amount_attr="0" class="amount_cal form-control" name="sum_sec1[][<?php echo $infection->id;?>]" ></td>
                <td><input type="number" step="0" amount_attr="1" class="amount_cal form-control" name="sum_sec1[][<?php echo $infection->id;?>]" ></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td><?php echo $infection->code;?></td>
                <td><?php echo $infection->name;?></td>
                <td><input type="number" step="0" amount_attr="0" class="amount_cal form-control" name="sample[][<?php echo $infection->id;?>]" ></td>
                <td><input type="number" step="0" amount_attr="1" class="amount_cal form-control" name="sample[][<?php echo $infection->id;?>]" ></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <caption>Abnormal WBC เลือกเฉพาะเซลล์หรือความผิดปกติที่ตรวจพบเท่านั้น</caption>
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">รหัสเซลล์</th>
                <th scope="col">Cell Types</th>
                <?php foreach ($specimens as $specimen) :?>
                <th scope="col"><?php echo $specimen->name;?> (Found)</th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($infections_sec2 as $key => $infection): ?>
            <tr>
                <td><?php echo $infection->code;?></td>
                <td><?php echo $infection->name;?></td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" name="sample[][<?php echo $infection->id;?>]" type="checkbox" value="1" id="test_0_sec_2_<?php echo $infection->id;?>">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" name="sample[][<?php echo $infection->id;?>]" type="checkbox" value="1" id="test_1_sec_2_<?php echo $infection->id;?>">
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            
        </tbody>
    </table>
    <caption>การรายงานรูปร่าง RBC และการ grading</caption>
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th></th>
                <th></th>
                <?php foreach ($specimens as $specimen) :?>
                <th colspan="5"><?php echo $specimen->name;?></th>
                <th></th>
                <?php endforeach;?>
            </tr>
            <tr>
                <th>รหัสเซลล์</th>
                <th>Cell Types</th>
                <?php foreach ($specimens as $specimen) :?>
                <th>Few</th>
                <th>1+</th>
                <th>2+</th>
                <th>3+</th>
                <th>4+</th>
                <th></th>
                <?php endforeach;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infections_sec3 as $infection): ?>
            <tr>
                <td><?php echo $infection->code;?></td>
                <td><?php echo $infection->name;?></td>

                <?php foreach ($specimens as $specimen) :?>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sample[][<?php echo $infection->id;?>]" id="radio_0_sec_3_1_6" value="0.5">                                                        
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sample[][<?php echo $infection->id;?>]" id="radio_0_sec_3_2_6" value="1">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sample[][<?php echo $infection->id;?>]" id="radio_0_sec_3_3_6" value="2">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sample[][<?php echo $infection->id;?>]" id="radio_0_sec_3_4_6" value="3">
                    </div>
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="sample[][<?php echo $infection->id;?>]" id="radio_0_sec_3_5_6" value="4">
                    </div>
                    <!-- second check -->
                    <th class="bg-primary"></th>
                </td>
                <?php endforeach;?>
            </tr>
            <?php endforeach; ?>
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
                <?php foreach ($specimens as $specimen) :?>
                <th scope="col"><?php echo $specimen->name;?> (Found)</th>
                <?php endforeach;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infections_sec4 as $infection): ?>
                <?php if ($infection->other==1) : ?>
                <tr>
                    <td><?php echo $infection->code;?></td>
                    <td><?php echo $infection->name;?></td>
                    <?php foreach ($specimens as $specimen) : ?>
                    <td>
                        <div class="form-check">
                            <input class="form-control" name="sample[][<?php echo $infection->id;?>]" type="text" id="" >
                        </div>
                    </td>
                    <?php endforeach;?>
                </tr>
                <?php else: ?>
                <tr>
                    <td><?php echo $infection->code;?></td>
                    <td><?php echo $infection->name;?></td>
                    <?php foreach ($specimens as $specimen) :?>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" name="sample[][<?php echo $infection->id;?>]" type="checkbox" value="1" id="">
                        </div>
                    </td>
                    <?php endforeach;?>
                </tr>
                <?php endif;?>
            <?php endforeach;?>
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
                <?php foreach ($specimens as $specimen) : ?>
                <th><?php echo $specimen->name;?></th>
                <th></th>
                <?php endforeach;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infections_sec5 as $infection): ?>
            <tr>
                <td><?php echo $infection->code;?></td>
                <td><?php echo $infection->name;?></td>
                <?php foreach ($specimens as $specimen) : ?>
                <td>
                    <select class="custom-select" name="sample[][<?php echo $infection->id;?>]">
                        <option value="1">decrease</option>
                        <option value="2">adequate</option>
                        <option value="3">increase</option>
                    </select>
                </td>
                <th class="bg-primary"></th>
                <?php endforeach;?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="padding: 10px;"></div>
    <caption>Abnormal Platelet</caption>
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">รหัสเซลล์</th>
                <th scope="col">Cell Types</th>
                <?php foreach ($specimens as $specimen) : ?>
                <th scope="col"><?php echo $specimen->name;?> (Found)</th>
                <?php endforeach;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($infections_sec6 as $infection): ?>
            <?php if($infection->other==1) :?>
            <tr>
                <td><?php echo $infection->code;?></td>
                <td><?php echo $infection->name;?></td>
                <?php foreach ($specimens as $specimen) : ?>
                <td>
                    <input class="form-control" name="sample[][<?php echo $infection->id;?>]" type="text" value="" id="">
                </td>
                <?php endforeach;?>
            </tr>
            <?php else: ?>
            <tr>
                <td><?php echo $infection->code;?></td>
                <td><?php echo $infection->name;?></td>
                <?php foreach ($specimens as $specimen) : ?>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" name="sample[][<?php echo $infection->id;?>]" type="checkbox" value="1" id="">
                    </div>
                </td>
                <?php endforeach;?>
            </tr>
            <?php endif;?> 
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- file upload -->
    <div class="row justify-content-between">
        <div class="page-title" style="padding-top: 20px; padding-bottom: 20px;">อัพโหลดไฟล์</div>
        <div class="input-group">
            <div class="col px-md-5">
                <div class="custom-file">
                    <label class="custom-file-label" for="file_0">Upload one file</label>
                    <input type="file" class="custom-file-input" id="file_0" name="file_0">
                </div>
            </div>
            <div class="col px-md-5">
                <div class="custom-file">
                    <label class="custom-file-label" for="file_1">Upload one file</label>
                    <input type="file" class="custom-file-input" id="file_1" name="file_1">
                </div>
            </div>
        </div>
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
    <div class="form-gruop text-center">
    <input class="btn btn-primary" type="button" onclick="window.print()" name="printPageButton" id="printPageButton" name="printPageButton" value="พิมพ์" style="width: 60px;"></input>
    <button class="btn btn-primary" name="submit" type="submit" value="preview" id="btnpreview" >พรีวิว</button>
    <button class="btn btn-primary" name="submit" type="submit" value="accept" id="btnsubmit" >ยืนยันการส่งผลการตรวจ</button>
    </div>
</div>
</div>
                        
<script>
    $('#file_0').on("change", function() {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_0')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file);

    });
    $('#file_1').on("change", function() {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_1')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file);

    });

        $(document).on('keyup', '.amount_cal', function(event) {
            $this = $(this);
            if ($(this).val() >100) {
                $(this).val(100);
            }
            var sum = 0;
            $('.amount_cal').each(function(index_head, el_head) {
                var amount_attr = $(this).attr('amount_attr');
                if (amount_attr == $this.attr('amount_attr')) {
                    sum += Number($(this).val());
                }
            });
            if (sum > 100) {
                $this.val('')
            } else {
                $('#sum_amount_'+$this.attr('amount_attr')).val(sum);
            }
            console.log(sum);
            event.preventDefault();
        });

        function number_plus ($class) {
            $($class).each(function(index, el) {
                $(this).text(index+1);
            });
        }
        $(document).ready(function() {
            number_plus('.number_topics');
            number_plus('.number_topics_0');
            number_plus('.number_topics_1');

            $('.datepicker').datepicker({
                dateFormat: 'dd-mm-yyyy',
                format: 'dd-mm-yyyy',
                // format: 'yyyy-mm-dd',
                "setDate": new Date('d-m-Y'),
                autoclose: true
            });
        });

        $(document).on("click", ".btn-add-row", function() {
            var clone = $(this).parents('table').find('tbody tr').first().clone();
            // var clone = $(this).next().find('tbody tr').first().clone();
            $(this).parents('table').find('tbody').append(clone);
            // $('.preview').find('table').find('tbody').append(clone);
            clone.removeClass('hidden');
            clone.find(".select-other").removeAttr('disabled');
            clone.find("input").removeAttr('disabled');
            clone.find("input").val('');

            $('.table').each(function(index, el) {
                number_plus('.number_topics_'+index);
            });
            $('.preview').html('');
            $("#htmlpreview").clone().appendTo( ".preview" );
        });

        $(document).on("click", ".btn-delete-row", function() {
            var clone = $(this).next().find('tbody tr').first().clone();
            $(this).next().find('tbody').append(clone);

            if(confirm('Do you want to delete')==true){
                $(this).parents('tr').remove();
            }else{
                e.preventDefault();
            }
            $('.preview').html('');
            $("#htmlpreview").clone().appendTo( ".preview" );
        });

        $(document).on('click', '#btn_submit', function(e) {
            var total = $('.sum_amount_0').val();
            var total1 = $('.sum_amount_1').val();
            if(total <= 99 || total1 <= 99){
                alert("น้อยกว่า 100");
                return false;
            }else{
                if(confirm('ยืนยันการส่งผลตรวจใช่หรือไม่?')==true){
                    $('.report_submit'),submit();
                }else{
                    e.preventDefault();
                }
                /* Act on the event */
            }
        });

        $(document).on('click', '.received_check', function(e) {
            $('#content_report').removeClass('hidden');
        });


        $("input:radio").on("click",function (e) {
            var inp=$(this);
            if (inp.is(".theone")) {
                inp.prop("checked",false).removeClass("theone");
            } else {
                $("input:radio[name='"+inp.prop("name")+"'].theone").removeClass("theone");
                inp.addClass("theone");
            }

        });
        function limit_decimal(ele,limit){
            // $this.val(parseFloat($this.val(),10).toFixed($limit));
            // console.log(parseFloat(ele.val()).toFixed(limit));
            // ele.val();
            if(parseFloat(ele.val())>0){
                ele.val(parseFloat(ele.val()).toFixed(limit));
            }else{
                ele.val(0);
            }
            // console.log($(this).val()+'<<<');
            // if($(this).val().indexOf('.')!=-1){         
            //    if($(this).val().split(".")[1].length > 2){                
            //        if( isNaN( parseFloat( this.value ) ) ) return;
            //        this.value = parseFloat(this.value).toFixed(2);
            //    }  
            // }            
            // return this; //for chaining
        }


</script>