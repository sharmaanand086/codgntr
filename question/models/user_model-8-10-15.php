<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require(APPPATH."third_party/infusionsoft/isdk.php");	

class User_model extends CI_Model 
{
	
	function validate( $username , $pwd )
	{
	require(APPPATH."third_party/infusionsoft/isdk.php");
		$app = new iSDK;
		if ($app->cfgCon("connectionName")) 
		{
			$user_id = $app->authenticateUser($username,$pwd);
			return $user_id;
		}
		return FALSE;	
		
		/*
			if ( $username == "admin" && $pwd == "abcdef10" )
			{
				return TRUE;
			}
			else{
				return FALSE;	
			}
		*/
	}
	
	
	 function getMarksByQnId( $qn_id )
	 {
	 	$qn_id = intval($qn_id);
	 	if ( $qn_id < 0) 
		{
			return 0;	
		}
		
		
		$this->db->where('questionnaire_id', $qn_id );
    	$res = $this->db->get('results_userinfos')->result();
		
    	return $res;
		
	 }
	 
	  function deleteMarksByQuestionnaireId( $qn_id )
	 {
	 	$qn_id = intval($qn_id);
	 	if ( $qn_id <= 0) 
		{
			return FALSE;	
		}
			
		$this->db->where('questionnaire_id', $qn_id );
    	return	$this->db->delete('results_userinfos');
    	
	 } 
	 
	
	///////////////////////////// Start Site //////////////////////////
	
	function storeMarks()
	{
		if ( (!isset($_POST) ) || ( empty($_SESSION['email']) )  )  
		{
			return FALSE;	
		}
		
		$data = array();
		$data['questionnaire_id'] 	= (int) $this->input->post('questionnaire_id');
		$data['name']  				= $this->input->post('firstname');
		$data['email']  			= $this->input->post('email');
		$data['mobile']  			= $this->input->post('mobile');
		$data['date']				= strtotime(date('d-m-Y'));
		$data['marks']				= $_SESSION['total'];
									
		if (  empty($data['name']) || empty($data['email'])  )  
		{
			return FALSE;	
		}
		
		$this->db->insert('results_userinfos', $data);
		return $this->db->insert_id();
		
	} 
	
	///////////////////////////// End Site //////////////////////////
	
	
	function deleteUserinfoByUserId( $user_id )
	{
		
		$user_id = intval($user_id);
	 	if ( $user_id <= 0) 
		{
			return FALSE;	
		}
			
		$this->db->where('userinfo_id', $user_id );
    	return	$this->db->delete('results_userinfos');
	}
	
	
	function getMarksByQnIdByAjax($id)
	{
		$marks = $this->getMarksByQnId( $id );
				
		if( $marks )
		{
			
		ob_start();
		?>
				<div class="table-responsive" > 
											    <table class="table table-hover">
													<thead>
														<tr>
															<th>No</th>
															<th>Name</th>
															<th>Email</th>
															<th>mobile</th>
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
																	<td><a href="#"  onclick="deleteUserinfo(<?php echo intval($value->userinfo_id); ?>,<?php echo intval($id); ?>);" class="remove_fieldOption btn btn-primary btn-xs"> Delete </a></td>
																</tr>
																<?php	
															}
														?>
														</tbody>
												</table>
						</div>
		<?php
		}
	}
			
		
}
?>