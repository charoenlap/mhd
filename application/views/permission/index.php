<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">จัดการสิทธิ์</h1>

    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow mb-2 ">
                <div class="card-body border-left-primary text-primary pb-1">พิมพ์ อีเมล แล้ว Enter เพื่อให้มาแจ้งส่งผลการทดสอบ </div>
                <div class="card-body border-left-primary text-primary">
                    กรณีมีอีเมลนี้ในระบบแล้ว ไม่จำเป็นต้องสมัครใหม่ สามารถ login เพื่อแจ้งผลการทดสอบได้เลย<br>
                    กรณีไม่มีผู้ใช้นี้ในระบบ จะต้องสมัครสมาชิกใหม่ และ login เข้าไปแจ้งผลการทดสอบ
                </div>
            </div>
            <?php if (!empty($success)) { ?>
            <div class="card shadow mb-4">
                <div class="card-body border-left-success text-success"><i class="fas fa-check-circle text-success"></i> <?php echo $success; ?></div>
            </div>
            <?php } ?>
            <?php if (!empty($error)) { ?>
            <div class="card shadow mb-4">
                <div class="card-body border-left-danger text-danger"><i class="fas fa-times-circle text-danger"></i> <?php echo $error; ?></div>
            </div>
            <?php } ?>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold">การให้สิทธิ์เข้าถึงการรายงานผลโปรแกรม</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form>
                                <div class="mb-3 row">
                                <label for="" class="col-sm-2 col-form-label text-right">ปี</label>
                                <div class="col-sm-3">
                                    <select name="" id="year-select" class="form-control">
                                        <option value=""></option>
                                    <?php foreach ($years as $year): ?>
                                        <option 
                                            value="<?php echo $year->year;?>" 
                                            <?php echo $year_select==$year->year?'selected':'';?>
                                        >
                                        <?php echo $year->year;?>
                                        </option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            </form>
                        </div>
                        <div class="col-12">

                        
                           <table class="table table-bordered">
                           <thead>
                                <tr>
                                    <th width="20%">โปรแกรม</th>
                                    <th>ให้สิทธิ์บุคคลอื่น 1 คน (กรอกด้วย อีเมล เท่านั้น)</th>
                                    <th>บันทึก</th>
                                </tr>
                           </thead>
                           <tbody> 
                            <?php if (count($program_choose)>0): ?>
                                <?php foreach($program_choose as $key => $program): ?>
                                <tr>
                                <form action="<?php echo $action;?>" method="POST" class="form-save-email" data-row="<?php echo $key;?>" >
                                    <td><?php echo $program->program_name;?></td>
                                    <td>
                                        <input type="email" name="email[<?php echo $program->id;?>]" class="form-control" value="<?php echo $program->sub_email;?>" placeholder="อีเมล" autocomplete="off" />
                                    </td>
                                    <td width="20%">
                                        <input type="submit" class="btn btn-primary" data-row="<?php echo $key;?>" value="บันทึก" />
                                    </td>
                                </form>
                                </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2" class="text-center">ไม่พบโปรแกรมที่สมัครในปี <?php echo $year_select;?></td>
                                </tr>
                            <?php endif;?>
                           </tbody>
                           </table>
                           
                        

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    $('[type="submit"]').click(function (e) { 
        e.preventDefault();
        // $(this).parent('td').parent('form').submit();
        $('[type="submit"]').val('กำลังบันทึก...').attr('disabled','disabled');
        $('.form-save-email[data-row="'+$(this).data('row')+'"]').submit();
    });
    $('#year-select').change(function (e) { 
        e.preventDefault();
        window.location.href = '<?php echo base_url('permission/index/');?>' + $(this).val();
    });
    $('.select-multi').select2({
        tags: true,
    });

    // $('.checkEmail').keyup(function (e) { 
    //     let btnsum = $(this).parent('td').next('td').children('[type=submit]');
    //     let value = $(this).val();
    //     console.log(value);
    //     btnsum.attr('disabled','disabled').val('กำลังโหลด...').removeAttr('disabled');
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo base_url('permission/ajaxCheck');?>",
    //         data: {email: value},
    //         success: function (response) {
    //             btnsum.removeAttr('disabled').val('บันทึก');
    //             console.log(response);        
    //         }
    //     });
        
    // });

    // let checkEmail = (thismail) => {
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php echo base_url('permission/ajaxCheck');?>",
    //         data: {email: thismail},
    //         async: false,
    //         success: function (response) {
    //             return response;
    //         }
    //     });
    // }
});
</script>