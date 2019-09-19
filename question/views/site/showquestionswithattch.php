<?php
	$questionnaires = $questionnaires[0]; 
	
	if( $questionnaires->minutes == 0  && $questionnaires->seconds == 0 )
	{
		$questionnaires->minutes =20;
	}
	
	$warnTimeUp 	= ($questionnaires->minutes-5) * 60000;
	if($warnTimeUp <= 0)
	{
		$warnTimeUp 	= 0;
	}
	
	session_start();
	session_unset();
	
	$_SESSION['questionnaire_id'] = (int) $questionnaires->questionnaire_id;
	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
<title>Arfeen Khan</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/Title.png">
<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>

<!--
<script type="text/javascript" src="jquery-2.0.3.js"></script> -->

<script type="text/javascript" src="<?php echo base_url(); ?>js/timer/jquery.countdownTimer.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/timer/jquery.countdownTimer.css" />

<!-- session -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/session/jquery.session.js"></script>
<!-- session -->

<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>Fonts/font.css" />

<script>
	var counter = <?php echo $warnTimeUp; ?>;
	$(document).ready(function()
	{
		//$('#ShowQuestion').hide();
		
		
		 $("#userinfo").click(function()
		{
		  
			if ( !validationUserInfo() )
			{
				return false;
			}
			
			$('#contactIDInfo').empty();
			
			var fistname = $('#firstname').val();
			var emailid = $('#email').val();
			var mobileno = $('#mobile').val();
					
			$.ajax({
											type : "POST",
											url : "<?php echo base_url(); ?>addtagInfusionsoft",
											data : {
												"fistname" 	: fistname,
												"emailid" 	: emailid,
												"mobileno"	: mobileno
											},
											success: 
								              function(data)
								              {
													//$('#contactIDInfo').html(data);
													//alert(data);
													
													if( data == 0 )
													{
														alert( "Unable to connect to the Internet" );
														
														 window.reload = "<?php echo base_url(); ?>";
													}
													else{
														$('#contactIDInfo').html('<input type="hidden" name="ContactID"  value="'+data+'" />');	
													}
													
								              }
								              
										});
										
			
			
			$('#ms_timer').show();
			$('#career').hide();
			$('.textfield').hide();
			$('#ShowQuestion').show();
			$('#questionnaireInfo').show();
			startTimer();
			IntervalWarn();
			
		});
		
		
		
	});
	
	
			function validationUserInfo()
			{
					
				var name = $('#firstname').val();
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
				else 
				if (!name.match(name_regex) ) 
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
				//var mob = /^[1-9]{1}[0-9]{9}$/;
				var mob =/^(\+){0,1}(\d|\s|\(|\)){10,20}$/;
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
					
				return true;	
			}
	
	//var reloadFlag = true;
	$(document).keydown(function(event) 
	{
		var $focusedItem = $(document.activeElement);
		if($focusedItem.attr('id') == 'submitButton') 
		{
		    if (event.keyCode == 13) {
		        
		    }
		}
		else{
		    if (event.keyCode == 13) {
		    	event.preventDefault();
		    }
		}
	
	});
		
	/*if( reloadFlag )
	{
		$(window).on('beforeunload', function()
		{
		  return 'Are you sure you want to leave?';
		});
		
	}
	*/
	
	
	var unasnwered = 0;
	
	function getTotalCheckRad()
	{
		var numberOfCheckedRadio = $('input:radio:checked').length; 
 		
 		var totalQuestion 	= $('#totalQuestion').val();
 		unasnwered 		= ( totalQuestion - numberOfCheckedRadio );
 		$('#unasnwered').text(unasnwered);
	}
 	
			function validation()
			{
					
				/*var name = $('#firstname').val();
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
				*/
					
				var totalpage = $('#totalpage').val();
					
				var checked1 = $("#pagetop"+totalpage+" :radio:checked");
				var groups1 = [];
				$("#pagetop"+totalpage+" :radio").each(function() 
				{
					        if (groups1.indexOf(this.name) < 0) {
					            groups1.push(this.name);
					        }
				});
				
				if (groups1.length != checked1.length)
				{ 
				     var total1 = groups1.length - checked1.length;
				     var a = total1>1?' Questions are ':' Question is ';
					
				      alert(total1 + a + 'unanwsered in this page');
				      return false;
				}	
					
        		
        		getTotalCheckRad();
        		testing();
					
				return true;	
			}
			
			function testing()
			{
				clearTimeout(counter);
				
				$('#afterSubmit').show();
				$('#ShowQuestion').hide();
				$('#timerFinish').hide();
				
				
			}
			
			$(document).ready(function()
			{
				
				$(".pages").each(function(index)
				{
					getTotalCheckRad();
					var count_div = index+1;
					var selectpageindex = 0;
						
						$(".page"+count_div).hide();
						$(".page1").show();
					
				    $(".showpage"+count_div).click(function()
				    {
				    	getTotalCheckRad();
				    	selectpageindex = count_div;
				    	
				    	////////////////////////////
				    	
				    	var checked = $("#pagetop"+(count_div-1)+" :radio:checked");
				    	var groups = [];
					    $("#pagetop"+(count_div-1)+" :radio").each(function() {
					        if (groups.indexOf(this.name) < 0) {
					            groups.push(this.name);
					        }
					    });
					    
					    if (groups.length != checked.length)
					    { 
					        var total = groups.length - checked.length;
					        var a = total>1?' Questions are ':' Question is ';
					
					        alert(total + a + 'unanwsered in this page');
					        return false;
					    }
				    	
				    	
				    	
				    	////////////////////////////
				    	
				    	
				    	$(".pages").each(function(index2)
						{
							$(".page"+count_div).show();
							$("#ShowQuestion").css('padding-top','7%');
							
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
	
<div class="header">
<div class="wrap">
	
    <div class="logo">
    <img src="<?php echo base_url(); ?>images/Logo.png" alt="logo" />
    </div>

<div id="back">

  <a href="http://arfeenkhan.com/" ><span>Go to arfeenkhan.com</span></a>
  
</div>				

</div>
</div>
	
<?php
	/*
	<a href="<?php echo base_url(); ?>" > List Questionnaires </a>
	*/	
?>
<br/>
<?php
	if( $questions )
			{
?>
<span class="info">
<?php	
	$total_question = count($questions);
	//echo "Total Question : ".$total_question."<br/>";
	$per_page 		= $questionnaires->per_page;
	//echo "Question per page : ".$per_page."<br/>";
	$page_num 		=  (int) ($total_question/$questionnaires->per_page);
						
	if ( ($page_num == 0) || ($page_num == 1) ) 
	{
		$page_num = 1;
	}
	else{
		$page_num = ($page_num+1);
	}
						
	//echo " Total Pages : ". $page_num ."<br/><br/>";
?>


			
</span>
<?php
			}
			
?>


<div id="career">

<h1> <?php echo $questionnaires->title; ?></h1>

<?php
	if( $questions )
	{
		
		$_SESSION['qn_title'] = $questionnaires->title;
		$qn_title = $questionnaires->title;
		
		if ( !empty($questionnaires->min_desc) ) 
		{
?>
				<p><?php echo htmlentities($questionnaires->min_desc); ?></p>
<?php		
		} 
?>

</div>
	
		
<div class="main">	
	
		
	<form id="questionnaireForm" method="post" action="<?php echo base_url(); ?>thankYou" onsubmit="return validation();"   >	
		
		<div class="textfield">
		
		<h4>Fill in your details below before you start the test</h4>
		
		
		<div class="inputboxs">
		
		<input type="text" name="firstname" id="firstname" placeholder="Name" />
						
		<input type="email" name="email" id="email" placeholder="Email" />
						
		<br/>
						
		<div id="showMobile" >
			
		<input type="tel" name="mobile" id="mobile" placeholder="Contact No" />
			
		</div>
		
		<input type="hidden" name="qn_title"  value="<?php echo $qn_title; ?>" />				
		<input type="hidden" name="questionnaire_id"  value="<?php echo $questionnaires->questionnaire_id; ?>" />
		<input type="hidden"  id="totalpage" value="<?php echo $page_num; ?>" />
		<input type="hidden"  id="totalQuestion" value="<?php echo $total_question; ?>" />
			<span id="contactIDInfo" >
				
			</span>	
		
		</div>
		
		<div class="clear"> </div>
		
		
		<h5>STEPS</h5>

<div id="allsteps">

<div id="step">

<div id="step_img">
<img src="<?php echo base_url(); ?>images/Step1.png" width="329" height="211" alt="Step1" title="Step1">
</div>

<div id="step_content">
<h2>1) Work your way through each question</h2>
<p>Read each question carefully and choose one answer of your choice for each question.</p>
</div>

<div class="clear"> </div>

</div>

<div id="step">

<div id="step_img2">
<img src="<?php echo base_url(); ?>images/Step2.png" width="329" height="211" alt="Step2" title="Step2">
</div>

<div id="step_content2">
<h2>2) You’ve only got 20 minutes</h2>
<p>You have to finish all 84 questions in 20 minutes! Choose answers by immediate instinct!</p>
</div>

<div class="clear"> </div>

</div>

<div id="step">

<div id="step_img">
<img src="<?php echo base_url(); ?>images/Step3.png" width="329" height="211" alt="Step3" title="Step3">
</div>

<div id="step_content">
<h2>3) Submit</h2>
<p>As soon as you’re done answering all 84 questions, click submit button to submit your form.</p>
</div>

<div class="clear"> </div>

</div>

<div class="clear"> </div>

</div>
		
		
		<div id="userinfo">
        	<a href="#ShowQuestion" > START </a>
		</div>
		
		</div>			
		
	<div id="timerFinish" style="display: none;padding-top: 5%;">
		<h1>Time Is Over</h1>
		
		<center>
			<img src="<?php echo base_url(); ?>images/Loading_Animation.gif" height="50%" width="50%" />
		</center>
	</div>	
	
	<div id="afterSubmit" style="display: none;padding-top: 5%;">
		<h1>Please wait! <br/> We are submitting your answers.</h1>
		
		<center>
			<img src="<?php echo base_url(); ?>images/Loading_Animation.gif" height="50%" width="50%" />
		</center>
	</div>
		
	<div id="ShowQuestion" style="padding-top: 7%; display:none;" >
	
	<div id="questionnaireInfo">	
		<div class="info">
		
			<p>All questions are compulsory</p>
		
			<?php //echo "Total Question : ".$total_question."<br/>"; 
			?>
			<div class="remaining"><?php echo "Remaining Questions : " ; ?><span id="unasnwered" ></span></div>
			
			
			<div class="clear"> </div>
			
		</div>	
			
			
		<div id="timer">	
		<table >
	              <tr>
	              <td>Min</td>
	              <td>Sec</td>
	              </tr>
	              <tr>
	              <td colspan="4"><span id="ms_timer"></span></td>
	              </tr>
	         </table>
	         </div>
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
	
<div id="pagetop<?php echo $i; ?>" >
	
         
<div class="pages">	
	
	<div class="page<?php echo $i; ?>"  >
	
	<div class="pagetop"   >
	
	<h3>Page <?php echo $i; ?></h3>
	
	<?php
	/*
	 <div class="info">
	
	<?php echo "Total Question : ".$total_question."<br/>"; ?>
	<?php echo "Remaining Question : " ; ?><span id="unasnwered" ></span>
	
	</div>
	 */
	?> 
	<div class="clear"> </div>
	
	</div>
	
	<ul style="list-style-type: none;" >
	
	<?php
		$show_quest_per_page = $per_page + $next_page_question;
													
		for ($j=$count_question; $j <= ($show_quest_per_page-1) ; $j++) 
			{
	?>
	
	<li>
															
	<div class="question"><?php echo ($j+1)." : ".htmlentities($questions[$j]->question)." ?"; ?></div>
	<?php if ( !empty($questions[$j]->question_id)) { ?> 
	<input type="hidden" class="question_id" name="question_id[]" value="<?php echo $this->encrypt->encode(intval($questions[$j]->question_id)); ?>" />
															
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
	<input onchange="getTotalCheckRad();" type="radio" id="abc<?php echo ($j+1); ?>"   name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(intval($optvalue->value)); ?>" ><?php echo $optvalue->text; ?> 
																		
	</li>
	<?php } ?>
																	
	</ul>
	
	<?php }
																
		if( empty( $options[$questions[$j]->question_id] ) ) {
		$maxOptValue = 10;
	
	?>	
	
	<ul>
		<li><input onchange="getTotalCheckRad();" class="radio1" type="radio" id="abc<?php echo ($j+1); ?>"  name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(10); ?>" ><label for="radio1"><span><span></span></span></label> Yes </li>
		<li><input onchange="getTotalCheckRad();" class="radio2" type="radio" id="abc<?php echo ($j+1); ?>"  name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(0); ?>" ><label for="radio2"><span><span></span></span></label> No </li>
		<li><input onchange="getTotalCheckRad();" class="radio3" type="radio" id="abc<?php echo ($j+1); ?>"  name="abc<?php echo ($j+1); ?>" value="<?php echo $this->encrypt->encode(5); ?>"  ><label for="radio3"><span><span></span></span></label> Partly </li>
		
	</ul>
	<?php } 
															
	if ( !empty($questions[$j]->question_id)) 
		{
	?>
		<input type="hidden" id="value_max[<?php echo intval($questions[$j]->question_id); ?>]" name="value_max[<?php echo intval($questions[$j]->question_id); ?>]" value="<?php echo $this->encrypt->encode(intval($maxOptValue)); ?>" />
	<?php } ?>			
	
	</li>
	
	<br/>
	
<div class="clear"> </div> 

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
				<?php /* 
				<a class="showpage<?php echo ($i-1); ?>" href="#pagetop<?php echo ($i-1); ?>" > Previous Page </a>
				*/ ?>
				<a class="showpage<?php echo ($i-1); ?>" href="#ShowQuestion" > Previous Page </a> 
				
				<?php 
			} 
														
		if( isset($questions[$count_question]) )
			{
			?>	
				<?php /*
				<a class="showpage<?php echo ($i+1); ?>" href="#pagetop<?php echo ($i+1); ?>" > Next Page </a>
				*/ ?>
				
				<a class="showpage<?php echo ($i+1); ?>" href="#ShowQuestion"  > Next Page </a>
			<?php 
													
			}else
			
			{
				?> <input type="submit" id="submitButton" class="showpage<?php echo $i; ?>" name="submit" value="SUBMIT" > <?php
			}
													
?>
	
		
									
	</div>
	</ul>
	</div>	
</div>
			<?php
										
	}
									
			}
			else
			{
			?> 	<strong><?php echo "Questions is Coming Soon."; ?></strong> <?php	
								}
			?>	
						
	</form>	
		
	</div>
</div>


 <script>
 
 	
  
                                 
                                 	
                                 	function  startTimer() 
                                 	{
									  
                                 	
                                    $('#ms_timer').countdowntimer({
                                        //minutes :20,
                                        minutes : <?php echo $questionnaires->minutes; ?>,
                                        //seconds : 00,
                                        seconds : <?php echo $questionnaires->seconds; ?>,
                                        size : "lg",
                                      	timeUp : timeisUp ,
                                        expiryUrl : "<?php echo base_url(); ?>thankYou"
                                        
                                    });
                                    
                                    function timeisUp() 
                                    {
                                    	var firstname 	= $('#firstname').val();
                                    	var email 		= $('#email').val();
                                    	var question_ids= new Array();
                                    	var options		= new Array();	
                                    	
                                    	/*
                                    	if ( ($.trim(firstname).length == 0 ) || ($.trim(email).length == 0 )   ) 
                                    	{
                                    		validation();
                                    		$('.pages').show();
                                    		return false;
                                    	}
                                    	*/
                                    	
                                    	var m = 1;
                                    	$('input[name="question_id[]"]').each(function() {
										    question_id = $(this).val();
										    question_ids.push(question_id);
										    
										    var ab = $("input[type='radio'][name='abc"+m+"']:checked").val();
										    //var ab= $('#abc'+m).val();
										    //alert(ab);
										   	options.push(ab);
										    m++;
										});
										
										
                                    	$.ajax({
											type : "POST",
											url : "<?php echo base_url(); ?>setFormVariablesINSession",
											data : {
												"firstname" 	: firstname,
												"email" 		: email,
												"abc"			: options,
												"question_id"	: question_ids
											}
											
										});
										
										alert('Time is Over.');
										$('#ShowQuestion').hide();
										$('#afterSubmit').hide();
										$('#timerFinish').show();
										
										
					        		}
					        	
					        	}	
					        		
                  function IntervalWarn()
                  {
             		<?php if ($warnTimeUp == 0 ){
	            	?>
	            	//window.setTimeout("TickSecond()", 0 );
	            	<?php 	
	             }else{
	             	?>
	             		window.setTimeout("Tick()", <?php echo $warnTimeUp; ?> );
	             	<?php
	             }?>  
	             
	             	     
                  } 
                         
             
                          
            
     		function Tick() 
			{
				alert('Few Minutes Remaining.');
			}
			
		/*	function TickSecond() 
			{
				alert('Few Second Remaining.');
			}
		*/
			
    </script>

</body>
</html>