<link rel="stylesheet" href="<?php echo base_url()."assets/";?>datetimepicker/build/jquery.datetimepicker.min.css">
<script src="<?php echo base_url()."assets/";?>datetimepicker/jquery.js"></script>
<script src="<?php echo base_url()."assets/";?>datetimepicker/build/jquery.datetimepicker.full.js"></script>

<style type="text/css">
	.form-control{
		border-color: #28a745;
	}.card-header{
		background-color:#787a7b;color:#fff
	}#loadding{
            position: fixed;
            left: 0px;
            width: 100%;
            height: 100%;
            padding-left:45%;
            padding-top: 15%;

    }.modal {
            display: none; 
            position: fixed;  
            height:100%; 
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4); 

    }
</style>

<div id="loadding" class="modal" style="display: none">
    <img src="<?php echo base_url();?>assets/images/loader.gif">
</div>

<form id="frmaddlead" name="frmaddlead" method="post">
<div class="card card-default" id="divshowLead">
    <?php $this->load->view('AddLead/div_addLead') ?>
</div>

</form>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-2">
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<button type="button" class="btn btn-sm btn-success">
					ค้นหา
				</button>
			</div>
			<select class="form-control" id="selecthead" name="selecthead">
				<option value="0">--เลือก--</option>
				<option value="name">ชื่อ-นามสกุล</option>
				<option value="CarDesc">รุ่นรถยนต์</option>
				<option value="CarBrand">ยี่ห้อรถยนต์</option>
				<option value="CarYear">ปีรถยนต์</option>
			</select>
		</div>
	</div>
	<div class="col-md-3">
		<input type="text" name="txtsearch" id="txtsearch" class="form-control ">
	</div>
	<div class="col-md-3">
		<button type="button" class="btn btn-success" onclick="btnSearch()"><i class="fas fa-search"></i></button>
	</div>
</div>

<div id="divLead">
	<?php $this->load->view('AddLead/sub_tableadd_lead') ?>
</div><br><br><br>


<script type="text/javascript">
	$("#expiration_date").datetimepicker();
</script>
<script type="text/javascript">
	function Saveadd_Lead(){
		var prefix          = document.getElementById("prefix").value;
		var fname           = document.getElementById("fname").value;
		var lastname        = document.getElementById("lastname").value;
		var model_car       = document.getElementById("model_car").value;
		var brand_car       = document.getElementById("brand_car").value;
		var year_car        = document.getElementById("year_car").value;
		var tel             = document.getElementById("tel").value;
		var paper_car       = document.getElementById("paper_car").value;
		var expiration_date = document.getElementById("expiration_date").value;

		if(prefix == 0){
			document.getElementById("prefix").focus();
		}else if(fname == "" ){
			document.getElementById("fname").focus();

		}else if(lastname == ""){
			document.getElementById("lastname").focus();

		}else if(model_car == ""){
			document.getElementById("model_car").focus();

		}else if(brand_car == ""){
			document.getElementById("brand_car").focus();
			
		}else if(year_car == ""){
			document.getElementById("year_car").focus();

		}else if(tel == ""){
			document.getElementById("tel").focus();
			
		}else if(paper_car == ""){
			document.getElementById("paper_car").focus();

		}else if(expiration_date == ""){
			document.getElementById("expiration_date").focus();
			
		}else{

				document.getElementById("loadding").style.display = "block";
				$.ajax({
		            type: "POST",
		            url: "<?php echo site_url('AddLead/SaveAdd_Lead') ?>",
		            data: $("#frmaddlead").serialize(),
		        }).done(function (data) {
		           document.getElementById("loadding").style.display = "none";
		           $('#divLead').html(data);
		       })
		}



	}
</script>
<script type="text/javascript">
	function reset_cancel(){
		document.getElementById("frmaddlead").reset();
	}
</script>
<script type="text/javascript">
	function pagging(){
		document.getElementById("loadding").style.display = "block";
		var page  = document.getElementById("page").value;
		var selecthead = document.getElementById("selecthead").value;
		var txtsearch = document.getElementById("txtsearch").value;

		var datas = "page="+page+"&selecthead="+selecthead+"&txtsearch="+txtsearch;
		$.ajax({
		            type: "POST",
		            url: "<?php echo site_url('AddLead/SearchAdd_Lead') ?>",
		            data: datas,
		        }).done(function (data) {
		           document.getElementById("loadding").style.display = "none";
		           $('#divLead').html(data);
		       })
	}
</script>
<script type="text/javascript">
	function btnSearch(){
		var selecthead = document.getElementById("selecthead").value;
		var txtsearch = document.getElementById("txtsearch").value;
		var datas = "selecthead="+selecthead+"&txtsearch="+txtsearch;
		 document.getElementById("loadding").style.display = "block";
		$.ajax({
		            type: "POST",
		            url: "<?php echo site_url('AddLead/SearchAdd_Lead') ?>",
		            data: datas,
		        }).done(function (data) {
		           document.getElementById("loadding").style.display = "none";
		           $('#divLead').html(data);
		       })
	}
</script>
<script type="text/javascript">
	function EditLead(PROSPECT_LIST_ID){
		var datas = "PROSPECT_LIST_ID="+PROSPECT_LIST_ID;
		document.getElementById("loadding").style.display = "block";
		$.ajax({
	            type: "POST",
	            url: "<?php echo site_url('AddLead/Edit_Lead') ?>",
	            data: datas,
	        }).done(function (data) {
	           document.getElementById("loadding").style.display = "none";
	           $('#divshowLead').html(data);
	       })

	}
</script>
<script type="text/javascript">
	function btnUpdate_Lead(PROSPECT_LIST_ID){
		document.getElementById("loadding").style.display = "block";
		$.ajax({
	            type: "POST",
	            url: "<?php echo site_url('AddLead/Update_Lead') ?>",
	            data: $("#frmaddlead").serialize()+"&PROSPECT_LIST_ID="+PROSPECT_LIST_ID,
	        }).done(function (data) {
	           document.getElementById("loadding").style.display = "none";
	           $('#divLead').html(data);
	       })
	}
</script>