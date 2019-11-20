<?php

class Login extends CI_Controller {

public function allpost(){
	$data['blogs'] = $this->Modalblog->getAllBlogs();
	//var_dump($data['blogs']);
	    $this->load->view('header/header');
 		$this->load->view('header/css');
  		$this->load->view('registrations/allpost',$data);
        $this->load->view('footer/js');
        $this->load->view('footer/footer');
        $this->load->view('footer/endhtml');
}
public function index(){
	 if($this->session->userdata('logged_in')){
		redirect('Blog/Create_blog');
	 }else{
		$this->load->view('header/header');
 		$this->load->view('header/css');
 		$this->load->view('header/navigation'); 		 
 		$this->load->view('registrations/login');
        $this->load->view('footer/js');
        $this->load->view('footer/footer');
        $this->load->view('footer/endhtml');
	 
	 }
 		
	   
}


	public function checkuser()
	{

 		$data['email']=$this->input->post('Email',true);
 		$data['password']=$this->input->post('password',true);
 
 		$this->form_validation->set_rules('password', 'Password', 'required');
 		$this->form_validation->set_rules('Email', 'Email', 'required');
 		 if ($this->form_validation->run() == FALSE)
                {                      
			 	$this->index();
                }
                else
                {
	                	$data['email']=$this->input->post('Email',true);
	 					$data['password']=$this->input->post('password',true);
	 					$data['password'] =  hash('md5',$data['password']);
	 					$myvar = $this->Modelregister->checkuserwithPassword($data);

	 					if(!empty($myvar) AND count($myvar)===1)
	 					{
	 						//echo 'fine';
	 						if($myvar[0]['status']==0){
									$this->session->set_flashdata('message','Please activate you email to  login');
				 			 		redirect('Login');
	 						}else if($myvar[0]['status']==2){
									$this->session->set_flashdata('message','Admin blocked you');
				 			 		redirect('Login');
	 						}else if($myvar[0]['status']==1){
	 							$sessValue= array(
	 								'uid'=>$myvar[0]['id'],
	 								'email'=>$myvar[0]['email'],
	 								'fullName'=>$myvar[0]['fullName']
	 							);
								$this->session->set_userdata('logged_in',$sessValue);
									if($this->session->userdata('logged_in'))
									{
										redirect('Login/home');
									}	
									else
				 			 		 {
				 			 		 $this->session->set_flashdata('message','try again ');
				 			 		redirect('Login');
				 			 		 }
	 						}
	 					}
	 					else
	 					{
								$this->session->set_flashdata('message','failed to  login');
				 			 redirect('Login');
	 					}
                }

	}


	public function home(){
    if(isset($this->session->userdata['logged_in']))
                                {
                               $this->load->view('header/header');
						 		$this->load->view('header/css');
						 		$this->load->view('header/navigation1'); 		 
						 		$this->load->view('registrations/home');
						        $this->load->view('footer/js');
						        $this->load->view('footer/footer');
						        $this->load->view('footer/endhtml');
							    }
                                else
                                {
                                $this->load->view('registrations/Login');
                                }

	    
}

public function About(){ 
 								$this->load->view('header/header');
						 		$this->load->view('header/css');
						 		$this->load->view('header/navigation1'); 		 
						 		$this->load->view('registrations/About');
						        $this->load->view('footer/js');
						        $this->load->view('footer/footer');
						        $this->load->view('footer/endhtml');
}
public function Posts(){ 
								 $this->load->view('header/header');
						 		$this->load->view('header/css');
						 		$this->load->view('header/navigation1'); 		 
						 		$this->load->view('registrations/Posts');
						        $this->load->view('footer/js');
						        $this->load->view('footer/footer');
						        $this->load->view('footer/endhtml');

						       }
 public function Contact(){ 
 							$this->load->view('header/header');
						 		$this->load->view('header/css');
						 		$this->load->view('header/navigation1'); 		 
						 		$this->load->view('registrations/Contact');
						        $this->load->view('footer/js');
						        $this->load->view('footer/footer');
						        $this->load->view('footer/endhtml');
						    }
  
 	 public function logout() {
        
      $sessValue= array(
					'uid'=>$myvar[0]['id'],
					'email'=>$myvar[0]['email'],
					'fullName'=>$myvar[0]['fullName']
				);
        $this->session->unset_userdata('logged_in', $sessValue);
        
        redirect('Login');
        }

}