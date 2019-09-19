<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: https://www.arfeenkhan.com/stfaction/index.php/AdminController/admin_login_process");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login </title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/static/css/bootstrap.css'); ?>">
 <style>
     .heading{
	text-align: center;

}
.ctrl{
	    width: 75%;
}
.fieldset{
	width: 400px;
    margin: auto;
}

 </style>
</head>
<body>
    
<div class="container">
<div class="alert alert-dismissible alert-default">  
  <h4 class="alert-heading heading">Welcome</h4>  
</div>
 <div class="jumbotron">
<?php echo form_open('AdminController/admin_login_process'); ?>
<?php
echo "<div class='error_msg' style='text-align: center;    color: red;    margin-left: -100px;'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<?php
if (isset($message_display)) {
echo "<div class='message'  style='text-align: center;    color: green;    margin-left: -100px;'>";
echo $message_display;
echo "</div>";
}
?>
  <fieldset class="fieldset">
    <legend>Login</legend>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" name="username" class="form-control  ctrl" id="name" aria-describedby="emailHelp" placeholder="Enter email" required>
       
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name="password" class="form-control ctrl" id="password" placeholder="Password" required>
    </div>
     <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
<?php echo form_close(); ?>
</div>
</div>
</body>
</html>