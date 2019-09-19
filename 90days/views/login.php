<!DOCTYPE html>
<html lang="en">
<head>
  <title>90Days</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/main.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>assets/css/responsive.css">
  <script src="<?php  echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php  echo base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<div class="top-section">
<div class="container">

<div class="top-logo">
<div class="left">
<a href="calender.php">
<img src="<?php  echo base_url(); ?>assets/images/left.png" class="leftimg" />
</a></div>

<div class="right">
<img src="<?php  echo base_url(); ?>assets/images/right.png" class="rightimg" />
</div>
</div>

</div></div>
<div class="forms">
	<form action="<?php  echo base_url(); ?>welcome/calenders" method="post">
      <input type="text" name="email" placeholder="Email" required/><br>
       <input type="password" name="password" placeholder="Password" required/><br>
       <button class="enter">Login</button>
	</form>
	<span class = "error"> <?php echo $this->session->flashdata('usermsg');?></span>
  <!--<p class="log">Not Registered? <a href="<?php  echo base_url(); ?>" style="font-weight: bold;" >Register Here</a></p>-->
</div>
<hr>

</body>
</html> 