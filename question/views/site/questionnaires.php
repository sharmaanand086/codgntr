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
	<div class="container">
		
		
		<div class="row" >
			<div class="col-sm-8" >
				<h1> Questionnaires List </h1>
			</div>
			<div class="col-sm-4" >
				<?php 
					if( !$this->session->userdata('is_logged_in') )
					{
						?>
						<h2><a class="btn btn-primary" href="<?php echo base_url(); ?>admin/login" > Login </a></h2>
						<?php
					}
					else{
							?>
						<h2><a class="btn btn-primary" href="<?php echo base_url(); ?>admin/user/logout" > Logout </a>
	  					<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/login" > Control Panel </a></h2>
						<?php
					} 
					?>
	  			
			</div>
		</div>	
		
		
		
		<?php
			if( isset($questionnaires) )
			{
				?>
				<table width="80%" border="0" class="table table-striped table-hover" >
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Action</th>
					</tr>
				<?php
				
				foreach ($questionnaires as $key => $value) 
				{
					$link = base_url().'showQuestionOpt/'.$value['questionnaire_id'];
					
					?>
					<tr>
						<td width="20%" ><?php echo $key+1; ?></td>
						<td width="50%" ><a href="<?php echo $link; ?>"> <?php echo $value['title'] ?> </a> </td>
						<td width="30%" ><a href="<?php echo $link; ?>" class="btn btn-info btn-mini" > Question </a> </td>
					</tr>
					<?php	
						
				}
				?>
				</table>
				<?php
			}
			else{
				echo "Please add Questionnaires";
			}
				
				
		?>
		
	</div>
</body>
</html>