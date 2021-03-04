<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<label style="padding-top: 0px; margin: 0;">3.วิธีการที่ท่านใช้ในการย้อม AFB stain สำหรับตัวอย่างที่ได้รับ</label>
    <div class="container-fluid">
        <!-- first radio -->

        <?php foreach ($infections_sec4 as $key=> $infection) : ?>
        <div class="form-check col-md-auto">
            <input class="form-check-input" type="radio" name="result" id="radio_<?php echo $key;?>" value="1" <?php echo $key==0 ? 'checked': '';?> />
            <label class="form-check-label" for="radio_<?php echo $key;?>">
                <?php echo $infection->name;?>
            </label>
        </div>
        <?php endforeach; ?>
        <input type="text" name="result_other" class="form-control" placeholder="Other ระบุ" style="margin-bottom: 20px;"></input>


        <caption>รายงานผลการย้อมสี</caption>
        <table class="table text-center table-hover">
            <thead class="bg-primary text-white">
                <tr>
                    <th>Sample Id</th>
                    <th>4.รายงานผลการย้อมสี</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($specimens as $specimen) : ?>
                <tr>
                    <td width="30%"><?php echo $specimen->name;?></td>
                    <td>
                    <?php foreach($infections_sec1 as $key => $infection) : ?>
                        <div class="form-check text-left">
                            <input class="form-check-input" type="radio" name="sample[<?php echo $specimen->id;?>]" id="test<?php echo $specimen->id.$infection->id;?>" value="1">
                            <label class="form-check-label" for="test<?php echo $specimen->id.$infection->id;?>">
                                <?php echo $infection->name;?>
                            </label>
                        </div>
                    <?php endforeach;?>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
            </table>
        <div class="container-left">
            <h6>หากท่านประสงค์ต้องการแนบภาพถ่ายการย้อมสี อัพโหลดไฟล์ภาพ</h6>
        </div>
    </div>


<div class="container-left">อัพโหลดไฟล์</div>
<div class="row justify-content-between">
    <div class="input-group" style="padding-top: 10px;">
        <?php foreach($specimens as $specimen) : ?>
        <div class="col px-md-5">
            <div class="custom-file">
                <label class="custom-file-label" for="file_<?php echo $specimen->id;?>"><?php echo $specimen->name;?></label>
                <input type="file" class="custom-file-input" id="file_<?php echo $specimen->id;?>" name="file_<?php echo $specimen->id;?>">
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
