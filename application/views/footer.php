
<div class="col-md-12 col-sm-12 col-12">
    <div class="row">
      
        <?php if($checkComparison == 0){ ?>
            
        <?php }else{ ?>
            <?php foreach ($checkComparison as $value) { ?>
             
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                       
                          
                        
                        <div class="info-box-content">
                            <span class="info-box-text"><?php echo iconv('tis-620', 'utf-8', $value->Type_Name) ?></span>
                            <span class="info-box-text"> <?php echo iconv('tis-620', 'utf-8', $value->Insure_Company) ?></span>
                            <span class="info-box-number"><?php echo number_format($value->Insurance_price_total, 02) ?></span>
                        </div>
                        <button  class="close" data-dismiss="modal" aria-label="Close"  type="button" style="height: 10%; margin-top: 3%; margin-right: 1%;" onclick="Pricecomparison_Delete(Middle_ID='<?php echo $value->Middle_ID;?>')"> <span aria-hidden="true">&times;</span> </button>
                    </div>
                </div> 
            <?php } ?>  
        <?php if(COUNT($checkComparison)== 0){?>
            <button  class="btn btn-success"  type="submit" style="height: 10%; margin-top: 5%; display: none;"  id="buttoncompare" name="buttoncompare" > เปรียบเทียบ </button> &nbsp;&nbsp;
            <!--<button  class="btn btn-danger"  type="button" style="height: 10%; margin-top: 3%; margin-right: 3%;" onclick="butcancel()"> ยกเลิก </button>-->
        <?php }else{ ?>
            <button  class="btn btn-success"  type="submit" style="height: 10%; margin-top: 3%;"  id="buttoncompare" name="buttoncompare" > เปรียบเทียบ </button> &nbsp;&nbsp;   
        <?php } ?>
    <?php } ?>
    </div>
</div>

<script type="text/javascript">
    function Home_Preview() {

        window.open(" <?php echo site_url('Preview_controllers/Get_Preview'); ?>);
    }
</script>


<!--<script type="text/javascript">
    function butcancel() {
		
       document.getElementById("comparison").style.display = "none";
       document.getElementById("FormCheck_Search_More").reset();
	   
   }

</script>-->






