<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>

<div class="row" id="showdetail">
	<div class="col">
		<table class="table text-center table-hover">
			<thead class="bg-primary text-white">
				<tr>
					<th></th>
					<th>Testing</th>
					<th width="15%">Principle/Method</th>
					<th width="15%">Instrument</th>
					<th width="15%">Reagent</th>
					<th>Result</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($infections as $key => $value) : ?>
				<tr>
					<td><?php echo $value->code;?></td>
					<td><?php echo $value->name;?></td>
					<td width="15%">
						<select class="form-control" name="save[infection][<?php echo $value->id;?>]">
							<option value="">choose</option>
							<?php $saved = json_decode($value->event, true); ?>
							<?php foreach($tools_sec1 as $tool): ?>
								<?php if (in_array($tool->code, $saved)) : ?>
									<option value="<?php echo $tool->code;?>" <?php echo isset($save['infection'][$value->id])&&$save['infection'][$value->id]==$tool->code?'selected':'';?>>
										<?php echo $tool->name;?>
									</option>
								<?php endif; ?>
							<?php endforeach;?>
						</select>
					</td>
					<td width="15%">
						<select class="form-control" name="save[tool_sec2][<?php echo $value->id;?>]">
							<option value="">choose</option>
							<?php foreach($tools_sec2 as $tool): ?>
							<option value="<?php echo $tool->code;?>" <?php echo isset($save['tool_sec2'][$value->id])&&$save['tool_sec2'][$value->id]==$tool->code?'selected':'';?>><?php echo $tool->name;?></option>
							<?php endforeach;?>
						</select>
					</td>
					<td width="15%">
						<select class="form-control" name="save[tool_sec3][<?php echo $value->id;?>]">
							<option value="">choose</option>
							<?php foreach($tools_sec3 as $tool): ?>
							<option value="<?php echo $tool->code;?>" <?php echo isset($save['tool_sec3'][$value->id])&&$save['tool_sec3'][$value->id]==$tool->code?'selected':'';?>><?php echo $tool->name;?></option>
							<?php endforeach;?>
						</select>
					</td>
					<td>
						<input type="number" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" name="save[result][<?php echo $value->id;?>]" value="<?php echo isset($save['result'][$value->id])?$save['result'][$value->id]:'';?>" step="0.01" class="form-control" />
					</td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>


	<div class="row">
		<div class="col-sm-12 mb-2">
			<p><b>ข้อมูลผู้ส่ง</b></p>
		</div>
		<div class="col-sm-6 mb-2">
			<label for="">ชื่อ</label>
			<input type="text" class="form-control" id="name" name="save[name]" placeholder="ชื่อ" value="<?php echo $name;?>" />
		</div>
		<div class="col-sm-3 mb-2">
			<label for="tel">หมายเลขโทรศัพท์</label>
			<input type="text" class="form-control" id="tel" name="save[telephone]" placeholder="หมายเลขโทรศัพท์" value="<?php echo $telephone;?>" />
		</div>
		<div class="col-sm-3 mb-2">
			<label for="position">ตำแหน่ง</label>
			<input type="text" class="form-control" id="position" name="save[position]" placeholder="ตำแหน่ง" value="<?php echo $position;?>" />
		</div>
		<div class="col-sm-12 mb-2">
			<label for="comment">ข้อคิดเห็นหรือเสนอแนะเพื่อการพัฒนาปรับปรุง </label>
			<textarea class="form-control" id="comment" name="save[comment]" placeholder="ความคิดเห็นเพิ่มเติม"><?php echo $comment;?></textarea>
		</div>
		<div class="col-sm-3 mb-2">
			<label for="report_date">วันที่ทำการทดสอบ </label>
			<input type="text" class="form-control datepicker" id="report_date" name="save[report_date]" value="<?php echo date('d-m-Y'); ?>" />
		</div>
		<div class="col-sm-12 mb-2 text-center">
			<button class="btn btn-primary hidepreview" type="submit" id="btnsubmit">ส่งผลการตรวจ</button>
		</div>
	</div>


	</div>

</div>
