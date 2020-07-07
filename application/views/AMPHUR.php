<option value="0">---เลือกอำเภอหรือเขต---</option>
<?php foreach ($GET_AMPHUR as $AMPHUR) { ?>
    <option  value="<?php echo iconv('TIS-620', 'UTF-8', $AMPHUR->AMPHUR_ID); ?>"><?php echo iconv('TIS-620', 'UTF-8', $AMPHUR->AMPHUR_NAME); ?></option>
<?php } ?>

