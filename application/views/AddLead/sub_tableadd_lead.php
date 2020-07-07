

<style type="text/css">
	#customers {
		font-size: 13px;
		border-collapse: collapse;
		width: 100%;
	}

	#customers td, #customers th {
		border: 1px solid #ddd;
		padding: 5px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
		padding-top: 5px;
		padding-bottom: 5px;
		text-align: left;
		background-color: #FFF;
		color: #000;
	}
</style>

<label style="font-size: 13px;">รายการทั้งหมด <?php echo number_format($Count,0) ?></label>
<div class="table-responsive">
<table id="customers">
	<tr>
		<th nowrap>#</th>
		<th></th>
		<th nowrap>PROSPECT_LIST_ID</th>
		<th nowrap>ชื่อ-สกุล</th>
		<th nowrap>รุ่นรถยนต์</th>
		<th nowrap>ยี่ห้อรถยนต์</th>
		<th nowrap>ปีรถยนต์</th>
		<th nowrap>เบอร์โทร</th>
		<th nowrap>ป้ายทะเบียน</th>
		<th nowrap>วันหมดอายุกรรมธรรม์</th>

		
	</tr>
	<?php if($Count == 0){ ?>
		<tr><td colspan="10" style="text-align:center">ไม่มีรายการ</td></tr>
	<?php }else{ ?>
	<?php foreach ($get_PROSPECT_LIST as  $value) { ?>
		<tr>
			<td nowrap><?php echo number_format($value->row,0); ?></td>
			<td><button type="button" class="btn btn-primary" onclick="EditLead(PROSPECT_LIST_ID='<?php echo $value->PROSPECT_LIST_ID ?>')"><i class="far fa-edit"></i></button></td>
			<td nowrap><?php echo $value->PROSPECT_LIST_ID; ?></td>
			<td nowrap><?php echo iconv("tis-620//ignore","utf-8//ignore",$value->Fullname); ?></td>
			<td nowrap><?php echo iconv("tis-620//ignore","utf-8//ignore",$value->CarDesc); ?></td>
			<td nowrap><?php echo $value->CarBrand; ?></td>
			<td nowrap><?php echo $value->CarYear; ?></td>
			<td nowrap><?php echo $value->CustomeTel1; ?></td>
			<td nowrap><?php echo iconv("tis-620//ignore","utf-8//ignore",$value->CarLicensePlate); ?></td>
			<td nowrap><?php echo date("d-m-Y",strtotime($value->RefInsurance_Date)); ?></td>

		</tr>
	<?php } } ?>
</table>
</div>
<br>
<?php $total_page =  ceil($Count/$pageend);  ?>
<div class="row ">
	<div class="col-md-4"></div>
	<div class="col-md-1">
		<select class="form-control-sm" name="page" id="page" onchange="pagging()">
			<?php for ($i=1; $i <= $total_page; $i++) {  ?>
				<?php if($numpage == $i){ ?>
					   <option value="<?php echo $i ?>" selected><?php echo $i ?></option>
				<?php }else{ ?>
						<option value="<?php echo $i ?>" ><?php echo $i ?></option>
				<?php } ?>
		<?php } ?>
		</select>
	</div>
	<div class="col-md-2" style="font-size: 13px"> | เลือกทั้งหมด <?php echo $total_page ?> หน้า |</div>
</div>

