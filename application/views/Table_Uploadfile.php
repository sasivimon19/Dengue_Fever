<?php
if (count($Dengue_Fever) == 0) {
    
    echo "ไม่มีข้อมูลที่ค้นหา";
       
} else {
    ?>                      
    <div class="wrapper" style=" padding-top:1%;">   
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="background-color:#47d147 ">
                                <div class="row">
                                    <div class="col-md-4" style=" color: black;">
                                        <h3 class="card-title"><b> <i class="fas fa-edit"></i> ข้อมูลที่ถูกส่ง API </b></h3>
                                    </div>
                                    <div class="input-group-prepend" style=" margin-left: 45%">
                                        <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-cloud-download-alt"></i> <b> Export ข้อมูลที่ถูกส่ง APT เรียบร้อย</b> </button>
                                    </div> 
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="table-data">
                                    <thead  style="background-color: gray;">                 
                                        <tr>
                                            <th style="text-align: center; white-space:nowrap;"> # </th>
                                            <th style="text-align: center; white-space:nowrap;">คำนำหน้า</th>
                                            <th style="text-align: center; white-space:nowrap;">ชื่อ</th>
                                            <th style="text-align: center; white-space:nowrap;">นามสกุล</th>
                                            <th style="text-align: center; white-space:nowrap;">Address</th>
                                            <th style="text-align: center; white-space:nowrap;">IDCard</th>
                                            <th style="text-align: center; white-space:nowrap;">Birthday</th>
                                            <th style="text-align: center; white-space:nowrap;">Mobile</th>
                                            <th style="text-align: center; white-space:nowrap;">จังหวัด</th>
                                            <th style="text-align: center; white-space:nowrap;">อำเภอ</th>
                                            <th style="text-align: center; white-space:nowrap;">รหัสไปรษณีย์</th>
                                            <?php if ($Number_Ref != '') { ?>
                                                <th style="text-align: center; white-space:nowrap;">Number_Ref</th>       
                                            <?php } else { ?>
                                                <th></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //$num = 1;
                                        foreach ($Dengue_Fever as $value) {
                                            ?>
                                            <tr>
                                                <td style="text-align: center; white-space:nowrap;"><?php echo $value->row ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Title<?php echo $value->ID_Timp ?>" name="Title<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->Title) ?></td>
                                                <td style="white-space:nowrap;" id="FirstName<?php echo $value->ID_Timp ?>" name="FirstName<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->FirstName) ?></td>
                                                <td style=" white-space:nowrap;" id="LastName<?php echo $value->ID_Timp ?>" name="LastName<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->LastName) ?></td>
                                                <td id="Address<?php echo $value->ID_Timp ?>" name="Address<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->Address) ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="IDCardcustomer<?php echo $value->ID_Timp ?>" name="IDCardcustomer<?php echo $value->ID_Timp ?>"><?php echo $value->IDCard ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Birthday<?php echo $value->ID_Timp ?>" name="Birthday<?php echo $value->ID_Timp ?>"><?php echo$value->Birthday ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Mobile<?php echo $value->ID_Timp ?>" name="Mobile<?php echo $value->ID_Timp ?>"><?php echo $value->Mobile ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="ProvinceCode<?php echo $value->ID_Timp ?>" name="ProvinceCode<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->ProvinceCode) ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Birthday<?php echo $value->ID_Timp ?>" name="Birthday<?php echo $value->ID_Timp ?>"><?php echo iconv('TIS-620//ignore', 'UTF-8//ignore', $value->AmphorCode) ?></td>
                                                <td style="text-align: center; white-space:nowrap;" id="Mobile<?php echo $value->ID_Timp ?>" name="Mobile<?php echo $value->ID_Timp ?>"><?php echo$value->PostCode ?></td>    
                                                <?php if ($value->Number_Ref != '') { ?>
                                                    <td style="text-align: center; white-space:nowrap; color: green;" id="Number_Ref<?php echo $value->ID_Timp ?>" name="Status_API<?php echo $value->ID_Timp ?>"><?php echo $value->Number_Ref ?></td>    
                                                <?php } else { ?>
                                                    <td></td>      
                                                <?php } ?>

                                            </tr>
                                            <?php
                                            //$num ++;
                                        }
                                        ?>
                                    </tbody> 
                                </table>


                             <?php foreach ($CountDengue_Fever as $row) { ?>
                                    <?php $total_record = $row->Count; ?>
                                <?php } ?> 

                                <?php $total_page = ceil($total_record / $pageend); ?> 
                                <div class="card-footer clearfix">
                                    <ul class="pagination">
                                        <li class="page-item" style="margin-top: 5px;">ทั้งหมด <?php echo $total_page ?> รายการ&nbsp;</li>
                                        <li class="page-item">
                                            <select class="form-control form-control-sm" name="page" id="page" onchange="pageSend_DengueFever()">
                                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>  
                                                    <?php if ($i == $pagenum) { ?>
                                                        <option value="<?php echo $i ?>" selected><?php echo $i ?></option> 
                                                    <?php } else { ?>
                                                        <option value="<?php echo $i ?>"><?php echo $i ?></option> 
                                                    <?php } ?>
                                                <?php } ?>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
<!--                                <ul class="pagination justify-content-center">
                                    <li class="page-item" data-page="prev"><a class="page-link" href="#">Previous</a></li>
                                    <li class="page-item" data-page="next" id="prev"><a class="page-link" href="#">Next</a></li>
                                </ul> -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>



<script>
   function pageSend_DengueFever(){	 //แนบตัวแปร page ไปด้วย    
       
       document.getElementById('loadding').style.display = "block";  
       
        var Operator = document.getElementById('Operator').value;
        var dataSearch = document.getElementById('dataSearch').value;
        var startdateSearch = document.getElementById('startdateSearch').value;
        var EnddateSearch = document.getElementById('EnddateSearch').value;
        var page = document.getElementById('page').value;
 
        var datas = "Operator="+Operator+"&dataSearch="+dataSearch+"&startdateSearch="+startdateSearch+"&EnddateSearch="+EnddateSearch+"&page="+page;
      
                $.ajax({
                        type:"POST",
                        url:"<?php echo site_url('Con_Dengue_Fever/Search_DengueFever') ?>",
                        data:datas
                        }).done(function(data){	
                document.getElementById('loadding').style.display = "none";            
                $('#Search_Sub').html(data);  //Div ที่กลับมาแสดง
                }) 	
}
</script>

<!--<script>
    getPagination('#table-data');

     function getPagination(table) {

        var lastPage = 1;
        
        $('.pagination')
            .find('li')
            .slice(1, -1)
            .remove();
        var trnum = 0; 
        maxRows = 10; 
            
        $('.pagination').show();
        var totalRows = $(table + ' tbody tr').length;     
        $(table + ' tr:gt(0)').each(function() {
            trnum++;   
            if (trnum > maxRows) {
                $(this).hide(); 
            }
            if (trnum <= maxRows) {
                $(this).show();
            }
        }); 
            
        if (totalRows > maxRows) {
            var pagenum = Math.ceil(totalRows / maxRows);
            for (var i = 1; i <= pagenum; ) {
                $('.pagination #prev')
                    .before(
                    '<li class="page-item"data-page="' +
                        i +
                    '">\
                        <a class="page-link" href="#">' +
                            i++ +
                        '</a>\
                    </li>')
                    .show();
                } 
        } else{
            $('.pagination').hide();
        } 
            
        $('.pagination [data-page="1"]').addClass('active'); 
        $('.pagination li').on('click', function(evt) {
            evt.stopImmediatePropagation();
            evt.preventDefault();
            var pageNum = $(this).attr('data-page'); 
            var maxRows = 10; 
            if (pageNum == 'prev') {
                if (lastPage == 1) {
                    return;
                }
                pageNum = --lastPage;
            }
            if (pageNum == 'next') {
                if (lastPage == $('.pagination li').length - 2) {
                    return;
                }
                pageNum = ++lastPage;
            }
            lastPage = pageNum;
            var trIndex = 0; 
            $('.pagination li').removeClass('active'); 
            $('.pagination [data-page="' + lastPage + '"]').addClass('active'); 
                                    
            limitPagging();
            $(table + ' tr:gt(0)').each(function() {
                
                trIndex++; 
                if (
                    trIndex > maxRows * pageNum ||
                    trIndex <= maxRows * pageNum - maxRows
                    ) {
                    $(this).hide();
                } else {
                    $(this).show();
                } 
            }); 
        }); 
    
        limitPagging();
        

    }
    
function limitPagging(){
    

        if($('.pagination li').length > 7 ){
                if( $('.pagination li.active').attr('data-page') <= 3 ){
                $('.pagination li:gt(5)').hide();
                $('.pagination li:lt(5)').show();
                $('.pagination [data-page="next"]').show();
            }if ($('.pagination li.active').attr('data-page') > 3){
                $('.pagination li:gt(0)').hide();
                $('.pagination [data-page="next"]').show();
                for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
                    $('.pagination [data-page="'+i+'"]').show();

                }

            }
        }
    }
 </script>-->
