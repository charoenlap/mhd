<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container-left">3.รายงานผลการทดสอบ *หากสมาชิกไม่ทำการทดสอบตัวอย่างให้เลือกข้อความ "Not tested"</div>
<!-- <h5 class="font-weight-bold" style="margin-left: 10px;">ST-6311-1</h5> -->
<div class="row">
    <div class="cols12 container-fluid">
        <?php foreach ($specimens as $key => $specimen): ?>
        <h5 class="font-weight-bold"><?php echo $specimen->name;?></h5>
        <table class="table text-center table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>ลำดับที่</th>
                    <th>Parasite Name</th>
                    <th><a class="btn btn-add-row btn-event">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                        </a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select class="custom-select" name="sample[<?php echo $key;?>][]">
                            <option value="" selected="">Choose</option>
                            <?php foreach ($tools as $tool) : ?>
                            <option value="<?php echo $tool->code;?>"><?php echo $tool->name;?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <a class="btn waves-effect waves-light btn-delete-row btn_event">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php endforeach; ?>

        
        <div class="container-left">หากท่านประสงค์ต้องการแนบภาพถ่ายการย้อมสี อัพโหลดไฟล์ภาพ</div>
        <div class="row justify-content-between">
            <div class="input-group" style="padding-top: 10px;">
                <?php foreach ($specimens as $key => $specimen): ?>
                <div class="col px-md-5">
                    <h6 class="font-weight-bold"><?php echo $specimen->name;?></h6>
                    <div class="custom-file">
                        <label class="custom-file-label" for="file_<?php echo $key;?>">Upload one file</label>
                        <input type="file" class="custom-file-input" id="file_<?php echo $key;?>" name="file_<?php echo $key;?>">
                    </div>
                </div>
                <?php endforeach; ?>
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
            number_plus('.number_topics_' + index);
        });
        $('.preview').html('');
        $("#htmlpreview").clone().appendTo(".preview");
    });

    $(document).on("click", ".btn-delete-row", function() {
        var clone = $(this).next().find('tbody tr').first().clone();
        $(this).next().find('tbody').append(clone);

        if (confirm('Do you want to delete') == true) {
            $(this).parents('tr').remove();
        } else {
            e.preventDefault();
        }
        $('.preview').html('');
        $("#htmlpreview").clone().appendTo(".preview");
    });
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