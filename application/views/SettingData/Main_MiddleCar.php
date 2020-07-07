<link href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script> 
<script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery/jquery.min.js"></script>
     

 <style>
      #loaddingearch{
             position: fixed;
             left: 0px;
             width: 100%;
             height: 100%;
             padding-left:48%;
             padding-top: 15%;

             }
 .modal {
             display: none; /* Hidden by default */
             position: fixed; /* Stay in place */
             z-index: 1; /* Sit on top */
             left: 0;
             top: 0;
             width: 100%; /* Full width */
             height: 100%; /* Full height */
             overflow: auto; /* Enable scroll if needed */
             background-color: rgb(0,0,0); /* Fallback color */
             background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
             padding-top: 30px;
         }

 </style>




<body class="hold-transition sidebar-mini">
<form id="FromMiddleCar" name="FromMiddleCar" method="POST"  enctype="multipart/form-data" >
<div class="content-wrapper" style=" padding-top: 2%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                การจัดการข้อมูลตารางกลาง
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="col-md-12" id="Addcar_view" name="Addcar_view" style=" margin-top: 2%;">
                                        <?php $this->load->view('SettingData/AddMainCar'); ?>
                                    </div>
                                </div> 

                                <!--start Searchsub-->
                                <div class="col-md-12">     
                                    <div class="row" style=" margin-top: 2%;"> 
                                        
                                         <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>ปีรถยนต์</label>
                                                <select class="form-control "  id="CarYear" name="CarYear" onchange="getCarBrand(this.value)"> 
                                                    <option value="0">-- เลือกปีรถยนต์ --</option>
                                                    <?php foreach ($Get_CarYear as $item) { ?>
                                                       <option  value="<?php echo $item->CarYear; ?>"><?php echo $SumYear = $item->CarYear; ?> [<?php echo $SumYear+543 ?>] </option>        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>ยี่ห้อรถยนต์</label>
                                                <select class="form-control" id="CarBrand" name="CarBrand" onchange="getCarDesc(this.value)"  >
                                                    <option value="0"> -- เลือกยี่ห้อรถยนต์ --</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>รุ่นรถยนต์</label>
                                                <select class="form-control" id="CarDesc" name="CarDesc" disabled="true" >
                                                    <option value="0"> -- เลือกรุ่นรถยนต์ --</option>

                                                </select>
                                            </div>
                                        </div>
                                       

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>บริษัท</label>
                                                <select class="form-control" id="ID_InsureCode" name="ID_InsureCode" onchange="show_Packagc()">
                                                    <option value="0"> -- เลือกรหัสบริษัท --</option>
                                                    <?php foreach ($Get_Insure as $value) { ?>
                                                        <option value="<?php echo $value->Auto_ID ?>"><?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Company) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                            <div class="form-group">
                                                <label>แพ็คเกจ</label>
                                                <select class="form-control" id="IDPackag" name="IDPackag" disabled="true" onchange="show_CoverRate()">
                                                    <option value=""> -- เลือกแพ็คเกจ --</option>  

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-2">
                                                <label>รหัสความคุ้มครอง</label>
                                                 <div class="input-group mb-3">
                                                <select class="form-control" id="ID_CoverRate" name="ID_CoverRate" disabled="true" >
                                                    <option value=""> -- เลือกความคุ้มครอง --</option>

                                                </select>
                                                <span class="input-group-append">
                                                    <button type="button" class="btn btn-info btn-flat" style="background-color: #16A951;" onclick="Search_Middle()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!--End SearchsubPackage-->
                                
                                <div class="col-md-12" id="Table_Middle" name="Table_Middle" >
                                    <?php $this->load->view('SettingData/Table_MiddleCarInsurance'); ?>
                                </div>
                                
                                <!-- loading -->
                               <div id="loaddingearch" class="modal" style=" display: none"> <img src="<?php echo base_url(); ?>assets/images/loader.gif"> </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>                                            
</form>
</body>

 

<script>
     function getCarBrand(v){
                document.getElementById("CarBrand").disabled = false;
                $.getJSON('<? echo site_url('Management_Data/get_CarBrand?CarYear=') ?>'+v, function(res) {
                        $('#CarBrand').find('option').remove();

                        $('#CarBrand').append('<option value="">เลือกยี่ห้อรถยนต์</option>');
                
                        for (const i in res) {
                                $('#CarBrand').append('<option value="' + res[i].CarBrand +'">' + res[i].CarBrand + '</option>')
                        }
                }); 
        }                     
</script>





<script>
     function getCarDesc(D){
                 document.getElementById("CarDesc").disabled = false;
      
                $.getJSON('<? echo site_url('Management_Data/getAmpCarDesc?CarBrand=') ?>'+D, function(res) {
                        $('#CarDesc').find('option').remove();
                        $('#CarDesc').append('<option value="">เลือกรุ่นรถยนต์</option>');
                        for (const i in res) {
                                $('#CarDesc').append('<option value="' + res[i].CarModel +'">' + res[i].CarModel + '</option>')
                        }
                      
      
                }); 
        }                     
</script>


<!--SearchMiddle-->
<script type="text/javascript">
    function Search_Middle() {

         var CarBrand = document.getElementById('CarBrand').value;
         var CarDesc = document.getElementById('CarDesc').value;
         var CarYear = document.getElementById('CarYear').value;
         var ID_InsureCode = document.getElementById('ID_InsureCode').value;
         var IDPackag = document.getElementById('IDPackag').value;
         var ID_CoverRate = document.getElementById('ID_CoverRate').value;
          
         var datas = "CarBrand="+CarBrand+"&CarDesc="+CarDesc+"&CarYear="+CarYear+"&ID_InsureCode="+ID_InsureCode+"&IDPackag="+IDPackag+"&ID_CoverRate="+ID_CoverRate;
         
        if(CarYear == 0){
             alert("กรุณากรอกปีรถยนต์");
            $('#CarYear').focus();
            document.getElementById("CarYear").style = "border: 1px red solid;";
        }else{
            document.getElementById("loaddingearch").style.display = "block"; 
            $.ajax({
                type:"POST",
                url:"<?php echo site_url('Management_Data/SearchCarMiddleCar') ?>",
                data:datas
                }).done(function(data){	
                $('#Table_Middle').html(data);  //Div ที่กลับมาแสดง
                document.getElementById("loaddingearch").style.display = "none"; 
                }) 
           }       
    }
</script>

<script>
        function show_Packagc(){	 
            
       document.getElementById("IDPackag").disabled = false;
       var ID_InsureCode = document.getElementById('ID_InsureCode').value;
       
       var datas = "ID_InsureCode=" + ID_InsureCode; 
        document.getElementById("loaddingearch").style.display = "block";
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Management_Data/ShowIDPackagc') ?>",
                        data:datas
                        }).done(function(data){	
                $('#IDPackag').html(data);  //Div ที่กลับมาแสดง
                document.getElementById("loaddingearch").style.display = "none"; 
                
                }) 	
}
</script>


<!--ค้นหารหัสตารางความคุ้มครอง-->
<script>
        function show_CoverRate(){	 

       document.getElementById("ID_CoverRate").disabled = false;
       var IDPackag = document.getElementById('IDPackag').value;
       
       var datas = "IDPackag=" + IDPackag; 
        document.getElementById("loaddingearch").style.display = "block";
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Management_Data/Get_IDCoverRate') ?>",
                        data:datas
                        }).done(function(data){	
                $('#ID_CoverRate').html(data);  //Div ที่กลับมาแสดง
         document.getElementById("loaddingearch").style.display = "none";        
                }) 	
}
</script>


<script type="text/javascript">
    function Save_Impost_Middle() {

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
                url: "<?php echo site_url('Management_Data/Save_Edit_TmpMiddle') ?>",
                data: $("#FromMiddleCar").serialize(),
            }).done(function (data) {

                $('#Table_Middle').html(data);
            })
            } else {
                        swal("ไม่บันทึก", "ข้อมูลยังไม่ถูกบันทึก");
                    }
            });
            
            
            //                document.getElementById("loaddingearch").style.display = "none";
     }  
</script>


<!--แก้ไขข้อมูลตอน insent ข้อมูลลง [Jmtib].[dbo].[TBL_TmpMiddleCar] เพื่อตรวจสอบข้อมูลให้ถูกต้องก่อนบันทึกลง ฐานจริง-->
<script type="text/javascript">
    function UpdateEdit_CarTeamMiddle(Middle_ID) {
        
        var Code_CarEdit = document.getElementById('Code_CarEdit'+Middle_ID).value;
        var Insure_Code_CompanyEdit =  document.getElementById('Insure_Code_CompanyEdit'+Middle_ID).value;
        var IDCoverRateEdit = document.getElementById('IDCoverRateEdit'+Middle_ID).value;
        var IDPackageEdit =   document.getElementById('IDPackageEdit'+Middle_ID).value; 
        var IDTypeAutoEdit =  document.getElementById('IDTypeAutoEdit'+Middle_ID).value;
        var CODEEdit  = document.getElementById('CODEEdit'+Middle_ID).value;
        var Group_CarEdit  =  document.getElementById('Group_CarEdit'+Middle_ID).value;
        var Insurance_priceEdit  =  document.getElementById('Insurance_priceEdit'+Middle_ID).value;
        var InsurancepricetotalEdit  =  document.getElementById('InsurancepricetotalEdit'+Middle_ID).value; 
        var CctvPriceEdit   =  document.getElementById('CctvPriceEdit'+Middle_ID).value;
        var DetailCoverage1Edit   =  document.getElementById('DetailCoverage1Edit'+Middle_ID).value;
        var AkonEdit    = document.getElementById('AkonEdit'+Middle_ID).value;
        var TaxEdit    = document.getElementById('TaxEdit'+Middle_ID).value; 
        
 
        var datas = "Middle_ID="+Middle_ID+"&Code_CarEdit="+Code_CarEdit+"&Insure_Code_CompanyEdit="+Insure_Code_CompanyEdit+"&IDCoverRateEdit="+IDCoverRateEdit+"&IDPackageEdit="+IDPackageEdit+
        "&IDTypeAutoEdit="+IDTypeAutoEdit+"&CODEEdit="+CODEEdit+"&Group_CarEdit="+Group_CarEdit+
        "&Insurance_priceEdit="+Insurance_priceEdit+"&InsurancepricetotalEdit="+InsurancepricetotalEdit+
        "&CctvPriceEdit="+CctvPriceEdit+"&DetailCoverage1Edit="+DetailCoverage1Edit+"&AkonEdit="+AkonEdit+"&TaxEdit="+TaxEdit; 
      
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
                        url: "<?php echo site_url('Management_Data/Update_TmpmiddleCar') ?>",
                        data: datas,
                    }).done(function (data) {
                        $('#Table_Middle').html(data);
                    })
                    } else {
                        swal("ไม่แก้ไข", "ข้อมูลยังไม่ถูกแก้ไข");
                    }
                    
                });
                  document.getElementById("loaddingearch").style.display = "none";
    }
</script> 


<!--สถานะ UPDATE Status_Middle ปุ่ม switch off/on-->
<script type="text/javascript">
    function switch_Middle(Middle_ID,switchMiddle) {
        
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
                            url: "<?php echo site_url('Management_Data/Update_switchststusCoverRate'); ?>",
                            data: $("#FromMiddleCar").serialize()+"&Middle_ID="+Middle_ID+"&switchMiddle="+switchMiddle,
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




<script type="text/javascript">
    function DeleteEdit_CarTeamMiddle(Middle_ID) {

        var datas = "Middle_ID=" + Middle_ID;

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
                        url: "<?php echo site_url('Management_Data/Delete_TmpMiddle') ?>",
                        data: datas,
                    }).done(function (data) {
                        $('#Table_Middle').html(data);
                    })
                    } else {
                        swal("ไม่ลบ", "ข้อมูลยังไม่ลบ");
                    }
                    
                });
                  document.getElementById("loaddingearch").style.display = "none";
    }
</script>  

<script>
        function page_datapay(page){	 //แนบตัวแปร page ไปด้วย
 
         var CarBrand = document.getElementById('CarBrand').value;
         var CarDesc = document.getElementById('CarDesc').value;
         var CarYear = document.getElementById('CarYear').value;
         var ID_InsureCode = document.getElementById('ID_InsureCode').value;
         var IDPackag = document.getElementById('IDPackag').value;
         var ID_CoverRate = document.getElementById('ID_CoverRate').value;
         var subCarInformation  = document.getElementById('subCarInformation').value;
         
         if(subCarInformation == '1'){
             page = page;
        
         }else {
             page = subCarInformation;
          
         }
         
         var datas = "CarBrand="+CarBrand+"&CarDesc="+CarDesc+"&CarYear="+CarYear+
         "&ID_InsureCode="+ID_InsureCode+"&IDPackag="+IDPackag+"&ID_CoverRate="+ID_CoverRate+"&page="+page;

            document.getElementById("loaddingearch").style.display = "block";    
            
            $.ajax({
                type:"POST",
                url:"<?php echo site_url('Management_Data/SearchCarMiddleCar') ?>",
                data:datas,
            }).done(function(data){	
                $('#Table_Middle').html(data);  //Div ที่กลับมาแสดง  
                 document.getElementById("loaddingearch").style.display = "none";
            }) 	
    }
</script>

<!--<script type="text/javascript">
    function Main_CarBrand() {

        document.getElementById("CarDesc").disabled = false;
        var car_brand = document.getElementById('CarBrand').value;
        var datas = "car_brand=" + car_brand;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Car_Model') ?>",
            data: datas,
        }).done(function (data) {
            $('#CarDesc').html(data);
        })
    }
</script>

<script type="text/javascript">
    function Main_CarFamilyDesc() {
        
        document.getElementById("CarYear").disabled = false;
        var Car_modil = document.getElementById('CarDesc').value;
        var datas = "Car_modil=" + Car_modil;
        
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Year_Car') ?>",
            data: datas,
        }).done(function (data) {
            $('#CarYear').html(data);
        })
    }
</script>-->








