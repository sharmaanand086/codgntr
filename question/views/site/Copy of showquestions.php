<?php

$questionnaires = $questionnaires[0]; 

?>
<html>
	<head>
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
		<script src="js/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				
				
				$(".showstep1").click(function()
					{

						$('#showName').show();

						$('.step1').show();
						$('.step2').hide();

						

					});	

			});

			

		</script>

	</head>

	<body >
		

		<h1> <?php echo $questionnaires->title; ?></h1>

		<?php 

			if( isset($_POST['submit']) && ($_POST['submit']=="Finish") )

			{

				$total = 0;

				foreach ($_POST as $key => $value) 
				{
				
					$total =  $total+$value;

				}
				

				echo " Total :  ". $total;

				?>
				<br/>

				<?php

				$to       = 'mobin.t3office@gmail.com';

				$subject  = $_POST['firstname'].' Questionnaire Result ';

				$message  = $_POST['firstname'].' Questionnaire Total '.$total;

				$headers  = 'From: mobin.4499@gmail.com' . "\r\n" .

				            'MIME-Version: 1.0' . "\r\n" .

				            'Content-type: text/html; charset=iso-8859-1' . "\r\n" .

				            'X-Mailer: PHP/' . phpversion();

				if(mail($to, $subject, $message, $headers))

				    echo "Email sent to mobin.t3office@gmail.com";

				else

				    echo "Email sending failed";
				

			}
			else
			{
				?>
					<form method="post" action="<?php echo $_SERVER['PHP_SELF'];  ?>"    >	
						<?php 
							if( $questions )
							{
								echo 'c '.count($questions);
								echo 'per page '.$questionnaires->per_page;
								
								$count_page 	=  (int) (count($questions)/$questionnaires->per_page);
								$page_num 		=  ($count_page+1);
						
						?>
						<div id="showName" >
							Name : <input type="text" name="firstname" id="firstname"  required />
						</div>
							
							<?php  
								for ($i=1; $i <= $page_num ; $i++) 
								{
									?>
										<ul style="list-style-type: none;" >
											<div class="step<?php echo $i; ?>" >
												<h3>Page <?php echo $i; ?></h3>
												<?php 
													
													foreach ($questions as $key => $value) 
													{
													?>
														<li>
															<?php echo ($key+1)." : ".$value->question; ?> 
															<ul style="list-style-type: decimal;" >
																<li><input type="radio" name="abc<?php echo $key; ?>" value="10" > Yes</li>
																<li><input type="radio" name="abc<?php echo $key; ?>" value="5" > No </li>
																<li><input type="radio" name="abc<?php echo $key; ?>" value="0" checked="checked" > Partly</li>
															</ul>
														</li>
													<br/>
													<?php
													}
												 ?>	
												</div>
										</ul>
									<?php
									}
								?>
								<input type="submit" name="submit" value="Finish" >
																			
								<?php
							
								}
								else
								{
									?>
									<strong><?php echo "Question is Coming Soon."; ?></strong>
									<?php	
								}
							?>	
						</form>	
						<?php } ?>
	</body>
</html>