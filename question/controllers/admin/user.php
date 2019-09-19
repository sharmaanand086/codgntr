<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller 
{
	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}
		
	
	
	public function index()
	{
		if( $this->session->userdata('is_logged_in'))
		{
			redirect(base_url().'admin/questionnaires');	
		}
		else{
		
			$this->load->view('admin/login');
		}	
		
	}
	
	public function validation()
	{
		
		$username 	= 	$this->input->post('username');
		$pwd  		=   $this->input->post('pwd') ;
		
		$this->form_validation->set_rules('username', "User Name","trim|required" );
		$this->form_validation->set_rules('pwd', "Password", "trim|required");
	
		if ( $this->form_validation->run() == false) 
		{
			$this->index();
		}
		else {
			$user_id 	= $this->User_model->validate($username, $pwd);
			$uid 		=	intVal($user_id);
			
			if( $uid > 0 )
			{
				$data = array(
					'username' 		=>$username,
					'is_logged_in' 	=> TRUE 
					);
				$this->session->set_userdata($data);
				//$data['message_error'] = false;
				redirect(base_url().'admin/questionnaires');	
			}
			else{
				$data['message_error'] = true;
				$this->load->view('admin/login', $data);
			}	
		}
		
	}
	
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'admin');
	}
	
	function  deleteUserinfoByUserId()
	{
		$u_id = $this->input->post('u_id');
		$res =  $this->User_model->deleteUserinfoByUserId( $u_id );
		if( $res )
		{
			echo "UsersInfo has been delete.";
		}
		else{
			echo "Not delete Userinfo."; 
		}
			
	}
	
	function showMarksByQnId()
	{
		$qn_id  = $this->input->post('qn_id');
		echo $this->User_model->getMarksByQnIdByAjax($qn_id);
	}
		
}
?>