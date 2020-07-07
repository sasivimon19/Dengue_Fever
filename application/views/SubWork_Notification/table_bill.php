<style type="text/css">
#picture{
    width:25%;
    height: 20px;
}#slip {
  border-collapse: collapse;
  width: 100%;
}

#slip td, #slip th {
  border: 1px solid #ddd;
  padding: 5px;
}

#slip tr:nth-child(even){background-color: #f2f2f2;}

#slip tr:hover {background-color: #ddd;}

#slip th {
  padding-top: 8px;
  padding-bottom: 8px;
  text-align: center;
  background-color: #17a2b8;
  color: #FFF;
}
</style>

<?php foreach ($Count_get_Picbill as   $value) { 
     $Count = $value->Count;
 } ?>

   <input type="hidden" name="txtpostspeclist" id="txtpostspeclist" value="<?php echo $PROSPECT_LIST_ID ?>" > 
  <?php if($PaymentType == "เงินสด"){ ?>
      <input type="hidden" name="Insurance_price" id="Insurance_price" value="<?php echo $Insurance_price?>">
  <?php }else{ ?>
     <input type="hidden" name="Insurance_price" id="Insurance_price" value="<?php echo $payfirst?>">
  <?php } ?>

    <input type="hidden" name="PaymentType" id="PaymentType" value="<?php echo $PaymentType ?>" > 
 <table class="table" id="slip">
  <tr style="text-align: center">
    <th style="width:2%">#</th>
    <th style="width:2%"></th>
    <th style="width:40%">ภาพ</th>
    <th style="width:10%">ธนาคาร</th>
    <th nowrap>สถานะ</th>
	<th nowrap>วันที่ชำระ</th>
    <th nowrap style="width:15%">จำนวนเงินที่แนบ</th>
   
  </tr>
  <?php 
  if(count($get_Picbill) == 0){  ?>
      <tr>
        <td colspan="7" style="text-align:center;">ไม่มีรายการ</td>
      </tr>
<?php  }else{  
     
      foreach ($get_Picbill as $row) { ?>
      <tr style="text-align: center">
        <td><?php echo $row->Row ?></td>

        <?php if($row->Status == 1){  ?>
              
                <td></td>
       <?php   }else {  ?>
                
                <td><i class="fa fa-trash" aria-hidden="true" style="color: #136F63;cursor: pointer;"  onclick="funcDelete(AutoID=<?php echo $row->AutoID ?>,Insurance_price='<?php echo $Insurance_price ?>',PROSPECT_LIST_ID='<?php echo $row->PROSPECT_LIST_ID ?>')"></i></td>
        <?php  } ?> 

          
        <td><img src="<?php echo base_url('JIB_PAYSLIP/'.$row->Image.''); ?>" id="picture"></td>
        <td nowrap style="text-align: left"><?php echo iconv("Tis-620","Utf-8",$row->Bank) ?></td>
       
          <?php if($row->Status == 1){  ?>
              
                <td nowrap style="color: green"><i class="fa fa-check" aria-hidden="true" style="color: green"></i> อนุมัติแล้ว</td>
       <?php   }else if($row->Status == 0) {  ?>
                
                <td nowrap style="color: #FF5700"><i class="fa fa-clock-o" aria-hidden="true" style="color: #FF5700"></i> รอการอนุมัติ</td>  
        
        <?php  }else if($row->Status == 2) {  ?>
                
                <td nowrap style="color: red"><i class="fa fa-times" aria-hidden="true" style="color: red"></i> ไม่อนุมัติ</td>  
        <?php  } ?> 
         <td style="text-align: right;white-space:nowrap;"><?php echo date("d-m-Y H:i",strtotime($row->Date_pay)) ?></td>
        <td style="text-align: right"><?php echo number_format($row->Payment,2) ?></td>
       
      </tr>
     
<?php 
    $start=0;
    $pageend =10;
    $where ="WHERE SaveBy ='".$FirstName."'  AND PROSPECT_LIST_ID='".$row->PROSPECT_LIST_ID."' ";
    $correct_Picbill = $this->Model_HomeInsurance->gettable_image($start,$pageend,$where);
    $sum = 0;
    foreach ($correct_Picbill as $value) { 
            $sum = $sum+$value->Payment;  
     }  ?> 
<?php  } ?>
  <tr>
    <td colspan="6" style="text-align: right">รวม</td>
    <td>
      <input type="text" name="txtsumpay" id="txtsumpay" class="form-control form-control-sm" value="<?php echo  number_format($sum,2); ?>" readonly style="text-align: right;font-size: 16px;background-color:#000;color:yellow">
    </td>
  </tr>


 <?php } ?>


</table>

<div class="row">
  <div class="col-md-9"></div>
  <div class="col-md-3">
      <!-- 
           if($checkStatus_Payslip == "2"){ 
           <button type="button" class="btn btn-primary btn-sm" disabled="true" onclick="FuncConfirm()" style="font-size: 12px;">ยืนยันการแจ้งงาน</button>  -->
 <?php if($checkStatus_Payslip == "1"){ ?>
              <button type="button" class="btn btn-success btn-sm"  disabled="true" style="font-size: 12px;">รอการตรวจสอบข้อมูล</button>
      <?php }else{ ?>
              <button type="button" class="btn btn-primary btn-sm" id="Y" style="display:none"   onclick="FuncConfirm()">ยืนยันการแจ้งงาน</button>
      <?php } ?>
    </div>
</div>
 
 

<script type="text/javascript">
 
  var Count=<?=$Count?>;
  var checkStatus_Payslip=<?=$checkStatus_Payslip?>;  //สถานะปุ่ม 
  
  if(Count == 0 ){

  }else{

    var  txtsumpay =  document.getElementById("txtsumpay").value;
    var  txtsumpay =  parseFloat(txtsumpay.replace(/,/g,'')); //cut comma
    var  txtsumpay =  parseFloat(txtsumpay.toFixed(2));
    var Insurance_price =  document.getElementById("Insurance_price").value;

      if(txtsumpay == Insurance_price || txtsumpay > Insurance_price){

             
            if(checkStatus_Payslip == 4){

            }else if(checkStatus_Payslip == 3){

            }else if(checkStatus_Payslip == 2){
				
            }else if(checkStatus_Payslip == 1){
				
            }else{
                  document.getElementById("Y").style.display = "block";
            }
         
            
      }else{
         
             document.getElementById("Y").style.display = "none";
      }


  }
 
</script>







