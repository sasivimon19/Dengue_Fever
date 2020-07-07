<div class="modal fade" id="modal-xl" style=" margin-top:0px;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header" style="padding: 5px;">
                <h4 class="modal-title" id="Head"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="Show_Interested"  name="Show_Interested">
                <form class="" id='editemployee'>

                </form>
            </div>

        </div>       
    </div>
</div>

<div class="col-md-12">
    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">ตรวจสอบการซื้อประกัน&nbsp;&nbsp;</h3>

            <button class="close" data-dismiss="modal"  aria-hidden="true" type="button" onclick="document.getElementById('checkInsurance_premium').style.display = 'none';">&times;</button>
        </div>

        <div class="row" style="padding-top: 5px;">
            <div class="col-md-12 col-sm-12 col-xs-12"  style="padding-right:5px;padding-left: 20px;width:100%">
                <p style="padding-bottom: 10px;font-size:14px;">
                    รออนุมัติเครดิต <span class="badge bg-warning" style=""><?php echo $CountApprove_Credit; ?></span>
                    | ไม่อนุมัติเครดิต <span class="badge bg-danger" style="background-color:#63666A;color:#FFF"><?php echo $CountReject_Credit; ?></span>
                    | แจ้งงาน <span class="badge bg-warning"><?php echo $CountCallwork_Orange; ?></span>
                    | แจ้งงาน <span class="badge bg-success"><?php echo $CountCallwork_Green; ?></span>&nbsp;&nbsp;
                    | รอตรวจสอบข้อมูล <span class="badge bg-success"><?php echo $CountCallwork_success; ?></span>
                    | รอแจ้งบริษัทประกันแล้ว <span class="badge bg-warning"><?php echo $CountWaitCheck; ?></span>
                    | แจ้งบริษัทประกันแล้ว <span class="badge bg-info"><?php echo $CounttellInsure; ?></span>
                    | ข้อมูลไม่สมบูรณ์ <span class="badge bg-danger"><?php echo $CountRejectTrans; ?></span>
                </p>
            </div>
            
            
            
        </div>
        
    
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
                    foreach ($ShowCustomers as $item) {
                        ?>
                        <tr>
                            <td style="text-align: center; white-space:nowrap;"><?php echo $num ?></td>
                            <td>
                                <?php
                                if (iconv('TIS-620//ignore', 'UTF-8//ignore', $item->PaymentType) == "ผ่อนชำระ") {

                                    if ($item->StatusButton == "1") {
                                        $sub = "รออนุมัติเครดิต";
                                        $showbtn = "display:none";
                                        $disabled = "disabled";
                                        $classbtn = "btn btn-warning btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "2") {
                                        $sub = "ไม่อนุมัติเครดิต";
                                        $showbtn = "display:none";
                                        $disabled = "disabled";
                                        $classbtn = "btn btn-danger btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "3") {
                                        $sub = "แจ้งงาน";  //แจ้งงานสีส้ม
                                        $showbtn = "display:none";
                                        $disabled = "";
                                        $classbtn = "btn btn-warning btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "4") {
                                        $sub = "แจ้งงาน";   //แจ้งงานสีเขียว
                                        $showbtn = "display:block";
                                        $disabled = "";
                                        $classbtn = "btn btn-success btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "5") {
                                        $sub = "รอตรวจสอบข้อมูล";
                                        $showbtn = "display:block";
                                        $disabled = "";
                                        $classbtn = "btn btn-success btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "6") {
                                        $sub = "รอแจ้งบริษัทประกัน";
                                        $showbtn = "display:block";
                                        $disabled = "disabled";
                                        $classbtn = "btn btn-warning btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "7") {
                                        $sub = "แจ้งบริษัทประกันแล้ว";
                                        $showbtn = "display:block";
                                        $disabled = "disabled";
                                        $classbtn = "btn btn-info btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "8") {
                                        $sub = "ข้อมูลไม่สมบูรณ์";
                                        $showbtn = "display:block";
                                        $disabled = "";
                                        $classbtn = "btn btn-danger btn-sm";
                                        $showremark = "display:block";
                                    } else {

                                        $sub = "000";
                                        $showremark = "";
                                        $disabled = "";
                                        $showbtn = "display:block";
                                        $classbtn = "btn btn-danger btn-sm";
                                    }
                                    ?>

                                <?php
                                } else if (iconv('TIS-620//ignore', 'UTF-8//ignore', $item->PaymentType) == "เงินสด") {

                                    if ($item->StatusButton == "3") {
                                        $sub = "แจ้งงาน";  //แจ้งงานสีส้ม
                                        $showbtn = "display:none";
                                        $disabled = "";
                                        $classbtn = "btn btn-warning btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "4") {
                                        $sub = "แจ้งงาน";   //แจ้งงานสีเขียว
                                        $showbtn = "display:block";
                                        $disabled = "";
                                        $classbtn = "btn btn-success btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "5") {
                                        $sub = "รอตรวจสอบข้อมูล";
                                        $showbtn = "display:block";
                                        $disabled = "";
                                        $classbtn = "btn btn-success btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "6") {
                                        $sub = "รอแจ้งบริษัทประกัน";
                                        $showbtn = "display:block";
                                        $disabled = "disabled";
                                        $classbtn = "btn btn-warning btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "7") {
                                        $sub = "แจ้งบริษัทประกันแล้ว";
                                        $showbtn = "display:block";
                                        $disabled = "disabled";
                                        $classbtn = "btn btn-info btn-sm";
                                        $showremark = "display:none";
                                    } else if ($item->StatusButton == "8") {
                                        $sub = "ข้อมูลไม่สมบูรณ์";
                                        $showbtn = "display:block";
                                        $disabled = "";
                                        $classbtn = "btn btn-danger btn-sm";
                                        $showremark = "display:block";
                                    }
                                }
                                ?>



                                <div class="btn-group" style="width:100%">
                                    <button type="button" id="btn1" <?php echo $disabled ?> style="width:100%" class="<?php echo $classbtn ?>" data-toggle="modal" data-target="#modal-xl"  onclick="Home_Detailed(PROSPECT_LIST_ID = '<?php echo $item->PROSPECT_LIST_ID ?>', IDCard = '<?php echo $item->IDCard; ?>', NameUser = '<?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $item->CreateEmp) ?>', Insurance_Price = '<?php echo $item->Insurance_price ?>', Namecompany = '<?php echo $item->Namecompany ?>', Type_ID = '<?php echo $item->Type_ID ?>', PaymentType = '<?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $item->PaymentType) ?>', CarLicensePlateProvince = '<?php echo $item->CarLicensePlateProvince ?>', TransStatus = '<?php echo $item->TransStatus ?>', StatusButton = '<?php echo $item->StatusButton ?>')"><?php echo $sub ?></button>

                                    <!-- Remark -->
                                    <button type="button" style="<?php echo $showremark ?>" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-xl" onclick="funcRemark(PROSPECT_LIST_ID = '<?php echo $item->PROSPECT_LIST_ID ?>', Remark = '<?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $item->Remark) ?>')"><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i></button>
                                </div>
                            </td>
                            <td id="td_Pay">
                                <div class="btn-group" style="">
                                    <button type="button" id="btnpay"  style="<?php echo $showbtn ?>" class="btn btn-warning" onclick="Home_Payment(PRO = '<?php echo base64_encode($item->PROSPECT_LIST_ID) ?>', C = '<?php echo base64_encode($item->CustomerIDCard) ?>')"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> ชุดชำระเงิน 
                                    </button>
                                    <button type="button"  id="btnpay" style="<?php echo $showbtn ?>" class="btn btn-primary" data-toggle="modal" data-target="#modal-xl" onclick="UploadSlip(PROSPECT_LIST_ID = '<?php echo $item->PROSPECT_LIST_ID ?>', Insurance_price = '<?php echo $item->Insurance_price ?>', payfirst = '<?php echo $item->Total_FirstPayment ?>', PaymentType = '<?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $item->PaymentType) ?>')"><i class="fa fa-file-image-o" aria-hidden="true"></i> แนบใบเสร็จ
                                    </button>
                                </div>    
                            </td>
                            <td style="text-align: left">
                            <?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $item->CustomerInt) . "" . iconv('TIS-620//ignore', 'UTF-8//ignore', $item->CustomerFirstname) . " " . iconv('TIS-620//ignore', 'UTF-8//ignore', $item->CustomerLastname); ?>   
                            </td>
                            <td><?php echo $item->IDCard; ?></td>
                            <td><?php echo $item->Namecompany . " : " . iconv('TIS-620', 'UTF-8', $item->Insure_Company); ?></td>
                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->Type_Name); ?></td>
                            <td><?php echo number_format($item->Insurance_price_total, 2); ?></td>
                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->PaymentType); ?></td>
                            <td><?php echo $item->CustomeTel1; ?></td>
                            <td><?php echo date('d-m-Y H:i:s', strtotime($item->SaveDate)); ?></td>
                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->CreateEmp); ?></td>
                            <td><?php echo iconv('TIS-620', 'UTF-8', $item->Remark); ?></td>
                        </tr>
                    <?php $num++;}?>   
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>


<!-- 15 นาที ออกจากระบบ--> 
<script>
    var timeout;
    document.onmousemove = function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
            window.location.href = "<?php echo site_url('HomeInsurance/Logout'); ?>";
        }, 600000); //1นาที = 60000 หน่วย = 60000 x 15นาที = 900000 หน่วย
    }
</script>
<!-- END 15 นาที ออกจากระบบ-->