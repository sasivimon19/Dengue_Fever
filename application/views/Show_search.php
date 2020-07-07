<style>
    @media only screen and (max-width: 600px)  {
        #button_Buyinsuran{
            margin-top: -26%;
            margin-left: 65%;
        }
        .DetailRE{
            margin-top: -13%;
            margin-left: 67%;
        }
        .buttonCapital{
            margin-top: -13%;
            margin-left: 65%;
        }
        
    }
</style>



<div class="row"> 
    <?php $si = 1 ; ?>
    <?php foreach ($TYPECAR as $item) { ?>
        <div class="item col-xs-4 col-lg-4">
            <div class="thumbnail card">                
					<div class="card-default" style=" background-color: #cccccc">
                        <div class="img-event">
                            <center><img class="group list-group-image img-fluid"style=" padding-top: -5%; width: 20%; height: 20%;"src="<?php echo base_url(); ?>assets/images/Logo_Insurance/<?php echo iconv('TIS-620', 'UTF-8', $item->img); ?>"><b> <?php echo iconv('TIS-620', 'UTF-8', $item->Insure_Company); ?> ( <?php echo iconv('TIS-620', 'UTF-8', $item->Insure_Code_Company); ?> )</b></center>
                        </div>  
                    </div>			
                <div class="caption card-body">
                    <center><label style=" text-align: left;"><b><?php echo iconv('TIS-620', 'UTF-8', $item->Type_Name); ?></b></label></center>
                    <center><label style=" text-align: left;"><b>ราคา : </b><span class="badge bg-fuchsia"><?php echo number_format($item->Insurance_price_total, 02); ?></span> บาท/ปี</label></center>

                    <div class="row">
                        <div class="col-md-7">
                            <p class="group inner list-group-item-text" style="font-size: 13px;" ><b>ทุนประกัน:</b> <a href="#" data-toggle="tooltip" data-placement="top" title="มูลค่าความคุ้มครองสูงสุดสำหรับรถยนต์เอาประกัน"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p> 
                        </div>
                        <div class="buttonCapital">
                            <p class="group inner list-group-item-text" style=" font-size: 13px;" ><b><?php echo  iconv('TIS-620','UTF-8',$item->Net_Insurance) ?> บ.</b></p> 
                            <input type="hidden" id="Net_Insurance" name="Net_Insurance"  value="<?php echo $item->Net_Insurance ?>">
                        </div>
                    </div>
                 

                    <div class="row">
                        <div class="col-md-7">
                            <p class="group inner list-group-item-text" style=" font-size: 13px;"><b>ความรับผิดต่อบุคคล:</b> <a href="#" data-toggle="tooltip" data-placement="top" title="ซ่อมอู่ หมายถึง สถานที่ซ่อมรถยนต์ในเครือของบริษัทประกันกำหนด , ซ่อมห้าง หมายถึง สถานที่ซ่อมรถยนต์ของบริษัทผู้จำหน่ายรถยนต์ศูนย์บริการสัญญาของบริษัทประกัน"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p> 
                        </div>
                        <div class="DetailRE">
                            <?php if ($item->DetailCoverage1 == "Re1") { ?>
                                <p class="group inner list-group-item-text" style=" font-size: 13px;"><b> ซ่อมอู่ </b></p> 
                            <?php } else if ($item->DetailCoverage1 == "Re2") { ?>
                                <p class="group inner list-group-item-text" style=" font-size: 13px;"><b> ซ่อมห้าง </b></p>
                            <?php } else if ($item->DetailCoverage1 == "Re3") { ?>
                                <p class="group inner list-group-item-text" style=" font-size: 13px;"><b> ซ่อมเอง </b></p> 
                            <?php } ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <p class="group inner list-group-item-text" style=" font-size: 13px;" ><b> ส่วนลดค่ากล้อง :</b> <a href="#" data-toggle="tooltip" data-placement="top" title="กรณีมีกล้องติดหน้ารถจะได้รับส่วนลดเพิ่ม"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p> 
                        </div>
                        <?php if ($item->Discount_price_cctv != '') { ?>
                            <div class="buttonCapital">
                                <p class="group inner list-group-item-text" style=" font-size: 13px;"><b><i class="fa fa-check" aria-hidden="true" style="color: green;"></i> <?php echo number_format($item->Discount_price_cctv, 02) ?> บ.</b></p> 
                            </div>
                        <?php } else { ?>
                            <div class="buttonCapital">
                                <p class="group inner list-group-item-text" style=" font-size: 13px;"><b><i class="fa fa-times" aria-hidden="true" style="color: red;"></i></b></p> 
                            </div>
                        <?php } ?>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <button type="button" class="btn btn-warning" id="button_Details" data-toggle="modal" data-target="#modal-lg" onclick="FUN_Description(Middle_ID = '<?php echo $item->Middle_ID ?>')"> รายละเอียด </button>
                        </div>
                        <div class="col-xs-12 col-md-1"></div>
                        <div class="col-xs-12 col-md-5">
                            <button type="button" class="btn btn-primary" id="button_Buyinsuran" data-toggle="modal" data-target="#modal-xl" onclick="FUN_SENDIN(Middle_ID = '<?php echo $item->Middle_ID ?>')">  ซื้อประกัน </button>
                        </div>
                    </div>

<!--                    <div class="row" style=" margin-left:55%; padding-top: 4%;">
                        <div class="col-md-12">
                            <input type="checkbox" class="checkboxvehicle" id="vehicle<?php //echo $si?>" name="vehicle[]" value="<?php echo $item->Middle_ID; ?>" onclick="Pricecomparison('<?php //echo 'vehicle'.$si; ?>',Middle_ID='<?php //echo $item->Middle_ID; ?>')">
                            <label for="vehicle<?php //echo $si?>" style=" color: red;"> เปรียบเทียบ </label>
                        </div>
                    </div>-->

                    <div class="row" style=" margin-left:55%; padding-top: 4%;">
                        <div class="col-md-12">
                            <?php  if($checktext1==$item->Middle_ID || $checktext2==$item->Middle_ID || $checktext3==$item->Middle_ID){?>
                            <input type="checkbox" class="checkbox" id="vehicle<?php echo $item->Middle_ID;?>" name="vehicle[]" value="<?php echo $item->Middle_ID; ?>" 
                            onclick="Pricecomparison(checkbox='vehicle<?php echo $item->Middle_ID;?>')" checked="true">
                             <?php } else{?>
                                 <input type="checkbox" class="checkbox" id="vehicle<?php echo $item->Middle_ID;?>" name="vehicle[]" value="<?php echo $item->Middle_ID; ?>" 
                            onclick="Pricecomparison(checkbox='vehicle<?php echo $item->Middle_ID;?>')">
                             <?php } ?>
                            
                            <label style=" color: red;"> เปรียบเทียบ </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php $si++;} ?> 
</div>


<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>







