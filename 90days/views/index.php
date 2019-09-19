<!DOCTYPE html>
<html lang="en">
<head>
  <title>90Days</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php  echo base_url(); ?>/assets/css/main.css">
  <script src="<?php  echo base_url(); ?>/assets/js/jquery.min.js"></script>
  <script src="<?php  echo base_url(); ?>/assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
<div class="col-md-6 col-xs-12">
<div class="left">
  <a href="calender.php">
<img src="<?php  echo base_url(); ?>/assets/images/left.png" class="leftimg" />
</a></div>

</div>
<div class="col-md-6 col-xs-12">

<div class="right">
<img src="<?php  echo base_url(); ?>/assets/images/right.png" class="rightimg" />
</div>
</div>
  </div>
</div>
<div class="forms">
	<form action="<?php  echo base_url(); ?>welcome/calenders">
     <input type="text" placeholder="Name" required/><br>
      <input type="text" placeholder="Email" required/><br>
       <input type="text" placeholder="Contact" required/><br>
       <button class="enter">Enter</button>
	</form>
  <p class="log">Already Registered? <a href="<?php  echo base_url(); ?>welcome/login" style="font-weight: bold;" >Login Here</a></p>
</div>
<hr>

</body>
</html> 