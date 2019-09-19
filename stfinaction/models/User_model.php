<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class User_model extends CI_Model
 {
     
       function login($data) {
    
    $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    
    if ($query->num_rows() == 1) {
         $result = $query->result_array();
         if($result[0]['attempts'] == $result[0]['allowattmpt']){
            $this->showpopup($data['username']);
         }
    return true;
    } else {
    return false;
    }
    }
    
      function read_users_information($username) {
    
    $condition = "username =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('users');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    
    if ($query->num_rows() == 1) {
    return $query->result();
     
    } else {
    return false;
    }
    }
    
    function showpopup($username){
          $condition = "username =" . "'" . $username . "'";
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where($condition);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0 )
        { 
            $result = $query->result_array();
             
             return $result;
        }
        
    }
    function updateattempts($username){
         $condition = "username =" . "'" . $username . "'";
         $this->db->select('*');
         $this->db->from('users');
         $this->db->where($condition);
        $query = $this->db->get();
        
        if ($query->num_rows() > 0 )
        { 
            $result = $query->result_array();
            if($result[0]['attempts'] <  $result[0]['allowattmpt']){
             $count =  $result[0]['attempts'];
             $total = $count+1;
            $this->db->set('attempts', $total);
	     	$this->db->where($condition);
	    	$result=$this->db->update('users');
	    	return $query->result_array(); 
          }else{
             
          }
             
        }
        
    }
    
    public function requestfromuserforattempt($data){
         $condition = "" . "username =" . "'" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('users');
         $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0 )
        { 
            
             $data = array(
            'username' => $this->input->post('username'),
            'userid' => $this->input->post('id'),
           'status' =>$this->input->post('status'),
            'contact' =>$this->input->post('contact'),
            'name' =>$this->input->post('name'),
           'createdat' =>$this->input->post('createdat')
            );
		$result=$this->db->insert('requestes',$data);
	//	var_dump($result);
		return $result ; 
        }
    }
    
      public function updatepassword($username,$password)
    {
        $this->db->set('password', $password);
        $this->db->where('username', $username);
        $this->db->update('users');
      
    }
    
     function getallevent()
     {
         $this->db->select('*');
		  $this->db->from('step');
		 
		  if($query=$this->db->get())
		  {
		      return $query->result_array();
		  }
		  else
		  {
		     return false;
		  }
     }
     function getallvideo()
     {
         $this->db->select('*');
		  $this->db->from('video');
		 
		  if($query=$this->db->get())
		  {
		      return $query->result_array();
		  }
		  else
		  {
		     return false;
		  }
     }
     function getallpdf()
     {
         $this->db->select('*');
		  $this->db->from('pdf');
		 
		  if($query=$this->db->get())
		  {
		      return $query->result_array();
		  }
		  else
		  {
		     return false;
		  }
     }
 }