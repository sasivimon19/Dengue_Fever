<br>
<?php foreach ($Call_Work as  $value) { ?>
<div class="row">
    <div class="col-sm-3">
         <div class="form-group">
            <label>ยี่ห้อรถยนต์ :</label>
            <input type="text" class="form-control form-control-sm" id="datacar_brand" name="datacar_brand" value="<?php echo $value->CarBrand ?>" readonly>
        </div>
    </div>
     <div class="col-sm-3">
         <div class="form-group">
            <label>รุ่นรถยนต์ :</label>
            <input type="text" class="form-control form-control-sm" id="datacar_model" name="datacar_model" value="<?php echo $value->CarDesc ?>" readonly>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>ปีที่จดทะเบียน :</label>
             <input type="text" class="form-control form-control-sm" id="datacar_Y_regis" name="datacar_Y_regis" value="<?php echo $value->CarYear ?>" readonly>
        </div>
    </div>
     <div class="col-sm-3">
         <div class="form-group">
            <label>ประเภทรถยนต์ :</label>
            <input type="text" class="form-control form-control-sm" id="datacar_type" name="datacar_type" value="<?php echo  iconv("TIS-620//ignore","UTF-8",$value->CarType)  ?>" readonly>

        </div>
    </div>
     
</div>

<div class="row">
    <div class="col-sm-3">
        <div class="form-group">
            <label>ทะเบียนรถยนต์ :</label>
             <input type="text" class="form-control form-control-sm" id="datacar_paper" name="datacar_paper" value="<?php echo iconv("TIS-620//IGNORE","UTF-8//IGNORE",$value->CarLicensePlate)?>" readonly>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>จังหวัด</label>
            <input type="text" class="form-control form-control-sm" value="<?php echo iconv("TIS-620//IGNORE","UTF-8//IGNORE",$PROVINCE_NAME) ?>" readonly="true">
            <!-- ซ่อนเพื่อเอาค่า ID ไป Insert-->
            <input type="hidden" class="form-control form-control-sm" id="datacar_province" name="datacar_province" value="<?php echo $value->CarLicensePlateProvince ?>">
        
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>เลขตัวถัง</label><label style="color: red">&nbsp;*</label>
            <input type="text" class="form-control form-control-sm" id="datacar_number" name="datacar_number" value="" >
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>เลขเครื่องยนต์ :</label><label style="color: red">&nbsp;*</label>
            <input type="text" class="form-control form-control-sm" id="datacar_no" name="datacar_no" value="<?php echo $value->EngineNo ?>" >
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-2">
        <div class="form-group">
            <label>CC :</label>
            <select class="form-control form-control-sm" id="datacar_cc" name="datacar_cc">
                <option value="0">--เลือก--</option>
                <?php foreach ($GetCC as  $value) { ?>
                  <option value="<?php echo $value->EngineCC ?>"><?php echo $value->EngineCC ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-2">
        <div class="form-group">
            <label>ที่นั่ง :</label>
            <input type="text" class="form-control form-control-sm" id="datacar_seat" name="datacar_seat" value="" >
        </div>
    </div>
     <div class="col-md-2">
        <div class="form-group">
            <label>น้ำหนัก :</label>
            <input type="text" class="form-control form-control-sm" id="datacar_weight" name="datacar_weight" value="" >
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>อุปกรณ์ตกแต่ง :</label>
            <input type="text" class="form-control form-control-sm" id="datacar_beauty" name="datacar_beauty" value="" >
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-group">
            <label>ราคาอุปกรณ์ตกแต่ง :</label>
            <input type="text" class="form-control form-control-sm" id="datacar_price" name="datacar_price" value="" >
        </div>
    </div>
</div>


<?php } ?>

<!-- <script type="text/javascript">
    function carbrand(){
        var datacar_brand = document.getElementById('datacar_brand').value;
        var datas = "car_brand="+datacar_brand;
       
         $.ajax({
            type:"POST",
            url:"<?php echo site_url('HomeInsurance/Check_Car_Model')?>",
            data:datas
        }).done(function(data){ 
       
            $('#datacar_model').html(data);
          }) 
        
    }
</script>
<script type="text/javascript">
    function carmodel(){
        var datacar_model = document.getElementById('datacar_model').value;
        var datas = "Car_modil="+datacar_model;
       
         $.ajax({
            type:"POST",
            url:"<?php echo site_url('HomeInsurance/Check_Year_Car')?>",
            data:datas
        }).done(function(data){ 
            $('#datacar_Y_regis').html(data);
          }) 
        
    }
</script>
<script type="text/javascript">
    function caryear(){
        var datacar_brand = document.getElementById('datacar_brand').value;
        var datacar_model = document.getElementById('datacar_model').value;
        var datacar_Y_regis = document.getElementById('datacar_Y_regis').value;

        var datas = "car_brand="+datacar_brand+"&Car_modil="+datacar_model+"&YearGroup="+datacar_Y_regis;
       
         $.ajax({
            type:"POST",
            url:"<?php echo site_url('HomeInsurance/Check_Typecar')?>",
            data:datas
        }).done(function(data){ 
            $('#datacar_type').html(data);
          }) 
        
    }
</script> -->
