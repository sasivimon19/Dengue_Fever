
<div class="col-md-4">
    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <button type="button" class="btn btn-default" style="background-color: #ae1b09; color:  white;"onclick="Upload_FileCarCoverage()"><i class="fas fa-file-import"></i> <b>Import</b> </button> 
        </div>
        <input type="file" name="fileCoverage" id="fileCoverage" class="form-control" >
        <div class="input-group-prepend" >
            <button type="button" class="btn btn-success" onclick="Save_Impost_Coverage()"><i class="fas fa-edit"></i> บันทึก </button> 
        </div>   
    </div>
</div>  



<!--<div class="wrapper">-->
<!--    <section class="content" style=" padding-top: 2%;">
        <div class="container-fluid">
            <div class="card card-secondary">
                <div class="card-header">
                    <h3 class="card-title"> ติดตามสถานะกรมธรรม์ </h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row" id="checkInsurance_premium">
                        <div class="col-md-12">
                            <div class="input-group input-group-sm">
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary">รหัสบริษัท</button>
                                        </div>
                                        <select class="form-control" id="SearchsubPackage" name="SearchsubPackage">
                                            <option value="0"> -- เลือกการค้นหา --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary">รหัสแพ็คเกจ</button>
                                        </div>
                                        <select class="form-control" id="SearchsubPackage" name="SearchsubPackage">
                                            <option value="0"> -- เลือกการค้นหา --</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary">รุ่นย่อยรถยต์</button>
                                        </div>
                                        <input type="text" class="form-control" id="MakeDescription" name="MakeDescription" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary">ความคุ้มครองหลัก</button>
                                        </div>
                                        <select class="form-control" id="SearchsubPackage" name="SearchsubPackage">
                                            <option value="0"> -- เลือกการค้นหา --</option>
                                            <option value="Re1"> ซ่อมอู่ </option>
                                            <option value="Re2"> ซ่อมห้าง </option>
                                            <option value="Re3">  ซ่อมเอง </option>

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary">ความเสียหายต่อชีวิต/ร่างกาย/อนามัย</button>
                                        </div>
                                        <input type="text" class="form-control" id="SaveDate" name="SaveDate" value='' readonly="true">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary">สูงสุดไม่เกิน</button>
                                        </div>
                                        <input type="text" class="form-control" id="SaveDate" name="SaveDate" value='' readonly="true">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary"> ความเสียหายต่อทรัพย์สิน</button>
                                        </div>
                                        <input type="text" class="form-control" id="NewPrice" name="NewPrice" value="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary"> อุบัติเหตุส่วนบุคคล</button>
                                        </div>
                                        <input type="text" class="form-control" id="SaveDate" name="SaveDate" value='' readonly="true">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary"> ค่ารักษาพยาบาล ผู้โดยสาร/ผู้ขับขี่ </button>
                                        </div>
                                        <input type="text" class="form-control" id="SaveDate" name="SaveDate" value='' readonly="true">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-primary"> ความคุ้มครองรถยนต์เสียหาย </button>
                                        </div>
                                        <input type="text" class="form-control" id="SaveDate" name="SaveDate" value='' readonly="true">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer"></div>
            </div>    
        </div>
    </section>-->
<!--</div>-->






<!--





<script type="text/javascript">
    function UpdateEdit_CarTeam(Code_Car) {
        
        var CarBrandEdit = document.getElementById('CarBrandEdit'+Code_Car).value;
        var CarModelEdit = document.getElementById('CarModelEdit'+Code_Car).value;
        var MakeDescriptionEdit = document.getElementById('MakeDescriptionEdit'+Code_Car).value;
        var CarYearEdit = document.getElementById('CarYearEdit'+Code_Car).value;
        var EngineCCEdit = document.getElementById('EngineCCEdit'+Code_Car).value;
        var GroupEdit = document.getElementById('GroupEdit'+Code_Car).value;
        var NewPriceEdit = document.getElementById('NewPriceEdit'+Code_Car).value;
        
        var datas = "Code_Car=" + Code_Car+"&CarBrandEdit="+CarBrandEdit+"&CarModelEdit="+CarModelEdit+
        "&MakeDescriptionEdit="+MakeDescriptionEdit+"&CarYearEdit="+CarYearEdit+"&EngineCCEdit="+EngineCCEdit+
        "&GroupEdit="+GroupEdit+"&NewPriceEdit="+NewPriceEdit; 

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
</script>  -->


<script>
 function Upload_FileCarCoverage(){

  var  fileCoverage  =  document.getElementById('fileCoverage').value;
     
  var form_data = new FormData();
  
  form_data.append('fileCoverage',$('#fileCoverage')[0].files[0]);
  
  if (fileCoverage == '') { 
      swal("กรุณาเลือกไฟล์ก่อน", "", "warning");
   }else{
  
    document.getElementById("loaddingearch").style.display = "block";
    $.ajax({
    cache: false,
    type: 'POST',
    url: '<?php echo site_url('Management_Data/ImportExcel_TmpCarCoverage'); ?>',//Import
    contentType: false,
    processData:false,
    data: form_data,
    
     }).done(function (data) {
        document.getElementById("loaddingearch").style.display = "none";
        $('#Table_CarCoverage').html(data);
      }) 
   }; 
 }

</script>













