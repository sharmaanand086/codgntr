<?php

/**
 * 
 */
class CustomHelper extends CI_Controller
{
	
	 public function contactus(){
	 	$this->load->view('customhelper');
	 }
	 public function home(){
	 //	echo "working";
	 	$data['email'] = $this->input->post('email',true);
	 	$data['password'] = $this->input->post('password',true);

	 	if(empty($data['email']) || empty($data['password'])){
	 		//echo "string";
	 		//$this->session->set_flashdata('error','Please check the fields');
	 		//redirect('CustomHelper/contactus');
	 		//CustomFlash(error:'',class:'',redirecturl:'');
			CustomFlash('Please fill all the fields ','alert-warning','CustomHelper/contactus');

	 		//$CustomHelper
	 	}else{
	 		echo "fine";
	 	}
	 }
}