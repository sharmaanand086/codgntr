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
	<script language="javascript">
function DoSubmit()
{
	//document.myform.submit.disabled = true;
	document.myform.submit.value = "Uplolading, Please Wait...";
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
		<h2> Add Assignment</h2>
		<?php 
		$attributes = array("id" => "myform", "name" => "myform",'onsubmit'=>"DoSubmit();");
		echo form_open_multipart('admin/assignment/',$attributes);?>
		<select name="coursename">
			<option value = "" disabled selected>Select Course</option>
			<?php
			foreach ($course->result() as $row):
			?>
			<option value="<?php echo $row->cid; ?>" <?php echo set_select('coursename', $row->cid); ?> ><?php echo $row->course; ?></option>
			<?php endforeach; 
			?>
		</select>
		<span class = "error"><?php echo form_error('coursename'); ?></span>
		<!--<input type="text" name="groupid" placeholder="Enter Group Id" value="<?php echo set_value('groupid'); ?>">
		<span class = "error"><?php echo form_error('groupid'); ?></span>-->
		<input type="text" name="fname" placeholder="Enter Assignment Name" value="<?php echo set_value('fname'); ?>">
		<span class = "error"><?php echo form_error('fname'); ?></span>
		<input type="file" name="file" value="<?php echo set_value('file'); ?>">
		<span class = "error"><?php echo form_error('file'); ?></span>
		<input type="text" id="datepicker" name="subdate" placeholder="Enter Submission Date" value="<?php echo set_value('subdate'); ?>">
		<span class = "error"><?php echo form_error('subdate'); ?></span>
		<input type="submit" value="Upload Assignment" id="submit" name ="addAssignment">		
		</form>
		</div>
		<div class = "clear"></div>
	</div>
	<div class = "clear"></div>
</div>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>
