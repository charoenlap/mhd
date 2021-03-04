<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-body">

        <form action="<?php echo $action; ?>" method="POST" class="mt-5">

          <input type="hidden" name="program_name" value="<?php echo $program_name; ?>" />
          <input type="hidden" name="program_id" value="<?php echo $program_id; ?>" />
          <input type="hidden" name="trial_name" value="<?php echo $trial_name; ?>" />
          <input type="hidden" name="trial_id" value="<?php echo $trial_id; ?>" />
          <input type="hidden" name="year_id" value="<?php echo $year_id; ?>" />
          <input type="hidden" name="member_id" value="<?php echo $member_id; ?>" />
          <input type="hidden" name="register_id" value="<?php echo $register_id; ?>" />
          <input type="hidden" name="company_id" value="<?php echo $company_id; ?>" />
          <input type="hidden" name="address" value="<?php echo $address; ?>" />
          <input type="hidden" name="type" value="preview">


          <div class="card card-body mb-2">
            <div class="row">
              <div class="col-sm-12 text-center">
                <h2><?php echo $heading_title; ?></h2>
              </div>
              
              <div class="col-sm-12 text-left">
                <p class="mb-0"><?php echo $address;?></p>
                <hr />
              </div>

              <div class="col-sm-12 text-left">
                <p class="mb-0 text-blue"><b>บันทึกการรับตัวอย่าง</b></p>
                <p class="pl-3 mb-2"><b>Scheme</b> : <?php echo $program_name;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Trial</b> : <?php echo $trial_name;?></p>
              </div>
            </div>

            <div class="mb-2 row">
              <label for="" class="col-sm-12 col-form-label">วันที่ได้รับตัวอย่างทดสอบ</label>
              <div class="col-sm-3">
                <input type="text" name="date_report" class="form-control datepicker ml-3" value="<?php echo $date_report;?>" />
              </div>
            </div>

            <div class="mb-2 row">
              <label for="" class="col-sm-6 col-form-label">ความสมบูรณ์ของตัวอย่างทดสอบ</label>
              <div class="col-sm-12">
                <div class="form-check ml-3">
                  <input class="form-check-input" type="radio" name="received_status" id="check_report_true" value="true" <?php echo $received_status==='true'?'checked="checked"':'';?> />
                  <label class="form-check-label" for="check_report_true">อยู่ในสภาพสมบูรณ์</label>
                </div>
                <div class="form-check ml-3 mb-2">
                  <input class="form-check-input" type="radio" name="received_status" id="check_report_false" value="false" <?php echo $received_status==='false'?'checked="checked"':'';?> />
                  <label class="form-check-label" for="check_report_false">อยู่ในสภาพไม่สมบูรณ์ และไม่สามารถนำมาทดสอบได้</label>
                </div>
                <div class="ml-3">
                  <p class="mb-0">เนื่องจาก</p>
                  <textarea class="form-control" rows="3" id="received_status_other" name="received_status_other"><?php echo $received_status_other;?></textarea>
                </div>
              </div>
            </div>
          </div>

          <div class="collapse" id="collapseTrial">
            <div class="card card-body mb-2">
              
  


          


    <?php /*
<div class="card shadow mb-4">
<div class="card-body">
<div class="row">

<form class="user" action="<?php echo $action; ?>" method="POST">
<input type="hidden" name="program_name" value="<?php echo $program_name;?>" />
<input type="hidden" name="trial_name" value="<?php echo $trial_name;?>" />

<input type="hidden" name="program_id" value="<?php echo $program_id;?>" />
<input type="hidden" name="trial_id" value="<?php echo $trial_id;?>" />
<input type="hidden" name="member_id" value="<?php echo $member_id;?>" />
<input type="hidden" name="register_id" value="<?php echo $register_id;?>" />

<h2><?php echo $heading_title; ?></h2>
</div>
<div class="container-left">
<h5 class="text-left font-weight-bold" style="padding-top: 30px;">Scheme : <?php echo $program_name;?></h5>
</div>
<div class="container-left">
<h5 class="text-left">
<p><?php echo $address;?></p>
</h5>
<p class="font-weight-bold">บันทึกการรับตัวอย่าง</p>
<div class="col">
<h6><label class="font-weight-bold">Trial : </label> <?php echo $trial_name;?></h6>
</div>
</div>
<div class="font-weight-bold container-left">
<label for="datepick">วันที่ได้รับตัวอย่างทดสอบ *</label>
<input type="date" class="form-control" style="width: 180px;" id="datepick" name="date_received" value="<?php echo date('Y-m-d'); ?>" ></input>
</div>
<div class="container-left">
<p class="font-weight-bold" style="padding-top: 30px;">ความสมบูรณ์ของตัวอย่างทดสอบ * </p>
</div>
<input type="radio" name="received_status" id="test1" class="received_check theone" value="1">
<label class="choose_edit" for="test1">อยู่ในสภาพสมบูรณ์</label>
<div class="container-left">
<input type="radio" name="received_status" id="test2" class="received_check theone" value="2">
<label class="choose_edit" for="test2">อยู่ในสภาพไม่สมบูรณ์ และไม่สามารถนำมาทดสอบได้</label>
</div>
<div class="container-left">
<label for="received_status_other" class="font-weight-bold">เนื่องจาก</label>
<textarea class="form-control" id="received_status_other" name="received_status_other"></textarea>
</div>

<div id="showdetail_program">
<div class="container-left" style="padding-top: 30px;">
<p class="font-weight-bold">ผลการตรวจ</p>
</div>

*/ ?>