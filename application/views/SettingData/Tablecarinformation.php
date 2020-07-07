<?php if($Count_CarInformation == 0){ ?>

<?php }else { ?>
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #E5E7E9">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title"><b> <i class="fas fa-edit"></i> แสดงข้อมูลตารางรถยนต์</b></h3>
                            </div>
                        </div>
                    </div>
                     
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead  style="background-color: gray;">
                                <tr>
                                <th style="text-align: center; white-space:nowrap;">#</th>
                                <?php if($Status_Check != ""){ ?>
<!--                                <th style="text-align: center; white-space:nowrap;">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxTmpAdd" type="checkbox" id="TmpAdd_ALL" name="TmpAdd_ALL[]" >                               
                                        <label for="TmpAdd_ALL"></label>
                                    </div>
                                </th>-->
                                 <th colspan="3" style="text-align: center; white-space:nowrap;">แก้ไข</th>
                                <?php }else { ?>
                                 <th style="text-align: center; white-space:nowrap;">สถานะ</th>
                                <?php } ?>
                                    <th style="text-align: center; white-space:nowrap;">CodeCar</th>
                                    <th style="text-align: center; white-space:nowrap;">ยี่ห้อรถยนต์</th>
                                    <th style="text-align: center; white-space:nowrap;">รุ่นรถยนต์</th>
                                    <th style="text-align: center; white-space:nowrap;">รุ่นย่อยรถยนต์</th>
                                    <th style="text-align: center; white-space:nowrap;">ปีรถยนต์</th>
                                    <th style="text-align: center; white-space:nowrap;">ซีซี</th>
                                    <th style="text-align: center; white-space:nowrap;">Group</th>
                                    <th colspan="1" style="text-align: center; white-space:nowrap;">ราคา</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                           
                                <?php
                                $num = 1;
                                foreach ($GetCarInformation as $value) { ?>
                                    <tr>
                                    <?php if($Status_Check == ""){ ?>
                                       
                                        <td><?php echo $value->row; ?> </td>
                                        <td>
                                            <div class="form-group">
                                                            <?php if ($value->Status_Car == "Active") { ?>
                                                                <div class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success" onclick="switchCar(Code_Car = '<?php echo $value->Code_Car; ?>',StatusswitchCar='Nonactive')">
                                                                    <input type="checkbox" class="custom-control-input" id="checkboxIDPackage<?php echo $num; ?>" value="Code_Car = '<?php echo $value->Code_Car; ?>'">
                                                                    <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                                </div>
                                                            <?php } else { ?>
                                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" onclick="switchCar(Code_Car = '<?php echo $value->Code_Car; ?>',StatusswitchCar='Active')">
                                                                    <input type="checkbox" class="custom-control-input" id="checkboxIDPackage<?php echo $num; ?>" value="Code_Car = '<?php echo $value->Code_Car; ?>'">
                                                                    <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                                </div>                                        
                                                            <?php } ?>
                                            </div> 
                                        </td>
                                        <td style=" height: 30px; width: 30px;"><?php echo $value->Code_Car; ?> </td>
                                        <td style="white-space:nowrap;"><?php echo $value->CarBrand; ?></td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo iconv('TIS-620','UTF-8',$value->CarModel); ?></td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo iconv('TIS-620','UTF-8',$value->MakeDescription); ?></td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->CarYear; ?></td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->EngineCC; ?></td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->Group; ?></td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->NewPrice; ?></td>
                                       
                                 
                                        <?php } else { ?>
                                        <td><?php echo $value->row; ?> </td>
<!--                                        <td>
                                            <div class="icheck-primary d-inline">
                                                <input class="checkboxTmpAdd" type="checkbox" id="TmpAdd_Car<?php //echo $value->Code_Car; ?>" name="TmpAdd_Car[]" value="<?php echo $value->Code_Car; ?>" >                               
                                                <label for="TmpAdd_Car<?php //echo $value->Code_Car; ?>"></label>
                                            </div>
                                        </td>-->
                                        
                                        <td style="white-space:nowrap;">
                                             <button type="button" class="btn btn-warning" id="OpeninputName<?php echo $value->Code_Car; ?>" onclick="OpeninputName(Code_Car = '<?php echo $value->Code_Car; ?>')"><i class="fas fa-plus-square"></i></button>
                                        </td>
                                        <td style="white-space:nowrap; ">
                                            <button type="button" class="btn btn-info" id="buttonSaveinput<?php echo $value->Code_Car; ?>"  disabled="true" name="buttonSaveinput<?php echo $value->Code_Car; ?>" style="margin-left: -21px; "  onclick="UpdateEdit_CarTeam(Code_Car = '<?php echo $value->Code_Car; ?>')"><i class="far fa-edit"></i></button>
                                        </td>
                                        <td style="white-space:nowrap;">
                                           <button type="button" class="btn btn-danger" id="Delete_input<?php echo $value->Code_Car; ?>" disabled="true" name="Delete_input<?php echo $value->Code_Car; ?>" style="margin-left: -21px; " onclick="DeleteEdit_CarTeam(Code_Car = '<?php echo $value->Code_Car; ?>')"><i class="far fa-trash-alt"></i></button>
                                        </td>
                                      
                                        <input type="hidden" id="Code_Car" name="Code_Car" value="<?php echo $value->Code_Car; ?>">
                                        <td style="white-space:nowrap;"><?php echo $value->Code_Car; ?></td>
                                        <td style="white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 150px;" readonly="true"  id="CarBrandEdit<?php echo $value->Code_Car; ?>" name="CarBrandEdit<?php echo $value->Code_Car; ?>" value="<?php echo $value->CarBrand; ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width:150px; " readonly="true" id="CarModelEdit<?php echo $value->Code_Car; ?>" name="CarModelEdit<?php echo $value->Code_Car; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->CarModel) ?>" /></td>
                                        <td style="white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 350px; " readonly="true"  id="MakeDescriptionEdit<?php echo $value->Code_Car; ?>" name="MakeDescriptionEdit<?php echo $value->Code_Car; ?>" value="<?php echo iconv('TIS-620','UTF-8',$value->MakeDescription); ?>" /></td>
                                        <td style="white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true"  id="CarYearEdit<?php echo $value->Code_Car; ?>" name="CarYearEdit<?php echo $value->Code_Car; ?>" value="<?php echo $value->CarYear; ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true"  id="EngineCCEdit<?php echo $value->Code_Car; ?>" name="EngineCCEdit<?php echo $value->Code_Car; ?>" value="<?php echo $value->EngineCC; ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px;" readonly="true"  id="GroupEdit<?php echo $value->Code_Car; ?>" name="GroupEdit<?php echo $value->Code_Car; ?>" value="<?php echo $value->Group; ?>" /></td>
                                        <td style=" white-space:nowrap;"><input class="form-control" type="text" style=" height: 30px; width: 90px; " readonly="true"  id="NewPriceEdit<?php echo $value->Code_Car; ?>" name="NewPriceEdit<?php echo $value->Code_Car; ?>" value="<?php echo $value->NewPrice; ?>" /></td>
                                        <?php } ?>
                                 
                                </tr>
                            <?php $num ++;} ?>
                            </tbody>
                        </table>
                    </div>
                    <?php foreach ($Count_CarInformation as $row) { ?>
                        <?php $total_record = $row->Count; ?>
                    <?php } ?> 
                        <?php   $total_page = ceil($total_record / $pageend); ?>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" onclick="pagging(page='')">&laquo;</a></li>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>  
                                    <?php if($total_page == 1){ ?>
                                        <li class="page-item"><a class="page-link"><?php echo 1 ?></a></li>
                                    <?php } else { ?>
                                         <li class="page-item"><a class="page-link" onclick="pagging(page='<?php echo $i ?>')"><?php echo $i ?></a></li>
                                    <?php } ?>

                                <?php } ?>
                                <li class="page-item"><a class="page-link" onclick="pagging(page='<?php echo $total_page ?>')">&raquo;</a></li>
                            </ul>
                        </div>
                
                   </div>
                </div>
            </div>
        </div>
</section>
<?php } ?>



<!--script check all-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#TmpAdd_ALL').click(function (event) {

            if (this.checked) {
                 document.getElementById("buttonSavecheck").disabled = false;
                $('.checkboxTmpAdd').each(function () { //loop through each checkbox
                    $(this).prop('checked', true); //check 
                });
            } else {
                $('.checkboxTmpAdd').each(function () { //loop through each checkbox
                    $(this).prop('checked', false); //uncheck              
                });
            }
        });
    });
</script>




<script type="text/javascript">
    function Save_Impost() {
        
//        var numChecked = $("input:checkbox:checked").length;
//        var numnotCheck = $("input:checkbox:not(:checked)").length;
//        
//        if(confirm(numChecked) == true){
//            alert("มีรายการที่ถูกติ๊ก" + numChecked + "มีรายการที่ไม่ถูกติ๊ก" +numnotCheck);
//        }else{
//            alert("กรุณาติ๊กถูกรายการที่ตรวจสอบว่าถูกต้อง" + numChecked);
//        }
//          document.getElementById("loaddingearch").style.display = "block";
              swal({
                    title: "คุณแน่ใจหรือไม่",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "ใช่บันทึกข้อมูล!",
                    cancelButtonText: "ไม่บันทึกข้อมูล!",
                    closeOnConfirm: false,
                    closeOnCancel: false
            },
            function (isConfirm) {
                    if (isConfirm) {
                    swal("บันทึก!", "ข้อมูลถูกบันทึกเรียบร้อย"); 
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Management_Data/Save_EditTmp') ?>",
                data: $("#FormUploadFileCar").serialize(),
            }).done(function (data) {
                $('#Table_carinformation').html(data);
            })
            } else {
                        swal("ไม่บันทึก", "ข้อมูลยังไม่ถูกบันทึก");
                    }
            });
     }  
</script>


<script>
    function OpeninputName(Code_Car) {
        
        document.getElementById("CarBrandEdit"+Code_Car).readOnly = false;
        document.getElementById('CarModelEdit'+Code_Car).readOnly = false;
        document.getElementById('MakeDescriptionEdit'+Code_Car).readOnly = false; 
        document.getElementById('CarYearEdit'+Code_Car).readOnly = false;
        document.getElementById('EngineCCEdit'+Code_Car).readOnly = false;
        document.getElementById('GroupEdit'+Code_Car).readOnly = false; 
        document.getElementById('NewPriceEdit'+Code_Car).readOnly = false;
        
        document.getElementById("buttonSaveinput"+Code_Car).disabled = false;
        document.getElementById("Delete_input"+Code_Car).disabled = false ; 
       
    }
</script>













