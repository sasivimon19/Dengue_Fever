
<style type="text/css">
    body{
        font-family:"Angsana New";
        font-size: 20px;
        text-align: justify;
    }
    .Head{
        width:100%;
        height:9%;
        /*border: 1px solid;*/
        padding-top:-120px;
        margin-left:-20px;
    }.Title{
        margin-left: 0px;
        margin-right: 0px;
        padding-top:50px;

    }#titlelogo{
        padding-top: -90px;
        padding-left:200px;
        font-size:13px;
        font-family:"WDB Bangna";
    }
    * {
        box-sizing: border-box;
    }


    #tableborder {
        border-collapse: collapse;
    }

    #tableborder, #tableborder th, #tableborder td {
        border: 1px solid black;
    }


</style> 

<img src="assets/images/JaymartInsurance.PNG" style="width:30%;height:90px;padding-top: -30px;" />
<div id="titlelogo">
    <table style="font-size:15px;">
        <tr>
            <td style="padding-top:-6px;">บริษัท เจมาร์ท อินชัวรันซ์ โบรกเกอร์ จำกัด</td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">JAYMART INSURANCE BROKER</td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">เลขที่ 187 อาคารเจมาร์ท ชั้น 5 ถนนรามคำแหง แขวงราษฏร์พัฒนา เขตสะพานสูง กทม. 10240</td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">187 Jaymart Bldg. 5 fl,Ramkhamheang Rd.,Rat Phatthana,Sapansoong. Bankok 10240, Thailand </td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">T: 02 838 7555    เลขประจำตัวผู้เสียภาษี : 0105556022886 </td>
        </tr>
    </table>
</div>

<div style="height: 3408px;padding:0;padding-bottom:-1000px;">
    <table style="font-size: 15px; padding-top: -10px ">
        <tr>
            <td style="padding-left:500px;padding-top:15px;">วันที่ : <?php echo date("j ".$MONTH." ".$YEAR) ?></td>
        </tr>
<!--    <tr>
            <td style="padding-top:-8px;">เรียน : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; คุณ วิชุดา มหาพรม</td>
        </tr>-->
        <tr>
            <td style="padding-top:-6px;">พนักงานขาย :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $FirstName." ".$LastName ?></td> 
        </tr>
        <tr>
            <td style="padding-top:-6px;">เบอร์โทรศัพท์ :&nbsp;&nbsp; <?php echo $Tel ?></td> 
        </tr>
    </table>

    <table id="tableborder" style="width: 1500px; font-size: 14px; ">
        <tr style=" background-color: #b3f0ff">
           <th  style=" text-align: center;">ชื่อรถยนต์<p>Make</p></th>
           <th style=" text-align: center;">รุ่นรถยนต์<p>Model</p></th>
<!--       <th style=" text-align: center;">เลขทะเบียน<p>License No.</p></th>-->
           <th style=" text-align: center;">ปีรถยนต์<p>Model Year</p></th>
           <th style=" text-align: center;">ประเภทรถยนต์<p>Car Type</p></th>
<!--       <th  style=" text-align: center;">ทุนประกันรถยนต์<p>Car insurance</p></th>
           <th style=" text-align: center;">ที่นั่ง / ขนาดเครื่องยนต์(ซี.ซี)<p>Displacement</p></th>-->
        </tr>
        <tr>
            <td style="text-align: center;white-space:nowrap;"><?php echo $CarBrand ?></td>
            <td style="text-align: center;white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$CarModel) ?></td>
            <!--<td style="text-align: center;white-space:nowrap; ">กกก6666</td>-->
            <td style="text-align: center;white-space:nowrap; "><?php echo $CarYear ?></td>
            <td style="text-align: center;white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $TYPENAME) ?></td>
<!--        <td style="text-align: center;white-space:nowrap; ">910,000</td>
            <td style="text-align: center;white-space:nowrap; ">7 ที่นั่ง/2500cc</td>-->
        </tr> 
    </table>
    <p style=" padding-top: -2%;font-size: 14px;">จำนวนเงินเอาประกัน : กรมธรรม์ประกันภัยนี้ให้ความคุ้มครองเฉาพะข้อตกลงนี้คุ้มครองที่มีจำนวนเอาประกันภัยระบุไว้เท่านั้น</p> 
    <p style=" padding-top: -3%;font-size: 14px;padding-bottom: -9px">Limit of liability : This Policy affords coverage only with respect to those agreements for which a limit of Liability is shown </p> 

    <p style=" text-align: center;"> ใบเสนอราคาเบี้ยประกันภัยรถยนต์ </p>
    <table id="tableborder" style="width: 1500px; font-size: 15px; ">
<!--        <tr>
            <th colspan="1" style=" text-align: center;">ใบเสนอราคาเบี้ยประกันภัยรถยนต์</th>
        </tr>-->
        <tr style=" background-color: #b3f0ff">
            <td style="text-align: center;white-space:nowrap; ">บริษัทประกันภัย</td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="text-align: center;white-space:nowrap; ">
                    <?php echo iconv("TIS-620//ignore", "UTF-8", $value->Insure_Company) ?><p> <?php echo iconv("TIS-620//ignore", "UTF-8", $value->NamePackage) ?></p>
                </td>
            <?php } ?>
        </tr>
        <tr>
            <td style="white-space:nowrap; ">ประเภทประกันภัยรถยนต์</td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="text-align: center;white-space:nowrap; ">
                    <?php echo iconv("TIS-620//ignore", "UTF-8", $value->Type_Name) ?>
                </td>
            <?php } ?>
        </tr> 
        
        <tr>
         <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage1) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <?php if ($value->DetailCoverage1 == "Re1") { ?>
                    <td style="text-align: center;white-space:nowrap; "> ซ่อมอู่ </td>
                <?php } elseif ($value->DetailCoverage1 == "Re2") { ?>
                    <td style="text-align: center;white-space:nowrap; "> ซ่อมห้าง </td>
                <?php } elseif ($value->DetailCoverage1 == "Re3") { ?>
                    <td style="text-align: center;white-space:nowrap; "> ซ่อมเอง </td>
                <?php } ?>
            <?php } ?>
        </tr>
        
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage2) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
            <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage2) ?></td>
            <?php } ?>
        </tr> 
        
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage3) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
            <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage3) ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage4) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage4) ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage5) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage5) ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage6) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage6) ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage7) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage7) ?></td>
            <?php } ?>
        </tr>
        
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage8) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage8) ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage10) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage10) ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="white-space:nowrap;"><?php echo iconv("TIS-620//ignore", "UTF-8//ignore", $HeadCoverage9) ?></td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="white-space:nowrap; "> <?php echo iconv("TIS-620//ignore", "UTF-8//ignore",$value->DetailCoverage9) ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="white-space:nowrap;"> เบื้ยประกันภัยสุทธิ </td>
             <?php foreach ($checkComparison as $value) { ?>
            <td style="text-align: right;white-space:nowrap; "> <?php echo number_format($value->Insurance_price,02) ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="white-space:nowrap;">เบื้ยประกันภัยรวมภาษีอากร</td>
            <?php foreach ($checkComparison as $value) { ?>
            <td style="text-align: right;white-space:nowrap; "> <?php echo number_format($value->Insurance_price_total,02) ?></td>
            <?php } ?>
        </tr>
        <tr>
            <td style="white-space:nowrap;"> ส่วนลดกล้องหน้ารถ (CCTV)</td>
            <?php foreach ($checkComparison as $value) { ?>
                <td style="text-align: right; white-space:nowrap; "> <?php echo number_format($value->Discount_price_cctv, 02) ?></td>
            <?php } ?>
        </tr>
         <tr>
            <td style="white-space:nowrap;"> ยอดชำระเงินสด (งวดเดียว) </td>
            <?php foreach ($checkComparison as $value) { ?>
                    <td style="text-align: right;white-space:nowrap; color: red;"> <?php echo number_format($value->Insurance_price_total, 02) ?></td>
            <?php } ?>
        </tr>
    </table>
    <p style=" padding-top: -2%;font-size: 14px;">หมายเหตุ 1. ชำระเงินด้วยเงินสดหรือผ่อนจ่ายด้วยเงินสด สูงสุดได้ 10 งวด</p> 
    <p style=" padding-top: -3%; margin-left: 38px;font-size: 14px;">2. ชำระด้วยบัตรเครดิตอละสามารถผ่อนจ่ายผ่านบัตรครดิต กสิกร, กรุงศรีสูงสุด , กรุงไทย 6 งวด 0%</p> 
    <p style=" padding-top: -3%; margin-left: 38px;font-size: 14px;">3. บริษัทประกันจะคุ้มครอง 100% กรณีที่มีการถ่ายรูปรถประกอบการออกกรมธรรม์ เฉพาะแบบประกันชั้น 1 เท่านั้น หากยังไม่มีการถ่ายรูปจะคุ้มครองในกรณีเคลมสดเท่านั้น </p>
    <p style=" padding-top: -3%; margin-left: 38px;font-size: 14px;">4. สำหรับแบบประกันที่เป็นชั้น 2+ และ 3+ บริษัทประกันจะคุ้มครองทันทีเมื่อเริ่มมีการแจ้งงานเข้าระบบ </p>
    
  <p style="padding-top:-20px;padding-bottom: -9px"><u>ตารางการผ่อนเงินสด</u></p> 
  
  <table id="tableborder" style="width: 1500px; font-size: 14px;">
      <tr style=" background-color: #b3f0ff">
          <th style="white-space:nowrap;">บริษัทประกัน</th>
          <?php foreach ($checkComparison as $value) { ?>
          <th  style=" text-align: center;"><?php echo iconv("TIS-620//ignore", "UTF-8", $value->Insure_Company) ?><p> <?php echo iconv("TIS-620//ignore", "UTF-8", $value->NamePackage) ?></p></th>
         <?php } ?>
      </tr>
      
     
      <tr>
          <td style="white-space:nowrap;">จำนวนผ่อน (งวด)</td>
          <?php foreach ($checkComparison as $value) { ?>
          <td style="text-align: right;white-space:nowrap; "> <?php echo $value->Max_installment;?></td>
          <?php } ?>
      </tr> 
      <tr>
          <td style="white-space:nowrap;">ดาวน์งวดแรก (%)</td>
           <?php foreach ($checkComparison as $value) { ?>
             <?php if ($value->Max_installment == '0') { ?>
                  <td style="text-align: right;white-space:nowrap;"> - </td>
            <?php } else { ?>
                <td style="text-align: right;white-space:nowrap; "><?php echo number_format($value->Down_payment,02);?></td>
            <?php } ?>
          <?php } ?>
      </tr> 

      <tr>
          <td style="white-space:nowrap;"> ค่าดำเนินงาน </td>
          <?php foreach ($checkComparison as $value) { ?>
            <?php if ($value->Max_installment == '0') { ?>
                  <td style="text-align: right;white-space:nowrap;"> - </td>
            <?php } else { ?>
               <td style="text-align: right;white-space:nowrap; "> 200 </td>
            <?php } ?>
          <?php } ?>
      </tr> 
      <tr>
          <td style="white-space:nowrap;"> ค่าประกันยกเลิกกรมธรรม์</td>
          <?php foreach ($checkComparison as $value) { ?>
          
           <?php if ($value->Max_installment == '0') { ?>
                  <td style="text-align: right;white-space:nowrap;"> - </td>
            <?php } else { ?>
               <td style="text-align: right;white-space:nowrap; "> 200 </td>
            <?php } ?>
          <?php } ?>
      </tr>
      <tr>
      <td style="white-space:nowrap;"> ชำระงวดแรก</td>
          <?php foreach ($checkComparison as $value) {
            $Insurance_price_total =   $value->Insurance_price_total* $value->Down_payment;
             $pay_first = number_format(round($Insurance_price_total,2));
         ?> 
            <?php if ($value->Max_installment == '0') { ?>
                  <td style="text-align: right;white-space:nowrap;"> <?php echo number_format($value->Insurance_price_total,02) ?> </td>
            <?php } else { ?>
                  <td style="text-align: right;white-space:nowrap; "><?php echo $pay_first ?></td>
            <?php } ?>
          <?php } ?>
      </tr> 
      <tr>
          <td style="white-space:nowrap;"> พรบ.(บาท)</td>
             <?php foreach ($checkComparison as $value) { ?>
               <td style="text-align: right;white-space:nowrap; "> - </td>
            <?php } ?>
      </tr> 
      <tr>
          <td style="white-space:nowrap;"> รวมค่าใช้จ่าย (บาท)</td>
          <?php foreach ($checkComparison as $value) {
            $Insurance_price_total =   $value->Insurance_price_total* $value->Down_payment;
             $Totalpay =$Insurance_price_total+400;
            ?>  
              <?php if ($value->Max_installment == '0') { ?>
                  <td style="text-align: right;white-space:nowrap;"> <?php echo number_format($value->Insurance_price_total,02) ?> </td>
              <?php } else { ?>
                  <td style="text-align:right;white-space:nowrap;"> <?php echo number_format(round($Totalpay, 02)) ?></td>
              <?php } ?>

          <?php } ?>
      </tr> 

      <tr>
          <td style="white-space:nowrap;"> ชำระงวดที่ 2-5 / 2-9 (บาท)</td>
          <?php  foreach ($checkComparison as $value) {
              echo $Insurance_price_total = $value->Insurance_price_total; //ค่าเงินจริง
              $SumInsurance_price_total = $value->Insurance_price_total * $value->Down_payment; //ค่างวด * %
              $Countdow = $value->Max_installment-1; //6-2=4
              $Totalpay = $SumInsurance_price_total;
              $installment2 = $Insurance_price_total - $Totalpay;
              $COUNTToaal =  $installment2 / $Countdow;
              ?> 
            <?php if ($value->Max_installment == '0') { ?>
                  <td style="text-align: right;white-space:nowrap;"> - </td>
            <?php } else { ?>
                  <td style="text-align: right;white-space:nowrap;"> <?php echo number_format(round($COUNTToaal, 02)) ?></td>
            <?php } ?>
        <?php } ?>
      </tr>
      <tr>
          <td style="white-space:nowrap;"> ชำระงวดที่สุดท้าย </td>
          <?php  foreach ($checkComparison as $value) {
              echo $Insurance_price_total = $value->Insurance_price_total; //ค่าเงินจริง
              $SumInsurance_price_total = $value->Insurance_price_total * $value->Down_payment; //ค่างวด * %
              $Countdow = $value->Max_installment-1; //6-2=4
              $Totalpay = $SumInsurance_price_total;
              $installment2 = $Insurance_price_total - $Totalpay;
              $COUNTToaal =  $installment2 / $Countdow;
              $discount = $COUNTToaal-200;
              ?> 
            <?php if ($value->Max_installment == '0') { ?>
                  <td style="text-align: right;white-space:nowrap;"> - </td>
            <?php } else { ?>
                  <td style="text-align: right;white-space:nowrap;"> <?php echo number_format(round($discount, 02)) ?></td>
            <?php } ?>
        <?php } ?>
      </tr> 
  </table>

     <table style="font-size: 14px;">
         <tr>
             <td style="padding-left:497px;">ขอแสดงความนับถือ</td>
         </tr>
         <tr>
             <td style="padding-left:499px; padding-top:-2px;"><?php echo $FirstName." ".$LastName ?></td>
         </tr>
         <tr>
            <td style="padding-left:465px; padding-top: -2px;">เจ้าหน้าที่ฝ่ายการตลาดด้านประกันภัย</td>
        </tr>
    </table>
</div>

           
