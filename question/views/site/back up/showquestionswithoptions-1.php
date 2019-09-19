<?php
	$questionnaires = $questionnaires[0]; 
	
	session_start();
	session_unset();
	
?>
<html>
	<head>
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
				
				
				var email = $('#email').val();
				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
				
				// Checking Empty Fields
				if ($.trim(email).length == 0 ) {
					alert('Enter Your Email-Id');
					return false;
				}
				else
				if ( !filter.test(email))
				{
					alert('Invalid Email Address');
					return false;
				}
				
				
				var mobile = $('#mobile').val();
				var mob = /^[1-9]{1}[0-9]{9}$/;
				
				if ($.trim(mobile).length == 0 ) {
					alert('Enter Mobile Number');
					return false;
				}
				else
				if (mob.test($.trim(mobile)) == false) 
				{
				  	alert("Please enter valid mobile number");
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
		<a href="<?php echo base_url(); ?>" > List Questionnaires </a>
		<br/>
		<?php
			if( $questions )
			{
				?>
				<span style="float: right;padding-right: 10%;" >
				<?php	
						$total_question = count($questions);
						echo "Total Question : ".$total_question."<br/>";
						$per_page 		= $questionnaires->per_page;
						echo "Question per page : ".$per_page."<br/>";
						$page_num 		=  (int) ($total_question/$questionnaires->per_page);
						
						if ( ($page_num == 0) || ($page_num == 1) ) 
						{
							$page_num = 1;
						}
						else{
							$page_num = ($page_num+1);
						}
						
						echo " Total Pages : ". $page_num ."<br/><br/>";
				?>
				
			</span>
		<?php
			}
			
			?>
			<h1> Title : <?php echo $questionnaires->title; ?></h1>
			<?php
			if( $questions )
			{
				
		
		$_SESSION['qn_title'] = $questionnaires->title;
		
			if ( !empty($questionnaires->min_desc) ) 
			{
			?>
				<p><?php echo htmlentities($questionnaires->min_desc); ?></p>
			<?php		
			} 
		?>
		
			<div style="padding-left: 1%;" >			
					<form method="post" action="<?php echo base_url(); ?>thankYouPage" onsubmit="return validation()"   >	
						
						<div id="showName" >
							Name : <input type="text" name="firstname" id="firstname"  />
						</div>
						<br/>
						<div id="showEmail" >
							Email : <input type="email" name="email" id="email"  />
						</div>
						<br/>
						<div id="showMobile" >
							Mobile : <input type="mobile" name="mobile" id="mobile"  />
						</div>
						
						<input type="hidden" name="questionnaire_id"  value="<?php echo $questionnaires->questionnaire_id; ?>" />
							
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
															
															<?php echo ($j+1)." : ".htmlentities($questions[$j]->question)." ?"; ?>
															<?php if ( !empty($questions[$j]->question_id)) { ?> 
															<input type="hidden" name="question_id[]" value="<?php echo $this->encrypt->encode(intval($questions[$j]->question_id)); ?>" />
															
															<?php 
															}
															
															if( isset($options[$questions[$j]->question_id]) ) {
																
																$maxOptValue = 0;
																 ?>
																<ul style="list-style-type: decimal;" >
																	<?php foreach (($options[$questions[$j]->question_id]) as $optkey => $optvalue) { 
																		
																		$max_value[] = intval($optvalue->value);
																		$maxOptValue = max($max_value);
																		
																		?>
																	<li>
																		<input type="radio" name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(intval($optvalue->value)); ?>" > <?php echo $optvalue->text; ?> 
																		
																	</li>
																	<?php } ?>
																	
																		
																		
																</ul>
															<?php }
																
																 if( empty( $options[$questions[$j]->question_id] ) ) {
																 	$maxOptValue = 10;
															 ?>	
																<ul style="list-style-type: decimal;" >
																	<li><input type="radio" name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(10); ?>" > Yes</li>
																	<li><input type="radio" name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(0); ?>" > No </li>
																	<li><input type="radio" name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(5); ?>"  > Partly </li>
																</ul>
															<?php } 
															
															if ( !empty($questions[$j]->question_id)) 
															{
																?>
																<input type="hidden" name="value_max[<?php echo intval($questions[$j]->question_id); ?>]" value="<?php echo $this->encrypt->encode(intval($maxOptValue)); ?>" />
															<?php } ?>			
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
		</div>
					
	</body>
</html>