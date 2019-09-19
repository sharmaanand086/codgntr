<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

			function __construct()
    {
        // Call the Model constructor
        parent::__construct();
         
        $this->load->model('Calendar_model');
    }


	// public function index()
	// {
	// 	$this->load->view('index.php');
	// }
	public function calenders()
	{
	    $email=$_POST['email'];
	    $password=$_POST['password'];
	    
	    $checklogin=$this->Calendar_model->checklogin($email,$password);
	   
	    if($checklogin == 1)
	    {
	                $fisttime="asd";
	                $abc;
	                $active;
	                $ftime;
	                $ltime;
	                $noofassignment=$this->Calendar_model->getcounttooltip($email,$password);
	                foreach($noofassignment as $row)
	                {
	                    $abc=$row->id;
	                    $active=$row->active;
	                    $ftime=$row->ftime;
	                    $ltime=$row->ltime;
	                }
                  $sessiondata = array('contid' =>$abc,'firsttime'=>$fisttime);
                  $this->session->set_userdata($sessiondata); 
                  $contactid=$_SESSION['contid'];
                  $abc=$this->Calendar_model->getdatedata($contactid);
                   //echo $contactid;
                   if($active==0){
                       if($ftime == 0)
                       {
                           $this->load->view('terms.php');
                       }
                       if($ftime == 1)
                       {
                           $this->load->view('step1.php',['abc'=>$abc]);
                       }
                       
                   }
                   if($active==1){
                       if($ltime == 0)
                       {
                           $this->load->view('demo1.php');
                       }
                       if($ltime == 1)
                       {
                           $this->load->view('demo2.php');
                       }
                   }
                   
	    }
	    if($checklogin == 0)
	    {
	        $this->session->set_flashdata('usermsg', 'Invalid username and password!');
             $this->load->view('login.php'); 
	    }
		
	}
	
	public function calenders2()
	{
	     if ($this->session->userdata['contid'])
        {
	    
	    $contactid=$_SESSION['contid'];
	    $abc=$_POST['mydate'];
	    $abc1=$_POST['mydate1'];
	    //var_dump($abc);
	    $this->Calendar_model->getupdate($abc,$abc1,$contactid);
	    $getalladmin=$this->Calendar_model->getadmininfo();
	    $getandinfo=$this->Calendar_model->getandinfo($contactid);
	    $mycountdata=$this->Calendar_model->mycountdata($contactid);
	    $abc=$this->Calendar_model->getdatedata($contactid);
		$this->load->view('step2.php',['getalladmin'=>$getalladmin,'getandinfo'=>$getandinfo,'mycountdata'=>$mycountdata,'abc'=>$abc]);
        }
        else
        {
           $this->logout();
        }

	}
	public function newcalenders()
	{
	    if ($this->session->userdata['contid'])
        {
	    
	    $contactid=$_SESSION['contid'];
	    $getalladmin=$this->Calendar_model->getadmininfo();
	    $getandinfo=$this->Calendar_model->getandinfo($contactid);
	    $mycountdata=$this->Calendar_model->mycountdata($contactid);
	    $abc=$this->Calendar_model->getdatedata($contactid);
		$this->load->view('step2.php',['getalladmin'=>$getalladmin,'getandinfo'=>$getandinfo,'mycountdata'=>$mycountdata,'abc'=>$abc]);
	
        }
        else
        {
           $this->logout();
        }    
    }
	public function calenders3()
	{
	    if ($this->session->userdata['contid'])
        {
	    
	    
	    $contactid=$_SESSION['contid'];
	    $mycountdata=$this->Calendar_model->mycountdata($contactid);
	    //echo $mycountdata;
	    $abc=1;
	    if($mycountdata == 0){
	      foreach($_POST['new'] as $row)
	    {
	        
	       $getalladmin=$this->Calendar_model->setalldata($contactid,$row,$abc);
	       $abc++;
	    }  
	    $this->Calendar_model->updateltime($contactid);
	    }
	    else{
	        $this->Calendar_model->deletefile($contactid);
    	        foreach($_POST['new'] as $row)
    	    {
    	       $getalladmin=$this->Calendar_model->setalldata($contactid,$row,$abc);
    	       $abc++;
    	    } 
    	    $this->Calendar_model->updateltime($contactid);
	    }
	    
	    
		$this->load->view('demo.php');
        }
        else
        {
           $this->logout();
        }
	}

	public function login()
	{
		$this->load->view('login.php');
		//$this->load->view('maintaince.php');
	}
	public function newtest()
	{
		$this->load->view('terms.php');
	}
	public function maintaince()
	{
		$this->load->view('maintaince.php');
	}
	public function test()
	{
		$this->load->view('test.php');
	}
	public function terms()
	{
	     if ($this->session->userdata['contid'])
        {
	    $contactid=$_SESSION['contid'];
	    $abc=$this->Calendar_model->getdatedata($contactid);
	    $this->Calendar_model->ftimeupdate($contactid);
	    $this->load->view('step1.php',['abc'=>$abc]);
        }
        else
        {
           $this->logout();
        }
	}

	// 	Public function index()
	// {
	// 	$this->load->view('home');
	// }
    
    
    public function insertpetext()
    {
        $contactid=$_SESSION['contid'];
        $msg=$_POST['msg'];
        $id=$_POST['id'];
        
        //var_dump($msg);
        //var_dump($id);
        $xyz=$this->Calendar_model->getcountper($contactid,$id);
        if($xyz == 0)
        {
            $fdg=$this->Calendar_model->setcountper($contactid,$msg,$id);
        }
        if($xyz == 1)
        {
            $fdg=$this->Calendar_model->setcountper1($contactid,$msg,$id);
        }
        
        
    }
    
	/*Get all Events */

	Public function getEvents()
	{
		$result=$this->Calendar_model->getEvents();
		echo json_encode($result);
	}
	/*Add new event */
	Public function addEvent()
	{
		$result=$this->Calendar_model->addEvent();
		echo $result;
	}
	/*Update Event */
	Public function updateEvent()
	{
		$result=$this->Calendar_model->updateEvent();
		echo $result;
	}
	/*Delete Event*/
	Public function deleteEvent()
	{
		$result=$this->Calendar_model->deleteEvent();
		echo $result;
	}
	Public function dragUpdateEvent()
	{	

		$result=$this->Calendar_model->dragUpdateEvent();
		echo $result;
	}
	public function logout()
	{
	    $this->session->unset_userdata('contid');
        redirect('welcome/login');
	}
}
