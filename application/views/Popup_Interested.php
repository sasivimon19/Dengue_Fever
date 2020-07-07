<style>
    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: white;
    }
</style>
  <?php foreach ($Details_Car as $value) { ?> 
<div class="modal-header " style=" background-color:#b30000; color: #fefefe;">
    <div class="row">
        <div class="col-md-12">
    
            <div style="font-size:25px;" class="panel-title" style="color:  #0099ff;"> 
             
                    <img class="group list-group-image img-fluid"style=" padding-top: -5%; width: 7%; height: 7%;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/<?php echo iconv('TIS-620', 'UTF-8', $value->img); ?>"><b> <?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Company); ?> ( <?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Code_Company); ?> )</b>
               
                <button class="close" data-dismiss="modal"  aria-hidden="true" type="button" style="margin-top: 1%; margin-right:8%;" onclick="document.getElementById('mobile_view_Description').style.display = 'none';">&times;</button>
                <!--    <div style="font-size: 25px;" class="panel-title" style="color:  #0099ff; padding-top: 5%; width: 20%; height: 10%;"> รายละเอียดประกัน </div>-->
            </div>
        </div>
    </div>
</div>


        <div class="col-md-12">
          
                <br>
                <div class="card">
                    <div class="card-body p-0">
                        <div style="overflow-x:auto;">
                            <table id="customers">
                            <tbody>
                                <tr>
                                    <td><b>บริษัทประกันภัย</b>  </td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->Insure_Company); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>รุ่นประกันภัย</b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->NamePackage); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b>ราคาเบี้ยประกัน</b> </td>
                                    <td><b><span class="badge bg-success" style=" font-size: 16px;"><?php echo number_format($value->Insurance_price_total, 02); ?></span> บ.</b></td>
                                </tr>
                                <tr>
                                    <td><b>ราคาส่วนลดกล้อง</b></td>
                                    <?php if($value->Discount_price_cctv == ''){ ?>
                                            <td><b>! ไม่มี ส่วนลดกล้อง</b></td>
                                    <?php }else{ ?>
                                        <td><b><span class="badge bg-pink" style=" font-size: 16px;"><?php echo number_format($value->Discount_price_cctv,02); ?></span> บ.</b></td>
                                    <?php }?>
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage1); ?></b></td>
                                    <?php if ($value->DetailCoverage1 == "Re1") { ?>
                                    <td><span class="badge bg-blue" style=" font-size: 15px;"><b>ซ่อมอู่</b></span></td>
                                    <?php } elseif ($value->DetailCoverage1 == "Re2") { ?>
                                        <td><span class="badge bg-blue" style=" font-size: 15px;"><b>ซ่อมห้าง</b></span></td>
                                     <?php } elseif ($value->DetailCoverage1 == "Re3") { ?>
                                        <td><span class="badge bg-blue" style=" font-size: 15px;"><b>ซ่อมเอง</b></span></td>
                                    <?php } ?>                               
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage2); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage2); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage3); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage3); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage4); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage4); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage5); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage5); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage6); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage6); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage7); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage7); ?></b></td>
                                </tr>
                                <?php if($value->DetailCoverage8 == "Null") { ?>
                                <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage8); ?></b></td>
                                <td><b>  <?php echo " - " ?></b></td>
                                <?php } else { ?>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage8); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage8); ?></b></td>
                                </tr> 
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage10); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage10); ?></b></td>
                                </tr>
                                <tr>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->HeadCoverage9); ?></b></td>
                                    <td><b><?php echo iconv('TIS-620', 'UTF-8', $value->DetailCoverage9); ?></b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


<div class="modal-footer justify-content-between" style=" background-color:#b30000;">
    <button  data-dismiss="modal" class="btn btn-warning" aria-hidden="true" type="button"  onclick="document.getElementById('mobile_view_Description').style.display = 'none';">ออก</button>
</div>
    <?php } ?>