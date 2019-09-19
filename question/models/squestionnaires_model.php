<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SQuestionnaires_model extends CI_Model 
{ 
    
     function __construct(){
         parent::__construct();
         
	    $this->db2 = $this->load->database('appointment', TRUE);
	    
    }
	function add_coacheswith_client($data) {
        $this->db->insert('schedule', $data);
        if ($this->db->affected_rows() > 0) {
        return true;
        } else {
        return false;
        }
	}
	function getAllQuestionnaire()
	{ 
		$questionnaires = $this->db->get('questionnaires_info')->result_array();
		return $questionnaires;
	}
	 
	  function getQuestionsById( $id )
	 {
	 	 $this->db->where('questionnaire_id', $id );
    	 $question_infos = $this->db->get('questions_info')->result();
		 
		 return $question_infos;
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
	
	function getCategoryByQuestId( $ques_id )
	 {
	 	$this->db->select('category_id');
	 	$this->db->where('question_id', $ques_id );
    	$question_infos = $this->db->get('questions_info')->row();
		
		return $question_infos->category_id;
	 }
			
}

?>