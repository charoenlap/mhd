<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">

    <?php 
    $head_name = array(
        '1'=>'0,2',
        '2'=>'0,2',
        '3'=>'2,4',
        '4'=>'2,4'
    );
    $U_C = 1;
    $in = array(
        '1' => $infections_sec1,
        '2' => $infections_sec2,
        '3' => $infections_sec3,
        '4' => $infections_sec4,
    );
    foreach ($head_name as $key => $value):
        if ($key==3) {
            $U_C++;
        }
    ?>
    <div class="col-md-6 col-sm-12">
        <table class="table text-center table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>รหัส</th>
                    <th>สิ่งที่ตรวจพบ</th>
                    <?php 
                    $count = 0;
                    foreach ($specimens as $key_speci => $specimen) : ?>
                    <?php if (($value=='0,2' && $count<2) || ($value=='2,4' && $count>1 && $count<4)) :?>
                    <th><?php echo $specimen->name;?></th>
                    <?php endif; ?>
                    <?php $count++; ?>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                        
                <?php foreach ($in[$key] as $key_infec => $infection) : ?>
                <tr>
                    <td>
                    <?php echo $infection->code;?>
                    </td>
                    <td class="text-left"><?php echo $infection->name;?> </td>


                    <?php 
                    $count = 0;
                    foreach ($specimens as $key_speci => $specimen) : ?>
                    <?php if (($value=='0,2' && $count<2) || ($value=='2,4' && $count>1 && $count<4)) :?>
                    
                    <td>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sample_<?php echo $U_C; ?>[<?php echo $key_speci; ?>]"
                                id="radio_<?php echo $key.'_'.$key_speci.'_'.$infection->id; ?>" value="">
                        </div>
                        <?php if ($infection->name == "Other (โปรดระบุ)"): ?>
                        <div><textarea name="sample_other_<?php echo $U_C; ?>[<?php echo $key_speci; ?>]" class="form-control" id="" cols="30" rows="3" style="margin-top:25px;"></textarea></div>
                        <?php endif; ?>
                    </td>


                    <?php endif; ?>
                    <?php $count++; ?>
                    <?php endforeach; ?>
                    
                </tr>
                <?php endforeach;?> 
            </tbody>
        </table>
    </div>
    <?php endforeach; ?>
</div>

<div class="container-left" style="padding-bottom: 20px;">
    <dl>
        <dt>หมายเหตุ</dt>
        <dd> - กรณีพบ cell, cast, crystal หรือสิ่งอื่นๆ ที่ไม่มีรหัสสำหรับรายงานผล ให้เขียนสิ่งที่พบในช่อง Other (รหัส
            45)</dd>
        <dd> - กรณีการรายงาน broad cast เช่น broad waxy cast ให้เขียนรายงานในช่อง other (รหัส 45)</dd>
    </dl>
</div>
<div class="container-left">อัพโหลดไฟล์</div>
<div class="row justify-content-between">
    <div class="input-group" style="padding-top: 10px;">
        <div class="col px-md-5">
            <div class="custom-file">
                <label class="custom-file-label" for="file_0">C</label>
                <input type="file" class="custom-file-input" id="file_0" name="file_0">
            </div>
        </div>
        <div class="col px-md-5">
            <div class="custom-file">
                <label class="custom-file-label" for="file_1">U</label>
                <input type="file" class="custom-file-input" id="file_1" name="file_1">
            </div>
        </div>
    </div>
</div>
<div class="container-left">อัพโหลดไฟล์</div>
<div class="row justify-content-between">
    <div class="input-group" style="padding-top: 10px;">
        <div class="col px-md-5">
            <div class="custom-file">
                <label class="custom-file-label" for="file_3">C1</label>
                <input type="file" class="custom-file-input" id="file_3" name="file_3">
            </div>
        </div>
        <div class="col px-md-5">
            <div class="custom-file">
                <label class="custom-file-label" for="file_4">C2</label>
                <input type="file" class="custom-file-input" id="file_4" name="file_4">
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-between">
    <div class="input-group" style="padding-top: 10px;">
        <div class="col px-md-5">
            <div class="custom-file">
                <label class="custom-file-label" for="file_5">U1</label>
                <input type="file" class="custom-file-input" id="file_5" name="file_5">
            </div>
        </div>
        <div class="col px-md-5">
            <div class="custom-file">
                <label class="custom-file-label" for="file_6">U2</label>
                <input type="file" class="custom-file-input" id="file_6" name="file_6">
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
        <input type="date" class="form-control" style="width: 180px;" id="report_date" name="report_date"
            value="<?php echo date('Y-m-d'); ?>"></input>
    </div>
    <div class="form-gruop text-center" style="margin-top: 30px;">
        <input class="btn btn-primary" type="button" onclick="window.print()" name="printPageButton" id="printPageButton"
            name="printPageButton" value="พิมพ์" style="width: 60px;"></input>
        <button class="btn btn-primary" name="submit" type="submit" value="preview" id="btnpreview">พรีวิว</button>
        <button class="btn btn-primary" name="submit" type="submit" value="accept"
            id="btnsubmit">ยืนยันการส่งผลการตรวจ</button>
    </div>
</div>

<script>
    $('#file_0').on("change", function () {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_0')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file);

    });
    $('#file_1').on("change", function () {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_1')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file);

    });
</script>