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
                        <table class="table table-hover">
                            <thead>
                                <th style="border: 0;"><b>โครงการ</b></th>
                                <th class="text-right" style="border: 0;"><b>Trial</b></th>
                            </thead>
                            <tbody>
                                <?php foreach ($program_choose as $program) :?>
                                <tr>
                                    <td>
                                        <?php echo $program->program_name; ?>
                                        <?php echo (in_array($program->id, $program_choose) ? '<span class="badge badge-success">สมัครแล้ว</span>' : '');?>
                                        <?php echo isset($program_slip[$program->id]) && $program_slip[$program->id] == 0 ? '<a href="'.base_url('payment').'"><span class="badge badge-danger">รอแจ้งชำระเงิน</span></a>' : '';?>
                                    </td>  
                                    <td class="text-right">
                                        <a href="<?php echo base_url('result/program/'.$program->program_slug);?>" class="btn btn-primary">Trial</a>
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
