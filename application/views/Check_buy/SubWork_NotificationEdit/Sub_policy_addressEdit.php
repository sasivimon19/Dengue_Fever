<br>
<?php foreach ($Call_Work as  $value) { ?>
<div class="row">
        <div class="col-sm-1" style="margin-left:-28px;">
              <input type="checkbox" class="form-control form-control-sm" id="same_address" name="same_address"  style="height: 25px;" onclick="FuncSameAddress()">
         </div>
        <div class="col-sm-3">
            <label>ที่อยู่เดียวกับที่อยู่ส่งเอกสาร</label>
        </div>
</div>
<div class="row">
    <div class="col-sm-4"> 
        <div class="form-group">
            <label>บ้านเลขที่ :</label>
            <input type="text" class="form-control form-control-sm" id="policy_number" name="policy_number" placeholder="บ้านเลขที่ ..."  value="<?php echo $value->CustomerAddr_Policy ?>">
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label>หมู่ที่ :</label>
            <input type="text" class="form-control form-control-sm" id="policy_moo" name="policy_moo" placeholder="หมู่ที่ ..." value="<?php echo $value->CustomerMoo_Policy ?>">
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label>หมูบ้าน : </label>
            <input type="text" class="form-control form-control-sm" id="policy_village" name="policy_village" placeholder="หมูบ้าน ..." value="<?php echo iconv("TIS-620", "UTF-8",$value->CustomerName_Village_Policy) ?>">
        </div>
    </div>
</div>

 <div class="row">

    <div class="col-sm-4"> 
       <div class="form-group">
            <label>ซอย : </label>
            <input type="text" class="form-control form-control-sm" id="policy_soi" name="policy_soi" placeholder="ซอย ..." value="<?php echo iconv("TIS-620", "UTF-8",$value->CustomerSoi_Policy) ?>">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>ถนน : </label>
            <input type="text" class="form-control form-control-sm" id="policy_road" name="policy_road" placeholder="ถนน ..." value="<?php echo iconv("TIS-620", "UTF-8",$value->CustomerRoad_Policy) ?>">
        </div>
    </div>
     <?php  $DISTRICT_ID = $value->CustomerDistrict_Doc; 
            $gettumbon = $this->Model_HomeInsurance->get_TumbonEdit($DISTRICT_ID); 
           foreach ($gettumbon as  $row) {  ?>
    <div class="col-sm-4">
       <div class="form-group">
            <label>จังหวัด :</label>
            <select class="form-control form-control-sm" id="policy_province" name="policy_province" onchange="openprovince()" >
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
    <div class="col-sm-4">
        <div class="form-group">
            <label>เขต/อำเภอ :</label>
            <select class="form-control form-control-sm" id="policy_district" name="policy_district"  onclick="openDISTRICT()" >
                <option value="<?php echo $row->AMPHUR_ID ?>" selected><?php echo iconv("TIS-620","UTF-8",$row->AMPHUR_NAME) ?></option>
            </select>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <label>แขวง/ตำบล : </label>
            <select class="form-control form-control-sm" id="policy_subdistrict" name="policy_subdistrict" >
                 <option value="<?php echo $row->DISTRICT_ID ?>" selected><?php echo iconv("TIS-620","UTF-8",$row->DISTRICT_NAME) ?></option>
            </select>
        </div>
    </div>
<?php } ?>
    <div class="col-sm-4">
        <div class="form-group">
            <label>รหัสไปรษณีย์ :</label>
            <input type="text" class="form-control form-control-sm" placeholder="รหัสไปรษณีย์" name="policy_zip" id="policy_zip" maxlength="5" OnKeyPress="return chkNumber(this)" value="<?php echo $value->CustomerZip_Policy ?>">
        </div>
    </div>
 </div>

<?php } ?>

<script type="text/javascript">
    function openprovince(){
        var policy_province = document.getElementById("policy_province").value;

        var datas= "PROVINCE_ID="+policy_province;
        $.ajax({
            type:"POST",
            url:"<?php echo site_url('HomeInsurance/FUN_AMPHUR')?>",
            data:datas
        }).done(function(data){ 
            $('#policy_district').html(data);
                
            }) 

    }
</script>
<script type="text/javascript">
    function openDISTRICT(){
         var policy_district = document.getElementById("policy_district").value;
 
       
        var datas= "AMPHUR_ID="+policy_district;
        $.ajax({
            type:"POST",
            url:"<?php echo site_url('HomeInsurance/FUN_DISTRICTNAME')?>",
            data:datas
        }).done(function(data){ 
            $('#policy_subdistrict').html(data);
                
            }) 
    }
</script>



