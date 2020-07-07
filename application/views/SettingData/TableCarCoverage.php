
<?php if($CountCoverRate == 0){ ?>

<?php }else { ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #E5E7E9">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title"><b> <i class="fas fa-edit"></i> แสดงข้อมูลตารางความคุ้มครอง</b></h3>
                            </div>
                        </div>
                       
                    </div>
                     
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead  style="background-color: gray;">
                                <tr>
                                <th style="text-align: center; white-space:nowrap;">#<p></p></th>
                                <?php if($StatusCoverage_Check == ""){ ?>
<!--                                <th style="text-align: center; white-space:nowrap;">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxStatus_ALL" type="checkbox" id="CoverageStatus_ALL" name="CoverageStatus_ALL[]" >                               
                                        <label for="CoverageStatus_ALL"></label>
                                    </div>
                                </th>-->
                                <th style="text-align: center; white-space:nowrap;">สถานะ<p></p></th>
                                <th colspan="2" style="text-align: center; white-space:nowrap;"><label style=" margin-bottom: 19%;">แก้ไข</label></th>
                                <?php }else { ?>
<!--                                <th style="text-align: center; white-space:nowrap;">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxCoverRate" type="checkbox" id="TmpCoverage_ALL" name="TmpCoverage_ALL[]" >                               
                                        <label for="TmpCoverage_ALL"></label>
                                    </div>
                                </th>-->
                                <th colspan="3" style="text-align: center; white-space:nowrap;"><label style=" margin-bottom: 12%;">แก้ไข</label></th>
                                <?php } ?>
                                   
                                    <th style="text-align: center; white-space:nowrap;">รหัสความคุ้มครอง<p></p></th>
                                    <th style="text-align: center; white-space:nowrap;">รหัสแพ็คเกจ<p></p></th>
                                    <th style=" white-space:nowrap;">ซื่อบริษัท<p></p></th>
                                    <th style="text-align: center; white-space:nowrap;">ความคุ้มครองหลัก<p>ความรับผิดต่อบุคคล</p></th>
                                    <th style="text-align: center; white-space:nowrap;">ความเสียหายต่อชีวิต<p>ร่างกาย/อนามัย </p></th>
                                    <th style="text-align: center; white-space:nowrap;">สูงสุดไม่เกิน<p></p></th>
                                    <th style="text-align: center; white-space:nowrap;">ความเสียหาย <p>ต่อทรัพย์สิน</p></th>
                                    <th style="text-align: center; white-space:nowrap;">อุบัติเหตุส่วนบุคคล <p>ของผู้โดยสารและผู้ขับขี่</p></th>
                                    <th style="text-align: center; white-space:nowrap;">ค่ารักษาพยาบาล<p>ของผู้โดยสารและผู้ขับขี่</p></th>
                                    <th style="text-align: center; white-space:nowrap;">การประกันตัวผู้ขับขี่<p></p></th>
                                    <th style="text-align: center; white-space:nowrap;">ความคุ้มครอง<p>รถยนต์เสียหาย</p> </th>
                                    <th style="text-align: center; white-space:nowrap;">ความเสียหายส่วนแรก <p></p></th>
                                    <th style="text-align: center; white-space:nowrap;">ความคุ้มครอง<p>รถยนต์สูญหาย/ไฟไหม้</p></th>
                                    <th style="text-align: center; white-space:nowrap;">ทุนประกัน<p></p></th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $num = 1;
                                foreach ($CoverRate as $value) { ?>
                                    <tr>
                                        <td  style="text-align: center; white-space:nowrap;" ><?php echo $value->row; ?> </td> 
                                        <?php if($StatusCoverage_Check == ""){ ?>
<!--                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input class="checkboxStatus_ALL" type="checkbox" id="StatusAdd_Coverage<?php echo $value->ID_CoverRate; ?>" name="StatusAdd_Coverage[]" value="<?php echo $value->ID_CoverRate; ?>" >                               
                                                <label for="StatusAdd_Coverage<?php echo $value->ID_CoverRate; ?>"></label>
                                            </div>
                                        </td>-->
                                        <td style="text-align: center; white-space:nowrap;">
                                            <div class="form-group">
                                                    <?php if ($value->Status_Coverage == "Active") { ?>
                                                        <div class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success" onclick="switch_CoverRate(ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>',switchCoverRate='Nonactive')">
                                                            <input type="checkbox" class="custom-control-input" id="checkboxIDCoverRate<?php echo $num; ?>" value="ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>'">
                                                            <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" onclick="switch_CoverRate(ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>',switchCoverRate='Active')">
                                                            <input type="checkbox" class="custom-control-input" id="checkboxIDCoverRate<?php echo $num; ?>" value="ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>'">
                                                            <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                        </div>                                        
                                                    <?php } ?>
                                            </div> 
                                        </td>
                                     
                                        <td style="white-space:nowrap;">
                                            <button type="button" class="btn btn-warning" id="OpeninputNameCoverRate<?php echo $value->ID_CoverRate; ?>" onclick="OpeninputNameCoverRate(ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>')"><i class="fas fa-plus-square"></i></button>  
                                        </td>
                                        <td style="white-space:nowrap; ">
                                            <button type="button" class="btn btn-info" disabled="true" id="buttonSaveinputCoverRate<?php echo $value->ID_CoverRate; ?>" name="buttonSaveinputCoverRate<?php echo $value->ID_CoverRate; ?>" style="margin-left: -21px; "  onclick="UpdateEdit_CarCoverRate(ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>')"><i class="far fa-edit"></i></button>
                                        </td>
                                        <?php  } else {  ?>
<!--                                          <td>
                                            <div class="icheck-primary d-inline">
                                                <input class="checkboxCoverRate" type="checkbox" id="TmpAdd_Coverage<?php //echo $value->ID_CoverRate; ?>" name="TmpAdd_Coverage[]" value="<?php echo $value->ID_CoverRate; ?>" >                               
                                                <label for="TmpAdd_Coverage<?php //echo $value->ID_CoverRate; ?>"></label>
                                            </div>
                                        </td>-->
                                        <td style="white-space:nowrap;">
                                            <button type="button" class="btn btn-warning" id="OpeninputNameCoverRate<?php echo $value->ID_CoverRate; ?>" onclick="OpeninputNameCoverRate(ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>')"><i class="fas fa-plus-square"></i></button>  
                                        </td>
                                        <td style="white-space:nowrap; ">
                                            <button type="button" class="btn btn-info" disabled="true" id="buttonSaveinputCoverRate<?php echo $value->ID_CoverRate; ?>" name="buttonSaveinputCoverRate<?php echo $value->ID_CoverRate; ?>" style="margin-left: -21px; "  onclick="UpdateEdit_CarTeamCoverRate(ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>')"><i class="far fa-edit"></i></button>
                                        </td>
                                        <td style="white-space:nowrap;">
                                            <button type="button" class="btn btn-danger" disabled="true" id="Delete_inputCoverRate<?php echo $value->ID_CoverRate; ?>" name="Delete_inputCoverRate<?php echo $value->ID_CoverRate; ?>" style="margin-left: -21px; "  onclick="DeleteEdit_CarTeamCoverRate(ID_CoverRate = '<?php echo $value->ID_CoverRate; ?>')"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                        <?php } ?>
                                        
                                        <input type="hidden" id="IDCoverRate" name="IDCoverRate" value="<?php echo $value->ID_CoverRate; ?>">
                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->ID_CoverRate; ?> </td>
                                        <td style="white-space:nowrap;">
                                        <select class="form-control" style=" width: 200px;" id="IDPackageEdit<?php echo $value->ID_CoverRate; ?>" name="IDPackageEdit<?php echo $value->ID_CoverRate; ?>">
                                           <?php foreach ($selectIDPackage as $itemIDPackage) { ?> 
                                                <?php if($value->IDPackage ==  $itemIDPackage->IDPackage) { ?>
                                            <option value="<?php echo $value->IDPackage; ?>"selected><?php echo $value->IDPackage .' : '. iconv('TIS-620','UTF-8',$itemIDPackage->NamePackage); ?></option>
                                                <?php } else { ?>
                                                     <option value="<?php echo $itemIDPackage->IDPackage; ?>"><?php echo $itemIDPackage->IDPackage .' : '. iconv('TIS-620','UTF-8',$itemIDPackage->NamePackage); ?></option>     
                                             <?php } ?>
                                           <?php }?> 
                                        </select>
                                        </td>
                                           <td style="white-space:nowrap;">
                                        <select class="form-control"  style=" width: 180px;" id="Insure_Code_CompanyEdit<?php echo $value->ID_CoverRate; ?>" name="Insure_Code_CompanyEdit<?php echo $value->ID_CoverRate; ?>">
                                            <?php foreach ($Get_Insure as $item) { ?>
                                             <?php if($value->Insure_Code_Company ==  $item->Auto_ID) { ?>
                                                    <option value="<?php echo $value->Insure_Code_Company; ?>"selected><?php echo $value->Insure_Code_Company .' : '. iconv('TIS-620','UTF-8',$item->Insure_Company); ?></option>
                                            <?php } else { ?> 
                                                     <option value="<?php echo $item->Auto_ID ?>"><?php echo   $item->Auto_ID .' : '. iconv('TIS-620','UTF-8',$item->Insure_Company)?></option>
                                            <?php } ?>
                                          <?php }?>   
                                        </select>
                                        </td> 
                                        <td style="white-space:nowrap;">
                                        <select class="form-control"  id="DetailCoverage1Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage1Edit<?php echo $value->ID_CoverRate; ?>">
                                            <?php if($value->DetailCoverage1 == "Re1"){ ?>
                                                <option value="Re1" selected> Re1 : ซ่อมอู่ </option>
                                                <option value="Re2"> Re2 : ซ่อมห้าง </option>
                                                <option value="Re3"> Re3 : ซ่อมเอง </option>
                                            <?php } elseif($value->DetailCoverage1 == "Re2") { ?>
                                                <option value="Re1" > Re1 : ซ่อมอู่ </option>
                                                <option value="Re2" selected> Re2 : ซ่อมห้าง </option>
                                                <option value="Re3"> Re3 : ซ่อมเอง </option>
                                            <?php } elseif($value->DetailCoverage1 == "Re3"){ ?>
                                                <option value="Re1" > Re1 : ซ่อมอู่ </option>
                                                <option value="Re2" > Re2 : ซ่อมห้าง </option>
                                                <option value="Re3" selected> Re3 : ซ่อมเอง </option>
                                             <?php }   ?>
                                        </select>
                                        </td>

                                        <td style="white-space:nowrap;"><input class="form-control" type="text"  readonly="true" style=" width: 200px;" id="DetailCoverage2Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage2Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage2); ?>" /></td>
                                        <td style=" white-space:nowrap; "><input class="form-control" type="text"  readonly="true" style=" width: 230px;" id="DetailCoverage3Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage3Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage3); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control"type="text"   readonly="true"    style=" width: 200px;" id="DetailCoverage4Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage4Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage4); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control"type="text"    readonly="true" style=" width: 200px;" id="DetailCoverage5Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage5Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage5); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text"  readonly="true" style=" width: 200px;" id="DetailCoverage6Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage6Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage6); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text"  readonly="true" style=" width: 200px;" id="DetailCoverage7Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage7Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage7); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control"type="text"   readonly="true"  style=" width: 200px;"id="DetailCoverage8Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage8Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage8); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control"type="text"  readonly="true" style=" width: 200px;" id="DetailCoverage9Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage9Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage9); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control"type="text"  readonly="true" style=" width: 200px;" id="DetailCoverage10Edit<?php echo $value->ID_CoverRate; ?>" name="DetailCoverage10Edit<?php echo $value->ID_CoverRate; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->DetailCoverage10); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control"type="text"  readonly="true" style=" width: 200px; text-align:right;" id="Net_InsuranceEdit<?php echo $value->ID_CoverRate; ?>" name="Net_InsuranceEdit<?php echo $value->ID_CoverRate; ?>" value="<?php echo $value->Net_Insurance; ?>" /></td>
                                        <?php //} ?>   
                                        
                                       
                                        
                                   </tr>
                                <?php $num ++;} ?>
                            </tbody>
                        </table>
                    </div>
                    
                    
                      <?php foreach ($CountCoverRate as $row) { ?>
                            <?php $total_record = $row->Count; ?>
                        <?php } ?> 

                        <?php $total_page = ceil($total_record / $pageend); ?> 
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" onclick="pagedatapay(page='')">&laquo;</a></li>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?> 
                                     <?php if($total_page == 1){ ?>
                                     <li class="page-item"><a class="page-link" onclick=""><?php echo 1 ?></a></li>
                                     <?php } else { ?>
                                    <li class="page-item"><a class="page-link" onclick="pagedatapay(page='<?php echo $i ?>')"><?php echo $i ?></a></li>
                                     <?php } ?>
                                <?php } ?>
                                <li class="page-item"><a class="page-link" onclick="pagedatapay(page='<?php echo $total_page ?>')">&raquo;</a></li>
                            </ul>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<?php }?>   

<script type="text/javascript">
 $(document).ready(function () {
    $('#CoverageStatus_ALL').click(function (event) {
        if (this.checked) {
            $('.checkboxStatus_ALL').each(function () { //loop through each checkbox
                $(this).prop('checked', true); //check 
            });
        } else {
            $('.checkboxStatus_ALL').each(function () { //loop through each checkbox
                $(this).prop('checked', false); //uncheck              
            });
        }
    });
});
</script>


<script type="text/javascript">

 $(document).ready(function () {
    $('#TmpCoverage_ALL').click(function (event) {
        if (this.checked) {
            $('.checkboxCoverRate').each(function () { //loop through each checkbox
                $(this).prop('checked', true); //check 
            });
        } else {
            $('.checkboxCoverRate').each(function () { //loop through each checkbox
                $(this).prop('checked', false); //uncheck              
            });
        }
    });
});
</script>

<!--แก้ไขข้อมูลตอน insent ข้อมูลลง [Jmtib].[dbo].[TBL_CarCoverage] เพื่อตรวจสอบข้อมูลให้ถูกต้องก่อนบันทึกลง ฐานจริง-->
<script type="text/javascript">
    function UpdateEdit_CarTeamCoverRate(ID_CoverRate) {

        var IDPackageEdit = document.getElementById('IDPackageEdit'+ID_CoverRate).value;
        var Insure_Code_CompanyEdit = document.getElementById('Insure_Code_CompanyEdit'+ID_CoverRate).value;
        var DetailCoverage1Edit = document.getElementById('DetailCoverage1Edit'+ID_CoverRate).value;
        var DetailCoverage2Edit = document.getElementById('DetailCoverage2Edit'+ID_CoverRate).value;
        var DetailCoverage3Edit = document.getElementById('DetailCoverage3Edit'+ID_CoverRate).value;
        var DetailCoverage4Edit = document.getElementById('DetailCoverage4Edit'+ID_CoverRate).value;
        var DetailCoverage5Edit = document.getElementById('DetailCoverage5Edit'+ID_CoverRate).value;
        var DetailCoverage6Edit = document.getElementById('DetailCoverage6Edit'+ID_CoverRate).value;
        var DetailCoverage7Edit = document.getElementById('DetailCoverage7Edit'+ID_CoverRate).value;
        var DetailCoverage8Edit = document.getElementById('DetailCoverage8Edit'+ID_CoverRate).value;
        var DetailCoverage9Edit = document.getElementById('DetailCoverage9Edit'+ID_CoverRate).value;
        var DetailCoverage10Edit = document.getElementById('DetailCoverage10Edit'+ID_CoverRate).value;
        var Net_InsuranceEdit = document.getElementById('Net_InsuranceEdit'+ID_CoverRate).value;
        
 
        var datas = "ID_CoverRate="+ID_CoverRate+"&IDPackageEdit="+IDPackageEdit+"&Insure_Code_CompanyEdit="+Insure_Code_CompanyEdit+
        "&DetailCoverage1Edit="+DetailCoverage1Edit+"&DetailCoverage2Edit="+DetailCoverage2Edit+
        "&DetailCoverage3Edit="+DetailCoverage3Edit+"&DetailCoverage4Edit="+DetailCoverage4Edit+"&DetailCoverage5Edit="+DetailCoverage5Edit+
        "&DetailCoverage6Edit="+DetailCoverage6Edit+"&DetailCoverage7Edit="+DetailCoverage7Edit+"&DetailCoverage8Edit="+DetailCoverage8Edit+
        "&DetailCoverage9Edit="+DetailCoverage9Edit+"&DetailCoverage10Edit="+DetailCoverage10Edit+"&Net_InsuranceEdit="+Net_InsuranceEdit; 
      
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
                        url: "<?php echo site_url('Management_Data/Update_TmpCoverage') ?>",
                        data: datas,
                    }).done(function (data) {
                        $('#Table_CarCoverage').html(data);
                    })
                    } else {
                        swal("ไม่แก้ไข", "ข้อมูลยังไม่ถูกแก้ไข");
                    }
                    
                });
                  document.getElementById("loaddingearch").style.display = "none";
    }
</script>  



<script type="text/javascript">
    function UpdateEdit_CarCoverRate(ID_CoverRate) {

        var IDPackageEdit = document.getElementById('IDPackageEdit'+ID_CoverRate).value;
        var Insure_Code_CompanyEdit = document.getElementById('Insure_Code_CompanyEdit'+ID_CoverRate).value;
        var DetailCoverage1Edit = document.getElementById('DetailCoverage1Edit'+ID_CoverRate).value;
        var DetailCoverage2Edit = document.getElementById('DetailCoverage2Edit'+ID_CoverRate).value;
        var DetailCoverage3Edit = document.getElementById('DetailCoverage3Edit'+ID_CoverRate).value;
        var DetailCoverage4Edit = document.getElementById('DetailCoverage4Edit'+ID_CoverRate).value;
        var DetailCoverage5Edit = document.getElementById('DetailCoverage5Edit'+ID_CoverRate).value;
        var DetailCoverage6Edit = document.getElementById('DetailCoverage6Edit'+ID_CoverRate).value;
        var DetailCoverage7Edit = document.getElementById('DetailCoverage7Edit'+ID_CoverRate).value;
        var DetailCoverage8Edit = document.getElementById('DetailCoverage8Edit'+ID_CoverRate).value;
        var DetailCoverage9Edit = document.getElementById('DetailCoverage9Edit'+ID_CoverRate).value;
        var DetailCoverage10Edit = document.getElementById('DetailCoverage10Edit'+ID_CoverRate).value;
        var Net_InsuranceEdit = document.getElementById('Net_InsuranceEdit'+ID_CoverRate).value;
        

      
 
        var datas = "ID_CoverRate="+ID_CoverRate+"&IDPackageEdit="+IDPackageEdit+"&Insure_Code_CompanyEdit="+Insure_Code_CompanyEdit+
        "&DetailCoverage1Edit="+DetailCoverage1Edit+"&DetailCoverage2Edit="+DetailCoverage2Edit+
        "&DetailCoverage3Edit="+DetailCoverage3Edit+"&DetailCoverage4Edit="+DetailCoverage4Edit+"&DetailCoverage5Edit="+DetailCoverage5Edit+
        "&DetailCoverage6Edit="+DetailCoverage6Edit+"&DetailCoverage7Edit="+DetailCoverage7Edit+"&DetailCoverage8Edit="+DetailCoverage8Edit+
        "&DetailCoverage9Edit="+DetailCoverage9Edit+"&DetailCoverage10Edit="+DetailCoverage10Edit+"&Net_InsuranceEdit="+Net_InsuranceEdit; 
      

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
                        url: "<?php echo site_url('Management_Data/UpdateCoverage') ?>",
                        data: datas,
                    }).done(function (data) {
                        $('#Table_CarCoverage').html(data);
                    })
                    } else {
                        swal("ไม่แก้ไข", "ข้อมูลยังไม่ถูกแก้ไข");
                    }
                    
                });
                  document.getElementById("loaddingearch").style.display = "none";
    }
</script>  



<script type="text/javascript">
    function DeleteEdit_CarTeamCoverRate(ID_CoverRate) {

        var datas = "ID_CoverRate=" + ID_CoverRate;

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
                        url: "<?php echo site_url('Management_Data/DELETE_TmpCar_Coverage') ?>",
                        data: datas,
                    }).done(function (data) {
                        $('#Table_CarCoverage').html(data);
                    })
                    } else {
                        swal("ไม่ลบ", "ข้อมูลยังไม่ลบ");
                    }
                    
                });
                  document.getElementById("loaddingearch").style.display = "none";
    }
</script>  



<script>
    function OpeninputNameCoverRate(ID_CoverRate) {
        
        document.getElementById("DetailCoverage1Edit"+ID_CoverRate).readOnly = false;
        document.getElementById('DetailCoverage2Edit'+ID_CoverRate).readOnly = false;
        document.getElementById('DetailCoverage3Edit'+ID_CoverRate).readOnly = false; 
        document.getElementById('DetailCoverage4Edit'+ID_CoverRate).readOnly = false;
        document.getElementById('DetailCoverage5Edit'+ID_CoverRate).readOnly = false;
        document.getElementById('DetailCoverage6Edit'+ID_CoverRate).readOnly = false; 
        document.getElementById('DetailCoverage7Edit'+ID_CoverRate).readOnly = false;
        document.getElementById('DetailCoverage8Edit'+ID_CoverRate).readOnly = false;
        document.getElementById('DetailCoverage9Edit'+ID_CoverRate).readOnly = false; 
        document.getElementById('DetailCoverage10Edit'+ID_CoverRate).readOnly = false;
        document.getElementById('Net_InsuranceEdit'+ID_CoverRate).readOnly = false;
         
        document.getElementById("buttonSaveinputCoverRate"+ID_CoverRate).disabled = false;
        document.getElementById("Delete_inputCoverRate"+ID_CoverRate).disabled = false;
       
    }
</script>














