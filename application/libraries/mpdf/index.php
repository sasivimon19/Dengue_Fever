	
		

	
	
			<span onclick="document.getElementById('fromedit').style.display='none'" class="close" style="margin-right:2%; margin-top:1%" title="Close Modal">&times;</span>
         
       
	<div class="container" style="margin-right:-15%">
		<?php foreach($queryEmp3 as $items){  ?>
			  <div class="row">
				<div class="col-md-1">
					<label>IDCARD</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="idcard1" id="idcard1" value="<?php echo $items->IDcard; ?>"  maxlength="13"  onKeyPress="Checknumber()" >
				</div>
				<div class="col-md-2">
					<label>เลขที่สัญญา</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="idacc" id="idacc" readonly  value="<?php echo $items->Accno; ?>" >
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>ComCode</label>
				</div>
				<div class="col-md-3">
					<select class="form-control" name="comcode" id="comcode" >
					<!---------Loop Table Tbl_Comcode---------->
			<?php 		foreach ($queryComcode as $items1){ 
					if($items1->Code == $items->ComCode){
			?>
						<option value="<?php echo $items1->Code; ?>" selected ><?php echo $items1->Code; ?></option>	
			<?php	}	else{  ?>
						<option value="<?php echo $items1->Code; ?>"><?php echo $items1->Code; ?></option>
						
			<?php } }?>
					</select>
				</div>
				<div class="col-md-2">
					<label>เบอร์โทร</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="tel" id="tel" width="30%" placeholder="กรุณากรอกเบอร์โทร" 
					onkeyup="Symboltel(this)" onKeyPress="Checknumber()" value="<?php echo $items->Addr_Tel; ?>" >	
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>คำนำหน้า</label>
				</div>
				<div class="col-md-3">
					<select class="form-control" name="intemp" id="intemp" onclick="" >
				<?php if($items->IntEmp == $items->IntEmp){ ?>
						<option value="<?php echo iconv('tis-620','utf-8',$items->IntEmp) ?>"selected><?php echo iconv('tis-620','utf-8',$items->IntEmp) ?></option>
							<?php if($items->IntEmp == "นาง"){   ?>
							<option value="<?php echo iconv('tis-620','utf-8',$items->IntEmp) ?>"><?php echo iconv('tis-620','utf-8',$items->IntEmp) ?></option>
									<option value="นาง">นาง</option>
									<option value="นาย">นาย</option>
							<?php }else if($items->IntEmp == "นางสาว"){  ?>
									<option value="นาง">นายกกกก</option>
							<?php }?>
				<?php }else{	?>		
						<option value="นางสาว">0</option>
						<option value="นาง">นาง</option>
						<option value="นาย">นาย</option>
				<?php }?>
					</select>
				</div>
				<div class="col-md-2">
					<label>ชื่อ</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="fname" id="fname" width="30%" style="margin-left:-15%"
					value="<?php echo iconv('tis-620','utf-8',$items->FirstName); ?>" >
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>นามสกุล</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="sname" id="sname" width="30%"
					value="<?php  echo iconv('tis-620','utf-8',$items->LastName); ?>" style="margin-left:0%" >
				</div>
				<div class="col-md-2">
					<label>เลขที่บ้าน</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="number" id="number" width="30%" 
					value="<?php echo $items->Addr_Num; ?>"   >
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>หมู่บ้าน</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="village" id="village" width="30%"
					value="<?php  echo iconv('tis-620','utf-8',$items->Addr_Village); ?>" >
				</div>
				<div class="col-md-2">
					<label>หมู่</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="moo" id="moo" width="30%" value="<?php echo $items->Addr_Moo; ?>"  >
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>ซอย</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="soi" id="soi" width="30%" value="<?php echo iconv('tis-620','utf-8',$items->Addr_Soi); ?>">
				</div>
				<div class="col-md-2">
					<label>ถนน</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="road" id="road" width="30%"
					value="<?php  echo iconv('tis-620','utf-8',$items->Addr_Road); ?>" >
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>ตำบล</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="district" id="district" width="30%" 
					value="<?php  echo iconv('tis-620','utf-8',$items->Addr_District); ?>" >
				</div>
				<div class="col-md-2">
					<label>อำเภอ</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="subdistrict" id="subdistrict" width="30%"
					value="<?php echo iconv('tis-620','utf-8',$items->Addr_Amphur); ?>" >
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>จังหวัด</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="province" id="province" width="30%" 
					value="<?php  echo iconv('tis-620','utf-8',$items->Addr_Province); ?>" >
				</div>
				<div class="col-md-2">
					<label>ไปรษณีย์</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="zip" id="zip" width="30%" placeholder="กรุณากรอกรหัสไปร" 
					maxlength ="5" onKeyPress="Checknumber()" value="<?php  echo $items->Addr_Zip; ?>" >
				</div>
			  </div><br>
			  <div class="row">
				<div class="col-md-1">
					<label>Email</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" name="email" id="email" width="30%" value="<?php echo $items->Email; ?>" >
				</div>
			  </div>
	<?php }?>
		
 </div>   
 
        <div class="modal-footer">
			<button type="button" class="btn btn-success" onclick="Editbtn()" >บันทึกการแก้ไข</button>
			<button type="button" class="btn btn-danger" onclick="document.getElementById('fromedit').style.display='none'">ยกเลิก</button>
        </div>
	<div id="showedit"></div>		
<script>
 function Editbtn(){
		$.ajax({
			type: "POST",
		    url: "<?php echo site_url('Welcome/EditEmp')?>",
			data: $("#detailedit").serialize(),
			}).done(function( data ) {
			 $('#showedit').html(data);
			 alert("FrmEdit");
			 location.reload();
		});

	}
</script>	
<script>
function Showintname(){
	var intemp = $('#intemp').val();
	if(intemp == "นางสาว"){
		alert(intemp);
		$('#intemp').val("นาย999");
	}else if(intemp == "นาง"){
		alert(intemp);
		$('#intemp').val("นาง");
	}else if(intemp == "นาย"){
		alert(intemp);
		$('#intemp').val("นาย");
	}
}
</script>	
		
