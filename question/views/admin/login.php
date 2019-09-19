<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/mycss.css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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
</head>
<body>
	<div class="container login">
		<h2> Login Form</h2>
		<?php 
		
			$this->load->helper('form');
			echo validation_errors();
			
			if( isset($message_error) && $message_error  )
			{
				echo "<p> Username and Password not valid </p>";
			}
			
			echo form_open( base_url().'admin/validation', 'login_form' );
			echo '<p>'.form_label('User Name : 		', 'username');
			echo form_input('username',"").'</p>';	
			echo '<p>'.form_label('Passward :			', 'pwd');	
			echo form_password('pwd',"").'</p>';;	
			echo form_submit('login','Login');
			echo form_close();
		?>
		
	</div>	

</body>
</html>