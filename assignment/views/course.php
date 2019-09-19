<!doctype html>
<html lang=''>
<head>
	<meta charset='utf-8'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/index.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/menu.css">
	<script src="<?php echo base_url(); ?>js/latest-jquery.js" type="text/javascript"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>js/menu.js"></script>
	<script src="<?php echo base_url(); ?>js/tables.js"></script>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>images/Fevicon.png">
<title> Arfeen Khan Courses</title>
</head>
<body>
<div class = "row">
	<div class = "header">Welcome To Course Access Panel</div>
</div>
<div class = "row">
	
</div>
<div class = "coursemenu">
<h2>Choose Your Course</h2>
	<ol>
	<?php
		foreach ($query_result->result() as $row):
		echo "<li><a href='".base_url()."user/login/".$row->cid."'>".$row->course."</a></li>";
		endforeach; 
	?>
	</ol>
</div>
</body>
</html>