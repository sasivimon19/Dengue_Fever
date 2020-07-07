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
<style>
    #scroll {
                position:fixed;
                left: 1420px;
                bottom:8px;
                cursor:pointer;
                width:50px;
                height:50px;
                background-color:#0040ff;
                text-indent:-9999px;
                display:none;
                -webkit-border-radius:60px;
                -moz-border-radius:60px;
                border-radius:60px
            }
            #scroll span {
                position:absolute;
                top:50%;
                left:50%;
                margin-left:-8px;
                margin-top:-12px;
                height:0;
                width:0;
                border:8px solid transparent;
                border-bottom-color:#ffffff;
            }
            #scroll:hover {
                background-color:#e3801c;
                opacity:1;filter:"alpha(opacity=100)";
                -ms-filter:"alpha(opacity=100)";
            }
            li:hover {
               background-color:  #000;
            }
</style>

<body class="hold-transition sidebar-mini">
  <form id="FormUploadFileCar" name="FormUploadFileCar" method="POST" enctype="multipart/form-data">
    <div class="content-wrapper" style=" padding-top: 2%;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                การจัดการข้อมูลตารางรถ
                            </h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="col-md-12" id="Addcar_view" name="Addcar_view" style=" margin-top: 1%;">
                                        <?php $this->load->view('SettingData/Addcarinformation'); ?>
                                    </div>
                                </div> 

                                <!--start SearchsubCarInformation-->
                                <div class="col-md-12">     
                                    <div class="row" style=" margin-top: 2%;"> 
                                        <div class="col-md-3">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>ยี่ห้อรถยนต์</b></button>
                                                </div>
                                                <select class="form-control" id="SearchsubCarBrand" name="SearchsubCarBrand" onchange="CarBrand_CarInformation()">
                                                    <option value="0"> -- เลือกยี่ห้อรถยนต์ --</option>
                                                     <?php foreach ($Brandcar as $item) { ?>
                                                    <option value="<?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?>"><?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?></option>    
                                                     <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>รุ่นรถยนต์</b></button>
                                                </div>
                                                <select class="form-control" id="SearchsubCarModel" name="SearchsubCarModel" disabled="true" onchange="show_CarFamilyDesc()">
                                                    <option value="0"> -- เลือกรุ่นรถยนต์ --</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-4">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>ปีรถยนต์</b></button>
                                                </div>
                                                <select class="form-control" id="SearchsubCarYear" name="SearchsubCarYear" disabled="true" >
                                                    <option value="0"> -- เลือกปีรถยนต์ --</option>
                                                   
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="input-group mb-4">
                                                <input type="text" class="form-control" id="inputsearch" name="inputsearch" placeholder="รุ่นย่อย">
                                                <div class="input-group-prepend" >
                                                    <button type="button" class="btn btn-default " style="background-color: #16A951;" onclick="SearchCarinformation()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                                </div>   
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                                
                                <!--End SearchsubCarInformation-->
                                <div class="col-md-12" id="Table_carinformation" name="Table_carinformation" >
                                    <?php $this->load->view('SettingData/Tablecarinformation'); ?>
                                </div>

                                <!-- loading -->
                                <div id="loaddingearch" style=" display: none"> <img src="<?php echo base_url(); ?>assets/images/loader.gif"></div>
                                 <a href="javascript:void(0);" id="scroll" title="กลับไปบนสุด" style="display: none;">Top<span></span></a>
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
    function CarBrand_CarInformation() {

        document.getElementById("SearchsubCarModel").disabled = false;
        var car_brand = document.getElementById('SearchsubCarBrand').value;
        var datas = "car_brand=" + car_brand;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Car_Model') ?>",
            data: datas,
        }).done(function (data) {
            $('#SearchsubCarModel').html(data);
        })
    }
</script>


<script type="text/javascript">
    function show_CarFamilyDesc() {
        
        document.getElementById("SearchsubCarYear").disabled = false;
	document.getElementById('MakeDescription').value="";
        var Car_modil = document.getElementById('SearchsubCarModel').value;
        var datas = "Car_modil=" + Car_modil;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Year_Car') ?>",
            data: datas,
        }).done(function (data) {
            $('#SearchsubCarYear').html(data);
        })
    }
</script>

<script>
        function pagging(page){
   
          var SearchsubCarBrand = document.getElementById('SearchsubCarBrand').value;
          var SearchsubCarModel = document.getElementById('SearchsubCarModel').value;
          var SearchsubCarYear = document.getElementById('SearchsubCarYear').value;
          var inputsearch = document.getElementById('inputsearch').value;
           var datas = "SearchsubCarBrand="+SearchsubCarBrand+"&SearchsubCarModel="+SearchsubCarModel+"&SearchsubCarYear="+SearchsubCarYear+"&inputsearch="+inputsearch+"&page="+page;
         
           
          $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Management_Data/SearchCarMain') ?>",
                        data:datas,
                        }).done(function(data){	

                $('#Table_carinformation').html(data);  //Div ที่กลับมาแสดง
                    
                }) 
          
          
        }
</script>


<script type="text/javascript">
    function SearchCarinformation() {

        var SearchsubCarBrand = document.getElementById('SearchsubCarBrand').value;
        var SearchsubCarModel = document.getElementById('SearchsubCarModel').value;
        var SearchsubCarYear = document.getElementById('SearchsubCarYear').value;
        var inputsearch = document.getElementById('inputsearch').value;
        
        var datas = "SearchsubCarBrand="+SearchsubCarBrand+"&SearchsubCarModel="+SearchsubCarModel+"&SearchsubCarYear="+SearchsubCarYear+"&inputsearch="+inputsearch;

        
        if(SearchsubCarBrand == '0') {
            $('#SearchsubCarBrand').focus();
            document.getElementById("SearchsubCarBrand").style = "border: 1px red solid;";
        }if (SearchsubCarModel == '0') {
            $('#SearchsubCarModel').focus();
            document.getElementById("SearchsubCarModel").style = "border: 1px red solid;";
        }if (SearchsubCarYear == '0') {
            $('#SearchsubCarYear').focus();
            document.getElementById("SearchsubCarYear").style = "border: 1px red solid;";
        }else {
        document.getElementById("loaddingearch").style.display = "block";
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Management_Data/SearchCarMain') ?>",
            data: datas,
        }).done(function (data) {
            document.getElementById("loaddingearch").style.display = "none";
            $('#Table_carinformation').html(data);
        })
    }
}   

</script>


<!--     กลับไปบนสุด       -->
<script type='text/javascript'>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('#scroll').fadeIn();
            } else {
                $('#scroll').fadeOut();
            }
        });
        $('#scroll').click(function () {
            $("html, body").animate({scrollTop: 0}, 600);
            return false;
        });
    });
</script>




<script>
    var amountScrolled = 300;
    $(window).scroll(function () {
        if ($(window).scrollTop() > amountScrolled) {
            $('a.back-to-top').fadeIn('slow');
        } else {
            $('a.back-to-top').fadeOut('slow');
        }
    });
</script>

<script type="text/javascript">
    function ADD_CarInformation() {

        var CarBrand = document.getElementById('CarBrand').value;
        var CarModel = document.getElementById('CarModel').value;
        var MakeDescription = document.getElementById('MakeDescription').value;
        var CarYear = document.getElementById('CarYear').value;
        var EngineCC = document.getElementById('EngineCC').value;
        var Group  = document.getElementById('Group').value;

        if (CarBrand == 0) {
//            alert("กรุณากรอกยี่ห้อรถ");
            $('#CarBrand').focus();
            document.getElementById("CarBrand").style = "border: 1px red solid;";
        }if (CarModel == "") {
//            alert("กรุณากรอกรุ่นรถยนต์");
            $('#CarModel').focus();
            document.getElementById("CarModel").style = "border: 1px red solid;";
        } if (MakeDescription == "") {
//            alert("กรุณากรอกรุ่นย่อย");
            $('#MakeDescription').focus();
            document.getElementById("MakeDescription").style = "border: 1px red solid;";
        }  if (CarYear == 0) {
//            alert("กรุณากรอกปีรถยนต์");
            $('#CarYear').focus();
            document.getElementById("CarYear").style = "border: 1px red solid;";
        } if (EngineCC == 0) {
//            alert("กรุณากรอกซีซี");
            $('#EngineCC').focus();
            document.getElementById("EngineCC").style = "border: 1px red solid;";
        } if (Group == 0) {
//            alert("กรุณากรอกกลุ่มรถยนต์");
            $('#Group').focus();
            document.getElementById("Group").style = "border: 1px red solid;";
        } else {
            document.getElementById("loaddingearch").style.display = "block";
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Management_Data/Insernt_CarInformation') ?>",
                data: $("#FormUploadFileCar").serialize(),
            }).done(function (data) {
                document.getElementById("loaddingearch").style.display = "none";
                $('#Table_carinformation').html(data);
            })
        }
    }
</script>  

<script type="text/javascript">
    function Edit_CarInformation(Code_Car,StatusEdit) {
 
        var datas = "Code_Car=" + Code_Car+"&StatusEdit="+StatusEdit;
        alert(datas);
//        document.getElementById("loaddingearch").style.display = "block";
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Management_Data/EditCarInformation') ?>",
            data: datas,
        }).done(function (data) {
             alert('datas');
//            document.getElementById("loaddingearch").style.display = "none";
            $('#Addcar_view').html(data);
        })
    }
</script>


<script type="text/javascript">
    function CleanCarInformation() {

       document.getElementById('CarBrand').value = '0';
       document.getElementById('CarModel').value = '';
       document.getElementById('MakeDescription').value = '';
       document.getElementById('CarYear').value = '0';
       document.getElementById('EngineCC').value = '0';
       document.getElementById('Group').value = '0';
       document.getElementById('NewPrice').value = '';
       document.getElementById('Sale_Price').value = '';
        
    }
</script>  


<!--สถานะ UPDATE Status_Package ปุ่ม switch off/on-->
<script type="text/javascript">
    function switchCar(Code_Car,StatusswitchCar) {

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
                            url: "<?php echo site_url('Management_Data/Update_Status_Car'); ?>",
                             data: $("#FormUploadFileCar").serialize()+"&Code_Car="+Code_Car+"&StatusswitchCar="+StatusswitchCar,
                        }).done(function (data) {
                            $('#Table_carinformation').html(data);
                        })
                    } else {
                        swal("ไม่เปลี่ยน", "สถานะยังไม่ถูกเปลี่ยน");
                    }
                });
    }
</script>  



















