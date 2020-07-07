<style>
    .description-block {
        display: block;
        margin: 0px 0;
        text-align: center;
    }
</style>


        <link href="<?php echo base_url(); ?>assets/DataTables/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"> 
        <script src="<?php echo base_url(); ?>assets/DataTables/js/jquery.dataTables.min.js"></script>
        <link href="<?php echo base_url(); ?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

          <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">ตรวจสอบการซื้อประกัน&nbsp;&nbsp;</h3>
 
                        <button class="close" data-dismiss="modal"  aria-hidden="true" type="button" onclick="document.getElementById('checkInsurance_premium').style.display = 'none';">&times;</button>
                    </div>

                    <!--                    <div class="row" style="padding-top: 5px;">
                                            <div class="col-md-12 col-sm-12 col-xs-12"  style="padding-right:5px;padding-left: 20px;width:100%">
                                                <p style="padding-bottom: 10px;font-size:14px;">
                                                 รออนุมัติเครดิต <span class="badge bg-warning" style=""><?php echo $CountApprove_Credit; ?></span>&nbsp;&nbsp;&nbsp;
                                                | ไม่อนุมัติเครดิต <span class="badge bg-danger" style="background-color:#63666A;color:#FFF"><?php echo $CountReject_Credit; ?></span>&nbsp;&nbsp;&nbsp;
                                                | แจ้งงาน <span class="badge bg-warning"><?php echo $CountCallwork_Orange; ?></span>
                                                | แจ้งงาน <span class="badge bg-success"><?php echo $CountCallwork_Green; ?></span>&nbsp;&nbsp;
                                                        | รอตรวจสอบข้อมูล <span class="badge bg-success"><?php echo $CountCallwork_success; ?></span>
                                                | รอแจ้งบริษัทประกันแล้ว <span class="badge bg-warning"><?php echo $CountWaitCheck; ?></span>
                                                | แจ้งบริษัทประกันแล้ว <span class="badge bg-info"><?php echo $CounttellInsure; ?></span>
                                                | ข้อมูลไม่สมบูรณ์ <span class="badge bg-danger"><?php echo $CountRejectTrans; ?></span>
                                                </p>
                                            </div>
                                        </div>-->


                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-sm-2 col-12" style=" margin-left: -2%;">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"> <?php echo $CountApprove_Credit; ?></span>

                                        <label style=" font-size: 15px;">รออนุมัติเครดิต</label>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-12" style=" margin-left: -3%;">
                                    <div class="description-block border-right" >
                                        <span class="description-percentage text-warning"> <?php echo $CountReject_Credit; ?></span>
                                        <label style=" font-size: 15px;">ไม่อนุมัติเครดิต</label>
                                    </div>
                                </div>

                                <div class="col-sm-1 col-12" style=" margin-left: -1%;">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"> <?php echo $CountCallwork_Orange; ?></span>
                                        <label style=" font-size: 15px;">แจ้งงาน</label>
                                    </div>
                                </div>

                                <div class="col-sm-1 col-12" style=" margin-left: -1%;">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-danger"><?php echo $CountCallwork_Green; ?></span>
                                        <label style=" font-size: 15px;">แจ้งงาน</label>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-12" style=" margin-left: -2%;">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"><?php echo $CountCallwork_success; ?></span>
                                        <label style=" font-size: 15px;">รอตรวจสอบข้อมูล</label>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-12" style=" margin-left: -2%;">
                                    <div class="description-block border-right">
                                        <span class="description-percentage text-success"> <?php echo $CountWaitCheck; ?></span>
                                        <label style=" font-size: 15px;">รอแจ้งบริษัทประกันแล้ว</label>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-12" style=" margin-left: -2%;">
                                    <div class="description-block">
                                        <span class="description-percentage text-danger"> <?php echo $CounttellInsure; ?></span>
                                        <label style=" font-size: 15px;">แจ้งบริษัทประกันแล้ว</label>
                                    </div>
                                </div>

                                <div class="col-sm-2 col-12" style=" margin-left: -4%;">
                                    <div class="description-block">
                                        <span class="description-percentage text-danger"> <?php echo $CountRejectTrans; ?></span>
                                        <label style=" font-size: 15px;">ข้อมูลไม่สมบูรณ์</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


        <br>

                   <div class="table-responsive" id="RRR">
                            <table id="example" class="table table-striped table-bordered" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>สถานะการจ่ายเงิน</th>
                                        <th id="pay">ใบชำระเงิน</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>เลขบัตรประชาชน</th>
                                        <th>บริษัทประกัน</th>
                                        <th>ประเภทประกัน</th>
                                        <th>ราคาเบี้ยประกัน</th>
                                        <th>ประเภทการชำระ</th>
                                        <th>โทรศัพท์ติดต่อ</th>
                                        <th>วันที่บันทึก</th>
                                        <th>พนักงานบันทึก</th>
                                        <th>รายละเอียดเพิ่มเติม</th>
                                        
                                    </tr>
                                </thead>
                   
                                <tbody>
                                    <?php
                                    $num = 1;
                                    foreach ($ShowCustomers as $item) { ?>
                                        <tr>
                                            <td style="text-align: center; white-space:nowrap;"><?php echo $num ?></td>
                                            <td>
                                            <?php if (iconv('TIS-620//ignore', 'UTF-8//ignore', $item->PaymentType) == "ผ่อนเงินสด") { 

                                                        if ($item->StatusButton == "1") { 
                                                              $sub ="รออนุมัติเครดิต";  
                                                              $showbtn  = "display:none";
                                                              $disabled = "disabled";
                                                              $classbtn="btn btn-warning btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "2") { 
                                                              $sub ="ไม่อนุมัติเครดิต"; 
                                                              $showbtn  = "display:none";
                                                              $disabled = "disabled";
                                                              $classbtn="btn btn-danger btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "3") { 
                                                              $sub ="แจ้งงาน";  //แจ้งงานสีส้ม
                                                              $showbtn  = "display:none";
                                                              $disabled = "";
                                                              $classbtn="btn btn-warning btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "4") { 
                                                              $sub ="แจ้งงาน";   //แจ้งงานสีเขียว
                                                              $showbtn  = "display:block";
                                                              $disabled = "";
                                                              $classbtn="btn btn-success btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "5") { 
                                                              $sub ="รอตรวจสอบข้อมูล"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "";
                                                              $classbtn="btn btn-success btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "6") { 
                                                              $sub ="รอแจ้งบริษัทประกัน"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "disabled";
                                                              $classbtn="btn btn-warning btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "7") { 
                                                              $sub ="แจ้งบริษัทประกันแล้ว"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "disabled";
                                                              $classbtn="btn btn-info btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "8") { 
                                                              $sub ="ข้อมูลไม่สมบูรณ์"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "";
                                                              $classbtn="btn btn-danger btn-sm";
                                                              $showremark = "display:block";
                                                        }else{

                                                            $sub ="000"; 
                                                            $showremark = "";
                                                            $disabled = "";
                                                             $showbtn  = "display:block";
                                                              $classbtn="btn btn-danger btn-sm";
                                                        }   ?>

                                                <?php }else if (iconv('TIS-620//ignore', 'UTF-8//ignore', $item->PaymentType) == "เงินสด") { 

                                                        if ($item->StatusButton == "3") { 
                                                              $sub ="แจ้งงาน";  //แจ้งงานสีส้ม
                                                              $showbtn  = "display:none";
                                                              $disabled = "";
                                                              $classbtn="btn btn-warning btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "4") { 
                                                              $sub ="แจ้งงาน";   //แจ้งงานสีเขียว
                                                              $showbtn  = "display:block";
                                                              $disabled = "";
                                                              $classbtn="btn btn-success btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "5") { 
                                                              $sub ="รอตรวจสอบข้อมูล"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "";
                                                              $classbtn="btn btn-success btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "6") { 
                                                              $sub ="รอแจ้งบริษัทประกัน"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "disabled";
                                                              $classbtn="btn btn-warning btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "7") { 
                                                              $sub ="แจ้งบริษัทประกันแล้ว"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "disabled";
                                                              $classbtn="btn btn-info btn-sm";
                                                              $showremark = "display:none";
                                                        }else if ($item->StatusButton == "8") { 
                                                              $sub ="ข้อมูลไม่สมบูรณ์"; 
                                                              $showbtn  = "display:block";
                                                              $disabled = "";
                                                              $classbtn="btn btn-danger btn-sm";
                                                              $showremark = "display:block";
                                                        }  
                                                  } ?>



                                            <div class="btn-group" style="width:100%">
                                                       <button type="button"  id="btn1" <?php echo $disabled ?> style="width:100%" class="<?php echo $classbtn ?>"   onclick="Home_Detailed(PROSPECT_LIST_ID='<?php echo $item->PROSPECT_LIST_ID ?>',IDCard='<?php echo $item->IDCard; ?>',NameUser='<?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $item->CreateEmp) ?>',Insurance_Price='<?php echo $item->Insurance_price?>',Namecompany='<?php echo iconv('TIS-620//ignore', 'UTF-8//ignore',$item->Namecompany) ?>',Type_ID='<?php echo $item->Type_ID ?>',PaymentType='<?php echo iconv('TIS-620//ignore','UTF-8//ignore',$item->PaymentType) ?>',CarLicensePlateProvince='<?php echo $item->CarLicensePlateProvince?>',TransStatus='<?php echo $item->TransStatus ?>',StatusButton='<?php echo $item->StatusButton ?>',head='กรอกข้อมูลประกันภัย')"><?php echo $sub ?></button>
                                                       
                                                  
                                                      <button type="button" style="<?php echo $showremark ?>" class="btn btn-default btn-sm"  onclick="funcRemark(PROSPECT_LIST_ID='<?php echo $item->PROSPECT_LIST_ID ?>',Remark='<?php echo iconv('TIS-620//ignore','UTF-8//ignore',$item->Remark) ?>',head='หมายเหตุ')"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></button>
                                              </div>
                                            </td>
                                            <td id="td_Pay">
                                              <div class="btn-group" style="">
                                                <button type="button" id="btnpay"  style="<?php echo $showbtn ?>" class="btn btn-warning" onclick="Home_Payment(PRO = '<?php echo base64_encode($item->PROSPECT_LIST_ID) ?>', C = '<?php echo base64_encode($item->CustomerIDCard) ?>')"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> ชุดชำระเงิน 
                                                </button>
                                                <button type="button"  id="btnpay" style="<?php echo $showbtn ?>" class="btn btn-primary"  onclick="UploadSlip(PROSPECT_LIST_ID='<?php echo $item->PROSPECT_LIST_ID ?>',Insurance_price='<?php echo $item->Insurance_price ?>',payfirst='<?php echo $item->Total_FirstPayment ?>',PaymentType='<?php echo iconv('TIS-620//ignore','UTF-8//ignore',$item->PaymentType) ?>',head='แนบใบเสร็จ',PeriodNumber='<?php echo $item->PeriodNumber ?>',TransactionID='<?php echo $item->TransactionID ?>',Date_Payment='<?php echo $item->Date_Payment ?>',Total_FirstPayment='<?php echo $item->Total_FirstPayment ?>',Installment='<?php echo $item->Installment ?>')"><i class="fa fa-file-image-o" aria-hidden="true"></i> แนบใบสลิป
                                                </button>
                                              </div>    
                                              </td>
                                            <td style="text-align: left">
                                                <?php echo iconv('TIS-620//ignore', 'UTF-8//ignore',$item->CustomerInt) . "" .iconv('TIS-620//ignore', 'UTF-8//ignore',$item->CustomerFirstname) ." ".iconv('TIS-620//ignore', 'UTF-8//ignore',$item->CustomerLastname); ?>   
                                            </td>
                                            <td><?php echo $item->IDCard; ?></td>
                                            <td><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore',$item->Namecompany)." : ".iconv('TIS-620', 'UTF-8', $item->Insure_Company );?></td>
                                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->Type_Name); ?></td>
                                            <td><?php echo number_format($item->Insurance_price,2); ?></td>
                                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->PaymentType); ?></td>
                                            <td><?php echo $item->CustomeTel1; ?></td>
                                            <td><?php echo date('d-m-Y H:i:s', strtotime($item->SaveDate)); ?></td>
                                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->CreateEmp); ?></td>
                                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->Remark); ?></td>
                                            
                                        </tr>
                                        <?php
                                        $num++;
                                    }
                                    ?>   
                                </tbody>
                            </table>
                     </div>
                 </div>
            </div> 

        <script>
            $(document).ready( function () {
                $('#example').DataTable();
            } );
        </script>





