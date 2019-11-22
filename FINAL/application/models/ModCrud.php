<?php

class ModCrud extends CI_Model {

    public function addNewuser($data){
    	//return $this->db->insert('students',$data);  for dynamic change the query
    	$this->db->insert('students',$data);
    	return $this->db->insert_id();
    }
    public function getAllRecords(){
    	$this->db->order_by('stid','desc');
    	return $this->db->get('students');
    }
    public function getLastRecord($stid){

    	return $this->db->get_where('students',array('stid'=>$stid))
    				->result_array();

    }
    public function checkUser($data){
		return $this->db->get_where('students' ,$data)
    				->result_array();
    }
    public function update($data,$id){    	 
    	    $this->db->where('stid',$id);
    	return 	$this->db->update('students',$data);
    }
    
    public function delete($id){    	 
    	    $this->db->where('stid',$id);
    	return 	$this->db->delete('students');
    }
}