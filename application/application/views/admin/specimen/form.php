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
									<label for="" class="col-sm-2 col-form-label">Program Name</label>
									<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $program; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Trial Name</label>
									<div class="col-sm-10">
										<input type="text" readonly class="form-control-plaintext" value="<?php echo $trial; ?>" />
									</div>
								</div>
								<div class="form-group row">
									<label for="" class="col-sm-2 col-form-label">Specimen Name</label>
									<div class="col-sm-10">
										<input name="name" type="text" class="form-control" required value="<?php echo $name; ?>" />
									</div>
								</div>
								
								<hr />
								<a href="<?php echo base_url('admin/specimen/list/').$trial_id;?>" class="btn btn-secondary">Back</a>
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

