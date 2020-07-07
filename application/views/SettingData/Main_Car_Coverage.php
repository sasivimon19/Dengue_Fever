<link href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script> 
 <script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery/jquery.min.js"></script>
     

<style>
     #loaddingearch{
            position: fixed;
            left: 0px;
            width: 100%;
            height: 100%;
            padding-left:50%;
            padding-top: 10%;

            }.modal {
            display: none; 
            position: fixed;  
            height:100%; 
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 0px;

        }
</style>

<body class="hold-transition sidebar-mini">
    <form id="FormUploadFileCarCoverage" name="FormUploadFileCarCoverage" method="POST"  enctype="multipart/form-data">
<div class="content-wrapper" style=" padding-top: 2%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                การจัดการข้อมูลตารางความคุ้มครอง
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="col-md-12" id="Div_CarCoverage_view" name="Div_CarCoverage_view" style=" margin-top: 2%;">
                                        <?php $this->load->view('SettingData/CarCoverage'); ?>
                                    </div>
                                </div> 
                                
                                <!--start Searchsub-->
                                <div class="col-md-12">     
                                    <div class="row" style=" margin-top: 2%;"> 
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>สถาานะการใช้งาน</b></button>
                                                </div>
                                                <select class="form-control" id="SearchsubCarCoverage" name="SearchsubCarCoverage">
                                                    <option value="0"> -- เลือกการค้นหา --</option>
                                                    <option value="InsureCode">  รหัสบริษัท </option>
                                                    <option value="IDPackage">  รหัสแพ็คเกจ </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control" id="SearchNameCarCoverage" name="SearchNameCarCoverage">
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <button type="button" class="btn btn-default " style="background-color: #16A951;" onclick="SearchCarCoverage()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <!--End SearchsubPackage-->
                                
                                <div class="col-md-12" id="Table_CarCoverage" name="Table_CarCoverage" >  
                                        <?php $this->load->view('SettingData/TableCarCoverage'); ?>
                                </div>
                                
                                
                                <!-- loading -->
                               <div id="loaddingearch" style=" display: none"> <img src="<?php echo base_url(); ?>assets/images/loader.gif"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div> 
     
    

                                               
</form>
</body>

 

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



<script>
        function pagedatapay(page){	 //แนบตัวแปร page ไปด้วย
            
       var SearchsubCarCoverage = document.getElementById('SearchsubCarCoverage').value;
       var SearchNameCarCoverage = document.getElementById('SearchNameCarCoverage').value; 
       
       var datas = "SearchsubCarCoverage=" + SearchsubCarCoverage+"&SearchNameCarCoverage="+SearchNameCarCoverage+"&page="+page; 

                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Management_Data/SearchCarCoverage') ?>",
                        data:datas
                        }).done(function(data){	
                $('#Table_CarCoverage').html(data);  //Div ที่กลับมาแสดง
                
                }) 	
}
</script>



<script type="text/javascript">
    function SearchCarCoverage() {

       var SearchsubCarCoverage = document.getElementById('SearchsubCarCoverage').value;
       var SearchNameCarCoverage = document.getElementById('SearchNameCarCoverage').value; 
       
       var datas = "SearchsubCarCoverage=" + SearchsubCarCoverage+"&SearchNameCarCoverage="+SearchNameCarCoverage; 
       
        if (SearchsubCarCoverage == 0) {
            alert("กรุณากรอกสถานะการใช้งาน");
            $('#SearchsubCarCoverage').focus();
            document.getElementById("SearchsubCarCoverage").style = "border: 1px red solid;";
        }else if(SearchNameCarCoverage == ''){
            alert("กรุณากรอกข้อความ");
            $('#SearchNameCarCoverage').focus();
            document.getElementById("SearchNameCarCoverage").style = "border: 1px red solid;";
        }else{
        document.getElementById("loaddingearch").style.display = "block";
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('Management_Data/SearchCarCoverage') ?>",
                data: datas,
            }).done(function (data) {
                document.getElementById("loaddingearch").style.display = "none";
                $('#Table_CarCoverage').html(data);
            })
        }
    }
    
    
</script>  



<!--สถานะ UPDATE Status_overRate ปุ่ม switch off/on-->
<script type="text/javascript">
    function switch_CoverRate(ID_CoverRate,switchCoverRate) {

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
                            url: "<?php echo site_url('Management_Data/Update_Status_CoverRate'); ?>",
                            data: $("#FormUploadFileCarCoverage").serialize()+"&ID_CoverRate="+ID_CoverRate+"&switchCoverRate="+switchCoverRate,
                        }).done(function (data) {
                            $('#Table_CarCoverage').html(data);
                        })
                    } else {
                        swal("ไม่เปลี่ยน", "สถานะยังไม่ถูกเปลี่ยน");
                    }
                });
    }
</script>  


<script type="text/javascript">
    function Save_Impost_Coverage() {

//        var numChecked = $("input:checkbox:checked").length;
//        var numnotCheck = $("input:checkbox:not(:checked)").length;
//        
//        if(confirm(numChecked) == true){
//            alert("มีรายการที่ถูกติ๊ก" + numChecked + "มีรายการที่ไม่ถูกติ๊ก" +numnotCheck);
//        }else{
//            alert("กรุณาติ๊กถูกรายการที่ตรวจสอบว่าถูกต้อง" + numChecked);
//        }
        
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
                url: "<?php echo site_url('Management_Data/Save_Edit_TmpCoverage') ?>",
                data: $("#FormUploadFileCarCoverage").serialize(),
            }).done(function (data) {
                $('#Table_CarCoverage').html(data);
            })
            } else {
                        swal("ไม่บันทึก", "ข้อมูลยังไม่ถูกบันทึก");
                    }
            });
            
     }  
</script>

