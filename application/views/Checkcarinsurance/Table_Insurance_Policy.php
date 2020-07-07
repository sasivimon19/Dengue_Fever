<?php if($GETCOUNTTRANS == 0){ ?>
    
<?php } else { ?>

<div class="card-body p-0" id="Tabie_TRANS" name="Tabie_TRANS">
    <div class="table-responsive">
        <table class="table m-0">
            <thead>
                <tr>
                    <th>เลขที่</th>
                    <th>เลขที่อ้างอิง (Ref.)</th>
                    <th>วันที่ดำเนินการ (DateFollow)</th>
                    <th>ผลการติดตาม (RESULT)</th>
                    <th>สถานะ (TELESALE_GROUPDESC)</th>
                    <th>พนักงาน (EMP)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 1;
                foreach ($GETTRANS as $value) {
                    ?>
                    <tr>
                        <td><?php echo $value->row ?></td>
                        <td><?php echo $value->Ref ?></td>
                        <td><?php echo date('Y:m:d H:i:s', strtotime($value->DATE_FOLLOW)) ?></td>
                        <td><?php echo iconv('TIS-620', 'UTF-8', $value->RESULT) ?></td>
                        <td><?php echo iconv('TIS-620', 'UTF-8', $value->TELESALE_GROUPDESC) ?></td>
                        <td><?php echo $value->NameEmp ?></td>
                    </tr>
                    <?php $num ++;
                } ?>
            </tbody> 
        </table>
    </div>


    <?php foreach ($GETCOUNTTRANS as $row) { ?>
        <?php $total_record = $row->Count; ?>
    <?php } ?> 

<?php $total_page = ceil($total_record / $pageend); ?> 
    <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" onclick="pagedatapay(name= 'Policy',page = '')">&laquo;</a></li>
            <?php for ($i = 1; $i <= $total_page; $i++) { ?>  
                <li class="page-item"><a class="page-link" onclick="pagedatapay(name= 'Policy',page = '<?php echo $i ?>')"><?php echo $i ?></a></li>
<?php } ?>
            <li class="page-item"><a class="page-link" onclick="pagedatapay(name= 'Policy',page = '<?php echo $total_page ?>')">&raquo;</a></li>
        </ul>
    </div>
</div>
     
<?php } ?>