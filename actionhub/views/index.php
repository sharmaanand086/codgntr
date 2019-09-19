<!DOCTYPE html>
<html lang="en">
<head>
  <title>Action Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/action.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="mylanding">     
    <div class="logo">
         <img style="" src="<?=base_url('assets/images/Ak_logo_BLACK.png');?>">
    </div>
         <div class="heading" style="    padding-top: 12%;"><h1>Action Hub</h1></div>
         <div class="paragraph"><p>This is where all the action happens. It’s a place where you can take<br>
every possible action you need to make a massive transformation happen,<br>
in your business and yourself! Access all Action Tools in one place.<br></p></div>
         <button class="myaction">Let the action begin</button>
            
</div>
<script>
  $(document).ready(function(){
    $('.myaction').click(function(){
      window.location.href = "welcome/login";
 });
  });


</script>
</body>
</html>
