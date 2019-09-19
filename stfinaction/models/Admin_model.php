<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Admin_model extends CI_Model
 {
 
    public function login($data) {
    
    $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    
    if ($query->num_rows() == 1) {
    return true;
    } else {
    return false;
    }
    }

    
    public function read_admin_information($username) {
    
    $condition = "username =" . "'" . $username . "'";
    $this->db->select('*');
    $this->db->from('admin');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();
    
    if ($query->num_rows() == 1) {
    return $query->result();
    } else {
    return false;
    }
    }
     
                        
    public function steps_insert($data) {
                  
        // Query to check whether username already exist or not
        $condition = "title =" . "'" . $data['title'] . "'AND " . "v_p =" . "'" . $data['v_p'] . "'";
        $this->db->select('*');
        $this->db->from('step');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
        
        // Query to insert data in database
        $this->db->insert('step', $data);
        if ($this->db->affected_rows() > 0) {
        return true;
        }
        } else {
        return false;
        }
    }
        public function did_delete_row($id){
        $this -> db -> where('id', $id);
        $this -> db -> delete('step');
    }
    public function did_delete_video(){
         $this -> db -> where('id', $id);
        $this -> db -> delete('video');
    }
    public function did_delete_pdfs(){
          $this -> db -> where('id', $id);
        $this -> db -> delete('pdf');
    }
    public function show_allsteps(){
            $q = $this->db->get("step");
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
    }
   	
    public function show_allstepspdf(){
             $condition = "v_p ='p'";
            $this->db->where($condition);
            $q = $this->db->get("step");
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
    }
    
    public function show_allstepsvideo(){
           $condition = "v_p ='v'";
            $this->db->where($condition);
            $q = $this->db->get("step");
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
    }
    
     public function video_insert($data) {
                  
        // Query to check whether username already exist or not
        $condition = "title =" . "'" . $data['title'] . "'AND " . "link =" . "'" . $data['link'] . "'AND " . "stepid =" . "'" . $data['stepid'] . "'";
        $this->db->select('*');
        $this->db->from('video');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
         
        $this->db->insert('video', $data);
        if ($this->db->affected_rows() > 0) {
        return true;
        }
        } else {
        return false;
        }
    }
    
    public function show_allvideo(){
            
            $q = $this->db->get("video");
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
    }
    
    public function pdf_insert($data){
         $condition = "title =" . "'" . $data['title'] . "'AND " . "pdflink =" . "'" . $data['pdflink'] . "'";
        $this->db->select('*');
        $this->db->from('pdf');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
         
        $this->db->insert('pdf', $data);
        if ($this->db->affected_rows() > 0) {
        return true;
        }
        } else {
        return false;
        }
    }
    public function show_allpdf(){
              
            $q = $this->db->get("pdf");
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
    }
     
     public function show_requests(){
        $condition = "status=0";
        $this->db->select('*');
        $this->db->from('requestes');
        $this->db->where($condition);
        $q = $this->db->get();
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
     }
     public function show_requests1(){
        $condition = "status=1";
        $this->db->distinct();
        $this->db->select('userid,name,username,contact,createdat,status');
        $this->db->from('requestes');
        $this->db->group_by('userid');
        $this->db->where($condition);
        $q = $this->db->get();
            if($q->num_rows() > 0)
            {
                return $q->result();
            }
            return array();
     }
    
   
    public function insert_requests($data){
         $condition = "" . "username =" . "'" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('users');
         $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0 )
        { 
            $result = $query->result_array();
            // print_r($result);
          // var_dump($result[0]['allowattmpt']);
         $count =  $result[0]['allowattmpt'];
         $total = $count+1;
         $this->db->set('allowattmpt', $total);
		$this->db->where($condition);
		$result=$this->db->update('users');
	// for request update to 1
	
	    $this->db->select('*');
        $this->db->from('requestes');
         $this->db->set('status','1');
         $this->db->where($condition);
		 $this->db->update('requestes');
	
		return $result;	
        }
    }
    
    public function reject_requests($data){
         $condition = "" . "username =" . "'" . $data['username'] . "'";
        $this->db->select('*');
        $this->db->from('requestes');
         $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0 )
        { 
        $result = $query->result_array();
         $total = 2;
         $this->db->set('status', $total);
		$this->db->where($condition);
		$result=$this->db->update('requestes');
		return $result;	
        }
    }
    
    public function showdateuid($uid){
        $condition = "" . "status =" . "'1' AND " . "userid =" . "'" . $uid . "'";
                            $this->db->select('*');
                            $this->db->from('requestes');
                            $this->db->where($condition);
                            $query3 = $this->db->get();
                            
                            $createdat = $query3->result_array();
                            return $createdat;
    }

}

 