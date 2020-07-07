  <meta http-equiv="content-type" content="image/png" charset="UTF-8">
  
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
      #tableborder1, #tableborder1 th, #tableborder1 td {
        border: 0px solid black;
    }


</style> 



<img src="assets/images/JaymartInsurance.PNG" style="width:30%;height:90px;padding-top: -28px;" />
<div id="titlelogo" >
    <table style="font-size:16px;">
        <tr>
            <td style="padding-top:-6px;">บริษัท เจ อินชัวร์รันซ์ โบรคเกอร์ จำกัด</td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">JAYMART INSURANCE BROKER</td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">เลขที่ 325/7 อาคารเจมาร์ท ชั้น 4 ถนนรามคำแหง แขวงราษฏร์พัฒนา เขตสะพานสูง กทม. 10240</td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">325/7 Jaymart Bldg. 4 fl,Ramkhamheang Rat Phatthana Rd.,Sapansoong. Bankok 10240, Thailand </td>
        </tr>
        <tr>
            <td style="padding-top:-6px;">T:02 863 7755 F:02 308 9928</td>
        </tr>
    </table>
</div>

<!--<div class="Head">

</div>-->

<div style="height: 3408px;padding:0;padding-bottom:-1000px;">
    <table style="font-size: 15px; padding-top: -8px ">
        <tr>
            <td style="padding-left:500px;padding-top:15px;">วันที่ : <?php echo  date('d-m-Y', strtotime($SaveDate)); ?></td>
        </tr>
        <tr>
            <td style="padding-top:-8px;">เรียน : &nbsp;&nbsp;&nbsp; คุณ <?php echo $CustomerFirstname." ".$CustomerLastname ?></td>
        </tr>
    </table>
    <br><br>
     <table style="font-size: 15px; padding-top: -4px ">
        <tr>
            <td style="padding-top:-5px;">แบบฟอร์มการชำระเงินสำหรับเจ้าหน้าที่ธนาคาร</td>
        </tr>
        <tr>
           <td style="padding-top:-22px; padding-left:610px;">ส่วนของลูกค้า</td>
        </tr>
    </table>

     <table id="tableborder" style="width: 1500px; font-size: 15px;">
        <tr>
            <th  style=" text-align: center;">เลขที่ลูกค้า<p>( Ref.1 )</p></th>
            <th style=" text-align: center;"><p>( Ref.2 )</p></th>
            <th style=" text-align: center;">รหัสบริการ<p></p></th>
            <th style=" text-align: center;">รหัสยอดที่ต้องชำระ<p> (บาท) </p></th>
            <th  style=" text-align: center;">ยอดที่ชำระ<p> (บาท) </p></th>
            <th style=" text-align: center;">ผู้รับเงิน<p>Displacement</p></th>
            <th style=" text-align: center;">วันที่ชำระ<p>Displacement</p></th>
        </tr>
        <tr>
            <td style="text-align: center;white-space:nowrap;"><?php echo $TransactionID ?></td>
            <td style="text-align: center;white-space:nowrap; "><?php echo $CustomerIDCard ?></td>
            <td style="text-align: center;white-space:nowrap; "> JIB </td>
            <td style="text-align: center;white-space:nowrap; "></td>
            <td style="text-align: center;white-space:nowrap; "><?php echo number_format($Total_FirstPayment,2) ?></td>
            <td style="text-align: center;white-space:nowrap; "></td>
            <td style="text-align: center;white-space:nowrap; "></td>
        </tr> 
    </table>
    <br>
    <p style=" padding-top: -1%;font-size: 14px;"> ตัดตามรอยปรุ ...................................................................................................................................................................................................................................</p> 

<p style="text-align: center;white-space:nowrap;">เพื่อเข้าบัญชี : บริษัท เจ อินชัวร์รันซ์ โบรคเกอร์ จำกัด</p>


 <table id="tableborder1" style="width: 1500px; font-size: 14px;">
      <tr>
          <td style="white-space:nowrap;"><img src="assets/images/bangkok.png" style="width:5%;height:30px;" />   บมจ.ธนาคารกรุงเทพ ( Bill Payment )(20 บาท /30 บาท) </td>
          <td style="white-space:nowrap; ">รหัสบริหาร : JIB</td>
      </tr> 
      <tr>
          <td style="white-space:nowrap;"><img src="assets/images/scb.png" style="width:5%;height:30px;" /> บมจ.ธนาคารไทยพาณิชย์ ( Bill Payment )(8 บาท /10 บาท)(ธุระกิจ) </td>
          <td style="white-space:nowrap; ">ชื่อลูกค้า : คุณ <?php echo $CustomerFirstname." ".$CustomerLastname ?> </td>
      </tr>
      <tr>
          <td style="white-space:nowrap;"><img src="assets/images/kasikorn.png" style="width:5%;height:30px;" />   บมจ.ธนาคารกสิกรไทย Comcode : 34517( Bill Payment )(15 บาท /25 บาท) </td>
          <td style="white-space:nowrap; ">เลขที่ลูกค้า (Ref No.1) : <?php echo $TransactionID ?></td>
      </tr>
      <tr>
          <td style="white-space:nowrap;"><img src="assets/images/ktc.png" style="width:5%;height:30px;" />   บมจ.ธนาคารกรุงไทย Comcode : 5331 ( Bill Payment )(15 บาท) </td>
          <td style="white-space:nowrap;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Ref No.2) : <?php echo $CustomerIDCard ?></td>
      </tr> 
      <tr>
          <td style="white-space:nowrap;"><img src="assets/images/krungsri.JPG" style="width:5%;height:30px;" />   บมจ.ธนาคารกรุงศรีอยุธยา Comcode : 43977( Bill Payment )(15 บาท / 20 บาท) </td>
          <td style="white-space:nowrap; ">วันที่ชำระ : .........................................</td>
      </tr> 
      <tr>
          <td style="white-space:nowrap;"><img src="assets/images/Tescolotus.JPG" style="width:5%;height:30px;" />   จุดชำระเงินเทสโก้โลตัล ( 10 / รายการ รับชำระด้วยเงินสด ไม่เกิน 49,000 บาท) </td>
           <td style="white-space:nowrap; ">ชื่อลูกค้า : คุณ <?php echo $CustomerFirstname." ".$CustomerLastname ?></td>
      </tr> 
      <tr>
          <td style="white-space:nowrap;"><img src="assets/images/bigc.png" style="width:5%;height:30px;" />   บิ๊กซีและมินิบิ๊กซี ทุกสาขา ( Bill Payment )</td>
          <td style="white-space:nowrap; "></td>
      </tr>
      <br>
      <tr>
          <td style="white-space:nowrap; "><b>จำนวนเงิน : <?php echo number_format($Total_FirstPayment,2) ?>  ( บาท )</b></td>
          <td style="white-space:nowrap;"><b>จำนวนเงิน : <?php echo $TextbathDebt_balance ?>  ( ตัวอักษร ) </b></td>
      </tr>
      <br>
       <tr>
          <td style="white-space:nowrap;">ชื่อผู้นำฝาก : ................................................................... เบอร์โทร .................................... </td>
          <td style="white-space:nowrap; ">สำหรับเจ้าหน้าที่ธนาคาร : .............................................................</td>
      </tr> 

  </table>
  
    <p style=" padding-top: -2%;font-size: 14px;"><b>หมายเหตุ : </b> อัตราค่าธรรมเนียมของธนาคารที่ระบุไว้ อาจมีการเปลี่ยนแปลงได้ตามความเหมาะสมของแต่ละธนาคาร</p>
    <p style=" padding-top: -2%;font-size: 15px;">โดยไม่ต้องแจ้งให้ทราบล่วงหน้า และเพื่อมิให้เกิดความผิดพลาดในการชำระ กรุณาชำระแบบ Bill Payment เท่านั้น</p>
    <p style=" padding-top: -2%;font-size: 15px;">ค่ามัดจำยกเลิกกรมธรรม์ บริษัทฯ จะทำการคืนเงินให้ลูกค้าโดยการหักจากค่าผ่อนกรมธรรม์ งวดสุดท้าย เมื่อลูกค้าชำระยอดครบทุกงวด</p>
    
    <p style=" padding-top: -2%;font-size: 15px;"><b><u>หากมีข้อสงสัย กรุณาติดต่อกลับ</u></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>คุณพรทิพย์ ทองก้าย 02-8387701</b></p> 

    
    <?php
    ini_set("memory_limit", "256M");
    @session_start();
    require_once APPPATH . "libraries/vendor/autoload.php";
    require_once APPPATH . "libraries/barcode.php";
    $order_id = "Barcode";
    $generator = new barcode_generator();
    $format = (isset($_POST['f']) ? $_POST['f'] : 'png');
    $_POST['h'] = "60";

    $idcardcus;
    $NewTransID;
    $Money = 0;
    $NumberCompany = "|0105556022886";
    $data_b = "" . $NumberCompany . "00\r" . $TransactionID . "\r" . $CustomerIDCard . "\r" . $Total_FirstPayment * 100;
    $image_b = $generator->render_image('code-128', $data_b, $_POST);

    $Total_FirstPayment2 = 0.00;
    $data_bbl = "" . $NumberCompany . "00\r" . $TransactionID . "\r" . $CustomerIDCard . "\r" . $Total_FirstPayment2 * 100;
    $image_bbl = $generator->render_image('code-128', $data_bbl, $_POST);


//    $Total_FirstPayment3 = 10;
//    $data_bb2 = "" . $NumberCompany . "00\r" . $TransactionID . "\r" . $CustomerIDCard . "\r" . $Total_FirstPayment3 * 100;
//    $image_bb2 = $generator->render_image('code-128', $data_bbl, $_POST);

    ob_start();
    imagepng($image_b);
    $imagedata_b = ob_get_contents();
    ob_end_clean();

    ob_start();
    imagepng($image_bbl);
    $imagedata_bbl = ob_get_contents();
    ob_end_clean();

//    ob_start();
//    imagepng($image_bb2);
//    $imagedata_bb2 = ob_get_contents();
//    ob_end_clean();
    ?>

    <table style="font-size: 16px; padding-top: 1%">
        <tr>
            <td style=" padding-top: -1%;font-size: 16px;">บาร์โค้ดชำระเงิน สำหรับงวดแรก</td>
        </tr>
        <tr>

            <td>
                <p>
                    <img src="data:image/png;base64,<?php echo base64_encode($imagedata_b) ?>" width="70%">
                </p>
            </td>
        </tr>
        <tr>
            <td style="font-size: 16px;">ยอดเงินชำระเงิน : <?php echo number_format($Total_FirstPayment, 2) ?></td>
        </tr>
    </table>

    <?php if ($PaymentType == "เงินสด") { ?>

    <?php } else { ?>
        <table style="font-size: 16px;">
            <tr>
                <td style="font-size: 16px;">บาร์โค้ดชำระเงิน สำหรับงวดถัดไป</td>
            </tr>
            <tr>
                <td>
                    <p>
                        <img src="data:image/png;base64,<?php echo base64_encode($imagedata_bbl) ?>" width="70%">
                    </p>
                </td>
            </tr>
        </table>
    <?php } ?>
<!--    <table style="font-size: 16px;">
        <tr>
            <td style="font-size: 12px;">บาร์โค้ดชำระเงิน COUNTTER SERVICE</td>
        </tr>
        <tr>
            <td>
                <p>
                    <img src="data:image/png;base64,<?php //echo base64_encode($imagedata_bb2) ?>" width="63%">
                </p>
            </td>
        </tr>  
    </table>-->
    
<!--    <div style="border-bottom: 1px dotted black ">ยอดเงินชำระเงิน : </div>-->

<!--    <table style="font-size: 16px;">
        <tr>
            <td style="">บาร์โค้ดชำระเงิน สำหรับงวดแรก</td>
        </tr>
        <tr>
            <td>
              <p><barcode code="<?php //echo "|010555602288600" . "\n" . $TransactionID . "\n" . $CustomerIDCard . "\n" . $Total_FirstPayment * 100; ?>" type="C128B" size="0.5" height="2.3"></barcode></p>
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<p>ยอดเงินชำระเงิน : <?php echo number_format($Total_FirstPayment,2) ?></p>
            </td>
            <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <img src="<?php //echo site_url('Preview_controllers/genqrdocePayment/' . $TransactionID . '/' . $CustomerIDCard . '/' . ($Total_FirstPayment * 100)) ?>">
            </td> 
         </tr>
    </table>

    <?php //if ($PaymentType == "เงินสด") { ?>
       
    <?php //} else { ?>
    <table style="font-size: 16px;">
            <tr>
                <td style=" width: 13%;">บาร์โค้ดชำระเงิน สำหรับงวดถัดไป</td>
            </tr>
            <tr>
                <td>
                    <p><barcode code="<?php //echo "|010555602288600" . "\n" . $TransactionID . "\n" . $CustomerIDCard . "\n" . str_replace(',', '', $Installment * 100); ?>" type="C128B" size="0.5" height="2.3"></barcode></p>
                    <p>ยอดเงินชำระงวดถัดไป : <?php //echo number_format($Installment, 2) ?></p>
                </td>
                <td>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <img src="<?php //echo site_url('Preview_controllers/genqrdocePayment/' . $TransactionID . '/' . $CustomerIDCard . '/' . str_replace(',', '', $Installment * 100)) ?>">
            </td> 
            </tr>
    </table>-->
    <?php //} ?>
 </div> 









