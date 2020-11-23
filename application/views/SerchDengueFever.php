

<section class="content" style=" padding-top: 5%;">
    <div class="container-fluid">
        <div class="divvv w3-animate-right" style="background-color:#FFFFFF;margin-top: 0px;">
            <div class="row content" style=" margin-top: -5%;">
                <div class="col-sm-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit"></i>
                                ค้นหาข้อมูลที่ถูกส่ง API
                            </h3>
                        </div>
                        
                        <div class="col-md-12">  
                          
                            <div class="row" style=" margin-top: 2%;"> 
                                <div class="col-md-3">
                                    <div class="input-group mb-4">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-default btn-sm"  style="background-color: #44CEF6;"><b> ข้อมูลค้นหา </b></button>
                                        </div>
                                        <select class="form-control form-control-sm" id="Operator" name="Operator">
                                            <option value="0"> เลือกข้อมูล </option>
                                            <option value="IDcard"> IDcard </option>
                                            <option value="NumberRef"> NumberRef </option>                 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-default btn-sm"  style="background-color:#44CEF6;">กรอกข้อมูล</button>
                                        </div>
                                        <input id="dataSearch" type="text" class="form-control form-control-sm" name="dataSearch">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-default btn-sm"  style="background-color:#44CEF6;">เริ่มวันที่</button>
                                        </div>
                                        <input type="date" class="form-control form-control-sm" id="startdateSearch" name="startdateSearch">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-default btn-sm"  style="background-color:#44CEF6;">ถึงวันที่</button>
                                        </div>
                                        <input  type="date" class="form-control form-control-sm" id="EnddateSearch" name="EnddateSearch">
                                        <div class="input-group-prepend" >
                                            <button type="button" class="btn btn-success btn-sm"  onclick="Search_SUCCESS()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>   
                                    </div>
                                </div>

                               <!-- <div class="col-md-1">
                                    <button type="button" class="btn btn-success btn-sm"  onclick="Search_SUCCESS()"><i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>-->
    
                                
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div id="Search_Sub" class="tabcontent" >
                            
                            </div>
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--<script type="text/javascript">
    jQuery('#startdateSearch').datetimepicker({
        timepicker: false,
        format: 'Y-m-d'
    });
</script>-->

<script type="text/javascript">
      function Search_SUCCESS() {

        var Operator = document.getElementById('Operator').value;
        var dataSearch = document.getElementById('dataSearch').value;
        var startdateSearch = document.getElementById('startdateSearch').value;
        var EnddateSearch = document.getElementById('EnddateSearch').value;
 
        var datas = "Operator="+Operator+"&dataSearch="+dataSearch+"&startdateSearch="+startdateSearch+"&EnddateSearch="+EnddateSearch;
        
        alert(datas);
                   
        if(Operator == '0'){
            swal("กรุณาเลือกข้อมูลการค้นหา", "", "warning");
        }else if(dataSearch == ''){
            swal("กรุณากรอกรหัสบัตรประชาชนหรือเลข Ref ที่ต้องการค้นหา", "", "warning");
        }else {              
                $('#loadding').show();
                $.ajax({
                type:"POST",
                url:"<?php echo site_url('Con_Dengue_Fever/Search_DengueFever') ?>",
                data:datas,
                }).done(function(data){
                  alert(datas);
                 $('#Search_Sub').html(data);  //Div ที่กลับมาแสดง  
                 document.getElementById("loadding").style.display = "none";         
            })

        }
    }

</script>












