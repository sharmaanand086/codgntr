<?php

class MModal extends CI_Model {

public function insertingbatch($array){
	 //$this->db->insert('users',$array);
	// or
      return  $this->db->insert_batch('users',$array);
}
 
}