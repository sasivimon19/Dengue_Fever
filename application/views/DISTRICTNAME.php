<option value="0">---เลือกตำบลหรือแขวง---</option>
<?php foreach ($GET_DISTRICTNAME as $DISTRICTNAME) { ?>
    <option  value="<?php echo iconv('TIS-620', 'UTF-8', $DISTRICTNAME->DISTRICT_ID); ?>"><?php echo iconv('TIS-620', 'UTF-8', $DISTRICTNAME->DISTRICT_NAME); ?></option>
<?php } ?>