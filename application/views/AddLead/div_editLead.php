<?php foreach ($get_PROSPECT_LIST_Edit as $value) {  ?>

	<div class="card-header">
		<h3 class="card-title">แก้ไขข้อมูลลูกค้า</h3>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							คำนำหน้า
						</button>
					</div>
					<select id="prefix" name="prefix" class="form-control">
						<?php if(iconv("TIS-620//ignore","utf-8//ignore",$value->int) == "นางสาว"){ ?>
							<option value="นางสาว" selected>นางสาว</option>
							<option value="นาง">นาง</option>
							<option value="นาย">นาย</option>

						<?php }else if(iconv("TIS-620//ignore","utf-8//ignore",$value->int) == "นาง"){ ?>
							<option value="นางสาว">นางสาว</option>
							<option value="นาง" selected>นาง</option>
							<option value="นาย">นาย</option>

						<?php }else if(iconv("TIS-620//ignore","utf-8//ignore",$value->int) == "นาย"){ ?>
							<option value="นางสาว">นางสาว</option>
							<option value="นาง">นาง</option>
							<option value="นาย" selected>นาย</option>

						<?php } ?>
						
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							ชื่อ
						</button>
					</div>
					<input type="text" class="form-control" id="fname" name="fname"  value="<?php echo iconv("TIS-620//ignore","utf-8//ignore",$value->CustomerFirstname) ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							นามสกุล
						</button>
					</div>
					<input type="text" class="form-control" id="lastname" name="lastname"  value="<?php echo iconv("TIS-620//ignore","utf-8//ignore",$value->CustomerLastname) ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							ยี่ห้อรถยนต์
						</button>
					</div>
					 <select name="brand_car" id="brand_car" class="form-control" onchange="show_Carmodel()">
						<option>--เลือก--</option>
						<?php foreach ($Brandcar as  $row) { 
							if($row->CarBrand == iconv("TIS-620//ignore","utf-8//ignore",$value->CarBrand)){  ?>
								    <option value="<?php echo $row->CarBrand ?>" selected>
									<?php echo iconv("tis-620//ignore","utf-8//ignore",$row->CarBrand) ?>	
									</option>
							<?php }else{ ?>
								<option value="<?php echo $row->CarBrand ?>">
									<?php echo iconv("tis-620//ignore","utf-8//ignore",$row->CarBrand) ?>
								</option>
							<?php } ?>
							 
						<?php } ?>
					</select>
					
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							รุ่นรถยนต์
						</button>
					</div>
					<select class="form-control" id="model_car" name="model_car" onchange="show_YearGroup()">
						<option value="">--เลือก--</option>
						<?php foreach ($ModelCar as $row) { 
							if($row->CarModel == $value->CarDesc){ ?>
							<option value="<?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarModel) ?>" selected><?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarModel) ?></option>
						<?php }else{ ?>
							<option value="<?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarModel) ?>"><?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarModel) ?></option>
						<?php } } ?>
					</select>

				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							ปีรถยนต์
						</button>
					</div>
					<select class="form-control" id="year_car" name="year_car" >
						<?php foreach ($Yearcar as $row) { 
							if($row->CarYear == $value->CarYear){ ?>
							<option value="<?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarYear) ?>" selected><?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarYear) ?></option>
						<?php }else{ ?>
							<option value="<?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarYear) ?>"><?php echo iconv("TIS-620//ignore","utf-8//ignore",$row->CarYear) ?></option>
						<?php } } ?>

					</select>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							เบอร์โทร
						</button>
					</div>
					<input type="text" class="form-control" id="tel" name="tel" value="<?php echo $value->CustomeTel1 ?>">
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							ป้ายทะเบียนรถยนต์
						</button>
					</div>
					<input type="text" class="form-control" id="paper_car" name="paper_car"  value="<?php echo iconv("TIS-620//ignore","utf-8//ignore",$value->CarLicensePlate) ?>">
				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							วันหมดอายุกรมธรรม์
						</button>
					</div>
					<input type="text" class="form-control" id="expiration_date" name="expiration_date"  value="<?php echo  date("Y-m-d",strtotime($value->RefInsurance_Date)) ?>">
				</div>
			</div>
		</div><br> 
		<div class="row">
			<div class="col-md-9"></div>
			<div class="col-md-3">
				<button type="button" class="btn btn-success float-right" onclick="btnUpdate_Lead(PROSPECT_LIST_ID='<?php echo $value->PROSPECT_LIST_ID ?>')"><i class="far fa-save"></i> บันทึกการเปลี่ยนแปลง</button>
			</div>
		</div>
	</div>
<?php } ?>

	<script type="text/javascript">
    function show_Carmodel() {
        document.getElementById("loadding").style.display = "block";
        var car_brand = document.getElementById('brand_car').value;
        var datas = "car_brand=" + car_brand;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Car_Model') ?>",
            data: datas,
        }).done(function (data) {
        	document.getElementById("loadding").style.display = "none";
            $('#model_car').html(data);
        })
    }
</script>


<script type="text/javascript">
    function show_YearGroup() {
   document.getElementById("loadding").style.display = "block";
        var Car_modil = document.getElementById('model_car').value;
        var datas = "Car_modil=" + Car_modil;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Year_Car') ?>",
            data: datas,
        }).done(function (data) {
        	document.getElementById("loadding").style.display = "none";
            $('#year_car').html(data);
        })
    }
</script>