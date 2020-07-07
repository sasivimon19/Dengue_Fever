<?php if($Count_Commission == 0){ ?>

<?php }else { ?>

    <div class="card-body p-0" id="">
    <div class="table-responsive">
        <table class="table m-0">
            <thead>
                <tr>
                    <th style=" text-align: center; ">เลขที่</th>
                    <th style=" text-align: center;">จำนวนงวด</th>
                    <th style=" text-align: center;">จำนวนบัญชี</th>
                    <th style=" text-align: center;">Rate</th>
                    <th style=" text-align: center;">รวมยอดเงินทั้งหมด</th>
                    <th style=" text-align: center;">ค่าคอมมิชชั่น (Commission)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1; $SUMNETPREMIUM=0; $SUMCommission=0;
                
                foreach ($Select_Commission as $value) { ?>
                
                                 
                        <?php  $SUMNET = $value->Net_premium ;
                              $SUMNETPREMIUM = $SUMNETPREMIUM+$SUMNET; ?>
                           
                         <?php  $SUMCOMMISSION = $value->Commission ;
                              $SUMCommission = $SUMCommission+$SUMCOMMISSION; ?>
                       
                        <tr>
                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->row ?></td>
                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->Type_Insure ?></td>
                            <td style="text-align: center; white-space:nowrap;"><?php echo $value->count_ref ?></td>
                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Rate,02) ?></td>
                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Net_premium,02) ?></td>
                            <td style="text-align: center; white-space:nowrap;"><?php echo number_format($value->Commission,02) ?></td>

                        </tr>
       
                        
                    <?php $num ++; } ?>
                    <tr>
                        <td colspan="4" style="text-align: right; white-space:nowrap;"><b>รวมยอด</b></td>
                        <td style="text-align: center; white-space:nowrap;"><b><?php  echo number_format($SUMNETPREMIUM,02); ?></b></td>
                        <td style="text-align: center; white-space:nowrap;"><b><?php echo number_format($SUMCommission,02); ?></b></td>
                    </tr>
            </tbody> 
        </table>
    </div>


            <?php foreach ($Count_Commission as $row) { ?>
                <?php  $total_record = $row->Count; ?>
            <?php } ?> 
        <?php if($total_record == 0){ ?>
            
        <?php }else { ?>

            <?php $total_page = ceil($total_record / $pageend); ?> 
            
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" onclick="pagedatapay(page = '')">&laquo;</a></li>
                    <?php for ($i = 1; $i <= $total_page; $i++) { ?>  
                        <li class="page-item"><a class="page-link" onclick="pagedatapay(page = '<?php echo $i ?>')"><?php echo $i ?></a></li>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" onclick="pagedatapay(page = '<?php echo $total_page ?>')">&raquo;</a></li>
                </ul>
            </div>
        </div>
    <?php } ?>
<?php } ?>