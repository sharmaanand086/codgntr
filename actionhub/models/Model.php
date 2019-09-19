<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {
    public function __construct(){
         parent::__construct();
         
	    $this->db2 = $this->load->database('ninetydays', TRUE);
	    $this->db3 = $this->load->database('securityidentity', TRUE);
	    $this->db4 = $this->load->database('onlinel', TRUE);
    }
    
    public function checkloginassignment($email,$password)
    {
          $this->db->select('*');
		  $this->db->from('2_user');
		  $this->db->where('username',$email);
		  $this->db->where('password',$password);
		 
		  if($query=$this->db->get())
		  {
		      return $query->row_array();
		  }
		  else
		  {
		     return false;
		  }
    }
    
    public function checklogin90days($email,$password)
    {
        $this->db2->select('*');
	    $this->db2->from('login');
	    $this->db2->where('username',$email);
	    $this->db2->where('password',$password);
	 
	    if($query=$this->db2->get())
	    {
	        return $query->row_array();
	    }
	    else
	    {
	        return false;
	    }
    }
    public function checkloginsui($email,$password)
    {
        $this->db3->select('*');
	    $this->db3->from('login');
	    $this->db3->where('username',$email);
	    $this->db3->where('password',$password);
	 
	    if($query=$this->db3->get())
	    {
	        return $query->row_array();
	    }
	    else
	    {
	        return false;
	    }
    }
    
    
    public function checkemailexists_assignment($email)
    {
          $this->db->select('*');
		  $this->db->from('2_user');
		  $this->db->where('username',$email);
		 
		  if($query=$this->db->get())
		  {
		      return $query->row_array();
		  }
		  else
		  {
		     return false;
		  }
    }
    
    public function checkemailexists_90days($email)
    {
        $this->db2->select('*');
	    $this->db2->from('login');
	    $this->db2->where('username',$email);
	 
	    if($query=$this->db2->get())
	    {
	        return $query->row_array();
	    }
	    else
	    {
	        return false;
	    }
    }
    public function checkemailexists_sui($email)
    {
        $this->db3->select('*');
	    $this->db3->from('login');
	    $this->db3->where('username',$email);
	 
	    if($query=$this->db3->get())
	    {
	        return $query->row_array();
	    }
	    else
	    {
	        return false;
	    }
    }
    
    
    public function assignment_totalcount_normal()
    {
        $this->db->select('*');
		$this->db->from('2_assignment');
		 
		if($query=$this->db->get())
	    {
		   return $query->num_rows();;
		}
		else
		{
		   return false;
		}
    }
    
    public function assignment_remaining($id,$assignmentcount)
    {
        $this->db->select('*');
		$this->db->from('submitted');
		$this->db->where('contact_id',$id);
		$this->db->where('assignment_no',$assignmentcount);
		
		if($query=$this->db->get())
	    {
		   return $query->result_array();
		}
		else
		{
		   return false;
		}
    }
    
    public function assignment_remaining_count($id)
    {
        $this->db->select_max('assignment_no');
		$this->db->from('submitted');
		$this->db->where('contact_id',$id);
		
		if($query=$this->db->get())
	    {
		   return $query->row_array();
		}
		else
		{
		   return false;
		}
    }
    function getdata($email)
    {
        $query=$this->db->query("SELECT * FROM `2_user` WHERE `username`='$email'");
        return $query->result();
    }
      function ftimeupdate($email)
    {
        $this->db->query("UPDATE `2_user` SET `ftime`='1' WHERE `username`='$email'");
    }
    public function checkftime($email,$password){
        
        $this->db->select('ftime');
		$this->db->from('2_user');
		$this->db->where('username',$email);
		$this->db->where('password',$password);
			if($query=$this->db->get())
	    {
		   return $query->result_array();
		}
		else
		{
		   return false;
		}
    }
    
    public function updatepassword($email,$password,$hash)
    {
        $this->db->set('password', $password);
        $this->db->where('username', $email);
        $this->db->update('2_user');
        
        $this->db2->set('password', $password);
        $this->db2->where('username', $email);
        $this->db2->update('login');
        
        $this->db3->set('password', $password);
        $this->db3->where('username', $email);
        $this->db3->update('login');
        
        $this->db4->set('user_pass', $hash);
        $this->db4->where('user_email', $email);
        $this->db4->update('wp_olusers');
    }
    
}