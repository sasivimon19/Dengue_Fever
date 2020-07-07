<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	 <!-- STYLE -->
	<link rel="stylesheet" href="<?php echo base_url()."assets/";?>bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()."assets/";?>fontawesome/css/all.min.css">


	<!-- SCRIPT -->
	<script src="<?php echo base_url()."assets/";?>bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()."assets/";?>fontawesome/js/all.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	


	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	
	#body {
		margin: 0 15px 0 15px;
		 font-family: 'Sarabun', sans-serif;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		 
		 
	}
	</style>
</head>
<body>

<div id="container">
	<input type="text" name="" class="form-control"><i class="fa fa-id-card" aria-hidden="true"></i>
	<button type="button" class="btn btn-info" onclick="O()">ll</button>
</div>
<script type="text/javascript">
	
	function O(){
		var datas="G="+"ttttt";
		$.ajax({
			type:"POST",
			url:"<?php echo site_url('Welcome/index')?>",
			data:datas
		}).done(function(data){	
			$('#container').html(data);
			alert("TTt");
	
		}) 	 
	}
</script>
</body>
</html>