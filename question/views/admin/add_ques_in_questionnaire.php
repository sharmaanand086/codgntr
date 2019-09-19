		  <?php require_once "header.php"; ?>
		  
		  <li class="active"> Question</li>
		</ol>
		
		
		Question in <h2><?php echo $title; ?></h2> Questionnaires
		<hr>
		
		<div class="row" >
			<div class="col-sm-6" >
				<form action="<?php echo base_url(); ?>admin/questionnaires/savequestions" method="post" onsubmit="return validation();" >
						<div class="input_fields_wrap">
						    <button class="add_field_button btn btn-primary btn-sm">Add More Question</button>
						    <br/><br/><br/>
						    <div> 1 : <input type="text" class="myquestlist" name="myquest[1]" size="40" placeholder="Add Question" > 
						    	 <select name="category_id[1]" class="category_ids"  >
						    	 	  <option  selected value="" > Select A Category </option> 
									  <option value="1"> Contribution </option>
									  <option value="2"> Growth </option>
									  <option value="3"> Love & connection </option>
									  <option value="4"> Certainty </option>
									  <option value="5"> Variety / Uncertainty </option>
									  <option value="6"> Significance </option>
									  <option value="0"> Other </option>
								</select>
						    </div>
						</div>
						<br/><br/>
						
						<input type="hidden" name="questionnaire_id" value="<?php echo $questionnaire_id ?>" />
						<input class="btn btn-primary" type="submit" value="Save" >
						<a class="btn btn-primary" href="<?php echo base_url(); ?>admin/questionnaires" > Cancel </a> 
				</form>
				<br/>
				
				<?php if( !empty($marks) )
				{
					?>
					<h2> Marks </h2>
					
					<!-- Link trigger modal -->
					<a href="#" data-toggle="modal"  data-target="#marksModal" class="btn btn-primary btn-sm "> Mark List </a>
							
					<!-- Update Question -->
							<div class="modal fade" id="marksModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Mark Lists </h4>
							      </div>
							      <div class="modal-body">
							      	<div id="marksModalMsg" ></div>
							      		<div id="userInfoTable" >
								       		<div class="table-responsive" > 
											    <table class="table table-hover">
													<thead>
														<tr>
															<th>No</th>
															<th>Name</th>
															<th>Email</th>
															<th>Mobile</th>
															<th>Mark</th>
															<th>Date</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
													<?php
															foreach ($marks as $key => $value) 
															{
																?>
																<tr>
																	<td><?php echo ($key+1); ?></td>
																	<td><?php echo $value->name; ?></td>
																	<td><?php echo $value->email; ?></td>
																	<td><?php echo $value->mobile; ?></td>
																	<td><?php echo $value->marks; ?></td>
																	<td><?php echo date('d-M-Y',$value->date); ?></td>
																	<td><a href="#"  id="deleteUserinfo<?php echo intval($value->userinfo_id); ?>" onclick="deleteUserinfo(<?php echo intval($value->userinfo_id); ?>);" class="remove_fieldOption btn btn-primary btn-xs"> Delete </a></td>
																</tr>
																<?php	
															}
														?>
														</tbody>
												</table>
											</div>
								      </div>
							     </div>	
							    </div>
							  </div>
							</div>
							
		
		<?php } ?>
		
			</div>
			
			<div class="col-sm-6"  >
				<input type="hidden" id="questionnaire_id" value="<?php echo $questionnaire_id ?>" />
				
				<div class="show_questions" >
					<img src="<?php echo  base_url(); ?>images/Loading_Animation.gif" />
				</div>	
			</div>
		</div>	
		
	</div>
	
	<script type="text/javascript" >
		
		
		showquesion();
		
		function showquesion(msg)
		{
			var msg = (msg === undefined) ? false : msg;
			
			var q_id =$('#questionnaire_id').val();
			if ( q_id <= 0  )
			{
				alert( "Invalid Questionnaire Id" );
			}
			
			if ( msg )
			{
				alert(msg);
			}
			
			
			$.ajax(
			{
				type: "POST",
				url: "<?php echo base_url(); ?>admin/questionnaires/getQuestionsDataByAJAX",
				data: 'q_id=' + q_id,
				dataType:'html',
				cache: false,
				success: 
					function(data)
					{
						$('.show_questions').empty();
						$('.show_questions').html(data);
					}	
					
			});
			
		}
		
	
	function updateQuest( quest_id )
		{
			if ( quest_id <= 0  )
			{
				alert( "Invalid Question Id or Questionnaire Id" );
			}
			
			var update_quest = $('#updatequest'+quest_id).val();
			var update_cat_id = $('#update_cat_id'+quest_id).val();
			
			var data = 'quest_id=' + quest_id +'&update_quest='+update_quest+'&update_category_id='+update_cat_id;
			
			$.ajax(
			{
				type: "POST",
				url: "<?php echo base_url(); ?>admin/questionnaires/updateQuestion",
				data: data,
				 cache: false,
				success: 
					function(data)
					{
						$('#myModal'+quest_id).modal('hide');
						showquesion(data);
						
					}	
			});
			
		}	
			
		
		function deleteQuest( quest_id )
		{
			if ( quest_id <= 0)
			{
				alert( "Invalid Question ID" );
			}
			
			// working now 9-2-2015
			// return false;
			
			var data = 'quest_id=' + quest_id ;
			
			$.ajax(
			{
				type: "POST",
				url: "<?php echo base_url(); ?>admin/questionnaires/deleteQuestion",
				data: data,
				 cache: false,
				success: 
					function(data)
					{
						$('#myModalDelete'+quest_id).modal('hide');
						showquesion(data);
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
            $(wrapper).append('<div> '+x+' : <input type="text" class="myquestlist" name="myquest['+x+']" size="40" placeholder="Add Question" /> <select name="category_id['+x+']" class="category_ids" > <option  selected value="" > Select A Category </option>  <option value="1"> Contribution </option> <option value="2"> Growth </option> <option value="3"> Love & connection </option> <option value="4"> Certainty </option> <option value="5"> Variety / Uncertainty </option> <option value="6"> Significance </option> <option value="0"> Other </option></select>  <a href="#" class="remove_field">Remove</a> </div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })

}); 
	
	function deleteUserinfo( user_id )
	{
			if ( user_id <= 0  )
			{
				alert( "Invalid UserInfos." );
			}
			
			$.ajax(
			{
				type: "POST",
				url: "<?php echo base_url(); ?>admin/user/deleteUserinfoByUserId",
				data: "u_id="+user_id,
				 cache: false,
				success: 
					function(data)
					{
						$('#marksModalMsg').html('<b> '+data+' </b>');
						$('#marksModalMsg').css("background-color","#5BC0DE");
						
						$('#userInfoTable').empty();
						var q_id =$('#questionnaire_id').val();
						
						$.ajax(
						{
							type: "POST",
							url: "<?php echo base_url(); ?>admin/user/showMarksByQnId",
							data: "qn_id="+q_id,
							cache: false,
							success: 
								function(data)
								{
									$('#userInfoTable').html(data);
								}
						});
						
						//
						
						//showquesion(data);
					}
						
			});
		}
		
		function validation()
		{
			var result = true;
			
			$('.myquestlist').each(function() {
				
				    if (($(this).val()=="")) {
				        result = false;
				         // Terminate the .each loop
				    }
				    
				})
				
				var category_idmsg = true;
				$('.category_ids').each(function() {
				
				    if (($(this).val()=="")) {
				        category_idmsg = false;
				         // Terminate the .each loop
				    }
				    
				})
				
				if(!result)
				{
					alert('Question cannot be empty.');
					return false;	
				}
				
				if(!category_idmsg)
				{
					alert('Selected Category.');	
					return false;
				}
				
				return true;
				
		}

	</script>	
</body>
</html>