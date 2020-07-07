
<div style="">
<div class="panel-heading " style="color: #000;;height:8%; ">
    <button class="close" data-dismiss="modal"  aria-hidden="true" type="button" onclick="document.getElementById('modalshow').style.display = 'none';">&times;</button>
   <div style="font-size: 25px" class="panel-title" style="color:  #0099ff;" > 
   		<label id="Head"><?php echo $head ?></label> 
   </div>
    
</div>

<div id="mobile_model" style="position: -webkit-sticky;height:auto;  position: sticky;overflow-x:auto; background-color: #ffffff; ">
    <div class="panel-body">
       <?php $this->load->view($PageShow) ?>
    </div>
</div>
</div>

