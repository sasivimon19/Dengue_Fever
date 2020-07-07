<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>LOGIN USERNAME CONFORM</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/jmt-icon.png" type="image/gif"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/test/fornts.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/stylelogin.css">
        <link href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> 
        <script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/sweetalert/jquery.min.js"></script> 
        <link href="<?php echo base_url(); ?>assets/css/Login/bootstrap4.0.0.min.css" rel="stylesheet" id="bootstrap-css">
        <!--<script src="<?php echo base_url(); ?>assets/css/Login/bootstrap4.0.0.min.js"></script>-->
        <!--<script src="<?php echo base_url(); ?>assets/css/Login/jquery-1.11.1.min.js"></script>-->
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->


        <style>
            body {
                margin:0;
                /*color:#edf3ff;*/
                background:#c8c8c8;
                /*padding:0%;*/
                background:url('<?php echo base_url(); ?>assets/images/material-design-4k-2048x1152.jpg')fixed;
                background-size: cover;
                font:600 16px/18px 'Open Sans',sans-serif;
            }
        </style>
    </head>


    <body>
        <div id="Chack_IDEmp"></div>
        <script>
            swal({
                title: "ยืนยันตัวตน",
                text: "กรุณากรอก Password เพื่อยืนยันตัวตน",
                type: "input",
                showCancelButton: true,
                closeOnConfirm: false,
                inputPlaceholder: "Password"
            }, function (inputValue) {
                if (inputValue == false)
                    window.history.back();
                if (inputValue == "") {
                    swal.showInputError("กรุณากรอก Password ก่อนถึงจะเข้าระบบใหม่ได้!");
                    return false
                } else {
                    var inputValue = inputValue;
                    var datas = "inputValue=" + inputValue;
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('HomeInsurance/CONFORM_ACTIVE') ?>",
                        data: datas,
                    }).done(function (data) {
                        $('#Chack_IDEmp').html(data);
                    })
                }
            });

        </script>
    </body>
</html>