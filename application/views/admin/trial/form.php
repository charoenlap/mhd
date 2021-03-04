<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>
						<?php echo $heading_title; ?>
					</h1>
				</div>
				<div class="col-sm-6">
					<?php if ($breadcrumbs): ?>
					<ol class="breadcrumb float-sm-right">
						<?php foreach ($breadcrumbs as $title => $link) {?>
						<li class="breadcrumb-item"><a href="<?php echo $link; ?>">
								<?php echo $title; ?>
							</a></li>
						<?php }?>
					</ol>
					<?php endif;?>
				</div>
				<div class="col-12">
					<!-- <a href="<?php echo base_url('admin/program/add'); ?>" class="btn btn-primary btn-sm mt-2"><i class="fas fa-plus"></i> เพิ่มโปรแกรม</a>-->
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

							<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Program</label>
									<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $program; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Year</label>
									<div class="col-sm-10">
										<select name="year_id" id="" class="form-control" required>
											<?php foreach ($years as $value): ?>
											<option value="<?php echo $value->id; ?>">
												<?php echo $value->year; ?>
											</option>
											<?php endforeach;?>
										</select>
										<small class="text-danger">Trial จะแสดงผลให้ผู้สมัคร ตามปีที่เลือก</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Trial Name</label>
									<div class="col-sm-10">
										<input name="name" type="text" class="form-control" required value="<?php echo $name; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Start Report Date<br>วันที่สามารถเริ่มลงผล</label>
									<div class="col-sm-10">
										<input name="start_report_date" type="text" class="form-control pickerdate" required
											value="<?php echo $start_report_date; ?>" />
										<small>วว-ดด-ปปปป(ค.ศ.)</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">End Report Date<br>วันปิดการลงผล</label>
									<div class="col-sm-10">
										<input name="end_report_date" type="text" class="form-control pickerdate" required
											value="<?php echo $end_report_date; ?>" />
										<small>วว-ดด-ปปปป(ค.ศ.)</small>
									</div>
								</div>
								<!-- <div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Dispatched Date</label>
									<div class="col-sm-10">
										<input name="dispatched" type="text" class="form-control pickerdate" required
											value="<?php echo $dispatched; ?>" />
										<small>วว-ดด-ปปปป(ค.ศ.)</small>
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Count Dispatched</label>
									<div class="col-sm-10">
										<input name="dispatched_count" type="number" class="form-control" min="0" required
											value="<?php echo $dispatched_count; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Datelind Date</label>
									<div class="col-sm-10">
										<input name="date_send" type="text" class="form-control pickerdate" required
											value="<?php echo $date_send; ?>" />
										<small>วว-ดด-ปปปป(ค.ศ.)</small>
									</div>
								</div> -->
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Report Limit</label>
									<div class="col-sm-10">
										<input name="row_limit" type="number" class="form-control" min="0" required value="<?php echo $row_limit; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Note</label>
									<div class="col-sm-10">
										<textarea name="note" id="" cols="30" rows="3" class="form-control"></textarea>
									</div>
								</div>

								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Upload Report</label>
									<div class="col-sm-10">
										<input type="file" name="file" class="form-control" />
										<!-- <p>File : <a href="<?php echo $file;?>" target="new"><?php echo $file;?></a></p> -->
									</div>
								</div>
								<hr />
								<a href="<?php echo base_url('admin/trial/list/').$program_id;?>" class="btn btn-secondary">Back</a>
								<input type="submit" class="btn btn-primary float-right" value="Save" />
							</form>

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
			// maxYear: parseInt(moment().format('YYYY'), 10),
			locale: {
				format: 'DD-MM-YYYY'
			}
		}, function (start, end, label) {
			// var years = moment().diff(start, 'years');
			// alert("You are " + years + " years old!");
		});
	});
</script>