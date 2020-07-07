<link rel="stylesheet" href="<?php echo base_url()."assets/";?>datetimepicker/build/jquery.datetimepicker.min.css">
<script src="<?php echo base_url()."assets/";?>datetimepicker/jquery.js"></script>
<script src="<?php echo base_url()."assets/";?>datetimepicker/build/jquery.datetimepicker.full.js"></script>

  <?php foreach ($Details_Car as $value) { ?> 
<div class="modal-header" style=" background-color:#b30000; color: #fefefe; ">
    <div class="row">
        <div class="col-md-12">
            <div style="font-size:25px;" class="panel-title" style="color:  #0099ff;"> 
                <img class="group list-group-image img-fluid"style=" padding-top: -5%; width: 7%; height: 7%; font-size: 14px;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/<?php echo iconv('TIS-620', 'UTF-8', $value->img); ?>"><b> <?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Company); ?> ( <?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Code_Company); ?> )</b>
                <button class="close" data-dismiss="modal"  aria-hidden="true" type="button" style="margin-top: -1%; margin-right: -32%;" onclick="document.getElementById('mobile_view_SENDIN').style.display = 'none';">&times;</button>
            </div>
        </div>
    </div>  
</div>

        <div class="container">
            <input type="hidden" class="form-control" readonly="true" id="Namecompany" name="Namecompany" value="<?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Code_Company); ?>">
            <div class="row" style="margin-top: 1%;">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-warning"><b>ประเภทประกันภัย</b></button>
                        </div>
                        <input type="text" class="form-control" readonly="true" id="Type_Insurance" name="Type_Insurance" value="<?php echo iconv('TIS-620', 'UTF-8',$value->TYPENAME); ?>">
                        <input type="hidden" class="form-control" readonly="true" id="CODECAR" name="CODECAR" value="<?php echo $value->Code_Car; ?>">
                        <input type="hidden" class="form-control" readonly="true" id="Middle_ID" name="Middle_ID" value="<?php echo $value->Middle_ID; ?>">
                    </div>
                </div>

                <input type="hidden" class="form-control" readonly="true" id="ID_Type_Auto" name="ID_Type_Auto"  value="<?php echo iconv('TIS-620', 'UTF-8', $value->ID_Type_Auto); ?>">
                <input type="hidden" class="form-control" readonly="true" id="Type_ID" name="Type_ID"  value="<?php echo iconv('TIS-620', 'UTF-8', $value->Type_ID); ?>">
                <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-primary"><b>ประกันชั้น</b></button>
                            </div>
                            <input type="text" class="form-control" readonly="true" id="Type_Name" name="Type_Name"  value="<?php echo iconv('TIS-620', 'UTF-8', $value->Type_Name); ?>">
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button type="button" class="btn btn-success"><b>ราคาเบี้ยประกัน</b></button>
                        </div>
                        <input type="text" class="form-control" readonly="true"  id="Insurancepricetotal" name="Insurancepricetotal" style=" background-color: black; color: yellow; text-align: right;" value="<?php echo number_format($value->Insurance_price_total, 2); ?>">
                    </div>
                </div>
            </div> 
            
	    <input type="hidden" class="form-control" readonly="true" id="akonview" name="akonview"  value="<?php echo  $value->Akon ; ?>">
            <input type="hidden" class="form-control" readonly="true" id="taxview" name="taxview"  value="<?php echo  $value->Tax ; ?>">
            <input type="hidden" class="form-control" id="Insurance_price" name="Insurance_price"  readonly="true" value="<?php echo number_format($value->Insurance_price,2) ?>">
            <input type="hidden" class="form-control" id="Current_day" name="Current_day" readonly="true" value="<?php echo $Current_Date ?>">    

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>คำนำหน้า : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <select class="form-control" id="prefix_Insurance" name="prefix_Insurance" onchange="Opencompany()">
                            <option value="0">-- เลือกคำนำหน้า --</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                            <option value="นาย">นาย</option>
                            <option value="บริษัท">บริษัท</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4" style=" display: none"  id="Div_Name_company">
                    <div class="form-group">
                        <label>บริษัท : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <input type="text" class="form-control" id="NameUser_company" name="NameUser_company" placeholder="ชื่อบริษัทเอาประกันภัย">
                    </div>
                </div>
                <div class="col-md-4" id="Div_Name_Follow">
                    <div class="form-group">
                        <label>ชื่อ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <input type="text" class="form-control" id="Name_Follow" name="Name_Follow" placeholder="ชื่อผู้เอาประกันภัย">
                    </div>
                </div>
                <div class="col-md-4" id="Div_lastnames_Follow">
                    <label>สกุล : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                    <input type="text" class="form-control" id="lastnames_Follow" name="lastnames_Follow" placeholder="สกุลผู้เอาประกันภัย">
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">เลขบัตรประชาชน/นิติบุคคล : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <input type="text" class="form-control" id="ID_cardnumber" name="ID_cardnumber" onchange="Check_IDCARD()" placeholder="เลขบัตรประชาชน">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">วัน/เดือน/ปีเกิด : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <!--<input type="text" class="form-control" id="Birthday" name="Birthday" placeholder="วัน/เดือน/ปีเกิด">-->
                        <input type="date" class="form-control" id="Birthday" name="Birthday" placeholder="วัน/เดือน/ปีเกิด" onchange="myFunction(this);">
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>อายุ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>  (ผู้สมัครต้องมีอายุไม่ต่ำกว่า 18 ปี บริบูรณ์)
                        <input type="text" class="form-control" id="Age" name="Age" placeholder="อายุผู้เอาประกันภัย" readonly="true">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputEmail1">โทรศัพท์ติดต่อ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <input type="text" class="form-control" id="Contact_phone" name="Contact_phone" onkeyup="Symboltel(this)" onKeyPress="Checknumber()" placeholder="โทรศัพท์ติดต่อ">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ยี่ห้อรถยนต์ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <select class="form-control" id="CarBrand" name="CarBrand" onchange="show_CarBrand()" readonly="true">
                            <option value="0">-- เลือกยี่ห้อรถยนต์ --</option>
                            <?php foreach ($Brandcar as $item) { ?>
                                <?php if ($value->CarBrand== $item->CarBrand) { ?>
                                    <option value="<?php echo iconv('TIS-620', 'UTF-8', $value->CarBrand); ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $value->CarBrand); ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?>"><?php echo iconv('TIS-620', 'UTF-8', $item->CarBrand); ?></option>    
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>รุ่นรถยนต์ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <select class="form-control" id="CarDesc" name="CarDesc"  onclick="show_CarFamilyDesc()" readonly="true">
                            <?php if ($value->CarModel != '') { ?>
                                <option value="<?php echo iconv('TIS-620', 'UTF-8', $value->CarModel); ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $value->CarModel); ?></option>
                            <?php } else { ?>
                                <option value="0">--- เลือกรุ่น ---</option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ปีรถยนต์ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <select class="form-control"  id="CarYear" name="CarYear" readonly="true">
                            <?php if ($value->CarYear != '') { ?>
                                <option value="<?php echo iconv('TIS-620', 'UTF-8', $value->CarYear); ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $value->CarYear); ?></option>
                            <?php } else { ?>
                                <option value="0">-- เลือกปีรถยนต์ --</option>
                            <?php } ?>
                        </select>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ประเภทรถยนต์ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <select class="form-control" id="CODE" name="CODE" readonly="true">
                            <?php if ($value->CODE != '') { ?>
                                <option value="<?php echo iconv('TIS-620', 'UTF-8', $value->CODE); ?>"selected><?php echo iconv('TIS-620', 'UTF-8', $value->CODE); ?> </option>
                            <?php } else { ?>
                                <option value="0">-- เลือกประเภทรถยนต์ --</option>
                            <?php } ?>
                        </select>
                    </div> 
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>ทะเบียนรถยนต์ : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <input type="text" class="form-control" id="License_Plate" name="License_Plate" placeholder="ทะเบียนรถยนต์">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>จังหวัด : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <select class="form-control" id="PROVINCE_CHECK" name="PROVINCE_CHECK">
                            <option value="0">-- เลือกจังหวัด --</option>
                            <?php foreach ($PROVINCE as $value) { ?>
                                <option value="<?php echo $value->PROVINCE_ID; ?>"><?php echo iconv('TIS-620', 'UTF-8', $value->PROVINCE_NAME); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label style=" color: red;"> การชำระเงิน : &nbsp;<b style=" color: red; font-size: 16px" >*</b></label>
                        <select  class="form-control " id="typepay" name="typepay" style=" background-color: #FFFFA0;">
                            <option value="0">--เลือกประเภทการชำระ--</option>
                            <option value="เงินสด">เงินสด</option>
                            <option value="ผ่อนเงินสด">ผ่อนเงินสด</option>
                        </select>
                    </div>
                </div>
				
		<div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">รายละเอียดเพิ่มเติม : </label>
                        <textarea class="form-control" rows="1" id="More_details" name="More_details" placeholder="รายละเอียดเพิ่มเติม"></textarea>
                    </div>
                </div>
            </div>
       </div>


<div class="modal-footer justify-content-between" style=" background-color:#b30000;">
    <button  data-dismiss="modal" class="btn btn-warning" aria-hidden="true" type="button"  onclick="document.getElementById('mobile_view_SENDIN').style.display = 'none';">Close</button>
    <button type="button" class="btn btn-primary"  onclick="Confirmapplication()">ยืนยันการซื้อประกัน</button>
</div>

<div id='Save_alert'></div>


 <?php } ?>

<script type="text/javascript">
    function Opencompany() {

        var company = document.getElementById("prefix_Insurance").value;

        if (company == "บริษัท") {
            document.getElementById("Div_Name_Follow").style.display = "none";
            document.getElementById("Div_lastnames_Follow").style.display = "none";
            document.getElementById("Div_Name_company").style.display = "block";
        } else {
            document.getElementById("Div_Name_Follow").style.display = "block";
            document.getElementById("Div_lastnames_Follow").style.display = "block";
            document.getElementById("Div_Name_company").style.display = "none";
        }
    }
</script>


<!--Check IDcard ว่าถูกหลักหรือป่าว-->
<script type="text/javascript">
    function Check_IDCARD() {
        var ID_cardnumber = document.getElementById('ID_cardnumber').value;
        var datas = "ID_cardnumber=" + ID_cardnumber;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/CheckID') ?>",
            data: datas,
        }).done(function (data) {
            $('#ID_cardnumber').html(data);
        })
    }
</script>



<!--<script type="text/javascript">
//$(function(){
//    $.datetimepicker.setLocale('th'); // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ. 
//    var objBD=$("#Birthday");
    // กรณีใช้แบบ input
//    objBD.datetimepicker({
//        timepicker:false,
//        format:'d-m-Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
//        lang:'th',  // ต้องกำหนดเสมอถ้าใช้ภาษาไทย และ เป็นปี พ.ศ.
//        yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ    
//        onSelectDate:function(dp,$input){
//            var yearT=new Date(dp).getFullYear()-0;  
//            var yearTH=yearT+543;
//            var fulldate=$input.val();
//            var fulldateTH=fulldate.replace(yearT,yearTH);
//            $input.val(fulldateTH);
//          
//            // ส่วนของการจัดการวันที่ เพื่อหาจำนวนอายุ
//            var dayBirth=objBD.val();    
//            var getdayBirth=dayBirth.split("-");    
//            var YB=getdayBirth[2]-543;    
//            var MB=getdayBirth[1];    
//            var DB=getdayBirth[0];    
             
//            var setdayBirth=moment(YB+"-"+MB+"-"+DB);      
//            var setNowDate=moment();    
//            var yearData=setNowDate.diff(setdayBirth, 'years', true); // ข้อมูลปีแบบทศนิยม    
//            var yearFinal=Math.round(setNowDate.diff(setdayBirth, 'years', true),0); // ปีเต็ม    
//            var yearReal=setNowDate.diff(setdayBirth, 'years'); // ปีจริง    
//            var monthDiff=Math.floor((yearData-yearReal)*12); // เดือน    
////          var str_year_month=yearReal+" ปี "+monthDiff+" เดือน"; // ต่อวันเดือนปี
//            var str_year_month=yearReal;
//           var str_year_mont2=yearReal;
//             var str_year_mont3=yearReal;
//            $("#Age").val(str_year_month);   
//
//            if(str_year_mont3 < 18){
//              alert("ผู้สมัครต้องมีอายุไม่ต่ำกว่า 18 ปี บริบูรณ์");
//              document.getElementById("Age").value = '';
//              document.getElementById("Birthday").value = '';
//            }else{
//               
//            }               
//        },
//    });       
// กรณีใช้กับ input ต้องกำหนดส่วนนี้ด้วยเสมอ เพื่อปรับปีให้เป็น ค.ศ. ก่อนแสดงปฏิทิน
//    objBD.on("mouseenter mouseleave",function(e){
//        var dateValue=objBD.val();
//        if(dateValue!=""){
//                var arr_date=dateValue.split("-"); // ถ้าใช้ตัวแบ่งรูปแบบอื่น ให้เปลี่ยนเป็นตามรูปแบบนั้น
//                // ในที่นี้อยู่ในรูปแบบ 00-00-0000 เป็น d-m-Y  แบ่งด่วย - ดังนั้น ตัวแปรที่เป็นปี จะอยู่ใน array
//                //  ตัวที่สอง arr_date[2] โดยเริ่มนับจาก 0 
//                if(e.type=="mouseenter"){
//                    var yearT=arr_date[2]-543;
//                }       
//                if(e.type=="mouseleave"){
//                    var yearT=parseInt(arr_date[2])+543;                                        
//                }
//
//                dateValue=dateValue.replace(arr_date[2],yearT);
//                objBD.val(dateValue);   
//                                                                             
//        }       
//    });
//});
<!--</script>-->


<script language="javascript">
 function myFunction() {
  var x = document.getElementById("Birthday").value;
  var y = document.getElementById("Current_day").value;
  var m = new Date(x);
  var n = new Date(y);
  var dayDiff = n.getTime() - m.getTime() 
  var sum = Math.floor(dayDiff /(31557600000));
  var thisage = parseInt(sum);
  

  if(thisage < 18){
      alert("ผู้สมัครต้องมีอายุไม่ต่ำกว่า 18 ปี บริบูรณ์");
      document.getElementById('Birthday').value="";
      document.getElementById('Age').value="";
  }else{ 
     document.getElementById("Age").value = thisage;
  }
 }
</script>

<script>
    function Checknumber(){
  if (event.keyCode < 48 || event.keyCode > 57){
        event.returnValue = false;
      }
 }
function Symboltel(obj){
  var pattern=new String("___-___-____"); 
  var pattern_ex=new String("-");
  var returnText=new String("");
        var obj_l=obj.value.length;
        var obj_l2=obj_l-1;
        for(i=0;i<pattern.length;i++){           
            if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){
                returnText+=obj.value+pattern_ex;
                obj.value=returnText;
            }
        }
        if(obj_l>=pattern.length){
            obj.value=obj.value.substr(0,pattern.length);           
        }
 }
                
</script>

<!--<script type="text/javascript">
 $("#Birthday").datetimepicker();
</script>-->





