<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>JP INSURANCE BROKER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/JPinsurance_EN.png" type="image/gif">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/dist/css/adminlte.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> 
        <script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script> 
        <!--<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>-->
        
        <style type="text/css">
        #loadding{
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

        @media only screen and (max-width: 600px)  {
                .icheck-primary{
                    margin-bottom: 5px
                }
        }
        #fontp{
             font-size: 13px;
        }
        </style>

    </head>

 

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav" >
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item ">
                        <a onclick="$('#loadding').show();" href="<?php echo site_url('Con_Dengue_Fever/Home') ?>" class="nav-link" style="font-size: 14px"><i class="fas fa-home"></i><b> HOME </b></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('Con_Dengue_Fever/Logout') ?>" style="color: red;"><i class="fas fa-sign-out-alt"></i> <b> LOGOUT </b></a>
                    </li>
                </ul>

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="<?php echo site_url('Con_Dengue_Fever/Home') ?>" class="brand-link">
                    <img  class="brand-image img-circle elevation-4" src="<?php echo base_url(); ?>assets/images/JPinsurance_EN.png">
                    <span class="brand-text font-weight-light" style=" font-size: 16px;"><b>JP INSURANCE BROKER</b></span>
                </a>

                <a href="#" class="brand-link">
                    <img  class="brand-image img-circle elevation-4" src="<?php echo base_url(); ?>assets/images/person-icon.png">
                    <span class="brand-text font-weight-light" style=" font-size: 16px;"><b><?php echo $FirstName; ?></b></span>
                </a>

                <!-- Sidebar -->
                <div class="section" >
                    <!--Sidebar Menu--> 
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview menu-open">
                                <a onclick="$('#loadding').show();" href="<?php echo site_url('Con_Dengue_Fever/Home') ?>" class="nav-link " style=" background-color: #922B21">
                                    <i class="fas fa-file-upload"></i>
                                    <p>
                                        <b> โหลดมูลลูกค้า g</b>
                                        <i class="right fas fa-angle-left"></i> 
                                    </p>
                                </a> 
                            </li>

                            <li class="nav-item has-treeview menu-open">
                                <a onclick="$('#loadding').show();" href="<?php echo site_url('Con_Dengue_Fever/Send_DengueFever') ?>" class="nav-link " style=" background-color: #922B21">
                                    <i class="fas fa-search"></i>
                                    <p>
                                        <b> ประวัติการส่งข้อมูล </b>
                                        <i class="right fas fa-angle-left"></i> 
                                    </p>
                                </a> 
                            </li>
                            <li class="nav-item has-treeview menu-open">
                                <a onclick="$('#loadding').show();" href="<?php echo site_url('Con_Dengue_Fever/Send_data');?>?TITLE=Province" class="nav-link " style=" background-color: #922B21">
                                   <i class="fas fa-database"></i>
                                    <p>
                                        <b> ข้อมูลจังหวัด </b>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a> 
                            </li>
                            
                            <li class="nav-item has-treeview menu-open">
                                <a onclick="$('#loadding').show();" href="<?php echo site_url('Con_Dengue_Fever/Send_data');?>?TITLE=District" class="nav-link " style=" background-color: #922B21">
                                    <i class="fas fa-database"></i>
                                    <p>
                                        <b> ข้อมูลอำเภอ/เขต </b>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a> 
                            </li>
                            <li class="nav-item has-treeview menu-open">
                                <a onclick="$('#loadding').show();" href="<?php echo site_url('Con_Dengue_Fever/Send_data');?>?TITLE=Title" class="nav-link " style=" background-color: #922B21;">
                                   <i class="fas fa-database"></i>
                                    <p>
                                        <b> ข้อมูลคำนำหน้า </b>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a> 
                            </li>
                            <li class="nav-item has-treeview menu-open">
                                <a onclick="$('#loadding').show();" href="<?php echo site_url('Con_Dengue_Fever/Send_data');?>?TITLE=Occupation" class="nav-link " style=" background-color: #922B21">
                                    <i class="fas fa-database"></i>
                                    <p>
                                        <b> ข้อมูลอาชีพ </b>
                                        <i class="right fas fa-angle-left"></i> 
                                    </p>
                                </a> 
                            </li>
                            
                            <li class="nav-item">
                                 <a href="<?php echo site_url('Con_Dengue_Fever/Send_Manual') ?>"target="_blank" class="nav-link" style=" background-color: #922B21;">
                                    <i class="fas fa-book"></i>
                                    <p>
                                        <b> คู่มือการใช้งาน </b>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a> 
                            </li>
                            
                            <li class="nav-item">
                                 <a href="<?php echo site_url('Con_Dengue_Fever/Send_APPI') ?>"target="_blank" class="nav-link" style=" background-color: #922B21;">
                                    <i class="fas fa-book"></i>
                                    <p>
                                        <b> คู่มือการใช้งาน11111 </b>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a> 
                            </li>
                            
                            <li class="nav-item">
                                 <a href="<?php echo site_url('Con_Dengue_Fever/SendTEST3') ?>"target="_blank" class="nav-link" style=" background-color: #922B21;">
                                    <i class="fas fa-book"></i>
                                    <p>
                                        <b> ทดสอบ </b>
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a> 
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="View_Home_Customer">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                            </div>      
                        </div> 
                    </div> 
                </div>

                <div id="Upload_DengueFever" name="Upload_DengueFever" class="tabcontent"> 
                    <!--<form id="Customerdata_Dengue" name="Customerdata_Dengue">-->
                    <form action="<?php echo site_url('Con_Dengue_Fever/Export_Senddata') ?>" id="Customerdata_Dengue" name="Customerdata_Dengue" method="post"> 
                        <?php $this->load->view($Show_Data_management) ?> 
                    </form>
                </div> 

            </div>    
              </div> 
        </body>
        

        
        

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body" id="mobile_view_Confirm">
                        <form class="modal-content animate" id='popup_view_Confirm'>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>  
      
        <div id="loadding" class="modal" style="display: none">
            <img src="<?php echo base_url(); ?>assets/images/loader.gif">
        </div>

        <script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>$.widget.bridge('uibutton', $.ui.button) </script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/chart.js/Chart.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/sparklines/sparkline.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/dist/js/adminlte.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/dist/js/demo.js"></script>



        
        
        <script>
         function Upload_File(){

          var  fileDengue1  =  document.getElementById('fileDengue').value;
          var form_data = new FormData();

          form_data.append('fileDengue',$('#fileDengue')[0].files[0]);
  
          if (fileDengue1 == '') { 
              swal("กรุณาเลือกไฟล์ข้อมูล", "", "warning");
           }else{
             document.getElementById('loadding').style.display = "block"; 
                    $.ajax({
                    cache: false,
                    type: 'POST',
                    url: '<?php echo site_url('Con_Dengue_Fever/Upload_File_Dengue'); ?>',//Import
                    contentType: false,
                    processData:false,
                    data: form_data,
    
             }).done(function (data) {
                document.getElementById('loadding').style.display = "none"; 
                $('#Upload_DengueFever').html(data);
              }) 
           }; 
         }

        </script>


       <script type="text/javascript">
            function Save_Dengue_Fever() {
                
                 document.getElementById("loadding").style.display = "block";
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Con_Dengue_Fever/Save_DengueFever') ?>",
                    data: $("#TrueCustomerdata_Dengue").serialize(),
                }).done(function (data) {
                     document.getElementById("loadding").style.display = "none";  
                     $('#Upload_DengueFever').html(data);
                })
               
            }
        </script>
        
        

        
<script type="text/javascript">
function DeleteUploadFileTmp() {
    
    var datas = "";
    
  swal({
            title: "",
            text: "ข้อมูลที่สามารถบันทึกได้  <?php if ($count_truedata == 0) { echo '0';} else { echo $count_truedata;} ?> รายการ <?php echo '\n' ?> ข้อมูลที่ไม่สามารถบันทึกได้ <?php if ($count_nodata == 0) { echo '0';} else { echo $count_nodata;} ?> รายการ",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-primary",
            confirmButtonText: "ลบข้อมูล!",
            cancelButtonText: "ไม่ลบข้อมูล!",
            closeOnConfirm: false,
            closeOnCancel: false

        },
  
            function (isConfirm) {
            document.getElementById("loadding").style.display = "block";  
            if (isConfirm) {
                
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Con_Dengue_Fever/Delete_TemDengueFever') ?>",
                 data:datas,
            }).done(function (data) { 
                 swal({title:"ลบข้อมูลสำเร็จ", type:"success"},
                      function() {
                         $('#Upload_DengueFever').html(data);
                       });
            })
              } else {
                  swal("ไม่ลบข้อมูล", "", "error");
             }
              document.getElementById("loadding").style.display = "none";
        });
}
</script>
 


       