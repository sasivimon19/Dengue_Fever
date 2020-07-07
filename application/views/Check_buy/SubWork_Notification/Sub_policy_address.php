<br>
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
            <input type="text" class="form-control form-control-sm" id="policy_number" name="policy_number" placeholder="บ้านเลขที่ ...">
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label>หมู่ที่ :</label>
            <input type="text" class="form-control form-control-sm" id="policy_moo" name="policy_moo" placeholder="หมู่ที่ ..." >
        </div>
    </div>
    <div class="col-sm-4"> 
        <div class="form-group">
            <label>หมูบ้าน : </label>
            <input type="text" class="form-control form-control-sm" id="policy_village" name="policy_village" placeholder="หมูบ้าน ..." >
        </div>
    </div>
</div>

 <div class="row">

    <div class="col-sm-4"> 
       <div class="form-group">
            <label>ซอย : </label>
            <input type="text" class="form-control form-control-sm" id="policy_soi" name="policy_soi" placeholder="ซอย ..." >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>ถนน : </label>
            <input type="text" class="form-control form-control-sm" id="policy_road" name="policy_road" placeholder="ถนน ..." >
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <label>จังหวัด :</label>
            <select class="form-control form-control-sm" id="policy_province" name="policy_province" onchange="openprovince()">
                <!-- <?php foreach ($PROVINCE as $value) { ?> -->
                  <!--   <option value="<?php echo $value->PROVINCE_ID; ?>"><?php echo iconv('TIS-620', 'UTF-8', $value->PROVINCE_NAME); ?></option> -->
            <!--     <?php } ?> -->
            </select>
        </div>
    </div>



    <div class="col-sm-4">
        <div class="form-group">
            <label>เขต/อำเภอ :</label>
            <select class="form-control form-control-sm" id="policy_district" name="policy_district"  onclick="openDISTRICT()" >
             
            </select>
        </div>
    </div>
    <div class="col-sm-4">
       <div class="form-group">
            <label>แขวง/ตำบล : </label>
            <select class="form-control form-control-sm" id="policy_subdistrict" name="policy_subdistrict" >
                <!-- <option value="0">-- เลือกเขต/ตำบล --</option> -->
            </select>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>รหัสไปรษณีย์ :</label>
            <input type="text" class="form-control form-control-sm" placeholder="รหัสไปรษณีย์" name="policy_zip" id="policy_zip" maxlength="5" OnKeyPress="return chkNumber(this)">
        </div>
    </div>
 </div>



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



