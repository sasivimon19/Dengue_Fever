<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>LetterTSS</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<!-- STYLE -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/";?>bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/";?>fontawesome/css/all.min.css">
	<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- SCRIPT -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php echo base_url()."assets/";?>bootstrap/bootstrap.min.js"></script>
	
	
<style type="text/css">
body{
	/*background-color: #f8f8f8;*/
	font-family: 'Sarabun', sans-serif;
	

}.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: #383534;
  color: white;
  text-align: center;
}.navbar {
   margin-bottom: 0;
   border-radius: 0;
}#search{
  position: absolute;
  right: 0;
}* {
  box-sizing: border-box;
}.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }
}#box{
	box-shadow: 3px 3px 3px 3px rgba(10, 10, 10, 0.1);
	border:0px solid;
	padding: 15px;
	background-color:#FFF;
	border-radius: 5px;
	width: 45%;
}#loaddingA2{
    position: fixed;
    left: 0px;
    top: 130px;
    width: 100%;
    height: 100%;
	margin-left:35%;
	margin-right:0%;
	
  }
</style>
</head>

<body>
<!-- <body style="background-image: url('assets/image/bg.png');"> -->
	<!-- <div id="loaddingA2" class="modal" style="display:none;">
		<img src="<?php echo base_url();?>assets/image/loadding2.gif">
	</div> -->

	<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #383534">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>
				<a class="navbar-brand" href="#" style="color: #FFF">Letter TSS</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="<?php echo site_url('LetterTSS/Home') ?>">หน้าแรก</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
				<li style="color:#FFF;margin-top:15px;">( <?php echo $NameEmp; ?> )</li> 
				<li  class="" style="background-color: #9a2b2b; ">
					<a href="<?php echo site_url('') ?>" style="color: #FFF"> LOGOUT <i class="fa fa-sign-out" aria-hidden="true"></i></a>
				</li>
				
			</ul>
			</div>
		</div>
	</nav>

	
	
	<div  id= "ShowBody" class="container-fluid bg-3 text-center" style="padding-top: 70px;">    
		<?php $this->load->view($view); ?>
	</div>

	<footer class="footer">
		<p>@บริษัท เจเอ็มที เน็ทเวอร์ค เซอร์วิสเซ็ส จำกัด (มหาชน)</p>
	</footer>



	


</body>
</html>