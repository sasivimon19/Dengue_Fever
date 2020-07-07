	<div class="card-header">
		<h3 class="card-title">เพิ่มข้อมูลลูกค้า</h3>
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
						<option value="0">--กรุณาเลือก--</option>
						<option value="นางสาว">นางสาว</option>
						<option value="นาง">นาง</option>
						<option value="นาย">นาย</option>
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
					<input type="text" class="form-control" id="fname" name="fname" placeholder="กรุณากรอกชื่อ">
				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							นามสกุล
						</button>
					</div>
					<input type="text" class="form-control" id="lastname" name="lastname"  placeholder="กรุณากรอกนามสกุล">
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
						<?php foreach ($Brandcar as  $row) { ?>
							 <option value="<?php echo $row->CarBrand ?>"><?php echo iconv("tis-620//ignore","utf-8//ignore",$row->CarBrand) ?></option>
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
						<option>--เลือก--</option>
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
					<input type="text" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกเบอร์โทร">
				</div>
			</div>
			<div class="col-md-4">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							ป้ายทะเบียนรถยนต์
						</button>
					</div>
					<input type="text" class="form-control" id="paper_car" name="paper_car" placeholder="กรุณากรอกป้ายทะเบียนรถยนต์">
				</div>
			</div>
			<div class="col-md-3">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<button type="button" class="btn btn-warning">
							วันหมดอายุกรมธรรม์
						</button>
					</div>
					<input type="text" class="form-control" id="expiration_date" name="expiration_date" placeholder="กรุณากรอกวันหมดอายุกรมธรรม์">
				</div>
			</div>
		</div><br> 
		<div class="row">
			<div class="col-md-9"></div>
			<div class="col-md-2">
				<button type="button" class="btn btn-danger float-right" onclick="reset_cancel()"><i class="fas fa-reply"></i> ยกเลิก</button>
				<button type="button" class="btn btn-info float-right" onclick="Saveadd_Lead()"><i class="far fa-save"></i> บันทึก</button>
			</div>
		</div>
	</div>


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