<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//require(APPPATH."third_party/infusionsoft/isdk.php");	

class Options_model extends CI_Model 
{
	
	 function AddOptionInQuestion( )
	 {
	 	$question_id = (int) $this->input->post('quest_id');
	
		if ( (!isset($_POST) ) || ($question_id <= 0 ) )  
		{
			return FALSE;	
		}
		
		$data = array();
		$data['value']  		= $this->input->post('opt_values');
		$data['text']  			= $this->input->post('opt_text');
		$data['question_id']	= $question_id;
		
		if (  empty($data['value']) || empty($data['text'])  )  
		{
			return FALSE;	
		}
		
        $this->db->insert('question_option_info', $data);
		return $this->db->insert_id();
		
	 }
	 
	 
	 function getOptionsByQuestionId( $quest_id )
	 {
	 	$quest_id = intval($quest_id);
	 	if ( $quest_id < 0) 
		{
			return 0;	
		}
		
		$this->db->where('question_id', $quest_id );
    	$res = $this->db->get('question_option_info')->result();
		
    	return $res;	
		
	 }
	
	 function deleteOption( )
	 {
	 	
	 	if ( (!isset($_POST) )  )  
		{
			return 0;	
		}
		
		$opt_id = $this->input->post('opt_id');
	 	
	 	if ( $opt_id < 0) 
		{
			return 0;	
		}
			
			$this->db->where('option_id', $opt_id );
    	return	$this->db->delete('question_option_info');
    	
	 } 
	
	
	 function deleteOptionByQuestionnaireId( $qn_id )
	 {
	 	$qn_id = intval($qn_id);
	 	if ( $qn_id <= 0) 
		{
			return FALSE;	
		}
			
		$this->db->where('questionnaire_id', $qn_id );
    	return	$this->db->delete('question_option_info');
    	
	 } 
	
	 function updateOptionInQuestion()
	 {
	 	$opt_id = (int) $this->input->post('opt_id');
		
		if ( (!isset($_POST) ) || ($opt_id <= 0 ) )  
		{
			return FALSE;	
		}
		
		$data = array();
		$data['value']  	= $this->input->post('opt_values');
		$data['text']  		= $this->input->post('opt_text');
		
		
		if (  empty($data['value']) || empty($data['text'])  )  
		{
			return FALSE;	
		}
		
		$this->db->where('option_id', $opt_id );
        $query = $this->db->update('question_option_info', $data);
		
		return $query;
		
	 }
	
	
	////////////////////////////////Start Common Option////////////////////////////////////////////
	
	
	function AddCommonOptionByQuestionnaireId()
	 {
	 	$qn_id = (int) $this->input->post('qn_id');
		
		if ( (!isset($_POST) ) || ($qn_id <= 0 ) )  
		{
			return FALSE;	
		}
		
		$data = array();
		$data['value']  			= $this->input->post('opt_values');
		$data['text']  				= $this->input->post('opt_text');
		$data['questionnaire_id']	= $qn_id;
		
		if (  empty($data['value']) || empty($data['text'])  )  
		{
			return 0;	
		}
		
        $this->db->insert('question_option_info', $data);
		return $this->db->insert_id();
		
	 }
	 
	 
	 function getOptionsByQuestionnaireId( $qn_id )
	 {
	 	$qn_id = intval($qn_id);
	 	if ( $qn_id < 0) 
		{
			return 0;	
		}
		
		$this->db->where('questionnaire_id', $qn_id );
    	$res = $this->db->get('question_option_info')->result();
		
    	return $res;	
		
	 }
	 
	
	
	
	//////////////////////////////// End Common Option////////////////////////////////////////////
	
}
?>