<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/PasswordHash.php';

class Welcome1 extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct()
	{
	    parent:: __construct();
	    $this->load->model('Model');
	    
	    header('Last-Modidied:'.gmdate('D, d-M-Y H:i:s').'GMT');
	    header('Cache-Control: no-cache, must-revalidate, max-age = 0');
	    header('Cache-Control: post-check=0, pre-check=0',false);
	    header('Pragma:no-cache');
	}
	 
	public function index()
	{
		$this->load->view('index');
	}

	public function login()
	{
	   
		$this->load->view('login');
	}
	public function changepassword()
	{
	   
		$this->load->view('changepassword');
	}
	public function setchangepassword()
	{
	   
		$password = $_POST['password'];
		$email = "test@arfeenkhan.com";
		$hasher  = new PasswordHash(8,false);
		$hash 	 = $hasher->HashPassword($password);
		$updatepassword = $this->Model->updatepassword($email,$password,$hash);
		
		
	}
	public function donepassword()
	{
	   
		$this->load->view('donechange');
	}
	public function TermsandCondition(){
	     $email = $_POST['email'];
	     $password = $_POST['pwd'];
	    
	    $checklogin = array();
	    $checklogin['checkloginassignment'] = $this->Model->checkloginassignment($email,$password);
        $checklogin['checklogin90days'] = $this->Model->checklogin90days($email,$password);
        $checklogin['checkloginsui'] = $this->Model->checkloginsui($email,$password);
        
        if($checklogin['checkloginassignment'] || $checklogin['checklogin90days'] || $checklogin['checkloginsui'])
        {
          $newdata = array(
        'email'  => $email,
        'password'     => $password,
        'logged_in' => TRUE
        );
     $this->session->set_userdata($newdata);
    
           $checkftime =  $this->Model->checkftime($email,$password);
             if($checkftime[0]['ftime']==0){
	        	$this->load->view('terms');
	          }else{
	              //echo $_SESSION['email'];
	              $email=$_SESSION['email'];
	     $password = $_SESSION['password'];
	              redirect('Welcome/userdashboard');
	          }
        }
        else{
             redirect('Welcome/login');
        }
	}
	
	public function terms()
	{
	     if ($this->session->set_userdata['email'])
        {
	     $email=$_SESSION['email'];
	     $password = $_SESSION['password'];
	     //$this->Model->ftimeupdate($email);
	    // var_dump($test);
	      $this->load->view('dashboard');
        }
        else
        {
          redirect('Welcome/userdashboard');
        }
	}
	public function userdashboard()
	{
	    $email = $_POST['email'];
	    $password = $_POST['password'];
	     $this->Model->ftimeupdate($email);
	    $checklogin = array();
	    $checklogin['checkloginassignment'] = $this->Model->checkloginassignment($email,$password);
        $checklogin['checklogin90days'] = $this->Model->checklogin90days($email,$password);
        $checklogin['checkloginsui'] = $this->Model->checkloginsui($email,$password);
        
        if($checklogin['checkloginassignment'] || $checklogin['checklogin90days'] || $checklogin['checkloginsui'])
        {
            
            $checkifemailexist = array();
            
            //checks if email id exists in assignment system
            $checkifemailexist['assignment'] = $this->Model->checkemailexists_assignment($email);
            
            // check if email id exists in 90 days
            $checkifemailexist['90days'] = $this->Model->checkemailexists_90days($email);
            
            // check if email id exists in Security Identity
            $checkifemailexist['sui'] = $this->Model->checkemailexists_sui($email);
            
            
            
            $email = array();
            
            //assignment system
            $email['e_assignmentid'] = $checkifemailexist['assignment']["contactid"];
            $email['e_assignmentemail'] = $checkifemailexist['assignment']["username"];
            $email['e_assignmentpassword']= $checkifemailexist['assignment']["password"];
            $email['e_assignmentusername']= $checkifemailexist['assignment']["name"];
            
            //90 days 
            $email['e_90days_id'] = $checkifemailexist['90days']["id"];
            $email['e_90daysemail'] = $checkifemailexist['90days']["username"];
            $email['e_90dayspassword'] = $checkifemailexist['90days']["password"];
            $email['e_90days_enddate'] = $checkifemailexist['90days']["end"];
            $email['e_90days_startdate'] = $checkifemailexist['90days']["start"];
            
            //Security Identity
            $email['e_suiemail'] = $checkifemailexist['sui']["username"];
            $email['e_suipassword'] = $checkifemailexist['sui']["password"];
            
            //assignment system session
            $_SESSION['email_assignment'] = $email['e_assignmentemail'];
            $_SESSION['password_assignment'] = $email['e_assignmentpassword'];
            $_SESSION['name_assignment'] = $email['e_assignmentusername'];
            
            //90 days session
            $_SESSION['email_90days)'] = $email['e_90daysemail'];
            $_SESSION['password_90days'] = $email['e_90dayspassword'];
            
            //Security Identity
            $_SESSION['email_sui'] = $email['e_suiemail'];
            $_SESSION['password_sui'] = $email['e_suipassword'];
            
            
            
            //assignment count normal
            $email['assignment_count_normal'] = $this->Model->assignment_totalcount_normal();
            
            //this will print all assignment complete
            $email['check_assignment_complete'] = $this->Model->assignment_remaining($email['e_assignmentid'],$email['assignment_count_normal']);
            $email['assignment_remaining_count'] = $this->Model->assignment_remaining_count($email['e_assignmentid']);
            
            //90 days
            // $email['end_date'] = 
            
            $this->load->view('dashboard',$email);
        }
        else
        {
            redirect('Welcome/login');
        }
	}
	
      public function logout()
           {     $email = $_SESSION['email'];
                  $this->session->unset_userdata($email);
                  $this->load->view('login');
           }
	

}
