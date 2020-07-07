<option value="">--- เลือกแพ็คเกจ / ทุน ---</option>
<?php foreach ($GET_Package as $item) { ?>
<option  value="<?php echo $item->IDPackage; ?>">
    <?php echo iconv('TIS-620','UTF-8',$item->NamePackage .' : '.$item->Net_Insurance); ?> 
</option>
<?php } ?>

