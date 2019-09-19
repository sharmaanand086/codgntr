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
<div class = "right" style = "float:none;">
	<?php 
	$attributes = array("id" => "recordform", "name" => "recordform");
	echo form_open("admin/records/", $attributes);?> 
	<h2> Get Record </h2>
	<select name="coursename">
		<option value = "" disabled selected>Select Course</option>
		<?php
		foreach ($course->result() as $row):
		?>
		<option value="<?php echo $row->cid; ?>" <?php echo set_select('coursename', $row->cid); ?> ><?php echo $row->course; ?></option>
		<?php endforeach; 
		?>
	</select>
	<span class = "error"><?php echo validation_errors(); ?></span>
	<input type="submit" value="View Records" id="submit" name ="viewRecord">
	<span class = 'error'>Note : Select Any Course to Get User , Assignment And Solution Record</span>
	<span class = "error"><?php if(isset($query)) echo $query; ?></span>
	
</form>
</div>
<div class = "row">
	<div class = "container">
	<?php
	if(!isset($user))
	{
		echo "";
	}
	else 
	{
	?>
	<h2> User Record <a id="see-more-less-txt" class="moreuser" href="#">View</a></h2><h2> Assignment Record <a id="see-more-less-txt" class="moreassignment" href="#">View</a></h2><h2> Submission Record <a id="see-more-less-txt" class="moresubmission" href="#">View</a></h2>
	<div class = "user" style="display:none">
	<table class="responsive">
		<tbody>
			<tr>
				<td>ContactId</td>
				<td>Name</td>
				<td>Username</td>
				<td>Contact No</td>
				<td>Action</td>
			</tr>
			<?php
			if($user->num_rows() > 0)
			{
				foreach ($user->result() as $r1):
				$uid = $r1->uid;
				$contactid = $r1->contactid;
				$email = $r1->username;
				$name = $r1->name;
				$phone = $r1->phone;
?>
				<tr>
					<td><?php echo $contactid;?></td>
					<td><?php echo $name;?></td>
					<td><?php echo $email;?></td>
					<td><?php echo $phone;?></td>
					<td><a href="<?php echo base_url().'admin/edituser/'.$cid."_".$uid;?>" title="Edit <?php echo "ContactId $contactid";?>"><i class="fa fa-edit fa-lg"></i></a>
					<a onClick="return confirm('Are you sure to delete?');" href="<?php echo base_url().'admin/deluser/'.$cid."_".$contactid;?>" title="Delete <?php echo "Contact Id $contactid";?>"><i class="fa fa-trash fa-lg"></i></a></td>
				</tr>
<?php
				endforeach;
			}
			else
			{
				echo "<tr><td colspan = '5'> User Not Added To this Course</td></tr>";
			}
?>
		</tbody>
	</table>
	</div>
	</div>
	
	<div class = "container">
	
	<div class = "assignment" style="display:none">
	<table class="responsive">
		<tbody>
			<tr>
				<td>Assignment No</td>
				<td>Assignment Name</td>
				<td>Assignment File</td>
				<td>Upload Date</td>
				<td>Last Date</td>
				<td>Action</td>
			</tr>
			<?php
			if($assignment->num_rows() > 0)
			{
				foreach ($assignment->result() as $r2):
				
				$aid = $r2->aid;
				$fname = $r2->name;
				$file = $r2->file;
				$date1 = $r2->udate;
				$date2 = $r2->subdate;
				$date=date_create($date1);
				$subdate=date_create($date2);
					
?>
				<tr>
					<td><?php echo $aid;?></td>
					<td><?php echo $fname;?></td>
					<td><?php echo $file;?></td>
					<td><?php echo date_format($date, 'd-m-Y');?></td>
					<td><?php echo date_format($subdate, 'd-m-Y');?></td>
					<td>
						<?php if($file != 'No')
						{?>
						<a href="http://docs.google.com/viewer?url=<?php echo base_url()."uploads/".$cid."_assignment/".$file;?>" target = "_blank"><i class="fa fa-eye fa-lg"></i>
						<?php } ?>
						<a href="<?php echo base_url().'admin/editassignment/'.$cid."_".$aid;?>" title="Edit <?php echo "Assignment Id $aid";?>"><i class="fa fa-edit fa-lg"></i></a>
						<a onClick="return confirm('Are you sure to delete?');" href="<?php echo base_url().'admin/delassignment/'.$cid."_".$aid;?>" title="Delete <?php echo "Assignment Id $aid";?>"><i class="fa fa-trash fa-lg"></i></a>
					</td>
				</tr>
<?php
				endforeach;
			}
			else
			{
				echo "<tr><td colspan = '6'>Assignment not Uploaded in this Course</td></tr>";
			}
?>
		</tbody>
	</table>
	</div>
	</div>
	
	<div class = "container">
	
	<div class = "submission" style="display:none">
	<table class="responsive">
		<tbody>
			<tr>
				<td>Assignment No</td>
				<td>Contact Id</td>
				<td>Submission File</td>
				<td>Upload Date</td>
				<td>Action</td>
			</tr>
			<?php
			if($submission->num_rows() > 0)
			{
				foreach ($submission->result() as $r3):
			
				$aid = $r3->aid;
				$contactid = $r3->contactid;
				$file = $r3->file;
				$date1 = $r3->subdate;
				$date=date_create($date1);
					
?>
				<tr>
					<td><?php echo $aid;?></td>
					<td><?php echo $contactid;?></td>
					<td><?php echo $file;?></td>
					<td><?php echo date_format($date, 'd-m-Y');?></td>
					<td><a href="http://docs.google.com/viewer?url=<?php echo base_url()."uploads/".$cid."_submission/".$file;?>" target = "_blank"><i class="fa fa-eye fa-lg"></i></a>
				</tr>
<?php
			endforeach;
	}
			else
			{
				echo "<tr><td colspan = '5'>Solution not Uploaded by User</td></tr>";
			}
?>
		</tbody>
	</table>
	</div>
	</div>
	<?php 
	}
	?>
</div>
<script>
$(".moreuser").click(function(){
  var moreAndLess = $(".user").is(':visible') ? 'View' : 'Hide';
  $(this).html(moreAndLess);

  $(".user").slideToggle("slow");
});
</script>
<script>
$(".moreassignment").click(function(){
  var moreAndLess = $(".assignment").is(':visible') ? 'View' : 'Hide';
  $(this).html(moreAndLess);

  $(".assignment").slideToggle("slow");
});
</script>
<script>
$(".moresubmission").click(function(){
  var moreAndLess = $(".submission").is(':visible') ? 'View' : 'Hide';
  $(this).html(moreAndLess);

  $(".submission").slideToggle("slow");
});
</script>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
