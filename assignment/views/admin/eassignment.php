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
		foreach ($assignment->result() as $r1):
		echo "<h2> Edit Assignment No : ".$r1->aid."</h2>";
		$attributes = array("id" => "myform", "name" => "myform",'onsubmit'=>"DoSubmit();");
		echo form_open_multipart('',$attributes);?>
		<input type="text" name="fname" placeholder="Enter Assignment Name" value="<?php echo $r1->name; ?>">
		<span class = "error"><?php echo form_error('fname'); ?></span>
		<input type="file" name="file">
		<input type="hidden" name="file1" value = "<?php echo $r1->file; ?>">
		<span class = "error">File Attached : <?php echo $r1->file; ?></span>
		<input type="text" id="datepicker" name="subdate" placeholder="Enter Submission Date" value="<?php echo date_format(date_create($r1->subdate), 'd-m-Y'); ?>">
		<span class = "error"><?php echo form_error('subdate'); ?></span>
		<input type="submit" value="Update Assignment" id="submit" name ="updateAssignment">		
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
