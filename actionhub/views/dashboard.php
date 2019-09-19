
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
    <div class="logo">
        <img style="" src="<?=base_url('assets/images/Ak_logo_BLACK.png');?>">
    </div>
    
    <div class="myname dropdown">
         <p class="frhvr"><?php echo $_SESSION['name_assignment']; ?><span class="caret down"></span></p>
         
           <div class="dropdown-content">
             <a href="<?=base_url('welcome/logout');?>" style="color: #000!important; ">Logout</a><br>
             <a href="<?=base_url('welcome/changepassword');?>" style="color: #000!important; ">Change password</a>
           </div>
    </div>
    
    <div class="myheading" style="padding-top:6%"><h1>Action Hub</h1></div>
    
  
       
<div class="container mrext"> 
  
    <form method="post"  action="http://speaktofortune.com/assignment/newuser/login" target="_blank">
        <div class="second_col">
            
            <?php
                if($e_assignmentemail)
                {
                ?>
                    <input type= "hidden" name="email" value="<?php echo $_SESSION['email_assignment']; ?>">
                    <input type= "hidden" name="password" value="<?php echo $_SESSION['password_assignment']; ?>">
                    
                    
                    <div class="assignsystem">
                      <input type="submit" title="click here" class="asssign" value="Assignment System ">  
                      <span class="dull" style="color: #e34a4a;">
                          <!--<?php echo $assignment_count_normal; ?> -->
                      
                            <?php 
                               if($check_assignment_complete)
                               {
                                   echo "All Assignments Completed";
                               }
                               elseif($assignment_remaining_count)
                               {
                                    foreach($assignment_remaining_count as $assignment_done_count)
                                    {
                                        $remainingassignment = $assignment_count_normal - $assignment_done_count;
                                        echo $remainingassignment.' Assignment Pending';
                                        
                                    }
                               }
                            ?>
                      </span>
                      <p>This is where you complete all the major assignments such as putting together your system, offer, book etc as well as many weekly  assignments for you to get clarity of who your client is.</p>
                    </div>
                    
                <?php
                }
            ?>
        </div>  
    </form>
  
    
    <form method="post" action="http://speaktofortune.com/90daysmasterplan/Welcome/calenders" target="_blank">
        <div class="third_col">
            <?php
                if($e_90daysemail)
                {
                ?> 
                    <input type= "hidden" name="email" value="<?php echo $_SESSION['email_90days)'];?>">
                    <input type= "hidden" name="password" value="<?php echo  $_SESSION['password_90days'];?>">
                    
                    <div class="days">
                         <input type="submit" title="click here" class="asssign" value="90 Days Story Plan ">   
                         <span class="active">
                            <?php
                            
                    
                                $currentdate = date_create(date('Y-m-d'));
                                
                                //removes things after space 
                                //start date
                                $date1 = strtok($e_90days_startdate,' ');
                                $start_date = date_create($date1);
                                
                                //removes things after space 
                                //end date
                                $date = strtok($e_90days_enddate,' ');
                                $end_date=date_create($date);
                                
                                $diff=date_diff($currentdate,$start_date);
                                $diff1=date_diff($currentdate,$end_date);

                                if($e_90days_startdate == '0000-00-00 00:00:00')
                                {
                                    echo "Choose Date";
                                }
                                
                                if($diff->format('%R%a days') > 0)
                                {
                                    echo "Yet to begin";
                                }
                                elseif($diff->format('%R%a days') <= 0 && $end_date >= $currentdate)
                                {
                                    $days = $diff->format('%a');
                                    $remainingdays = 90 - $days;
                                    echo ' '.$remainingdays.' Days to go';
                                }
                                elseif($end_date <= $currentdate && $e_90days_startdate != '0000-00-00 00:00:00')
                                {
                                    echo "90 days completed";
                                }
                                
                                


                            ?>

                         </span>
                      <p>This is a tool for you to plan your story and schedule a timetable to make all your videos, articles etc.  make sure you join up with others and form a group and make yourself accountable.</p>
                      
                    </div>
                <?php
                }
            ?>
        </div>
    </form>
    
    <form method="post" id="secure" action="http://instantmillionaire.in/securityidentity/index.php/welcome/login" target="_blank">
        <div class="third_col">
            <?php
                if($e_suiemail)
                {
                ?> 
                <input type= "hidden" name="username" value="<?php echo $_SESSION['email_sui']; ?>">
                    <input type= "hidden" name="password" value="<?php echo $_SESSION['password_sui']; ?>">
                    
                    
                    <div class="assignsystem">
                        <div class="asssign" style="cursor: pointer;" onclick="myFunction()">Secure Your Identity</div>
                      <!--<input type="submit" title="click here" class="asssign" value="Secure Your Identity ">  -->
                      
                      <p>Upload your system and system name so that no other STF person can use it while they are with us. This prevents copying and can be used once you have created your system</p>
                    </div>
                <?php } ?>
        </div>
    </form>
    
    
        <form method="post" action="http://arfeenkhan.com/Online-Learning/wp-login.php" target="_blank">
        <div class="third_col">
            
                <input type= "hidden" name="log" value="<?php echo $_SESSION['email_assignment']; ?>">
                    <input type= "hidden" name="pwd" value="<?php echo $_SESSION['password_assignment']; ?>">
                    
                    
                    <div class="assignsystem">
                      <input type="submit" title="click here" class="asssign" value="Online Learning">  
                      
                      <p>Go through previous STF programs and watch al the transformations and much more. This is priceless!</p>
                    </div>
               
        </div>
    </form>
    
    <form method="post" action="http://www.speaktofortune.com/profileblueprint/login.php" target="_blank">
        <div class="third_col">
            
                <input type= "hidden" name="email" value="<?php echo $_SESSION['email_90days)'];?>">
                    <input type= "hidden" name="password" value="<?php echo  $_SESSION['password_90days'];?>">
                    
                    
                    <div class="assignsystem">
                      <input type="submit" title="click here" class="asssign" value="Profile Blueprint">  
                      
                      <p>Fill in the details and make your profile. Its advisable to do this once you have created your system.</p>
                    </div>
               
        </div>
    </form>
    
  
</div>


<script>
function myFunction() {
   
    //  document.getElementsByTagName("myForm").submit;
     document.getElementById("secure").submit();
}
</script>


</body>
</html>
