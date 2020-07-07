<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="tis-620">
        <title>LOGIN USERNAME</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">  
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/jmt-icon.png" type="image/gif"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/test/fornts.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>dist/css/stylelogin.css">
        <link href="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css"> 
        <script src="<?php echo base_url(); ?>assets/sweetalert/dist/sweetalert.min.js"></script> 
        <script src="<?php echo base_url(); ?>assets/sweetalert/jquery.min.js"></script> 
        <link href="<?php echo base_url(); ?>assets/css/Login/bootstrap4.0.0.min.css" rel="stylesheet" id="bootstrap-css">

    </head>
    <body class="align" onload="myFunction()">
        <script type="text/javascript">
            swal({title: "กรุณาเข้าระบบใหม่", type: "error"}, function () {
                window.history.back();
                window.location.href = "<?php echo site_url('HomeInsurance/Logout'); ?>";
            });
        </script>
    </body>
</html>