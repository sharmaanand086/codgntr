<?php 

/**
 * 
 */
class CrudController extends CI_Controller
{
	
	 public function index(){
	 $data['allrecords']=	$this->ModCrud->getAllRecords();

	 	$this->load->view('home',$data);
	 }
	 public function adduser(){
	 	//echo "working";
	 	if(!$this->input->is_ajax_request()){
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('CrudController');
	 	}
	 	else
	 	{
		 	$data['stName'] = $this->input->post('name',true);
		 	$data['stEmail'] = $this->input->post('email',true);
		 	$data['stPassword'] = $this->input->post('password',true);
		 	$data['stDate']= date('Y-m-d h:i:sa');
		 	$result = $this->ModCrud->addNewuser($data);

		 	if(is_integer($result)){
		 		//echo $result; it will return integer 
		 		$lastrecord = $this->ModCrud->getLastRecord($result);

		 		if(count($lastrecord) === 1){
		 			//echo "work";
		 			//echo json_encode($lastrecord);
		 			$anotherarr['stid'] = $lastrecord[0]['stid'];
		 			$anotherarr['stName'] = $lastrecord[0]['stName'];
		 			$anotherarr['enId'] = $this->encryption->encrypt($lastrecord[0]['stid']);
		 			$anotherarr['stEmail'] = $lastrecord[0]['stEmail'];
		 			$anotherarr['stDate'] = $lastrecord[0]['stDate'];
		 			echo json_encode($anotherarr);
		 			//echo json_encode($lastrecord);

		 		}else{
		 			echo "not working";
		 		}
		 		//echo "success to add students";
		 	}else{
	 			echo "failed";
		 	}
		}
	 }

	 public function checkUser(){
	 	if(!$this->input->is_ajax_request()){
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('CrudController');
	 	}
	 	else
	 	{
	 		//echo "msg error here";
	 		$data['stid'] = $this->input->post('text',true);
	 		$data['stid'] = $this->encryption->decrypt($data['stid']);
	 		$resultcount = $this->ModCrud->checkUser($data);

	 		if(count($resultcount) === 1){
	 			//echo "working";
	 			echo json_encode($resultcount);
	 		}else{
	 			echo "not workind ....";
	 		}
	 	}
	 }

	 public function update(){

	 	if(!$this->input->is_ajax_request()){
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('CrudController');
	 	}
	 	else
	 	{

		 	$data['stName'] = $this->input->post('dyName',true);
		 	$data['stEmail'] = $this->input->post('dyEmail',true);
		 	$data['stPassword'] = $this->input->post('dyPassword',true);
		 	$stid = $this->input->post('id',true);

		 	if(empty($data['stName']) || empty($data['stEmail']) || empty($data['stPassword']) || empty($stid))
		 	{
		 		echo "please check the required field";
		 	}else{
		 		//echo "call the modal";
		 		$resultupdate = $this->ModCrud->update($data,$stid);
		 		if($resultupdate){
	 			echo TRUE;
	 				//echo json_encode($resultupdate);
		 		}else{
		 			echo FALSE;
		 			//echo "not workind ....";
		 		}
		 	}

		 	

	 	}
	 }

	 public function delete(){
	 	if(!$this->input->is_ajax_request())
	 	{
	 		//echo "redirec to other url";
	 		$this->session->set_flashdata('error','plase call the ajax request');
	 		redirect('CrudController');
	 	}
	 	else
	 	{
	 		$id = $this->input->post('text',true);

			 	if( !empty($id))
			 	{ 
			 		$id=$this->encryption->decrypt($id);
			 		 $successdeleted = $this->ModCrud->delete($id);
			 		 if($successdeleted){
			 		 	echo TRUE;
			 		 	//echo "successfully deleted";
			 		 }else{
			 		 	echo "we can not delete right now";
			 		 }
			 	}
			 	else
			 	{ 
			 			//echo "not workind ....";
			 	}
		 	}
	 	}
	 
	 public function adduservia($one,$two,$three){
	 	//echo "working";
	 	$data['stName'] = $one;
	 	$data['stEmail'] = $two;
	 	$data['stPassword'] = $three;
	 	$data['stDate']= date('Y-m-d h:i:sa');
	 	$result = $this->ModCrud->addNewuser($data);

	 	if($result){
	 		echo "success ";
	 	}else{
 			echo "failed";
	 	}

	 }
}