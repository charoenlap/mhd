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
                            <div class="row">
                                <div class="col-sm-4">
                                    <form class="form-inline" action="<?php echo $action;?>" method="post">
                                        <div class="form-group mb-2 mr-2">
                                            <label>Search</label>
                                        </div>
                                        <div class="form-group mb-2 mr-2">
                                            <select name="year" id="" class="form-control form-control-sm" required>
                                                <option value="">Select year</option>
                                                <?php foreach ($years as $value): ?>
                                                <option value="<?php echo $value->id;?>" <?php echo $year==$value->id?'selected="selected"':'';?>><?php echo $value->year;?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="submit" class="btn btn-sm btn-primary" value="Filter" />
                                            <a href="<?php echo $action;?>" class="btn btn-sm btn-default ml-2">Clear</a>
                                        </div>
                                    </form>
                                </div>
                                    <div class="col-sm-4 text-right offset-sm-4">
                                    <a href="<?php echo $link_add;?>" class="btn btn-sm btn-primary">เพิ่ม Trial</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                       

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Year</th>
                                        <th>Trial</th>
                                        <th width="12%">Start Date</th>
                                        <th width="12%">End Date</th>
                                        <th width="12%">Limit</th>
                                        <th>Note</th>
                                        <th width="12%" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($lists)>0) : ?>
                                    <?php foreach ($lists as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $value->year; ?></td>
                                        <td><?php echo $value->name;?></td>
                                        <td><?php echo $value->start_report_date;?></td>
                                        <td><?php echo $value->end_report_date;?></td>
                                        <td><?php echo $value->row_limit;?></td>
                                        <td><?php echo $value->note;?></td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    จัดการ
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <a class="dropdown-item" href="<?php echo base_url('admin/trial/edit/'.$value->id);?>">Edit Trial</a>
                                                    <a class="dropdown-item" href="<?php echo base_url('admin/specimen/list/'.$value->id);?>">Specimen</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="<?php echo base_url('admin/trial/del/'.$value->id);?>" onclick="return confirm('Are you sure delete this?');">Delete Trial</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <tr>
                                        <td colspan="7" class="text-center">ไม่พบข้อมูล Trial ในปีที่เลือก</td>
                                    </tr>
                                    <?php endif;?>
                                </tbody>
                            </table>

                            <?php echo $pagination; ?>

                            <!-- <small class="float-right mt-4">ไม่สามารถเพิ่มโปรแกรมเองได้เนื่องจากรูปแบบของแต่ละโปรแกรมไม่เหมือนกัน</small> -->

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


<script type="text/javascript">
	$(document).ready(function () {
		$('.pickerdate').daterangepicker({
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 1901,
			maxYear: parseInt(moment().format('YYYY'), 10),
			locale: {
				format: 'DD-MM-YYYY'
			}
		}, function (start, end, label) {
			// var years = moment().diff(start, 'years');
			// alert("You are " + years + " years old!");
		});
	});
</script>