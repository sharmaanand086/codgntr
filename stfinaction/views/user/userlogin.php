<?php
if (isset($this->session->userdata['logged_in'])) {

header("location: https://www.arfeenkhan.com/stfaction/Welcome/userspage");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Speak to A Fortune</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/user/css/login.css'); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body> 
    <div class="login-container">
        <div class="col-md-6 col-sm-6 login-left">
            <div class="login-content">
                <p class="login-title">speak to a fortune <br><span style="color:#fff">in action</span> </p>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 login-right">
            <?php echo form_open('Welcome/userdashboard'); ?>

            <div class="login-form login-content">
               <?php echo form_open('Welcome/userdashboard'); ?>
                    <fieldset class="fieldset">
                        <legend>Login</legend>
                            <div class="form-group">
                              <!-- <label for="exampleInputEmail1">Email address</label> -->
                              <input type="email" name="username" class="form-control  ctrl" id="name" aria-describedby="emailHelp" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                              <!-- <label for="exampleInputPassword1">Password</label> -->
                              <input type="password" name="password" class="form-control ctrl" id="password" placeholder="Password" required>
                            </div>
                             <button type="submit" class="sub-btn">Submit</button>
                             <?php
echo "<div class='error_msg' style='text-align: center;    color: red;        padding: 4% 0;'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<?php
if (isset($message_display)) {
//echo "<div class='message'  style='text-align: center;    color: green;        padding: 4% 0;'>";
//echo $message_display;
//echo "</div>";
}

//   $message_approved= $this->session->flashdata('message_approved');
//                 if (isset($message_approved)) {
//                 echo "<div class='message'  style='text-align: center;    color: green;      padding: 4% 0;'>";
//                 echo $message_approved;
//                 echo "</div>";
//                 }
?>
                    </fieldset>
             <?php echo form_close(); ?>
            </div>
        </div>
    </div>
    
    <!-- modal for requests-->
    <div class="modal in" id="myModal" role="dialog" style="display: none;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
   
        <div class="modal-body" style="text-align:center">
                               
                                    <?php
                                    
                 $message_approved= $this->session->flashdata('message_approved');
                if (isset($message_approved)) {
                echo "<div class='message'  style='text-align: center;    color: green;      padding: 4% 0;'>";
                echo $message_approved;
                echo "</div>";
                }
                
                ?>
                                   
                                       <p>Your Request has been submitted wait for 24-48 hr  </p>
                                   
                                    
                                
                                 <button type="button" class="btn btn-default btn-cls" data-dismiss="modal">Close</button>
                            
         </div>
        <div class="modal-footer" style="border-top:none;padding:0">
         
        </div>
      </div>
      
    </div>
  </div>
    
    <!-- -->
    
     <?php 
      $message_approved= $this->session->flashdata('message_approved');
    if(isset($message_approved)){
    ?>
       <script>$('#myModal').modal('show');</script>
    <?php } ?>
</body>
</html>