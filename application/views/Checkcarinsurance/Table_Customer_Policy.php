<?php if($Count_Customer == 0){ ?>

<?php }else{ ?>
   
<div class="card-body p-0" id="">
    <div class="table-responsive">
        <table class="table m-0">
            <thead>
                <tr>
                    <th style=" text-align: center;">เลขที่</th>
                    <th style=" text-align: center;">เลขที่อ้างอิง (Ref.)</th>
                    <th style=" text-align: center;">คำนำหน้า</th>
                    <th style=" text-align: center;">ซื่อ</th>
                    <th style=" text-align: center;">นามสกุล</th>
                    <th style=" text-align: center;">เลขแจ้งบริษัทประกัน</th>
                    <th style=" text-align: center;">วันที่แจ้งบริษัทประกัน</th>
                    <th style=" text-align: center;">เลขกรมธรรม์</th>
                    <th style=" text-align: center;">วันที่รับกรมธรรม์</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                foreach ($Get_Customer as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value->row ?></td>
                        <td><?php echo $value->Ref ?></td>
                        <td><?php echo iconv('TIS-620', 'UTF-8', $value->CustomerInt) ?></td>
                        <td><?php echo iconv('TIS-620', 'UTF-8', $value->CustomerFirstname) ?></td>
                        <td><?php echo iconv('TIS-620', 'UTF-8', $value->CustomerLastname) ?></td>
                        <td><?php echo $value->ClaimReceiveNo ?></td>
                        <td><?php echo date('Y:m:d H:i:s', strtotime($value->ClaimReceiveDate)) ?></td>
                        <td><?php echo $value->PolicyNo ?></td>
                        <td><?php echo $value->PolicyDate ?></td>
                    </tr>
                    <?php $num ++;
                }
                ?>
            </tbody> 
        </table>
    </div>


    <?php foreach ($Count_Customer as $row) { ?>
        <?php $total_record = $row->Count; ?>
    <?php } ?> 

<?php $total_page = ceil($total_record / $pageend); ?> 
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" onclick="pagedatapayCustomer(name = 'Customer',page = '')">&laquo;</a></li>
            <?php for ($i = 1; $i <= $total_page; $i++) { ?>  
                <li class="page-item"><a class="page-link" onclick="pagedatapayCustomer(name = 'Customer',page = '<?php echo $i ?>')"><?php echo $i ?></a></li>
<?php } ?>
            <li class="page-item"><a class="page-link" onclick="pagedatapayCustomer(name = 'Customer',page = '<?php echo $total_page ?>')">&raquo;</a></li>
        </ul>
    </div>
</div>
<?php } ?>
