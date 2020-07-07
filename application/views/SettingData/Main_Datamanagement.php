<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>JAYMART INSURANCE BROKER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/jmt-icon.png" type="image/gif">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <link href="<?php echo base_url(); ?>AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/dist/css/adminlte.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/dist/css/adminlte.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>AdminLTE/plugins/summernote/summernote-bs4.css" rel="stylesheet" type="text/css">
        <title>JAYMART INSURANCECAR</title>
    </head>
    
    <style>
         #fontp{
             font-size: 14px;
        }
        
    </style>
    
    
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <nav class="main-header navbar navbar-expand navbar-white navbar-light">

                <ul class="navbar-nav" >
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item ">
                        <a href="<?php echo site_url('HomeInsurance/Home') ?>" class="nav-link" style="font-size: 14px"><b> HOME </b></a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('HomeInsurance/Logout') ?>" style="color: red;"><i class="fas fa-sign-out-alt"></i> <b>LOGOUT</b></a>
                    </li>
                </ul>
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="<?php echo site_url('HomeInsurance/Home') ?>" class="brand-link">
                    <img  class="brand-image img-circle elevation-4" src="<?php echo base_url(); ?>assets/images/icon_jib.png">
                    <span class="brand-text font-weight-light" style=" font-size: 16px;"><b>JAYMART INSURANCE</b></span>
                </a>

                <a href="#" class="brand-link">
                    <img  class="brand-image img-circle elevation-4" src="<?php echo base_url(); ?>assets/images/person-icon.png">
                    <span class="brand-text font-weight-light" style=" font-size: 16px;"><b><?php echo $FirstName; ?></b></span>
                </a>

                <div class="section" >

                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item has-treeview menu-open">
                                <a href="<?php echo site_url('HomeInsurance/Home') ?>" class="nav-link active">
                                    <i class="nav-icon fas fa-search-plus"></i>
                                    <p>
                                        เช็คเบี้ยประกัน
                                    </p>
                                </a> 
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url('Preview_controllers/Manual_PDF?'); ?>statuspdf=1" target="_blank" class="nav-link">
                                    <i class="nav-icon fas fal fa-book"></i>
                                    <p>
                                        คู่มือการใช้งาน
                                        <span class="right badge badge-danger">คู่มือ</span>
                                    </p>
                                </a>
                            </li>
                            <!--onclick="ADDLead()"-->
                          <?php if($DEPARTMENT == "DS02"){ ?>
                                <li class="nav-item"> 
                                    <a href="<?php echo site_url('Management_Data/AddLead') ?>" class="nav-link">
                                       <i class="nav-icon far fa-address-book"></i>
                                       <p>
                                          เพิ่มข้อมูลลูกค้า
                                      </p>
                                  </a> 
                                </li>
                            <?php }else{ ?>

                            <?php } ?>
                        </ul>

                 <?php if($DEPARTMENT == "DS02" && $LevelEmp == "ADMIN") { ?>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-copy"></i>
                                    <p>
                                        การจัดการข้อมูล
                                        <i class="fas fa-angle-left right"></i>
                                        <span class="badge badge-info right">4</span>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                   <li class="nav-item">
                                        <a href="<?php echo site_url('Management_Data/Management_CarInformation') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p id="fontp"> จัดการข้อมูลตารางรถ </p>
                                        </a>
                                   </li>
                                   <li class="nav-item">
                                        <a href="<?php echo site_url('Management_Data/Management_Package') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p id="fontp"> จัดการข้อมูลตารางแพ็คเกจ </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('Management_Data/Management_Car_Coverage') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p id="fontp"> จัดการข้อมูลตารางความคุ้มครอง </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo site_url('Management_Data/Main_middleCarInsurance') ?>" class="nav-link">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p id="fontp"> จัดการข้อมูลตารางกลาง </p>
                                        </a>
                                    </li>
                                     <li class="nav-item">
                                            <a href="<?php echo site_url('Preview_controllers/Manual_PDF?'); ?>statuspdf=2" target="_blank" class="nav-link">
                                                <i class="nav-icon fas fal fa-book"></i>
                                                <p  id="fontp">
                                                    คู่มือการใช้งาน Admin
                                                    <span class="right badge badge-danger">คู่มือ</span>
                                                </p>
                                            </a>
                                    </li>
                                  
                                </ul>
                            </li>
                        </ul>
                    <?php } else {?>
                           
                    <?php } ?>
                    </nav>
                </div>
            </aside>
        </div>
        
       

        <div id="Check_insurance" name="Check_insurance" class="tabcontent"> 
            <?php $this->load->view($Show_Data_management) ?>
        </div> 




        <script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script>$.widget.bridge('uibutton', $.ui.button)</script>
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

    </body>
</html>



<script type="text/javascript">
    function ADDLead(){
        var datas = "";
        document.getElementById("loadding").style.display = "block";
       $.ajax({
            type: "POST",
            url: "<?php echo site_url('AddLead/index') ?>",
            data: datas,
        }).done(function (data) {
           document.getElementById("loadding").style.display = "none";
           $('#Check_insurance').html(data);
//           location.href="";
       })
    }
</script>