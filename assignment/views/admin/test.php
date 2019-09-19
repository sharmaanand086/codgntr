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
</head>
	<body>
	<span class = "error" style='color:red;'><?php //echo $query; ?></span>
<?php 
$attributes = array("id" => "myform", "name" => "myform");
echo form_open_multipart('admin/test/',$attributes);?>
	<select name="coursename">
		<option value = "" disabled selected>Select Course</option>
		<?php
		$course = $this->db->query("SELECT * FROM lesson");
		foreach ($course->result() as $row):
		?>
		<option value="<?php echo $row->id; ?>" <?php echo set_select('coursename', $row->id); ?> ><?php echo $row->lesson; ?></option>
		<?php endforeach; 
		?>
	</select>
	<span class = "error"><?php echo form_error('coursename'); ?></span>
	<input type="text" name="contactid" placeholder="Enter Contact Id" value="<?php echo set_value('contactid'); ?>">
	<span class = "error"><?php echo form_error('contactid'); ?></span>
	<input type="submit" value="Add User" id="submit" name ="addUser">		
</form>
<script src="<?php echo base_url(); ?>js/main.js"></script>
</body>
</html>