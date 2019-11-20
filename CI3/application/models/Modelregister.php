<?php 

class Modelregister extends CI_Model {


public function addnewuser($data)
{
	return $this->db->insert('students',$data);
}
public function checkuser($data){
	return $this->db->get_where('students',array('email'=>$data));	
}
public function checklink($link){
	return $this->db->get_where('students',array('elink'=>$link));
}
public function activateaccount($data,$link){
	$this->db->where('elink',$link);
	$this->db->update('students',$data);

}
public function checkuserwithPassword($data){
	return $this->db->get_where('students', $data)->result_array();	
}
}