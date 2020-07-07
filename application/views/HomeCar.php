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
             font-size: 14px;
        }
        </style>

    </head>

    <div id="loadding" class="modal" style="display: none">
        <img src="<?php echo base_url();?>assets/images/ loader.gif">
    </div>
    
  
    
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
                        <a href="<?php echo site_url('HomeInsurance/Home') ?>" class="nav-link" style="font-size: 14px"><b> HOME </b></a>
                    </li>

                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url('HomeInsurance/Logout') ?>" style="color: red;"><i class="fas fa-sign-out-alt"></i> <b>LOGOUT</b></a>
                    </li>
                </ul>
                
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <a href="<?php echo site_url('HomeInsurance/Home') ?>" class="brand-link">
                    <img  class="brand-image img-circle elevation-4" src="<?php echo base_url(); ?>assets/images/icon_jib.png">
                    <span class="brand-text font-weight-light" style=" font-size: 16px;"><b>JAYMART INSURANCE</b></span>
                </a>
                
                <a href="#" class="brand-link">
                    <img  class="brand-image img-circle elevation-4" src="<?php echo base_url(); ?>assets/images/person-icon.png">
                    <span class="brand-text font-weight-light" style=" font-size: 16px;"><b><?php echo $FirstName; ?></b></span>
                </a>
                <!-- Sidebar user panel (optional) -->
<!--                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img class="brand-image img-circle elevation-4" src="<?php echo base_url(); ?>assets/images/person-icon.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $FirstName; ?></a>
                    </div>
                </div>-->

                <!-- Sidebar -->
                <div class="section" >
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->
                            <li class="nav-item has-treeview menu-open">
                                <a href="<?php echo site_url('HomeInsurance/Home') ?>" class="nav-link active">
                                    <i class="nav-icon fas fa-search-plus"></i>
                                    <p>
                                        เช็คเบี้ยประกัน
                                        <!--<i class="right fas fa-angle-left"></i> -->
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
                            
                     
                               <?php if($DEPARTMENT == "DS02"){ ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="ADDLead()">
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

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" id="View_Home_Customer">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <!--<h1 class="m-0 text-dark"> เลือกรายการทำงาน</h1>-->
                                <!--<h4 class="m-0 text-dark">USERNAME : <?php echo $FirstName; ?></h4>-->
                            </div>      
                        </div> 
                    </div> 
                </div>
                <!-- /.content-header -->
                
                <!-- Main content -->
                <section class="content" id="Comtent_View">
                    <div class="container-fluid">
                        
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h6>เช็คเบี้ยประกัน</h6>
                                        <!--<p>ประกันภัยรถยนต์</p>-->
                                    </div>
                                    <div class="icon" style=" padding-top: 3%;">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?php echo site_url('HomeInsurance/Home') ?>" class="small-box-footer" id="toggle"style="font-size: 80%"  >เช็คเบี้ยประกัน <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h6>ตรวจสอบการซื้อ (<?php echo $CoutCheck_Sell ?>)</h6>
                                        <!--<p>ประกันภัยรถยนต์</p>-->
                                    </div>
                                    <div class="icon"style=" padding-top: 3%;">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="<?php echo site_url('Check_buy/Home') ?>" class="small-box-footer" style="font-size: 80%"  > ตรวจสอบการซื้อประกัน <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h6>สถานะกรมธรรม์</h6>
                                        <!--<p>ประกันภัย</p>-->
                                    </div>
                                    <div class="icon"style=" padding-top: 3%;">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="<?php echo site_url('HomeInsurance/Policy_controllers') ?>" class="small-box-footer"  style="font-size: 80%">ติดตามสถานะกรมธรรม์ <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h6>ค่าคอมมิชชั่น</h6>
                                        <!--<p>ค่าคแมมิทชั่น</p>-->
                                    </div>
                                    <div class="icon"style=" padding-top: 3%;">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                     <a href="<?php echo site_url('HomeInsurance/Main_Commission') ?>" class="small-box-footer"  style="font-size: 80%"> ตรวจค่าแนะนำสมาชิก <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class=" alert alert-success alert-dismissable" id="passwordsNoMatchRegister" style="display:none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <strong>บันทึกสำเร็จ ! </strong>
                        </div>
                        
                        <div id="Check_insurance" name="Check_insurance" class="tabcontent">      
                            <?php $this->load->view('Checkcarinsurance/Customer_data'); ?>
                        </div>

                    </div>
                </section>
            </div>
        </div>    
    </body>
    
    <div id="mobile_view_Confirm" name="mobile_view_Confirm" class="modal">
        <form class="modal-content animate" id='popup_view_Confirm' style="width:70%; margin-top: 2%; margin-left: 15%;">

        </form>
    </div>
    
    
<!--    <div id="management_view" name="management_view" class="modal">
        <form class="modal-content animate" id='management_date_form' name="" style="width:70%; margin-top: 2%; margin-left: 15%;">

        </form>
    </div>-->



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
              function CustomeView() {
                document.getElementById("loadding").style.display = "block";
                var datas = "";
                 $.ajax({
                 type: "POST",
                 url: "<?php echo site_url('HomeInsurance/Main_Customer') ?>",
                 data: datas,
                }).done(function (data) {
                    document.getElementById("loadding").style.display = "none";
                    $('#Check_insurance').html(data); 
                 })
               }
        </script>

        <script>
            function View_quotation() {
                document.getElementById("loadding").style.display = "block";
                var datas = "";
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('HomeInsurance/Main_quotation') ?>",
                    data: datas,
                }).done(function (data) {
                    document.getElementById("loadding").style.display = "none";
                    $('#Check_insurance').html(data);
                })

            }
        </script>

        <script>
            function View_Policy() {
                document.getElementById("loadding").style.display = "block";
                var datas = "";
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('HomeInsurance/Policy_controllers') ?>",
                    data: datas,
                }).done(function (data) {
                     document.getElementById("loadding").style.display = "none";
                    $('#Check_insurance').html(data);
                })

            }
        </script>

        <script>
            function View_Commission() {
                document.getElementById("loadding").style.display = "block"; 
                var datas = "";
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('HomeInsurance/Commission_controllers') ?>",
                    data: datas,
                }).done(function (data) {
                     document.getElementById("loadding").style.display = "none";
                    $('#Check_insurance').html(data);
                })

            }
        </script>
        
        <!-- loading -->
<!--<div id="loadding"><img src="<?php echo base_url(); ?>assets/images/loader.gif"></div>-->

<!--script loading-->
<script>
    document.getElementById('loadding').style.display = "none";
</script>

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
       })
    }
</script>
