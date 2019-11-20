<?php 

class ModCrud extends CI_Model {

public function addUser($userData){
	 
     return $this->db->insert('students',$userData);
}
 public function getAllRecords(){
 	return $this->db->get('students');
 }
 public function CheckRecords($id){
 	return $this->db->get_where('students',array('id'=>$id))->result_array();

 }
 public function updatestudent($data,$userid){
 	$this->db->where('id',$userid);
 	return $this->db->update('students',$data);

 }
 public function deleteRecords($id){
 	$this->db->where('id',$id);
 	return $this->db->delete('students');
 }
}