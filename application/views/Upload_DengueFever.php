

<section class="content" style=" padding-top: 5%;">
    <div class="container-fluid">
        <div class="divvv w3-animate-right" style="background-color:#FFFFFF;margin-top: 0px;">
            <div class="row content" style=" margin-top: -5%;">
                <div class="col-sm-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                <b>โหลดข้อมูลลูกค้า</b>
                            </h3>
                        </div>

                        <div class="card-body" nctype="multipart/form-data">   
                            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
<!--                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true" style=" color: green;"> <b>ข้อมูลที่ถูกต้อง ( <?php if ($count_truedata == 0) { echo '0';} else { echo $count_truedata;} ?> )</b></a>
                                </li>-->
                                <li class="nav-item">
                                    <a class="nav-link active" id="custom-content-below-home-tab" data-toggle="pill" href="#custom-content-below-home" role="tab" aria-controls="custom-content-below-home" aria-selected="true" style=" color: green;"> <b>ข้อมูลที่ถูกต้อง 
                                            <?php
                                            $num = 0;
                                            foreach ($CountTrueTemp as $row) {
                                                $num++;
                                            } echo $row->Count;
                                            ?></span>)</b></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-content-below-profile-tab" data-toggle="pill" href="#custom-content-below-profile" role="tab" aria-controls="custom-content-below-profile" aria-selected="false" style=" color: red;"> <b>ข้อมูลที่ไม่ถูกต้อง  ( <?php if ($count_nodata == 0) { echo '0';} else { echo $count_nodata;} ?> )</b> </a>
                                </li>
                                <li class="nav-item">
                                    <form id="submituploadfile" name="submituploadfile" method="post" nctype="multipart/form-data" onSubmit="JavaScript:return loadSubmit();" enctype="multipart/form-data">
                                        <div class="col-md-10">
                                            <div class="input-group mb-3">
                                                <input type="file" name="fileDengue"  id="fileDengue" class="form-control form-control-sm" >
                                                <div class="input-group-prepend" >
                                                    <?php if($count_nodata != 0){ ?>
                                                    <button class="btn btn-sm btn-primary btn-sm" type="button" name="btnload" id="btnload" onclick="Upload_File()" disabled="true"><i class="fas fa-file-import"></i> <b> UPLOAD </b> </button>
                                                    <?php }else { ?>
                                                        <button class="btn btn-sm btn-primary btn-sm" type="button" name="btnload" id="btnload" onclick="Upload_File()"><i class="fas fa-file-import"></i> <b> UPLOAD </b> </button>
                                                   <?php } ?>
                                                </div>   
                                            </div>
                                        </div>
                                    </form>
                                </li>

                                <li class="nav-item">
                                    <p>
                                        <a href="<?php echo site_url('Con_Dengue_Fever/Export_Ex') ?>">
                                            <button type="button" class="btn btn-success btn-sm">
                                                <i class="fas fa-cloud-download-alt"></i> <b> Ex.ไฟล์โหลด Excel </b>
                                        </button></a>
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
                                            <i class="fas fa-exclamation-triangle"></i> <b> Ex.ข้อมูล</b> 
                                        </button>   
                                        <button class="btn btn-danger btn-sm" type="button" name="btnload" id="btnload" onclick="DeleteUploadFileTmp()"><i class="fas fa-trash-alt"></i> <b> ล้างข้อมูล </b> </button>
                                    </p>
                                </li>

                            </ul>

                            <div class="tab-content" id="custom-content-below-tabContent" id="sumtatble">
                                
                                <div class="tab-pane fade show active" id="custom-content-below-home" role="tabpanel" aria-labelledby="custom-content-below-home-tab" id="Check_insurance" name="Check_insurance">
                                    <div id="TrueCheck_insurance" name="TrueCheck_insurance" class="tabcontent"> 
                                        <form id="TrueCustomerdata_Dengue" name="TrueCustomerdata_Dengue">
                                            <?php $this->load->view('TrueTableCustomerdata'); ?>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="custom-content-below-profile" role="tabpanel" aria-labelledby="custom-content-below-profile-tab">
                                    <div id="FalseCheck_insurance" name="FalseCheck_insurance" class="tabcontent"> 
                                        <form id="FalseCustomerdata_Dengue" name="Customerdata_Dengue">
                                            <?php $this->load->view('FalseTableCustomerdata'); ?>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       </div>
</section>


<div class="container">
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header btn-warning">
                    <h4 class="modal-title"> <b>ตัวอย่างข้อมูลที่ถูกต้อง</b> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4">
                            <p><b> คำนำหน้า </b></p> 
                        </div>
                        <div class="col-8">
                            นาย,นางสาว,นาย,ดาบตำรวจตรี,ทันตแพทย์หญิง,ธนาคาร
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <p><b> จังหวัด </b></p>  
                        </div>
                        <div class="col-8">
                            กรุงเทพมหานคร,
                            จังหวัดกระบี่,
                            จังหวัดกาญจนบุรี
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <p> <b> เขต </b> </p>   
                        </div>
                        <div class="col-8">
                            เขตบางกรวย,
                            เขตดุสิต,
                            เขตคลองสาน,
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <p> <b> อำเภอ (ต้องเขียนอำเภอเต็ม) </b> </p>     
                        </div>  
                        <div class="col-8">
                            อำเภอห้วยกระเจา,
                            อำเภอท่ามะกา,
                            อำเภอคลองท่อม
                        </div>  
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <p><b> เบอร์โทรศัพท์ </b> </p>
                        </div>  
                        <div class="col-8">
                            ต้องครบ 10 หลัก,
                            ห้ามเป็นค่าว่าง
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer btn-warning" >
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                </div>

            </div>
        </div>
    </div>
</div>





<script>
        function pagedatapayno(){	 //แนบตัวแปร page ไปด้วย
            
       document.getElementById('loadding').style.display = "block";     
       var   page = document.getElementById('pageno').value;
       var datas = "page="+page+"&pagesub="+"N";
       
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Con_Dengue_Fever/Home') ?>",
                        data:datas
                        }).done(function(data){	
                 document.getElementById('loadding').style.display = "none";
                $('#FalseCheck_insurance').html(data);  //Div ที่กลับมาแสดง
                }) 	
}
</script>



<script>
   function pagedatapay(){	 //แนบตัวแปร page ไปด้วย    
       document.getElementById('loadding').style.display = "block";  
       var   page = document.getElementById('page').value;
       var datas = "page="+page+"&pagesub="+"Y"; 
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Con_Dengue_Fever/Home') ?>",
                        data:datas
                        }).done(function(data){	
                document.getElementById('loadding').style.display = "none";            
                $('#TrueCheck_insurance').html(data);  //Div ที่กลับมาแสดง
                }) 	
}
</script>









