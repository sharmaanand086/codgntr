<!DOCTYPE html>
<html lang="en">
<head>
  <title>Action Hub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/action.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="mylanding2">    
<div class="logo">
         <img style="" src="<?=base_url('assets/images/Ak_logo_BLACK.png');?>">
         </div>
         <div class="heading2" style="    padding-top: 12%;"><h1>Action Hub</h1></div>
       
         <form action="TermsandCondition" method="post">
             <div class="formbody">
                <div class="form-group">
                <input type="email" class="form-control inp" id="email" placeholder="Username" name="email">
                </div>
                <div class="form-group">
                <input type="password" class="form-control inp" id="pwd" placeholder="Password" name="pwd">
                </div>
                <div class="form-group">        
                <div class="checkbox">
                <input id="checkbox1" type="checkbox">
                            <label for="checkbox1" style="padding-left: 25px; font-family:'Montserrat-Regular';letter-spacing: 1px;color: #5d5d5d;">
                                Keep me signed in
                            </label>
                </div>
                <a href="" class="fp">Forgot password?</a>
                </div>
                <div class="form-group">        
                <button type="submit" class="btn btn-default enterbut">Enter</button>
                </div>
            <div>
        </form> 

</body>
</html>
