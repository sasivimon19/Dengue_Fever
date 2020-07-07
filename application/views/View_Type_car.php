 
<option value="0">-- เลือกประเภทการใช้รถยนต์ --</option>
<?php foreach ($Get_Type_car as $itemTypeCar) { ?>
    <option value="<?php echo $itemTypeCar->CODE; ?>"><?php echo  iconv('TIS-620', 'UTF-8',$itemTypeCar->CODE." : ".$itemTypeCar->TYPENAME ); ?></option>
<?php } ?>
