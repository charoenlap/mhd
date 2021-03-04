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
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
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
					<div class="card">
						<div class="card-body">
								<form class="form-inline" action="<?php echo $action; ?>" method="post">
									<div class="form-group mx-2">
										<input type="text" name="filter_date" class="form-control pickerdate" placeholder="Range Date" value="<?php echo $filter_date;?>" autocomplete="off">
									</div>

									<div class="form-group mx-2">
										<select name="filter_status" id="" class="form-control">
											<option value="null" hidden>Status</option>
											<option value="1" <?php echo $filter_status===1?'selected':'';?>>Confirm</option>
											<option value="0" <?php echo $filter_status===0?'selected':'';?>>Unconfirm</option>
										</select>
									</div>

									<div class="form-group mx-2">
										<input type="text" name="filter_member" class="form-control" placeholder="member no" value="<?php echo $filter_member;?>">
									</div>

									
									<div class="form-group mx-2">
										<input type="submit" class="btn btn-primary" value="Filter" />
										<a href="<?php echo $action; ?>" class="btn btn-default ml-2">Clear</a>
									</div>

								</form>
						</div>
					</div>
					<div class="card">
						<div class="card-body">

							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>เลขสมาชิก</th>
										<th>วันเวลาชำระเงิน</th>
										<th>ประเภทการชำระ</th>
										<th>ยอดแจ้งชำระ</th>
										<th>รูปภาพ <small>(คลิกเพื่อยืนยัน)</small></th>
										<!-- <th width="15%" class="text-center">การจัดการ</th> -->
									</tr>
								</thead>
								<tbody>
									<?php if (count($lists) > 0): ?>
									<?php foreach ($lists as $key => $value): ?>
										<?php if (($value->payment_method=='bank_transfer'&&!empty($value->image))||in_array($value->payment_method, array('cheque','cash'))) : ?>
									<tr>
										<td class="<?php echo $value->status == 1 ? 'text-success' : ''; ?>">
											<?php echo $value->member_no; ?>
										</td>
										<td class="<?php echo $value->status == 1 ? 'text-success' : ''; ?>">
											<?php echo $date_pay = date('d/m/Y H:i:s', strtotime($value->slip_date . ' ' . $value->slip_time)); ?>
										</td>
										<td class="<?php echo $value->status == 1 ? 'text-success' : ''; ?>">
											<?php 
												switch($value->payment_method) {
													case 'bank_transfer':  echo 'โอนเงินเข้าบัญชี 016-452491-2';  break;
													case 'cheque':  echo 'เช็คธนาคาร';  break;
													case 'cash':  echo 'ชำระเงินสด';  break;
												} 
											?>
										</td>
										<td class="<?php echo $value->status == 1 ? 'text-success' : ''; ?>">
											<?php echo number_format($value->total, 2); ?>
										</td>
										<td>
											
											<a data-toggle="modal" data-target=".exsample_img_<?php echo $key.$value->id; ?>"
												style="cursor:pointer">
												<?php if ($value->payment_method=='bank_transfer'): ?>
												<img src="<?php echo base_url() . 'upload/' . $value->image; ?>" class="img-thumbnail"
													style="max-height:100px;" />
												<?php else: ?>
												View
												<?php endif;?>
											</a>
											<div class="modal fade exsample_img_<?php echo $key.$value->id; ?>" tabindex="-1" role="dialog"
												aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">สลิปของสมาชิก
																<?php echo $value->member_no; ?>
															</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
																	aria-hidden="true">&times;</span></button>
														</div>
														<div class="modal-body ">
															<div class="row">
															
																<div class="<?php echo ($value->payment_method=='bank_transfer') ? 'col-sm-6' : 'col-sm-12';?>">
																	<?php $total = 0;?>
																	<?php foreach ($value->programs as $program): ?>
																	<?php $total += (double) $program->price;?>
																	<?php endforeach;?>
																	<table class="table">
																		<tr>
																			<th>ยอดแจ้งชำระ</th>
																			<td>
																				<h4 class="mb-0">
																					<?php echo number_format($value->total, 2); ?>
																				</h4>
																				<?php if ($total != $value->total): ?>
																				<p class="text-danger">เตือน : ยอดแจ้งชำระไม่ตรงกับยอดสมัครโปรแกรม</p>
																				<?php endif;?>
																			</td>
																		</tr>
																		<tr>
																			<th>ประเภทการชำระ</th>
																			<td>
																			<?php 
																				switch($value->payment_method) {
																					case 'bank_transfer':  echo 'โอนเงินเข้าบัญชี ธนาคารไทยพาณิชย์ จำกัด (มหาชน) สาขาศิริราช เลขที่บัญชี 016-452491-2 ชื่อบัญชี "โครงการ การประเมินคุณภาพทางห้องปฏิบัติการ โดดยองค์กรภายนอก คณะเทคนิคการแพทย์" พร้อมหลักฐานแนบ';  break;
																					case 'cheque':  echo 'เช็คธนาคารในนาม "โครงการ การประเมินคุณภาพทางห้องปฏิบัติการ โดดยองค์กรภายนอก คณะเทคนิคการแพทย์"';  break;
																					case 'cash':  echo 'ชำระเงินสด ที่ ศูนย์พัฒนามาตรฐานการประเมินผลิตภัณฑ์ คณะเทคนิคการแพทย์ มหาวิทยาลัยมหิดล (โรงพยาบาลศิริราช)';  break;
																				} 
																			?>
																			</td>
																		</tr>
																		<tr>
																			<th>วันเวลาชำระเงิน</th>
																			<td>
																				<?php echo $date_pay; ?>
																			</td>
																		</tr>
																	</table>
																	<table class="table">
																		<thead class="thead-dark">
																			<tr>
																				<th>ปี</th>
																				<th>โปรแกรม</th>
																				<th>ราคา</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php foreach ($value->programs as $program): ?>
																			<tr>
																				<td>
																					<?php echo $program->year; ?>
																				</td>
																				<td>
																					<?php echo $program->name; ?>
																				</td>
																				<td>
																					<?php echo number_format($program->price, 2); ?>
																				</td>
																			</tr>
																			<?php endforeach;?>
																		</tbody>
																		<tfoot>
																			<tr>
																				<td colspan="2" class="text-right">ราคารวม</td>
																				<td>
																					<?php echo number_format($total, 2); ?>
																				</td>
																			</tr>
																		</tfoot>
																	</table>

																</div>
																<div class="col-sm-6 text-center">
																<?php if ($value->payment_method=='bank_transfer'): ?>
																	<img src="<?php echo base_url() . 'upload/' . $value->image; ?>" class="img-fluid" />
																<?php endif;?>
																</div>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary btn-sm"
																data-dismiss="modal">ยกเลิก</button>
															<a href="<?php echo $value->status == 1 ? base_url('admin/payment/unconfirm/' . $value->id) : base_url('admin/payment/confirm/' . $value->id); ?>"
																type="button"
																class="btn btn-<?php echo $value->status == 1 ? 'danger' : 'success'; ?> btn-sm">
																<?php echo $value->status == 1 ? 'ยกเลิก' : 'ยืนยัน'; ?>
															</a>
														</div>
													</div>
												</div>
											</div>
										</td>

									</tr>
										<?php endif;?>
									<?php endforeach;?>
									<?php endif;?>
								</tbody>
							</table>

							<?php echo $pagination; ?>

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
		console.log(moment().format('DD-MM-YYYY'));
		$('.pickerdate').daterangepicker({
			autoUpdateInput: false,
			singleDatePicker: true,
			showDropdowns: true,
			minYear: 1901,
			maxYear: parseInt(moment().format('YYYY'), 10),
			maxDate: moment().format('DD/MM/YYYY'),
			locale: {
				format: 'DD/MM/YYYY'
			}
		}, function (start, end, label) {
			// var years = moment().diff(start, 'years');
			// alert("You are " + years + " years old!");
		});
		$('.pickerdate').on('apply.daterangepicker', function(ev, picker) {
			console.log(picker);
      $(this).val(picker.startDate.format('DD/MM/YYYY'));
		});
	});
</script>