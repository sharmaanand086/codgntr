<?php
	
	$questionnaires = $questionnaires[0]; 
	session_start();
	session_unset();
 echo base_url(); 
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
		<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
		<script>
		
			function validation()
			{
				name = $('#firstname').val();
				var name_regex = /^[a-zA-Z\s]+$/;
				
				if( name == "" )
				{
					alert("Enter Your Name.");
					return false;
				}
				else
				if( name.length < 3 )
				{
					alert("Enter Your Name more than 3 word.");
					return false;
				}
				else if (!name.match(name_regex) ) 
				{
					alert(" Enter alphabets only in Name. ");
					$("#firstname").focus();
					return false;
				}
						
				if(!$(":radio:checked").length) 
				{
					alert("Select Options.");
					return false;
				}
				
			}
			
			$(document).ready(function()
			{
				
				$(".pages").each(function(index)
				{
					var count_div = index+1;
					var selectpageindex = 0;
					
						$(".page"+count_div).hide();
						$(".page1").show();
					
					
				    $(".showpage"+count_div).click(function()
				    {
				    	
				    	selectpageindex = count_div;
				    	
				    	$(".pages").each(function(index2)
						{
							$(".page"+count_div).show();
							
							var count2_div = index2+1;
							if ( selectpageindex != count2_div )
							{
								$(".page"+count2_div).hide();
							}
						});
				    	
				    });
					
					
				});
				
				
			});
		</script>
	</head>
	<body >
		
		<h1> Title : <?php echo $questionnaires->title; ?></h1>
					<form method="post" action="<?php echo base_url(); ?>thankYouPage" onsubmit="return validation()"   >	
						<?php 
							if( $questions )
							{
								$total_question = count($questions);
								
								echo "Total Question : ".$total_question."<br/>";
								
								$per_page 		= $questionnaires->per_page;
								
								echo "Question per page : ".$per_page."<br/>";
								
								$page_num 		=  (int) ($total_question/$questionnaires->per_page);
								
								echo " Total Pages : ".($page_num+1) ."<br/><br/>";
						
						// hidden filed used in javascript for pagination 
						?>
						
						
						<div id="showName" >
							Name : <input type="text" name="firstname" id="firstname"  />
						</div>
							
							<?php  
								$count_question = 0;
								$next_page_question = 0;
								$showSubmit = FALSE;
								for ($i=1; $i <= ($page_num +1) ; $i++) 
								{
									/*if( empty($questions[$count_question]) )
									{
										break;
									}
										*/				
									
									?>
									<div class="pages" >	
										<ul style="list-style-type: none;" >
											<div class="page<?php echo $i; ?>" >
												<h3>Page <?php echo $i; ?></h3>
												<?php
													$show_quest_per_page = $per_page + $next_page_question;
													
													for ($j=$count_question; $j <= ($show_quest_per_page-1) ; $j++) 
													{
													?>
														<li>
															<?php echo ($j+1)." : ".$questions[$j]->question." ?"; ?> 
															<ul style="list-style-type: decimal;" >
																<li><input type="radio" name="abc<?php echo ($j+1); ?>" value="10" > Yes</li>
																<li><input type="radio" name="abc<?php echo ($j+1); ?>" value="5" > No </li>
																<li><input type="radio" name="abc<?php echo ($j+1); ?>" value="0"  > Partly</li>
															</ul>
														</li>
														<br/>
														<?php
															++$count_question;
															++$next_page_question;
															
															if ( $count_question == $total_question ) 
															{
																break;	
															}
														}
													 
													 if($i != 1)
													 	{ ?> 
													 		<p class="showpage<?php echo ($i-1); ?>" > Previous Page </p> <?php 
														} 
														
													 if( isset($questions[$count_question]) )
													{
														?>	
													 	<p class="showpage<?php echo ($i+1); ?>" > Next Page </p>
													 	<?php 
													
													}else
														{
															?> <input type="submit" name="submit" value="Finish" > <?php
														}
													
														?>
													
												</div>
											</ul>
										</div>
									<?php
										
										
										
									}
									
									
								}
								else
								{
									?> 	<strong><?php echo "Question is Coming Soon."; ?></strong> <?php	
								}
							?>	
						</form>	
					
	</body>
</html>