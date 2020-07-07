<option value="">--- เลือกความคุ้มครอง / ซ้อม ---</option>
<?php foreach ($GET_IDCoverRate as $value) { ?>
    <option  value="<?php echo $value->ID_CoverRate; ?>">
        <?php if ($value->DetailCoverage1 == 'Re1') { ?>
            <?php echo $value->ID_CoverRate . ' : ' . "ซ่องอู่"; ?> 
        <?php } else if ($value->DetailCoverage1 == 'Re2') { ?>
            <?php echo $value->ID_CoverRate . ' : ' . "ซ่องห้าง"; ?>       
        <?php } else if ($value->DetailCoverage1 == 'Re3') { ?>
            <?php echo $value->ID_CoverRate . ' : ' . "ซ่องเอง"; ?>         
        <?php } ?>
    </option>
<?php } ?>


