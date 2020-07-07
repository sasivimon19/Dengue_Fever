<style type="text/css">
 
</style>
<br>
<?php foreach ($Call_Work as  $value) { ?>
<div class="row">
        <div class="col-sm-4">
            <div class="form-group">
                <label>คำนำหน้า :</label>
                <input type="text" name="prefix" id="prefix"  class="form-control form-control-sm" value="<?php echo iconv("TIS-620//IGNORE", "UTF-8//IGNORE",$value->int) ?>" readonly>
            </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>ชื่อผู้เอาประกันภัย :</label>
            <input type="text" class="form-control form-control-sm" id="txtname" name="txtname" value="<?php echo iconv("TIS-620//IGNORE", "UTF-8//IGNORE",$value->CustomerFirstname) ?>" readonly>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>นามสกุล :</label>
            <input type="text" class="form-control form-control-sm" id="txtsur" name="txtsur" value="<?php echo iconv("TIS-620//IGNORE", "UTF-8//IGNORE",$value->CustomerLastname) ?>" readonly>
        </div>
    </div>
   

     
</div>

<div class="row">
     <div class="col-sm-4"> 
        <div class="form-group">
            <label id="subhead">เลขบัตรประชาชน :</label>
            <input type="text" class="form-control form-control-sm" id="txtidcard" name="txtidcard" value="<?php echo $value->IDCard ?>" readonly>
            <input type="hidden" id="txtdefault" name="txtdefault" value="<?php echo $value->IDCard  ?>" >
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>วันเกิด :</label>
            <input type="date" class="form-control form-control-sm" id="txtbd" name="txtbd" value="<?php echo date("Y-m-d",strtotime($value->BirthDate)) ?>" readonly>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>อายุdd :</label>
            <input type="text" class="form-control form-control-sm"   id="txtage1" name="txtage1" value="<?php echo $value->Age ?>" readonly>
        </div>
    </div>
</div>

<?php } ?>




