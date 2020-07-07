<option value="0">--- ปีรถยนต์ ---</option>
<?php foreach ($GET_Yearcar as $Yearcar) { ?>
    <option  value="<?php echo $Yearcar->CarYear; ?>"><?php echo $SumYear = $Yearcar->CarYear; ?> [<?php echo $SumYear+543 ?>] </option>
<?php } ?>


