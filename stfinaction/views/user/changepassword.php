<?php 
if (isset($this->session->userdata['logged_in'])) {
$username = ($this->session->userdata['logged_in']['username']);
 
}else {
header("location: https://arfeenkhan.com/stfaction/welcome/");
}
?>

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
<link rel="stylesheet" href="https://www.arfeenkhan.com/stfaction/assets/user/css/changepass.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<style>
::placeholder {
  color: #fff;
  
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color: #fff;
}

::-ms-input-placeholder { /* Microsoft Edge */
 color: #fff;
}
</style>
</head>
<body>


<div class="mylanding2" style=" background-image: url(https://www.arfeenkhan.com/stfaction/assets/user/images/Bg.png);background-position:center;min-height: 100vh;display:flex;align-items:center;">    
<div class="pass-content" style="width:100%;">
        
         <div class="heading2" style=""><h1 style="color: #ceca9c;font-family: 'BebasNeueBold';">Stf Action  </h1></div>
       
         <form action="setchangepassword" method="post">
             <div class="formbody">
                <div class="form-group">
                 <input type="password" class="form-control inp" name="password" id="password" placeholder="Enter password" style="background-color:#f6f7dff5; padding:12px; border-radius:3px;" required/>
                </div>
                <div class="form-group">
                 <input type="password" class="form-control inp" name="vpassword" placeholder="Confirm password" id="confirm_password" style="background-color:#f6f7dff5; padding:12px; border-radius:3px;" required/>
                 <input type="hidden" name="username" value="<?php echo  $username; ?>">
                </div>
                <div>
                   <?php
                    if($this->session->flashdata('success')){
                        echo $this->session->flashdata('success');
                    }
                    ?> 
                </div>
                 
                <div class="form-group">        
                <button type="submit" style="font-weight: 900;" class="btn  enterbut">Submit</button>
                </div>
               
            <div>
        </form> 
        </div>
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
