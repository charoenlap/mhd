<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="container-left btn btn-primary" style="margin: 20px; margin-left: 0;">BACTERIA IDENTIFICATION</div>
<div class="container-left col-md-auto">
    <span class="font-weight-bold">1.วิธีการที่ท่านใช้ในการตรวจวินิจฉัยเชื้อแบคทีเรียสำหรับตัวอย่างที่ได้รับ</span>
    <?php foreach( $infections_sec3 as $key => $infection): ?>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="result" id="radio_<?php echo $key;?>" value="1"  >
        <label class="form-check-label" for="radio_<?php echo $key;?>">
            <?php echo $infection->name;?>
        </label>
    </div>
    <?php endforeach; ?>
    <input type="text" name="result_other" class="form-control" placeholder="Other ระบุ"></input>
</div>
<div style="padding: 10px;"></div>


<div class="row">

<?php $bg_color = array('rgba(255, 167, 71, 0.5)','rgba(95, 77, 189, 0.3)','red lighten-5'); ?>
<?php foreach ($specimens as $key_speci =>  $specimen) : ?>
<div class="col-sm-12">
<div class="card text-black font-weight-bold" style="background-color: <?php echo $bg_color[$key_speci];?>; padding:10px;">
    <div class="btn btn-primary col-3"><?php echo $specimen->name;?></div>
    <div class="card-content">
        <span class="font-weight-bold">2.รายงานชนิดของเชื้อแบคทีเรียที่พบในตัวอย่าง <?php echo $specimen->name;?></span>
        <input type="text" class="form-control border-white" name="result_1[]" >
        <div class="card-content" style="margin-top: 20px;">
            <span class="font-weight-bold ">3.วิธีการที่ท่านใช้ในการทดสอบความไวต่อยาปฏิชีวนะสำหรับเชื้อตัวอย่างที่ได้รับ</span>
            <?php foreach ($infections_sec1 as $infection): ?>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="infection_sec1[<?php echo $specimen->id;?>]" id="radio_sec1_<?php echo $specimen->id.$infection->id;?>" value="1" />
                <label class="form-check-label" for="radio_sec1_<?php echo $specimen->id.$infection->id;?>">
                    <?php echo $infection->name;?>
                </label>
            </div>
            <?php endforeach; ?>
            <textarea name="infection_sec1_other[<?php echo $specimen->id;?>]" id="radio_other" class="form-control border-white" placeholder="Other"></textarea>

            <div class="card-content" style="padding-top: 20px;">
                <caption>4.รายงานผลการทดสอบความไวต่อยาในตารางข้างล่างนี้</caption>
                <table class="table text-center table-hover bordered">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>ยา</th>
                            <th>zone size (mm.)</th>
                            <th>การแปลผล</th>
                            <th>MIC(μg/ml) (ถ้ามี)</th>
                            <th>
                                <a class="btn btn-add-row btn-event">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select class="form-control" name="tool_sec2[<?php echo $specimen->id;?>][]">
                                    <option value="" selected="">Choose</option>
                                <?php foreach ($tools_sec2 as $tool2) : ?>
                                    <option value="<?php echo $tool2->code;?>"><?php echo $tool2->name;?></option>
                                <?php endforeach; ?>
                                    
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="result_2[<?php echo $specimen->id;?>][]">
                            </td>
                            <td>
                                <select class="form-control" name="infection_sec3[<?php echo $specimen->id;?>][]">
                                    <option value="" selected="">Choose</option>
                                <?php foreach ($infections_sec4 as $infec4) : ?>
                                    <option value="<?php echo $infec4->code;?>"><?php echo $infec4->name;?></option>
                                <?php endforeach; ?>
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="result_3[<?php echo $specimen->id;?>][]">
                            </td>
                            <td>
                                <a class="btn waves-effect waves-light btn-delete-row btn_event">
                                    <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-content">
                    <span>5.ในกรณีที่ยาบางชนิดที่ท่านทดสอบนั้นมีวิธีการทดสอบที่แตกต่างไปจากที่ให้ข้อมูลโปรดระบุ</span>
                    <input type="text" class="form-control border-white" name="result_4[0]" >
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php endforeach; ?>

</div>


<div class="container-left">
    <p style="font-size: 17px; margin-top: 20px;" class="font-weight-bold">หากท่านประสงค์ ต้องการแนบภาพถ่ายที่เกี่ยวข้องกับการวิจัย เช่น colony บนอาหารเลี้ยงเชื้อ , Biochemical , test , Antimicrobial susceptibility testing</p>
</div>
<div class="container-left">
    <h6>หากท่านประสงค์ต้องการแนบภาพถ่ายการย้อมสี อัพโหลดไฟล์ภาพ</h6>
</div>
<div class="container align-middle">
    <div class="form-row">
        <div class="form-group col">
            <div class="custom-file" style="width: 400px;">
                <label class="custom-file-label" for="file_0">Upload one file</label>
                <input type="file" class="custom-file-input" id="file_0" name="file_0">
            </div>
            </div>
            <div class="form-group col">
                <div class="custom-file" style="width: 400px;">
                    <label class="custom-file-label" for="file_1">Upload one file</label>
                    <input type="file" class="custom-file-input" id="file_1" name="file_1">
                </div>
            </div>
            <div class="w-100"></div>
            <div class="form-group col">
                <div class="custom-file" style="width: 400px;">
                    <label class="custom-file-label" for="file_2">Upload one file</label>
                    <input type="file" class="custom-file-input" id="file_2" name="file_2">
                </div>
            </div>
            <div class="form-group col">
                <div class="custom-file" style="width: 400px;">
                    <label class="custom-file-label" for="file_3">Upload one file</label>
                    <input type="file" class="custom-file-input" id="file_3" name="file_3">
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
$('#file_0').on("change",function() {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_0')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file); 

    });
    $('#file_1').on("change",function() {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_1')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file); 

    });
    $('#file_2').on("change",function() {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_2')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file); 

    });
    $('#file_3').on("change",function() {
        console.log("change fired");
        var i = $(this).prev('label').clone();
        var file = $('#file_3')[0].files[0].name;
        console.log(file);
        $(this).prev('label').text(file); 

    });
</script>