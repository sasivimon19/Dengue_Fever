<link rel="stylesheet" href="<?php echo base_url()."assets/";?>datetimepicker/build/jquery.datetimepicker.min.css">
<script src="<?php echo base_url()."assets/";?>datetimepicker/jquery.js"></script>
<script src="<?php echo base_url()."assets/";?>datetimepicker/build/jquery.datetimepicker.full.js"></script>


<style type="text/css">
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column1  {
  float: left;
  width: 43%;
  padding: 10px;

   border-style: ridge;
  border-radius: 5px;
}
.column2  {
  float: left;
  width: 57%;
  padding: 10px;

   border-style: ridge;
  border-radius: 5px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column1 , .column2 {
    width: 100%;
    height: 100%;
     margin-top: 10%
  }#btn{
    width: 100%;
    margin-top: 5px;
  }
}#panel, #panel2,#flip ,#flip2 {
  padding: 5px;
  text-align: center;
  background-color: #e5eecc;
  border: solid 1px #c3c3c3;
}

#panel,#panel2 {
  padding: 50px;
  display: none;
}#loadding2{
    position: fixed;
    left: 0px;
    width: 100%;
    height: 100%;
    padding-left:45%;
    padding-top: 15%;

    }.modal {
    display: none; 
    position: fixed;  
    height:100%; 
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 0px;

    }#frmSlip{
      padding:2%
    }
</style>




<div id="loadding2" class="modal" style="display: none">
    <img src="<?php echo base_url();?>assets/images/loader.gif">
</div>

<form id="frmSlip" name="frmSlip" method="post" >

  <div class="row" >
    <div class="column1"  >
     
      <div id="ShowEdit">
      <div class="row" style=" padding-bottom: 5px;" >
        <div class="col-md-4">
          จำนวนเงินที่ต้องชำระ
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control form-control-sm" id="paymoney" name="paymoney"  oninput="fillmoney()">
        </div>
        <div class="col-md-1">
          บาท
        </div>
        <div class="col-md-2"></div>
      </div>

      <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-4">
          ธนาคาร
        </div>
        <div class="col-md-6">
         <select class="form-control form-control-sm" id="bank" name="bank">
          <option value="0">--เลือกธนาคาร--</option>
          <option value="ธนาคารกรุงเทพ">ธนาคารกรุงเทพ</option>
          <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>
          <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
          <option value="ธนาคารเกียรตินาคิน">ธนาคารเกียรตินาคิน</option>
          <option value="ธนาคารซีไอเอ็มบีไทย">ธนาคารซีไอเอ็มบีไทย</option>
          <option value="ธนาคารทหารไทย">ธนาคารทหารไทย</option>
          <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
          <option value="ธนาคารธนชาต">ธนาคารธนชาต</option>
          <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>
          <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
          <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
          <option value="เคาเตอร์ Big C">เคาเตอร์ Big C</option>
          <option value="เคาเตอร์ Lotus">เคาเตอร์ Lotus</option>
          เ<option value="เคาเตอร์ Service">เคาเตอร์ Service</option>
        </select>
      </div>
      <div class="col-md-1">

      </div>
      <div class="col-md-2"></div>
    </div>

    <div class="row" style=" padding-bottom: 5px;">

      <div class="col-md-4">
        วันที่ชำระ
      </div>
      <div class="col-md-6">
       <input type="text" class="form-control form-control-sm" id="datepay" name="datepay" >
     </div>
     <div class="col-md-1">

     </div>
     <div class="col-md-2"></div>
   </div>

   <div class="row" style=" padding-bottom: 5px;">

    <div class="col-md-4">
      อัปโหลดภาพ
    </div>
    <div class="col-md-6">
     <input type='file' id="picname" name="picname" class="form-control form-control-sm"  accept="image/*"> 
   </div>
   <div class="col-md-1">

   </div>
   <div class="col-md-2"></div>
 </div>
<div class="row">
       <div class="col-md-4"></div>
       <div class="col-md-4">
        <img id="show_pig" name="show_pig" src="#"  style="width: 260px;height:200px;border-style: solid">
       </div>
    </div><br> 
    <div class="row" style="">
       <div class="col-md-4"></div>
       <div class="col-md-5">
        <button type="button" id="btn" class="btn btn-danger" style="color: #FFF;font-size:13px;" onclick="btnSaveSlip()">
          <i class="fa fa-floppy-o" aria-hidden="true"></i> บันทึกการแนบหลักฐาน
        </button>
       </div>
    </div>


<input type="hidden" name="summoney" id="summoney" value="">
<input type="hidden" name="PeriodNumber" id="PeriodNumber" value="<?php echo $PeriodNumber ?>">
<input type="hidden" name="TransactionID" id="TransactionID" value="<?php echo $TransactionID ?>">
<input type="hidden" name="Total_FirstPayment" id="Total_FirstPayment" value="<?php echo $Total_FirstPayment ?>">
<input type="hidden" name="Installment" id="Installment" value="<?php echo $Installment ?>">
<input type="hidden" name="Date_Payment" id="Date_Payment" value="<?php echo $Date_Payment ?>">






</div>  <!-- end column -->
</div>
<br><br>

 <?php if($PaymentType == "เงินสด"){ 
       $Payment ="".$Insurance_price."";
    }else{  
       $Payment ="".$payfirst."";
    } ?>

<div class="column2" id="eee">
  <h5>รายการบันทึกใบเสร็จ <?php echo $PROSPECT_LIST_ID ?> <label style="font-size:14px;">(ยอดเงินที่ต้องชำระ<?php echo number_format($Payment,2) ?>)</label> </h5>
      <div id="divslip">
         <?php $this->load->view('Check_buy/SubWork_Notification/table_bill'); ?>
      </div>
    
</div>
</div>
</form>
<div id="dd" ></div>


<script type="text/javascript">
  function fillmoney(){
    

  var count_getsum=<?=$count_getsum?>;

  var  paymoney =  document.getElementById("paymoney").value;
  var  paymoney =  parseFloat(paymoney.replace(/,/g,'')); //cut comma
  var  paymoney =  parseFloat(paymoney.toFixed(2));

  if(count_getsum == 0){
      document.getElementById("summoney").value = paymoney;
  }else{
    
      var  txtsumpay =  document.getElementById("txtsumpay").value;
      var  txtsumpay =  parseFloat(txtsumpay.replace(/,/g,'')); //cut comma
      var  txtsumpay =  parseFloat(txtsumpay.toFixed(2));
      var summoney = txtsumpay+paymoney;
      document.getElementById("summoney").value = summoney;

  } 
}
</script>

 
<script type="text/javascript">
	$("#datepay").datetimepicker();
</script>

<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#show_pig').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#picname").change(function() {
		readURL(this);
	});
</script>
<script type="text/javascript">
  function pagging(){
    var page = document.getElementById("page").value;
    var datas = "page="+page;
    $.ajax({
          type:"POST",
          url:"<?php echo site_url('Check_buy/Page_Pic')?>", //index
          data:datas
        }).done(function(data){
           $('#divslip').html(data);
           
           
        }) 
  }
</script>
<script type="text/javascript">
function btnSaveSlip(){ 
 



  var form_data = new FormData();
  var picname =$('#picname').val();
  form_data.append('file',$('#picname')[0].files[0]);
  var paymoney = $('#paymoney').val();
  form_data.append('paymoney', $('#paymoney').val());
  var bank = $('#bank').val();
  form_data.append('bank', $('#bank').val());
  var datepay = $('#datepay').val();
  form_data.append('datepay', $('#datepay').val());
       
 var txtpostspeclist = $('#txtpostspeclist').val();
  form_data.append('txtpostspeclist', $('#txtpostspeclist').val());
 

 var summoney = $('#summoney').val();
  form_data.append('summoney', $('#summoney').val());


  
  var Insurance_price = $('#Insurance_price').val();
  form_data.append('Insurance_price', $('#Insurance_price').val());

  var PaymentType= $('#PaymentType').val();
  form_data.append('PaymentType', $('#PaymentType').val());

var PeriodNumber= $('#PeriodNumber').val();
  form_data.append('PeriodNumber', $('#PeriodNumber').val());


var TransactionID= $('#TransactionID').val();
  form_data.append('TransactionID', $('#TransactionID').val());


var Total_FirstPayment= $('#Total_FirstPayment').val();
  form_data.append('Total_FirstPayment', $('#Total_FirstPayment').val());


var Installment= $('#Installment').val();
  form_data.append('Installment', $('#Installment').val());



 if(paymoney == ""){
      document.getElementById("paymoney").focus();
 }else if(bank == 0){
      document.getElementById("bank").focus();
 }else if(datepay == ""){
      document.getElementById("datepay").focus();
 }else if(picname == ""){
     document.getElementById("picname").focus();
 }else{
  document.getElementById("loadding2").style.display = "block";
      $.ajax({
          url: '<?php echo site_url('Check_buy/Save_Slip');   ?>',
          cache: false,
          type: 'POST',
          contentType: false,
          processData:false,
          data: form_data,
          success:function(data){
            document.getElementById("loadding2").style.display = "none";

             //document.getElementById("modal-xl").style.display = "none";
            $('#divslip').html(data);

            document.getElementById("paymoney").value = "";
            document.getElementById("bank").value = "";
            document.getElementById("datepay").value = "";
            document.getElementById("picname").value = "";
            document.getElementById('show_pig').removeAttribute('src');
           
          }
        });  
 }

             
	}
</script>

<script type="text/javascript">
  function funcDelete(AutoID,Insurance_price,PROSPECT_LIST_ID,PaymentType,payfirst){
   
    var PeriodNumber = document.getElementById("PeriodNumber").value;
    var TransactionID      = document.getElementById("TransactionID").value;
    var Total_FirstPayment = document.getElementById("Total_FirstPayment").value;
    var Installment   = document.getElementById("Installment").value;
     var datepay   = document.getElementById("datepay").value;
    var datas = "AutoID="+AutoID+"&Insurance_price="+Insurance_price+"&PROSPECT_LIST_ID="+PROSPECT_LIST_ID+"&PaymentType="+PaymentType+"&payfirst="+payfirst+"&PeriodNumber="+PeriodNumber+"&TransactionID="+TransactionID+"&Total_FirstPayment="+Total_FirstPayment+"&Installment="+Installment+"&datepay="+datepay;

    
   
   if(confirm("คุณต้องการที่จะลบข้อมูลใช่หรือไม่") == true){

    document.getElementById("loadding").style.display = "block";
     $.ajax({
          type:"POST",
          url:"<?php echo site_url('Check_buy/Deletebill')?>", //index
          data:datas
        }).done(function(data){
          document.getElementById("loadding").style.display = "none";
           $('#divslip').html(data);

        }) 
   }else{

   }
   
  }
</script>

<!-- <script type="text/javascript">

  
  function FuncConfirm(PeriodNumber,TransID,Date_Payment,Total_FirstPayment,Installment,PROSPECT_LIST_ID){

    
   var datas= "PeriodNumber="+PeriodNumber+"&TransID="+TransID+"&Date_Payment="+Date_Payment+"&Total_FirstPayment="+Total_FirstPayment+"&Installment="+Installment+"&PROSPECT_LIST_ID="+PROSPECT_LIST_ID;
   alert(datas);

  
    $.ajax({
          type:"POST",
          url:"<?php //echo site_url('Check_buy/Confirm_waitChecek')?>", //index
          data:datas
        }).done(function(data){ 
             
            // $('#checkInsurance_premium').html(data);//show
            $('#dd').html(data);
             

        }) 
  }
</script> -->

<script type="text/javascript">


  function FuncConfirm(PeriodNumber,TransactionID,Date_Paymentfirst,Date_Payment,Total_FirstPayment,Installment,PROSPECT_LIST_ID){ ///อันจริงงงงงง

   var txtpostspeclist = document.getElementById("txtpostspeclist").value;
   var Insurance_price = document.getElementById("Insurance_price").value;
   var PaymentType = document.getElementById("PaymentType").value;

   var txtsumpay = document.getElementById("txtsumpay").value;
   var  txtsumpay =  parseFloat(txtsumpay.replace(/,/g,'')); //cut comma
   var  txtsumpay =  parseFloat(txtsumpay.toFixed(2));




   var datas= "txtpostspeclist="+txtpostspeclist+"&Insurance_price="+Insurance_price+"&txtsumpay="+txtsumpay+"&PaymentType="+PaymentType+"&PeriodNumber="+PeriodNumber+"&TransactionID="+TransactionID+"&Date_Paymentfirst="+Date_Paymentfirst+"&Date_Payment="+Date_Payment+"&Total_FirstPayment="+Total_FirstPayment+"&Installment="+Installment+"&PROSPECT_LIST_ID="+PROSPECT_LIST_ID;
   


    document.getElementById("modalshow").style.display = "block"; 
  
    $.ajax({
          type:"POST",
          url:"<?php echo site_url('Check_buy/Confirm_waitChecek')?>", //index
          data:datas
        }).done(function(data){ 
             document.getElementById("modalshow").style.display = "none"; 
             $('#checkInsurance_premium').html(data);//show
            // $('#dd').html(data);
             

        }) 
  }
</script>


