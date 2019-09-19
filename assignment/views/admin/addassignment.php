<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title> Speak To A Fortune </title>
		
		<!-- Bootstrap Core CSS -->

		<link href="<?=  base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
		<link href="<?=  base_url('assets/css/bootstrap.css');?>" rel="stylesheet"> 
		<!-- Custom Fonts -->
		<link href="<?=  base_url('assets/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="<?=  base_url('assets/css/style.css');?>" >
		<!-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet" /> --> 
	
	</head>
        <style>
           .error{
                   color: red;
                 }
       </style>
<body class="speaktofortune">

	<div class="materialContainer">
	    <div class="box">

	         <div class="logintitle">
                         
                             <img src="<?=  base_url('assets/images/login/logo.png');?>" alt="">
	         	
	         </div>
                <?php 
                       $attributes = array("id" => "uploadassigmentform", "name" => "uploadassigmentform");
                       echo form_open_multipart("newadmin/uploadassignment/", $attributes);
                 ?>
                 <div>
                       <center> <h1>This is upload page </h1></center> 
                 </div>
	   
               
	       <div class="input">
	           <label for="assignmentname">Enter Assignment Name</label>
	           <!-- <input type="password" name="pass" id="pass">-->
                   <input type="text" name="assignmentname" id="assignmentname" placeholder=" " value="">
                   <span class = "error"><?php echo form_error('assignmentname'); ?></span>		
	           <span class="spin"></span>
      	       </div>

               <div class="input">
	           <label for="description">Discription</label>
	           <!-- <input type="password" name="pass" id="pass">-->
                   <input type="text" name="description" id="description" placeholder=" " value="">
                   <span class = "error"><?php echo form_error('description'); ?></span>		
	           <span class="spin"></span>
      	       </div>
               <div class="input">
	           
                   <label for="fileassignment"> upload assignment </label>
                   <input type="file" name="fileassignment" id="fileassignment" placeholder=" " value="">
                   <span class = "error"><?php //echo form_error('fileassignment'); ?></span>		
	           
      	       </div>
               <div class="input">
	           
                    <label for="submdate"> submit date </label>
                   <input type="date" name="submdate" id="submdate" >
                   <span class = "error"><?php echo form_error('submdate'); ?></span>		
	           
      	       </div>

      	    <div class="btn-inline-wrap">
                <input type="submit" class="btn btn-inline"  data-lead-id="banner-btn" value="Add assignment" id="submit" name = "addassignment">	
               <!-- <a href="loading_assignment.php"  class="btn btn-inline" data-lead-id="banner-btn"> Go Inside </a>-->
            </div>

			
			<center>
	                        <?php echo form_close(); ?>
                                <span class = "error"> <?php echo $this->session->flashdata('usermsg');?></span>
                        </center>

	    </div>
       
	</div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>
      $.fn.center = function () {
        this.css("position","absolute");
        this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop()) + "px");
        this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft()) + "px");
        return this;
      }

      $("#banner-btn").on("click", function(){
       window.location="href";
       // window.demo1.index3.
      });
    </script>
<!-- jQuery -->
		<script src="<?=  base_url('assets/js/jquery.js');?>"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?=  base_url('assets/js/bootstrap.min.js');?>"></script>

	    <script src="<?=  base_url('assets/js/script.js');?>"></script>
	    
       <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="<?=  base_url('assets/js/index.js');?>"></script>

</body>
</html>