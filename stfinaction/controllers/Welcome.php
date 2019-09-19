<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include APPPATH . 'third_party/PasswordHash.php';
require_once(APPPATH."third_party/infusionsoft/class.phpmailer.php");

class Welcome extends CI_Controller {

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
	    $this->load->model('User_model');
	    
	    header('Last-Modidied:'.gmdate('D, d-M-Y H:i:s').'GMT');
	    header('Cache-Control: no-cache, must-revalidate, max-age = 0');
	    header('Cache-Control: post-check=0, pre-check=0',false);
	    header('Pragma:no-cache');
	      $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');// Load session library
        $this->load->library('session');// Load database
         
	}
	
	public function index(){
	    $this->load->view('user/userlogin');
	}
 
 
	public function userdashboard(){
	    
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
          
        if ($this->form_validation->run() == FALSE)
        {
            
            if(isset($this->session->userdata['logged_in']))
                                {   
                                    $data = array();
                            	    $data['getevent'] = $this->User_model->getallevent();
                            	    $data['getvideo'] = $this->User_model->getallvideo();
                            	    $data['getpdf'] = $this->User_model->getallpdf();
                            	    
                            		$this->load->view('user/userdashboard',$data);
                                }
                                else
                                {
                                $this->load->view('user/userlogin');
                                }
         } 
        else
        {
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            );
            //var_dump($data);
            $result = $this->User_model->login($data);
            if ($result == TRUE) 
            {
            
            $username = $this->input->post('username');
            $result = $this->User_model->read_users_information($username);
            
             //var_dump($attemps);
                if ($result != false)
                     {
                        $session_data = array(
                        'username' => $result[0]->username,
                         'id' => $result[0]->id,
                         'name'=> $result[0]->name,
                        'contact' => $result[0]->contact,
                        );
                        
                          $data['popupshow'] = $this->User_model->showpopup($username);
                          $this->User_model->updateattempts($username);
                        // var_dump( $data['popupshow']);
                         $this->session->set_userdata('logged_in', $session_data);
                        // Add user data in session
                         redirect('Welcome/userspage');
                        }
            }
            else 
            {
                $data = array(
                'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('user/userlogin', $data);
            }
        }
	}
	public function userspage(){
	    
	      if(isset($this->session->userdata['logged_in']))
                                {
                                    $username = ($this->session->userdata['logged_in']['username']);
                                    $data = array();
                                     $data['popupshow'] = $this->User_model->showpopup($username);
                            	    $data['getevent'] = $this->User_model->getallevent();
                            	    $data['getvideo'] = $this->User_model->getallvideo();
                            	    $data['getpdf'] = $this->User_model->getallpdf();
                            	    
                            		$this->load->view('user/userdashboard',$data);
                                }
                                else
                                {
                                $this->load->view('user/userlogin');
                                }
	}
	  public function logout() {
        
        // Removing session data
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('user/userlogin', $data);
        }
 
 	public function changepassword()
	{
	   
		$this->load->view('user/changepassword');
	}
	public function setchangepassword()
	{
	   
		$password = $_POST['password'];
		$username =  $_POST['username'];
		$newdata2 = array(
        'password1'     => $password,
        'logged_in' => TRUE
        );
        
        $this->session->set_userdata($newdata2);
		//	var_dump($username);
		$updatepassword = $this->User_model->updatepassword($username,$password);
	    $this->session->set_flashdata('success','Password change Successfully');
         $this->load->view('user/donechange');
		
	}
	public function requestformuser(){
	     $data = array(
            'id' => $this->input->post('id'),
            'username' => $this->input->post('username'),
             'contact'=>$this->input->post('contact'),
              'name'=>$this->input->post('name')
            );
            
            $result = $this->User_model->requestfromuserforattempt($data);
            //var_dump($data);
             if ($result == TRUE) 
            {
                        try{
				 $mail = new PHPMailer(true); // the true param means it will throw exceptions on     errors, which we need to catch

                $mail->IsSMTP(); // telling the class to use SMTP
                $mail->Host = 'mail.arfeenkhan.com';  // Specify main and backup server
                $mail->Port = '26';
                $mail->SMTPAuth = 'true';                               // Enable SMTP authentication
                $mail->Username = 'arfeenkhan@arfeenkhan.com';                            // SMTP username
                $mail->Password = 'rNX7zSKSCnev';                           // SMTP password
                $mail->SMTPSecure = 'SSL/TLS';
                $mail->SetFrom('Arfeenkhan@arfeenkhan.com', 'Arfeen Khan');
            
                //$mail->AddAddress('anand@arfeenkhan.com', '');
                //$mail->AddAddress('support@arfeenkhan.com', '');
                $mail->AddAddress($_POST['username']);
                
                
             $mail->Subject ="Speak to Fourtune In Action ";

 			$mail->Body= "We Have Received Your request to increase the attempts for Speak to Fortune In Action You will get a response in  next 24-48 hr";
           
			
			$mail->IsHTML(true);
             $mail->Send();	
				
			if( $mail->Send() )
				{
					 
					$thank_page = true;
				}				    
				else
				{
					echo "Email sending failed";
					$thank_page = false;
				}	
				
			 } catch (phpmailerException $e) {
			 		echo "Email sending failed";
		             echo $e->errorMessage(); //Pretty error messages from PHPMailer
		            } catch (Exception $e) {
		            	echo "Email sending failed";
		            echo $e->getMessage(); //Boring error messages from anything else!
		        }
            $this->session->set_flashdata('message_approved', 'Request Sent Successfully !');
            
            $this->load->view('user/userlogin',$data);
            
             redirect('Welcome/logout'); 
            }
            else
            {
            redirect('Welcome/logout'); 
                
            }
	}

}
