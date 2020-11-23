<?php
if (count($False_Temp_DengueFever) == 0) {
    echo "ไม่มีรายการ";
} else {
    ?>
    <div class="wrapper" style=" padding-top:0%;">   
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background-color: #cc0000">
                                <div class="row">
                                    <div class="col-md-4" style=" color: white;">
                                        <h3 class="card-title" > <i class="fas fa-edit"></i><b> ข้อมูลลูกค้าที่ไม่ถูกต้อง </b></h3>
                                    </div>
                                    <div class="input-group-prepend" style=" margin-left: 45%">
                                        <a href="<?php  echo site_url('Con_Dengue_Fever/Export_ReportNosavedata') ?>"><button type="button" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b> Export ข้อมูล APT JP ไม่ถูกต้อง</b> </button></a>
                                    </div>  

                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="table-data-Falsa">
                                    <thead  style="background-color: gray;">              
                                        <tr>
                                                <th style="text-align: center; white-space:nowrap;"> # </th>
                                                <th style="text-align: center; white-space:nowrap;">คำนำหน้า</th>
                                                <th style="text-align: center; white-space:nowrap;">ชื่อ</th>
                                                <th style="text-align: center; white-space:nowrap;">นามสกุล</th>
                                                <th style="white-space:nowrap;">Address</th>
                                                <th style="text-align: center; white-space:nowrap;">IDCard</th>
                                                <th style="text-align: center; white-space:nowrap;">Birthday</th>
                                                <th style="text-align: center; white-space:nowrap;">Mobile</th>
                                                <th style="text-align: center; white-space:nowrap;">จังหวัด</th>
                                                <th style="text-align: center; white-space:nowrap;">อำเภอ</th>
                                                <th style="text-align: center; white-space:nowrap;">รหัสไปรษณีย์</th>
                                                <?php if ($Status_API != '') { ?>
                                                <th></th>
                                                    <?php } else { ?>
                                                     <th style="text-align: center; white-space:nowrap;">ข้อมูลผิด</th>       
                                                <?php } ?>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //$num = 1;

                                        foreach ($False_Temp_DengueFever as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center; white-space:nowrap;"><?php echo $value->row ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Title"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->Title) ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="FirstName"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->FirstName) ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="LastName"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->LastName) ?></td>
                                                <td style=" white-space:nowrap;" id="Address"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->Address) ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="IDCardcustomer"><?php echo $value->IDCard ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Birthday"><?php echo$value->Birthday ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Mobile"><?php echo$value->Mobile ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="IDCardcustomer"><?php  echo iconv('TIS-620//ignore', 'UTF-8//ignore',$value->ProvinceCode )?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Birthday"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->AmphorCode ) ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Mobile"><?php echo$value->PostCode ?></td>
                                                <?php if ($value->Status_API != '') { ?>
                                                            <td style="text-align: center; white-space:nowrap; color: #e60000;" id="Status_API<?php echo $value->ID_Timp ?>" name="Status_API<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore',$value->Status_API) ?></td>    
                                                        <?php } else if ($value->Status == '0 IDCard') { ?>
                                                            <td style="text-align: center; white-space:nowrap; color: #e60000;"> IDCard ซ้ำ </td>      
                                                        <?php } else if ($value->Status == '1') { ?>
                                                            <td style="text-align: center; white-space:nowrap; color: #e60000;"> ตรวจสอบคำนำหน้า,จังหวัด,อำเภอ,รหัสไปรษณีย์ </td>   
                                                        <?php } else if ($value->Status == '0 Mobile') { ?>
                                                            <td style="text-align: center; white-space:nowrap; color: #e60000;"> กรุณากรอกเบอร์โทรศัพท์ </td>   
                                                        <?php } else { ?>
                                                            <td></td>          
                                                        <?php } ?>
                                                    </tr>
                                            <?php
                                            //$num ++;
                                        }
                                        ?>
                                    </tbody> 
                                </table>

                                
                            <?php foreach ($CountFalseTemp as $row) { ?>
                                <?php $total_record = $row->Count; ?>
                            <?php } ?> 

                            <?php $total_page = ceil($total_record / $pageend); ?> 
                            <div class="card-footer clearfix">
                                <ul class="pagination">
                                    <li class="page-item" style="margin-top: 5px;">ทั้งหมด <?php echo $total_page ?> รายการ&nbsp;</li>
                                    <li class="page-item">
                                        <select class="form-control form-control-sm" name="pageno" id="pageno" onchange="pagedatapayno()">
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


