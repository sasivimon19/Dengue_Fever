<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #E5E7E9">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title"><b> <i class="fas fa-edit"></i> แสดงข้อมูลตารางแพ็คเกจ</b></h3>
                            </div>
                        </div>
                       
                    </div>
                     
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover">
                            <thead  style="background-color: gray;">
                                <tr>
                                    <th style="text-align: center; white-space:nowrap;">ลำดับ</th>
                                    <th style="text-align: center; white-space:nowrap;">รหัสแพ็คเกจ</th>
                                    <th style="text-align: center; white-space:nowrap;">รหัสบริษัท</th>
                                    <th style=" white-space:nowrap;">ซื่อแพ็คเก็ต</th>
                                    <th style="text-align: center; white-space:nowrap;">สถานะการให้งาน</th>
                                    <th style="text-align: center; white-space:nowrap;">วันที่บันทึก</th>
                                    <th style="text-align: center; white-space:nowrap;">พนักงานบันทึก</th>
                                    <th style="text-align: center; white-space:nowrap;"> แก้ไข </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                $num = 1;
                                foreach ($Get_CarPackage as $value) { ?>
                                    <tr>
                                        <td><?php echo $value->row; ?> </td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->IDPackage; ?> </td>
                                        <td style="text-align: center; white-space:nowrap;"><?php echo $value->ID_InsureCode; ?></td>
                                        <td style="white-space:nowrap;"><?php echo iconv('tis-620', 'utf-8', $value->NamePackage); ?></td>
                                        <td style="text-align: center; white-space:nowrap;">
                                            <div class="form-group">
                                                    <?php if ($value->Status_Package == "Active") { ?>
                                                        <div class="custom-control custom-switch custom-switch-on-danger custom-switch-off-success" onclick="switchPackage(IDPackage = '<?php echo $value->IDPackage; ?>',StatusswitchPackage='Nonactive')">
                                                            <input type="checkbox" class="custom-control-input" id="checkboxIDPackage<?php echo $num; ?>" value="IDPackage = '<?php echo $value->IDPackage; ?>'">
                                                            <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" onclick="switchPackage(IDPackage = '<?php echo $value->IDPackage; ?>',StatusswitchPackage='Active')">
                                                            <input type="checkbox" class="custom-control-input" id="checkboxIDPackage<?php echo $num; ?>" value="IDPackage = '<?php echo $value->IDPackage; ?>'">
                                                            <label class="custom-control-label" for="<?php echo $num; ?>"></label>
                                                        </div>                                        
                                                    <?php } ?>
                                            </div> 
                                        </td>
                                      
                                        <td style="white-space:nowrap;"><?php echo $value->SaveDate; ?></td>
                                        <td style="white-space:nowrap;"><?php echo $value->Save_By; ?></td>
                                        <td style="text-align: center; white-space:nowrap;">

                                        <?php  $Count_Idedit =  $this->DateManagement_Model->SELECT_CARIDPackage($value->IDPackage);
                                          if(COUNT($Count_Idedit) == 0){    ?>
                                               <div class="btn-group">
                                                <button type="button" class="btn btn-success" onclick="Edit_CarPackage(IDPackage = '<?php echo $value->IDPackage; ?>',StatusEdit='Edit')"><i class="fas fa-edit"></i>แก้ไข</button>
                                                <!--<button type="button" class="btn btn-danger" onclick="DeletePackage(IDPackage = '<?php echo $value->IDPackage; ?>')"><i class="fas fa-trash-alt"></i>ลบ</button>-->
                                              </div> 
                                            <?php }else { ?>
                                               <div class="btn-group">
                                                   <button type="button" class="btn btn-success" disabled="true"  onclick="Edit_CarPackage(IDPackage = '<?php echo $value->IDPackage; ?>',StatusEdit='Edit')"><i class="fas fa-edit"></i>แก้ไข</button>
                                              </div> 
                                            <?php } ?>
                                            
                                        </td>
                                    </tr>

                                <?php $num ++;} ?>
                            </tbody>
                        </table>
                    </div>
                      
                    
                    <?php foreach ($Count_CarPackage as $row) { ?>
                        <?php  $total_record = $row->Count; ?>
                    <?php } ?> 
              
                    <?php  $total_page = ceil($total_record / $pageend); ?> 
                    <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            <li class="page-item"><a class="page-link" onclick="pagedatapay(page='')">&laquo;</a></li>
                           <?php for ($i = 1; $i <= $total_page; $i++) { ?>  
                            <li class="page-item"><a class="page-link" onclick="pagedatapay(page='<?php echo $i ?>')"><?php echo $i ?></a></li>
                            <?php } ?>
                            <li class="page-item"><a class="page-link" onclick="pagedatapay(page='<?php echo $total_page ?>')">&raquo;</a></li>
                        </ul>
                    </div>
                    
         
                    
                </div>
            </div>
        </div>
    </div>
</section>








