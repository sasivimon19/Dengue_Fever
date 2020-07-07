<link href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script> 

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
    <div class="content-wrapper" style=" padding-top: 2%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                การจัดการข้อมูลตารางแพ็คเกจ
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="col-md-12" id="Div_Package_view" name="Div_Package_view" style=" margin-top: 2%;">
                                          <?php $this->load->view('SettingData/EditTablePackage'); ?>  
                                    </div>
                                </div> 
                                
                                <!--start SearchsubPackage-->
                                <div class="col-md-12">     
                                    <div class="row" style=" margin-top: 2%;"> 
                                        <div class="col-md-5"></div>
                                        <div class="col-md-4">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>สถาานะการใช้งาน</b></button>
                                                </div>
                                                <select class="form-control" id="SearchsubPackage" name="SearchsubPackage">
                                                    <option value="0"> -- เลือกการค้นหา --</option>
                                                    <option value="InsureCode">  รหัสบริษัท </option>
                                                    <option value="NamePackage">  ซื่อแพ็คเกจ </option>
                                                    <option value="IDPackage">  IDPackage </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control" id="SearchNamePackage" name="SearchNamePackage">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-default " style="background-color: #16A951;" onclick="SearchPackage()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                  
                                        
                                    </div>
                                </div>
                                <!--End SearchsubPackage-->
                                
                                <div class="col-md-12" id="Table_Package" name="Table_Package" >
                                    <form id="Form_Table_Package" name="Form_Table_Package">
                                        <?php $this->load->view('SettingData/TablePackage'); ?>
                                    </form>
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
</body>


<script>
        function pagedatapay(page){	 //แนบตัวแปร page ไปด้วย
            
       var SearchsubPackage = document.getElementById('SearchsubPackage').value;
       var SearchNamePackage = document.getElementById('SearchNamePackage').value;
       
        var datas = "SearchsubPackage=" + SearchsubPackage+"&SearchNamePackage="+SearchNamePackage+"&page="+page;

                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Management_Data/SearchCarPackage') ?>",
                        data:datas
                        }).done(function(data){	
                $('#Table_Package').html(data);  //Div ที่กลับมาแสดง
                
                }) 	
}
</script>



<script type="text/javascript">
    function SearchPackage() {

       var SearchsubPackage = document.getElementById('SearchsubPackage').value;
       var SearchNamePackage = document.getElementById('SearchNamePackage').value; 
       
       var datas = "SearchsubPackage=" + SearchsubPackage+"&SearchNamePackage="+SearchNamePackage; 
        if (SearchsubPackage == 0) {
            alert("กรุณากรอกสถานะการใช้งาน");
            $('#SearchsubPackage').focus();
            document.getElementById("SearchsubPackage").style = "border: 1px red solid;";
        }else if(SearchNamePackage == ''){
            alert("กรุณากรอกข้อความ");
            $('#SearchNamePackage').focus();
            document.getElementById("SearchNamePackage").style = "border: 1px red solid;";
        }else{
        document.getElementById("loaddingearch").style.display = "block";
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('Management_Data/SearchCarPackage') ?>",
                 data: datas,
            }).done(function (data) {
                document.getElementById("loaddingearch").style.display = "none";
                $('#Table_Package').html(data);
            })
        }
    }
</script>  

<script type="text/javascript">
    function ADD_CarPackage() {

        var ID_InsureCode = document.getElementById('ID_InsureCode').value;
        var NamePackage = document.getElementById('NamePackage').value;
        var Status_Package = document.getElementById('Status_Package').value;

        if (ID_InsureCode == 0) {
            alert("กรุณากรอกรหัสบริษัท");
            $('#ID_InsureCode').focus();
            document.getElementById("ID_InsureCode").style = "border: 1px red solid;";
        } else if (NamePackage == "") {
            alert("กรุณากรอกซื่อแพ็คเก็ต");
            $('#NamePackage').focus();
            document.getElementById("NamePackage").style = "border: 1px red solid;";
        } else if (Status_Package == 0) {
            alert("กรุณากรอกสถานะการใช้งาน");
            $('#Status_Package').focus();
            document.getElementById("Status_Package").style = "border: 1px red solid;";
        } else {
            document.getElementById("loaddingearch").style.display = "block";
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Management_Data/Insernt_Package') ?>",
                data: $("#Package_view").serialize(),
            }).done(function (data) {
                document.getElementById("loaddingearch").style.display = "none";
                $('#Table_Package').html(data);
            })
        }
    }
</script>  



<script type="text/javascript">
    function Edit_Car_Package(IDPackage) {
        
//        var ID_InsureCode = document.getElementById('ID_InsureCode').value;
//        var NamePackage = document.getElementById('NamePackage').value;
//        var Status_Package = document.getElementById('Status_Package').value;
//        
//
//        if (ID_InsureCode == 0) {
//            alert("กรุณากรอกรหัสบริษัท");
//            $('#ID_InsureCode').focus();
//            document.getElementById("ID_InsureCode").style = "border: 1px red solid;";
//        } else if (NamePackage == "") {
//            alert("กรุณากรอกซื่อแพ็คเก็ต");
//            $('#NamePackage').focus();
//            document.getElementById("NamePackage").style = "border: 1px red solid;";
//        } else if (Status_Package == 0) {
//            alert("กรุณากรอกสถานะการใช้งาน");
//            $('#Status_Package').focus();
//            document.getElementById("Status_Package").style = "border: 1px red solid;";
//        } else {
            document.getElementById("loaddingearch").style.display = "block";
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Management_Data/EditUpdate_CarPackage') ?>",
                data: $("#Package_view").serialize()+"&IDPackage="+IDPackage,
            }).done(function (data) {
                document.getElementById("loaddingearch").style.display = "none";
                $('#Table_Package').html(data);
            })
        }
//    }
</script>  
 


<script type="text/javascript">
    function Edit_CarPackage(IDPackage,StatusEdit) {
        var datas = "IDPackage=" + IDPackage+"&StatusEdit="+StatusEdit;
        document.getElementById("loaddingearch").style.display = "block";
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Management_Data/Edit_Package') ?>",
            data: datas,
        }).done(function (data) {
            document.getElementById("loaddingearch").style.display = "none";
            $('#Div_Package_view').html(data);
        })
    }
</script>

<script type="text/javascript">
    function Cleandata() {

       document.getElementById('ID_InsureCode').value = '0';
       document.getElementById('NamePackage').value = '';
       document.getElementById('Status_Package').value = '0';
        
    }
</script>  



<!--สถานะ UPDATE Status_Package ปุ่ม switch off/on-->
<script type="text/javascript">
    function switchPackage(IDPackage,StatusswitchPackage) {
//        var datas = "IDPackage=" + IDPackage+"&StatusswitchPackage="+StatusswitchPackage;
//            $.ajax({
//                type: "POST",
//                url: "<?php echo site_url('Management_Data/Update_Status_Package') ?>",
//                 data: datas,
//            }).done(function (data) {
//                $('#Table_Package').html(data);
//            })
//        }
  swal({
            title: "คุณแน่ใจหรือไม่",
//          text: "คุณจะไม่สามารถกู้คืนไฟล์นี้!",
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
                            url: "<?php echo site_url('Management_Data/Update_Status_Package'); ?>",
                             data: $("#Package_view").serialize()+"&IDPackage="+IDPackage+"&StatusswitchPackage="+StatusswitchPackage,
                        }).done(function (data) {
                            $('#Table_Package').html(data);
                        })
                    } else {
                        swal("ไม่เปลี่ยน", "สถานะยังไม่ถูกเปลี่ยน");
                    }
                });
    }
</script>  

<!--<script>
    function DeletePackage(IDPackage) {
        swal({
            title: "คุณแน่ใจหรือไม่",
            text: "คุณจะไม่สามารถกู้คืนไฟล์นี้!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "ใช่ลบเลย!",
            cancelButtonText: "ไม่ลบ!",
            closeOnConfirm: false,
            closeOnCancel: false
        },
                function (isConfirm) {
                    if (isConfirm) {
                        swal("ลบ!", "ไฟล์ของคุณถูกลบแล้ว");
                        $.ajax({
                            type: "POST",
                            url: "<?php echo site_url('Management_Data/Delete_Car_Package');  ?>",
                             data: $("#Package_view").serialize()+"&IDPackage="+IDPackage,
                        }).done(function (data) {
                            $('#Table_Package').html(data);
                        })
                    } else {
                        swal("ลบ", "ไฟล์ของคุณปลอดภัยแล้ว");
                    }
                });
    }
</script>-->













