<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/mycss.css" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" >
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
		
    	function updateQuest( quest_id )
		{
			if ( quest_id <= 0  )
			{
				alert( "Invalid Question Id or Questionnaire Id" );
			}
			
			var update_quest = $('#updatequest'+quest_id).val();
			
			var data = 'quest_id=' + quest_id +'&update_quest='+update_quest;
			
			//alert(data);
			
			$.ajax(
			{
				type: "POST",
				url: "../updateQuestion/",
				data: data,
				 cache: false,
				success: 
					function(data)
					{
						$('#questMsg').text(data);
						$('#myModal'+quest_id).modal('hide');
						 
						$('.show_questions').html('<h1>mobin</h1>');
						 
								
					}	
			});
			
		}	
			
		
		function deleteQuest( quest_id )
		{
			if ( quest_id <= 0)
			{
				alert( "Invalid Question ID" );
			}
			
			var data = 'quest_id=' + quest_id ;
			
			$.ajax(
			{
				type: "POST",
				url: "../deleteQuestion/",
				data: data,
				 cache: false,
				success: 
					function(data)
					{
						$('#questMsg').text(data);
						$('#myModalDelete'+quest_id).modal('hide');
						
					}
						
			});		     	
					     	
			
					          
		}
		
		$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div> '+x+' : <input type="text" name="myquest['+x+']" size="50" />  <a href="#" class="remove_field">Remove</a> </div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
}); 
	</script>
</head>
<body>
	
	<nav class="navbar navbar-inverse" role="navigation">
  		<ul class="nav navbar-nav" >
  			<li class="active" ><a href="<?php echo base_url(); ?>admin/questionnaires" >Questionnaires </a></li>
		  	<li style="text-align: right;"><a href="<?php echo base_url(); ?>admin/user/logout" > Log Out </a></li>
		</ul>
	</nav>
	
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="#">Home</a></li>
		  <li><a href="#" > Questionnaires</a></li>
		  <li class="active">Add Question</li>
		</ol>
		
		<h2> Add Question in <?php echo $title; ?> Questionnaires </h2>
		<hr>
		
		<div class="row" >
			<div class="col-sm-5" >
				<form action="<?php echo base_url(); ?>admin/questionnaires/savequestions" method="post" >
						<div class="input_fields_wrap">
						    <button class="add_field_button btn btn-primary btn-sm">Add More Question</button>
						    <br/><br/><br/>
						    <div> 1 : <input type="text" name="myquest[1]" size="50" ></div>
						</div>
						<br/><br/>
						
						<input type="hidden" name="questionnaire_id" value="<?php echo $questionnaire_id ?>" />
						<input class="btn btn-primary" type="submit" value="Save" >
						<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/questionnaires" > Cancel </a> 
				</form>
					
					
				
			</div>
			
			<div class="col-sm-7"  >
				<input type="hidden" id="questionnaire_id" value="<?php echo $questionnaire_id ?>" />
				<div class="show_questions" >
				<?php 
					
					if( $questions_info )
					{
						?>
				<div class="jumbotron">
					<div id="questMsg" class="btn-danger aling-center"  > </div>
					<br/>
						<?php
						foreach ($questions_info as $key => $value) 
						{
							echo ($key+1).' : '.$value->question.' ';
							
						?>
						
						<div class="align-right" >
						  		<!-- Link trigger modal -->
							<a href="#" data-toggle="modal" data-target="#myModal<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm "> Update </a>
							<a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm"> Delete </a>
							
							 
						</div>
						<br/>
						
							<!-- Default bootstrap modal example -->
							<div class="modal fade" id="myModal<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Update Question </h4>
							      </div>
							      <div class="modal-body">
							       		Q : <input type="text" name="update_quest" id="updatequest<?php echo $value->question_id; ?>" value="<?php echo $value->question; ?>"  />
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary" onclick="updateQuest(<?php echo $value->question_id; ?> );return false;" > Update </button>
							      </div>
							    </div>
							  </div>
							</div>
							
							<!-- Default bootstrap modal example -->
							<div class="modal fade" id="myModalDelete<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel"  >Delete Question </h4>
							      </div>
							      <div class="modal-body">
							       		Q : <?php echo $value->question; ?>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" onclick="deleteQuest(<?php echo $value->question_id; ?>);return false;" class="btn btn-primary">Delete</button>
							      </div>
							    </div>
							  </div>
							</div>
							
						<?php
						
						}
				
				?>
				</div>
				<?php
						}
				?>
				</div>
			</div>
		</div>	
		
	</div>
</body>
</html>