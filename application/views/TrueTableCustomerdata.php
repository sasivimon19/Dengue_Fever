<?php

if (count($True_Temp_DengueFever) == 0) {
    echo "ไม่มีรายการ";
} else {
    ?>

    <div class="wrapper" style=" padding-top:0%;">   
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #4db8ff">
                                    <div class="row">
                                        <div class="col-md-4" style=" color: black;">
                                            <h3 class="card-title"><b> <i class="fas fa-edit"></i> ข้อมูลลูกค้าที่ถูกต้อง </b></h3>
                                        </div>
                                        <div class="input-group-prepend" style=" margin-left: 54%">
                                            <!--<a href="<?php // echo site_url('Payment_controller/Export_ReportNosavedata')   ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b> Export ข้อมูลที่ไม่สามารถบันทึกได้ </b></button></a>-->
                                            <button type="button" class="btn btn-warning btn-sm"  onclick="Save_Dengue_Fever()"><i class="fas fa-share-square"></i> <b> ส่งข้อมูล APT JP</b> </button>
                                        </div>  
                                    </div>
                                </div>
                            <div class="card-body table-responsive p-0">
                                    <table class="table table-hover" id="table-data">
                                        <thead  style="background-color: gray;">                 
                                            <tr>
                                                <th style="text-align: center; white-space:nowrap;"> # </th>
                                                <th style="text-align: center; white-space:nowrap;">คำนำหน้า</th>
                                                <th style="text-align: center; white-space:nowrap;">ชื่อ</th>
                                                <th style="text-align: center; white-space:nowrap;">นามสกุล</th>
                                                <th style="text-align: center; white-space:nowrap;">Address</th>
                                                <th style="text-align: center; white-space:nowrap;">IDCard</th>
                                                <th style="text-align: center; white-space:nowrap;">Birthday</th>
                                                <th style="text-align: center; white-space:nowrap;">Mobile</th>
                                                <th style="text-align: center; white-space:nowrap;">จังหวัด</th>
                                                <th style="text-align: center; white-space:nowrap;">อำเภอ</th>
                                                <th style="text-align: center; white-space:nowrap;">รหัสไปรษณีย์</th>
                                                <?php if ($Number_Ref != '') { ?>
                                                    <th style="text-align: center; white-space:nowrap;">Number_Ref</th>       
                                                    <?php } else { ?>
                                                    <th></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        //$num = 1;
                                        foreach ($True_Temp_DengueFever as $value) {
                                            ?>
                                            <tr>
                                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->row ?></td>
                                                        <td style="text-align: center; white-space:nowrap;" id="Title<?php echo $value->ID_Timp ?>" name="Title<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->Title) ?></td>
                                                        <td style="white-space:nowrap;" id="FirstName<?php echo $value->ID_Timp ?>" name="FirstName<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->FirstName) ?></td>
                                                        <td style=" white-space:nowrap;" id="LastName<?php echo $value->ID_Timp ?>" name="LastName<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->LastName) ?></td>
                                                        <td id="Address<?php echo $value->ID_Timp ?>" name="Address<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->Address) ?></td>
                                                        <td style="text-align: center; white-space:nowrap;" id="IDCardcustomer<?php echo $value->ID_Timp ?>" name="IDCardcustomer<?php echo $value->ID_Timp ?>"><?php echo $value->IDCard ?></td>
                                                        <td style="text-align: center; white-space:nowrap;" id="Birthday<?php echo $value->ID_Timp ?>" name="Birthday<?php echo $value->ID_Timp ?>"><?php echo$value->Birthday ?></td>
                                                        <td style="text-align: center; white-space:nowrap;" id="Mobile<?php echo $value->ID_Timp ?>" name="Mobile<?php echo $value->ID_Timp ?>"><?php echo $value->Mobile ?></td>
                                                        <td style="text-align: center; white-space:nowrap;" id="ProvinceCode<?php echo $value->ID_Timp ?>" name="ProvinceCode<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->ProvinceCode) ?></td>
                                                        <td style="text-align: center; white-space:nowrap;" id="Birthday<?php echo $value->ID_Timp ?>" name="Birthday<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->AmphorCode) ?></td>
                                                        <td style="text-align: center; white-space:nowrap;" id="Mobile<?php echo $value->ID_Timp ?>" name="Mobile<?php echo $value->ID_Timp ?>"><?php echo$value->PostCode ?></td>    
                                                        <?php if ($value->Number_Ref != '') { ?>
                                                            <td style="text-align: center; white-space:nowrap; color: green;" id="Status_API<?php echo $value->ID_Timp ?>" name="Status_API<?php echo $value->ID_Timp ?>"><?php echo $value->Number_Ref ?></td>    
                                                        <?php } else  { ?>
                                                            <td></td>        
                                                        <?php } ?>
                                            </tr>
                                           <?php
                                        //$num ++;
                                        }
                                        ?>
                                    </tbody> 
                                </table>

                                
                                <?php foreach ($CountTrueTemp as $row) { ?>
                                    <?php  $total_record = $row->Count; ?>
                                <?php } ?> 

                                <?php  $total_page = ceil($total_record / $pageend); ?> 
                                <div class="card-footer clearfix">
                                    <ul class="pagination">
                                        <li class="page-item" style="margin-top: 5px;">ทั้งหมด <?php echo $total_page ?> รายการ&nbsp;</li>
                                        <li class="page-item">
                                            <select class="form-control form-control-sm" name="page" id="page" onchange="pagedatapay()">
                                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>  
                                                    <?php if ($i == $pagenum) { ?>
                                                        <option value="<?php echo $i ?>" selected><?php echo $i ?></option> 
                                                    <?php } else { ?>
                                                        <option value="<?php echo $i ?>"><?php echo $i ?></option> 
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>







