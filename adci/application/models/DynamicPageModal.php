<?php 

/**
 * 
 */
class DynamicPageModal extends CI_Model
{
	
	public function checkpage($data)
	{
		 return $this->db->get_where('page',array('p_name' => $data['p_name']));
	}
	public function addPage($data){
		 return $this->db->insert('page',$data);
	}

	public function get_all_routes(){
		return $this->db->get_where('page',array('p_status'=>1))->result_array();
	}

	public function checkbypageid($url){
		return 
		 $this->db->get_where('page',array('p_id'=>$url))->result_array();
		//echo $return;
		//echo "<br>";
		//echo $this->db->last_query();
	}
}