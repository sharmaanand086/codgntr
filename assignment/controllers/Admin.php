<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('admin2');
	}
	
	public function index()
	{
		$this->home();
	}
	/*-------- Home -----------*/
	public function home()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		else
		{
			$this->load->view('admin/index');
		}
	}
	
	/*-------- Login Page -----------*/
	public function login()
	{
		
		if ($this->input->post('Login'))
                 {
			$username = $this->input->post("email");
			$password = $this->input->post("password");
			
			$this->form_validation->set_rules("email", "Email Id", "trim|required");
			$this->form_validation->set_rules("password", "Password", "trim|required");
			
			if ($this->form_validation->run() == FALSE)
			{
				//validation fails
				$this->login();
			}
			else
			{
                //check if username and password is correct
                $admin_result = $this->admin2->checkAdmin($username, $password);
                if ($admin_result > 0) //active user record is present
                {
                    //set the session variables
                    $sessiondata = array('username' => $username,'adminuser' => 1);
                    $this->session->set_userdata($sessiondata);
                    redirect('admin/home');
                }
                else
                {
                    $this->session->set_flashdata('adminmsg', 'Invalid username and password!');
                   $this->load->view('admin/login');
                }
			}
		}
		else
		{
			$this->load->view('admin/login');
		}
	}
	
	/*------------------------------- Course Tab -----------------------------*/
	public function course()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		if ($this->input->post('AddCourse'))
        {
			$course = $this->input->post("coursename");
			$this->form_validation->set_rules("coursename", "Course Name", "trim|required");
			if ($this->form_validation->run() == FALSE)
			{
				//$this->course();
				$data['query'] = '';
			}
			else
			{
				$data['query'] = $this->admin2->addCourse($course);
			}
			$data['course'] = $this->admin2->getCourse();
			$this->load->view('admin/course', $data);
		}
		else
		{
			$data['query'] = '';
			$data['course'] = $this->admin2->getCourse();
			$this->load->view('admin/course', $data);
		}
	}
	
	public function delcourse()
	{
		$data['query'] = $this->admin2->deleteCourse($this->uri->segment(3));
		$data['course'] = $this->admin2->getCourse();
		$this->load->view('admin/course', $data);
	}
	
	/*------------------------------- End of  Course Tab -----------------------------*/
	
	/*-------------------------------- Assignment Tab --------------------------------*/
	
	public function assignment()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		$data['course'] = $this->admin2->getCourse();
		if ($this->input->post('addAssignment'))
        {
			$cid = $this->input->post("coursename");
			$table = $cid."_assignment";
			
			
			//$grpid = $this->input->post("groupid");
			$fname = $this->input->post("fname");
			
			$udate = date('Y/m/d');
			$subdate = date_format(date_create($this->input->post("subdate")), 'Y/m/d');
			
			$upload_path = "./uploads/".$table.'/';
			
			$this->form_validation->set_rules("coursename", "Course Name", "trim|required");
			//$this->form_validation->set_rules("groupid", "Group Tag", "trim|required|is_unique[".$table.".grpid]");
			$this->form_validation->set_rules("fname", "File Name", "trim|required");
			$this->form_validation->set_rules("subdate", "Last Date", "trim|required");
			if ($this->form_validation->run() == FALSE)
			{
				//$this->test();
				$data['query'] = '';
				$this->load->view('admin/assignment', $data);
			}
			else
			{
				$query = $this->db->query("SHOW TABLE STATUS LIKE '$table'");
				foreach ($query->result() as $row)
				{
						$aid = $row->Auto_increment;
				}
				if(empty($_FILES["file"]["name"]))
				{
					$ufile = "No";
					$data['query'] = $this->admin2->uploadAssignment($ufile,$fname,$udate,$subdate,$cid);
					$this->load->view('admin/assignment', $data);
				}
				else
				{
					$file = $_FILES['file'];
					$temp = explode(".",$_FILES["file"]["name"]);
					$extension = end($temp);
					$ufile = "Assignment_".$aid.".".$extension;
					if ( $file['size'] > 20971520 || $file['error'] != 0) // 5 mb
					{
						$data['query'] = 'File Size Greater than 20MB or Less Than 1KB';
						$this->load->view('admin/assignment', $data);
					}
					else
					{
						if(move_uploaded_file( $file['tmp_name'],$upload_path.$ufile ))
						{
							$data['query'] = $this->admin2->uploadAssignment($ufile,$fname,$udate,$subdate,$cid);
							$this->load->view('admin/assignment', $data);
						}
						else
						{
							$data['query'] = 'Problem Occur While Uploading Assignment';
							$this->load->view('admin/assignment', $data);
						}
					}
				}
			}
		}
		else
		{
			$data['query'] = '';
			$this->load->view('admin/assignment',$data);
		}	
	}
	
	public function editassignment()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		if ($this->input->post('updateAssignment'))
        {
			$fname = $this->input->post("fname");
			$udate = date('Y/m/d');
			$subdate = date_format(date_create($this->input->post("subdate")), 'Y/m/d');

			
			$this->form_validation->set_rules("fname", "File Name", "trim|required");
			$this->form_validation->set_rules("subdate", "Last Date", "trim|required");
			if ($this->form_validation->run() == FALSE)
			{
				$data['query'] = '';
			}
			else
			{
				$grp = $this->uri->segment(3);
				$cid = substr($grp, 0, strpos($grp, '_'));
				$aid = str_replace("_","",(strstr($grp,'_')));
				$table = $cid."_assignment";
				if(empty($_FILES["file"]["name"]))
				{
					$ufile = $this->input->post("file1");
					$data['query'] = $this->admin2->editAssignment($ufile,$fname,$udate,$subdate,$grp);
				}
				else
				{
					$file = $_FILES['file'];
					$temp = explode(".",$_FILES["file"]["name"]);
					$extension = end($temp);
					$ufile = "Assignment_".$aid.".".$extension;
					$upload_path = "./uploads/".$table.'/';
					if ( $file['size'] > 20971520 || $file['error'] != 0) // 5 mb
					{
						$data['query'] = 'File Size Greater than 20MB or Less Than 1KB';
					}
					else
					{
						if(move_uploaded_file( $file['tmp_name'],$upload_path.$ufile ))
						{
							$data['query'] = $this->admin2->editAssignment($ufile,$fname,$udate,$subdate,$grp);
						}
						else
						{
							$data['query'] = 'Problem Occur While Updating Assignment';
						}
					}
				}
				$data['assignment'] = $this->admin2->getAssignmentDtl($this->uri->segment(3));
				$this->load->view('admin/eassignment', $data);
			}
		}
		else
		{
			
			$data['assignment'] = $this->admin2->getAssignmentDtl($this->uri->segment(3));
			$data['query'] = '';
			$this->load->view('admin/eassignment', $data);
		}
	}
	
	public function delassignment()
	{
		$data['query'] = $this->admin2->deleteAssignment($this->uri->segment(3));
		$data['course'] = $this->admin2->getCourse();
		$this->load->view('admin/records', $data);
	}
	
	/*------------------------------- End of Assignment Tab ----------------------------*/
	
	/*------------------------------- Records ------------------------------------------*/
	
	public function records()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		
		if ($this->input->post('viewRecord'))
        {
			$cid = $this->input->post("coursename");
			$data['cid'] = $cid;
			$this->form_validation->set_rules('coursename', 'Select Course', 'required');
			if ($this->form_validation->run() == FALSE)
			{
				//$this->test();
			}
			else
			{
				$data['user'] = $this->admin2->getUser($cid);
				$data['assignment'] = $this->admin2->getAssignment($cid);
				$data['submission'] = $this->admin2->getSubmission($cid);
			}
			$data['course'] = $this->admin2->getCourse();
			$this->load->view('admin/records', $data);
		}
		else
		{
			$data['course'] = $this->admin2->getCourse();
			$this->load->view('admin/records', $data);
		}
	}
	
	/*-------------------------------End Of Records ------------------------------------------*/
	
	/*------------------------------- User Tab ------------------------------------------*/
	
	public function user()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		if ($this->input->post('addUser'))
        {
			$cid = $this->input->post("coursename");
			$contactid = $this->input->post("contactid");
			
			$table = $cid."_user";
			$this->form_validation->set_rules('coursename', 'Select Course', "required");
			$this->form_validation->set_rules('contactid', 'Contact Id', "trim|required|numeric");
			if ($this->form_validation->run() == FALSE)
			{
				$data['query'] = '';
			}
			else
			{
				$this->form_validation->set_message('is_unique', 'User is already registered for this course');
				$this->form_validation->set_rules('contactid', 'Contact Id', "is_unique[".$table.".contactid]");
				if ($this->form_validation->run() == FALSE)
				{
					$data['query'] = '';
				}
				else
				{
					$data['query'] = $this->admin2->addUser($cid,$contactid);
				}
			}
			$this->load->view('admin/user',$data);
		}
		else
		{
			$data['query'] = '';
			$this->load->view('admin/user',$data);
		}
	}
	
	public function edituser()
	{
		
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		if ($this->input->post('updateUser'))
        {
			$this->form_validation->set_rules("name", "User Name", "trim|required");
			$this->form_validation->set_rules("email", "Email Id", "trim|required|valid_email");
			$this->form_validation->set_rules("phone", "phone", "trim|required|numeric");
			$this->form_validation->set_rules("password", "Password", "trim|required");
			if ($this->form_validation->run() == FALSE)
			{
				//$this->admin();
				$data['query'] = '';
				
			}
			else
			{
				$grp 		= $this->uri->segment(3);
				$name 		= $this->input->post('name');
				$username 	= $this->input->post('email');
				$phone		= $this->input->post('phone');
				$password 	= $this->input->post('password');
				$data['query'] = $this->admin2->editUser($grp,$name,$username,$password,$phone);
			}
			$data['user'] = $this->admin2->getUserDtl($this->uri->segment(3));
			$this->load->view('admin/euser', $data);
		}
		else
		{
			$data['query'] = '';
			$data['user'] = $this->admin2->getUserDtl($this->uri->segment(3));
			$this->load->view('admin/euser', $data);
		}
	}
	
	public function deluser()
	{
		$data['query'] = $this->admin2->deleteUser($this->uri->segment(3));
		$data['course'] = $this->admin2->getCourse();
		$this->load->view('admin/records', $data);
	}
	
	/*-------------------------------End Of User Tab ------------------------------------------*/
	
	
	/*------------------------------- Admin Tab ------------------------------------------*/
	
	public function admin()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		if ($this->input->post('addAdmin'))
        {
			$name = $this->input->post("name");
			$username = $this->input->post("email");
			$password = $this->input->post("password");
			
			$this->form_validation->set_rules("name", "Admin Name", "trim|required");
			$this->form_validation->set_rules("email", "Email Id", "trim|required|valid_email|is_unique[admin.username]");
			$this->form_validation->set_message('is_unique', 'Username already registered ');
			$this->form_validation->set_rules("password", "Password", "trim|required");
			
			if ($this->form_validation->run() == FALSE)
			{
				//$this->admin();
				$data['query'] = '';
			}
			else
			{
				$data['query'] = $this->admin2->addAdmin($name,$username,$password);
			}
			$data['admin'] = $this->admin2->getAdmin();
			$this->load->view('admin/addadmin', $data);
		}
		else
		{
			$data['query'] = '';
			$data['admin'] = $this->admin2->getAdmin();
			$this->load->view('admin/addadmin', $data);
		}
	}
	
	public function deladmin()
	{
		$data['query'] = $this->admin2->deleteAdmin($this->uri->segment(3));
		$data['admin'] = $this->admin2->getAdmin();
		$this->load->view('admin/addadmin', $data);
	}
	
	public function changepass()
	{
		if(isset($_SESSION['adminuser']) == 0)
		{
			$this->login();
		}
		if ($this->input->post('changePass'))
        {
			$opassword = $this->input->post("opassword");
			$password = $this->input->post("password");
			$rpassword = $this->input->post("rpassword");
			
			$this->form_validation->set_rules("opassword", " Old Password", "trim|required");
			$this->form_validation->set_rules('password', 'Password', 'required|matches[rpassword]');
			$this->form_validation->set_rules('rpassword', 'Retype Password', 'required');
			
			if ($this->form_validation->run() == FALSE)
			{
				//$this->admin();
				$data['query'] = '';
			}
			else
			{
				$data['query'] = $this->admin2->changePass1($opassword,$password);
			}
			$this->load->view('admin/changepass', $data);
		}
		else
		{
			$data['query'] = '';
			$this->load->view('admin/changepass', $data);
		}
	}
			
	
	/*-------------------------------End Of User Tab ------------------------------------------*/
	
	
	
	/*-------- Logout -----------*/
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}

}