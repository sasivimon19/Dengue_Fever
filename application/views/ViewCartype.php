<option value="0">--- ประเภทการใช้รถยนต์ ---</option>
<?php foreach ($GET_FamilyDescription as $FamilyDescription) { ?>
    <option  value="<?php echo iconv('TIS-620', 'UTF-8', $FamilyDescription->FamilyDescription); ?>"><?php echo iconv('TIS-620', 'UTF-8', $FamilyDescription->FamilyDescription); ?></option>
<?php } ?>
