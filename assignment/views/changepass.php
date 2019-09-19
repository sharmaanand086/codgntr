<!DOCTYPE html> 
<html>
<head>
	<title><?php echo $_SESSION['course']; ?></title>
	<!-----Including CSS for different screen sizes----->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/index.css">
	<link rel="shortcut icon" href="<?php echo base_url(); ?>images/Fevicon.png">
	<script src="<?php echo base_url();?>js/latest-jquery.js" type="text/javascript"></script>
	 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	    <!-- Custom styles for this template -->
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
</head>
<body>
<div id="envelope">
<header>
    <h2>Change Password</h2>
</header>
<hr>
<?php 
$attributes = array("id" => "changeform", "name" => "changeform");
echo form_open("", $attributes);?> 
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
	<?php echo "<a href='".base_url()."user/profile' class = 'error'>Go Back</a>";?>
</form>
<center>
	<?php echo form_close(); ?>
   <span class = "error"><?php echo $query; ?></span>
</center>
</div>
</body>
</html>