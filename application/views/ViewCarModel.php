<option value="0">--- รุ่นรถยนต์ ---</option>
<?php foreach ($GET_Car_Brand as $value) { ?>
    <option  value="<?php echo iconv('TIS-620', 'UTF-8', $value->CarModel); ?>"><?php echo iconv('TIS-620', 'UTF-8', $value->CarModel); ?></option>
<?php } ?>
