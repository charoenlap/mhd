<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading_title;?></h1>
                </div>
                <div class="col-sm-6">
                    <?php if ($breadcrumbs) : ?>
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumbs as $title => $link) { ?>
                        <li class="breadcrumb-item"><a href="<?php echo $link;?>"><?php echo $title; ?></a></li>
                        <?php } ?>
                    </ol>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <!-- <a href="<?php echo base_url('admin/program/add');?>" class="btn btn-primary btn-sm mt-2"><i class="fas fa-plus"></i> เพิ่มโปรแกรม</a>-->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if (!empty($success)) : ?>
                    <div class="alert alert-success alert-dismissible"><?php echo $success;?></div>
                    <?php endif;?>
                    <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger alert-dismissible"><?php echo $error;?></div>
                    <?php endif;?>
                    <div class="card">
                        <div class="card-body">


                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>รหัส</th>
                                        <th>ชื่อ</th>
                                        <th>อีเมล</th>
                                        <th>รพ</th>
                                        <th width="15%" class="text-center">การจัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($lists)>0) : ?>
                                    <?php foreach ($lists as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $year.sprintf('%05d',$value->id);?></td>
                                        <td><?php echo $value->firstname.' '.$value->lastname;?></td>
                                        <td><?php echo $value->email;?></td>
                                        <td><?php echo $value->hospital;?></td>
                                        <td class="text-center">
                                            <?php if ($value->is_report==1): ?>
                                            <a href="<?php echo base_url('admin/report/detail/'.$year.'/'.$program_slug.'/'.$trial_slug.'/'.$value->id);?>">View Report</a>
                                            <?php else: ?>
                                            ยังไม่ได้ส่ง
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif;?>
                                </tbody>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->