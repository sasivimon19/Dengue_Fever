<style type="text/css">
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 100%;
  padding: 10px;
  height: 410px; /* Should be removed. Only for demonstration */
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
  .column {
    width: 100%;
  }
}
#pay_first{
    background-color:#000;
    color:yellow;
}
</style>

<?php foreach ($Call_Work as  $value) {
   $Insurance_price_total = number_format($value->Insurance_price_total,2);
?>
<br>
<div class="row">
    <div class="col-sm-2" style="text-align:right;padding-top:5px;">ประเภทการชำระ</div>
	<div class="col-sm-3">
        <div class="input-group mb-3">

            <input type="text" name="typepay" id="typepay" class="form-control form-control-sm" value="<?php echo $PaymentType ?>" readonly>
           <!--  <select  class="" id="typepay" name="typepay" onchange="selectTypepay()">
                <option value="0">--เลือกประเภทการชำระ--</option>

                <option value="cash">เงินสด</option>
                <option value="installment">ผ่อนชำระ</option>
            </select> -->
        </div>
	</div>
    <div class="col-sm-3" style="text-align:right;padding-top:5px;">ยอดรวมที่ลูกค้าต้องชำระ (12) = (1)+(2)+(3)</div>
    <div class="col-sm-3">
        <div class="input-group" >
            <input type="text" class="form-control form-control-sm" id="sum_customer_pay" name="sum_customer_pay" value="<?php echo $Insurance_price_total ?>"  readonly>
        </div>
    </div>
     <div class="col-sm-1" style="text-align:left;padding-top:5px;">บาท</div>
</div>

<div class="row" >
  <div class="column" id="divinstallment">
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            เบี้ยประกันรวม (1)
        </div>
        <div class="col-md-2">
             <input type="text" class="form-control form-control-sm"  name="afterdiscount" id="afterdiscount" value="<?php echo number_format($Insurance_Price,2) ?>" readonly="true" style="text-align:right">
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
             ภาษี (2)
        </div>
        <div class="col-md-2">
             <input type="text" class="form-control form-control-sm"  name="tax" id="tax" value="<?php echo number_format($value->TAX,2) ?>" readonly="true" style="text-align:right">
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
             อากร (3)
        </div>
        <div class="col-md-2">
             <input type="text" class="form-control form-control-sm"  name="Akon" id="Akon" value="<?php echo number_format($value->AKON,2) ?>" readonly="true" style="text-align:right">
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            จำนวนงวด (4)
        </div>
        <div class="col-md-2">
             <input type="number" class="form-control form-control-sm" value="<?php echo $Max_installment?>" name="amount_install" id="amount_install"  style="text-align:right" readonly>
        </div>
        <div class="col-md-1">
            งวด
        </div>
        <div class="col-md-2"></div>
    </div>

    <input type="hidden" name="style_installment" id="style_installment" value="เงินสด">
           
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            เปอร์เซ็นดาวน์งวดแรก (5)
        </div>
        <div class="col-md-2">
          <input type="text" class="form-control form-control-sm" name="percent" id="percent" value="<?php echo number_format($Down_payment*100,2) ?>" style="text-align:right" readonly>
        </div>
        <div class="col-md-1">
            %
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            ดาวน์งวดแรก (6) = (1) * (5)
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control form-control-sm" value="" name="installment_first" id="installment_first" style="text-align:right" readonly>
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            ค่าดำเนินการ (7)
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control form-control-sm" value="200.00" readonly="true" name="pay_process" id="pay_process" style="text-align:right">
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            เงินมัดจำยกเลิกกรมธรรม์ (8)
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control form-control-sm" value="200.00" readonly="true" name="cancel_insurance" id="cancel_insurance" style="text-align:right">
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            วันครบดิว (9)
        </div>
        <div class="col-md-2" id="Day_Dew" name="Day_Dew">
            <select class="form-control form-control-sm">
                <option value="1">1</option>
                <option value="15">15</option>
            </select>
        </div>
        <div class="col-md-1">
            วัน
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
             ยอดชำระแต่ละงวด  (10)= (12)-(11)  / (4)-1
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control form-control-sm" name="sum_instasll" id="sum_instasll" style="text-align:right" readonly>
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
    <!-- <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            พ.ร.บ. รวม
        </div>
        <div class="col-md-2">
           <input type="text" class="form-control form-control-sm" name="sum_sheet" id="sum_sheet">
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div> -->
    <div class="row" style=" padding-bottom: 5px;">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            รวมจ่ายครั้งแรก (11) =(12)*(5)+(6)+(7)
        </div>
        <div class="col-md-2">
            <input type="text" class="form-control form-control-sm" name="pay_first" id="pay_first" style="text-align:right" readonly>
        </div>
        <div class="col-md-1">
            บาท
        </div>
        <div class="col-md-2"></div>
    </div>
  </div>
   <div class="column" id="divcash" >
        <div class="row" style=" padding-bottom: 5px;">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                เบี้ยประกันรวม (1)
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control form-control-sm" id="after_discountcash" name="after_discountcash" value="<?php echo number_format($Insurance_Price,2) ?>" style="text-align:right" readonly>
            </div>
            <div class="col-md-1">
                บาท
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style=" padding-bottom: 5px;">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                ภาษี (2)
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control form-control-sm" id="tax" name="tax"  value="<?php echo number_format($value->TAX,2) ?>"  style="text-align:right" readonly>
            </div>
            <div class="col-md-1">
                บาท
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row" style=" padding-bottom: 5px;">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                อากร (3)
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control form-control-sm" id="Akon" name="Akon" value="<?php echo number_format($value->AKON,2) ?>" style="text-align:right" readonly>
            </div>
            <div class="col-md-1">
                บาท
            </div>
            <div class="col-md-2"></div>
        </div>
        <!--  <div class="row" style=" padding-bottom: 5px;">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                รวม (4) = (1)+(2)+(3)
            </div>
            <div class="col-md-2">
                <?php $Akon = 200;
                      $Tax  = 151;
                      $sumcash = $Insurance_Price + $Akon+ $Tax ?>
               <input type="text" class="form-control form-control-sm" id="sumcash" name="sumcash" style="text-align:right" value="<?php echo number_format($sumcash,2) ?>" readonly>
            </div>
            <div class="col-md-1">
                บาท
            </div>
            <div class="col-md-2"></div>
        </div> -->
   </div>

</div>
<br>
 <?php } ?>


<script type="text/javascript">
    //document.getElementById("divcash").style.display = "none";
    // document.getElementById("divinstallment").style.display = "block";
    var typepay = document.getElementById("typepay").value;
      
     if(typepay == "เงินสด"){
      
         document.getElementById("divinstallment").style.display = "none";
        document.getElementById("divcash").style.display = "block";
     }else{
   
        document.getElementById("divcash").style.display = "none";
        document.getElementById("divinstallment").style.display = "block";
     }

</script>
<script type="text/javascript">
    var installment_first = parseFloat(document.getElementById("installment_first").value);
    var pay_process       = parseFloat(document.getElementById("pay_process").value);
    var cancel_insurance  = parseFloat(document.getElementById("cancel_insurance").value);
    var percent           = parseFloat(document.getElementById("percent").value);
    var typepay           = document.getElementById("typepay").value;  //ประเภทการชำระ

    var afterdiscount = document.getElementById("afterdiscount").value;
    var change_afterdiscount = parseFloat(afterdiscount.replace(/,/g,''));
    var amount_install = parseFloat(document.getElementById("amount_install").value); //จำนวนงวด

    var sum_customer_pay = document.getElementById("sum_customer_pay").value; //ยอดรวมที่ลูกค้าต้องชำระ
    var sum_customer_pay = parseFloat(sum_customer_pay.replace(/,/g,''));
 
    var pay_first   = document.getElementById("pay_first").value; 
    var pay_first = parseFloat(pay_first.replace(/,/g,''));


    var downFirst = (change_afterdiscount * percent)/100;  //เบี้ยประกันรวม * เปอร์เซนต์
     document.getElementById("installment_first").value = downFirst.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","); //ดาวน์งวดแรก

 //(ยอดรวมที่ลูกค้าต้องชำระ*เปอร์เซ็นดาวน์งวดแรก  ) +ค่าดำเนินการ+เงินมัดจำยกเลิกกรมธรรม์ 
    var pay_first = ((sum_customer_pay * percent)/100) + pay_process+cancel_insurance;//รวมจ่ายครั้งแรก
    document.getElementById("pay_first").value = pay_first.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","); 


    var pay =  (sum_customer_pay - pay_first) // ยอดที่ต้องชำระ = ยอดรวมที่ลูกค้าต้องชำระ - รวมจ่ายครั้งแรก
    var amount = (amount_install-1); //จำนวนงวด - 1 เพราะ จ่ายเข้ามาแล้ว 1 งวด เลยต้องหักออก
    var pay_installment =  pay/amount; // ยอดชำระแต่ละงวด  = ยอดที่ต้องชำระ/จำนวนงวด
    document.getElementById("sum_instasll").value = pay_installment.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","); //ยอดชำระแต่ละงวด

</script>
