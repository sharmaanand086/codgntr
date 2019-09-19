<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require(APPPATH."third_party/infusionsoft/isdk.php");	

class Questionnaires_model extends CI_Model 
{
	
	function getAllQuestionnaire()
	{ 
		$questionnaires = $this->db->get('questionnaires_info')->result_array();
		return $questionnaires;
	}
	
	function getQuestionnaire( $id )
	{
		if ( $id < 0) 
		{
			return 0;	
		}
		
		$this->db->where('questionnaire_id', $id );
    	$res = $this->db->get('questionnaires_info')->result();
		
    	return $res;
	}
	
	
	
	function addQuestionnaire($row)
	{
		if ( (!isset($row) ) || (!$row['title']) )  
		{
			return 0;	
		}
		
		$d = date("Y/m/d");
		
		$data = array();
		$data['title'] 		= ucfirst($row['title']);
		$data['per_page'] 	= $row['per_page'];
		$data['min_desc'] 	= $row['ShortDescription'];
		$data['date'] 		= $d;
		$data['status'] 	= $row['status'];
		$data['minutes'] 	= $row['minutes'];
		$data['seconds'] 	= $row['seconds'];
		
		return $this->db->insert('questionnaires_info', $data );
	}
	
	
	function updateQuestionnaire($row)
	{
		if ( !isset($row) ) 
		{
			return 0;	
		}
		
		$data = array();
		$data['title'] 		= $row['title'];
		$data['min_desc'] 	= $row['min_desc'];
		$data['per_page'] 	= $row['per_page'];
		$data['status'] 	= $row['status'];
		$data['minutes'] 	= $row['minutes'];
		$data['seconds'] 	= $row['seconds'];
		
		
		$this->db->where('questionnaire_id', $row['questionnaire_id'] );
        $query = $this->db->update('questionnaires_info', $data);

                if( $query){
                    return true;
                }else{
                    return false;
                }
		
		return 0;
		
	}
	
	 function deleteQuestionnaire( $questionnaire_id )
	 {
		$questionnaire_id = intval($questionnaire_id);
		if( $questionnaire_id  <= 0)
		{
			return FALSE;
		}
		
		$this->deleteQuestionByQuestionnaireId($questionnaire_id );
		
		$this->load->model('user_model');
		$this->user_model->deleteMarksByQuestionnaireId($questionnaire_id);
		
		$this->load->model('Options_model');
		$this->Options_model->deleteOptionByQuestionnaireId($questionnaire_id);
		
		$this->db->where('questionnaire_id', $questionnaire_id);
	    return $this->db->delete('questionnaires_info');
		 
	 }
	 
	 
	 function addQuestionInQuestionnaire()
	 {
	 	$questionnaire_id = (int) $this->input->post('questionnaire_id');
		if ( (!isset($_POST) ) || ($questionnaire_id <= 0 ) )  
		{
			return FALSE;	
		}
		
		$this->db->where('questionnaire_id', $questionnaire_id );
		$this->db->select_max('ordering');
		$result = $this->db->get('questions_info')->row();  
		if( ($result->ordering > 0) )
		{
			$ordering = $result->ordering;
		}
		else{
			$ordering = 0;
		}
		
		$d = date("Y/m/d");
		
		$data = array();
		$data['questionnaire_id'] 	= $questionnaire_id;
		$questions 					= $this->input->post('myquest');
		$data['date'] 				=  $d;
		$category_ids				= $this->input->post('category_id');
		
		foreach ($questions as $key => $value) 
		{
			if($value != "")
			{
				$data['category_id'] = $category_ids[$key];
				$data['question']  = $value;
				$data['ordering'] = $ordering+1;
				
				$this->db->insert('questions_info', $data );	
			}
			
		}
	 	
		return TRUE;
		
	 }
	 
	 


	function deleteQuestion(  )
	{
		$quest_id = $this->input->post('quest_id');
		
		if( $quest_id )
		{
			$this->db->where('question_id', intval($quest_id) );
			$this->db->delete('question_option_info'); 
		}
		
		$this->db->where('question_id', $quest_id);
	    return $this->db->delete('questions_info'); 
	}
	
	
	function deleteQuestionByQuestionnaireId( $qn_id )
	{
		$qn_id = intval($qn_id);
		if( $qn_id  <= 0)
		{
			return FALSE;
		}
		
		$this->db->select('question_id');
		$this->db->where('questionnaire_id', $qn_id );
		
    	$question_infos = $this->db->get('questions_info')->result();
		
		if ( isset($question_infos))
		{
			foreach ($question_infos as $key => $value) 
			{
				$this->db->where('question_id', intval($value->question_id) );
				$this->db->delete('question_option_info'); 
			}
		}
		
		
		$this->db->where('questionnaire_id', $qn_id);
	    return $this->db->delete('questions_info');		
	}
	
	
	
	function updateQuestionInQuestionnaire()
	 {
	 	$question_id = (int) $this->input->post('quest_id');
		
		if ( (!isset($_POST) ) || ($question_id <= 0 ) )  
		{
			return FALSE;	
		}
		
		$data = array();
		$data['question']  		= $this->input->post('update_quest');
		$data['category_id']	= $this->input->post('update_category_id');
		
		/*echo $question_id;
		var_dump( $data['question'] );
		*/
		$this->db->where('question_id', $question_id );
        $query = $this->db->update('questions_info', $data);
		
		
		 if( $query ){
                    return true;
                }else{
                    return false;
                }
				
		
		return 0;
		
	 }
	 
	 
	 function getQuestionsData( $id )
	 {
	 		$id = intval($id);
	 		if( $id <= 0 )
			{
				return FALSE;
			}
			
			$this->db->where('questionnaire_id', $id );
			$this->db->order_by("ordering", "asc");
			$question_info = $this->db->get('questions_info')->result();
			
			 ob_start();
			
			?>
			
			<script>
			
			function group_by_category()
			{
				var category_id = $( '#group_by_category').val();
				var qn_id = $( '#qn_id').val();
				
				if(category_id=="")
				{
					showquesion();
					return false;
				}
				
				
				$.ajax({
								type : "POST",
								url  : "<?php echo base_url(); ?>admin/questionnaires/getQuestionsByQnIdAndCatId",
								data : "qn_id="+ qn_id +"&category_id="+category_id,
								cache: false,
								dataType:'html',
								success :
									function(data)
									{
				
										$('#questionlist'+qn_id).empty();
										$('#questionlist'+qn_id).html(data);
									}
									
							})
				
				
			}
			
			
			
			$('#adv_setting').hide();
			function showAdvSetting()
			{
				$('#adv_setting').toggle();
			}
			
			
			function closeChangeOrdermodal( qn_id, msg )
			{
				$('#changeOrder'+qn_id).modal('hide');
				showquesion(msg);
			}
			
			function saveOrdering( quest_id )
			{
				
				quest_id = parseInt(quest_id)
				
				if( quest_id <= 0 )
				{
					alert('Invalid question Id');
					return false;
				}
				
				var arr = [];
				$('input.question_order').each(function() {
				    var order 		= $(this).val(); 
				    var question_id = $(this).attr('data-sc');
				   	arr.push({'question_id': question_id, 'order': order});
				});
				
				//alert( arr[0]['order'] );
				var jsonString =JSON.stringify(arr);				

				$.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>admin/questionnaires/updateOrderinQuestion/",
					data: 'order_array=' + jsonString +'&quest_id='+quest_id,
					cache: false,
					dataType:'html',
					//dataType: 'json',
					success: 
						function(data)
						{
							$('#changeOrderMsg'+quest_id).html('<b>'+data+'</b>');
							$('#changeOrderMsg'+quest_id).css("background-color","#5BC0DE");
							
							
							$('#questionorder'+quest_id).empty();
							
							
							$.ajax({
								type : "POST",
								url  : "<?php echo base_url(); ?>admin/questionnaires/getQuestionsByQnId",
								data : "qn_id="+ quest_id,
								cache: false,
								dataType:'html',
								success :
									function(data)
									{
										$('#questionorder'+quest_id).html(data);
									}
							})
							
							//$("#parent"+option_id+"r"+quest_id).css("background-color","#EEE");
						}	
				});
				
				
				
				
				
			}
			
			
			function OptionQuestUpdate(option_id,quest_id, opt_id)
			{
				
				opt_id = parseInt(opt_id)
				
				if( opt_id <= 0 )
				{
					alert('Invalid Option Id');
					return false;
				}
				
				var opt_values 	= $("input[id='option_value["+option_id+"v"+quest_id+"]']").val();
				var opt_text 	= $("input[id='option_text["+option_id+"t"+quest_id+"]']").val();
				
				if((opt_text == "") || (opt_text == "Enter text.") ) 
				{
					alert('Enter text.');
					$("#parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='option_text["+option_id+"t"+quest_id+"]']").focus();
					//$("input[id='option_text["+option_id+"t"+quest_id+"]']").val('Enter text.');
					return false;
				}
				
				if( (opt_values == "") || (opt_values == "Enter value.") )  
				{
					alert('Enter value.');
					$("#parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='option_value["+option_id+"v"+quest_id+"]']").val("Enter value.");
					return false;
				}
				 else
				 if ( !(jQuery.isNumeric( opt_values )) )
				{
					alert('Enter number in value.');
					$("#parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='option_value["+option_id+"v"+quest_id+"]']").val("Enter Only Number.");
					return false;
				}
				
				$.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>admin/questionnaires/UpdateOptionInQuest/",
					data: 'opt_values=' + opt_values +'&opt_text='+opt_text+'&opt_id='+opt_id,
					cache: false,
					dataType:'html',
					success: 
						function(data)
						{
							$('#MsgOption'+quest_id).html('<b>'+data+'</b>');
							$('#MsgOption'+quest_id).css("background-color","#5BC0DE");
							
							alert(data);
							$("#parent"+option_id+"r"+quest_id).css("background-color","#EEE");
							
							
						}	
				});
				
			}
			
			function removeOptDelete(option_id,quest_id, opt_id)
			{
				opt_id = parseInt(opt_id)
				
				if( opt_id <= 0 )
				{
					alert('Invalid Option Id');
					return false;
				}
				
				$.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>admin/questionnaires/deleteOptionById",
					data: 'opt_id=' + opt_id,
					cache: false,
					dataType:'html',
					success: 
						function(data)
						{
							$('#remove_fieldOption'+option_id+'move'+quest_id).parent('span').parent('div').parent('div').remove();
							$('#saveOption'+option_id+'move'+quest_id).remove();
							
							$('#MsgOption'+quest_id).html('<b>'+data+'</b>');
							$('#MsgOption'+quest_id).css("background-color","#5BC0DE");
							
							alert(data);
							$("#parent"+option_id+"r"+quest_id).css("background-color","#EEE");
						}
							
				});
				
			}
			
			
			function removeOpt(option_id,quest_id)
			{
				$('#remove_fieldOption'+option_id+'move'+quest_id).parent('span').parent('div').parent('div').remove();
			}
									
									
			function OptionQuest(option_id,quest_id)
			{
				
				if( quest_id <= 0 )
				{
					$("#parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					alert('Invalid Question Id.');
					return false;
				}
				
				//alert(quest_id);
				
				var opt_values 	= $("input[id='option_value["+option_id+"v"+quest_id+"]']").val();
				var opt_text 	= $("input[id='option_text["+option_id+"t"+quest_id+"]']").val();
				
				if((opt_text == "") || (opt_text == "Enter text.") ) 
				{
					alert('Enter text.');
					$("#parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='option_text["+option_id+"t"+quest_id+"]']").focus();
					//$("input[id='option_text["+option_id+"t"+quest_id+"]']").val('Enter text.');
					return false;
				}
				
				if( (opt_values == "") || (opt_values == "Enter value.") )  
				{
					alert('Enter value.');
					$("#parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='option_value["+option_id+"v"+quest_id+"]']").val("Enter value.");
					return false;
				}
				 else
				 if ( !(jQuery.isNumeric( opt_values )) )
				{
					alert('Enter number in value.');
					$("#parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='option_value["+option_id+"v"+quest_id+"]']").val("Enter Only Number.");
					return false;
				}
				
				$.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>admin/questionnaires/AddOptionInQuest",
					data: 'opt_values=' + opt_values +'&opt_text='+opt_text+'&quest_id='+quest_id,
					cache: false,
					
					dataType: 'json',
					success: 
						function(data)
						{
							$('#MsgOption'+quest_id).html('<b>'+data.msg+'</b>');
							$('#MsgOption'+quest_id).css("background-color","#5BC0DE");
							
							alert(data.msg);
							$("#parent"+option_id+"r"+quest_id).css("background-color","#EEE");
							
							$("#newbutton"+option_id+"move"+quest_id).empty();
							
							$("#newbutton"+option_id+"move"+quest_id).append('<button type="button"   onclick="OptionQuestUpdate('+option_id+','+quest_id+','+data.opt_id+');return false;" class="btn btn-primary btn-xs" >Update</button> ');
							$("#newbutton"+option_id+"move"+quest_id).append(' <a href="#" onClick="removeOptDelete('+option_id+','+quest_id+','+data.opt_id+');return false;" id="remove_fieldOption'+option_id+'move'+quest_id+'" class="remove_fieldOption btn btn-primary btn-xs" >Delete</a> ');
						}
							
				});
				
				
			}
			
				$(document).ready(function() {	
					
					
					
										   // var max_fieldsOption      = 10; //maximum input boxes allowed
										    var wrapperOption         = $(".input_fields_wrapOption"); //Fields wrapper
										    var add_buttonOption      = $(".add_field_buttonOption"); //Add button ID
										   

										    var xOption = 1; //initlal text box count
										    var quest_id;
										     var xOption;
										    $(add_buttonOption).click(function(eOption){ //on add input button click
										        eOption.preventDefault();
										      		
										   		 var max_fieldsOption      = 500; 
										   	 
										         quest_id = $(this).attr('data-sc');
										   		 var num = $('#num'+quest_id).val();
												 
												// alert(num);
												 
												  if( parseInt(xOption) == 1 )
												  {
												 		xOption = parseInt(xOption) + parseInt(num);
												  }
												     
											if(xOption < max_fieldsOption){ //max input box allowed
											            xOption++; //text box increment
											        
											      //  $(".input_fields_wrapOptionrr"+quest_id).append('<div class="row" id="parent'+xOption+'r'+quest_id+'" ><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><b> '+xOption+' :</b> </div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><input type="text" name="option_text[]" id="option_text['+xOption+'t'+quest_id+']"  ></div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <input type="text" name="option_value[]" id="option_value['+xOption+'v'+quest_id+']" ></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> <span id="newbutton'+xOption+'move'+quest_id+'" > <button type="button"   onclick="OptionQuest('+xOption+','+quest_id+');return false;" class="btn btn-primary btn-xs" >Save</button>  <a href="#" onClick="removeOpt('+xOption+','+quest_id+');return false;" id="remove_fieldOption'+xOption+'move'+quest_id+'" class="remove_fieldOption btn btn-primary btn-xs" >Remove</a> </span> </div></div>');
											        
											        $(".input_fields_wrapOptionrr"+quest_id).append('<div class="row" id="parent'+xOption+'r'+quest_id+'" ><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><b>  </b> </div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><input type="text" name="option_text[]" id="option_text['+xOption+'t'+quest_id+']"  ></div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <input type="text" name="option_value[]" id="option_value['+xOption+'v'+quest_id+']" ></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> <span id="newbutton'+xOption+'move'+quest_id+'" > <button type="button"   onclick="OptionQuest('+xOption+','+quest_id+');return false;" class="btn btn-primary btn-xs" >Save</button>  <a href="#" onClick="removeOpt('+xOption+','+quest_id+');return false;" id="remove_fieldOption'+xOption+'move'+quest_id+'" class="remove_fieldOption btn btn-primary btn-xs" >Remove</a> </span> </div></div>');
											        
											        }	
										       
										    });
										    
										  
										   /* $(wrapperOption).on("click",".remove_fieldOption", function(eOption){ //user click on remove text
										       
										        eOption.preventDefault(); $(this).parent('div').parent('div').remove(); xOption--;
										    })*/
				}); 
				
				////////////////////// common option ///////////////////////////////////
				
				
			function commonOptionQuestUpdate(option_id,quest_id, opt_id)
			{
				opt_id = parseInt(opt_id)
				
				if( opt_id <= 0 )
				{
					alert('Invalid Option Id');
					return false;
				}
				
				var opt_values 	= $("input[id='common_option_value["+option_id+"v"+quest_id+"]']").val();
				var opt_text 	= $("input[id='common_option_text["+option_id+"t"+quest_id+"]']").val();
				
				
				if((opt_text == "") || (opt_text == "Enter text.") ) 
				{
					alert('Enter text.');
					$("#common_parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='common_option_text["+option_id+"t"+quest_id+"]']").focus();
					//$("input[id='option_text["+option_id+"t"+quest_id+"]']").val('Enter text.');
					return false;
				}
				
				if( (opt_values == "") || (opt_values == "Enter value.") )  
				{
					alert('Enter value.');
					$("#common_parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='common_option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='option_value["+option_id+"v"+quest_id+"]']").val("Enter value.");
					return false;
				}
				 else
				 if ( !(jQuery.isNumeric( opt_values )) )
				{
					alert('Enter number in value.');
					$("#common_parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='common_option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='option_value["+option_id+"v"+quest_id+"]']").val("Enter Only Number.");
					return false;
				}
				
				$.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>admin/questionnaires/UpdateOptionInQuest",
					data: 'opt_values=' + opt_values +'&opt_text='+opt_text+'&opt_id='+opt_id,
					cache: false,
					dataType:'html',
					success: 
						function(data)
						{
							$('#commonMsgOption'+quest_id).html('<b>'+data+'</b>');
							$('#commonMsgOption'+quest_id).css("background-color","#5BC0DE");
							
							alert(data);
							$("#common_parent"+option_id+"r"+quest_id).css("background-color","#EEE");
							
							
						}	
				});
				
			}	
				
				
			function commonRemoveOptDelete(option_id,quest_id, opt_id)
			{
				opt_id = parseInt(opt_id)
				
				if( opt_id <= 0 )
				{
					alert('Invalid Questionnaire Id');
					return false;
				}
				
				$.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>admin/questionnaires/deleteOptionById",
					data: 'opt_id=' + opt_id,
					cache: false,
					dataType:'html',
					success: 
						function(data)
						{
							$('#remove_fieldOption'+option_id+'move'+quest_id).parent('span').parent('div').parent('div').remove();
							$('#common_saveOption'+option_id+'move'+quest_id).remove();
							
							$('#commonMsgOption'+quest_id).html('<b>'+data+'</b>');
							$('#commmonMsgOption'+quest_id).css("background-color","#5BC0DE");
							
							alert(data);
							$("#common_parent"+option_id+"r"+quest_id).css("background-color","#EEE");
							
						}
							
				});
				
			}
			
			function commonOptionQuest(option_id,quest_id)
			{
				
				if( quest_id <= 0 )
				{
					$("#common_parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					alert('Invalid Question Id.');
					return false;
				}
				
				//alert(quest_id);
				
				var opt_values 	= $("input[id='common_option_value["+option_id+"v"+quest_id+"]']").val();
				var opt_text 	= $("input[id='common_option_text["+option_id+"t"+quest_id+"]']").val();
				
				if((opt_text == "") || (opt_text == "Enter text.") ) 
				{
					alert('Enter text.');
					$("#common_parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='common_option_text["+option_id+"t"+quest_id+"]']").focus();
					//$("input[id='common_option_text["+option_id+"t"+quest_id+"]']").val('Enter text.');
					return false;
				}
				
				if( (opt_values == "") || (opt_values == "Enter value.") )  
				{
					alert('Enter value.');
					$("#common_parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='common_option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='common_option_value["+option_id+"v"+quest_id+"]']").val("Enter value.");
					return false;
				}
				 else
				 if ( !(jQuery.isNumeric( opt_values )) )
				{
					alert('Enter number in value.');
					$("#common_parent"+option_id+"r"+quest_id).css("background-color","#D43F3A");
					$("input[id='common_option_value["+option_id+"v"+quest_id+"]']").focus();
					//$("input[id='common_option_value["+option_id+"v"+quest_id+"]']").val("Enter Only Number.");
					return false;
				}
				
				$.ajax(
				{
					type: "POST",
					url: "<?php echo base_url(); ?>admin/questionnaires/AddCommonOptionByQuestionnaireId",
					data: 'opt_values=' + opt_values +'&opt_text='+opt_text+'&qn_id='+quest_id,
					cache: false,
					
					dataType: 'json',
					success: 
						function(data)
						{
							$('#commonMsgOption'+quest_id).html('<b>'+data.msg+'</b>');
							$('#commonMsgOption'+quest_id).css("background-color","#5BC0DE");
							
							alert(data.msg);
							
							$("#common_parent"+option_id+"r"+quest_id).css("background-color","#EEE");
							
							$("#common_newbutton"+option_id+"move"+quest_id).empty();
							
							$("#common_newbutton"+option_id+"move"+quest_id).append('<button type="button"   onclick="commonOptionQuestUpdate('+option_id+','+quest_id+','+data.opt_id+');return false;" class="btn btn-primary btn-xs" >Update</button> ');
							$("#common_newbutton"+option_id+"move"+quest_id).append(' <a href="#" onClick="commonRemoveOptDelete('+option_id+','+quest_id+','+data.opt_id+');return false;" id="remove_fieldOption'+option_id+'move'+quest_id+'" class="remove_fieldOption btn btn-primary btn-xs" >Delete</a> ');
							
						}	
				});
			
			}
				
				
				// common options
				$(document).ready(function() {	
					

										    var xOp = 1; //initlal text box count
										    var quest_id;
										    // var xOp;
										    $(".common_add_field_buttonOption").click(function(eOpt){ //on add input button click
										        eOpt.preventDefault();
										      		
										   		 var common_max_fieldsOption      = 9; 
										   	 
										         quest_id = $(this).attr('data-sc');
										       	 var num = $('#common_num'+quest_id).val();
												 alert(quest_id);
												
												 if( parseInt(xOp) == 1 )
												  {
												 		xOp = parseInt(xOp) + parseInt(num);
												  }
												     
												if(xOp < common_max_fieldsOption)
												{ //max input box allowed
											        xOp++; //text box increment
											        $(".common_input_fields_wrapOptionrr"+quest_id).append('<div class="row" id="common_parent'+xOp+'r'+quest_id+'" ><div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"><b> '+xOp+' : </b> </div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"><input type="text" name="common_option_text[]" id="common_option_text['+xOp+'t'+quest_id+']"  ></div><div class="col-xs-4 col-sm-4 col-md-4 col-lg-4"> <input type="text" name="common_option_value[]" id="common_option_value['+xOp+'v'+quest_id+']" ></div><div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> <span id="common_newbutton'+xOp+'move'+quest_id+'" > <button type="button"   onclick="commonOptionQuest('+xOp+','+quest_id+');return false;" class="btn btn-primary btn-xs" >Save</button>  <a href="#" onClick="removeOpt('+xOp+','+quest_id+');return false;" id="remove_fieldOption'+xOp+'move'+quest_id+'" class="common_remove_fieldOption btn btn-primary btn-xs" >Remove</a> </span> </div></div>');
											    }	
										      
										     // alert('sss');
										      
										    });
										  
				});
			</script>
			
			<div class="questionslist" >
				<?php 
					
					if( $question_info )
					{
						?>
				<div class="jumbotron">
					<div class="row">
						<div class="col-sm-8">
							<h3>Questions :</h3>
							<input type="hidden" value="<?php echo intval($question_info[0]->questionnaire_id); ?>" id="qn_id" >
					  	</div>
						<div class="col-sm-4">
							<button class="btn btn-primary" onclick="showAdvSetting();" > Advance Setting </button>
					  </div>	
					</div>
					  <hr/>
					  <div id="adv_setting" style="background-color: #F5F5F5;" > 
						  		<pre>* : Show Common Options if option are not presented in any question.<br/><a href="#" data-toggle="modal"  data-target="#commonOpt<?php echo $id; ?>" class="btn btn-primary btn-sm "> Common Options </a></pre> 
								<pre>* : Change Question Sequence.<br/><a href="#" data-toggle="modal"  data-target="#changeOrder<?php echo $id; ?>" class="btn btn-primary btn-sm "> Change Ordering </a> </pre>
					 </div>	
					 	<br/>
					 			<b> Category : </b> 
					 			<select name="group_by_category" onchange="group_by_category();"  id="group_by_category" >
						    	 	  <option  selected value="" > All </option> 
									  <option value="1"> Contribution </option>
									  <option value="2"> Growth </option>
									  <option value="3"> Love & connection </option>
									  <option value="4"> Certainty </option>
									  <option value="5"> Variety / Uncertainty </option>
									  <option value="6"> Significance </option>
									  <option value="0"> Other </option>
								</select>
					 			<br/>
					 			<br/>
					 	<div id="questionlist<?php echo $id; ?>" > 		
						<?php
						
						foreach ($question_info as $key => $value) 
						{
							echo '<b>'.($key+1).' : </b> '.$value->question.' ? ';
							
						?>
						
						<div class="align-right" >
						  		<!-- Link trigger modal -->
							<a href="#" data-toggle="modal"  data-target="#myModal<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm "> Update </a>
							<a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm"> Delete </a>
							<a href="#" data-toggle="modal" data-target="#myModalOption<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm"> Options </a>
							 
						</div>
						<br/>
						
							<!-- Update Question -->
							<div class="modal fade" id="myModal<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Update Question </h4>
							      </div>
							      <div class="modal-body">
							       		Question : 
							       		<input type="text" name="update_quest" id="updatequest<?php echo $value->question_id; ?>" value="<?php echo $value->question; ?>"  />
							       		<br/>
							       		<br/>
							       		Category : 
							       		<select name="update_category_id" id="update_cat_id<?php echo $value->question_id; ?>" >
								    	 	  <!--<option value="-1" selected > Select A Category </option> -->
											  <option value="1" <?php echo ( (intval($value->category_id)==1) ) ? 'selected="selected"' : "" ; ?> > Contribution </option>
											  <option value="2" <?php echo ( (intval($value->category_id)==2) ) ? 'selected="selected"' : "" ; ?> > Growth </option>
											  <option value="3" <?php echo ( (intval($value->category_id)==3) ) ? 'selected="selected"' : "" ; ?> > Love & connection </option>
											  <option value="4" <?php echo ( (intval($value->category_id)==4) ) ? 'selected="selected"' : "" ; ?> > Certainty </option>
											  <option value="5" <?php echo ( (intval($value->category_id)==5) ) ? 'selected="selected"' : "" ; ?> > Variety / Uncertainty </option>
											  <option value="6" <?php echo ( (intval($value->category_id)==6) ) ? 'selected="selected"' : "" ; ?> > Significance </option>
											  <option value="0" <?php echo ( (intval($value->category_id)==0) ) ? 'selected="selected"' : "" ; ?> > Other </option>
										</select>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary" onclick="updateQuest(<?php echo $value->question_id; ?> );return false;" > Update </button>
							      </div>
							    </div>
							  </div>
							</div>
							
							<!-- Delete Question -->
							<div class="modal fade" id="myModalDelete<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
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
							
							<!-- Option Question -->
							<div class="modal fade" id="myModalOption<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel"  >Options in Question : </h4>
							        <div><?php echo $value->question; ?> ? </div>
							      </div>
							      <div class="modal-body">
							      			<?php  //var_dump($value->question_id); ?>
							      	<div id="MsgOption<?php echo $value->question_id; ?>"> </div>
							      			<?php
							      				$options = $this->getOptionsByQuestionIdInAJAX($value->question_id); 
							      			?>
							       			<div class="input_fields_wrapOptionrr<?php echo $value->question_id; ?>" >
							       					
								       				<div class="row">
								       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
								       						<b> No </b>
								     					</div>
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								     						<b> Text</b>
								     					</div>
								       					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								       						<b> Value</b>
								     					</div>
								     				</div>  			
								       				
								       				<?php
								       					$num = 1;
								       				 	if( isset($options) )
									       				{
									       					$letter = range("1","10");
															
									       					foreach ($options as $optkey => $optvalue) 
									       					{
									       						$num++;
																?>
										       					<div class="row" id="parent<?php echo $letter[$optkey]; ?>r<?php echo $optvalue->question_id; ?>" >
											       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
											       						<b> <?php echo $letter[$optkey]; ?> :</b>
											     					</div>
											       					
											     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											     						<input type="text" name="option_text[<?php echo $letter[$optkey]; ?>t<?php echo $optvalue->question_id; ?>]" id="option_text[<?php echo $letter[$optkey]; ?>t<?php echo $optvalue->question_id; ?>]" value="<?php echo $optvalue->text; ?>"  >
											     					</div>
											     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											       						<input type="text" name="option_value[<?php echo $letter[$optkey]; ?>v<?php echo $optvalue->question_id; ?>]" id="option_value[<?php echo $letter[$optkey]; ?>v<?php echo $optvalue->question_id; ?>]" value="<?php echo $optvalue->value; ?>" >
											     					</div>
											     					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> 
											     						<span id="newbutton<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->question_id; ?>" >
											     							<button type="button" id="saveOption<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->question_id; ?>"  onclick="OptionQuestUpdate(<?php echo $letter[$optkey]; ?>,<?php echo $optvalue->question_id; ?>,<?php echo $optvalue->option_id; ?>);return false;" class="btn btn-primary btn-xs"> Update </button> 
											     							<a href="#"  id="remove_fieldOption<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->question_id; ?>" onclick="removeOptDelete(<?php echo $letter[$optkey]; ?>,<?php echo $optvalue->question_id; ?>,<?php echo $optvalue->option_id; ?>);return false;" class="remove_fieldOption btn btn-primary btn-xs"> Delete </a>
											     						</span>   														
											     					</div>
											     				</div>
										       					<?php	
									       					   }
									       				}
									       				else{
									       					echo "Please Add Options";
									       				}
														
														
									       				?>
								       				<input type="hidden" id="num<?php echo $value->question_id; ?>" value="<?php echo ($num-1); ?>" />
								       				
								       				<div class="row" id="parent<?php echo $num; ?>r<?php echo $value->question_id; ?>" >
								       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
								       						<b> <?php echo $num; ?> :</b>
								     					</div>
								       					
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								     						<input type="text" name="option_text[<?php echo $num; ?>t<?php echo $value->question_id; ?>]" id="option_text[<?php echo $num; ?>t<?php echo $value->question_id; ?>]"  >
								     					</div>
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								       						<input type="text" name="option_value[<?php echo $num; ?>v<?php echo $value->question_id; ?>]" id="option_value[<?php echo $num; ?>v<?php echo $value->question_id; ?>]"  >
								     					</div>
								     					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								     						<span id="newbutton<?php echo $num; ?>move<?php echo $value->question_id; ?>" > 
								     							<button type="button" id="saveOption<?php echo $num; ?>move<?php echo $value->question_id; ?>" onclick="OptionQuest(<?php echo $num; ?>,<?php echo $value->question_id; ?>);return false;" class="btn btn-primary btn-xs">Save</button> 
								     							<a href="#"  id="remove_fieldOption<?php echo $num; ?>move<?php echo $value->question_id; ?>" onclick="removeOpt(<?php echo $num; ?>,<?php echo $value->question_id; ?>);return false;" class="remove_fieldOption btn btn-primary btn-xs">Remove</a>
								     						</span>   														
								     					</div>
								     				</div>
								     			
													</div>
													 </div>
												      <div class="modal-footer">
												      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												        <button class="add_field_buttonOption btn btn-primary btn-sm" data-sc="<?php echo $value->question_id; ?>"  >Add More Option </button>
												      </div>
												    </div>
												  </div>
												</div>
									
						<?php
						}
					?>
					</div>
					
					<div class="modal fade" id="commonOpt<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel"  >Common Options For Questions : </h4>
							      </div>
							      <div class="modal-body">
							      	
							      	<div>
							      		<h7> Default Common Option Show if not add common option and options in question :  </h7> 
							      		<ul style="list-style-type: decimal;" >
												<li><input type="radio" name="abc" value="10" > Yes ( 10 mark )</li>
												<li><input type="radio" name="abc" value="5" > No ( 5 mark )</li>
												<li><input type="radio" name="abc" value="0"  > Partly ( 0 mark )</li>
										</ul>
									</div>
									
							      	<hr/>		
							      	<div id="commonMsgOption<?php echo $id; ?>"> </div>
							      			<?php
							      				$commonoptions = $this->getOptionsByQuestionnaireIdInAJAX($id); 
							      			?>
							      			
							       			<div class="common_input_fields_wrapOptionrr<?php echo $id; ?>" >
							       					
								       				<div class="row">
								       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
								       						<b> No </b>
								     					</div>
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								     						<b> Text</b>
								     					</div>
								       					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								       						<b> Value</b>
								     					</div>
								     				</div>  			
								       				
								       				<?php 
								       					$num = 1;
								       				 	 if( isset($commonoptions) )
									       				{
									       					$letter = range("1","10");
															
									       					foreach ($commonoptions as $optkey => $optvalue) 
									       					{
									       						$num++;
																?>
										       					<div class="row" id="common_parent<?php echo $letter[$optkey]; ?>r<?php echo $optvalue->questionnaire_id; ?>" >
											       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
											       						<b> <?php echo $letter[$optkey]; ?> :</b>
											     					</div>
											       					
											     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											     						<input type="text" name="common_option_text[<?php echo $letter[$optkey]; ?>t<?php echo $optvalue->questionnaire_id; ?>]" id="common_option_text[<?php echo $letter[$optkey]; ?>t<?php echo $optvalue->questionnaire_id; ?>]" value="<?php echo $optvalue->text; ?>"  >
											     					</div>
											     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											       						<input type="text" name="common_option_value[<?php echo $letter[$optkey]; ?>v<?php echo $optvalue->questionnaire_id; ?>]" id="common_option_value[<?php echo $letter[$optkey]; ?>v<?php echo $optvalue->questionnaire_id; ?>]" value="<?php echo $optvalue->value; ?>" >
											     					</div>
											     					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> 
											     						<span id="common_newbutton<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->questionnaire_id; ?>" >
											     							<button type="button" id="common_saveOption<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->questionnaire_id; ?>"  onclick="commonOptionQuestUpdate(<?php echo $letter[$optkey]; ?>,<?php echo $optvalue->questionnaire_id; ?>,<?php echo $optvalue->option_id; ?>);return false;" class="btn btn-primary btn-xs"> Update </button> 
											     							<a href="#"  id="remove_fieldOption<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->questionnaire_id; ?>" onclick="commonRemoveOptDelete(<?php echo $letter[$optkey]; ?>,<?php echo $optvalue->questionnaire_id; ?>,<?php echo $optvalue->option_id; ?>);return false;" class="remove_fieldOption btn btn-primary btn-xs"> Delete </a>
											     						</span>   														
											     					</div>
											     				</div>
										       					<?php	
									       					   }
									       				}
									       				
														
								       				?>
								       				
								       				<input type="hidden" id="common_num<?php echo $id; ?>" value="<?php echo ($num-1); ?>" />
								       				
								       				<div class="row" id="common_parent<?php echo $num; ?>r<?php echo $id; ?>" >
								       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
								       						<b> <?php echo $num; ?> :</b>
								     					</div>
								       					
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								     						<input type="text" name="common_option_text[<?php echo $num; ?>t<?php echo $id; ?>]" id="common_option_text[<?php echo $num; ?>t<?php echo $id; ?>]"  >
								     					</div>
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								       						<input type="text" name="common_option_value[<?php echo $num; ?>v<?php echo $id; ?>]" id="common_option_value[<?php echo $num; ?>v<?php echo $id; ?>]"  >
								     					</div>
								     					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								     						<span id="common_newbutton<?php echo $num; ?>move<?php echo $id; ?>" > 
								     							<button type="button" id="common_saveOption<?php echo $num; ?>move<?php echo $id; ?>" onclick="commonOptionQuest(<?php echo $num; ?>,<?php echo $id; ?>);return false;" class="btn btn-primary btn-xs">Save</button> 
								     							<a href="#"  id="remove_fieldOption<?php echo $num; ?>move<?php echo $id; ?>" onclick="removeOpt(<?php echo $num; ?>,<?php echo $id; ?>);return false;" class="remove_fieldOption btn btn-primary btn-xs">Remove</a>
								     						</span>   														
								     					</div>
								     				</div>
								     			
													</div>
													 </div>
												      <div class="modal-footer">
												      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												        <button class="common_add_field_buttonOption btn btn-primary btn-sm" data-sc="<?php echo $id; ?>"  >Add More Option </button>
												      </div>
												    </div>
												  </div>
												</div>
												
												<?php //////////////// Change Ordering //////////////////////// ?>
												
												<div class="modal fade" id="changeOrder<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
												  <div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												        <h4 class="modal-title" id="myModalLabel"  >Change Questions Order : </h4>
												      </div>
													      	<div class="modal-body">
													 			<div id="changeOrderMsg<?php echo $id; ?>"> </div>
													 			<div id="questionorder<?php echo $id; ?>">
													      			<?php
																		foreach ($question_info as $key => $value) 
																		{
																			echo '<b><input type="text" size="1"  id="order_'.$value->question_id.'"  data-sc="'.$value->question_id.'"  name="questionorder['.$value->question_id.']" value="'.($key+1).'" class="question_order" /> : </b> '.$value->question.' ? <br/>';
																		}
																	?>
																</div>
										      				</div>
														    <div class="modal-footer">
														    	<!--onclick="showquesion();" -->
														      	<button type="button"   onclick="closeChangeOrdermodal(<?php echo $id; ?>,' Update Question Sequence ');"	class="btn btn-default" data-dismiss="modal">Close</button>
														      	<button type="button"  	onclick="saveOrdering(<?php echo $id; ?>);return false;" class="btn btn-primary" > Save </button>
														        
														      </div>
														    </div>
												  </div>
												</div>
												
												<?php  ?>
												
				</div>			
				<?php
						}
				?>
				</div>
			<?php
			
		return  $output = ob_get_clean();
	 }
	 
	 
	 	
	 	////////////////////////////////Start Option////////////////////////////////////////////
	 	
	 	function getOptionsByQuestionIdInAJAX($q_id)
		{
			$this->load->model('Options_model');
			return  $this->Options_model->getOptionsByQuestionId( $q_id );
		}
		
		////////////////////////////////End Option////////////////////////////////////////////
		
	 
		////////////////////////////////Start Common Option////////////////////////////////////////////
	 	
	 	function getOptionsByQuestionnaireIdInAJAX($qn_id)
		{
			$this->load->model('Options_model');
			return  $this->Options_model->getOptionsByQuestionnaireId( $qn_id );
		}
		
		////////////////////////////////End Common Option////////////////////////////////////////////
			
	
		//////////////////////////////// Start Question ////////////////////////////////////////////
	 	
	 	function updateOptionInQuestionByAjax()
		{
			
	
			$question_id = (int) $this->input->post('quest_id');
		
			if ( (!isset($_POST) ) || ($question_id <= 0 ) )  
			{
				return FALSE;	
			}
			
			$ordering_array = json_decode(stripslashes($_POST['order_array']));
			if ( !empty($ordering_array) ) 
			{
				foreach ($ordering_array as $key => $value) 
				{
					$data = array();
					$data['ordering']  	= intval( $value->order );
					$this->db->where('question_id', intval( $value->question_id ) );
	        		$this->db->update('questions_info', $data);
				}
				return TRUE;	
			}
			else{
				return FALSE;		
			}
			
	    
		}
		
		 function getQuestionsByQnIdByAjax( $id )
		 {
			 	$id = intval($id);
		 		if( $id <= 0 )
				{
					return FALSE;
				}
					
				$this->db->where('questionnaire_id', $id );
				$this->db->order_by("ordering", "asc");
				$questions_info = $this->db->get('questions_info')->result();
				
				$html = "";
				if ( !empty($questions_info) )
				{
					foreach ($questions_info as $key => $value) 
					{
						$html .='<b><input type="text" size="1"  id="order_'.$value->question_id.'"  data-sc="'.$value->question_id.'"  name="questionorder['.$value->question_id.']" value="'.($key+1).'" class="question_order" /> : </b> '.$value->question.' ? <br/>';
					}
				}
				else{
					$html .="Not get Question";
				}
				
				return $html;
		 }
		
		//////////////////////////////// End Question ////////////////////////////////////////////
					
		function copyQn( $row )
		{
			if ( (!isset($row) ) || (!$row['title']) )  
			{
				return 0;	
			}
			
			$d = date("Y/m/d");
			
			$data = array();
			$data['title'] 				= ucfirst($row['title']);
			$data['per_page'] 			= $row['per_page'];	
			$data['min_desc'] 			= $row['ShortDescription'];
			$data['date'] 				= $d;
			
			$this->db->insert('questionnaires_info', $data );
			$qn_id =  $this->db->insert_id();
			
			$old_qn_id	 				= intval( $row['old_qn_id'] );
			
			if( $old_qn_id > 0)
			{
				$this->db->where('questionnaire_id', $old_qn_id );
				$this->db->order_by("ordering", "asc");
				$questions_info = $this->db->get('questions_info')->result();
					
				if ( !empty($questions_info) )
				{
					$this->load->model('Options_model');
					
					foreach ($questions_info as $key => $value) 
					{
						$data = array();
						$data['questionnaire_id'] 	= $qn_id;
						$data['question'] 			= $value->question;
						$data['ordering'] 			= $value->ordering;
						$data['date'] 				= $d;
						$data['category_id'] 		= $value->category_id;
						
						$this->db->insert('questions_info', $data );
						$quest_id =  $this->db->insert_id();
						
						$old_question_id = $value->question_id;
						
						if( $old_question_id > 0 )
						{
							$this->db->where('question_id', $old_question_id );
    						$options = $this->db->get('question_option_info')->result();
							if( $options )
							{
								foreach ($options as $key2 => $value2) 
								{
									$row = array();
									$row['question_id'] = (int) $quest_id;
									$row['value']  		= $value2->value;
									$row['text']  		= $value2->text;
									
									$this->db->insert('question_option_info', $row);
									
								}
							}
							
							
							
						}	
						
						
					}

						$this->db->where('questionnaire_id', $old_qn_id );
    						$common_options = $this->db->get('question_option_info')->result();
							if( $common_options )
							{
								foreach ($common_options as $key3 => $value3) 
								{
									$row = array();
									$row['questionnaire_id'] = (int) $qn_id;
									$row['value']  		= $value3->value;
									$row['text']  		= $value3->text;
									
									$this->db->insert('question_option_info', $row);
									
								}
							}
						
			
				}
				
			}
			
			return $qn_id;
			 
			 
		}	


function getQuestionsDataByQnAndCatId(  )
{
	
	$id = (int) $this->input->post('qn_id');
		if ( (!isset($_POST) ) || ($id <= 0 ) )  
		{
			return FALSE;	
		}
		
		$category_id = (int) $this->input->post('category_id');
		
		$this->db->where('questionnaire_id', $id );
		$this->db->where('category_id', $category_id );
		$this->db->order_by("ordering", "asc");
    	$question_info = $this->db->get('questions_info')->result();
			
		 ob_start();
			
		?>
					
						<?php
						
						foreach ($question_info as $key => $value) 
						{
							echo '<b>'.($key+1).' : </b> '.$value->question.' ? ';
							
						?>
						
						<div class="align-right" >
						  		<!-- Link trigger modal -->
							<a href="#" data-toggle="modal"  data-target="#myModal<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm "> Update </a>
							<a href="#" data-toggle="modal" data-target="#myModalDelete<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm"> Delete </a>
							<a href="#" data-toggle="modal" data-target="#myModalOption<?php echo $value->question_id; ?>" class="btn btn-primary btn-sm"> Options </a>
							 
						</div>
						<br/>
						
							<!-- Update Question -->
							<div class="modal fade" id="myModal<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel">Update Question </h4>
							      </div>
							      <div class="modal-body">
							       		Question : 
							       		<input type="text" name="update_quest" id="updatequest<?php echo $value->question_id; ?>" value="<?php echo $value->question; ?>"  />
							       		<br/>
							       		<br/>
							       		Category : 
							       		<select name="update_category_id" id="update_cat_id<?php echo $value->question_id; ?>" >
								    	 	  <!--<option value="-1" selected > Select A Category </option> -->
											  <option value="1" <?php echo ( (intval($value->category_id)==1) ) ? 'selected="selected"' : "" ; ?> > Contribution </option>
											  <option value="2" <?php echo ( (intval($value->category_id)==2) ) ? 'selected="selected"' : "" ; ?> > Growth </option>
											  <option value="3" <?php echo ( (intval($value->category_id)==3) ) ? 'selected="selected"' : "" ; ?> > Love & connection </option>
											  <option value="4" <?php echo ( (intval($value->category_id)==4) ) ? 'selected="selected"' : "" ; ?> > Certainty </option>
											  <option value="5" <?php echo ( (intval($value->category_id)==5) ) ? 'selected="selected"' : "" ; ?> > Variety / Uncertainty </option>
											  <option value="6" <?php echo ( (intval($value->category_id)==6) ) ? 'selected="selected"' : "" ; ?> > Significance </option>
											  <option value="0" <?php echo ( (intval($value->category_id)==0) ) ? 'selected="selected"' : "" ; ?> > Other </option>
										</select>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							        <button type="button" class="btn btn-primary" onclick="updateQuest(<?php echo $value->question_id; ?> );return false;" > Update </button>
							      </div>
							    </div>
							  </div>
							</div>
							
							<!-- Delete Question -->
							<div class="modal fade" id="myModalDelete<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
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
							
							<!-- Option Question -->
							<div class="modal fade" id="myModalOption<?php echo $value->question_id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display:none;" >
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							        <h4 class="modal-title" id="myModalLabel"  >Options in Question : </h4>
							        <div><?php echo $value->question; ?> ? </div>
							      </div>
							      <div class="modal-body">
							      			<?php  //var_dump($value->question_id); ?>
							      	<div id="MsgOption<?php echo $value->question_id; ?>"> </div>
							      			<?php
							      				$options = $this->getOptionsByQuestionIdInAJAX($value->question_id); 
							      			?>
							       			<div class="input_fields_wrapOptionrr<?php echo $value->question_id; ?>" >
							       					
								       				<div class="row">
								       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
								       						<b> No </b>
								     					</div>
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								     						<b> Text</b>
								     					</div>
								       					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								       						<b> Value</b>
								     					</div>
								     				</div>  			
								       				
								       				<?php
								       					$num = 1;
								       				 	if( isset($options) )
									       				{
									       					$letter = range("1","10");
															
									       					foreach ($options as $optkey => $optvalue) 
									       					{
									       						$num++;
																?>
										       					<div class="row" id="parent<?php echo $letter[$optkey]; ?>r<?php echo $optvalue->question_id; ?>" >
											       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
											       						<b> <?php echo $letter[$optkey]; ?> :</b>
											     					</div>
											       					
											     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											     						<input type="text" name="option_text[<?php echo $letter[$optkey]; ?>t<?php echo $optvalue->question_id; ?>]" id="option_text[<?php echo $letter[$optkey]; ?>t<?php echo $optvalue->question_id; ?>]" value="<?php echo $optvalue->text; ?>"  >
											     					</div>
											     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											       						<input type="text" name="option_value[<?php echo $letter[$optkey]; ?>v<?php echo $optvalue->question_id; ?>]" id="option_value[<?php echo $letter[$optkey]; ?>v<?php echo $optvalue->question_id; ?>]" value="<?php echo $optvalue->value; ?>" >
											     					</div>
											     					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"> 
											     						<span id="newbutton<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->question_id; ?>" >
											     							<button type="button" id="saveOption<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->question_id; ?>"  onclick="OptionQuestUpdate(<?php echo $letter[$optkey]; ?>,<?php echo $optvalue->question_id; ?>,<?php echo $optvalue->option_id; ?>);return false;" class="btn btn-primary btn-xs"> Update </button> 
											     							<a href="#"  id="remove_fieldOption<?php echo $letter[$optkey]; ?>move<?php echo $optvalue->question_id; ?>" onclick="removeOptDelete(<?php echo $letter[$optkey]; ?>,<?php echo $optvalue->question_id; ?>,<?php echo $optvalue->option_id; ?>);return false;" class="remove_fieldOption btn btn-primary btn-xs"> Delete </a>
											     						</span>   														
											     					</div>
											     				</div>
										       					<?php	
									       					   }
									       				}
									       				else{
									       					echo "Please Add Options";
									       				}
														
														
									       				?>
								       				<input type="hidden" id="num<?php echo $value->question_id; ?>" value="<?php echo ($num-1); ?>" />
								       				
								       				<div class="row" id="parent<?php echo $num; ?>r<?php echo $value->question_id; ?>" >
								       					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
								       						<b> <?php echo $num; ?> :</b>
								     					</div>
								       					
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								     						<input type="text" name="option_text[<?php echo $num; ?>t<?php echo $value->question_id; ?>]" id="option_text[<?php echo $num; ?>t<?php echo $value->question_id; ?>]"  >
								     					</div>
								     					<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
								       						<input type="text" name="option_value[<?php echo $num; ?>v<?php echo $value->question_id; ?>]" id="option_value[<?php echo $num; ?>v<?php echo $value->question_id; ?>]"  >
								     					</div>
								     					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
								     						<span id="newbutton<?php echo $num; ?>move<?php echo $value->question_id; ?>" > 
								     							<button type="button" id="saveOption<?php echo $num; ?>move<?php echo $value->question_id; ?>" onclick="OptionQuest(<?php echo $num; ?>,<?php echo $value->question_id; ?>);return false;" class="btn btn-primary btn-xs">Save</button> 
								     							<a href="#"  id="remove_fieldOption<?php echo $num; ?>move<?php echo $value->question_id; ?>" onclick="removeOpt(<?php echo $num; ?>,<?php echo $value->question_id; ?>);return false;" class="remove_fieldOption btn btn-primary btn-xs">Remove</a>
								     						</span>   														
								     					</div>
								     				</div>
								     			
													</div>
													 </div>
												      <div class="modal-footer">
												      	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												        <button class="add_field_buttonOption btn btn-primary btn-sm" data-sc="<?php echo $value->question_id; ?>"  >Add More Option </button>
												      </div>
												    </div>
												  </div>
												</div>
									
						<?php
						}
					?>
					
			<?php
			
		return  $output = ob_get_clean();
	 }

	
			
}



?>