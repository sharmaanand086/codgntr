<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('user2');
	}
	
	/*-------- Home -----------*/
	public function index()
	{

		if(isset($_SESSION['loginuser']) == 0)
		{
			$this->course();
		}
		else
		{
			$data['query_result'] = $this->user2->getAssignment();
			$this->load->view('index',$data);
		}
	}
	
	/*-------- Choose Course -----------*/
	public function course()
	{
		$data['query_result'] = $this->user2->getCourse();
        $this->load->view('course', $data);
	}
	
	/*-------- Solution -----------*/
	public function solution()
	{
		if(isset($_SESSION['loginuser']) == 0)
		{
			$this->course();
		}
		else
		{
			$data['query_result'] = $this->user2->getSolutions();
			$this->load->view('solutions', $data);
		}
	}
	
	/*-------- Profile Page -----------*/
	public function profile()
	{
		if(isset($_SESSION['loginuser']) == 0)
		{
			$this->course();
		}
		$data['query_result'] = $this->user2->getProfile();
        $this->load->view('myprofile', $data);
	}
	
	/*-------- Login Page -----------*/
	public function login()
	{
		$cid = (int)$this->uri->segment(3);
		if($cid == 0)
		{
			$this->course();
		}
		else
		{
			$row = $this->user2->getAssignmentDetail($cid);
			if($row != '')
			{
				$val = array('course' => $row,'cid' => $cid);
				$user = $cid."_user";
				$assignment = $cid."_assignment";
				$record = $cid."_record";
				$submission = $cid."_submission";
			$sessiondata = array('courseid' => $cid,'course' => $row, 'user' => $user, 'assignment' => $assignment, 'record' => $record, 'submission' => $submission);
				$this->session->set_userdata($sessiondata);
				if ($this->input->post('Login'))
				{
					$username = $this->input->post("email");
					$password = $this->input->post("password");
					
					$this->form_validation->set_rules("email", "Email Id", "trim|required");
					$this->form_validation->set_rules("password", "Password", "trim|required");
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('login',$val);
					}
					else
					{
						$usr_result = $this->user2->getUser($username, $password, $cid);
						if ($usr_result > 0) //active user record is present
						{
							$contactid = $this->user2->get_contactid($username, $password, $cid);
							$sessiondata1 = array('contactid' => $contactid, 'username' => $username,'loginuser' => 1);
							$this->session->set_userdata($sessiondata1);
							redirect('user');
						}
						else
						{
							$this->session->set_flashdata('usermsg', 'Invalid username and password!');
							$this->load->view('login',$val);
						}
					}
				}
				else
				{
					$this->load->view('login',$val);
				}
			}
			else
			{
				
				$this->load->view('404');
			}
		}
	}
	
	/*-------- Forgot -----------*/
	public function forgot()
	{
		
		$cid = $_SESSION['courseid'];
		$row = $this->user2->getAssignmentDetail($cid);
		if($row != '')
		{
			$error = "";
			$sessiondata = array('courseid' => $cid,'course' => $row);
            $this->session->set_userdata($sessiondata);
			if ($this->input->post('forgot'))
            {
				$username = $this->input->post("email");
				$this->form_validation->set_rules("email", "Email Id", "trim|required");
				if ($this->form_validation->run() == FALSE)
				{
					
				}
				else
				{
					$error = $this->user2->forgot_pass($username, $cid);
				}
				$val = array('course' => $row,'cid' => $cid,'error'=>$error);
				$this->load->view('forgot',$val);
			}
			else
			{
				$val = array('course' => $row,'cid' => $cid,'error'=>$error);
				$this->load->view('forgot',$val);
			}
		}
		else
		{
			$this->load->view('404');
		}
	}
	
	
	/*-------- Change Password -----------*/
	public function changepass()
    {
		if(isset($_SESSION['loginuser']) == 0)
		{
			$this->course();
		}
		else
		{
			$data['query'] = '';
			if ($this->input->post('changePass'))
            {
				$username = $_SESSION['username'];
				$opassword = $this->input->post("opassword");
				$password = $this->input->post("password");
				$rpassword = $this->input->post("rpassword");
			
				$this->form_validation->set_rules("opassword", " Old Password", "trim|required");
				$this->form_validation->set_rules('password', 'Password', 'required|matches[rpassword]');
				$this->form_validation->set_rules('rpassword', 'Retype Password', 'required');
				
				if ($this->form_validation->run() == FALSE)
				{
					$data['query'] = '';
				}
				else
				{
					$data['query'] = $this->user2->change_pass($username,$opassword,$password);
				}
			}
			$this->load->view('changepass', $data);
		}
	}
	
	/*-------- Submit Solution -----------*/
	function do_upload()
	{
		if(isset($_SESSION['loginuser']) == 0)
		{
			$this->course();
		}
		else
		{
			$contactid = $_SESSION['contactid'];
			$aid = (int)$this->uri->segment(3); 
			$status = $this->user2->checkSubmit($aid,$contactid);
		
			if ($this->input->post('submit'))
			{
				$assignment = $_SESSION['assignment'];
				$submission = $_SESSION['submission'];
				$upload_path = "./uploads/".$_SESSION['submission'].'/';
				$file = $_FILES['file'];
				$temp = explode(".",$_FILES["file"]["name"]);
				$extension = end($temp);
				$filename = $contactid."_"."Solution_".$aid.".".$extension;
				if(!empty($_FILES["file"]["name"]))
				{
					if($extension=="docx" || $extension=="doc" || $extension=="pdf" )
					{
						if ( $file['size'] > 5242880 || $file['error'] != 0) // 5 mb
						{
							$fileUploadSuccess = false;
							$this->load->view('upload', array('error' => 'File Size Greater than 5MB or Less Than 1KB','aid'=>$aid,'status'=>$status));
						}
						else
						{
							if(move_uploaded_file( $file['tmp_name'],	$upload_path.$filename ))
							{
								$result = $this->user2->uploadSubmit($aid,$filename);
								$this->load->view('upload', array('error' => $result,'aid'=>$aid,'status'=>$status)); 
							
							}
							else
							{
								$this->load->view('upload', array('error' => 'Problem Occur While Submitting Solution','aid'=>$aid,'status'=>$status)); 
							}
						}
					}
					else
					{
						$this->load->view('upload', array('error' => $extension.' Extension Not Allowed','aid'=>$aid,'status'=>$status)); 
					}
				}
				else
				{
					$this->load->view('editsolution', array('error' =>' Solution file not selected','aid'=>$aid,));
				}
			}
			else
			{
				$this->load->view('upload', array('error' => 'Note: Extension Allowed doc|docx|pdf','aid'=>$aid,'status'=>$status)); 
			}
		}
	}
	
	/*-------- Edit Submitted Solution -----------*/
	function edit_upload()
	{
		if(isset($_SESSION['loginuser']) == 0)
		{
			$this->course();
		}
		else
		{
			$aid = (int)$this->uri->segment(3); 
			$contactid = $_SESSION['contactid'];	
			if ($this->input->post('submit'))
			{
				$assignment = $_SESSION['assignment'];
				$submission = $_SESSION['submission'];
				$upload_path = "./uploads/".$_SESSION['submission'].'/';
				$file = $_FILES['file'];
				$temp = explode(".",$_FILES["file"]["name"]);
				$extension = end($temp);
				$filename = $contactid."_"."Solution_".$aid.".".$extension;
				if(!empty($_FILES["file"]["name"]))
				{
					if($extension=="docx" || $extension=="doc" || $extension=="pdf" )
					{
						if ( $file['size'] > 5242880 || $file['error'] != 0) // 5 mb
						{
							$fileUploadSuccess = false;
							$this->load->view('editsolution', array('error' => 'File Size Greater than 5MB or Less Than 1KB','aid'=>$aid,));
						}
						else
						{
							if(move_uploaded_file( $file['tmp_name'],	$upload_path.$filename ))
							{
								$result = $this->user2->editSubmit($aid,$filename);
								$this->load->view('editsolution', array('error' => $result,'aid'=>$aid)); 
								
								
							}
							else
							{
								$this->load->view('editsolution', array('error' => 'Problem Occur While Updating Solution','aid'=>$aid,)); 
							}
						}
					}
					else
					{
						$this->load->view('editsolution', array('error' => $extension.' Extension Not Allowed','aid'=>$aid,)); 
					}
				}
				else
				{
					$this->load->view('editsolution', array('error' =>' Solution file not selected','aid'=>$aid,));
				}
			}
			else
			{
				$this->load->view('editsolution', array('error' => 'Note: Extension Allowed doc|docx|pdf','aid'=>$aid,)); 
			}
		}
	}
	
	/*-------- Logout -----------*/
	public function logout()
	{
		$this->session->sess_destroy();
		$this->course();
	}
}
?>