
 <br>
 <?php foreach ($Call_Work as  $value) { ?>
<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>บ้านเลขที่ :</label><label style="color: red">&nbsp;*</label>
            <input type="text" class="form-control form-control-sm" id="number" name="number"  value="<?php echo $value->CustomerAddr_Doc ?>">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>หมู่ที่ :</label>
            <input type="text" class="form-control form-control-sm" id="moo" name="moo" value="<?php echo iconv("TIS-620//ignore","UTF-8//ignore",$value->CustomerMoo_Doc) ?>" >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>หมู่บ้าน : </label>
            <input type="text" class="form-control form-control-sm" id="village" name="village" value="<?php echo iconv("TIS-620//ignore","UTF-8//ignore",$value->CustomerName_Village_Doc) ?>" >
        </div>
    </div>
</div>

<div class="row">
     <div class="col-sm-4">
         <div class="form-group">
            <label>ซอย : </label>
            <input type="text" class="form-control form-control-sm " id="soi" name="soi" value="<?php echo iconv("TIS-620//ignore","UTF-8//ignore",$value->CustomerSoi_Doc) ?>" >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>ถนน : </label>
            <input type="text" class="form-control form-control-sm" id="road" name="road" value="<?php echo iconv("TIS-620//ignore","UTF-8//ignore",$value->CustomerRoad_Doc) ?>" >
        </div>
    </div>
    <?php  $DISTRICT_ID = $value->CustomerDistrict_Doc; 
           $gettumbon = $this->Model_HomeInsurance->get_TumbonEdit($DISTRICT_ID); 
           foreach ($gettumbon as  $row) {  ?>

         <div class="col-sm-4">
             <div class="form-group">
                <label>จังหวัด :</label><label style="color: red">&nbsp;*</label>
                <select class="form-control form-control-sm" id="province" name="province" onclick="AMPHUR_DOCUMENT()">
                    <option value="0">-- เลือกจังหวัด--</option>

            <?php foreach ($PROVINCE as $row2) { ?>
                   <?php if($row->PROVINCE_ID == $row2->PROVINCE_ID){ ?>
                              <option value="<?php echo $row2->PROVINCE_ID; ?>" selected><?php echo iconv('TIS-620', 'UTF-8', $row2->PROVINCE_NAME); ?></option>
                   <?php }else{ ?>
                              <option value="<?php echo $row2->PROVINCE_ID; ?>"><?php echo iconv('TIS-620', 'UTF-8', $row2->PROVINCE_NAME); ?></option>
                   <?php } ?>
        
            <?php } ?>
                </select>
            </div>
        </div>
</div>

<div class="row">
     <div class="col-sm-4">
         <div class="form-group">
            <label>เขต/อำเภอ :</label><label style="color: red">&nbsp;*</label>
            <select class="form-control form-control-sm" id="district" name="district"  onclick="DISTRICT_DOCUMENT()"   >
                <option value="<?php echo $row->AMPHUR_ID ?>" selected><?php echo iconv("TIS-620","UTF-8",$row->AMPHUR_NAME) ?></option>
            </select>
        </div>
    </div>
     <div class="col-sm-4">
         <div class="form-group">
            <label>แขวง/ตำบล : </label><label style="color: red">&nbsp;*</label>
            <select class="form-control form-control-sm" id="subdistrict" name="subdistrict"  onclick="SUBDISTRICT_DOCUMENT()"> 
                <option value="<?php echo $row->DISTRICT_ID ?>" selected><?php echo iconv("TIS-620","UTF-8",$row->DISTRICT_NAME) ?></option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>รหัสไปรษณีย์ :</label><label style="color: red">&nbsp;*</label>
            <input type="text" class="form-control form-control-sm" id="zip" name="zip" value="<?php echo $value->CustomerZip_Doc ?>" >
        </div>
    </div>
    
</div>
<?php } ?>

<div class="row">
     <div class="col-sm-4">
        <div class="form-group">
            <label>โทรศัพท์ที่ทำงาน : </label>
            <input type="text" class="form-control form-control-sm" id="tel_work" name="tel_work" placeholder="โทรศัพท์ที่ทำงาน ..." value="<?php echo $value->CustomerOfficeTel ?>" >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>โทรศัพท์มือถือ :</label><label style="color: red">&nbsp;*</label>
            <input type="text" class="form-control form-control-sm" id="phone" name="phone" placeholder="โทรศัพท์มือถือ ..." value="<?php echo $value->CustomerMobileTel ?>" >
        </div>
    </div>
     <div class="col-sm-4">
        <div class="form-group">
            <label>โทรศัพท์บ้าน :</label>
            <input type="text" class="form-control form-control-sm" id="tel" name="tel" placeholder="โทรศัพท์บ้าน ..."  value="<?php echo $value->CustomerHomeTel ?>">
        </div>
    </div>
</div>
<div class="row">
   <div class="col-sm-12">
        <div class="form-group">
            <label>ติดต่อคุณ : </label><label style="color: red">&nbsp;*</label>
            <input type="text" class="form-control form-control-sm" id="contact" name="contact" placeholder="ติดต่อคุณ ..."  value="<?php echo iconv("TIS-620//ignore","UTF-8//ignore",$value->Contact_Customer) ?>">
        </div>
    </div>
</div>

<?php } ?>
<input type="hidden" name="txtprovince" id="txtprovince" value="">
<input type="hidden" name="txtnumphur" id="txtnumphur" value="">
<input type="hidden" name="txttumbon" id="txttumbon" value="">


<script type="text/javascript">
    function AMPHUR_DOCUMENT(){
        var province = document.getElementById("province").value;
        document.getElementById("txtprovince").value = province;
 
       
        var datas= "PROVINCE_ID="+province;
        $.ajax({
            type:"POST",
            url:"<?php echo site_url('HomeInsurance/FUN_AMPHUR')?>",
            data:datas
        }).done(function(data){ 
            $('#district').html(data);
                
            }) 

    }
</script>
<script type="text/javascript">
    function DISTRICT_DOCUMENT(){ 
        var district = document.getElementById("district").value;
        document.getElementById("txtnumphur").value = district;
       
        var datas= "AMPHUR_ID="+district;
        $.ajax({
            type:"POST",
            url:"<?php echo site_url('HomeInsurance/FUN_DISTRICTNAME')?>",
            data:datas
        }).done(function(data){ 
            $('#subdistrict').html(data);
                
            }) 
    }
</script>
<script type="text/javascript">
    function SUBDISTRICT_DOCUMENT(){
        var subdistrict = document.getElementById("subdistrict").value;
        document.getElementById("txttumbon").value = subdistrict;
    }
</script>

