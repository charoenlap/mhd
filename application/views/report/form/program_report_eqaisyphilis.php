<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<div>
<div class="container-fluid">
    <table class="table text-center table-hover">
        <thead class="bg-primary text-white">
            <tr>
                <th></th>
                <th style="width:20%;">Non treponemal Test</th>
                <th></th>
                <th></th>
                <th colspan="2">Treponemal Test</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>
                    <select class="select-other custom-select" name="tools[0]" other_id="other_ntp" data-no="4">
                        <option value="" selected="">Choose</option>
                        <?php foreach($tools_ntp as $tool): ?>
                        <option value="<?php echo $tool->code;?>" other="<?php echo $tool->other;?>"><?php echo $tool->name;?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" class="d-none form-control" name="tools_other[0]" id="other_ntp" placeholder="Other ระบุ" value>
                </td>
                <td class="text-left">Method</td>
                <td class="bg-primary border-0"></td>
                <td>
                    <select class="select-other custom-select" name="tools[1]" other_id="other_tp" data-no="5">
                        <option value="" selected="">Choose</option>
                        <?php foreach($tools_tp as $tool): ?>
                        <option value="<?php echo $tool->code;?>" other="<?php echo $tool->other;?>"><?php echo $tool->name;?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" class="d-none form-control" name="tools_other[1]" id="other_tp" placeholder="Other ระบุ" value>
                </td>
                <td class="text-left">Method</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="text" class="form-control" name="ntp_result">
                </td>
                <td class="text-left">Instrument/Test Kit/ Brand</td>
                <td class="bg-primary border-0"></td>
                <!-- second input -->
                <td>
                    <input type="text" class="form-control" name="tp_result">
                </td>
                <td class="text-left">Instrument/Test Kit/ Brand</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="text" class="form-control" name="ntp_lot_number">
                </td>
                <td class="text-left">Reagent Lot Number</td>
                <td class="bg-primary border-0"></td>
                <!-- second input -->
                <td>
                    <input type="text" class="form-control" name="tp_lot_number">
                </td>
                <td class="text-left">Reagent Lot Number</td>
            </tr>
            <tr>
                <td>Specimen No.</td>
                <td>Qualitative</td>
                <td>Semiquantitative</td>
                <td class="bg-primary border-0"></td>
                <td>Qualitative</td>
                <td hidden>Specimen No.</td>
            </tr>
            <?php foreach ($specimens as $specimen): ?>
            <tr>
                <td><?php echo $specimen->name;?></td>
                <td>
                    <select name="" id="" class="form-control">
                        <option value="">Choose</option>
                        <?php foreach($tools_qualitative as $tool): ?>
                        <option value=""><?php echo $tool->name;?></option>
                        <?php endforeach;?> ?>
                    </select>
                </td>
                <td>
                    <select name="" id="" class="form-control">
                        <option value="">Semiquantitative</option>
                        <option value="1:1">1:1</option>
                        <option value="1:2">1:2</option>
                        <option value="1:4">1:4</option>
                        <option value="1:8">1:8</option>
                        <option value="1:16">1:16</option>
                        <option value="1:32">1:32</option>
                        <option value="1:64">1:64</option>
                        <option value="1:128">1:128</option>
                        <option value="1:256">1:256</option>
                        <option value="1:512">1:512</option>
                        <option value="1:1024">1:1024</option>
                    </select>
                </td>
                <td class="bg-primary border-0"></td>
                <td>
                    <select name="" id="" class="form-control">
                        <option value="">Choose</option>
                        <?php foreach($tools_qualitative as $tool): ?>
                        <option value=""><?php echo $tool->name;?></option>
                        <?php endforeach;?> ?>
                    </select>
                </td>
                <td hidden>Specimen No.</td>
            </tr>
            <?php endforeach;?> 
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
    <button class="btn btn-primary" name="submit" type="submit" value="preview">พรีวิว</button>
    <button class="btn btn-primary" name="submit" type="submit" value="accept">ยืนยันการส่งผลการตรวจ</button>
    <!-- <button type="submit" id="submit" class="btn btn-primary">ยืนยันการส่งผลการตรวจ</button> -->
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