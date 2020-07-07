<link href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script> 
<script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery/jquery.min.js"></script>
 
 
<?php if($Count_CAR_DETAILS == 0){ ?>

<?php }else{ ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #E5E7E9">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title"><b> <i class="fas fa-edit"></i> แสดงข้อมูลตาราง</b></h3>
                                <?php if ($Status_Middle != "") { ?>
                                &nbsp;&nbsp;&nbsp;<a href="<?php echo site_url('Management_Data/ExportMiddleCarInsurance') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b>Export Edit</b></button></a> 
                                <?php } else { ?>
                                <div class="input-group-prepend">
                                    &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-warning btn-sm" onclick="ExportMiddle()"><i class="fas fa-edit"></i> <b> Export ปีรถยต์ </b></button>
                                </div>        
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead  style="background-color: gray;">
                                <?php if ($Status_Middle == "") { ?>
                                <tr>
                                    <th colspan="19" style="text-align: left; white-space:nowrap; "><button class="btn btn-primary" type="button" onclick="off_on_allstatus()"><b>ปิด/เปิดสถานะ</b></button></th>  
                                </tr>
                                <?php }?>
                                <tr>
                                        <th style="text-align: center; white-space:nowrap;">#</th>
                                        <?php if ($Status_Middle == "") { ?>
                                            <th  style="text-align: center; white-space:nowrap;">
                                                <div class="icheck-primary d-inline">
                                                    <input class="checkboxStatusMiddle" type="checkbox" id="StatusMiddle_ALL" name="StatusMiddle_ALL[]">                               
                                                    <label for="StatusMiddle_ALL"></label>
                                                </div>

                                            </th>
                                            <th style="text-align: center; white-space:nowrap;">สถานะ</th>
                                            <th style="text-align: center; white-space:nowrap;">CarBrand</th>
                                            <th style="text-align: center; white-space:nowrap;">CarModel</th>
                                            <th style="text-align: center; white-space:nowrap;">CarYear</th> 

                                        <?php } else { ?>
<!--                                            <th style="text-align: center; white-space:nowrap;">
                                                <div class="icheck-primary d-inline">
                                                    <input class="checkboxTmpMiddle" type="checkbox" id="TmpMiddle_ALL" name="TmpMiddle_ALL[]">                               
                                                    <label for="TmpMiddle_ALL"></label>
                                                </div>
                                            </th>-->
                                            <th colspan="3" style="text-align: center; white-space:nowrap;"><label>แก้ไข</label></th>   
                                        <?php } ?>
                                    <th style="text-align: center; white-space:nowrap;">Code_Car</th>        
                                    <th style="text-align: center; white-space:nowrap;">Company</th>
                                    <th style="text-align: center; white-space:nowrap;">ID_CoverRate</th>
                                    <th style="text-align: center; white-space:nowrap;">DetailCoverage1</th>
                                    <th style="text-align: center; white-space:nowrap;">IDPackage</th>
                                    <th style="text-align: center; white-space:nowrap;">ID_Type_Auto</th> 
                                    <th style="text-align: center; white-space:nowrap;">Group_Car</th>
                                    <th style="text-align: center; white-space:nowrap;">CODE</th> 
                                    <th style="text-align: center; white-space:nowrap;">Insurance_price_total</th>
                                    <th style="text-align: center; white-space:nowrap;">Discount_price_cctv</th>
                                    <th style="text-align: center; white-space:nowrap;">Insurance_price</th>
                                    <th style="text-align: center; white-space:nowrap;">Akon</th>
                                    <th style="text-align: center; white-space:nowrap;">Tax</th>    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $num = 1;
                                    foreach ($GETCARDETAILS as $value) { ?>
                                       
                                        <tr>
                                           <td style="text-align: center; white-space:nowrap;"><?php echo $value->row; ?></td>
                                           <?php if($Status_Middle == ""){ ?>
                                           <?php if ($value->Status == "Active") { ?>
                                            <td>
                                                <div class="icheck-primary d-inline">
                                                <input class="checkboxStatusMiddle" type="checkbox" id="StatusMiddle<?php echo $value->Middle_ID; ?>" name="StatusMiddle[]" value="<?php echo $value->Middle_ID; ?>,<?php echo $value->Status ?>">                               
                                                <label for="StatusMiddle<?php echo $value->Middle_ID; ?>"></label>
                                                </div>
                                           </td>
                                           <?php } else { ?>
                                            <td>
                                                <div class="icheck-primary d-inline">
                                                <input class="checkboxStatusMiddle" type="checkbox" id="StatusMiddle<?php echo $value->Middle_ID; ?>" name="StatusMiddle[]" value="<?php echo $value->Middle_ID; ?>,<?php echo $value->Status ?>'" >                               
                                                <label for="StatusMiddle<?php echo $value->Middle_ID; ?>"></label>
                                                </div>
                                           </td>
                                            <?php  } ?>
                                           <td style="text-align: center; white-space:nowrap;">
                                            <div class="form-group">
                                                    <?php if ($value->Status == "Active") { ?>
                                                        <div class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success" onclick="switch_Middle(Middle_ID = '<?php echo $value->Middle_ID; ?>',switchMiddle='Nonactive')">
                                                            <input type="checkbox" class="custom-control-input"  id="checkboxMiddleid<?php echo $num; ?>" value="Middle_ID = '<?php echo $value->Middle_ID; ?>'">
                                                            <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success"  onclick="switch_Middle(Middle_ID = '<?php echo $value->Middle_ID; ?>',switchMiddle='Active')">
                                                            <input type="checkbox" class="custom-control-input"  id="checkboxMiddleid<?php echo $num; ?>" value="Middle_ID = '<?php echo $value->Middle_ID; ?>'">
                                                            <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                        </div>                                        
                                                    <?php } ?>
                                            </div>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->CarBrand; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo iconv('TIS-620','UTF-8',$value->CarModel); ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->CarYear; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->Code_Car; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo iconv('TIS-620','UTF-8',$value->Insure_Company ); ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->ID_CoverRate; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->DetailCoverage1; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->IDPackage; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->ID_Type_Auto; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->Group_Car; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->CODE; ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Insurance_price_total,02); ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Discount_price_cctv,02); ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Insurance_price,02); ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Akon,02); ?></td>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Tax,02) ?></td>

                                        <?php }else { ?>
                                        <input type="hidden" id="Middle_ID" name="Middle_ID" value="<?php echo $value->Middle_ID; ?>">
<!--                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input class="checkboxTmpMiddle" type="checkbox" id="TmpMiddle<?php //echo $value->Middle_ID; ?>" name="TmpMiddle[]" value="<?php echo $value->Middle_ID; ?>" >                               
                                                <label for="TmpMiddle<?php //echo $value->Middle_ID; ?>"></label>
                                            </div>
                                        </td>-->
                                        <td style="white-space:nowrap;">
                                            <button type="button" class="btn btn-warning" id="OpeninputNameMiddle<?php echo $value->Middle_ID; ?>" onclick="OpeninputNameMiddle(Code_Car = '<?php echo $value->Middle_ID; ?>')"><i class="fas fa-plus-square"></i></button>
                                        </td>
                                        <td style="white-space:nowrap; ">
                                            <button type="button" class="btn btn-info" id="buttonSaveinputMiddle<?php echo $value->Middle_ID; ?>"  disabled="true" name="buttonSaveinputMiddle<?php echo $value->Middle_ID; ?>" style="margin-left: -21px; "  onclick="UpdateEdit_CarTeamMiddle(Middle_ID = '<?php echo $value->Middle_ID; ?>')"><i class="far fa-edit"></i></button>
                                        </td>
                                        <td style="white-space:nowrap;">
                                           <button type="button" class="btn btn-danger" id="Delete_inputMiddle<?php echo $value->Middle_ID; ?>" disabled="true" name="Delete_inputMiddle<?php echo $value->Middle_ID; ?>" style="margin-left: -21px; " onclick="DeleteEdit_CarTeamMiddle(Middle_ID = '<?php echo $value->Middle_ID; ?>')"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 100px;" readonly="true"  id="Code_CarEdit<?php echo $value->Middle_ID; ?>" name="Code_CarEdit<?php echo $value->Middle_ID; ?>" value="<?php echo $value->Code_Car; ?>" /></td>
                                        <td style="white-space:nowrap;">
                                        <select class="form-control" style=" width: 200px;" id="Insure_Code_CompanyEdit<?php echo $value->Middle_ID; ?>" name="Insure_Code_CompanyEdit<?php echo $value->Middle_ID; ?>">
                                           <?php foreach ($Get_Insure as $itemInsure) { ?> 
                                                <?php if($value->Auto_ID ==  $itemInsure->Auto_ID) { ?>
                                                     <option value="<?php echo $value->Auto_ID; ?>"selected><?php echo $value->Auto_ID .' : '. iconv('TIS-620','UTF-8',$itemInsure->Insure_Company); ?></option>
                                                <?php } else { ?>
                                                     <option value="<?php echo $itemInsure->Auto_ID; ?>"><?php echo $itemInsure->Auto_ID .' : '. iconv('TIS-620','UTF-8',$itemInsure->Insure_Company); ?></option>     
                                             <?php } ?>
                                           <?php }?> 
                                        </select>
                                        </td>
                                       
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 100px;" readonly="true"  id="IDCoverRateEdit<?php echo $value->Middle_ID; ?>" name="IDCoverRateEdit<?php echo $value->Middle_ID; ?>" value="<?php echo $value->ID_CoverRate; ?>" /></td>
                                        <td style="white-space:nowrap;">
                                        <select class="form-control"  style=" width: 140px;" id="DetailCoverage1Edit<?php echo $value->Middle_ID; ?>" name="DetailCoverage1Edit<?php echo $value->Middle_ID; ?>">
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
                                      
                                        <td style="white-space:nowrap;">
                                        <select class="form-control" style=" width: 200px;" id="IDPackageEdit<?php echo $value->Middle_ID; ?>" name="IDPackageEdit<?php echo $value->Middle_ID; ?>">
                                           <?php foreach ($selectIDPackage as $itemEditPackage) { ?> 
                                                <?php if($value->IDPackage ==  $itemEditPackage->IDPackage) { ?>
                                            <option value="<?php echo $value->IDPackage; ?>"selected><?php echo $value->IDPackage .' : '. iconv('TIS-620','UTF-8',$itemEditPackage->NamePackage); ?></option>
                                                <?php } else { ?>
                                                     <option value="<?php echo $itemEditPackage->IDPackage; ?>"><?php echo $itemEditPackage->IDPackage .' : '. iconv('TIS-620','UTF-8',$itemEditPackage->NamePackage); ?></option>     
                                             <?php } ?>
                                           <?php }?> 
                                        </select>
                                        </td>
                                      
                                        <td style="white-space:nowrap;">
                                        <select class="form-control" style=" width: 220px;" id="IDTypeAutoEdit<?php echo $value->Middle_ID; ?>" name="IDTypeAutoEdit<?php echo $value->Middle_ID; ?>">
                                           <?php foreach ($InsuranceType as $itemEditType) { ?> 
                                                <?php if($value->ID_Type_Auto ==  $itemEditType->ID_Type_Auto) { ?>
                                                     <option value="<?php echo $value->ID_Type_Auto; ?>"selected><?php echo $value->ID_Type_Auto .' : '. iconv('TIS-620','UTF-8',$itemEditType->Type_Name); ?></option>
                                                <?php } else { ?>
                                                     <option value="<?php echo $itemEditType->ID_Type_Auto; ?>"><?php echo $itemEditType->ID_Type_Auto .' : '. iconv('TIS-620','UTF-8',$itemEditType->Type_Name); ?></option>     
                                             <?php } ?>
                                           <?php }?> 
                                        </select>
                                        </td>
                                        
                                        <td style="white-space:nowrap;">
                                        <select class="form-control" style=" width: 110px;" id="Group_CarEdit<?php echo $value->Middle_ID; ?>" name="Group_CarEdit<?php echo $value->Middle_ID; ?>">
                                           <?php foreach ($Group_Car as $itemgroupcar) { ?> 
                                                <?php if($value->Group_Car ==  $itemgroupcar->Group_Car) { ?>
                                                     <option value="<?php echo $value->Group_Car; ?>"selected><?php echo $value->Group_Car; ?></option>
                                                <?php } else { ?>
                                                     <option value="<?php echo $itemgroupcar->Group_Car; ?>"><?php echo $itemgroupcar->Group_Car; ?></option>     
                                             <?php } ?>
                                           <?php }?> 
                                        </select>
                                        </td>
                                        
                                        <td style="white-space:nowrap;">
                                        <select class="form-control" style=" width: 170px;" id="CODEEdit<?php echo $value->Middle_ID; ?>" name="CODEEdit<?php echo $value->Middle_ID; ?>">
                                           <?php foreach ($cartype as $itemcartype) { ?> 
                                                <?php if($value->CODE ==  $itemcartype->CODE) { ?>
                                                     <option value="<?php echo $value->CODE; ?>"selected><?php echo $value->CODE.' : '. iconv('TIS-620','UTF-8',$itemcartype->TYPENAME); ?></option>
                                                <?php } else { ?>
                                                     <option value="<?php echo $itemcartype->CODE; ?>"><?php echo $itemcartype->CODE .' : '. iconv('TIS-620','UTF-8',$itemcartype->TYPENAME); ?></option>     
                                             <?php } ?>
                                           <?php }?> 
                                        </select>
                                        </td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true" onchange="price_total(Middle_ID = '<?php echo $value->Middle_ID; ?>')" id="InsurancepricetotalEdit<?php echo $value->Middle_ID; ?>" name="InsurancepricetotalEdit<?php echo $value->Middle_ID; ?>" value="<?php echo number_format($value->Insurance_price_total,02); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true"  id="CctvPriceEdit<?php echo $value->Middle_ID; ?>" name="CctvPriceEdit<?php echo $value->Middle_ID; ?>" value="<?php echo number_format($value->Discount_price_cctv,02); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true"  id="Insurance_priceEdit<?php echo $value->Middle_ID; ?>" name="Insurance_priceEdit<?php echo $value->Middle_ID; ?>" value="<?php echo number_format($value->Insurance_price,02); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true"  id="AkonEdit<?php echo $value->Middle_ID; ?>" name="AkonEdit<?php echo $value->Middle_ID; ?>" value="<?php echo number_format($value->Akon,02); ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true"  id="TaxEdit<?php echo $value->Middle_ID; ?>" name="TaxEdit<?php echo $value->Middle_ID; ?>" value="<?php echo number_format($value->Tax,02); ?>" /></td>
                                        
                              
                                        <?php } ?> 
                                           
                                        </tr>

                                <?php $num ++;} ?>
                                </tbody>
                            </table>
                    </div>
                    
                    
                    <?php foreach ($Count_CAR_DETAILS as $row) { ?>
                        <?php   $total_record = $row->Count; ?>
                    <?php } ?> 
                    
                    <?php   $total_page = ceil($total_record / $pageend); ?> 
                       <div class="input-group mb-4" style="padding-top: 2%;">
                            <div class="col-md-10"></div>
                            <a type="button"  class="page-link btn btn-success" onclick="page_datapay(page='')">&laquo;</a>
                            <div class="col-md-1" style=" width: 10%;">  
                                <select class="form-control" id="subCarInformation" name="subCarInformation" onchange="page_datapay()">
                                    <?php for ($i = 1; $i <= $total_page; $i++) { 
                                     if($pageshow == $i){ ?>
                                        <option value="<?php echo $i ?>" selected><?php echo $i ?></option>
                                    <?php } else { ?>
                                         <option value="<?php echo $i ?>"><?php echo $i ?></option>
                                    <?php } ?>
                                   
                                    <?php } ?>
                                </select>
                            </div>    
                            <a type="button" class="page-link btn btn-success"  onclick="page_datapay(page='<?php echo $total_page ?>')">&raquo;</a>
                        </div>
                 </div>
            </div>
        </div>
    </div>
</section>
<?php } ?>



<script type="text/javascript">
    function ExportMiddle() {
        
         var CarBrand = document.getElementById('CarBrand').value;
         var CarDesc = document.getElementById('CarDesc').value;
         var CarYear = document.getElementById('CarYear').value;
         var ID_InsureCode = document.getElementById('ID_InsureCode').value;
         var IDPackag = document.getElementById('IDPackag').value;
         var ID_CoverRate = document.getElementById('ID_CoverRate').value;

        window.location.href = '<?php  echo site_url('Management_Data/ExportMiddleCarYear?')?>CarYear='+CarYear+"&CarBrand="+CarBrand+"&CarDesc="+CarDesc+"&ID_InsureCode="+ID_InsureCode+"&IDPackag="+IDPackag+"&ID_CoverRate="+ID_CoverRate;

    }
</script> 


<script type="text/javascript">
    function off_on_allstatus() {

        document.getElementById("loaddingearch").style.display = "block";  
        
        swal({
                  title: "คุณแน่ใจหรือไม่",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "ใช่เปลี่ยนสถานะ!",
                  cancelButtonText: "ไม่เปลี่ยนสถานะ!",
                  closeOnConfirm: false,
                  closeOnCancel: false
              },

                function (isConfirm) {
                    if (isConfirm) {
                        swal("เปลี่ยน!", "สถานะถูกเปลี่ยนเรียบร้อย");
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('Management_Data/Updateswitchststusall'); ?>",
                            data: $("#FromMiddleCar").serialize(),
                        }).done(function (data) {
                            $('#Table_Middle').html(data);
                        })
                    } else {
                        swal("ไม่เปลี่ยน", "สถานะยังไม่ถูกเปลี่ยน");
                    }
                });
            document.getElementById("loaddingearch").style.display = "none";    
    }
</script> 



<script type="text/javascript">

 $(document).ready(function () {
    $('#StatusMiddle_ALL').click(function (event) {
        if (this.checked) {
            $('.checkboxStatusMiddle').each(function () { //loop through each checkbox
                $(this).prop('checked', true); //check 
            });
        } else {
            $('.checkboxStatusMiddle').each(function () { //loop through each checkbox
                $(this).prop('checked', false); //uncheck              
            });
        }
    });
});
</script>

<script type="text/javascript">

 $(document).ready(function () {
    $('#TmpMiddle_ALL').click(function (event) {
        if (this.checked) {
            $('.checkboxTmpMiddle').each(function () { //loop through each checkbox
                $(this).prop('checked', true); //check 
            });
        } else {
            $('.checkboxTmpMiddle').each(function () { //loop through each checkbox
                $(this).prop('checked', false); //uncheck              
            });
        }
    });
});
</script>


<script>
    function price_total(Middle_ID) {  
        
   var InsurancepricetotalEdit = document.getElementById('InsurancepricetotalEdit'+Middle_ID).value;
   var InsurancepricetotalEdit = parseFloat(InsurancepricetotalEdit.replace(/,/g,''));  //ตัดคอมมาออก
   var InsurancepricetotalEdit = parseFloat(InsurancepricetotalEdit.toFixed(2));        //ทศนิยม2 ตำแหน่ง

   var Sum_price = InsurancepricetotalEdit / 1.07428;
   var Insurance_price = document.getElementById('Insurance_priceEdit'+Middle_ID).value = Sum_price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

   var Insurance_priceEdit = document.getElementById('Insurance_priceEdit'+Middle_ID).value;
   var Insurance_priceEdit = parseFloat(Insurance_priceEdit.replace(/,/g,''));  //ตัดคอมมาออก
   var Insurance_priceEdit = parseFloat(Insurance_priceEdit.toFixed(2));        //ทศนิยม2 ตำแหน่ง
   
   var sum_Akon = Insurance_priceEdit * 0.004;
   var Akon = document.getElementById('AkonEdit'+Middle_ID).value = sum_Akon.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

   var AkonEdit = document.getElementById('AkonEdit'+Middle_ID).value;
   var AkonEdit = parseFloat(AkonEdit.replace(/,/g,''));  //ตัดคอมมาออก
   var AkonEdit = parseFloat(AkonEdit.toFixed(2));        //ทศนิยม2 ตำแหน่ง
   
   var sum_Tax = (Insurance_priceEdit+sum_Akon)* 0.07;
   var Tax = document.getElementById('TaxEdit'+Middle_ID).value = sum_Tax.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");

    }
</script>

<script>
    function OpeninputNameMiddle(Middle_ID) {
        
        
//      document.getElementById('Code_CarEdit'+Middle_ID).readOnly = false;
        document.getElementById('Insure_Code_CompanyEdit'+Middle_ID).readOnly = false;
//      document.getElementById('IDCoverRateEdit'+Middle_ID).readOnly = false;
        document.getElementById('IDPackageEdit'+Middle_ID).readOnly = false; 
        document.getElementById('IDTypeAutoEdit'+Middle_ID).readOnly = false;
        document.getElementById('CODEEdit'+Middle_ID).readOnly = false;
        document.getElementById('Group_CarEdit'+Middle_ID).readOnly = false;
//      document.getElementById('Insurance_priceEdit'+Middle_ID).readOnly = false;
        document.getElementById('InsurancepricetotalEdit'+Middle_ID).readOnly = false; 
        document.getElementById('CctvPriceEdit'+Middle_ID).readOnly = false;
        document.getElementById('DetailCoverage1Edit'+Middle_ID).readOnly = false;
//      document.getElementById('AkonEdit'+Middle_ID).readOnly = false;
//      document.getElementById('TaxEdit'+Middle_ID).readOnly = false; 

        document.getElementById("buttonSaveinputMiddle"+Middle_ID).disabled = false;
        document.getElementById("Delete_inputMiddle"+Middle_ID).disabled = false ; 
       
    }
</script>














