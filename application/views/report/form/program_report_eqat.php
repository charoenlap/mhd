<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="row">
    <div class="cols12">
        <table class="table text-center table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Analytes</th>
                    <th scope="col">Instruments</th>
                    <th scope="col">Principles</th>
                    <th scope="col">Sample 1</th>
                    <th scope="col">Sample 2</th>
                </tr>
            <tbody>
                <?php foreach ($infections as $key => $value) : ?>
                <tr>
                    <td><?php echo $value->code;?></td>
                    <td><?php echo $value->name;?></td>
                    <td>
                        <select class="select-other custom-select" name="tools[<?php echo $value->code;?>]" other_id="other_tools<?php echo $value->code;?>">
                            <option value="" selected="">Choose</option>
                            <?php foreach ($tools as $tool): ?>
                            <option value="<?php echo $tool->code;?>" other="<?php echo $tool->other;?>"><?php echo $tool->code.':'.$tool->name;?></option>
                            <?php endforeach; ?> 
                        </select>
                        <input type="text" class="d-none form-control" name="tools_other[<?php echo $value->code;?>]" id="other_tools<?php echo $value->code;?>" placeholder="Other ระบุ" value="">
                    </td>
                    <td>
                        <select class="select-other custom-select" name="method[<?php echo $value->code;?>]" other_id="other_method<?php echo $value->code;?>">
                            <option value="" selected="">Select Method</option>
                            <?php foreach ($principles as $principle) : ?>
                            <option value="<?php echo $principle->code;?>" other="<?php echo $principle->other;?>"><?php echo $principle->name;?></option>
                            <?php endforeach; ?>

                        </select>
                        <input type="text" class="d-none form-control" name="principle_other[<?php echo $value->code;?>]" id="other_method<?php echo $value->code;?>" placeholder="Other ระบุ" value="">
                    </td>
                    <td><input type="number" class="form-control" name="sample[0][]" data-no="0-0" style="padding-bottom: 0px;"></td>
                    <td><input type="number" class="form-control" name="sample[1][]" data-no="0-1" style="padding-bottom: 0px;"></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
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
            <button class="btn btn-primary" name="submit" type="submit" value="preview">พรีวิว</button>
            <button class="btn btn-primary" name="submit" type="submit" value="accept">ยืนยันการส่งผลการตรวจ</button>
            <!-- <button type="submit" id="submit" class="btn btn-primary">ยืนยันการส่งผลการตรวจ</button> -->
        </div>
    </div>
</div>
                   
<script>
    $(document).on('change', '.select-other', function(e) {
        var status_other = $('option:selected', this).attr('other');;
        var other_id = $(this).attr('other_id');
        // console.log(other_id);

        if (status_other == '1') {
            $('#' + other_id).removeClass('d-none');
        } else {
            $('#' + other_id).addClass('d-none');
            $('#' + other_id).val('');
        }
    });
</script>