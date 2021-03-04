<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?php echo $heading_title;?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?php echo $heading_title;?></h6>
        </div>
        <div class="card-body">
            <?php if (!empty($success)): ?>
            <div class="alert alert-success alert-dismissible">
                <?php echo $success; ?>
            </div>
            <?php endif;?>
            <?php if (!empty($error)): ?>
            <div class="alert alert-danger alert-dismissible">
                <?php echo $error; ?>
            </div>
            <?php endif;?>
                <div class="row">
                    <div class="container-fluid">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="me-tab" data-toggle="tab" href="#me" role="tab" aria-controls="me" aria-selected="true">แจ้งส่งผลการทดสอบของตัวเอง</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab" aria-controls="other" aria-selected="false">แจ้งส่งผลการทดสอบของบุคคลอื่น</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="paneltab">
                        <div class="tab-pane fade show active" id="me" role="tabpanel" aria-labelledby="me-tab">
                            <table class="table table-hover">
                                <thead>
                                    <th style="border: 0;"><b>โครงการที่สมัคร</b></th>
                                    <th class="text-right" style="border: 0;"><b>Trial</b></th>
                                </thead>
                                <tbody>
                                    <?php foreach ($programs as $program) :?>
                                    <tr>
                                        <td>
                                            <?php echo $program->name; ?>
                                            <?php echo (in_array($program->id, $program_choose) ? '<span class="badge badge-success">สมัครแล้ว</span>' : '');?>
                                            <?php echo isset($program_slip[$program->id]) && $program_slip[$program->id] == 0 ? '<a href="'.base_url('payment').'"><span class="badge badge-danger">รอแจ้งชำระเงิน</span></a>' : '';?>
                                            <?php echo isset($program_payment[$program->id]) && $program_payment[$program->id] == 0 ? '<a href="#"><span class="badge badge-primary">รอตรวจสอบชำระเงิน</span></a>' : '';?>
                                        </td>  
                                        <td class="text-right">
                                        
                                            <?php if (in_array($program->id, $program_choose)) : ?>
                                                <?php if (isset($program_payment[$program->id]) && $program_payment[$program->id] == 0) : ?>
                                                    <a href="<?php echo base_url('payment/'); ?>" class="btn btn-primary disabled" disabled>รอตรวจสอบชำระเงิน</a>
                                                <?php elseif (isset($program_slip[$program->id]) && $program_slip[$program->id] == 0) : ?>
                                                    <a href="<?php echo base_url('payment/'); ?>" class="btn btn-warning">แจ้งชำระเงิน</a>
                                                <?php else: ?>
                                                    <a href="<?php echo base_url('report/program/').$program->slug; ?>" class="btn btn-primary">Trial</a>
                                                <?php endif;?>
                                            <?php else: ?>
                                                <a href="<?php echo base_url('register/'); ?>" class="btn btn-info">สมัคร</a>
                                            <?php endif; ?>
                                            
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                            <table class="table table-hover">
                                <thead>
                                    <th>โครงการที่มีสิทธิ์</th>
                                    <th class="text-right" style="border: 0;"><b>Trial</b></th>
                                </thead>
                                <tbody>
                                    <?php foreach ($program_others as $program) :?>
                                    <tr>
                                        <td>
                                            <?php echo $program->program_name.' - '.$program->tag; ?>
                                        </td>  
                                        <td class="text-right">
                                            <a href="<?php echo base_url('report/program/').$program->program_slug.'/'.$program->id; ?>" class="btn btn-primary">Trial</a>
                                            
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  
                    
                </div>
        </div>
    </div>
</div>
