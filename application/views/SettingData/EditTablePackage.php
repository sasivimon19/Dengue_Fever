<form class="form-inline ml-12" id="Package_view" name="Package_view">
    <div class="input-group input-group-sm">
        <div class="col-md-6">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary">รหัสบริษัท</button>
                </div>
                <select class="form-control" id="ID_InsureCode" name="ID_InsureCode">
                    <option value="0"> -- เลือกรหัสบริษัท --</option>
                    <?php foreach ($Get_Insure as $value) { ?>
                        <?php if ($Auto_ID == $value->Auto_ID) { ?>
                            <option value="<?php echo $value->Auto_ID ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Company) ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $value->Auto_ID ?>"><?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Company) ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary">ซื่อแพ็ดเก็ต</button>
                </div>
                <input type="text" class="form-control" id="NamePackage" name="NamePackage" value="<?php echo $NamePackage ?>">
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary">วันที่บันทึก</button>
                </div>
                <?php if ($SaveDate != '' || $SaveDate != NULL) { ?>
                     <input type="text" class="form-control" id="SaveDate" name="SaveDate" value="<?php echo $SaveDate ?> " readonly="true">
                <?php } else { ?>
                     <input type="text" class="form-control" id="SaveDate" name="SaveDate" value="<?php echo $Currentdate ?> " readonly="true">
                <?php } ?>

            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <button type="button" class="btn btn-primary">สถาานะการใช้งาน</button>
                </div>
                <select class="form-control" id="Status_Package" name="Status_Package">
                    <option value="0"> -- เลือกสถาานะการใช้งาน --</option>
                    <?php if ($Status_Package == "Active") { ?>
                        <option value="Active" selected>  Active </option>
                        <option value="Nonactive">  Nonactive </option>
                    <?php } else if ($Status_Package == "Nonactive") { ?>
                        <option value="Active">  Active </option>
                        <option value="Nonactive" selected>  Nonactive </option>
                    <?php } else { ?>
                        <option value="Active">  Active </option>
                        <option value="Nonactive">  Nonactive </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    

    <div class="col-md-5"></div>  
    <div class="card-footer">
        <?php if ($StatusEdit != "Edit") { ?>
            <button type="button" class="btn btn-info" onclick="ADD_CarPackage()">ADD</button>&nbsp;
        <?php } else { ?>
            <button type="button" class="btn btn-info" onclick="Edit_Car_Package(IDPackage = '<?php echo $IDPackage; ?>')">Edit</button>&nbsp;
        <?php } ?>
            <button type="button" class="btn btn-danger float-right" onclick="Cleandata()">Cancel</button>
    </div>    
</form>