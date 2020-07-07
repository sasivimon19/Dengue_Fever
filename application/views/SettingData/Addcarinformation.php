
<div class="col-md-4">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <button type="button"class="btn btn-default" style="background-color: #ae1b09; color:  white; "onclick="Upload_FileCar()"><i class="fas fa-file-import"></i> <b>Import</b> </button> 
        </div>
        <input type="file" name="fileupCar" id="fileupCar" class="form-control" >
        <div class="input-group-prepend" >
            <button type="button" class="btn btn-success"  id="buttonSavecheck" onclick="Save_Impost()"><i class="fas fa-edit"></i> บันทึก </button> 
        </div>   
    </div>
</div>  



<div class="card-body">
    <div class="row">
        <div class="input-group input-group-sm">
            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary">ยี่ห้อรถยนต์</button>
                    </div>
                    <select class="form-control" id="CarBrand" name="CarBrand">
                        <option value="0"> -- เลือกยี่ห้อรถยนต์ --</option>
                        <?php foreach ($GetCarBrand as $value) { ?>
                            <?php if ($CarBrand == $value->CarBrand) { ?>
                                <option value="<?php echo $CarBrand; ?>"selected><?php echo $CarBrand; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $value->CarBrand; ?>"><?php echo $value->CarBrand; ?></option>         
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary">รุ่นรถยนต์</button>
                    </div>
                    <input type="text" class="form-control" id="CarModel" name="CarModel" value="<?php echo $CarModel; ?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary">รุ่นย่อยรถยต์</button>
                    </div>
                    <input type="text" class="form-control" id="MakeDescription" name="MakeDescription" value="<?php echo $MakeDescription; ?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary">ปีรถยนต์</button>
                    </div>
                    <?php $current_year = date("Y", strtotime($Currentdate)); ?>
                    <select class="form-control" id="CarYear" name="CarYear">
                        <option value="0"> -- เลือกปีรถยนต์ --</option>   
                        <?php for ($i = -12; $i < 2; $i++) { ?>
                            <?php if ($CarYear == ($current_year + $i)) { ?>
                                <option value="<?php echo $CarYear ?>"selected> <?php echo $CarYear; ?> [<?php echo $CarYear + 543 ?>] </option>
                            <?php } else { ?>
                                <option value="<?php echo($current_year + $i); ?>"> <?php echo $YEAR = ($current_year + $i); ?> [<?php echo $YEAR + 543 ?>] </option>
                            <?php } ?>      
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary">ซีซี</button>
                    </div>
                    <select class="form-control" id="EngineCC" name="EngineCC">
                        <option value="0"> -- เลือกซีซี --</option>
                        <?php foreach ($GetEngineCC as $value) { ?>
                            <?php if ($EngineCC == $value->EngineCC) { ?>
                                <option value="<?php echo $EngineCC; ?>"selected><?php echo $EngineCC; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $value->EngineCC; ?>"><?php echo $value->EngineCC; ?></option>
                            <?php } ?>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary">Group</button>
                    </div>

                    <select class="form-control" id="Group" name="Group">
                        <option value="0"> -- เลือกกลุ่ม --</option>
                        <?php foreach ($Group_Car as $item) { ?>
                            <?php if ($Group == $item->Group_Car) { ?>
                                <option value="<?php echo $Group ?>"selected><?php echo $Group; ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $item->Group_Car ?>"><?php echo $item->Group_Car; ?></option>
                            <?php } ?>

                        <?php } ?>      
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary"> ราคารถยนต์</button>
                    </div>
                    <input type="text" class="form-control" id="NewPrice" name="NewPrice" value="<?php echo $NewPrice ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <button type="button" class="btn btn-primary"> วันที่บันทึก </button>
                    </div>
                    <?php if ($SaveDate != '' || $SaveDate != NULL) { ?>
                        <input type="text" class="form-control" id="SaveDate" name="SaveDate" value='<?php echo $SaveDate ?>' readonly="true">
                    <?php } else { ?>
                        <input type="text" class="form-control" id="SaveDate" name="SaveDate" value='<?php echo $Currentdate ?>' readonly="true">
                    <?php } ?>
                </div>
            </div>
        </div>

        <!--    <div class="col-md-5"></div>  
            <div class="card-footer">
        <?php //if ($StatusEdit != "Editcar") { ?>
                    <button type="button" class="btn btn-info" onclick="ADD_CarInformation()"> ADD11 </button>&nbsp;
        <?php //} else { ?>
                    <button type="button" class="btn btn-info" onclick="Edit_Car_Information()">Edit</button>&nbsp;
        <?php // } ?>  
                    <button type="button" class="btn btn-danger float-right" onclick="CleanCarInformation()">Cancel</button>
            </div>-->

        <div class="input-group mb-12" style=" margin-left: 40%;">
            <?php if ($StatusEdit != "Editcar") { ?>
                <!--<div class="input-group-prepend">-->
                <button type="button" class="btn btn-info" onclick="ADD_CarInformation()"> ADD </button>&nbsp;
                <!--</div>-->
            <?php } else { ?>
                <!--<div class="input-group-prepend" >-->   
                <button type="button" class="btn btn-info" onclick="Edit_Car_Information()">Edit</button>&nbsp;
                <!--</div>-->
            <?php } ?>  
            <!--<div class="input-group-prepend" >-->   
            <button type="button" class="btn btn-danger float-right" onclick="CleanCarInformation()">Cancel</button>
            <!--</div>--> 
        </div>
    </div>
</div>


<!--</form>-->

<script>
    function Upload_FileCar() {
        
        var fileupCar = document.getElementById('fileupCar').value;
      
        var form_data = new FormData();
        
        form_data.append('fileupCar', $('#fileupCar')[0].files[0]);
        
        if (fileupCar == '') {
            swal("กรุณาเลือกไฟล์ก่อน", "", "warning");
        } else {
            document.getElementById("loaddingearch").style.display = "block";
            $.ajax({
                cache: false,
                type: 'POST',
                url: '<?php echo site_url('Management_Data/Import_FileCarInformation'); ?>', //Import
                contentType: false,
                processData: false,
                data: form_data,
                
                }).done(function (data) {
                    document.getElementById("loaddingearch").style.display = "none";
                    $('#Table_carinformation').html(data); 
                })
            };
        }

</script>



<script type="text/javascript">
    function UpdateEdit_CarTeam(Code_Car) {

        var CarBrandEdit = document.getElementById('CarBrandEdit' + Code_Car).value;
        var CarModelEdit = document.getElementById('CarModelEdit' + Code_Car).value;
        var MakeDescriptionEdit = document.getElementById('MakeDescriptionEdit' + Code_Car).value;
        var CarYearEdit = document.getElementById('CarYearEdit' + Code_Car).value;
        var EngineCCEdit = document.getElementById('EngineCCEdit' + Code_Car).value;
        var GroupEdit = document.getElementById('GroupEdit' + Code_Car).value;
        var NewPriceEdit = document.getElementById('NewPriceEdit' + Code_Car).value;

        var datas = "Code_Car=" + Code_Car + "&CarBrandEdit=" + CarBrandEdit + "&CarModelEdit=" + CarModelEdit +
                "&MakeDescriptionEdit=" + MakeDescriptionEdit + "&CarYearEdit=" + CarYearEdit + "&EngineCCEdit=" + EngineCCEdit +
                "&GroupEdit=" + GroupEdit + "&NewPriceEdit=" + NewPriceEdit;

        document.getElementById("loaddingearch").style.display = "block";

        swal({
            title: "คุณแน่ใจหรือไม่",
            text: "คุณจะไม่สามารถกู้คืนข้อมูลได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "แก้ไขข้อมูล!",
            cancelButtonText: "ไม่แก้ไขข้อมูล!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        swal("แก้ไข!", "ข้อมูลถูกแก้ไขเรียบร้อย");
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('Management_Data/UPDATE_ADDTMP') ?>",
                            data: datas,
                        }).done(function (data) {
                            $('#Table_carinformation').html(data);
                        })
                    } else {
                        swal("ไม่แก้ไข", "ข้อมูลยังไม่ถูกแก้ไข");
                    }

                });
        document.getElementById("loaddingearch").style.display = "none";
    }
</script>  


<script type="text/javascript">
    function DeleteEdit_CarTeam(Code_Car) {

        var datas = "Code_Car=" + Code_Car;

        document.getElementById("loaddingearch").style.display = "block";

        swal({
            title: "คุณแน่ใจหรือไม่",
            text: "คุณจะไม่สามารถกู้คืนข้อมูลได้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "ลบข้อมูล!",
            cancelButtonText: "ไม่ลบข้อมูล!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        swal("ลบ!", "ข้อมูลถูกลบเรียบร้อย");
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('Management_Data/DELETE_ADDTMP') ?>",
                            data: datas,
                        }).done(function (data) {
                            $('#Table_carinformation').html(data);
                        })
                    } else {
                        swal("ไม่ลบ", "ข้อมูลยังไม่ลบ");
                    }

                });
        document.getElementById("loaddingearch").style.display = "none";
    }
</script>  











