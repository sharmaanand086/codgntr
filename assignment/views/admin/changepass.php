<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/admin/login.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/index.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin/menu.css">
   <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
   <script src="<?php echo base_url(); ?>js/latest-jquery.js" type="text/javascript"></script>
   <script src="<?php echo base_url(); ?>js/menu.js"></script>
   <script src="<?php echo base_url(); ?>js/tables.js"></script>
   	<link rel="shortcut icon" href="<?php echo base_url(); ?>images/Fevicon.png">
   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	    <!-- Custom styles for this template -->
   <script type="text/javascript">
		$(function(){
		  $('table.responsive').ngResponsiveTables({
		  	smallPaddingCharNo: 13,
	    	mediumPaddingCharNo: 18,
	    	largePaddingCharNo: 30
		  });
		});
	</script>
	<script type="text/javascript">
      $(document).ready(function () {
         $("#showHide").click(function () {
			if ($(this).hasClass("showing")) {
				$(".password").attr("type", "password");
				$(this).removeClass("showing");
			}
			else{
				$(".password").attr("type", "text");
				$(this).addClass("showing");
			}
	
		});      })
    </script>
    <title>Arfeen Khan Course</title>
</head>
<body>
<div class = "row">
	<div class = "header">Arfeen Khan Course</div>
	<?php include("admin_nav.php"); ?>
</div>	
<center>
	<span class = "error"><?php echo $query; ?></span>
</center>
<div class = "right" style = "float:none;">
	<?php 
		$attributes = array("id" => "adminform", "name" => "adminform");
		echo form_open("", $attributes);?>
		<h2>Change Password</h2>
		<label>Type Old Password</label>
	<input type="password" class = "password" name="opassword" placeholder="Enter Old Password" value="<?php echo set_value('opassword'); ?>">	
	<span class = "error"><?php echo form_error('opassword'); ?></span>
	<label> Type New Password </label>
	<input type="password" class = "password" name="password" placeholder="Enter New Password" value="<?php echo set_value('password'); ?>">	
	<span class = "error"><?php echo form_error('password'); ?></span>
	<label> Retype Password </label>
	<input type="password" class = "password" name="rpassword" placeholder="Retype New Password" value="<?php echo set_value('rpassword'); ?>">	
	<span class = "error"><?php echo form_error('rpassword'); ?></span>
	<input type="checkbox" id="showHide"><label>Show Password?</label>
	<input type="submit" value="Change Password" id="submit" name = "changePass">	
	<?php echo "<a href='".base_url()."admin/admin' class = 'error'>Go Back</a>";?>	
	</form>
</div>				
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
