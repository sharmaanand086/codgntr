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
   	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   	<link rel="shortcut icon" href="<?php echo base_url(); ?>images/Fevicon.png">
	<script>
		$(function() {
		//$( "#datepicker" ).datepicker();
		$( "#datepicker" ).datepicker({
			minDate: <?php echo date("m/d/Y"); ?>
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
	<script language="javascript">
function DoSubmit()
{
	//document.myform.submit.disabled = true;
	document.myform.submit.value = "Updating, Please Wait...";
	form.submit();
}
</script>
 <title>Arfeen Khan Course</title>
</head>
<body>
<div class = "row">
	<div class = "header">Arfeen Khan Course</div>
	<?php include("admin_nav.php"); ?>
</div>	
<div class = "row">
	<center>
		<span class = "error"><?php echo $query; ?></span>
	</center>			
	<div class = "box">
		<div class="left" style = "float:none;">
		<?php 
		foreach ($user->result() as $r1):
		echo "<h2> Edit User ContactId : ".$r1->contactid."</h2>";
		$attributes = array("id" => "myform", "name" => "myform",'onsubmit'=>"DoSubmit();");
		echo form_open_multipart('',$attributes);?>
		<input type="text" name="name" value="<?php echo $r1->name; ?>" placeholder="Enter Name">
		<span class = "error"><?php echo form_error('name'); ?></span>
		<input type="email" name="email" value="<?php echo $r1->username; ?>" placeholder="Enter Email id">
		<span class = "error"><?php echo form_error('email'); ?></span>
		<input type="text" name="phone" value="<?php echo $r1->phone; ?>" placeholder="Enter Phone No">
		<span class = "error"><?php echo form_error('phone'); ?></span>
		<input type="password" name="password" class = "password" value="<?php echo $r1->password; ?>" placeholder="Enter Password">
		<span class = "error"><?php echo form_error('password'); ?></span>
		<input type="checkbox" id="showHide"><label>Show Password?</label>

		<input type="submit" value="Update User" id="submit" name ="updateUser">		
		</form>
		<?php endforeach; ?>
		</div>
		<div class = "clear"></div>
	</div>
	<div class = "clear"></div>
</div>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
