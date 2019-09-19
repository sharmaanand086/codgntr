<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"  crossorigin="anonymous">
<link rel="stylesheet" href="https://arfeenkhan.com/actionhub/assets/css/action.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
</head>
<body>


<div class="mylanding2">    
<div class="logo">
         <img style="" src="https://arfeenkhan.com/actionhub/assets/images/Ak_logo_BLACK.png">
         </div>
         <div class="heading2" style="padding-top: 12%;"><h1>Action Hub</h1></div>
       
         <form action="setchangepassword" method="post">
             <div class="formbody">
                <div class="form-group">
                 <input type="password" class="form-control inp" name="password" id="password" placeholder="Enter password" required/>
                </div>
                <div class="form-group">
                 <input type="password" class="form-control inp" name="vpassword" placeholder="Confirm password" id="confirm_password"  required/>
                </div>
                <div>
                   <?php
                    if($this->session->flashdata('success')){
                        echo $this->session->flashdata('success');
                    }
                    ?> 
                </div>
                 
                <div class="form-group">        
                <button type="submit" style="font-weight: 900;" class="btn btn-default enterbut">Submit</button>
                </div>
               
            <div>
        </form> 
</div>

<script>
    var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
</body>
</html>
