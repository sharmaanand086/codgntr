<?php

class Blog extends CI_Controller {

	 
	public function Create_blog(){

							    $this->load->view('header/header');
						 		$this->load->view('header/css');
						 		$this->load->view('header/navigation1'); 		 
						 		$this->load->view('blog/newblog');
						        $this->load->view('footer/js');
						        $this->load->view('footer/footer');
						        $this->load->view('footer/endhtml');
	}

	public function Addblog()
	{
	      if( $this->session->userdata('logged_in'))
		  {
		$AB = $this->session->userdata('logged_in');

		//var_dump($AB['uid']);
		 	 
				$data['btitle'] =$this->input->post('btitle',true);
				$data['bbody'] =$this->input->post('bbody',true);
				$data['userid'] =  $AB['uid'];
				$data['bdate'] = date('y:m:d');
				if( empty($data['btitle']) ||  empty($data['bbody']) )
				{
				$this->session->set_flashdata('message','please check the required field');
				redirect('Blog/Create_blog');
			    } 
			    else
			    { 
		          $myreturn=  $this->Modalblog->addnewblog($data);
		          if($myreturn)
		          {
		          $this->session->set_flashdata('message','success insert data');
				  redirect('Blog/Create_blog');
		          }
		          else
		          {
				  $this->session->set_flashdata('message','Not inserted data');
				  redirect('Blog/Create_blog');
		          }
			    }
			}
			else
			 {
				redirect('Login/');
			 }
	}

	public function readblog($bid){
	//	var_dump($this->session->userdata('logged_in'))
	 if($this->session->userdata('logged_in'))
		  {
		   
		  	if(!empty($bid)){
		  		$data['myblog']= $this->Modalblog->checkblogid($bid);
		  		var_dump($data['myblog']);
		  		 if(count($data['myblog']) === 1 ){

		  		 				$this->load->view('header/header');
						 		$this->load->view('header/css');
						 		$this->load->view('header/navigation1'); 		 
						 		$this->load->view('blog/post',$data);
						        $this->load->view('footer/js');
						        $this->load->view('footer/footer');
						        $this->load->view('footer/endhtml');
		  		}else{
		  			$this->session->set_flashdata('message','blog not exist');
				  redirect('Blog');
		  		}
		  	}else{
				$this->session->set_flashdata('message','blog not exist');
				 redirect('Blog');
		  	}

		  }
		  else{
		  	$this->session->set_flashdata('message','Not inserted data');
				  redirect('Blog');
		  }
}

}