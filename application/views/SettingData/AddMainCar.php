

<div class="col-md-6">
    <div class="input-group mb-3">
        <div class="input-group-prepend" >
            <button type="button" class="btn btn-default" style="background-color: #ae1b09; color:  white;" onclick="Upload_FileMiddle()"><i class="fas fa-file-import"></i> <b>Import</b> </button> 
        </div>
        <input type="file" name="FileMiddle" id="FileMiddle" class="form-control">

        <div class="input-group-prepend" >
            <button type="button" class="btn btn-success" onclick="Save_Impost_Middle()"><i class="fas fa-edit"></i> <b>บันทึก</b> </button>  
        </div> 

    </div>
</div> 


<!--<script type="text/javascript">
    function ExportCarYear() {
        
        alert('000000');
         
        var CarYear = document.getElementById('CarYear').value;
        
        var datas = "CarYear=" + CarYear;
        
        alert(datas);
        
        $.ajax({
            type: "POST",
            url: "<?php //echo site_url('HomeInsurance/ExportMiddleCarYear') ?>",
            data: datas,
        }).done(function (data) {
            $('#CarDesc').html(data);
        })
    }
</script>-->

<script>
 function Upload_FileMiddle(){
     


  var  FileMiddle  =  document.getElementById('FileMiddle').value;
     
  var form_data = new FormData();

  form_data.append('FileMiddle',$('#FileMiddle')[0].files[0]);
  
  if (FileMiddle == '') { 
       swal("กรุณาเลือกไฟล์ก่อน", "", "warning");

   }else{
    $.ajax({
    cache: false,
    type: 'POST',
    url: '<?php echo site_url('Management_Data/ImportExcel_TmpMiddle'); ?>', //Import
    contentType: false,
    processData:false,
    data: form_data,

        }).done(function (data) {
                    document.getElementById("loaddingearch").style.display = "none";
                    $('#Table_Middle').html(data); 
       })
    }; 
  }


</script>







<!--script loading-->
<!--<script>
    document.getElementById('loaddingMiddle').style.display = "none";
</script>-->










