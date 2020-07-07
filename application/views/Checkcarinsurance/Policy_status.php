
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #66ccff;
        color: black;
    }
</style>

<style>
   #loaddingearch{
            position: fixed;
            left: 0px;
            width: 100%;
            height: 100%;
            padding-left:45%;
            padding-top: 15%;

            }.modal {
            display: none; 
            position: fixed;  
            height:100%; 
            background-color: rgb(0,0,0); /* Fallback color */ 
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 0px;

        }
</style>

   <div id="loaddingearch" class="modal" style="display: none">
        <img src="<?php echo base_url();?>assets/images/loader.gif">
    </div>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content" style=" padding-top: 2%;">
            <div class="container-fluid">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title"> ติดตามสถานะกรมธรรม์ </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>-->
                        </div>
                    </div>
                    <div class="card-body">
                        
                   <!--start SearchPolicy -->
                        <div class="col-md-12">  
                            <div id="Div_Main_SearchPolicy" name="Div_Main_SearchPolicy">
                                <div class="row" style=" margin-top: 2%;"> 
                                    <div class="col-md-4">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>เลือกการค้นหา</b></button>
                                            </div>
                                            <select class="form-control" id="Searchsub_Main_Policy" name="Searchsub_Main_Policy">
                                                <option value="0"> -- เลือกการค้นหา --</option>
                                                <option value="Ref">  เลขที่อ้างอิง </option>
                                                <option value="CustomerIDCard"> บัตรประจำตัวประชาชน </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input-group mb-4">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn btn-default "  style="background-color: #44CEF6;"><b>ค้นหา</b></button>
                                            </div>
                                            <input type="text" class="form-control" id="SearchPolicy" name="SearchPolicy">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-default " style="background-color: #16A951;" onclick="ClickSearchPolicy()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End SearchPolicy-->

                        <div class="row" id="checkInsurance_premium">
                            <div class="col-md-12">
                                <?php $this->load->view('Checkcarinsurance/Table_Insurance_Policy'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>



                <!-- SELECT2 EXAMPLE -->
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">ข้อมูลลูกค้า</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>-->
                        </div>
                    </div>

                    <div class="card-body">
                        
                        
                        <div class="row" id="Customer_Policy">
                            <div class="col-md-12">
                                <?php $this->load->view('Checkcarinsurance/Table_Customer_Policy'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>

            </div>
        </section>
    </div>
</div>

<script type="text/javascript">
    function ClickSearchPolicy() {

       var Searchsub_Main_Policy = document.getElementById('Searchsub_Main_Policy').value;
       var SearchPolicy = document.getElementById('SearchPolicy').value;  
       
       var datas = "Searchsub_Main_Policy=" + Searchsub_Main_Policy+"&SearchPolicy="+SearchPolicy; 

        if (Searchsub_Main_Policy == 0) {
            alert("กรุณาเลือกการค้นหา");
            $('#Searchsub_Main_Policy').focus();
            document.getElementById("Searchsub_Main_Policy").style = "border: 1px red solid;";
        }else if(SearchPolicy == ''){
            alert("กรุณากรอกข้อความ");
            $('#SearchPolicy').focus();
            document.getElementById("SearchPolicy").style = "border: 1px red solid;";
        }else{
        $('#loaddingearch').show();
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('HomeInsurance/Show_Insurance_Policy') ?>",
                 data: datas,
            }).done(function (data) {
                document.getElementById("loaddingearch").style.display = "none";
                $('#checkInsurance_premium').html(data);
            })
            
        $.ajax({
                type: "POST",
                url: "<?php echo site_url('HomeInsurance/Show_Customer_Policy') ?>",
                 data: datas,
            }).done(function (data) {
                $('#Customer_Policy').html(data);
            })
    }
 }   
</script>  


<script>
    function pagedatapay(name,page) {	 //แนบตัวแปร page ไปด้วย
        
       var Searchsub_Main_Policy = document.getElementById('Searchsub_Main_Policy').value;
       var SearchPolicy = document.getElementById('SearchPolicy').value; 
       
        var datas = "name="+name+"&page="+page+"&Searchsub_Main_Policy="+Searchsub_Main_Policy+"&SearchPolicy="+SearchPolicy;

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('HomeInsurance/Show_Insurance_Policy') ?>",
            data: datas
        }).done(function (data) {
            $('#checkInsurance_premium').html(data);  //Div ที่กลับมาแสดง

        })
    }
</script>


<script>
        function pagedatapayCustomer(name,page){	 //แนบตัวแปร page ไปด้วย
            
       var Searchsub_Main_Policy = document.getElementById('Searchsub_Main_Policy').value;
       var SearchPolicy = document.getElementById('SearchPolicy').value; 
       
       var datas = "name="+name+"&page="+page+"&Searchsub_Main_Policy="+Searchsub_Main_Policy+"&SearchPolicy="+SearchPolicy;
       
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('HomeInsurance/Show_Customer_Policy') ?>",
                        data:datas
                        }).done(function(data){	
                $('#Customer_Policy').html(data);  //Div ที่กลับมาแสดง
                }) 	
}
</script>








