<?php

class Signup extends CI_Controller
 {

 	public function index()
 	{
 		$this->load->view('header/header');
 		$this->load->view('header/css');
 		$this->load->view('header/navigation'); 		 
 		$this->load->view('registrations/signup');
        $this->load->view('footer/js');
        $this->load->view('footer/footer');
        $this->load->view('footer/endhtml');
 	}
 	public function newUser(){
 		$data['fullName']=$this->input->post('Fullname',true);
 		$data['email']=$this->input->post('Email',true);
 		$data['password']=$this->input->post('password',true);
 		$confirmpassword =$this->input->post('confirmpassword',true);

 		$this->form_validation->set_rules('Fullname', 'Name', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('Email', 'Email', 'required');
 		 if ($this->form_validation->run() == FALSE)
                {
                        $this->index();
                }
                else
                {
					$data['fullName']=$this->input->post('Fullname',true);
			 		$data['email']=$this->input->post('Email',true);
			 		$data['password']=$this->input->post('password',true);
			 		$data['password'] =  hash('md5',$data['password']);
			 		$data['elink'] =  random_string('alnum','15');
			 		$data['date']= date('Y-m-d H:i:s');
			 		//var_dump($data);
			 		$inreturn2 = $this->Modelregister->checkuser($data['email']);	 		
			 		if($inreturn2->num_rows() > 0 ) {
			 			 
			 				$this->session->set_flashdata('message','Email Already exists');
			 				redirect('Signup');
			 		}else{
			 			$inreturn = $this->Modelregister->addnewuser($data);
			 			if($inreturn){
			 				if($this->sendEmailToUser($data)){
					 		$this->session->set_flashdata('message','added and email successfully');
					 		redirect('Signup');
			 				}else{
							$this->session->set_flashdata('message','added accountn butn not mail successfully');
			 				redirect('Signup');
			 				}
			 				
			 			}else{
			 			$this->session->set_flashdata('message','failed to  insert data');
			 			 redirect('Signup');
			 			}
			 			 
			 		}
                }
 	}

 	public function sendEmailToUser($data){

 		$config =  array(
 			'useragent'=>'CodeIgniter',
 			'protocol'=>'mail',
 			'mailpath'=>'user/bin/sendmail',
 			'smtp_host'=> 'localhost',
 			'smtp_user'=>'anand@arfeenkhan.com',
 			'smtp_pass'=>'anand_sharma',
 			'smtp_port'=>25,
 			'smtp_timeout'=>55,
 			'wordwrap'=>TRUE,
 			'wrapchars'=>76,
 			'mailtype'=>'html',
 			'charset'=>'iso-8859-1',
 			'validate'=>FALSE,
 			'priority'=>3,
 			'crlf'=>"\r\n",
 			'newline'=>"\r\n",
 			'bcc_batch_mode'=>FALSE,
 			'bcc_batch_size'=>200,

 		);
 		 
 		$message = '<strong>'.$data['fullName'].'</strong>'.anchor(site_url('Signup/confirm/'.$data['elink']),'Activate The link ');
 		$this->load->library('email',$config);

 		$this->email->set_newline('\r\n');
 		$this->email->set_newline('\r\n');
 		$this->email->from('sharma1991anup@gmail.com');
 		$this->email->to($data['email']);
 		$this->email->subject('Account activation');
 		$this->email->message($message);
 		$this->email->set_mailtype('html');
 		 if($this->email->send()){
 		 	return TRUE;
 		 }else{
 		 	 show_error($this->email->print_debugger());
 		 }

 	}

 	public function confirm($link = null){

 		if(isset($link) && !empty($link))
 		{
 		 $xyx = $this->Modelregister->checklink($link);
         if($xyx->num_rows() === 1){
         	$data['status'] = 1;
         	$data['elink'] = $link.'ok';
         	 $xyx = $this->Modelregister->activateaccount($data , $link);
         	 if($xyx){
$this->session->set_flashdata('message','you have succ activated mail updated successfully');
			 				redirect('Signup');
         	 }else{
$this->session->set_flashdata('message','we can not  activate your account');
			 				redirect('Signup');
         	 }
         }else{
$this->session->set_flashdata('message','the link is expire ');
			 				redirect('Signup');
         }
 		}else{
$this->session->set_flashdata('message','Please chek the email and try again .');
			 				redirect('Signup');
 		}

 	}

 }