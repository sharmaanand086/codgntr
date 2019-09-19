<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/mycss.css" />
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<!-- Facebook Pixel Code General Retargeting Pixel -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','//connect.facebook.net/en_US/fbevents.js');

fbq('init', '363160880504868');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=363160880504868&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
	<script>
	
	jQuery(document).ready(function(){
			 $(".confirmClick").click( function() { 
			    if ($(this).attr('title')) {
			        var question = 'Are you sure you want to ' + $(this).attr('title') + ' Questionnaire ?';
			    } else {
			        var question = 'Are you sure you want to do delete this questionnaires ?';
			    }
			    
			    if ( confirm( question ) ) {
			        [removed].href = this.src;
			    } else {
			        return false;
			    }
			    
			});  
			
	 }); 
	</script>
	
	<noscript>
		 For full functionality of this site it is necessary to enable JavaScript.
		 Here are the <a href="http://www.enable-javascript.com/" target="_blank">
		 instructions how to enable JavaScript in your web browser</a>.
	</noscript>
	
</head>
<body>
	
	<nav class="navbar navbar-inverse" role="navigation">
  		<ul class="nav navbar-nav" >
  			<li class="active" ><a href="<?php echo base_url(); ?>admin/questionnaires" >Questionnaires </a></li>
		  	<li style="text-align: right;"><a href="<?php echo base_url(); ?>admin/user/logout" > Log Out </a></li>
		  	<li class="text-"><a  href="<?php echo base_url(); ?>Questionnaires" > Site </a></li>
		</ul>
	</nav>
	
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li >Questionnaires</li>
		  
		  <!--<li class="active">Add Question</li> -->
		<!--  
		</ol> -->