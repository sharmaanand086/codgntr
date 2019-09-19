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
<style>
h2{padding:2%; font-size:20px;}
P
{
	padding: 1% 2%;
	font-size:18px;
	
}
</style>
<body>
<div class = "row">
	<div class = "header">Arfeen Khan Course</div>
	<?php include("admin_nav.php"); ?>
</div>	
<div class = "row">
	<div class = "table-box">
		<h2>Welcome to Arfeen Khan Course Admin Panel </h2>
			<div class="table-lft">
			<?php echo "<p><i class='fa fa-arrow-right'></i><a href='".base_url()."admin/course'> View Course</a></p>";?>
			<?php echo "<p><i class='fa fa-arrow-right'></i><a href='".base_url()."admin/assignment'> Add Assignments</a></p>";?>
			<?php echo "<p><i class='fa fa-arrow-right'></i><a href='".base_url()."admin/records'> View Records </a></p>";?>
			</div>
			<div class="table-rht">
			<?php echo "<p><i class='fa fa-arrow-right'></i><a href='".base_url()."admin/user'> Add Users</a></p>";?>
			<?php echo "<p><i class='fa fa-arrow-right'></i><a href='".base_url()."admin/admin'> Admin's</a></p>";?>
			<?php echo "<p><i class='fa fa-arrow-right'></i><a href='".base_url()."admin/logout'> Logout</a></p>";?>
			</div>
			<div class="clear"></div>
	</div>
</div>
<script src="<?php echo base_url(); ?>js/main.js"></script>

</body>
</html>
