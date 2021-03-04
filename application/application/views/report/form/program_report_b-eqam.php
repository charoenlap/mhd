<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row justify-content-between">
    <div class="col px-md-4">
    <select name="tool" id="" class="custom-select select-other">
        <!-- <option value="">ชื่อเครื่องนับเม็ดเลือดอัตโนมัติและรุ่นที่ใช้</option> -->
        <?php foreach ($tools as $tool) : ?>
            <option value="<?php echo $tool->code;?>"><?php echo $tool->name;?></option>
        <?php endforeach; ?>
    </select>
    </div>
    <div class="col px-md-3">
        <input type="text" class="form-control" id="tool_other" name="tool_other" placeholder="รายชื่อเครื่องอื่นๆ">
    </div>
</div>
<div class="row" style="padding-top: 20px;">
    <div class="cols12 container-fluid">
        <table class="table text-center table-bordered">
            <thead class="bg-primary text-white">
                <tr>
                    <?php foreach($infections as $infection): ?>
                    <th><?php echo $infection->name;?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach($infections as $key => $infection): ?>
                    <td><input type="text" class="form-control" name="result_<?php echo $key;?>"></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
        <div class="container-left">อัพโหลดไฟล์</div>
        <div class="row justify-content-between">
            <div class="input-group" style="padding-top: 10px;">
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
        <div class="form-gruop text-center" style="margin-top: 30px;">
        <input class="btn btn-primary" type="button" onclick="window.print()" name="printPageButton" id="printPageButton" name="printPageButton" value="พิมพ์" style="width: 60px;"></input>
        <button class="btn btn-primary" name="submit" type="submit" value="preview" id="btnpreview">พรีวิว</button>
        <button class="btn btn-primary" name="submit" type="submit" value="accept" id="btnsubmit">ยืนยันการส่งผลการตรวจ</button>
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
</script>