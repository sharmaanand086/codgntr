<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH."third_party/infusionsoft/class.phpmailer.php");

class AdminController extends CI_Controller {
 
    function __construct() 
    {
        parent::__construct();
         $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');// Load session library
        $this->load->library('session');// Load database
        $this->load->model('Admin_model');
      }
	public function index()
	{
	
	 $this->load->view('adminlogin');
	}
	public function getuserwithdate(){
	    $uid = $this->input->post('uid');
	    $showdateuid = $this->Admin_model->showdateuid($uid);
	    foreach ($showdateuid as $row){
	        echo "<td><b>";
	        echo $row['createdat'];
	        echo "</b></td>";
	    }
	}
 
	public function admin_login_process() {
        
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
          
        if ($this->form_validation->run() == FALSE)
        {
            
            if(isset($this->session->userdata['logged_in']))
            
                    {   
                        // $data =$_SESSION['username'];
                         $data['pdfrecords'] = $this->Admin_model->show_allpdf();
                         $data['grantaccrecords'] = $this->Admin_model->show_requests();
                         $data['grantaccrecords1'] = $this->Admin_model->show_requests1();
                        
                        $data['videorecords'] = $this->Admin_model->show_allvideo();
                        $data['records'] = $this->Admin_model->show_allsteps();
                        $data['recordspdf'] = $this->Admin_model->show_allstepspdf();
                         $data['recordsvideo'] = $this->Admin_model->show_allstepsvideo();
                        $this->load->view('admindashboard',$data);
                    }
                    else
                    {
                    $this->load->view('adminlogin');
                    }
         } 
        else
        {
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
            );
            //var_dump($data);
            $result = $this->Admin_model->login($data);
            if ($result == TRUE) 
            {
            
            $username = $this->input->post('username');
            $result = $this->Admin_model->read_admin_information($username);
                if ($result != false)
                     {
                        $session_data = array(
                        'name' => $result[0]->name,
                        'username' => $result[0]->username,
                        );
                        // Add user data in session
                        $this->session->set_userdata('logged_in', $session_data);
                        //$data =$_SESSION['username'];
                         $data['grantaccrecords'] = $this->Admin_model->show_requests();
                          $data['grantaccrecords1'] = $this->Admin_model->show_requests1();
                      
                          $data['pdfrecords'] = $this->Admin_model->show_allpdf();
                         $data['videorecords'] = $this->Admin_model->show_allvideo();
                         $data['records'] = $this->Admin_model->show_allsteps();
                         $data['recordspdf'] = $this->Admin_model->show_allstepspdf();
                          $data['recordsvideo'] = $this->Admin_model->show_allstepsvideo();
                        $this->load->view('admindashboard',$data);
                        }
            }
            else 
            {
                $data = array(
                'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('adminlogin', $data);
            }
        }
        }
        
        public function addsteps(){
         
        $this->form_validation->set_rules('steptitle', 'Title', 'required');
        $this->form_validation->set_rules('stepdescription', 'Description', 'required');
        $this->form_validation->set_rules('steptype', 'Type', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        
        $this->load->view('admindashboard');
        }
        else 
        {
            $data = array(
            'title' => $this->input->post('steptitle'),
            'description' => $this->input->post('stepdescription'),
            'v_p' => $this->input->post('steptype')
            );
            
            $result = $this->Admin_model->steps_insert($data);
            if ($result == TRUE) 
            {
            $data['records'] = $this->Admin_model->show_allsteps();
            
            //$data['message_display'] = 'Step Inserted Successfully !';
            $this->session->set_flashdata('message_display', 'Step Inserted Successfully !');
            $this->load->view('admindashboard',  $data);
            redirect('AdminController/admin_login_process#clickstp'); 
            }
            else
            {
            $data['records'] = $this->Admin_model->show_allsteps();
           // $data['message_error'] = 'Step already exist!';
            $this->session->set_flashdata('message_error', 'Step already exist!');
            $this->load->view('admindashboard', $data);
             redirect('AdminController/admin_login_process#clickstp'); 
            }
       } 
        }
        function deletesteps($id){
          $this->Admin_model->did_delete_row($id);
          redirect('AdminController/admin_login_process#clickstp'); 
	   } 
        
        public function addvideos(){
         
        $this->form_validation->set_rules('videotitle', 'Title', 'required');
        $this->form_validation->set_rules('videolink', 'Link', 'required');
        $this->form_validation->set_rules('vidostepid', 'Id', 'required');
         $this->form_validation->set_rules('imgurlvideo', 'Image', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
        
        $this->load->view('admindashboard');
        }
        else 
        {
            $data = array(
            'title' => $this->input->post('videotitle'),
            'link' => $this->input->post('videolink'),
            'stepid' => $this->input->post('vidostepid'),
            'imgurl	' => $this->input->post('imgurlvideo')
            );
            
            $result = $this->Admin_model->video_insert($data);
            if ($result == TRUE) 
            {
            $data['videorecords'] = $this->Admin_model->show_allvideo();
           // $data['message_display1'] = 'Video Inserted Successfully !';
             $this->session->set_flashdata('message_display1', 'Video Inserted Successfully !');
            $this->load->view('admindashboard',  $data);
             redirect('AdminController/admin_login_process#clickvideo'); 
            }
            else
            {
            $data['videorecords'] = $this->Admin_model->show_allvideo();
           // $data['message_error1'] = 'Video already exist!';
             $this->session->set_flashdata('message_error1', 'Video already exist! !');
            $this->load->view('admindashboard', $data);
             redirect('AdminController/admin_login_process#clickvideo'); 
            }
       } 
        }
        
         function deletevideos($id){
          $this->Admin_model->did_delete_video($id);
          redirect('AdminController/admin_login_process#clickstp'); 
	   } 
        public function addpdfs(){
        $this->form_validation->set_rules('pdftitle', 'Title', 'required');
        $this->form_validation->set_rules('PdfDescription', 'Description', 'required');
        $this->form_validation->set_rules('imagepdf', 'Image Url', 'required');
         $this->form_validation->set_rules('urlPdf', 'PDF Url', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {
        
        $this->load->view('admindashboard');
        }
        else 
        {
            $data = array(
            'title' => $this->input->post('pdftitle'),
            'description' => $this->input->post('PdfDescription'),
            'image' => $this->input->post('imagepdf'),
            'pdflink' => $this->input->post('urlPdf')
            );
            
            $result = $this->Admin_model->pdf_insert($data);
            if ($result == TRUE) 
            {
            $data['pdfrecords'] = $this->Admin_model->show_allpdf();
            
             $this->session->set_flashdata('message_pdfdisplay', 'Pdf Inserted Successfully !');
            $this->load->view('admindashboard',  $data);
             redirect('AdminController/admin_login_process#clikpdf'); 
            }
            else
            {
            $data['pdfrecords'] = $this->Admin_model->show_allpdf();
            
             $this->session->set_flashdata('pdfdisplay_error2', 'Pdf already exist! !');
            $this->load->view('admindashboard', $data);
             redirect('AdminController/admin_login_process#clikpdf'); 
            }
       } 
        }
        
         function deletepdfs($id){
          $this->Admin_model->did_delete_pdfs($id);
          redirect('AdminController/admin_login_process#clickstp'); 
	   } 
        public function  grantaccess(){
            $data = array(
            'userid' => $this->input->post('userid'),
            'username' => $this->input->post('username')
           
            );
            
            $result = $this->Admin_model->insert_requests($data);
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
                
                
                $mail->Subject =" Speak to Fourtune In Action ";

 			$mail->Body= "Your request has been  accepted from admin now you get one more attempt to login. ";
           
			
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
		        
               $this->session->set_flashdata('message_approved', 'Approved Successfully !');
               //$this->load->view('admindashboard');
             redirect('AdminController/admin_login_process#clickacc'); 
            }
            else
            {
            redirect('AdminController/admin_login_process#clickacc'); 
                
            }
        }
        
        public function rejectrequest(){
             $data = array(
            'userid' => $this->input->post('userid'),
            'username' => $this->input->post('username')
           
            );
            
            $result = $this->Admin_model->reject_requests($data);
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
                
                
                $mail->Subject ="Speak to Fourtune In Action  ";

 			$mail->Body= "Your request Rejected By admin ";
           
			
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
		        
            $this->session->set_flashdata('message_rejected', 'Rejected !');
            $this->load->view('admindashboard');
            redirect('AdminController/admin_login_process#clickacc'); 
            }
            else
            {
            redirect('AdminController/admin_login_process#clickacc'); 
            }
        }
        // Logout from admin page
        public function logout() {
        
        // Removing session data
        $sess_array = array(
        'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('adminlogin', $data);
        }
 

}
