
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<script type = 'text/javascript' src = "<?php echo base_url(); ?>assets/jquery.min.js"></script>

<section class="content" style=" padding-top: 3%;">
    <div class="container-fluid">
        <div class="row content" style=" margin-top: -5%;">
            <div class="col-sm-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            <?php if ($TITLE == 'Occupation') { ?>                           
                                <b> ข้อมูลอาชีพที่ถูกต้อง </b>
                            <?php } elseif ($TITLE == 'District') { ?>
                                <b> ข้อมูลอำเภอ/เขต ถูกต้อง </b>
                            <?php } elseif ($TITLE == 'Province') { ?>
                                <b> ข้อมูลจังหวัดถูกต้อง </b>
                            <?php } elseif ($TITLE == 'Title') { ?> 
                                <b> ข้อมูลคำนำหน้าที่ถูกต้อง </b>
                            <?php } ?>
                        </h3>
                    </div>

                    <!--ค้นหาข้อมูลของแต่ละข้อมูล-->
                    <div class="col-md-12">
                        <div id="SearchSub1" class="tabcontent" >
                            <?php $this->load->view('Search_data'); ?>
                        </div>
                    </div>

                    <div  id="table_subSearch">
                        <?php $this->load->view('subtable'); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
      function Search_Occupation(TITLE) {

        var Occupation = document.getElementById('Occupation').value;
        var dataSearchOccupation = document.getElementById('dataSearchOccupation').value;
 
        var datas = "Occupation="+Occupation+"&dataSearchOccupation="+dataSearchOccupation+"&TITLE="+TITLE;
              
        if(Occupation == '0'){
            swal("กรุณาเลือกข้อมูลการค้นหา", "", "warning");
        }else if(dataSearchOccupation == ''){
            swal("กรุณากรอกรหัสอาชีพ", "", "warning");
        }else {
                $('#loadding').show();
                $.ajax({
                type:"POST",
                url:"<?php echo site_url('Con_Dengue_Fever/Search_datatotal') ?>",
                data:datas,
                }).done(function(data){
                    $('#table_subSearch').html(data);  //Div ที่กลับมาแสดง  
                    document.getElementById("loadding").style.display = "none";         
            })

        }
    }
</script>


<script type="text/javascript">
      function Search_District(TITLE) {
          
       var DISTRICTCODE = document.getElementById('DISTRICT').value;
       var dataSearchDISTRICT = document.getElementById('dataSearchDISTRICT').value;
 
       var datas = "DISTRICTCODE="+DISTRICTCODE+"&dataSearchDISTRICT="+dataSearchDISTRICT+"&TITLE="+TITLE;

        if(DISTRICTCODE == '0'){
            swal("กรุณาเลือกข้อมูลการค้นหา", "", "warning");
        }else if(dataSearchDISTRICT == ''){
            swal("กรุณากรอกอำเภอ / เขต ", "", "warning");
        }else {
                $('#loadding').show();
                $.ajax({
                type:"POST",
                url:"<?php echo site_url('Con_Dengue_Fever/Search_datatotal') ?>",
                data:datas,
                }).done(function(data){
                    $('#table_subSearch').html(data);  //Div ที่กลับมาแสดง  
                    document.getElementById("loadding").style.display = "none";         
            })

        }
    }
</script>  



<script type="text/javascript">
      function Search_Province(TITLE) {
            
        var PROVINCE = document.getElementById('Province').value;
        var dataSearchPROVINCE = document.getElementById('dataSearchPROVINCE').value;
 
         var datas = "PROVINCE="+PROVINCE+"&dataSearchPROVINCE="+dataSearchPROVINCE+"&TITLE="+TITLE;

        if(PROVINCE == '0'){
            swal("กรุณาเลือกข้อมูลการค้นหา", "", "warning");
        }else if(dataSearchPROVINCE == ''){
            swal("กรุณากรอกจังหวัด ", "", "warning");
        }else {
                $('#loadding').show();
                $.ajax({
                type:"POST",
                url:"<?php echo site_url('Con_Dengue_Fever/Search_datatotal') ?>",
                data:datas,
                }).done(function(data){
                    $('#table_subSearch').html(data);  //Div ที่กลับมาแสดง  
                    document.getElementById("loadding").style.display = "none";         
            })

        }
    }
</script> 


<script type="text/javascript">
      function Search_TITLE(TITLE) {
            
        var Title_id = document.getElementById('Title_id').value;
        var dataSearchTITLE = document.getElementById('dataSearchTITLE').value;
 
         var datas = "Title_id="+Title_id+"&dataSearchTITLE="+dataSearchTITLE+"&TITLE="+TITLE;

        if(Title_id == '0'){
            swal("กรุณาเลือกข้อมูลการค้นหา", "", "warning");
        }else if(dataSearchTITLE == ''){
            swal("กรุณากรอกจังหวัด ", "", "warning");
        }else {
                $('#loadding').show();
                $.ajax({
                type:"POST",
                url:"<?php echo site_url('Con_Dengue_Fever/Search_datatotal') ?>",
                data:datas,
                }).done(function(data){
                    $('#table_subSearch').html(data);  //Div ที่กลับมาแสดง  
                    document.getElementById("loadding").style.display = "none";         
            })

        }
    }
</script> 













