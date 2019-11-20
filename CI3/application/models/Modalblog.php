<?php 

class Modalblog extends CI_Model {

	public function addnewblog($data){
     return $this->db->insert('blogs',$data);
	}
	public function getAllBlogs(){
	 return $this->db->select('blogs.*,students.*')
		->from('blogs')
		->where('bstatus',1)
		->join('students','students.id = blogs.userid')
		->get();
		 
	}
	public function checkblogid($bid){
       $this->db->select('blogs.*,students.*')
		->from('blogs')
		->where('bstatus',1)
		->where('bid',$bid)
		->join('students','students.id = blogs.userid')
		->get()
		->result_array();
	}
}