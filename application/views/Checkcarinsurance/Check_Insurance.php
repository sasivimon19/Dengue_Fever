
<link href="<?php echo base_url(); ?>dist/DataTables-1.10.19/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"> 
<script src="<?php echo base_url(); ?>dist/DataTables-1.10.19/media/js/jquery.dataTables.min.js"></script>
<link href="<?php echo base_url(); ?>dist/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="<?php echo base_url(); ?>assets/jquery-ui.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>assets/jquery-1.12.4.js"></script>
<script src="<?php echo base_url(); ?>assets/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">


<style>
    @media only screen and (max-width: 600px)  {
        #button_Search{
            margin-top: -15%;
        }
    }
    @media only screen and (max-width: 600px)  {
                .icheck-primary{
                    margin-bottom: 5px
           }
    }
    
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

<style>
    .view-group {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: row;
        flex-direction: row;
        padding-left: 0;
        margin-bottom: 0;
    }
    .thumbnail
    {
        margin-bottom: 30px;
        padding: 0px;
        -webkit-border-radius: 0px;
        -moz-border-radius: 0px;
        border-radius: 0px;
    }

    .item.list-group-item
    {
        float: none;
        width: 100%;
        background-color: #fff;
        margin-bottom: 30px;
        -ms-flex: 0 0 100%;
        flex: 0 0 100%;
        max-width: 100%;
        padding: 0 1rem;
        border: 0;
    }
    .item.list-group-item .img-event {
        float: left;
        width: 30%;
    }

    .item.list-group-item .list-group-image
    {
        margin-right: 10px;
    }
    .item.list-group-item .thumbnail
    {
        margin-bottom: 0px;
        display: inline-block;
    }
    .item.list-group-item .caption
    {
        float: left;
        width: 70%;
        margin: 0;
    }

    .item.list-group-item:before, .item.list-group-item:after
    {
        display: table;
        content: " ";
    }

    .item.list-group-item:after
    {
        clear: both;
    }
    .modal-backdrop {
        display: none;    
    }

</style>
 
<form id="FormCheck_Search_More" method="POST" action="<?php echo site_url('Preview_controllers/Get_Preview') ?>" target="_blank">
    <div class="row" id="SumCheck">
        <div class="col-md-12">
            <div class="card card-blue">
                <div class="card-header">
                <h3 class="card-title">แสดงผล</h3>     
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"> 
                            <div class="card-header">
                                <h3 class="card-title">เลือกประกันรถตามงบ</h3>  
                            </div>
                            <br>
                            <div class="form-group">
                                <label>ยี่ห้อรถยนต์</label>
                                <select class="form-control " id="CarBrand" name="CarBrand" onchange="show_CarBrand()">
                                    <option value="0">-- เลือกยี่ห้อรถยนต์ --</option>
                                    <?php foreach ($Brandcar as $item) { ?>
                                        <?php if ($CarBrand == $item->CarBrand) { ?>
                                            <option value="<?php echo iconv('TIS-620', 'UTF-8', $CarBrand); ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $CarBrand); ?></option>
                                        <?php } else { ?>
                                            <option value="<?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?>"><?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?></option>    
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>รุ่นรถยนต์</label>
                                <select class="form-control " id="CarDesc" name="CarDesc"  onclick="show_CarFamilyDesc()">
                                    <?php if ($Car_model != '') { ?>
                                        <option value="<?php echo $Car_model; ?>"selected><?php echo $Car_model; ?></option>
                                    <?php } else { ?>
                                        <option value="0">--- เลือกรุ่น ---</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ปีรถยนต์</label>
                                <select class="form-control "  id="CarYear" name="CarYear" onchange="show_TypeCar2()">
                                    <?php if ($Car_Year != '') { ?>
                                        <option value="<?php echo iconv('TIS-620', 'UTF-8', $Car_Year); ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $Car_Year); ?></option>
                                    <?php } else { ?>
                                        <option value="0">-- เลือกปีรถยนต์ --</option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" class="form-control form-control-sm" id="MakeDescription" name="MakeDescription" value="<?php echo $MakeDescription; ?>" style="display:block;">
                            </div>
                            <div class="form-group">
                                <label>ประเภทการใช้รถยนต์</label>
                                <select class="form-control "  id="Type_Car" name="Type_Car"  >  
                                    <?php if ($CODE != '') { ?>
                                        <option value="<?php echo iconv('TIS-620', 'UTF-8', $CODE); ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $CODE); ?></option>
                                    <?php } else { ?>
                                        <option value="0">-- เลือกประเภทการใช้รถยนต์ --</option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="form-group ">
                                <label>ความคุ้มครองหลัก</label>
                                <select class="form-control "  id="Maincoverage" name="Maincoverage">    
                                    <option value="0">-- เลือกความคุ้มครองหลัก --</option>
                                    <?php foreach ($Coverage1 as $item) { ?>
                                        <?php if ($item->DetailCoverage1 == 'Re1') { ?>
                                            <option value="<?php echo $item->DetailCoverage1; ?>">ซ่อมอู่</option>
                                        <?php } elseif ($item->DetailCoverage1 == 'Re2') { ?>
                                            <option value="<?php echo $item->DetailCoverage1; ?>">ซ่อมห้าง</option>
                                        <?php } elseif ($item->DetailCoverage1 == 'Re1' || $item->DetailCoverage1 == 'Re2') { ?>
                                            <option value="<?php echo $item->DetailCoverage1; ?>">ซ่อมอู่</option>
                                            <option value="<?php echo $item->DetailCoverage1; ?>">ซ่อมห้าง</option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>ประกันภัยชั้น</label>
                                <div class="row">
                                    <br>
                                    &nbsp;<div class="icheck-primary d-inline">
                                        <input class="checkboxLength" type="checkbox" id="Length_1" name="Length[]" value="1">
                                        <label for="Length_1"> 1 </label>
                                    </div> 
                                    &nbsp;<div class="icheck-primary d-inline">
                                        <input class="checkboxLength" type="checkbox" id="Length_2" name="Length[]" value="2">
                                        <label for="Length_2"> 2 </label>
                                    </div>
                                    &nbsp;<div class="icheck-primary d-inline">
                                        <input class="checkboxLength" type="checkbox" id="Length_2+" name="Length[]"value="3"> 
                                        <label for="Length_2+"> 2+ </label>
                                    </div>
                                    &nbsp;<div class="icheck-primary d-inline">
                                        <input class="checkboxLength" type="checkbox" id="Length_3" name="Length[]"value="4">
                                        <label for="Length_3"> 3 </label>
                                    </div>
                                    &nbsp;<div class="icheck-primary d-inline">
                                        <input class="checkboxLength" type="checkbox" id="Length_3+" name="Length[]" value="5" >
                                        <label for="Length_3+"> 3+ </label>
                                    </div>
                                    &nbsp; <div class="icheck-primary d-inline">
                                        <input class="checkboxLength" type="checkbox" id="Length_ALL" name="Length_ALL[]" >                               
                                        <label for="Length_ALL"> ALL </label>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label>บริษัทประกัน</label>
                                <div class="row">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxCompany" type="checkbox" id="Company_ALL" name="Company_ALL[]" >                               
                                        <label for="Company_ALL"> เลือก/ ไม่เลือก ทั้งหมด </label>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxCompany" type="checkbox" id="JPI" name="company[]" value="JPI">
                                        <label for="JPI"><img style=" padding-top: -5%; width: 10%; height: 10%;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/JP.png"> เจพีประกันภัย </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxCompany" type="checkbox" id="DHP" name="company[]" value="DHP">
                                        <label for="DHP"><img style=" padding-top: -5%; width: 10%; height: 10%;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/DHIP.png"> ทิพยประกันภัย </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxCompany" type="checkbox" id="TNI" name="company[]"value="TNI"> 
                                        <label for="TNI"><img style=" padding-top: -5%; width: 10%; height: 10%;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/TNI.png"> ธนชาตประกันภัย </label>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxCompany" type="checkbox" id="VIB" name="company[]"value="VIB">
                                        <label for="VIB"><img style=" padding-top: -5%; width: 10%; height: 10%;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/VIB.png"> วิริยะประกันภัย </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="icheck-primary d-inline">
                                        <input class="checkboxCompany" type="checkbox" id="MTI" name="company[]" value="MTI" >
                                        <label for="MTI"><img style=" padding-top: -5%; width: 10%; height: 10%;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/MTI.png"> เมืองไทยประกันภัย </label>
                                    </div>
                                </div>
                   
                            </div>
                            
                            
                            <div class="form-group">
                                <label>งบประมาณไม่เกิน</label>
                                <!--<input type="text" class="form-control" id="Standard_Capital" name="Standard_Capital" placeholder="งบประมาณไม่เกิน">-->   
                            </div> 
                          
                            <div id="my_slider"></div>
                            <br>
                            <!--<div id="my_display"></div>-->
                            <div class="col-md-6">
                                <input class="form-control" style=" background-color: papayawhip" type="text" id="my_display" name="my_display" readonly="true">
                            </div>
                            <br><br>
                            <center><button type="button" class="btn btn-primary" id="button_Search" onclick="Search_More()">ค้นหา</button></center>
                        </div>
                        
                      
                        <div class="col-md-9">
                            <div id="Search_Sub" class="tabcontent" >
                                <?php $this->load->view('Show_search'); ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container" id="comparison" >
        
        <footer class="main-footer">
            <?php //$this->load->view('footer'); ?>
        </footer>
    </div>
    
    <a href="javascript:void(0);" id="scroll" title="กลับไปบนสุด" style="display: none;">Top<span></span></a>
    
    <!--input box ข้อมูลเปรียบเทียบเป็นตัว-->
    <div  style="display: none;">
      <input type="text" name="checktext1" id="checktext1" value="">
      <input type="text" name="checktext2" id="checktext2" value="">
      <input type="text" name="checktext3" id="checktext3" value="">
    </div>
    
</form>

<script type="text/javascript">
    function show_TypeCar2() {

        document.getElementById("Type_Car").disabled = false;

        var car_brand = document.getElementById('CarBrand').value;
        var Car_modil = document.getElementById('CarDesc').value;
        var YearGroup = document.getElementById('CarYear').value;

        var datas = "car_brand=" + car_brand + "&Car_modil=" + Car_modil + "&YearGroup=" + YearGroup;
		
        document.getElementById("loadding").style.display = "block";
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Typecar') ?>",
            data: datas,
        }).done(function (data) {
            document.getElementById("loadding").style.display = "none"; 
            $('#Type_Car').html(data);
            
        }) 
    }
</script>
 

<script>
    function Pricecomparison(checkbox_id) {



   var  Middle_ID = document.getElementById(checkbox_id).value;

   var checktext1= document.getElementById('checktext1').value;

  var  checktext2= document.getElementById('checktext2').value;

  var  checktext3= document.getElementById('checktext3').value;

   
    if( document.getElementById(checkbox_id).checked == true){
        

                if (checktext1 != '' &&  checktext2!='' && checktext3!=''){
                    alert("เลือกเปรียบเทียบได้ไม่เกิน 3 รายการ");
                    document.getElementById(checkbox_id).checked = false;
                }else{

                        if(checktext1 == '' ){ document.getElementById('checktext1').value=Middle_ID; }
                        else  if(checktext2 == '' ){ document.getElementById('checktext2').value=Middle_ID;  }
                        else  if(checktext3 == '' ){ document.getElementById('checktext3').value=Middle_ID;}
                }

    }else{


                if(checktext1 == Middle_ID){  document.getElementById('checktext1').value=''; }
                else  if(checktext2 ==Middle_ID){  document.getElementById('checktext2').value=''; }
                else    if(checktext3 ==Middle_ID){ document.getElementById('checktext3').value=''; }

    }
		$.ajax({
                                type: "POST",
                                url: "<?php echo site_url('HomeInsurance/Comparison_Price')  ?>",
                                data: $("#FormCheck_Search_More").serialize(),
                            }).done(function (data) {
                                $('#comparison').html(data);
                                Search_More();
                            });  


      
    }

    function Pricecomparison_Delete(Middle_ID) {
   
       var checktext1 = document.getElementById('checktext1').value;
       var  checktext2 = document.getElementById('checktext2').value;
       var checktext3 = document.getElementById('checktext3').value;
        
        

        if(checktext1 == Middle_ID)
        {  
            document.getElementById('checktext1').value = ''; 
            document.getElementById("vehicle"+Middle_ID).checked = false;
        }
        
        else  if(checktext2 == Middle_ID)
        {  
          document.getElementById('checktext2').value = ''; 
            document.getElementById("vehicle"+Middle_ID).checked = false;
               alert(checktext2+Middle_ID);
        }
       
        else  if(checktext3 == Middle_ID){ 
            document.getElementById('checktext3').value = ''; 
            document.getElementById("vehicle"+Middle_ID).checked = false;
        
        }
    
          $.ajax({
                                type: "POST",
                                url: "<?php echo site_url('HomeInsurance/Comparison_Price')  ?>",
                                data: $("#FormCheck_Search_More").serialize(),
                            }).done(function (data) {
                                $('#comparison').html(data);
//                                Search_More();
                            });  

    }
</script>


<!--Mobile_mobile_popup_SENDIN-->
<div class="modal fade" id="modal-xl">
    <div class="modal-dialog modal-xl">
        <!--        <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Large Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>-->
        <div class="modal-body">
            <div id="mobile_view_SENDIN" name="mobile_view_SENDIN" >
                <form class="modal-content animate" id='mobile_popup_SENDIN' enctype="multipart/form-data" >

                </form>
            </div>
        </div>
        <!--            <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>-->
        <!--</div>-->
    </div>
</div>





<!--Mobile_view_Description-->
<div class="modal fade" id="modal-lg" >
    <div class="modal-dialog modal-lg">
        <!--<div class="modal-content">-->
<!--            <div class="modal-header">
                <h4 class="modal-title">Large Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>-->
            <div class="modal-body">
                <div id="mobile_view_Description" name="mobile_view_Description" >
                    <form class="modal-content animate" id='mobilepopupDescription'>

                    </form>
                </div>
            </div>
<!--            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
        <!--</div>-->
    </div>
</div>





<script>
    $(document).ready(function () {
        $(function () {
            $("#my_slider").slider({
                min: 3000,
                max: 50000,
                step: 50,
                slide: function (event, ui) {
                    document.getElementById('my_display').value = ui.value.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");  
//                  $("#my_display").html(ui.value);
                }
            });
        });
    })
</script> 


<!--script check all-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#Company_ALL').click(function (event) {
            if (this.checked) {
                $('.checkboxCompany').each(function () { //loop through each checkbox
                    $(this).prop('checked', true); //check 
                });
            } else {
                $('.checkboxCompany').each(function () { //loop through each checkbox
                    $(this).prop('checked', false); //uncheck              
                });
            }
        });
    });
</script>


<!--script check all-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#Length_ALL').click(function (event) {
            if (this.checked) {
                $('.checkboxLength').each(function () { //loop through each checkbox
                    $(this).prop('checked', true); //check 
                });
            } else {
                $('.checkboxLength').each(function () { //loop through each checkbox
                    $(this).prop('checked', false); //uncheck              
                });
            }
        });
    });
</script>


<script type="text/javascript">
    function Search_More() {
        
         var CarBrand = document.getElementById('CarBrand').value;
         var CarDesc = document.getElementById('CarDesc').value;
         var CarYear = document.getElementById('CarYear').value;
         var Type_Car = document.getElementById('Type_Car').value;
	 var MakeDescription = document.getElementById('MakeDescription').value;


         if (CarBrand == 0) {
            alert("กรุณากรอกยี่ห้อรถยนต์");
            $('#CarBrand').focus();
            document.getElementById("CarBrand").style = "border: 1px red solid;";
        } else if (CarDesc == 0) {
            alert("กรุณากรอกรุ่นรถยนต์");
            $('#CarDesc').focus();
            document.getElementById("CarDesc").style = "border: 1px red solid;";
        } else if (CarYear == 0) {
            alert("กรุณากรอกปีรถยนต์");
            $('#CarYear').focus();
            document.getElementById("CarYear").style = "border: 1px red solid;";
         } else if (Type_Car == 0) {
            alert("กรุณากรอกประกันภัยชั้น");
            $('#Type_Car').focus();
            document.getElementById("Type_Car").style = "border: 1px red solid;";
        } else { 
        $('#loadding').show();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Search_More') ?>", 
            data: $("#FormCheck_Search_More").serialize(),
        }).done(function (data) {
            document.getElementById("loadding").style.display = "none";
            $('#Search_Sub').html(data);
        })
    }
}
</script>


<script>
    function FUN_SENDIN(Middle_ID) {

        document.getElementById('mobile_view_SENDIN').style.display = "block"; //ให้ modal แสดง
      var datas = "Middle_ID=" + Middle_ID;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Show_Interested') ?>",
            data: datas,
        }).done(function (data) {
            $('#mobile_popup_SENDIN').html(data);

        })
    }
</script>

<script>
    function FUN_Description(Middle_ID) {
        
         var datas = "Middle_ID=" + Middle_ID;

        document.getElementById('mobile_view_Description').style.display = "block"; //ให้ modal แสดง
     

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/GetInterested') ?>",
            data: datas,
        }).done(function (data) {
            $('#mobilepopupDescription').html(data);
        })
    }
</script>


<script type="text/javascript">
    function show_CarBrand() {
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
    function show_CarFamilyDesc() {
        document.getElementById("CarYear").disabled = false;
	document.getElementById('MakeDescription').value="";
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
</script>


<script type="text/javascript">
    function show_TypeCar() {
        document.getElementById("Type_Car").disabled = false;
        var car_brand = document.getElementById('car_brand').value;
        var Car_modil = document.getElementById('Car_modil').value;
        var YearGroup = document.getElementById('YearGroup').value;
        var datas = "car_brand=" + car_brand + "&Car_modil=" + Car_modil + "&YearGroup=" + YearGroup;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Check_Typecar') ?>",
            data: datas,
        }).done(function (data) {
            $('#Type_Car').html(data);
        })
    }
</script>



<script>
    function Confirmapplication() {        
        var prefix_Insurance = $('#prefix_Insurance').val();
        var Name_Follow = $('#Name_Follow').val();
        var lastnames_Follow = $('#lastnames_Follow').val();
        var ID_cardnumber = $('#ID_cardnumber').val();
        var Contact_phone = $('#Contact_phone').val();
        var CarBrand = $('#CarBrand').val();
        var CarDesc = $('#CarDesc').val();
        var CarYear = $('#CarYear').val();
        var CODE = $('#CODE').val();
        var License_Plate = $('#License_Plate').val();
        var PROVINCE_CHECK = $('#PROVINCE_CHECK').val();
        var NameUser_company = $('#NameUser_company').val();
        var Birthday = $('#Birthday').val();
        var typepay = $('#typepay').val();

        if(prefix_Insurance == "บริษัท"){
        if (prefix_Insurance == 0) {
            alert("กรุณากรอกคำนำหน้าชื่อ");
            $('#prefix_Insurance').focus();
            document.getElementById("prefix_Insurance").style = "border: 1px red solid;";    
        }else if (NameUser_company == "") {
            alert("กรุณากรอกซื่อบริษัท");
            $('#NameUser_company').focus();
            document.getElementById("NameUser_company").style = "border: 1px red solid;";
         }else if (Birthday == "") {
            alert("กรุณากรอกวันเดือนปีเกิด");
            $('#Birthday').focus();
            document.getElementById("Birthday").style = "border: 1px red solid;";   
        } else if (Contact_phone == "") {
            alert("กรุณากรอกโทรศัพท์ติดต่อ");
            $('#Contact_phone').focus();
            document.getElementById("Contact_phone").style = "border: 1px red solid;";
        }else if (CarBrand == 0) {
            alert("กรุณากรอกยี่ห้อรถยนต์");
            $('#CarBrand').focus();
            document.getElementById("CarBrand").style = "border: 1px red solid;"; 
         }else if (CarDesc == 0) {
            alert("กรุณากรอกรุ่นรถยนต์");
            $('#CarDesc').focus();
            document.getElementById("CarDesc").style = "border: 1px red solid;";
         }else if (CarYear == 0) {
            alert("กรุณากรอกปีรถยนต์");
            $('#CarYear').focus();
            document.getElementById("CarYear").style = "border: 1px red solid;";    
         }else if (CODE == 0) {
            alert("กรุณากรอกประเภทรถยนต์");
            $('#CODE').focus();
            document.getElementById("CODE").style = "border: 1px red solid;";    
         }else if (License_Plate == 0) {
            alert("กรุณากรอกทะเบียนรถยนต์");
            $('#License_Plate').focus();
            document.getElementById("License_Plate").style = "border: 1px red solid;"; 
         }else if (PROVINCE_CHECK == 0) {
            alert("กรุณากรอกจังหวัด");
            $('#PROVINCE_CHECK').focus();
            document.getElementById("PROVINCE_CHECK").style = "border: 1px red solid;";
         }else if (typepay == 0) {
            alert("กรุณากรอกการชำระเงิน");
            $('#typepay').focus();
            document.getElementById("typepay").style = "border: 1px red solid;";
         }else {
            $('#loadding').show();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('HomeInsurance/quotation_information') ?>",
                data: $("#mobile_popup_SENDIN").serialize(),
            }).done(function (data) {
                document.getElementById("loadding").style.display = "none";
                $('#Save_alert').html(data);
		document.getElementById('mobile_view_SENDIN').style.display = 'none';
			
                $(".modal-backdrop").css("display", "none");
                $('#passwordsNoMatchRegister').fadeIn(1000);
                setTimeout(function () {
                    $('#passwordsNoMatchRegister').fadeOut(1000);
                }, 6000);
            }) 
        }
      }else{
        if(prefix_Insurance == 0) {
            alert("กรุณากรอกคำนำหน้าชื่อ");
            $('#prefix_Insurance').focus();
            document.getElementById("prefix_Insurance").style = "border: 1px red solid;";    
        }else if (Name_Follow == "") {
            alert("กรุณากรอกชื่อ");
            $('#Name_Follow').focus();
            document.getElementById("Name_Follow").style = "border: 1px red solid;";
        } else if (lastnames_Follow == "") {
            alert("กรุณากรอกสกุล");
            $('#lastnames_Follow').focus();
            document.getElementById("lastnames_Follow").style = "border: 1px red solid;";
        } else if (ID_cardnumber == "") {
            alert("กรุณากรอกเลขบัตรประชาชน");
            $('#ID_cardnumber').focus();
            document.getElementById("ID_cardnumber").style = "border: 1px red solid;";
        }else if (Birthday == "") {
            alert("กรุณากรอกวันเดือนปีเกิด");
            $('#Birthday').focus();
            document.getElementById("Birthday").style = "border: 1px red solid;";         
        } else if (Contact_phone == "") {
            alert("กรุณากรอกโทรศัพท์ติดต่อ");
            $('#Contact_phone').focus();
            document.getElementById("Contact_phone").style = "border: 1px red solid;";
        }else if (CarBrand == 0) {
            alert("กรุณากรอกยี่ห้อรถยนต์");
            $('#CarBrand').focus();
            document.getElementById("CarBrand").style = "border: 1px red solid;"; 
         }else if (CarDesc == 0) {
            alert("กรุณากรอกรุ่นรถยนต์");
            $('#CarDesc').focus();
            document.getElementById("CarDesc").style = "border: 1px red solid;";
         }else if (CarYear == 0) {
            alert("กรุณากรอกปีรถยนต์");
            $('#CarYear').focus();
            document.getElementById("CarYear").style = "border: 1px red solid;";    
         }else if (CODE == 0) {
            alert("กรุณากรอกประเภทรถยนต์");
            $('#CODE').focus();
            document.getElementById("CODE").style = "border: 1px red solid;";    
         }else if (License_Plate == 0) {
            alert("กรุณากรอกประเภทรถยนต์");
            $('#License_Plate').focus();
            document.getElementById("License_Plate").style = "border: 1px red solid;"; 
         }else if (PROVINCE_CHECK == 0) {
            alert("กรุณากรอกจังหวัด");
            $('#PROVINCE_CHECK').focus();
            document.getElementById("PROVINCE_CHECK").style = "border: 1px red solid;"; 
         }else if (typepay == 0) {
            alert("กรุณากรอกการชำระเงิน");
            $('#typepay').focus();
            document.getElementById("typepay").style = "border: 1px red solid;";
        } else {       
            $('#loadding').show();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('HomeInsurance/quotation_information') ?>",
                data: $("#mobile_popup_SENDIN").serialize(),
            }).done(function (data) {
                document.getElementById("loadding").style.display = "none";
                $('#Save_alert').html(data);
				document.getElementById('mobile_view_SENDIN').style.display = 'none';
			
                $(".modal-backdrop").css("display", "none");				
                $('#passwordsNoMatchRegister').fadeIn(1000);
                setTimeout(function () {
                    $('#passwordsNoMatchRegister').fadeOut(1000);
                }, 6000);
            })
        }
    }
}
</script>



<script>
    $(document).ready(function () {
        $('#list').click(function (event) {
            event.preventDefault();
            $('#products .item').addClass('list-group-item');
        });
        $('#grid').click(function (event) {
            event.preventDefault();
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');
        });
    });
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


<!-- 15 นาที ออกจากระบบ--> 
<script>
    var timeout;
    document.onmousemove = function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            window.location.href = "<?php echo site_url('HomeInsurance/Logout'); ?>";
        }, 900000); //1นาที = 60000 หน่วย = 60000 x 15นาที = 900000 หน่วย
    }
</script>
<!-- END 15 นาที ออกจากระบบ-->
