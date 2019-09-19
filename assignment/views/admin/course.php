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
    <title>Arfeen Khan Course</title>
</head>
<body>
<div class = "row">
	<div class = "header">Arfeen Khan Course</div>
	<?php include("admin_nav.php"); ?>
</div>
<div class = "row">
	<center><span class = "error"><?php echo $query; ?></span></center>			
	<div class = "box">
		<div class="left">
			<h2>Add Course</h2>
			<?php 
				$attributes = array("id" => "courseform", "name" => "courseform");
				echo form_open("admin/course/", $attributes);?> 
				<input type="text" name="coursename" placeholder="Enter Course Name" value="<?php echo set_value('coursename'); ?>">
				<span class = "error"><?php echo form_error('coursename'); ?></span>
				<input type="submit" value="Add Course" id="submit" name ="AddCourse">
			</form>
			<div class ="clear"></div>
		</div>
		<div class="right">
		
			<h2>Courses</h2>
			<div class ="container">
				<table class="responsive">
					<tbody>
					<tr>
						<td>No</td>
						<td>Course Name</td>
						<td>Action</td>
					</tr>
					<?php
					if($course->num_rows() > 0)
					{
						foreach ($course->result() as $r1):
					?>
					<tr>
						<td><?php echo $r1->cid;?></td>
						<td><?php echo $r1->course;?></td>
						<td>
							<a href="<?php echo base_url().'admin/editcourse/'.$r1->cid;?>" title="Edit <?php echo "Course ".$r1->course;?>"><i class="fa fa-edit fa-lg"></i></a>
							<a onClick="return confirm('Are you sure to delete?');" href="<?php echo base_url().'admin/delcourse/'.$r1->cid;?>" title="Delete <?php echo "Course ".$r1->course;?>"><i class="fa fa-trash fa-lg"></i></a>
						
						</td>
					</tr>
					<?php
					endforeach;
					}
					else
					{
						echo "<tr><td colspan = '3'>No Course Found</td></tr>";
					}
					?>
				</tbody>
				</table>
			</div>
		</div>	
		<div class ="clear"></div>
	</div>
</div>
<script src="js/main.js"></script>

</body>
</html>
