<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcomes extends CI_Controller {

		function __construct()
    {
        // Call the Model constructor
        parent::__construct();

        $this->load->model('Calendar_model');
    }


	/*Home page Calendar view  */
	Public function index()
	{
	    
	    if ($this->session->userdata['contid'])
        {
            $contactid=$_SESSION['contid'];
	    $getalldate=$this->Calendar_model->getdatedata($contactid);
	    $getshowdata=$this->Calendar_model->myshowdata($contactid);
	    $getalladmin=$this->Calendar_model->getadmininfo();
		$this->load->view('home',['contactid'=>$contactid,'getalldate'=>$getalldate,'getshowdata'=>$getshowdata,'getalladmin'=>$getalladmin]);
        }
        else
        {
           $this->logout();
        }
	    
	}

	/*Get all Events */

	Public function getEvents()
	{
	    $contactid=$_SESSION['contid'];
		$result=$this->Calendar_model->getEvents($contactid);
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



}
