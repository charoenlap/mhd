<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo $heading_title; ?></h1>

    <!-- DataTales Example -->
    <?php if (!empty($success)) {?>
    <div class="card shadow mb-4">
        <div class="card-body border-left-success text-success"><i class="fas fa-check-circle text-success"></i> <?php echo $success; ?></div>
    </div>
    <?php }?>
    <?php if (!empty($error)) {?>
    <div class="card shadow mb-4">
        <div class="card-body border-left-danger text-danger"><i class="fas fa-times-circle text-danger"></i> <?php echo $error; ?></div>
    </div>
    <?php }?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $heading_title; ?></h6>
        </div>
        <div class="card-body">
            <form class="user" action="<?php echo $action; ?>" method="POST">
                <div class="row">
                    <div class="col-12">
                        <b>
                            <p>สมาชิก</p>
                        </b>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="" placeholder="รหัสสมาชิก" value="<?php echo $member_no; ?>" readonly>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="" placeholder="อีเมล" value="<?php echo $email; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select name="company_id" id="" class="form-control">
                            <?php foreach ($company as $key => $value): ?>
                            <option value="<?php echo $value->id; ?>"><?php echo $value->name . ' - ' . $value->address_1 . ', ' . $value->address_2 . ', ' . $value->district . ', ' . $value->country . ', ' . $value->province . ', ' . $value->postcode; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12">
                        <b>
                            <p>เลือกโปรแกรมที่จะสมัคร</p>
                        </b>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered" id="programs">
                            <thead>
                                <tr>
                                    <th width="5%"><input type="checkbox" class="form-control form-control-sm" id="checkall" /></th>
                                    <th>โปรแกรมปี <?php echo $year;?></th>
                                    <th>ราคา</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($programs as $program) {?>
                                <tr>
                                    <th><input type="checkbox" name="program_id[<?php echo $program->id; ?>]"  value="1" class="program_check form-control form-control-sm" data-id="<?php echo $program->id; ?>" data-price="<?php echo $program->price; ?>" <?php echo in_array($program->id, $program_choose) ? 'checked="checked" disabled="disabled"' : '' ?> /></th>
                                    <td>
                                    <?php echo $program->name . ' '; ?>
                                    <?php echo (in_array($program->id, $program_choose) ? '<span class="badge badge-success">สมัครแล้ว</span>' : '');?>
                                    
                                    <?php if (isset($program_slip[$program->id]) && $program_slip[$program->id] == 0) : ?>
                                        <?php echo '<a href="'.base_url('payment').'"><span class="badge badge-danger">รอแจ้งชำระเงิน</span></a>';?>
                                    <?php else: ?>
                                        <?php echo isset($program_payment[$program->id]) && $program_payment[$program->id] == 0 ? '<a href="#"><span class="badge badge-primary">รอตรวจสอบชำระเงิน</span></a>' : '';?>
                                    <?php endif; ?>
                                    </td>
                                    <td><?php echo number_format($program->price, 2); ?></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="row">
                    <div class="col-12 text-center">
                        <h2>ยอดชำระ : <span id="total_text">0.00</span> บาท</h2>
                        <input type="hidden" name="total" value="0">
                    </div>
                </div>
                <hr>

                <input type="submit" class="btn btn-primary btn-user btn-block" value="<?php echo $year_open==false?'ปิดรับสมัคร':'สมัครโปรแกรม';?>" <?php echo $year_open==false?'disabled="disabled"':'';?>>
            </form>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" id="register_disabled">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <img src="<?php echo base_url();?>assets/img/logo.png" alt="logo" class="img-fluid" />

        <p class="mt-5">ขณะนี้ระบบ <b><u>ปิดรับสมัคร</u></b> โปรแกรม ปี <?php echo $year;?></p>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {

    calculate();

    $('#checkall').click(function() {
        if ($(this).is(':checked')) {
            $('#programs .program_check:enabled').prop('checked', true);
        } else {
            $('#programs .program_check:enabled').prop('checked', false);
        }
        calculate();
    });

    $('.program_check').click(function() {
        calculate();
    });

    function calculate() {
        var total = $('#total_text');
        var hiddentotal = $('[name="total"]');
        var sum = 0;
        $('#programs .program_check:checked:enabled').each(function(index, value) {
            if (!isNaN(parseFloat($(this).data('price')))) { // ? numer only
                sum += parseFloat($(this).data('price'));
            }
        });
        total.html(numberWithCommas(sum.toFixed(2)));
        hiddentotal.val(sum.toFixed(2));
        if (sum > 0) {
            $('input[type="submit"]').removeAttr('disabled');
        } else {
            $('input[type="submit"]').attr('disabled', 'disabled');
        }
        <?php if ($year_open==false) : ?>
            $('input[type="submit"]').attr('disabled', 'disabled');
            $('#checkall').attr('disabled', 'disabled');
            $('#programs .program_check:enabled').prop('checked', false).attr('disabled', 'disabled');
            $('#register_disabled').modal('show');
        <?php endif; ?>
    }


    function numberWithCommas(number) {
        var parts = number.toString().split(".");
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return parts.join(".");
    }
});
</script>